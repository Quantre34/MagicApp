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
                        //$AppointmentsInner[$key1]['Clinic']=(array)DB::table('clinic')->where('uid', $Appointment['ClinicId'])->first();
                        $Appointments = $AppointmentsInner;
                    }
                    $Agencies[$key]['Appointments']=$Appointments;
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
                
                $result = ['outcome'=>true,'route'=>'panel.Dashboard-Manager','data'=>[
                    'Appointments'=>$Appointments,
                    'Categories'=>$Categories,
                    'SubManager'=>$SubManagers,
                    'AllAppointments'=>$AllAppointments,
                    'Agencies' => $Agencies
                ]];
            }elseif ($this->User['Type']=='0') {
                    $CountryCodes =  json_decode(file_get_contents('assets/json/CountryCodes.json'), true);
                    $Appointments = json_decode(json_encode(DB::table('appointment')->where('AgencyId', $this->User['Parent']['uid'])->where('Status', '1')->orderBy('AppointmentDate', 'asc')->get()), true);
                    foreach($Appointments as $key => $Appointment){
                        $Appointments[$key]['Client']=(array)DB::table('client')->where('uid', $Appointment['ClientId'])->first();
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
                        'CountryCodes'=>$CountryCodes
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
                    $Appointments[$key]['Treatment']=json_decode(json_encode(DB::table('treatment')->where('Id', $Appointment['TreatmentId'])->first()), true);
                    $Appointments[$key]['Agency']=json_decode(json_encode(DB::table('agency')->where('uid', $Appointment['AgencyId'])->first()), true);
                }
                $result = ['outcome'=>true,'route'=>'panel.Appointments','data'=>[
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
                        $AppointmentsInner[$key]['Clinic']=(array)DB::table('clinic')->where('uid', $Appointment['ClinicId'])->first();
                        $AppointmentsInner[$key]['Category']=(array)DB::table('category')->where('Id', $Appointment['CategoryId'])->first();
                        $AppointmentsInner[$key]['Treatment']=json_decode(json_encode(DB::table('treatment')->where('Id', $Appointment['TreatmentId'])->first()), true);
                        $AppointmentsInner[$key]['Agency']=$Agency;
                        $Appointments = $AppointmentsInner;
                    }
                }
                $result = ['outcome'=>true,'route'=>'panel.Appointments','data'=>[
                    'Appointments'=>$Appointments
                ]];
            }else {
                $Appointments = $this->toArray( DB::table('appointment')->where('AgencyId', $this->User['ParentId'])->where('Status', '1')->orderBy('create_at','desc')->get() );
                foreach($Appointments as $key => $Appointment){
                    // $Appointments[$key]['Clinic']=json_decode(json_encode(DB::table('clinic')->where('uid', $Appointment['ClinicId'])->first()), true);
                    $Appointments[$key]['Client']=json_decode(json_encode(DB::table('client')->where('uid', $Appointment['ClientId'])->first()), true);
                    $Appointments[$key]['Category']=json_decode(json_encode(DB::table('category')->where('Id', $Appointment['CategoryId'])->first()), true);
                    $Appointments[$key]['Treatment']=json_decode(json_encode(DB::table('treatment')->where('Id', $Appointment['TreatmentId'])->first()), true);
                    $Appointments[$key]['Agency']=json_decode(json_encode(DB::table('agency')->where('uid', $Appointment['AgencyId'])->first()), true);
                }
                $result = ['outcome'=>true,'route'=>'panel.Appointments','data'=>[
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
                $Clients = json_decode(json_encode(DB::table('client')->where('Status', '1')->get()), true);
                foreach($Clients as $key => $Client){
                    $Clients[$key]['Background'] = json_decode(json_encode(DB::table('background')->where('ClientId', $Client['uid'])->first()),true);
                }
                $result = ['outcome'=>true,'route'=>'panel.Clients','data'=>[
                    'Clients'=>$Clients
                ]];            
            }elseif($this->User['Type']=='1') {
                $Clients = json_decode(json_encode(DB::table('client')->where('Status', '1')->get()), true);
                foreach($Clients as $key => $Client){
                    $Clients[$key]['Background'] = json_decode(json_encode(DB::table('background')->where('ClientId', $Client['uid'])->first()),true);
                }
                $result = ['outcome'=>true,'route'=>'panel.Clients','data'=>[
                    'Clients'=>$Clients
                ]];
            }else {
                $Clients = json_decode(json_encode(DB::table('client')->where('Status', '1')->get()), true);
                foreach($Clients as $key => $Client){
                    $Clients[$key]['Background'] = $this->toArray( DB::table('background')->where('ClientId', $Client['uid'])->first() );
                    $Clients[$key]['Agency'] = $this->toArray( DB::table('appointment')->where('ClientId', $Client['uid'])->orderBy('create_at','desc')->first() );
                }
                $result = ['outcome'=>true,'route'=>'panel.Clients','data'=>[
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
    public function NewAppointmentPage(){
        if (!empty($this->User)){
            if ($this->User['Type']=='0') {
                $Categories = $this->toArray(DB::table('category')->where('Lang',$this->Lang)->where('Status', '1')->get());
                $Agency = $this->toArray(DB::table('agency')->where('uid', $this->User['ParentId'])->get());
                $Packages = $this->toArray(DB::table('package')->where('Lang',$this->Lang)->where('Status', '1')->get());
                foreach($Packages as $key => $Package){
                    $Packages[$key]['Features'] = $this->toArray( DB::table('feature')->where('Lang',$this->Lang)->where('ParentId', $Package['Id'])->where('Status','1')->orderBy('Order','asc')->get() );
                }
                $PaymentMethods = $this->toArray(DB::table('payment_method')->where('Status','1')->get());
                $result = ['outcome'=>true, 'route'=>'panel.NewAppointment', 'data'=>[
                    'Categories'=>$Categories,
                    'Packages'=>$Packages,
                    'PaymentMethods'=>$PaymentMethods,
                    'Agency'=>$Agency ?? []
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
            $Categories = json_decode(json_encode(DB::table('category')->where('Lang',$this->Lang)->where('Status', '1')->get()), true);
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
            $result = ['outcome'=>true,'route'=>'panel.Categories','data'=>[
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
    public function ManageCategories(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Clinics = DB::table('clinic')->get();
                $Categories = $this->toArray(DB::table('category')->where('Lang',$this->Lang)->where('Status','1')->get());
                foreach($Categories as $key => $Category){
                    $Categories[$key]['Treatments'] = $this->toArray(DB::table('treatment')->where('ParentId', $Category['Id'])->get());
                }
                $result = ['outcome'=>true,'route'=>'panel.ManageCategories','data'=>[
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
    public function ManageTreatments(){
        if (!empty($this->User)) {
            if ($this->User['Type']=='2') {
                $Treatments = $this->toArray(DB::table('treatment')->where('Lang',$this->Lang)->where('Status','1')->get());
                $Categories = $this->toArray(DB::table('category')->where('Lang',$this->Lang)->where('Status','1')->get());
                foreach($Categories as $key => $Category){
                    $Categories[$key]['Treatments'] = $this->toArray(DB::table('treatment')->where('ParentId', $Category['Id'])->get());
                    foreach($Treatments as $key => $Treatment){
                        if ($Treatment['ParentId']==$Category['Id']) {
                            $Treatments[$key]['Category'] = $Category;
                        }
                    }
                }

                $result = ['outcome'=>true,'route'=>'panel.ManageTreatments','data'=>[
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
    public function Articles(){
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
            $result = ['outcome'=>true,'route'=>'panel.OrderDetail','data'=>[
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
    // public function MainTreatments(){
    //     return view('main.Treatments');
    // }
    // ///
    // public function TreatmentDetail($Slug){
    //     $data = $this->toArray(DB::table('treatment')->where('Slug',$Slug)->first());
    //     return view('main.TreatmentDetail',['Treatment'=>$data]);
    // }
    // ///
    // public function Blogs(){
    //     $Blogs = $this->toArray(DB::table('blog')->where('Status','1')->get());
    //     return view('main.Blogs',['Blogs'=>$Blogs]);
    // }




    /*
    *   The End of the Class
    */
}

