<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Main;
use App\Models\Clinic;
use App\Models\Client;
use Lang;
use App;
use Carbon\Carbon;

    /*
    * @param <request>
    * @return <json>
    */

class AdminController extends Controller
{

    function __construct(){

        $this->action = request('action');
        if (!empty($_SESSION['User'])){
            $this->User = $_SESSION['User'];
        }
        if (empty($_SESSION['Locale'])) {
            $_SESSION['Locale'] = 'en';
            App::setlocale($_SESSION['Locale']);
        }
        $this->Lang = $_SESSION['Locale'];
    }
    ///
    ///
    public function PanelHomePage(){

        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Start = date('Y-m-d');
                $End = date('Y-m-d', strtotime('-30 day'));
                $ClinicsMatched = [];
                $Appointments = [];
                $AllAppointments = $this->toArray(DB::table('appointment')->get());
                $Categories = $this->toArray(DB::table('category')->where('Lang', $this->Lang)->where('Status', '1')->get());
                $Agencies = $this->toArray(DB::table('agency')->get());
                foreach($Agencies as $key => $Agency){
                    $AppointmentsInner = $this->toArray(DB::table('appointment')->where('AgencyId', $Agency['uid'])->where('AppointmentDate', '>=', $End)->orderBy('AppointmentDate','asc')->get());
                    foreach($AppointmentsInner as $key1 => $Appointment){
                        $AppointmentsInner[$key1]['Client']=(array)DB::table('client')->where('uid', $Appointment['ClientId'])->first();
                        $AppointmentsInner[$key1]['Treatment']=(array)DB::table('treatment')->where('uid', $Appointment['TreatmentId'])->first();
                        //$AppointmentsInner[$key1]['Clinic']=(array)DB::table('clinic')->where('uid', $Appointment['ClinicId'])->first();
                    }
                    $Agencies[$key]['Appointments']=$AppointmentsInner;
                }
                foreach($Categories as $key => $Category){
                    $Categories[$key]['Treatments'] = $this->toArray(DB::table('treatment')->where('ParentId', $Category['Id'])->where('Lang', $this->Lang)->where('Status', '1')->get());
                    // $Clinics = $this->toArray(DB::table('clinic')->where('Status', '1')->get());
                    // foreach($Clinics as $Clinic){
                    //     if (!empty($Clinic['Categories'])) {
                    //         if (in_array($Category['Id'], json_decode($Clinic['Categories']))) {
                    //             $Categories[$key]['Clinics'][] = $Clinic;
                    //         }
                    //     }
                    // }
                    
                }
                $result = ['outcome'=>true,'route'=>'panel.Dashboard-Admin','data'=>[
                    'Appointments'=>$Appointments,
                    'Categories'=>$Categories,
                    'AllAppointments'=>$AllAppointments,
                    'Agencies'=>$Agencies
                ]];
            }elseif ($this->User['Type']=='1') {
                $Start = date('Y-m-d');
                $End = date('Y-m-d', strtotime('+7 day'));
                $Appointments = [];
                $ClinicsMatched = [];
                $AllAppointments = [];
                $Categories = json_decode(json_encode(DB::table('category')->where('Lang', $this->Lang)->where('Status', '1')->get()), true);
                $Agencies = json_decode(json_encode(DB::table('agency')->where('ParentId', $this->User['uid'])->get()),true);
                $SubManagers = $this->toArray(DB::table('user')->where('ParentId', $this->User['uid'])->where('Type','1')->where('Status','1')->get());
                if ($this->User['uid']=='RzLD3NVEm88skxZCglJdWKacjBU2rT') {
                    array_merge($this->toArray(DB::table('user')->where('ParentId', '7Y26i0bhE5aHBs1JcCDXutU932lnoj7AK3vVqGZwmpx8zQNgO1')->where('Type','1')->where('Status','1')->get()), $SubManagers);
                    array_merge($this->toArray(DB::table('user')->where('ParentId', 'mKOroqWzTbAv6U981cPfR7LXnF621G')->where('Type','1')->where('Status','1')->get()),$SubManagers);
                    
                }
                foreach($SubManagers as $SubManager){
                    $Agencies = array_merge($this->toArray(DB::table('agency')->where('ParentId', $SubManager['uid'])->get()), $Agencies);
                    $SubyManagers = $this->toArray(DB::table('user')->where('ParentId', $SubManager['uid'])->get());
                    foreach($SubyManagers as $SubyManager){
                        $Agencies = array_merge($this->toArray(DB::table('agency')->where('ParentId', $SubManager['uid'])->get()), $Agencies);
                    }
                }
                foreach($Agencies as $key => $Agency){
                    $AllAppointmentsInner = $this->toArray(DB::table('appointment')->where('AgencyId', $Agency['uid'])->get());
                    foreach($AllAppointmentsInner as $key1 => $Appointment){
                        $AllAppointmentsInner[$key1]['Client']=(array)DB::table('client')->where('uid', $Appointment['ClientId'])->first();
                        $AllAppointments = $AllAppointmentsInner;
                    }
                    $Agencies[$key]['AllAppointments']=$AllAppointmentsInner;
                }
                foreach($Categories as $key => $Category){
                    $Categories[$key]['Treatments']= json_decode(json_encode(DB::table('treatment')->where('Lang', $this->Lang)->where('ParentId', $Category['Id'])->where('Status', '1')->get()), true);
                }
                
                $result = ['outcome'=>true,'route'=>'panel.Dashboard-Admin','data'=>[
                    'Appointments'=>$Appointments,
                    'Categories'=>$Categories,
                    'SubManager'=>$SubManagers,
                    'AllAppointments'=>$AllAppointments,
                    'Agencies' => $Agencies
                ]];
            }elseif ($this->User['Type']=='0') {

                Carbon::setWeekStartsAt(Carbon::SUNDAY);
                  
                $WeeklyAppointments = $this->toArray(DB::table('appointment')->whereBetween('create_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->get());

                    $CountryCodes =  json_decode(file_get_contents('assets/json/CountryCodes.json'), true);
                    $Appointments = json_decode(json_encode(DB::table('appointment')->where('AgencyId', $this->User['Parent']['uid'])->where('Status', '1')->orderBy('AppointmentDate', 'asc')->get()), true);
                    foreach($Appointments as $key => $Appointment){
                        $Appointments[$key]['Client']=(array)DB::table('client')->where('uid', $Appointment['ClientId'])->first();
                        $Appointments[$key]['Treatment']=(array)DB::table('treatment')->where('uid', $Appointment['TreatmentId'])->first();
                        //$Appointments[$key]['Clinic']=(array)DB::table('clinic')->where('uid', $Appointment['ClinicId'])->first();
                    }
                    $Agency = DB::table('agency')->where('uid', User('ParentId'))->first();
                    $Categories = json_decode(json_encode(DB::table('category')->where('Status', '1')->get()),true);
                    $Notes = DB::table('note')->where('UserId', User('ParentId'))->where('Status','1')->get();
                    $Members = DB::table('user')->where('ParentId', User('ParentId'))->get();
                    //$Clinics = DB::table('clinic')->where('Status', '1')->get();
                    $Campain = DB::table('campain')->where('Lang', $this->Lang)->where('Type','0')->orderBy('create_at', 'desc')->limit(1)->where('Status', '1')->first();
                    $result = ['outcome'=>true,'route'=>'panel.Dashboard-Agency', 'data'=>[
                        'Appointments'=>$Appointments,
                        'Agency'=>$Agency,
                        'Categories'=>$Categories,
                        'Notes'=>$Notes,
                        'Members'=>$Members,
                        //'Clinics'=>$Clinics,
                        'Campain'=>$Campain,
                        'CountryCodes'=>$CountryCodes,
                        'WeeklyAppointments'=>$WeeklyAppointments
                    ]];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function Appointments(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Appointments = json_decode(json_encode(DB::table('appointment')->where('Status', '1')->orderBy('create_at','desc')->get()),true);
                foreach($Appointments as $key => $Appointment){
                    // $Appointments[$key]['Clinic']=json_decode(json_encode(DB::table('clinic')->where('uid', $Appointment['ClinicId'])->first()), true);
                    $Appointments[$key]['Client']=json_decode(json_encode(DB::table('client')->where('uid', $Appointment['ClientId'])->first()), true);
                    $Appointments[$key]['Category']=json_decode(json_encode(DB::table('category')->where('Id', $Appointment['CategoryId'])->first()), true);
                    $Appointments[$key]['Treatment']=json_decode(json_encode(DB::table('treatment')->where('uid', $Appointment['TreatmentId'])->first()), true);
                    $Appointments[$key]['Agency']=json_decode(json_encode(DB::table('agency')->where('uid', $Appointment['AgencyId'])->first()), true);
                }
                $result = ['outcome'=>true,'route'=>'panel.Appointments.List','data'=>[
                    'Appointments'=>$Appointments
                ]];

            }elseif ($this->User['Type']=='1') {
                $Appointments = [];
                $Agencies = json_decode(json_encode(DB::table('agency')->where('ParentId', $this->User['uid'])->orderBy('create_at','desc')->get()),true);
                foreach($Agencies as $Agency){
                    $AllAppointments[] = json_decode(json_encode(DB::table('appointment')->where('AgencyId', $Agency['uid'])->get()), true);
                    $AppointmentsInner = json_decode(json_encode(DB::table('appointment')->where('AgencyId', $Agency['uid'])->get()), true);
                    foreach($AppointmentsInner as $key => $Appointment){
                        $AppointmentsInner[$key]['Client']=(array)DB::table('client')->where('uid', $Appointment['ClientId'])->first();
                        // $AppointmentsInner[$key]['Clinic']=(array)DB::table('clinic')->where('uid', $Appointment['ClinicId'])->first();
                        $AppointmentsInner[$key]['Category']=(array)DB::table('category')->where('Id', $Appointment['CategoryId'])->first();
                        $AppointmentsInner[$key]['Treatment']=json_decode(json_encode(DB::table('treatment')->where('uid', $Appointment['TreatmentId'])->first()), true);
                        $AppointmentsInner[$key]['Agency']=$Agency;
                        $Appointments = $AppointmentsInner;
                    }
                }
                $result = ['outcome'=>true,'route'=>'panel.Appointments.List','data'=>[
                    'Appointments'=>$Appointments
                ]];

            }else {
                $Appointments = $this->toArray( DB::table('appointment')->where('AgencyId', $this->User['ParentId'])->where('Status', '1')->orderBy('create_at','desc')->get() );
                foreach($Appointments as $key => $Appointment){
                    // $Appointments[$key]['Clinic']=json_decode(json_encode(DB::table('clinic')->where('uid', $Appointment['ClinicId'])->first()), true);
                    $Appointments[$key]['Client']=$this->toArray(DB::table('client')->where('uid', $Appointment['ClientId'])->first());
                    $Appointments[$key]['Category']=$this->toArray(DB::table('category')->where('Id', $Appointment['CategoryId'])->first());
                    $Appointments[$key]['Treatment']=$this->toArray(DB::table('treatment')->where('uid', $Appointment['TreatmentId'])->first());
                    $Appointments[$key]['Agency']=$this->toArray(DB::table('agency')->where('uid', $Appointment['AgencyId'])->first());
                }
                $result = ['outcome'=>true,'route'=>'panel.Appointments.List','data'=>[
                    'Appointments'=>$Appointments
                ]];
            }

        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }

    }
    ///
    public function Clinics(){
        $Clinics = json_decode(json_encode(DB::table('clinic')->where('Status', '1')->get()), true);
        foreach($Clinics as $key => $Clinic){
            $Categories=[];
            if (!empty($Clinic['Categories'])) {
                foreach(json_decode($Clinic['Categories']) as $Id){
                $Categories[$Id] =  (array)DB::table('category')->where('Id', $Id)->first();
                }            
            }
        $Clinics[$key]['Categories'] = $Categories;
        }
        return view('panel.Clinics', ['Clinics'=>$Clinics]);
    }
    ///
    public function Clients(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Clients = $this->toArray(DB::table('client')->get());
                foreach($Clients as $key => $Client){
                    $Clients[$key]['Appointments'] = $this->toArray( DB::table('appointment')->where('ClientId', $Client['uid'])->orderBy('create_at','desc')->get() );
                }
                $result = ['outcome'=>true,'route'=>'panel.Clients.List','data'=>[
                    'Clients'=>$Clients
                ]];            
            }elseif($this->User['Type']=='1') {
                $Clients = [];
                $Agencies = $this->toArray(DB::table('agency')->where('ParentId',$this->User['uid'])->where('Status','1')->get());
                foreach($Agencies as $Agency){
                    $clients = $this->toArray(DB::table('client')->where('Agency',$Agency['uid'])->get());
                    $Clients = array_merge($Clients, $clients);
                }
                foreach($Clients as $key => $Client){
                    $Apps = $this->toArray( DB::table('appointment')->where('ClientId', $Client['uid'])->orderBy('create_at','desc')->get());
                }
                $result = ['outcome'=>true,'route'=>'panel.Clients.List','data'=>[
                    'Clients'=>$Clients
                ]];
            }else {
                $Clients = json_decode(json_encode(DB::table('client')->where('Agency', $this->User['ParentId'])->get()), true);
                foreach($Clients as $key => $Client){
                    $Clients[$key]['Appointments'] = $this->toArray( DB::table('appointment')->where('ClientId', $Client['uid'])->orderBy('create_at','desc')->get() );
                }
                $result = ['outcome'=>true,'route'=>'panel.Clients.List','data'=>[
                    'Clients'=>$Clients
                ]];
            }
        }else {
             $result = ['outcome'=>false,'route'=>' ','ErrorMessage'=>Lang::get('Base.SessionOut')];
        }

        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function ClientDetail($uid){
        if (!empty($this->User)) {
                $Client = $this->toArray(DB::table('client')->where('uid',$uid)->first());
                $MHistory = $this->toArray(DB::table('background')->where('ClientId',$uid)->first());
                $Agency = $this->toArray( DB::table('agency')->where('uid', $Client['Agency']??'0')->first() );
                $Appointments = $this->toArray( DB::table('appointment')->where('ClientId', $Client['uid'])->where('Status','1')->orderBy('create_at','desc')->get() );
                foreach($Appointments as $key=>$Appointment){
                    $Appointments[$key]['Agency']=$this->toArray(DB::table('agency')->where('uid',$Appointment['AgencyId'])->first());
                    $Appointments[$key]['Treatment']=$this->toArray(DB::table('treatment')->where('uid',$Appointment['TreatmentId'])->first());
                    $Appointments[$key]['Category']=$this->toArray(DB::table('category')->where('uid',$Appointment['CategoryId'])->first());
                    $Appointments[$key]['Package']=$this->toArray(DB::table('package')->where('Id',$Appointment['PackageId'])->first());
                }
                $Holds = $this->toArray( DB::table('appointment')->where('ClientId', $Client['uid'])->where('Status','2')->orderBy('create_at','desc')->get() );
                foreach($Holds as $key=>$Appointment){
                    $Holds[$key]['Agency']=$this->toArray(DB::table('agency')->where('uid',$Appointment['AgencyId'])->first());
                    $Holds[$key]['Treatment']=$this->toArray(DB::table('treatment')->where('uid',$Appointment['TreatmentId'])->first());
                    $Holds[$key]['Category']=$this->toArray(DB::table('category')->where('uid',$Appointment['CategoryId'])->first());
                    $Holds[$key]['Package']=$this->toArray(DB::table('package')->where('Id',$Appointment['PackageId'])->first());
                }
                $result = ['outcome'=>true,'route'=>'panel.Clients.Detail','data'=>[
                    'Client'=>$Client,
                    'Agency'=>$Agency,
                    'Holds'=>$Holds,
                    'Background'=>$MHistory,
                    'Appointments'=>$Appointments
                ]];        
        }else {
             $result = ['outcome'=>false,'route'=>' ','ErrorMessage'=>Lang::get('Base.SessionOut')];
        }

        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function ClinicDetail($Id){
        $Id = (int)$Id;
        $Clinic = (array)DB::table('clinic')->where('Id', $Id)->first();
        if (!empty($Clinic)) {
            $Categories = [];
            $Treatments = [];
            if (!empty($Clinic['Categories'])) {
                foreach(json_decode($Clinic['Categories']) as $CategoryId){
                    $Categories[] = (array)DB::table('category')->where('Id', $CategoryId)->first();
                }
                $Clinic['Categories'] = $Categories;
            }
            if (!empty($Clinic['Treatments'])) {
                foreach(json_decode($Clinic['Treatments']) as $TreatmentId){
                    $Treatments[] = (array)DB::table('treatment')->where('Id', $TreatmentId->Id)->first();
                }
                $Clinic['Treatments'] = $Treatments;
            }
            $result = ['outcome'=>true,'route'=>'panel.Clinic-Detail','data'=>['Clinic'=>$Clinic]];
        }else {
            $result = ['outcome'=>false,'route'=>'panel.404','ErrorMessage'=>Lang::get('Base.NotFound'),'data'=>[]];
        }
        return view($result['route'], $result['data']);
    }
    ///
    public function NewAppointment(){
        if (!empty($this->User)){
            if ($this->User['Type']=='0') {
                $Treatment = $this->toArray(DB::table('treatment')->where('uid',request('Treatment'))->first());
                if (!empty($Treatment)) {
                    $Category = $this->toArray(DB::table('category')->where('Id',$Treatment['ParentId'])->first());
                    $Categories = $this->toArray(DB::table('category')->where('Lang',$this->Lang)->where('Status', '1')->get());
                    $Agency = $this->toArray(DB::table('agency')->where('uid', $this->User['ParentId'])->first());
                    $Packages = $this->toArray(DB::table('package')->where('Lang',$this->Lang)->where('Status', '1')->get());
                    foreach($Packages as $key => $Package){
                        $Packages[$key]['Features'] = $this->toArray( DB::table('feature')->where('Lang',$this->Lang)->where('ParentId', $Package['Id'])->where('Status','1')->orderBy('Order','asc')->get() );
                    }
                    $PaymentMethods = $this->toArray(DB::table('payment_method')->where('Status','1')->get());
                    $result = ['outcome'=>true, 'route'=>'panel.Appointments.New', 'data'=>[
                        'Categories'=>$Categories,
                        'Packages'=>$Packages,
                        'PaymentMethods'=>$PaymentMethods,
                        'Agency'=>$Agency ?? [],
                        'Category'=>$Category,
                        'Treatment'=>$Treatment
                    ]]; 
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            try {
                return redirect()->back()->with($result);
            } catch (Exception $e) {
                return redirect()->route('Login');
            }   
        }
    }
    ///
    public function AgencyDashborad(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='1') {
                $date1 = date('Y-m-d', strtotime('-7 day'));
                $date2 = date('Y-m-d', strtotime('+7 day'));
                $Appointments = $this->toArray( DB::table('appointment')->where('AppointmentDate', '>=', $date1)->where('AppointmentDate', '<=', $date2)->where('Status', '1')->where('AgencyId', $this->User['ParentId'])->get() );
                $result = ['outcome'=>true,'route'=>'panel.Dashboard-Agency', 'data'=>['Appointments'=>$Appointments]];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function AdminDashborad(){
        if (!empty($this->User)) {
            //echo json_encode($this->User);
            if ($this->User['Type']=='2') {
                $Start = date('Y-m-d', strtotime('-7 day'));
                $End = date('Y-m-d', strtotime('+7 day'));
                $ClinicsMatched = [];
                $Appointments = $this->toArray(DB::table('appointment')->where('AppointmentDate', '>=', $Start)->where('AppointmentDate', '<=', $End)->where('Status', '1')->get() );
                $Categories = $this->toArray( DB::table('category')->where('Status', '1')->get() );
                foreach($Appointments as $key => $Appointment){
                    $Appointments[$key]['Client']=(array)DB::table('client')->where('uid', $Appointment['ClientId'])->first();
                    $Appointments[$key]['Clinic']=(array)DB::table('clinic')->where('uid', $Appointment['ClinicId'])->first();
                }
                foreach($Categories as $key => $Category){
                    $Clinics= json_decode(json_encode(DB::table('clinic')->where('Status', '1')->get()), true);
                    foreach($Clinics as $Clinic){
                        if (!empty($Clinic['Categories'])) {
                            if (in_array($Category['Id'], json_decode($Clinic['Categories']))) {
                                $Categories[$key]['Clinics'][] = $Clinic;
                            }
                        }
                    }
                }
                $result = ['outcome'=>true,'route'=>'panel.Dashboard-Admin','data'=>['Appointments'=>$Appointments,'Categories'=>$Categories]];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function Categories(){
        if (!empty($this->User)) {
            $Categories = json_decode(json_encode(DB::table('category')->where('Lang',$this->Lang)->get()), true);
            $Clinics = json_decode(json_encode(DB::table('clinic')->where('Status','1')->get()), true);
            foreach($Categories as $key => $Category){
                $Clinics = json_decode(json_encode(DB::table('clinic')->where('Status', '1')->get()), true);
                foreach($Clinics as $Clinic){
                    if (!empty($Clinic['Categories'])) {
                        if (in_array($Category['Id'], json_decode($Clinic['Categories']))) {
                            $Categories[$key]['Clinics'][] = $Clinic;
                        }
                    }
                }
                $Treatments= json_decode(json_encode(DB::table('treatment')->where('ParentId', $Category['Id'])->get()), true);
                $Categories[$key]['Treatments'] = $Treatments;
            }
            $result = ['outcome'=>true,'route'=>'panel.Categories.List','data'=>[
                'Categories'=>$Categories
            ]];
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function ManageAgencies(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2' || $this->User['Type']=='1') {
                if ($this->User['Type']=='2') {
                    $Agencies = $this->toArray( DB::table('agency')->get() );
                }else{
                    if ($this->User['uid']=='RzLD3NVEm88skxZCglJdWKacjBU2rT') {
                        $Agencies = $this->toArray( DB::table('agency')->where('ParentId', '7Y26i0bhE5aHBs1JcCDXutU932lnoj7AK3vVqGZwmpx8zQNgO1')->orWhere('ParentId','mKOroqWzTbAv6U981cPfR7LXnF621G')->get() );
                    }else {
                    $Agencies = $this->toArray( DB::table('agency')->where('ParentId', ($this->User['Type']=='1')? $this->User['uid'] : NULL )->get() );
                    }
                }
                $Managers = $this->toArray(DB::table('user')->where('Type','1')->where('Status','1')->get());
                $applications = $this->toArray( DB::table('application')->orderBy('create_at','desc')->get() );
                $Countries = json_decode(file_get_contents('assets/json/CountryCodes.json'),true);
                $result = ['outcome'=>true,'route'=>'panel.ManageAgencies','data'=>[
                    'Managers'=>$Managers,
                    'Agencies'=>$Agencies,
                    'Countries'=>$Countries
                    // 'Applications'=>$applications
                ]];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function Agencies(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2' || $this->User['Type']=='1') {
                if ($this->User['Type']=='2') {
                    $Agencies = $this->toArray( DB::table('agency')->get() );
                }else{
                    if ($this->User['uid']=='RzLD3NVEm88skxZCglJdWKacjBU2rT') {
                        $Agencies = $this->toArray( DB::table('agency')->where('ParentId', '7Y26i0bhE5aHBs1JcCDXutU932lnoj7AK3vVqGZwmpx8zQNgO1')->orWhere('ParentId','mKOroqWzTbAv6U981cPfR7LXnF621G')->get() );
                    }else {
                        $Agencies = $this->toArray( DB::table('agency')->where('ParentId', ($this->User['Type']=='1')? $this->User['uid'] : NULL )->get() );
                    }
                }
                $Managers = $this->toArray(DB::table('user')->where('Type','1')->where('Status','1')->get());
                $applications = $this->toArray( DB::table('application')->orderBy('create_at','desc')->get() );
                $Countries = json_decode(file_get_contents('assets/json/CountryCodes.json'),true);
                $result = ['outcome'=>true,'route'=>'panel.Agencies.List','data'=>[
                    'Managers'=>$Managers,
                    'Agencies'=>$Agencies,
                    'Countries'=>$Countries
                    // 'Applications'= >$applications
                ]];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function AgencyDetail($uid){
        if (!empty($this->User)) {
            if ($this->User['Type']!='0' || $this->User['Parent']['uid'] == $uid )  {
                $Clients = [];
                $Agency = $this->toArray( DB::table('agency')->where('uid',$uid)->first() );
                $Appointments = $this->toArray( DB::table('appointment')->where('AgencyId',$uid)->get());
                $MonthlyAppointments = $this->toArray( DB::table('appointment')->where('AgencyId',$uid)->get());
                $WeeklyAppointments = $this->toArray( DB::table('appointment')->where('AgencyId',$uid)->get());

                foreach($Appointments as $key=>$Appointment){
                    $Client=$this->toArray(DB::table('client')->where('uid',$Appointment['ClientId'])->first());
                    $Clients[$Client['uid']]=$Client;
                    $Appointments[$key]['Client'] = $Client;
                    $Appointments[$key]['Treatment']=$this->toArray(DB::table('treatment')->where('uid',$Appointment['TreatmentId'])->first());
                    $Appointments[$key]['Category']=$this->toArray(DB::table('category')->where('uid',$Appointment['CategoryId'])->first());
                    $Appointments[$key]['Package']=$this->toArray(DB::table('package')->where('Id',$Appointment['PackageId'])->first());
                }
                foreach($MonthlyAppointments as $key=>$Appointment){
                    $Client=$this->toArray(DB::table('client')->where('uid',$Appointment['ClientId'])->first());
                    $Clients[$Client['uid']]=$Client;
                    $MonthlyAppointments[$key]['Client'] = $Client;
                    $MonthlyAppointments[$key]['Treatment']=$this->toArray(DB::table('treatment')->where('uid',$Appointment['TreatmentId'])->first());
                    $MonthlyAppointments[$key]['Category']=$this->toArray(DB::table('category')->where('uid',$Appointment['CategoryId'])->first());
                    $MonthlyAppointments[$key]['Package']=$this->toArray(DB::table('package')->where('Id',$Appointment['PackageId'])->first());
                }
                foreach($WeeklyAppointments as $key=>$Appointment){
                    $Client=$this->toArray(DB::table('client')->where('uid',$Appointment['ClientId'])->first());
                    $Clients[$Client['uid']]=$Client;
                    $WeeklyAppointments[$key]['Client'] = $Client;
                    $WeeklyAppointments[$key]['Treatment']=$this->toArray(DB::table('treatment')->where('uid',$Appointment['TreatmentId'])->first());
                    $WeeklyAppointments[$key]['Category']=$this->toArray(DB::table('category')->where('uid',$Appointment['CategoryId'])->first());
                    $WeeklyAppointments[$key]['Package']=$this->toArray(DB::table('package')->where('Id',$Appointment['PackageId'])->first());
                }
                $Coworkers= $this->toArray(DB::table('user')->where('ParentId',$uid)->get());
                $result = ['outcome'=>true,'route'=>'panel.Agencies.Detail','data'=>[
                    'Agency'=>$Agency,
                    'Clients'=>$Clients,
                    'Coworkers'=>$Coworkers,
                    'Appointments'=>$Appointments,
                    'MonthlyAppointments'=>$MonthlyAppointments,
                    'WeeklyAppointments'=>$WeeklyAppointments
                ]];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    public function EditAgency($uid){
        if (!empty($this->User)) {
            $uid = htmlspecialchars($uid);
            if ($this->User['Type']!='0' || $this->User['Parent']['uid'] == $uid ) {
                $Managers = $this->toArray(DB::table('user')->where('Type','1')->where('Status','1')->get());
                $Agency = $this->toArray(DB::table('agency')->where('uid', $uid)->first());
                $Countries = json_decode(file_get_contents('assets/json/CountryCodes.json'),true);
                $result = ['outcome'=>true,'route'=>'panel.Agencies.Edit','data'=>[
                    'Agency'=>$Agency,
                    'Managers'=>$Managers,
                    'Countries'=>$Countries
                ]];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function ManageClinics(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Clinics = DB::table('clinic')->get();
                $Categories = $this->toArray(DB::table('category')->get());
                foreach($Categories as $key => $Category){
                    $Categories[$key]['Treatments'] = $this->toArray(DB::table('treatment')->where('ParentId', $Category['Id'])->get());
                }
                $result = ['outcome'=>true,'route'=>'panel.ManageClinics','data'=>[
                    'Clinics'=>$Clinics,
                    'Categories'=>$Categories,
                ]];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function NewCategory(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Clinics = DB::table('clinic')->where('Status','1')->get();                
                $result = ['outcome'=>true,'route'=>'panel.Categories.New','data'=>[
                    'Clinics'=>$Clinics
                ]];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function EditCategory($uid){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Clinics = DB::table('clinic')->where('Status','1')->get();
                $Category = $this->toArray(DB::table('category')->where('uid',$uid)->first());
                $Categories['Treatments'] = $this->toArray(DB::table('treatment')->where('ParentId', $Category['Id'])->get());
                $result = ['outcome'=>true,'route'=>'panel.Categories.Edit','data'=>[
                    'Clinics'=>$Clinics,
                    'Category'=>$Category,
                ]];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function Treatments(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Treatments = $this->toArray(DB::table('treatment')->where('Lang',$this->Lang)->get());
                $Categories = $this->toArray(DB::table('category')->where('Lang',$this->Lang)->where('Status','1')->get());
                $result = ['outcome'=>true,'route'=>'panel.Treatments.List','data'=>[
                    'Treatments'=>$Treatments,
                    'Categories'=>$Categories,
                ]];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    public function EditTreatment($uid){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Clinics = DB::table('clinic')->where('Status','1')->get();
                $Treatment = $this->toArray(DB::table('treatment')->where('uid',$uid)->first());
                $Categories = $this->toArray(DB::table('category')->where('Lang',$this->Lang)->where('Status','1')->get());
                $result = ['outcome'=>true,'route'=>'panel.Treatments.Edit','data'=>[
                    'Treatment'=>$Treatment,
                    'Categories'=>$Categories
                ]];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function NewTreatment(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Categories = $this->toArray(DB::table('category')->where('Lang',$this->Lang)->where('Status','1')->get());
                $result = ['outcome'=>true,'route'=>'panel.Treatments.New','data'=>[
                    'Categories'=>$Categories
                ]];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function ManageUsers(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Users = $this->toArray(DB::table('user')->get());
                $Agencies = $this->toArray(DB::table('agency')->get());
                foreach($Users as $key => $User){
                    $Users[$key]['Parent'] = (!empty($User['ParentId']))? $this->toArray(DB::table('agency')->where('uid', $User['ParentId'])->first()) : NULL ;
                }
                $result = ['outcome'=>true,'route'=>'panel.ManageUsers','data'=>[
                    'Users'=>$Users,
                    'Agencies'=>$Agencies
                ]];
            }elseif($this->User['Type']=='1'){
                $Users = $this->toArray(DB::table('user')->where('ParentId', $this->User['uid'])->get());
                $Agencies = $this->toArray(DB::table('agency')->where('ParentId', $this->User['uid'])->get());
                foreach($Agencies as $key  => $Agency){
                        $Agents=$this->toArray( DB::table('user')->where('ParentId', $Agency['uid'])->get() );
                        foreach($Agents as $Agent){
                            $Agent['Parent'] = (!empty($Agent['ParentId']))? $this->toArray(DB::table('agency')->where('uid', $Agent['ParentId'])->first()) : NULL ;
                            $Users[]=$Agent;
                        }
                }

                // foreach($Users as $key => $User){
                //     $Users[$key]['Parent'] = (!empty($User['ParentId']))? $this->toArray(DB::table('agency')->where('uid', $User['ParentId'])->first()) : NULL ;
                // }
                $result = ['outcome'=>true,'route'=>'panel.ManageUsers','data'=>[
                    'Users'=>$Users,
                    'Agencies'=>$Agencies
                ]];            
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function ViewArticles(){
        if (!empty($this->User)) {
                $Categories = $this->toArray(DB::table('category')->where('Lang',$this->Lang)->where('Status', '1')->get());
                foreach($Categories as $key => $Category){
                    $Categories[$key]['Treatments']= $this->toArray(DB::table('treatment')->where('ParentId', $Category['Id'])->where('Lang',$this->Lang)->where('Status', '1')->get());
                }
                $Articles = $this->toArray(DB::table('article')->where('Lang',$this->Lang)->where('Status', '1')->orderBy('Order', 'asc')->limit(6)->get());
                if (count($Articles)!=0) {
                    $result = ['outcome'=>true,'route'=>'panel.Articles','data'=>[
                        'Categories'=>$Categories,
                        'Articles'=>$Articles
                    ]];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function Articles(){
        if (!empty($this->User)) {
            $Articles = $this->toArray(DB::table('article')->where('Lang',$this->Lang)->orderBy('Order', 'asc')->get());
            $result = ['outcome'=>true,'route'=>'panel.Articles.List','data'=>[
                'Articles'=>$Articles
            ]];

        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function EditArticle($uid){
        if (!empty($this->User)) {
            $Article = $this->toArray(DB::table('article')->where('uid',$uid)->first());
            $result = ['outcome'=>true,'route'=>'panel.Articles.Edit','data'=>[
                'Article'=>$Article
            ]];

        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function NewArticle(){
        if (!empty($this->User)) {
            $result = ['outcome'=>true,'route'=>'panel.Articles.New','data'=>[
                
            ]];

        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function Consult(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Chats = $this->toArray( DB::table('chat')->where('UserTo','Admin')->orwhere('UserTo','All')->orderBy('create_at','desc')->get() );
                foreach($Chats as $key => $Chat){
                    $Chats[$key]['Messages'] = $this->toArray( DB::table('message')->where('ChatId', $Chat['uid'])->get() );
                    $Chats[$key]['User'] = $this->toArray( DB::table('user')->where('uid', $Chat['UserFrom'])->first() );
                    foreach( $Chats[$key]['Messages'] as $key1 => $Message ){
                        if (!in_array($this->User['uid'], json_decode($Message['Seen'] ?? "[]"), true)) {
                            $Chats[$key]['Pulse'] = true; 
                        }
                        $Chats[$key]['Messages'][$key1]['User'] = $this->toArray( DB::table('user')->where('uid', $Message['UserId'])->first() );
                    }
                }
                $result =['outcome'=>true,'route'=>'panel.Consult','data' => [
                    'Chats'=>$Chats
                ]];
            }else{
                $Chats = $this->toArray( DB::table('chat')->where('UserFrom', $this->User['uid'])->orderBy('create_at','desc')->get() );
                foreach($Chats as $key => $Chat){
                    $Chats[$key]['Messages'] = $this->toArray( DB::table('message')->where('ChatId', $Chat['uid'])->get() );
                    $Chats[$key]['User'] = $this->toArray( DB::table('user')->where('uid', $Chat['UserFrom'])->first() );
                    foreach($Chats[$key]['Messages'] as $key1 => $Message){
                        if (!in_array($this->User['uid'], json_decode($Message['Seen'] ?? "[]"), true)) {
                            $Pulse = true;
                            $Chats[$key]['Pulse'] = true;
                        }
                        $Chats[$key]['Messages'][$key1]['User'] = $this->toArray( DB::table('user')->where('uid', $Message['UserId'])->first() );
                    }
                }
                $result =['outcome'=>true,'route'=>'panel.Consult','data'=>[
                    'Chats'=>$Chats
                ]];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut'), 'route'=>' '];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function ManageCampain(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Campains = $this->toArray( DB::table('campain')->where('Lang', $this->Lang)->get() );
                $result = ['outcome'=>true,'route'=>'panel.ManageCampains','data'=>[
                     'Campains'=>$Campains
                ]];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest'),'route'=>' '];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut'), 'route'=>' '];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function ManagePackages(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Packages = $this->toArray( DB::table('package')->where('Lang',$this->Lang)->where('Status','1')->get() );
                $result = ['outcome'=>true,'route'=>'panel.ManagePackages','data'=>[
                     'Packages'=>$Packages
                ]];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest'),'route'=>' '];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut'), 'route'=>' '];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function ManageFeatures(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                // $Features = $this->toArray( DB::table('feature')->get() );
                $Packages = $this->toArray( DB::table('package')->where('Lang',$this->Lang)->where('Status','1')->get() );
                foreach($Packages as $key => $Package){
                    $Packages[$key]['Features'] = $this->toArray( DB::table('feature')->where('ParentId', $Package['Id'])->where('Lang',$this->Lang)->where('Status','1')->get() );
                }
                $result = ['outcome'=>true,'route'=>'panel.ManageFeatures','data'=>[
                    'Packages'=>$Packages
                ]];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest'),'route'=>' '];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut'), 'route'=>' '];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function ArticleDetail($Slug){
        if (!empty($this->User)) {
            $Articles = $this->toArray(DB::table('article')->where('Lang',$this->Lang)->where('Status', '1')->orderBy('Order', 'asc')->get());
            $Article = $this->toArray( DB::table('article')->where('Slug',$Slug)->first() );
            $result = ['outcome'=>true,'route'=>'panel.Articles-Detail','data'=>[
                'Article'=>$Article,
                'Articles'=>$Articles
            ]];
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut'), 'route'=>' '];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function ManageArticles(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Articles = $this->toArray( DB::table('article')->where('Lang',$this->Lang)->get() );
                $result = ['outcome'=>true,'route'=>'panel.ManageArticles','data'=>[
                     'Articles'=>$Articles
                ]];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest'),'route'=>' '];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut'), 'route'=>' '];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function Results(){
        $Results = $this->toArray(DB::table('results')->where('Status','1')->get());
        return view('panel.Results', ['Results'=>$Results]);
    }
    ///
    public function ResultDetail($uid){
        $Result = $this->toArray(DB::table('results')->where('uid', $uid)->first());
        return view('panel.Results-Detail',['Result'=>$Result]);
    }
    ///
    public function Settings(){
        $Coworkers= $this->toArray(DB::table('user')->where('ParentId',$this->User['Parent']['uid'])->get());
        return view('panel.Settings', ['Coworkers'=>$Coworkers]);
    }
    ///
    public function OrderDetail($uid){
        $Order = $this->toArray(DB::table('appointment')->where('uid',$uid)->first() );
        if ($Order) {
            $Order['User'] = $this->toArray(DB::table('user')->where('uid', $Order['UserId'])->first());
            $Order['Package'] = $this->toArray(DB::table('package')->where('Id',$Order['PackageId'])->first());
            $Order['Category'] = $this->toArray(DB::table('category')->where('Id',$Order['CategoryId'])->first());
            $Order['Treatment'] = $this->toArray(DB::table('treatment')->where('Id', $Order['TreatmentId'])->first());
            $Order['Package'] = $this->toArray(DB::table('package')->where('Id',$Order['PackageId'])->first());
            $Order['Agency'] = $this->toArray(DB::table('agency')->where('uid',$Order['AgencyId'])->first());
            $Order['Client'] = $this->toArray(DB::table('client')->where('uid',$Order['ClientId'])->first());
            $Order['Client']['Background'] = $this->toArray(DB::table('background')->where('ClientId', $Order['ClientId'])->first());
            $Order['PaymentMethod'] = $this->toArray(DB::table('payment_method')->where('Id',$Order['PaymentMethod'])->first());
            $Features = [];
            foreach(json_decode($Order['Features'],true) as $Feature){
                $Features[] = $this->toArray(DB::table('feature')->where('Id',$Feature)->first());
            }
            $Order['Features'] = $Features;
            $result = ['outcome'=>true,'route'=>'panel.Appointments.Detail','data'=>[
                'Order'=>$Order
            ]];
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
        }
        // return response()->json($result);
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function TreeView(){
        $result = ['outcome'=>false,'ErrorMessage'=>'Internal-Error'];
        if($this->User['Type']=='1'){
            $arr = $this->GetTree($this->User);
            $result = ['outcome'=>true];
        }elseif($this->User['Type']=='2') {
            $Managers = $this->toArray(DB::table('user')->where('Type','1')->where('Status','1')->get());
            foreach($Managers as  $key => $Manager){
                if (empty($Manager['ParentId'])) {
                     $Arr = $this->GetTree($Manager);
                     $Managers[$key]['SubManagers']=$Arr[0];
                     $Managers[$key]['Agencies']=$Arr[1];
                }else {
                    unset($Managers[$key]);
                }
            }
            $arr[0] = $Managers;
            $arr[1] = [];
            $result = ['outcome'=>true];
        }

        if ($result['outcome']) {
            // dd($arr);
            return view('panel.TreeView', ['SubManagers'=>$arr[0],'Agencies'=>$arr[1]]);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///

    ///
    public function Applications(){
        $applications = $this->toArray( DB::table('application')->orderBy('create_at','desc')->get() );
        return view('panel.Applications', ['Applications'=>$applications]);
    }
    ///
    public function TestMail(){
        return $this->SendMail('recepozmen_67@hotmail.com','Aramıza Hoşgeldin!', 'Test İşlemi');
    }
    ///
    public function Application(){
        $Countries = json_decode(file_get_contents('assets/json/CountryCodes.json'),true);
        return view('main.Application', ['Countries'=>$Countries]);
    }
    ///
    public function UserList(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Users = $this->toArray(DB::table('user')->get());
                $Agencies = $this->toArray(DB::table('agency')->get());
                foreach($Users as $key => $User){
                    $Users[$key]['Parent'] = (!empty($User['ParentId']))? $this->toArray(DB::table('agency')->where('uid', $User['ParentId'])->first()) : NULL ;
                }
                $result = ['outcome'=>true,'route'=>'panel.Users','data'=>[
                    'Users'=>$Users,
                    'Agencies'=>$Agencies
                ]];
            }elseif($this->User['Type']=='1'){
                $Users = $this->toArray(DB::table('user')->where('ParentId', $this->User['uid'])->get());
                $Agencies = $this->toArray(DB::table('agency')->where('ParentId', $this->User['uid'])->get());
                foreach($Agencies as $key  => $Agency){
                        $Agents=$this->toArray( DB::table('user')->where('ParentId', $Agency['uid'])->get() );
                        foreach($Agents as $Agent){
                            $Agent['Parent'] = (!empty($Agent['ParentId']))? $this->toArray(DB::table('agency')->where('uid', $Agent['ParentId'])->first()) : NULL ;
                            $Users[]=$Agent;
                        }
                }

                $result = ['outcome'=>true,'route'=>'panel.Users','data'=>[
                    'Users'=>$Users,
                    'Agencies'=>$Agencies
                ]];            
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function AgencyList(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2' || $this->User['Type']=='1') {
                if ($this->User['Type']=='2') {
                    $Agencies = $this->toArray( DB::table('agency')->get() );
                }else{
                    $Agencies = $this->toArray( DB::table('agency')->where('ParentId', ($this->User['Type']=='1')? $this->User['uid'] : NULL )->get() );
                }
                $Managers = $this->toArray(DB::table('user')->where('Type','1')->where('Status','1')->get());
                $result = ['outcome'=>true,'route'=>'panel.Agencies','data'=>[
                    'Managers'=>$Managers,
                    'Agencies'=>$Agencies,
                ]];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function cox(){
        return $this->Decrypt(html_entity_decode($_GET['Code']??'1234567'));
    }
    ///
    public function Blogs(){
        $Blogs = DB::table('blog')->where('Status','1')->get();
        if (!empty($Blogs)) {
            $result = [
                'outcome'=>true,
                'route'=>'panel.Blog',
                'data'=>[
                    'Blogs'=>$Blogs
                ] 
            ];
        }else {
            $result = [
                'outcome'=>false,
                'ErrorMessage'=>'Kayıt Bulunamadı!'
            ];
        }

        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    function BlogDetail($uid){
        $data = DB::table('blog')->where('uid',$uid)->first();
        if (!empty($data)) {
            $result = [
                'outcome'=>true,
                'route'=>'panel.BlogDetail',
                'data'=>[
                    'Blog'=>$data
                ] 
            ];
        }else {
            $result = [
                'outcome'=>false,
                'ErrorMessage'=>'Kayıt Bulunamadı!'
            ];
        }

        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function Managers(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Users = $this->toArray(DB::table('user')->where('Type','1')->get());
                $Agencies = $this->toArray(DB::table('agency')->get());
                foreach($Users as $key => $User){
                    if ($User['Type']=='1') {
                        $Users[$key]['Parent'] = (!empty($User['ParentId']))? $this->toArray(DB::table('user')->where('uid', $User['ParentId'])->first()) : NULL ;
                    }                    
                }
                $result = ['outcome'=>true,'route'=>'panel.Users.List','data'=>[
                    'Users'=>$Users,
                    'Type'=>'managers'
                ]];
            }elseif($this->User['Type']=='1'){
                $Users = $this->toArray(DB::table('user')->where('ParentId', $this->User['uid'])->get());
                $result = ['outcome'=>true,'route'=>'panel.Users.List','data'=>[
                    'Users'=>$Users,
                    'Type'=>'managers'
                ]];            
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function Agents(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Users = $this->toArray(DB::table('user')->Where('Type','0')->get());
                foreach($Users as $key => $User){
                    $Users[$key]['Parent'] = (!empty($User['ParentId']))? $this->toArray(DB::table('agency')->where('uid', $User['ParentId'])->first()) : NULL ;
                }
                $result = ['outcome'=>true,'route'=>'panel.Users.List','data'=>[
                    'Users'=>$Users,
                    'Type'=>'agents'
                ]];
            }elseif($this->User['Type']=='1'){
                $Users = $this->toArray(DB::table('user')->where('ParentId', $this->User['uid'])->get());
                foreach($Users as $key => $User){
                    $Users[$key]['Parent'] = (!empty($User['ParentId']))? $this->toArray(DB::table('agency')->where('uid', $User['ParentId'])->first()) : NULL ;
                }
                $result = ['outcome'=>true,'route'=>'panel.Users.List','data'=>[
                    'Users'=>$Users,
                    'Type'=>'agents'
                ]];            
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function EditUser($uid){
        if (!empty($this->User)) {
            if ($this->User['Type']!='0' || $uid == $this->User['uid']) {
                $Users = DB::table('user');
                $Agencies = DB::table('agency');
                if ($this->User['Type']=='1') {
                    $Users = $Users->where('ParentId', $this->User['uid']);
                    $Agencies = $Agencies->where('ParentId', $this->User['uid']);
                }
                $User = $this->toArray(DB::table('user')->where('uid',$uid)->first());
                $Users = $this->toArray($Users->get());
                $Agencies = $this->toArray($Agencies->get());
                $result = ['outcome'=>true,'route'=>'panel.Users.Edit','data'=>[
                    'User'=>$User,
                    'Users'=>$Users,
                    'Agencies'=>$Agencies
                ]];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function Sliders(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Sliders = $this->toArray(DB::table('slider')->get());
                $result = ['outcome'=>true,'route'=>'panel.Sliders.List','data'=>[
                    'Sliders'=>$Sliders,
                ]];           
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function NewSlider(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $result = ['outcome'=>true,'route'=>'panel.Sliders.New'];           
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function EditSlider($uid){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Slider = $this->toArray(DB::table('slider')->where('uid',$uid)->first());
                $result = ['outcome'=>true,'route'=>'panel.Sliders.Edit','data'=>[
                    'Slider'=>$Slider,
                ]];           
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function Media(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Media = $this->toArray(DB::table('gallery')->get());
                $result = ['outcome'=>true,'route'=>'panel.Media.List','data'=>[
                    'Media'=>$Media,
                ]];           
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function NewMedia(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $result = ['outcome'=>true,'route'=>'panel.Media.New'];           
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    public function EditMedia($uid){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Media = $this->toArray(DB::table('gallery')->where('uid',$uid)->first());
                $result = ['outcome'=>true,'route'=>'panel.Media.Edit','data'=>[
                    'Media'=>$Media,
                ]];           
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function Services(){
        if (!empty($this->User)) {
            $Categories = json_decode(json_encode(DB::table('category')->where('Lang',$this->Lang)->where('Status', '1')->get()), true);
            foreach($Categories as $key => $Category){
                $Treatments= json_decode(json_encode(DB::table('treatment')->where('ParentId', $Category['Id'])->get()), true);
                $Categories[$key]['Treatments'] = $Treatments;
            }
            $result = ['outcome'=>true,'route'=>'panel.Services','data'=>[
                'Categories'=>$Categories
            ]];
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'], $result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function NewManager(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $result = ['outcome'=>true,'route'=>'panel.Users.New','data'=>['Type'=>'Manager']];           
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function NewAgent(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $result = ['outcome'=>true,'route'=>'Users.Sliders.New','data'=>['Type'=>'Agent']];   
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function Doctors(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Doctors = $this->toArray(DB::table('doctor')->get());
                $result = ['outcome'=>true,'route'=>'panel.Doctors.List','data'=>[
                    'Doctors'=>$Doctors,
                ]];           
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function NewDoctor(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $result = ['outcome'=>true,'route'=>'panel.Doctors.New'];           
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    public function EditDoctor($uid){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Doctor = $this->toArray(DB::table('doctor')->where('uid',$uid)->first());
                $result = ['outcome'=>true,'route'=>'panel.Doctors.Edit','data'=>[
                    'Doctor'=>$Doctor,
                ]];           
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
            }
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function WebsiteSettings(){
        if ($this->User['Type']=='2') {
            $Settings = $this->toArray(DB::table('main')->first());
            $result = ['outcome'=>true,'route'=>'panel.Website.Settings','data'=>[
                'Settings'=>$Settings,
            ]]; 
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function ContactInfo(){
        if ($this->User['Type']=='2') {
            $Settings = $this->toArray(DB::table('main')->first());
            $result = ['outcome'=>true,'route'=>'panel.Website.Contact','data'=>[
                'Settings'=>$Settings,
            ]]; 
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function Packages(){
        if ($this->User['Type']=='2') {
            $Packages = $this->toArray(DB::table('package')->where('Lang', $this->Lang)->get());
            $result = ['outcome'=>true,'route'=>'panel.Packages.List','data'=>[
                'Packages'=>$Packages,
            ]]; 
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function EditPackage($uid){
        if ($this->User['Type']=='2') {
            $Package = $this->toArray(DB::table('package')->where('uid',$uid)->first());
            $result = ['outcome'=>true,'route'=>'panel.Packages.Edit','data'=>[
                'Package'=>$Package,
            ]]; 
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function NewPackage(){
        if ($this->User['Type']=='2') {
            $result = ['outcome'=>true,'route'=>'panel.Packages.New','data'=>[
                'Type'=>false
            ]]; 
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function Features(){
        if ($this->User['Type']=='2') {
            $Features = $this->toArray(DB::table('feature')->where('Lang', $this->Lang)->get());
            foreach($Features as $key=>$Feature){
                $Features[$key]['Parent'] = $this->toArray(DB::table('package')->where('uid', $Feature['ParentId'] )->first());
            }
            
            $result = ['outcome'=>true,'route'=>'panel.Features.List','data'=>[
                'Features'=>$Features,
            ]]; 
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function EditFeature($uid){
        if ($this->User['Type']=='2') {
            $Packages = $this->toArray(DB::table('package')->where('Lang', $this->Lang)->get());
            $Feature = $this->toArray(DB::table('feature')->where('uid',$uid)->first());
            $result = ['outcome'=>true,'route'=>'panel.Features.Edit','data'=>[
                'Feature'=>$Feature,
                'Packages'=>$Packages
            ]]; 
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }
    ///
    public function NewFeature(){
        if ($this->User['Type']=='2') {
            $result = ['outcome'=>true,'route'=>'panel.Features.New','data'=>[
                'Type'=>false
            ]]; 
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
        }
        if ($result['outcome']) {
            return view($result['route'],$result['data']);
        }else {
            return redirect()->back()->with($result);
        }
    }

    // public function Clients(){ 
    //     if (!empty($this->User)) {
    //         $Clients = $this->toArray(DB::table('client')->get());
    //         foreach($Clients as $key=>$Client){
    //             $Clients[$key]['Agency'] = $this->toArray(DB::table('agency')->where('uid',$Client['Agency'])->first());
    //             $Clients[$key]['Appointments'] = $this->toArray(DB::table('appointment')->where('ClientId',$Client['uid'])->sum());
    //             dd($Clients[$key]['Appointments']);
    //         }
    //         $result = ['outcome'=>true,'route'=>'panel.Categories.List','data'=>[
    //             'Clients'=>$Clients
    //         ]];
    //     }else {
    //         $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
    //     }
    //     if ($result['outcome']) {
    //         return view($result['route'], $result['data']);
    //     }else {
    //         return redirect()->back()->with($result);
    //     }
    // }




    /*
    *   The End of the Class
    */
}

