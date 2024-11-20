<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Main;
use App\Models\Clinic;
use App\Models\Client;
use Lang;
use App;

/*
* @return <json>
*/
class AjaxController extends Controller
{
    function __construct(){

        $this->action = request('action');
        $this->Lang = @$_SESSION['Locale'];
        if (!empty($_SESSION['User'])){
            $this->User = $_SESSION['User'];
        }

    }
    /*
    * @param <request>
    * @return <json>
    */
    public function Index(Request $Request){
        /* Beginning of the Index Method */


        if ($this->action=='ChangeLang') {
            $_SESSION['Locale'] = request('Lang');
            return ['outcome'=>true,'route'=>' ', 'NoAlert'=>true];
        }
        if ($this->action == 'AuthSync') {
            if (!empty($_SESSION['User'])) {
                $User = json_decode(json_encode(DB::table('user')->where('uid', $this->User['uid'])->first()), true);
                $User['Permission'] = json_decode($User['Permission'], true);
                $Agent = (array)DB::table('agency')->where('uid', $User['ParentId'])->where('Status','1')->first();
                $User['Parent'] = ($User['Type']=='0')? $Agent : false;
                if($_SESSION['User'] == $User){
                    $result = ['outcome'=>true];
                }else {
                    $_SESSION['User'] = $User;
                    $_SESSION['User']['Permission'] = $User['Permission'];
                    $result = ['outcome'=>false,'route'=>' '];
                }
            }else {
                $result = ['outcome'=>false,'route'=>' '];
            }
            return response()->json($result, 200);
        }
        if($this->action=='GetMyNotifications'){
            if (!empty($this->User)) {
                $Notifications = $this->toArray(DB::table('notification')->where('Target','LIKE','%'.$this->User['uid'].'%')->limit(15)->get());
                $result = ['outcome'=>true,'data'=>$Notifications];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        if ($this->action=='Login') {
            $Mail = htmlspecialchars($_POST['Mail']);
            $Password = htmlspecialchars($_POST['Password']);
            $User =$this->toArray( DB::table('user')->where('Mail', $Mail)->where('Password', $this->Encrypt($Password))->first() );
            if (!empty($User)) {
                $Agent = $this->toArray(DB::table('agency')->where('uid', $User['ParentId'])->where('Status','1')->first());
                $Agent = ($User['Type'] == '0')? $Agent : true;
                if ($Agent) {
                    $_SESSION['User']=$User;
                    $_SESSION['User']['Parent'] = ($User['Type'] == '0')? $Agent : false;
                    $result = ['outcome'=>true,'route'=>'/panel','Message'=>Lang::get('Base.SessionInitiated')];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.AgencyNotFound')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UserNotFound')];
            }
            return response()->json($result);
        }
        ///
        if ($this->action=='SignUp') {
            $data = [
                'FullName'=>htmlspecialchars(@$_POST['FullName']),
                'Title'=>htmlspecialchars(@$_POST['Title']),
                'CountryCode'=>htmlspecialchars(@$_POST['CountryCode']),
                'ReferenceCode'=>htmlspecialchars(request('ReferenceCode')),
                'Mail'=>htmlspecialchars(@$_POST['Mail']),
                'Cell'=>$this->CellFormatter($_POST['Cell'])
            ];
            $Check = $this->isAnyEmpty($data,['ReferenceCode']);
            if (!$Check) {
                $this->SendMail('info@medescare.com','Signup log',json_encode($data));
                $Exist = DB::table('application')->where('Cell', $data['Cell'])->where('Mail',$data['Mail'])->where('Status','1')->first();
                if (!$Exist) {
                    $Apply = DB::table('application')->insert($data);
                    if ($Apply) {
                        $result = ['outcome'=>true,'Message'=>Lang::get('Application.Thanks'),'route'=>'/Login'];
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.InternalError')];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.AlreadyApplied')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields'),'tag'=>$Check];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetTreatments') {
            if (!empty($this->User)) {
                $Id = htmlspecialchars($_POST['Id']);
                if ($Id=='All') {
                    $Categories = $this->toArray(DB::table('treatment')->where('Lang', $this->Lang)->where('Status','1')->get());
                    foreach($Categories as $key => $Category ){
                        $Categories[$key]['Treatments'] = $this->toArray( DB::table('treatment')->where('Lang', $this->Lang)->where('Status', '1')->get() );
                    }
                }else {
                    $Categories = $this->toArray(DB::table('category')->where('Lang', $this->Lang)->where('Id', $Id)->get());
                    foreach($Categories as $key => $Category ){
                        $Categories[$key]['Treatments'] = $this->toArray( DB::table('treatment')->where('ParentId', $Category['Id'])->where('Lang', $this->Lang)->where('Status', '1')->get() );
                    }
                }
                $result = ['outcome'=>true, 'data'=>$Categories];
            }else{
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action == 'GetClinicsOf') {
            $data = [];
            $TreatId = htmlspecialchars(request('Treatment'));
            if(!empty($this->User)){
                $Clinics = $this->toArray( DB::table('clinic')->where('Status', '1')->get() );
                foreach($Clinics as $Clinic){
                    foreach(json_decode($Clinic['Treatments'], true) as $Treatment ){
                        if ($Treatment['Id'] == $TreatId) {
                            $Clinic['TreatmentCost'] = $Treatment['Cost'];
                            $data[] = $Clinic;
                            break;
                        }
                    }
                }
                $result = ['outcome'=>true, 'data'=>$data];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return $result;
        }
        ///
        if ($this->action == 'GetAppointment') {
            if (!empty($this->User)) {
                $Id = htmlspecialchars($_POST['Id']);
                $Appointment = $this->toArray(DB::table('appointment')->where('Id', $Id)->first());
                $Appointment['AppointmentDate'] = date('Y-m-d',strtotime($Appointment['AppointmentDate']));
                $Client = $this->toArray( DB::table('client')->where('uid', $Appointment['ClientId'])->first() );
                $Clinic = $this->toArray( DB::table('clinic')->where('uid', $Appointment['ClinicId'])->first() );
                $Category = $this->toArray( DB::table('category')->where('Id', $Appointment['CategoryId'])->first() );
                $Treatment = $this->toArray( DB::table('treatment')->where('Id', $Appointment['TreatmentId'])->first() );
                $Appointment = array_merge($Appointment,[
                                    'Client'=>$Client,
                                    'Category'=>$Category,
                                    'Treatment'=>$Treatment,
                                    'Clinic'=>$Clinic
                                ]);
                $result = ['outcome'=>true,'data'=>$Appointment];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return $result;
        }
        ///
        if ($this->action=='NewAppointment') {
            $data = [
                'Identification'   => htmlspecialchars(@$_POST['Identification']),
                'FirstName'        => htmlspecialchars(@$_POST['FirstName']),
                'LastName'         => htmlspecialchars(@$_POST['LastName']),
                'Mail'             => htmlspecialchars(@$_POST['Mail']),
                'Cell'             => htmlspecialchars(@$_POST['Cell']),
                'Mail'             => htmlspecialchars(@$_POST['Mail']),
                'PrevDiagnosis'    => htmlspecialchars(@$_POST['PrevDiagnosis']),
                'PrevOperations'   => htmlspecialchars(@$_POST['PrevOperations']),
                'Smoke'            => htmlspecialchars(@$_POST['Smoke']),
                'Alcohol'          => htmlspecialchars(@$_POST['Alcohol']),
                'Alergy'           => htmlspecialchars(@$_POST['Alergy']),
                'Category'         => htmlspecialchars(@$_POST['Category']),
                'Treatment'        => htmlspecialchars(@$_POST['Treatment']),
                'Date'             => htmlspecialchars(@$_POST['Date']),
                'Package'          => htmlspecialchars(@$_POST['Package']),
                'Gender'           => htmlspecialchars(@$_POST['Gender']),
                'Birth'            => htmlspecialchars(@$_POST['Birth']),
                'Height'           => htmlspecialchars(@$_POST['Height']),
                'Weight'           => htmlspecialchars(@$_POST['Weight']),
                'SmokeFrequency'   => htmlspecialchars(@$_POST['SmokeFrequency']),
                'AlcoholFrequency' => htmlspecialchars(@$_POST['AlcoholFrequency']),
                'AlergyType'       => htmlspecialchars(@$_POST['AlergyType']),
                'AmountToPay'      => htmlspecialchars(@$_POST['AmountToPay']),
                'AgencyFee'        => intval($_POST['AgencyFee']),
                // 'CommissionRate'   => intval($_POST['CommissionRate']),
                'CountryCode'      => htmlspecialchars(@$_POST['CountryCode']),
                'PaymentMethod'    => htmlspecialchars(@$_POST['PaymentMethod']),
                'Features'         => explode(',', $_POST['Features'] ?? ''),
                'Status'            => htmlspecialchars(request('Status')),
            ];
            $exceptions = [
                ($data['Smoke']!='True')? 'SmokeFrequency': '---',
                ($data['Alcohol']!='True')? 'AlcoholFrequency': '---',
                ($data['Alergy']!='True')? 'AlergyType': '---',
            ];
            if (!empty($this->User)) {
                $Control = $this->isAnyEmpty($data,$exceptions);
                if (!$Control) {
                    $Agency = DB::table('agency')->where('uid', $this->User['ParentId'])->first();
                    $Client = DB::table('client')->where('Identification',$data['Identification'])->first();
                    if ($Client) {
                        DB::table('client')->where('uid', $Client->uid)->update([
                            'Mail'=>$data['Mail'],
                            'Cell'=>$this->CellFormatter($data['Cell']),
                            'Height'=>$data['Height'],
                            'Weight'=>$data['Weight']
                        ]);
                        $uid = $Client->uid;
                    }else {
                        $uid = $this->UniqueId(50);
                        $uid = $this->GenerateUid();
                        $Client = (object)[];
                        $Client->Id = DB::table('client')->insertGetId([
                            'uid'=>$uid,
                            'FirstName'=>$data['FirstName'],
                            'LastName'=>$data['LastName'],
                            'Identification'=>$data['Identification'],
                            'Mail'=>$data['Mail'],
                            'Cell'=>$this->CellFormatter($data['Cell']),
                            'Gender'=> ($data['Gender']=='Male')? '1' : '0' ,
                            'BirthDate'=> date('Y-m-d', strtotime($data['Birth'])),
                            'Height'=>$data['Height'],
                            'Weight'=>$data['Weight']

                        ]);
                    }
                    $Background = DB::table('background')->where('ClientId', $uid)->first();
                    if ($Background) {
                        DB::table('background')->where('Id', $Background->Id)->update([
                            'PrevDiagnosis'=>$data['PrevDiagnosis'],
                            'PrevOperations'=>$data['PrevOperations'],
                            'Alergy'=> ($data['Alergy']=='True')? $data['AlergyType'] : NULL,
                            'Smoke'=> ($data['Smoke']=='True')? $data['SmokeFrequency'] : NULL,
                            'Alcohol'=> ($data['Alcohol']=='True')? $data['AlcoholFrequency'] : NULL
                        ]);
                    }else {
                        DB::table('background')->insert([
                            'ClientId'=>$uid,
                            'PrevDiagnosis'=>$data['PrevDiagnosis'],
                            'PrevOperations'=>$data['PrevOperations'],
                            'Alergy'=> ($data['Alergy']=='True')? $data['AlergyType'] : NULL,
                            'Smoke'=> ($data['Smoke']=='True')? $data['SmokeFrequency'] : NULL,
                            'Alcohol'=> ($data['Alcohol']=='True')? $data['AlcoholFrequency'] : NULL
                        ]);
                    }
                    $Cost = 0;
                    $AppUid = $this->UniqueId(30);
                    $AppUid = $data['CountryCode'] .'-'. ($Agency->Id ?? '0000') .'-'. $Client->Id . '-'. substr(rand(0,1000),-3);
                    $Package = DB::table('package')->where('Id', $data['Package'])->first();
                    $Treatment = DB::table('treatment')->where('Id', $data['Treatment'])->first();
                    foreach($data['Features'] as $key => $Id){
                        $Feature = $this->toArray( DB::table('feature')->where('Id', $Id)->first() );
                        $Cost = $Cost + ( ($Feature['Multiply']=='1')? (intval($Feature['Cost']) * $Treatment->EstimatedTime) : intval($Feature['Cost']) );
                    }
                    $Cost = $Cost + $Treatment->Cost + (($Treatment->Cost * $Package->Rate) / 100);

                    $New = DB::table('appointment')->insertGetId([
                        'uid'=>$AppUid,
                        'ClientId'=>$uid,
                        'UserId'=>$this->User['uid'],
                        'CategoryId'=>$data['Category'],
                        'TreatmentId'=>$data['Treatment'],
                        'TreatmentCost'=>$Treatment->Cost,
                        'AgencyId'=>$Agency->uid ?? NULL,
                        'PackageId'=>$data['Package'],
                        'Features'=>json_encode($data['Features']),
                        'AppointmentDate'=>date('Y-m-d', strtotime($data['Date'])),
                        'Cost'=>$Cost,
                        'PaidAmount'=>$data['AmountToPay'],
                        'AgencyFee'=>$data['AgencyFee'],
                        // 'CommissionRate'=>$data['CommissionRate'],
                        'PaymentMethod'=> $data['PaymentMethod'],
                        'Status'=>$data['Status']
                    ]);
                    if ($New) {
                        // $Content = "Sayın {$data['FirstName']} {$data['LastName']}, {$Agency->Id} numaralı bayi tarafından adınıza oluşturulan randevu detaylarına aşağıdaki linkten ulaşabilirsiniz. Bir sorunuz olması durumunda whatsapp hattımız (90-537-979-7206) üzerinden, Medescare.com üzerinden beya consult.medescare.com adresine üzerinden bizimle iletişime geçebilirsiniz. Bizi tercih ettiğiniz için memnun kalacaksınız... sağlıkla kalın :)   ";
                        // $template = $this->GetFileContent('/assets/docs/NewAppointment.html');
                        // $Content = str_replace('{Message}', $Content, $template);
                        // $Content = str_replace('{uid}', $AppUid, $Content);
                        $result = ['outcome'=>true,'AppointmentId'=>$New,'uid'=>$AppUid];
                        $this->Notify('System', [$Agency->ParentId], "<a href=\"/panel/Appointments/{$AppUid}\">New Appointment is Scheduled by {$this->User['FirstName']}</a>");
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields').', <a href="#'.$Control.'""> <span class="text-danger">['.$Control.']</span></a> ','tag'=>$Control];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='InsertAgency') {
            
            if (!empty($this->User)) {
                if ($this->User['Type']=='1' || $this->User['Type']=='2') {
                    $data = [
                        'uid'=>$this->UniqueId(30),
                        'Title'=>htmlspecialchars(request('Title')),
                        'Logo'=>htmlspecialchars(request('Logo') ?? '/assets/upload/default-logo.png'),
                        'Mail'=>htmlspecialchars(request('Mail')),
                        'Tell'=>$this->CellFormatter(request('Tell')),
                        'ParentId'=> ($this->User['Type']=='1')? $this->User['uid'] : ((request('ParentId') != 'null')? request('ParentId') : NULL),
                        'Whatsapp'=>$this->CellFormatter(request('Whatsapp')),
                        'Instagram'=>htmlspecialchars(request('Instagram')),
                        'WebPage'=>htmlspecialchars(request('WebPage')),
                        'Country'=>htmlspecialchars(request('Country')),
                        'Province'=>htmlspecialchars(request('Province')??'-'),
                        'City'=>htmlspecialchars(request('City')??'-'),
                        'Adress'=>htmlspecialchars(request('Adress')),
                        'VatNumber'=>htmlspecialchars(request('VatNumber')),
                        'CommissionRate'=>intval( request('CommissionRate') ?? 0 ),
                        'AgencyFee' => (intval(request('AgencyFee') ?? 0) <= 15)? intval(request('AgencyFee')) : 1,
                        'Status'=>htmlspecialchars(request('Status')),
                        'DefaultUser'=> request('DefaultUser') ?? false,
                        'FirstName'=>htmlspecialchars(request('FirstName')),
                        'LastName'=>htmlspecialchars(request('LastName'))
                    ];
                    $exceptions = ['Tell','Whatsapp','Instagram','WebPage','ParentId'];
                    if ($data['DefaultUser']) {
                        $User = [
                            'uid'=>$this->UniqueId(30),
                            'Password'=>$this->Encrypt($this->UniqueId(7)),
                            'Type'=>'0',
                            'FirstName'=>$data['FirstName'],
                            'LastName'=>$data['LastName'],
                            'Mail'=>$data['Mail'],
                            'CommissionRate'=>request('CommissionRate') ?? 0,
                            'Cell'=>$data['Tell'],
                            'ParentId'=>$data['uid'],
                            'Status'=>'1'
                        ];
                    }else {
                        $exceptions[] = 'FirstName';
                        $exceptions[] = 'LastName';
                    }
                    $isAnyEmpty = $this->isAnyEmpty($data, $exceptions);
                    if (!$isAnyEmpty) {
                        $Query = DB::table('agency')->insert([
                            'uid'=>$data['uid'],
                            'Title'=>$data['Title'],
                            'Logo'=>$data['Logo'],
                            'Mail'=>$data['Mail'],
                            'Tell'=>$data['Tell'],
                            'ParentId'=>$data['ParentId'],
                            'Whatsapp'=>$data['Whatsapp'],
                            'Instagram'=>$data['Instagram'],
                            'WebPage'=>$data['WebPage'],
                            'Country'=>$data['Country'],
                            'Province'=>$data['Province'],
                            'City'=>$data['City'],
                            'Adress'=>$data['Adress'],
                            'VatNumber'=>$data['VatNumber'],
                            'CommissionRate'=>$data['CommissionRate'],
                            'AgencyFee' =>$data['AgencyFee'],
                            'Status'=>$data['Status'],
                        ]);
                        if ($data['DefaultUser']) {
                            $Query = DB::table('user')->insert($User);
                            $template = $this->GetFileContent((str_contains($_SERVER['HTTP_HOST'], 'medescare'))? '/assets/docs/UserRegistration.html' : '/assets/docs/UserRegistration-Magic.html');
                            $Content = str_replace('{Mail}', $User['Mail'], $template);
                            $Content = str_replace('{Password}', $this->Decrypt($User['Password']), $Content);
                            $result = $this->SendMail($User['Mail'],Lang::get('Base.WelcomeMessage'), $Content);
                        }
                        if ($Query) {
                            $result = ['outcome'=>true,'route'=>'javascript:Reset(),GetAgencies();'];
                            $this->Notify('System', [$data['ParentId']], "<a href=\"/panel/Manage/Agencies?Agency={$data['uid']}\">{$data['Title']} is Added by {$this->User['FirstName']}</a>");
                        }else {
                            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                        }
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields'),'tag'=>$isAnyEmpty];
                    }

                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest'),'route'=>' '];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='AlterAgency') {
            if (!empty($this->User)) {
                if ($this->User['Type']!='0' || $this->User['Parent']['uid'] == request('uid') )  {
                    $parent = $this->toArray(DB::table('agency')->where('uid',request('uid'))->first());
                    if ($this->User['Type']=='1') {
                        $parentId = $this->User['uid'];
                    }elseif($this->User['Type']=='0'){
                        $parentId = $this->User['Parent']['uid'];
                    }else {
                        $parentId = request('ParentId') ?? NULL;
                    }
                    $data = [
                        'uid'=>htmlspecialchars(request('uid')),
                        'Title'=>htmlspecialchars(request('Title')),
                        'Logo'=>htmlspecialchars(request('Logo')??'assets/upload/default-logo.png'),
                        'Mail'=>htmlspecialchars(request('Mail')),
                        'Tell'=>$this->CellFormatter(request('Tell')),
                        'ParentId'=> $parentId,
                        'Whatsapp'=>$this->CellFormatter(request('Whatsapp')),
                        'Instagram'=>htmlspecialchars(request('Instagram')),
                        'WebPage'=>htmlspecialchars(request('WebPage')),
                        'Country'=>htmlspecialchars(request('Country')),
                        // 'Province'=>htmlspecialchars(request('Province')),
                        // 'City'=>htmlspecialchars(request('City')),
                        'Adress'=>htmlspecialchars(request('Adress')),
                        'VatNumber'=>htmlspecialchars(request('VatNumber')),
                        'CommissionRate'=>intval( request('CommissionRate') ?? 0 ),
                        'AgencyFee' => (intval(request('AgencyFee') ?? 0) <= 15)? intval(request('AgencyFee')) : 1,
                        'Status'=>htmlspecialchars(request('Status'))
                    ];
                    $isAnyEmpty = $this->isAnyEmpty($data,['ParentId','Fax','Whatsapp','WebPage','Instagram']);
                    if (!$isAnyEmpty) {
                        $Query = DB::table('agency')->where('uid', $data['uid'])->update($data);
                        if ($Query) {
                            $result = ['outcome'=>true,'route'=>'javascript:Reset(),GetAgencies();'];
                        }else {
                            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                        }
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields'),'tag'=>$isAnyEmpty];
                    }

                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest'),'route'=>' '];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetAgencies') {
            if (!empty($this->User)) {
                if($this->User['Type']=='1'){
                    $Query = json_decode(json_encode(DB::table('agency')->where('ParentId', $this->User['uid'])->get()), true);
                }else {
                    $Query = json_decode(json_encode(DB::table('agency')->get()), true);
                }
                if ($Query) {
                    $result = ['outcome'=>true,'data'=>$Query];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetClinics') {
            if (!empty($this->User)) {
                $Query = json_decode(json_encode(DB::table('clinic')->get()), true);
                if ($Query) {
                    $result = ['outcome'=>true,'data'=>$Query];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetCategories') {
            if (!empty($this->User)) {
                $Query = json_decode(json_encode(DB::table('category')->where('Lang', $this->Lang)->where('Status','1')->get()), true);
                if ($Query) {
                    $result = ['outcome'=>true,'data'=>$Query];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetAgencyInfo') {
            if (!empty($this->User)) {
                $uid = htmlspecialchars($_POST['uid']);
                $Query = json_decode(json_encode(DB::table('agency')->where('uid', $uid)->first()), true);
                if ($Query) {
                    $result = ['outcome'=>true,'data'=>$Query];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetClinicInfo') {
            if (!empty($this->User)) {
                $uid = htmlspecialchars($_POST['uid']);
                $Query = json_decode(json_encode(DB::table('clinic')->where('uid', $uid)->first()), true);
                if ($Query) {
                    $result = ['outcome'=>true,'data'=>$Query];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetCategoryInfo') {
            if (!empty($this->User)) {
                $uid = htmlspecialchars($_POST['Id']);
                $Query = json_decode(json_encode(DB::table('category')->where('Id', $uid)->first()), true);
                if ($Query) {
                    $result = ['outcome'=>true,'data'=>[
                        'Id'=>$Query['Id'],
                        'Title'=>$Query['Title'],
                        'Slug'=>$Query['Slug'],
                        'Img'=>$Query['Img'] ?? '/assets/img/Default-Package.jpg',
                        'Status'=>$Query['Status']
                    ]];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='InsertClinic') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $Treatments = $_POST['Treatment'] ?? [];
                    $Treatment = NULL;
                    foreach($Treatments as $key => $value){;
                        $BaseValue = explode('-', $value);
                        $Treatment[$key] = [
                            'Id'=>$BaseValue[0],
                            'Cost'=>$BaseValue[1]
                        ];
                    }
                    $data = [
                        'uid'=>$this->UniqueId(30),
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Logo'=>htmlspecialchars($_POST['Logo']),
                        'Mail'=>htmlspecialchars($_POST['Mail']),
                        'Tell'=>$this->CellFormatter($_POST['Tell']),
                        'Fax'=>$this->CellFormatter($_POST['Fax']),
                        'Country'=>htmlspecialchars($_POST['Country']),
                        'Province'=>htmlspecialchars($_POST['Province']),
                        'City'=>htmlspecialchars($_POST['City']),
                        'Adress'=>htmlspecialchars($_POST['Adress']),
                        'Rate'=>htmlspecialchars($_POST['Rate']),
                        'Categories'=>json_encode($_POST['Category']??[]),
                        'Treatments'=>json_encode($Treatment),
                        'CommissionRate'=>htmlspecialchars($_POST['CommissionRate'])
                    ];
                    $isAnyEmpty = $this->isAnyEmpty($data);
                    if (!$isAnyEmpty) {
                        $Query = DB::table('clinic')->insert($data);
                        if ($Query) {
                            $result = ['outcome'=>true,'route'=>'javascript:Reset(),GetClinics();'];
                        }else {
                            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                        }
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields'),'tag'=>$isAnyEmpty];
                    }

                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest'),'route'=>' '];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='AlterClinic') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $Treatments = $_POST['Treatment'] ?? [];
                    $Treatment = NULL;
                    foreach($Treatments as $key => $value){
                        $BaseValue = explode('-', $value);
                        $Treatment[$key] = [
                            'Id'=>$BaseValue[0],
                            'Cost'=>$BaseValue[1]
                        ];
                    }
                    $data = [
                        'uid'=>htmlspecialchars($_POST['uid']),
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Logo'=>htmlspecialchars($_POST['Logo']),
                        'Mail'=>htmlspecialchars($_POST['Mail']),
                        'Tell'=>$this->CellFormatter($_POST['Tell']),
                        'Fax'=>$this->CellFormatter($_POST['Fax']),
                        'Country'=>htmlspecialchars($_POST['Country']),
                        'Province'=>htmlspecialchars($_POST['Province']),
                        'City'=>htmlspecialchars($_POST['City']),
                        'Adress'=>htmlspecialchars($_POST['Adress']),
                        'Rate'=>htmlspecialchars($_POST['Rate']),
                        'Categories'=>json_encode($_POST['Category']??[]),
                        'Treatments'=>json_encode($Treatment),
                        'CommissionRate'=>intval($_POST['CommissionRate']),
                        'update_at' => date('Y-m-d H:i:s')
                    ];
                    $isAnyEmpty = $this->isAnyEmpty($data);
                    if (!$isAnyEmpty) {
                        $Query = DB::table('clinic')->where('uid', $data['uid'])->update($data);
                        if ($Query) {
                            $result = ['outcome'=>true,'route'=>'javascript:Reset(),GetClinics();'];
                        }else {
                            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                        }
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields'),'tag'=>$isAnyEmpty];
                    }

                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest'),'route'=>' '];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='InsertCategory') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $data = [
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Img'=>htmlspecialchars(($_POST['Img'] ?? '/assets/img/Default-Package.jpg')),
                        'Lang'=>$this->Lang,
                        'Status'=>htmlspecialchars($_POST['Status']),
                        'update_at' => date('Y-m-d H:i:s')
                    ];
                    $Check = $this->isAnyEmpty($data);
                    if (!$Check) {
                        $Query = DB::table('category')->insert($data);
                        if ($Query) {
                            $result = ['outcome'=>true,'route'=>'javascript:Reset(),GetCategories();'];
                        }else {
                            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                        }
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields')];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='AlterCategory') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $data = [
                        'Id'=>htmlspecialchars($_POST['Id']),
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Slug'=>htmlspecialchars($_POST['Slug']),
                        'Img'=>htmlspecialchars(($_POST['Img']??'/assets/img/Default-Package.jpg')),
                        'Lang'=>$this->Lang,
                        'Status'=>htmlspecialchars($_POST['Status']),
                        'update_at' => date('Y-m-d H:i:s')
                    ];
                    $Check = $this->isAnyEmpty($data);
                    if (!$Check) {
                        $Query = DB::table('category')->where('Id', $data['Id'])->update($data);
                        if ($Query) {
                            $result = ['outcome'=>true,'route'=>'/panel/categories'];
                        }else {
                            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                        }
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields')];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action == 'GetAppointments') {
            
            if (!empty($this->User)) {
                if ( $this->User['Type']=='2') {
                    $Parameters = $_POST['Parameter'];
                    $query = [];
                    $Query = [];
                    if ($Parameters == 'All') {
                        $query[] = json_decode(json_encode(DB::table('appointment')->where('Status','1')->get()),true);
                    }else {
                        foreach($Parameters as $key => $value){
                            if ($key=='AppointmentDate') {
                                $value = date('Y-m-d', strtotime($value));
                            }
                            $query[] = json_decode(json_encode(DB::table('appointment')->where($key ,$value)->get()),true);
                        }
                    }
                    foreach($query as $Appointments){
                        foreach($Appointments as $key => $value){
                            $value['Client'] = json_decode(json_encode(DB::table('client')->where('uid', $value['ClientId'])->first()),true);
                            $value['Treatment'] = json_decode(json_encode(DB::table('treatment')->where('Id', $value['TreatmentId'])->first()),true);
                            $value['Category'] = json_decode(json_encode(DB::table('category')->where('Id', $value['CategoryId'])->first()),true);
                            $Query[] = $value;
                        }
                    }
                    
                    $result = ['outcome'=>true,'data'=>$Query];
                }elseif($this->User['Type']=='1'){
                    $Query = [];
                    $Parameters = $_POST['Parameter'];
                    $Agencies = DB::table('agency')->where('ParentId', $this->User['uid'])->get();
                    foreach($Agencies as $Agency){
                        $query = [];
                        if ($Parameters == 'All') {
                            $query[] = json_decode(json_encode(DB::table('appointment')->where('AgencyId', $Agency->uid)->where('Status','1')->get()),true);
                        }else {
                            foreach($Parameters as $key => $value){
                                if ($key=='AppointmentDate') {
                                    $value = date('Y-m-d', strtotime($value));
                                }
                                $query[] = json_decode(json_encode(DB::table('appointment')->where('AgencyId', $Agency->uid)->where($key ,$value)->get()),true);
                            }
                        }
                        foreach($query as $Appointments){
                            foreach($Appointments as $key => $value){
                                $value['Client'] = json_decode(json_encode(DB::table('client')->where('uid', $value['ClientId'])->first()),true);
                                $value['Treatment'] = json_decode(json_encode(DB::table('treatment')->where('Id', $value['TreatmentId'])->first()),true);
                                $value['Category'] = json_decode(json_encode(DB::table('category')->where('Id', $value['CategoryId'])->first()),true);
                                $Query[] = $value;
                            }
                        }
                    }
                    
                    $result = ['outcome'=>true,'data'=>$Query];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest'),'route'=>'/Logout'];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetApplicationInfo') {
            if (!empty($this->User)) {
                $Id = htmlspecialchars($_POST['Id']);
                $Query = json_decode(json_encode(DB::table('application')->where('Id', $Id)->first()), true);
                if ($Query) {
                    $result = ['outcome'=>true,'data'=>$Query];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='CompleteApplication') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='1' || $this->User['Type']=='2') {
                    $data = [
                        'uid'=>$this->UniqueId(30),
                        'Title'=>htmlspecialchars(request('Title')),
                        'Logo'=>htmlspecialchars(request('Logo') ?? '/assets/upload/default-logo.png'),
                        'Mail'=>htmlspecialchars(request('Mail')),
                        'Tell'=>$this->CellFormatter(request('Tell')),
                        'ParentId'=> ($this->User['Type']=='1')? $this->User['uid'] : ((request('ParentId') != 'null')? request('ParentId') : NULL),
                        'Whatsapp'=>$this->CellFormatter(request('Whatsapp')),
                        'Instagram'=>htmlspecialchars(request('Instagram')),
                        'WebPage'=>htmlspecialchars(request('WebPage')),
                        'Country'=>htmlspecialchars(request('Country')),
                        'Adress'=>htmlspecialchars(request('Adress')),
                        'VatNumber'=>htmlspecialchars(request('VatNumber')),
                        'CommissionRate'=>intval( request('CommissionRate') ?? 0 ),
                        'AgencyFee' => (intval(request('AgencyFee') ?? 0) <= 15)? intval(request('AgencyFee')) : 1,
                        'Status'=>htmlspecialchars(request('Status')),
                        'DefaultUser'=> request('DefaultUser') ?? false,
                        'FirstName'=>htmlspecialchars(request('FirstName')),
                        'LastName'=>htmlspecialchars(request('LastName'))
                    ];
                    $exceptions = ['Tell','Whatsapp','Instagram','WebPage','ParentId'];
                    if ($data['DefaultUser']) {
                        $User = [
                            'uid'=>$this->UniqueId(30),
                            'Password'=>$this->Encrypt($this->UniqueId(7)),
                            'Type'=>'0',
                            'FirstName'=>$data['FirstName'],
                            'LastName'=>$data['LastName'],
                            'Mail'=>$data['Mail'],
                            'CommissionRate'=>request('CommissionRate') ?? 0,
                            'Cell'=>$data['Tell'],
                            'ParentId'=>$data['uid'],
                            'Status'=>'1'
                        ];
                    }else {
                        $exceptions[] = 'FirstName';
                        $exceptions[] = 'LastName';
                    }
                    $isAnyEmpty = $this->isAnyEmpty($data, $exceptions);
                    if (!$isAnyEmpty) {
                        $Query = DB::table('agency')->insert([
                            'uid'=>$data['uid'],
                            'Title'=>$data['Title'],
                            'Logo'=>$data['Logo'],
                            'Mail'=>$data['Mail'],
                            'Tell'=>$data['Tell'],
                            'ParentId'=>$data['ParentId'],
                            'Whatsapp'=>$data['Whatsapp'],
                            'Instagram'=>$data['Instagram'],
                            'WebPage'=>$data['WebPage'],
                            'Country'=>$data['Country'],
                            'Adress'=>$data['Adress'],
                            'VatNumber'=>$data['VatNumber'],
                            'CommissionRate'=>$data['CommissionRate'],
                            'AgencyFee' =>$data['AgencyFee'],
                            'Status'=>$data['Status'],
                        ]);
                        if ($data['DefaultUser']) {
                            $Query = DB::table('user')->insert($User);
                            $template = $this->GetFileContent((str_contains($_SERVER['HTTP_HOST'], 'medescare'))? '/assets/docs/UserRegistration.html' : '/assets/docs/UserRegistration-Magic.html');
                            $Content = str_replace('{Mail}', $User['Mail'], $template);
                            $Content = str_replace('{Password}', $this->Decrypt($User['Password']), $Content);
                            $result = $this->SendMail($User['Mail'],Lang::get('Base.WelcomeMessage'), $Content);
                        }
                        if ($Query) {
                            DB::table('application')->where('Id', $_POST['uid'])->update(['Status'=>'2']);
                            $result = ['outcome'=>true,'route'=>'javascript:Reset(),GetAgencies();'];
                            $this->Notify('System', [$data['ParentId']], "<a href=\"/panel/Manage/Agencies?Agency={$data['uid']}\">{$data['Title']} is Added by {$this->User['FirstName']}</a>");
                        }else {
                            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                        }
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields'),'tag'=>$isAnyEmpty];
                    }

                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest'),'route'=>' '];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetApplications') {
            if (!empty($this->User)) {
                if ($this->User['Type'] == '2') {
                    $Query = $this->toArray(DB::table('application')->get());
                }else{
                    $Query = $this->toArray(DB::table('application')->where('ReferenceCode', $this->User['Invitation'])->get());
                }
                if ($Query) {
                    $result = ['outcome'=>true,'data'=>$Query];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='InsertTreatment') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $data = [
                        'uid'=>$this->UniqueId(30),
                        'Img'=>htmlspecialchars(request('Img') ?? '/assets/img/Default-Package.jpg'),
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Cost'=>intval($_POST['Cost']),
                        'EstimatedTime'=>intval($_POST['EstimatedTime']),
                        'ParentId'=>htmlspecialchars($_POST['Category']),
                        'Slug'=>htmlspecialchars($_POST['Slug']),
                        'Lang'=>$this->Lang,
                        'Status'=>htmlspecialchars($_POST['Status'])
                    ];
                    $Check = $this->isAnyEmpty($data);
                    if (!$Check) {
                        $Query = DB::table('treatment')->insert($data);
                        if ($Query) {
                            $result = ['outcome'=>true,'route'=>'javascript:Reset(),GetTreatments();'];
                        }else {
                            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                        }
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields'),'tag'=>$Check];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest'),'route'=>' '];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetTreatmentInfo') {
            if (!empty($this->User)) {
                $Id = htmlspecialchars($_POST['Id']);
                $Query = $this->toArray(DB::table('treatment')->where('Id', $Id)->first());
                if ($Query) {
                    $result = ['outcome'=>true,'data'=>$Query];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='AlterTreatment') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    ${'uid'} = htmlspecialchars($_POST['uid']);
                    $data = [
                        'Img'=>htmlspecialchars(request('Img')),
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Cost'=>intval($_POST['Cost']),
                        'EstimatedTime'=>intval($_POST['EstimatedTime']),
                        'ParentId'=>htmlspecialchars($_POST['Category']),
                        'Slug'=>htmlspecialchars($_POST['Slug']),
                        'Lang'=>$this->Lang,
                        'Status'=>htmlspecialchars($_POST['Status']),
                        'update_at'=>date('Y-m-d H:i:s')
                    ];
                    $Check = $this->isAnyEmpty($data);
                    if (!$Check) {
                        $Query = DB::table('treatment')->where('uid', $uid)->update($data);
                        if ($Query) {
                            $result = ['outcome'=>true,'route'=>false];
                        }else {
                            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                        }
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields'),'tag'=>$Check];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest'),'route'=>' '];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetUserInfo') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2' || $this->User['Type']=='1') {
                    $uid = htmlspecialchars($_POST['uid']);
                    $Query = $this->toArray(DB::table('user')->where('uid', $uid)->first());
                    if ($Query) {
                        $result = ['outcome'=>true,'data'=>$Query];
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action == 'UploadFile') {
            ini_set('post_max_size', '64M');
            ini_set('upload_max_filesize', '64M');
            set_time_limit(1000);

                $data = [];
                if (!empty($this->User)) {
                    foreach ($_FILES as $key => $value){
                        $target_file = basename($_FILES[$key]["name"]);
                        $FileType = pathinfo($target_file, PATHINFO_EXTENSION);
                        $result = [];
                        $TargetDir = $_POST['TargetDir'] ?? 'upload';
                        $uzanti = array('jpeg','jpg','png','x-png','gif','pdf','docx','webp');
                        if (!empty($_FILES[$key])) {
                            $size = ($_FILES[$key]["size"]/1024);
                            if ($size < 5048) {
                                if(in_array($FileType, $uzanti)){
                                    $size = $_FILES[$key]['size'] / 1024;
                                    $File = request()->file($key);
                                    $FileName = substr(str_shuffle(rand(1,999).str_shuffle('10101101100').str_shuffle(rand(1,999).'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM')),-15).'.'.$FileType;
                                    $ImgPath = public_path('assets/'.$TargetDir);
                                    if ($File->move($ImgPath, $FileName)) {
                                        $data[]=['url'=>'/assets/'.$TargetDir.'/'.$FileName,'name'=>$FileName,'type'=>$FileType,'InputName'=>$key];
                                        $callback = (!empty($_POST['callback']))? str_replace('{url}', $data[0]['url'], $_POST['callback']) : 'javascript:FileUploaded("'.$data[0]['url'].'");';

                                        $result = ['outcome'=>true,'data'=>$data,'Tag'=>@$_POST['Tag'],'route'=>$callback,'NoAlert'=>true];
                                    }else {
                                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                                    }
                                }else{
                                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('FileTypeLimit')];
                                }
                            }else {
                                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SizeLimit')];
                            }
                        }else {
                            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                        }
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
                }
                return response()->json($result, 200);
        }
        ///
        if ($this->action=='InsertUser') {
            if (!empty($this->User)) {
                $data = [
                    'uid'=>$this->UniqueId(30),
                    'ProfilPic'=>(!empty($_POST['ProfilPic'])? htmlspecialchars($_POST['ProfilPic']) : NULL),
                    'Password'=>$this->Encrypt($this->UniqueId(7)),
                    'Type'=>htmlspecialchars($_POST['Type']),
                    'FirstName'=>htmlspecialchars($_POST['FirstName']),
                    'LastName'=>htmlspecialchars($_POST['LastName']),
                    'Mail'=>htmlspecialchars($_POST['Mail']),
                    'CommissionRate'=>request('CommissionRate') ?? 0,
                    'Cell'=>$this->CellFormatter($_POST['Cell']),
                    'ParentId'=>(!empty($_POST['Parent']))? htmlspecialchars($_POST['Parent']) : NULL,
                    'Status'=>htmlspecialchars($_POST['Status'])
                ];
                $exceptions = ['ProfilPic'];
                if ($this->User['Type']=='2') {
                    $exceptions[] = 'ParentId';
                }
                if($this->User['Type']== '1' && empty($this->User['ParentId']) || $this->User['Type'] == '2' || $data['Type'] != '1' ){
                    $Check = $this->isAnyEmpty($data, $exceptions);
                    if (!$Check) {
                        $query = DB::table('user')->insert($data);
                        if ($query) {
                            $template = $this->GetFileContent((str_contains($_SERVER['HTTP_HOST'], 'medescare'))? '/assets/docs/UserRegistration.html' : '/assets/docs/UserRegistration-Magic.html');
                            $Content = str_replace('{Mail}', $data['Mail'], $template);
                            $Content = str_replace('{Password}', $this->Decrypt($data['Password']), $Content);
                            $result = $this->SendMail($data['Mail'],'Aramıza Hoşgeldin!', $Content);
                            if ($result['outcome']) {
                                $result['route'] = 'javascript:Reset();GetUsers();';
                            }
                        }else {
                            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                        }
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields'),'tag'=>$Check];
                    }
                }else {
                     $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetUsers') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $Query = $this->toArray(DB::table('user')->get());
                }elseif($this->User['Type']=='1'){
                    $Query = $this->toArray(DB::table('user')->where('ParentId', $this->User['uid'])->get());
                    $Agencies = $this->toArray(DB::table('agency')->where('ParentId', $this->User['uid'])->get());
                    foreach($Agencies as $key => $Agency){
                        $Agents = $this->toArray(DB::table('user')->where('ParentId', $Agency['uid'])->get());
                        foreach($Agents as $Agent){
                            $Query[]=$Agent;
                        }
                    }
                }
                foreach($Query as $key => $User){
                    if (!empty($User['ParentId'])) {
                        $Query[$key]['Parent'] = $this->toArray(DB::table('agency')->where('uid', $User['ParentId'])->first());
                    }
                }
                if ($Query) {
                    $result = ['outcome'=>true,'data'=>$Query,'route'=>'javascript:Reset();GetUsers();'];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='AlterUser') {
            if (!empty($this->User)) {
                $User = $this->toArray(DB::table('user')->where('uid',request('uid'))->first());
                if ($User['Type']=='2') {
                    $Type = request('Type') ?? NULL;
                    $Parent = request('ParentId') ?? NULL;
                    $Commission = request('CommissionRate') ?? 0;
                }else {
                    $Type = $User['Type'];
                    $Parent = $User['ParentId'];
                    $Commission = $User['CommissionRate'];
                }
                $data = [
                    'uid'=>htmlspecialchars(request('uid')),
                    'ProfilPic'=>(!empty(request('ProfilPic'))? request('ProfilPic') : NULL),
                    'Type'=>$Type,
                    'FirstName'=>htmlspecialchars(request('FirstName')),
                    'LastName'=>htmlspecialchars(request('LastName')),
                    'Mail'=>htmlspecialchars(request('Mail')),
                    'CommissionRate'=>$Commission,
                    'Cell'=>$this->CellFormatter(request('Cell')),
                    'ParentId'=>$Parent,
                    'Status'=>htmlspecialchars(request('Status')),
                    'update_at'=>date('Y-m-d H:i:s')
                ];

                $exceptions = ['ProfilPic','ParentId'];
               
                $Check = $this->isAnyEmpty($data, $exceptions);
                if (!$Check) {
                    $query = DB::table('user')->where('uid', $data['uid'])->update($data);
                    if ($query) {
                        $result = ['outcome'=>true,'route'=>'javascript:Reset(),GetUsers();'];
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields'),'tag'=>$Check];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='SendMail') {
            return $this->SendMail($_POST['Mail'],$_POST['Subject'],$_POST['Content']);
        }
        ///
        if($this->action=='GetMessages'){
            if (!empty($this->User)) {
                $uid = htmlspecialchars($_POST['uid']);
                $Chat = $this->toArray(DB::table('chat')->where('uid', $uid)->first());
                if ($Chat) {
                    $Query = $this->toArray( DB::table('message')->where('ChatId', $uid)->get() );
                    foreach($Query as $key => $Message){
                        $this->Seen($Message);
                        $Query[$key]['User'] = $this->toArray( DB::table('user')->where('uid', $Message['UserId'])->first() );
                        $Query[$key]['Attachments'] = json_decode($Message['Attachments'], true);
                    }
                    $result = [ 'outcome'=>true, 'data'=>$Query,'Chat'=>$Chat ];
                }else {
                    $result = [ 'outcome'=>false, 'ErrorMessage'=>'Chat'.Lang::get('Base.NotFound'), 'route'=>''];
                }
            }else {
                $result = [ 'outcome'=>false, 'ErrorMessage'=>Lang::get('Base.SessionOut'), 'route'=>' '];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='SendMessage') {
            if (!empty($this->User)) {
                $Files = [];
                foreach($_POST['Attachments'] ?? [] as $File){
                    $arr = explode('/', $File);
                    $Files[] = [
                        'name'=>$arr[count($arr)-1],
                        'src'=>$File
                    ];
                }
                $data = [
                    'ChatId' => (!empty($_POST['ChatId']))? htmlspecialchars($_POST['ChatId']) : $this->UniqueId(30),
                    'Title' => (!empty($_POST['Title']))? htmlspecialchars($_POST['Title']) : NULL,
                    'Content' => $_POST['Content'],
                    'Attachments' => json_encode( $Files )
                ];
                $exceptions = ['Attachments','ChatId'];
                if(!empty($_POST['ChatId'])){
                    $exceptions[] = 'Title';
                }
                $Check = $this->isAnyEmpty($data, $exceptions);
                if (!$Check) {
                    $Chat = DB::table('chat')->where('uid', $data['ChatId'])->first();
                    if (empty($Chat)) {
                        $Chat = DB::table('chat')->insert([
                            'uid'      => $data['ChatId'],
                            'Title'    => $data['Title'],
                            'UserFrom' => $this->User['uid'],
                            'UserTo'   => ($this->User['Type']=='1')? 'Admin': 'All',
                            'Status'   => '1'
                        ]);
                    }
                    $Query = Db::table('message')->insert([
                        'uid' => $this->UniqueId(30),
                        'Content' => $data['Content'],
                        'ChatId' => $data['ChatId'],
                        'UserId'=> $this->User['uid'],
                        'Attachments' => $data['Attachments'],
                        'Seen'=>json_encode([$this->User['uid']])
                    ]);
                    if ($Query){
                        $result = ['outcome'=>true,'NoAlert'=>true,'route'=>'javascript:GetChats(),GetMessages("'.$data['ChatId'].'")'];
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields'),'tag'=>$Check];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut'),'route'=>' '];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action == 'GetChats') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $Chats = $this->toArray( DB::table('chat')->where('UserTo','Admin')->orwhere('UserTo','All')->orderBy('create_at','desc')->get() );
                    foreach($Chats as $key => $Chat){
                        $Chats[$key]['Pulse'] = false;
                        $Chats[$key]['User'] = $this->toArray( DB::table('user')->where('uid', $Chat['UserFrom'])->first() );
                        $Messages = $this->toArray( DB::table('message')->where('ChatId', $Chat['uid'])->get() );
                        foreach($Messages as $Message){
                            if (!in_array($this->User['uid'] ,json_decode($Message['Seen'] ?? "[]", true))) {
                                $Chats[$key]['Pulse'] = true;
                            }
                        }
                    }
                }else {
                    $Chats = $this->toArray( DB::table('chat')->where('UserFrom', $this->User['uid'])->orderBy('create_at','desc')->get() );
                    foreach($Chats as $key => $Chat){
                        $Chats[$key]['Pulse'] = false;
                        $Chats[$key]['User'] = $this->User;
                        $Messages = $this->toArray( DB::table('message')->where('ChatId', $Chat['uid'])->get() );
                        foreach($Messages as $Message){
                            if (!in_array($this->User['uid'] ,json_decode($Message['Seen'] ?? "[]", true))) {
                                $Chats[$key]['Pulse'] = true;
                            }
                        }
                    }
                }
                $result = ['outcome'=>true,'data'=>$Chats];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetCampain') {
            if (!empty($this->User)) {
                $Id = htmlspecialchars($_POST['Id']);
                if ($Id == 'All') {
                    $Campain = $this->toArray( DB::table('campain')->get() );
                }else {
                    $Campain = $this->toArray( DB::table('campain')->where('Id', $Id)->first() );
                }   
                $result = ['outcome'=>true,'data'=>$Campain];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut'),'route'=>' '];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='AlterCampain') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $data = [
                        'Id' => htmlspecialchars($_POST['Id']),
                        'Type'=>htmlspecialchars($_POST['Type']),
                        'Img'=>htmlspecialchars($_POST['Img']),
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Slogan'=>htmlspecialchars($_POST['Slogan']),
                        'Text'=>htmlspecialchars($_POST['Text']),
                        'Discount'=>intVal($_POST['Discount']),
                        'DiscountType'=>htmlspecialchars($_POST['DiscountType']),
                        'Status'=>htmlspecialchars($_POST['Status']),
                        'update_at'=>date('Y-m-d H:i:s')
                    ];
                    $update = DB::table('campain')->where('Id', $data['Id'])->update($data);
                    if ($update) {
                        $result = ['outcome'=>true,'route'=>'javascript:Reset(),GetCampains();'];
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest'),'route'=>' '];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut'), 'route'=>''];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='InsertCampain') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $data = [
                        'Type'=>htmlspecialchars($_POST['Type']),
                        'Img'=>htmlspecialchars($_POST['Img']),
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Slogan'=>htmlspecialchars($_POST['Slogan']),
                        'Text'=>htmlspecialchars($_POST['Text']),
                        'Discount'=>intVal($_POST['Discount']),
                        'DiscountType'=>htmlspecialchars($_POST['DiscountType']),
                        'Status'=>htmlspecialchars($_POST['Status'])
                    ];
                    $update = DB::table('campain')->insert($data);
                    if ($update) {
                        $result = ['outcome'=>true,'route'=>'javascript:Reset(),GetCampains();'];
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest'),'route'=>' '];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut'), 'route'=>''];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetFeature') {
            if (!empty($this->User)) {
                $Id = htmlspecialchars($_POST['Id']);
                $Query = $this->toArray( DB::table('feature')->where('Id', $Id)->first() );
                if (!empty($Query)) {
                    $result = ['outcome'=>true,'data'=>$Query];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetPackageInfo') {
            if (!empty($this->User)) {
                $Id = htmlspecialchars($_POST['Id']);
                $Query = $this->toArray(DB::table('package')->where('Id', $Id)->first());
                if ($Query) {
                    $result = ['outcome'=>true,'data'=>$Query];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetPackages') {
            if (!empty($this->User)) {
                $Query = $this->toArray(DB::table('package')->where('Lang', $this->Lang)->where('Status','1')->get() );
                if ($Query) {
                    $result = ['outcome'=>true,'data'=>$Query];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action == 'InsertPackage') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $data = [
                        'uid'=>$this->UniqueId(30),
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Logo'=>htmlspecialchars($_POST['Logo']),
                        'Rate'=> intval($_POST['Rate']),
                        'Description'=>(!empty($_POST['Description']))? htmlspecialchars($_POST['Description']) : NULL,
                        'Lang'=>$this->Lang,
                        'Status'=>htmlspecialchars($_POST['Status'])
                    ];
                    $Empty = $this->isAnyEmpty($data,['Description']);
                    if (!$Empty) {
                        $act = DB::table('package')->insert($data);
                        $result = ['outcome'=>true,'route'=>'panel/packages'];
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=> Lang::get('Base.FillTheFields').' '.$Empty, 'tag'=>$Empty];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut'),'route'=>'/Login'];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action == 'AlterPackage') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $data = [
                        'uid'=>htmlspecialchars($_POST['uid']),
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Img'=>htmlspecialchars($_POST['Img']),
                        'Description'=>htmlspecialchars($_POST['Description']),
                        'Lang'=>$this->Lang,
                        'Status'=>htmlspecialchars($_POST['Status'])
                    ];
                    $Empty = $this->isAnyEmpty($data);
                    if (!$Empty) {
                        $act = DB::table('package')->where('uid', $data['uid'])->update($data);
                        $result = ['outcome'=>true,'route'=>'panel/packages'];
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields').' '.$Empty, 'tag'=>$Empty];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut'),'route'=>'/Login'];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetFeatures') {
            if (!empty($this->User)) {
                $Id = htmlspecialchars($_POST['Id']);
                if ($Id=='All') {
                    $Categories = $this->toArray(DB::table('package')->where('Lang',$this->Lang)->where('Status','1')->get());
                    foreach($Categories as $key => $Category ){
                        $Categories[$key]['Features'] = $this->toArray( DB::table('feature')->where('ParentId', $Category['Id'])->where('Lang',$this->Lang)->where('Status', '1')->get() );
                    }
                }else {
                    $Categories = $this->toArray(DB::table('package')->where('Lang',$this->Lang)->where('Status','1')->where('Id', $Id)->get());
                    foreach($Categories as $key => $Category ){
                        $Categories[$key]['Features'] = $this->toArray( DB::table('feature')->where('ParentId', $Category['Id'])->where('Lang',$this->Lang)->where('Status', '1')->get() );
                    }
                }
                $result = ['outcome'=>true, 'data'=>$Categories];
            }else{
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetFeatureInfo') {
            if (!empty($this->User)) {
                $Id = htmlspecialchars($_POST['Id']);
                $Query = $this->toArray(DB::table('feature')->where('Id', $Id)->first());
                if ($Query) {
                    $result = ['outcome'=>true,'data'=>$Query];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut'),'route'=>' '];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action == 'AlterFeature') {
            if (!empty($this->User)) {
                if ($this->User['Type']) {
                    $data = [
                        'uid'=>htmlspecialchars($_POST['uid']),
                        'Checked'=>htmlspecialchars($_POST['Checked']),
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Cost'=>htmlspecialchars($_POST['Cost']),
                        'Order'=>htmlspecialchars($_POST['Order']),
                        'Multiply'=>htmlspecialchars($_POST['Multiply']),
                        'ParentId'=>htmlspecialchars($_POST['Package']),
                        'Lang'=>$this->Lang,
                        'Status'=>htmlspecialchars($_POST['Status']),
                        'update_at'=>date('Y-m-d H:i:s')
                    ];
                    $isEmpty = $this->isAnyEmpty($data);
                    if (!$isEmpty) {
                        $action = DB::table('feature')->where('Id', $data['Id'])->update($data);
                        $result = ['outcome'=>true,'route'=>'javascript:Reset(),GetFeatures();'];
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields'),'tag'=>$isEmpty];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest'),'route'=> ' '];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut'),'route'=>' '];
            }
            return response()->json($result,200);
        }
        ///
        if ($this->action == 'InsertFeature') {
            if (!empty($this->User)) {
                if ($this->User['Type']) {
                    $data = [
                        'uid'=>$this->UniqueId(15),
                        'Checked'=>htmlspecialchars($_POST['Checked']),
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Cost'=>htmlspecialchars($_POST['Cost']),
                        'Order'=>htmlspecialchars($_POST['Order']),
                        'Multiply'=>htmlspecialchars($_POST['Multiply']),
                        'ParentId'=>htmlspecialchars($_POST['Package']),
                        'Lang'=>$this->Lang,
                        'Status'=>htmlspecialchars($_POST['Status'])
                    ];
                    $isEmpty = $this->isAnyEmpty($data);
                    if (!$isEmpty) {
                        $action = DB::table('feature')->insert($data);
                        $result = ['outcome'=>true,'route'=>'javascript:Reset(),GetFeatures();'];
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields'),'tag'=>$isEmpty];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest'),'route'=> ' '];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut'),'route'=>' '];
            }
            return response()->json($result,200);
        }
        ///
        if ($this->action=='GetArticles') {
            if (!empty($this->User)) {
                $Articles = $this->toArray(DB::table('article')->where('Lang', $this->Lang)->where('Status','1')->get());
                $result = ['outcome'=>true, 'data'=>$Articles];
            }else{
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='UpdateMyInfo') {
            if (!empty($this->User)) {
                $data = [
                    'ProfilPic'=>request('ProfilPic') ?? '/assets/img/profile/Default.png',
                    'Mail'=>request('Mail'),
                    'FirstName'=>request('FirstName'),
                    'LastName'=>request('LastName'),
                    'Cell'=>request('Cell')
                ];
                $isEmpty = $this->isAnyEmpty($data);
                if (!$isEmpty) {
                        DB::table('user')->where('uid', $this->User['uid'])->update([
                            'ProfilPic'=>htmlspecialchars($data['ProfilPic']),
                            'Mail'=>htmlspecialchars($data['Mail']),
                            'FirstName'=>htmlspecialchars($data['FirstName']),
                            'LastName'=>htmlspecialchars($data['LastName']),
                            'Cell'=>htmlspecialchars($data['Cell'])
                        ]);
                    $result = ['outcome'=>true];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields'), 'tag'=>$isEmpty];
                }            
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='AlterMyAgency') {
            
            if (!empty($this->User)) {
                $data = [
                    'Logo'=>request('AgencyLogo') ?? '/assets/img/profile/Default.png',
                    'Title'=>request('Title'),
                    'Mail'=>request('Mail'),
                    'Tell'=>request('Tell'),
                    'Country'=>request('Country'),
                    'Province'=>request('Province'),
                    'City'=>request('City'),
                    'Adress'=>request('Adress')
                ];
                $isEmpty = $this->isAnyEmpty($data);
                if (!$isEmpty) {
                    DB::table('agency')->where('uid', $this->User['Parent']['uid'])->update([
                        'Logo'=>$data['Logo'],
                        'Title'=>$data['Title'],
                        'Mail'=>$data['Mail'],
                        'Tell'=>$data['Tell'],
                        'Country'=>$data['Country'],
                        'Province'=>$data['Province'],
                        'City'=>$data['City'],
                        'Adress'=>$data['Adress']
                    ]);
                    $result = ['outcome'=>true];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields'),'tag'=>$isEmpty];
                }            
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='AlterAgencyCommission') {
            if (!empty($this->User)) {
                $data = [
                    'AgencyFee'=>request('AgencyFee'),
                ];
                $isEmpty = $this->isAnyEmpty($data);
                if (!$isEmpty) {
                    DB::table('agency')->where('uid', $this->User['Parent']['uid'])->update([
                        'AgencyFee'=>$data['AgencyFee']
                    ]);
                    $result = ['outcome'=>true];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields'),'tag'=>$isEmpty];
                }            
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetTreatmentCategories') {
            if (!empty($this->User)) {
                $Id = htmlspecialchars($_POST['Id']);
                if ($Id=='All') {
                    $Categories = $this->toArray(DB::table('category')->where('Lang',$this->Lang)->where('Status','1')->get());
                    foreach($Categories as $key => $Category ){
                        $Categories[$key]['Treatments'] = $this->toArray( DB::table('treatment')->where('ParentId', $Category['Id'])->where('Lang',$this->Lang)->where('Status', '1')->get() );
                    }
                }else {
                    $Categories = $this->toArray(DB::table('category')->where('Id', $Id)->get());
                    foreach($Categories as $key => $Category ){
                        $Categories[$key]['Treatments'] = $this->toArray( DB::table('treatment')->where('Lang',$this->Lang)->where('ParentId', $Category['Id'])->where('Status', '1')->get() );
                    }
                }
                $result = ['outcome'=>true, 'data'=>$Categories];
            }else{
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='GetArticleInfo') {
            if (!empty($this->User)) {
                $Id = htmlspecialchars(request('Id'));
                $Query = $this->toArray(DB::table('article')->where('Id', $Id)->first());
                if ($Query) {
                    $result = ['outcome'=>true,'data'=>$Query];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='InsertArticle') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $data = [
                        'uid'=>$this->UniqueId(30),
                        'Img'=>htmlspecialchars(request('Img')),
                        'Title'=>request('Title'),
                        'Slug'=>htmlspecialchars(request('Slug')),
                        'Order'=>intval(request('Order')),
                        'Content'=>request('Description'),
                        'Order'=>intval(request('Order')),
                        'Lang'=>$this->Lang,
                        'Status'=>htmlspecialchars(request('Status'))
                    ];
                    $empty = $this->isAnyEmpty($data);
                    if (!$empty) {
                        DB::table('article')->insert($data);
                        $result = ['outcome'=>true];
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields'),'tag'=>$empty];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='AlterArticle') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $data = [
                        'Id'=>request('Id'),
                        'Img'=>htmlspecialchars(request('Img')),
                        'Title'=>htmlspecialchars(request('Title')),
                        'Slug'=>htmlspecialchars(request('Slug')),
                        'Order'=>intval(request('Order')),
                        'Content'=>request('Description'),
                        'Order'=>intval(request('Order')),
                        'Status'=>htmlspecialchars(request('Status'))
                    ];
                    DB::table('article')->where('Id',$data['Id'])->update($data);
                    $result = ['outcome'=>true];
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='AgencyApply') {
            $data = [
                'uid'=>$this->UniqueId(30),
                'Logo'=> '/assets/upload/default-logo.png',
                'FirstName'=>htmlspecialchars(request('FirstName')),
                'LastName'=>htmlspecialchars(request('LastName')),
                'Title'=>htmlspecialchars(request('Title')),
                'VatNumber'=>htmlspecialchars(request('VatNumber')),
                'Country'=>htmlspecialchars(request('Country')),
                'Province'=>htmlspecialchars(request('Province')),
                'City'=>htmlspecialchars(request('City')),
                'Adress'=>htmlspecialchars(request('Address')),
                'WebPage'=>htmlspecialchars(request('Website')),
                'Whatsapp'=>htmlspecialchars(request('Whatsapp')),
                'ReferenceCode'=>htmlspecialchars(request('ReferenceCode')),
                'Mail'=>htmlspecialchars(request('Mail')),
                'Tell'=>htmlspecialchars(request('Tell')),
                'CommissionRate'=>15,
                'Status'=>'1',
                'AgencyFee'=>15
            ];
            $empty = $this->isAnyEmpty($data,['WebPage','Whatsapp','Province','City','Country']);
            if (!$empty) {
                $Parent = $this->toArray( DB::table('user')->where('Invitation', $data['ReferenceCode'])->first() );
                if (!empty($Parent)) {
                    $Query = DB::table('agency')->insert([
                        'uid'=>$data['uid'],
                        'Title'=>$data['Title'],
                        'Logo'=>$data['Logo'],
                        'Mail'=>$data['Mail'],
                        'Tell'=>$data['Tell'],
                        'ParentId'=>$Parent['uid'],
                        'Whatsapp'=>$data['Whatsapp'],
                        'WebPage'=>$data['WebPage'],
                        'Country'=>$data['Country'],
                        'Province'=>$data['Province']??'-',
                        'City'=>$data['City']??'-',
                        'Adress'=>$data['Adress'],
                        'VatNumber'=>$data['VatNumber'],
                        'CommissionRate'=>$data['CommissionRate'],
                        'AgencyFee' =>$data['AgencyFee'],
                        'Status'=>$data['Status'],
                    ]);
                    if ($Query) {
                        $User = [
                            'uid'=>$this->UniqueId(30),
                            'Password'=>$this->Encrypt($this->UniqueId(7)),
                            'Type'=>'0',
                            'FirstName'=>$data['FirstName'],
                            'LastName'=>$data['LastName'],
                            'Mail'=>$data['Mail'],
                            'CommissionRate'=>15,
                            'Cell'=>$data['Tell'],
                            'ParentId'=>$data['uid'],
                            'Status'=>'1'
                        ];
                        DB::table('user')->insert($User);
                        $template = $this->GetFileContent((str_contains($_SERVER['HTTP_HOST'], 'medescare'))? '/assets/docs/UserRegistration.html' : '/assets/docs/UserRegistration-Magic.html');
                        $Content = str_replace('{Mail}', $User['Mail'], $template);
                        $Content = str_replace('{Password}', $this->Decrypt($User['Password']), $Content);
                        $result = $this->SendMail($User['Mail'],Lang::get('Base.WelcomeMessage'), $Content);
                        if ($result['outcome']) {
                            $result = ['outcome'=>true,'Message'=>Lang::get('Application.Thanks').'. '.Lang::get('Application.MailSent'),'route'=>'/Login'];
                        }
                        $this->Notify('System', [$Parent['uid']], "<a href=\"/panel/Manage/Agencies?Agency={$data['uid']}\">{$data['Title']} Joined Us</a>");
                        // Queue::push('Controller@Notify', [
                        //     'UserId' => 'System',
                        //     'Targets' => [$Parent['uid']],
                        //     'Content' => "<a href=\"/panel/Manage/Agencies?Agency={$data['uid']}\">{$data['Title']} Joined Us</a>"
                        // ]);
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang('Base.Internal-Error')];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>'Invalid Code'];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields'),'tag'=>$empty];
            }
            return response()->json($result,200);
        }
        ///
        if ($this->action=='GetDocContent') {
            $data = [
                'Type'=>request('Type')
            ];
            if ( str_contains(request()->url(), 'medescare') ) {
                if ($data['Type']=='0') {
                    $data['data'] = $this->GetFileContent('/assets/docs/Terms.html');
                }elseif($data['Type']=='1') {
                    $data['data'] = $this->GetFileContent('/assets/docs/Privacy.html');
                }else {
                     $data['data'] = $this->GetFileContent('/assets/docs/Impressum.html');
                }
            }else {
                if ($data['Type']=='1') {
                    $data['data'] = $this->GetFileContent('/assets/docs/Privacy-Magic.html');
                }else {
                    $data['data'] = $this->GetFileContent('/assets/docs/Impressum.html');
                }
            }
            $result = ['outcome'=>true,'data'=>$data['data']??'','Type'=>$data['Type'],'AllIn'=>str_contains(request()->url(), 'medescare')];
            return response()->json($result,200);
        }
        ///
        if ($this->action=='InsertSlider') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $data = [
                        'uid'=>$this->UniqueId(30),
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Info'=>htmlspecialchars($_POST['Info']),
                        'Content'=>htmlspecialchars($_POST['Content']),
                        'Lang'=>$this->Lang,
                        'File'=>htmlspecialchars(($_POST['File']??'/assets/panel/images/mp4.png')),
                        'Status'=>htmlspecialchars($_POST['Status']),
                    ];
                    $Check = $this->isAnyEmpty($data);
                    if (!$Check) {
                        $Query = DB::table('slider')->insert($data);
                        if ($Query) {
                            $result = ['outcome'=>true,'route'=>'/panel/website/sliders'];
                        }else {
                            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                        }
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields')];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='AlterSlider') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $data = [
                        'uid'=>htmlspecialchars($_POST['uid']),
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Info'=>htmlspecialchars($_POST['Info']),
                        'Content'=>htmlspecialchars($_POST['Content']),
                        'File'=>htmlspecialchars(($_POST['File']??'/assets/panel/images/mp4.png')),
                        'Status'=>htmlspecialchars($_POST['Status']),
                        'update_at' => date('Y-m-d H:i:s')
                    ];
                    $Check = $this->isAnyEmpty($data);
                    if (!$Check) {
                        $Query = DB::table('slider')->where('uid', $data['uid'])->update($data);
                        if ($Query) {
                            $result = ['outcome'=>true,'route'=>'/panel/website/sliders'];
                        }else {
                            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                        }
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields')];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='InsertMedia') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $data = [
                        'uid'=>$this->UniqueId(30),
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Type'=>htmlspecialchars($_POST['Type']),
                        'FadeInHome'=>htmlspecialchars($_POST['FadeInHome']),
                        'Info'=>htmlspecialchars($_POST['Info']),
                        'Path'=>htmlspecialchars($_POST['Path']),
                        'Lang'=>$this->Lang,
                        'Img'=>htmlspecialchars(($_POST['Img'])),
                        'Status'=>htmlspecialchars($_POST['Status']),
                    ];
                    $Check = $this->isAnyEmpty($data);
                    if (!$Check) {
                        $Query = DB::table('gallery')->insert($data);
                        if ($Query) {
                            $result = ['outcome'=>true,'route'=>'/panel/website/media'];
                        }else {
                            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                        }
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields')];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
      if ($this->action=='AlterMedia') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $data = [
                        'uid'=>$_POST['uid'],
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Type'=>htmlspecialchars($_POST['Type']),
                        'FadeInHome'=>htmlspecialchars($_POST['FadeInHome']),
                        'Info'=>htmlspecialchars($_POST['Info']),
                        'Path'=>htmlspecialchars($_POST['Path']),
                        'Lang'=>$this->Lang,
                        'Img'=>htmlspecialchars(($_POST['Img'])),
                        'Status'=>htmlspecialchars($_POST['Status']),
                    ];
                    $Check = $this->isAnyEmpty($data);
                    if (!$Check) {
                        $Query = DB::table('gallery')->where('uid',$data['uid'])->update($data);
                        if ($Query) {
                            $result = ['outcome'=>true,'route'=>'/panel/website/media'];
                        }else {
                            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                        }
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields')];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='InsertDoctor') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $data = [
                        'uid'=>$this->UniqueId(30),
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Info'=>htmlspecialchars($_POST['Info']),
                        'Path'=>htmlspecialchars($_POST['Path']),
                        'Description'=>htmlspecialchars($_POST['Description']),
                        'Lang'=>$this->Lang,
                        'Img'=>htmlspecialchars(($_POST['Img'])),
                        'Status'=>htmlspecialchars($_POST['Status']),
                    ];
                    $Check = $this->isAnyEmpty($data,['Path']);
                    if (!$Check) {
                        $Query = DB::table('doctor')->insert($data);
                        if ($Query) {
                            $result = ['outcome'=>true,'route'=>'/panel/website/doctors'];
                        }else {
                            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                        }
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields')];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
      if ($this->action=='AlterDoctor') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $data = [
                        'uid'=>$_POST['uid'],
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Info'=>htmlspecialchars($_POST['Info']),
                        'Description'=>htmlspecialchars($_POST['Description']),
                        'Path'=>htmlspecialchars($_POST['Path']),
                        'Lang'=>$this->Lang,
                        'Img'=>htmlspecialchars(($_POST['Img'])),
                        'Status'=>htmlspecialchars($_POST['Status']),
                    ];
                    $Check = $this->isAnyEmpty($data,['Path']);
                    if (!$Check) {
                        $Query = DB::table('doctor')->where('uid',$data['uid'])->update($data);
                        if ($Query) {
                            $result = ['outcome'=>true,'route'=>'/panel/website/doctors'];
                        }else {
                            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                        }
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields')];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if($this->action=='RemindPass'){
            $data['uid']=request('uid');
            $User = $this->toArray( DB::table('user')->where('uid',$data['uid'])->first() );
            if(!empty($User)){
                $data['User'] = $User;
                $template = $this->GetFileContent((str_contains($_SERVER['HTTP_HOST'], 'medescare'))? '/assets/docs/UserRegistration.html' : '/assets/docs/UserRegistration-Magic.html');
                $Content = str_replace('{Mail}', $data['User']['Mail'], $template);
                $Content = str_replace('{Password}', $this->Decrypt($data['User']['Password']), $Content);
                $result = $this->SendMail($data['User']['Mail'],'Aramıza Hoşgeldin!', $Content);
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='DelAgency') {
            $data = [
                'uid'=>htmlspecialchars(request('uid'))
            ];
            if (!empty($data['uid'])) {
                DB::table('user')->where('ParentId', $data['uid'])->where('Type','0')->delete();
                DB::table('agency')->where('uid', $data['uid'])->delete();
                $result = ['outcome'=>true,'route'=>'javascript:Reset(),GetAgencies();'];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
            }
            return response()->json($result,200);
        }
        ///
        if ($this->action=='DelUser') {
            $data = [
                'uid'=>htmlspecialchars(request('uid'))
            ];
            if (!empty($data['uid'])) {
                DB::table('user')->where('uid', $data['uid'])->delete();
                $result = ['outcome'=>true,'route'=>'javascript:Reset(),GetUsers();'];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.NotFound')];
            }
            return response()->json($result,200);
        }
        ///
        if($this->action=='ChangeInvitation'){
            $data = [
                'Invitation'=>request('Invitation')??NULL
            ];
            DB::table('user')->where('uid',$this->User['uid'])->update([
                'Invitation'=>$data['Invitation']
            ]);
            $result = ['outcome'=>true];
            return response()->json($result);
        }
        ///
        if ($this->action=='RejectApplications') {
            $data = [
                'Applications'=>request('Applications')
            ];
            if (!empty($data['Applications'])) {
                foreach($data['Applications'] as $Item){
                    DB::table('application')->where('Id', $Item)->update(['Status'=>'0']);
                }
                $result = ['outcome'=>true,'route'=>'javascript:GetApplications();'];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>'En Az Bir başvuru Seçilmesi Gerekli!'];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='DelApplications') {
            $data = [
                'Applications'=>request('Applications')
            ];
            if (!empty($data['Applications'])) {
                foreach($data['Applications'] as $Item){
                    DB::table('application')->where('Id', $Item)->delete();
                }
                $result = ['outcome'=>true,'route'=>'javascript:GetApplications();'];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>'En Az Bir başvuru Seçilmesi Gerekli!'];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='PassifyUsers') {
            $data = [
                'Users'=>request('Users')
            ];
            if (!empty($data['Users'])) {
                foreach($data['Users'] as $Item){
                    DB::table('user')->where('uid', $Item)->update(['Status'=>'0']);
                }
                $result = ['outcome'=>true,'route'=>'javascript:GetUsers();'];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>'En Az Bir kullanıcı Seçilmesi Gerekli!'];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='DelUsers') {
            $data = [
                'Users'=>request('Users')
            ];
            if (!empty($data['Users'])) {
                foreach($data['Users'] as $Item){
                    DB::table('user')->where('uid', $Item)->delete();
                }
                $result = ['outcome'=>true,'route'=>'javascript:GetUsers();'];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>'En Az Bir ürün Seçilmesi Gerekli!'];
            }
            return response()->json($result, 200);
        }
        if ($this->action=='ActivateUsers') {
            $data = [
                'Users'=>request('Users')
            ];
            if (!empty($data['Users'])) {
                foreach($data['Users'] as $Item){
                    DB::table('user')->where('uid', $Item)->update(['Status'=>'1']);
                }
                $result = ['outcome'=>true,'route'=>'javascript:GetUsers();'];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>'En Az Bir kullanıcı Seçilmesi Gerekli!'];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='ActivateAgencies') {
            $data = [
                'Agencies'=>request('Agencies')
            ];
            if (!empty($data['Agencies'])) {
                foreach($data['Agencies'] as $Item){
                    DB::table('agency')->where('uid', $Item)->update(['Status'=>'1']);
                }
                $result = ['outcome'=>true,'route'=>'javascript:GetAgencies();'];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>'En Az Bir Acentanın Seçilmesi Gerekli!'];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='PassifyAgencies') {
            $data = [
                'Agencies'=>request('Agencies')
            ];
            if (!empty($data['Agencies'])) {
                foreach($data['Agencies'] as $Item){
                    DB::table('agency')->where('uid', $Item)->update(['Status'=>'0']);
                }
                $result = ['outcome'=>true,'route'=>'javascript:GetAgencies();'];
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>'En Az Bir kullanıcı Seçilmesi Gerekli!'];
            }
            return response()->json($result, 200);
        }
        ///
        if($this->action=='MakeAppointment'){
            $data=[
                'FullName'=>request('FullName'),
                'Mail'=>request('Mail'),
                'Cell'=>request('Cell'),
                'Category'=>request('Category'),
                'Date'=>request('Date'),
                'Message'=>request('Message'),
                'Type'=>request('Type'),
                'File'=>request('FilePath')
            ];
            $isEmpty = $this->isAnyEmpty($data, ['Category','Message','File','Date','Type']);
            if (!$isEmpty) {
                if (request('kvkk')) {
                    DB::table('lead')->insert($data);
                    $result = ['outcome'=>true,'Message'=>'We will be get back to you shortly!']; 
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>'Kvkk metnini onaylayın!']; 
                }        
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>'Lütfen gerekli alanları doldurun','tag'=>$isEmpty];
            }
            return response()->json($result,200);

        }
        ///
        if ($this->action=='Contact') {
            $data=[
                'FullName'=>request('FullName'),
                'Mail'=>request('Mail'),
                'Cell'=>request('Cell'),
                'Message'=>request('Message'),
                'File'=>request('FilePath')
            ];
            $isEmpty = $this->isAnyEmpty($data);
            if (!$isEmpty) {
                if (request('kvkk')) {
                    $this->SendMail('recepozmen_67@hotmail.com','Contact Form', json_encode($data));
                    $result = ['outcome'=>true,'Message'=>'We will be get back to you shortly!']; 
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>'Kvkk metnini onaylayın!']; 
                }        
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>'Lütfen gerekli alanları doldurun','tag'=>$isEmpty];
            }
            return response()->json($result,200);
        }
        ///
        if ($this->action=='GetBlogs') {
            $data = DB::table('blog')->get();
            $result = [
                'outcome'=>true,
                'data'=>$data
            ];
            return response()->json($result,200);
        }
        ///
        if ($this->action=='AlterSettings') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $data = [
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Logo'=>htmlspecialchars($_POST['Logo']),
                        'Description'=>htmlspecialchars($_POST['Description']),
                        'Icon'=>htmlspecialchars($_POST['Icon']),
                        'KeyWords'=>htmlspecialchars($_POST['KeyWords']),
                        'Status'=>htmlspecialchars($_POST['Status']),
                    ];
                    $Check = $this->isAnyEmpty($data,['Path']);
                    if (!$Check) {
                        $Query = DB::table('main')->update($data);
                        if ($Query) {
                            $result = ['outcome'=>true,'route'=>'/panel/website/settings'];
                        }else {
                            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                        }
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields')];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }
        ///
        if ($this->action=='AlterContact') {
            if (!empty($this->User)) {
                if ($this->User['Type']=='2') {
                    $data = [
                        'Mail'=>htmlspecialchars($_POST['Mail']),
                        'Tell'=>htmlspecialchars($_POST['Tell']),
                        'Whatsapp'=>htmlspecialchars($_POST['Whatsapp']),
                        'Instagram'=>htmlspecialchars($_POST['Instagram']),
                        'Facebook'=>htmlspecialchars($_POST['Facebook']),
                        'Twitter'=>htmlspecialchars($_POST['Twitter']),
                        'Tiktok'=>htmlspecialchars($_POST['Tiktok'])
                    ];
                    $Check = $this->isAnyEmpty($data);
                    if (!$Check) {
                        $Query = DB::table('main')->update($data);
                        if ($Query) {
                            $result = ['outcome'=>true,'route'=>'/panel/website/contactinfo'];
                        }else {
                            $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.Internal-Error')];
                        }
                    }else {
                        $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.FillTheFields')];
                    }
                }else {
                    $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.UnauthorizedRequest')];
                }
            }else {
                $result = ['outcome'=>false,'ErrorMessage'=>Lang::get('Base.SessionOut')];
            }
            return response()->json($result, 200);
        }






        /* End of the Index Method */    
        if (request()) {
            return request();
        }
    }
}



