<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
use \Illuminate\Support\Facades\File;
use setasign\Fpdi;
use Lang;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function __construct(){
        if (!empty($_SESSION['User'])){
            $this->User = $_SESSION['User'];
        }
        $this->timezone = date_default_timezone_get();
    }

    public function Encrypt($data){
        
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_iv = 'O*wGTz#9SF';
        $key = hash('sha256', '');//$encryption_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        return $output = openssl_encrypt(base64_encode($data), $encrypt_method, $key, 0, $iv);
    }
    ///
    public function Decrypt($data){
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_iv = 'O*wGTz#9SF';
        $key = hash('sha256', '');//$encryption_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_decrypt($data, $encrypt_method, $key, 0, $iv);
        return $output = base64_decode($output);
    }
    ///
    public function isAnyEmpty($array, $exceptions=[]){
        if (empty($exceptions)){
            foreach ($array as $key => $value){
                if (is_array($value)){
                    return $this->isAnyEmpty($value, $exceptions);
                }else {
                    if (empty($value) || $value == 'null'  || $value == null || $value == '') {
                        if ($value != '0') {
                            return $key;
                        }
                    }
                }
            }
            return false;
        }else {
            $i=0;
            foreach ($array as $key => $value){
                if (is_array($value)){
                    return $this->isAnyEmpty($value, $exceptions);
                }else {
                    if (empty($value) || $value == 'null' || $value == null || $value == '') {
                        if (!in_array($key, $exceptions)){
                            if ($value != '0') {
                                return $key;
                            }
                        }
                    }
                }
                $i++;
            }
            return false;
        }
    }
    ///
    public function isAnyExist($array1,$array2){
        if ($array1 !=NULL && $array2 !=NULL) {
            foreach ($array1 as $key1 => $value1) {
                if (!is_array($value1)) {
                    if (in_array($value1, $array2)) {
                        return $value1;
                    }
                }else {
                    return $this->isAnyExist($value1, $array2);
                }
            }        
        }
        return false;
    }
    ///
    public function isAllExist($array1,$array2){
        if ($array1 != NULL && $array2 != NULL) {
            foreach ($array1 as $key => $value) {
                    if(!is_array($value)){
                        if (!in_array($value, $array2)) {
                            return false;
                        }
                    }else {
                        return $this->isAllExist($value, $array2);
                    }
            }
        }else {
            return false;
        }
        return true;
    }
    ///
    public function UniqueId($length=15, $punc=false){
        $punctuation= ($punc)? $punc : '';
        return $uid = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'.$punctuation.rand(1,9999).rand(1,9999)), -$length);
    }
    ///
    public function AppointmentId($length=15, $punc=false){
        $punctuation= ($punc==true)? $punc : '';
        return $uid = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'.$punctuation.rand(1,9999).rand(1,9999)), -$length);
    }
    ///
    public function  CellFormatter($TelefonNumarasi) {
        $TelefonNumarasi = preg_replace('/[^0-9]/', '', $TelefonNumarasi);
        //TelefonNumarasi değişkenini tüm karakterlerden arındırıyoruz.

        if (strlen($TelefonNumarasi) > 10) {

                //TelefonNumarasi değişkeni 10 haneden büyükse
                $UlkeKodu = substr($TelefonNumarasi, 0, strlen($TelefonNumarasi) - 10);
                $AlanKodu = substr($TelefonNumarasi, -10, 3);
                $SonrakiUcHane = substr($TelefonNumarasi, -7, 3);
                $SonDortHane = substr($TelefonNumarasi, -4, 4);
                $TelefonNumarasi =  '(' . $AlanKodu . ') ' . $SonrakiUcHane . '-' . $SonDortHane;
                //  return = (555) 444-3322
            
        } else if (strlen($TelefonNumarasi) == 10) {
            //TelefonNumarasi değişkeni 10 haneye eşitse
            $AlanKodu = substr($TelefonNumarasi, 0, 3);
            $SonrakiUcHane = substr($TelefonNumarasi, 3, 3);
            $SonDortHane = substr($TelefonNumarasi, 6, 4);
            $TelefonNumarasi = '(' . $AlanKodu . ') ' . $SonrakiUcHane . '-' . $SonDortHane;
            //  return = (555) 444-3322
        } else if (strlen($TelefonNumarasi) == 7) {
            //TelefonNumarasi değişkeni 7 haneye eşitse
            $SonrakiUcHane = substr($TelefonNumarasi, 0, 3);
            $SonDortHane = substr($TelefonNumarasi, 3, 4);
            $TelefonNumarasi = $SonrakiUcHane . '-' . $SonDortHane;
            //  return = 444-3322
        }
        return $TelefonNumarasi;
    }
    ///
    public function toArray($Object){
        return json_decode(json_encode($Object), true);
    }
    //
    public function SendMail($Mail,$Subject,$Content){
        try {
            $email = new \App\Mail\Mail($Mail,$Content,$Subject);
            \Illuminate\Support\Facades\Mail::to($Mail)->send($email);
            $result = ['outcome'=>true,'Mail'=>$Mail,'Subject'=>$Subject,'Content'=>$Content];
        } catch (Exception $e) {
            $result =  ['outcome'=>false,'ErrorMessage'=>$e->getMessage()];
        }
        return $result;
    }
    ///
    public function Seen($Value){
        // $Message = $this->toArray( DB::table('message')->where('uid', $uid)->first() );
        $Message = (is_array($Value))? $Value : $this->toArray( DB::table('message')->where('uid', $Value)->first() );
        if ($Message) {
            $Seen = json_decode($Message['Seen'], true);
            if (!in_array($this->User['uid'], $Seen ?? [])) {
                $Seen[] = $this->User['uid'];
                DB::table('message')->where('uid',$Message['uid'])->update([
                    'Seen' => json_encode($Seen),
                    'update_at'=>date('Y-m-d H:i:s')
                ]);
                return true;
            }else {
                return false;
            }
        }else {
            return false;
        }
    }
    ///
    public function isMobile(){
        if(!empty($_SERVER['HTTP_USER_AGENT'])){
           $user_ag = $_SERVER['HTTP_USER_AGENT'];
           if(preg_match('/(Mobile|Android|Tablet|GoBrowser|[0-9]x[0-9]*|uZardWeb\/|Mini|Doris\/|Skyfire\/|iPhone|Fennec\/|Maemo|Iris\/|CLDC\-|Mobi\/)/uis',$user_ag)){
              return true;
           };
        };
        return false;
    }
    ///
    public function GenerateUid(){
        $data = null;
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);

        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
    ///
    public function GetFileContent($url){
        return File::get(public_path($url));
    }
    ///
    public function GetPdf($path){
        // initiate FPDI
        $pdf = new \FPDI();
        // add a page
        $pdf->AddPage();
        // set the source file
        // $pdf->setSourceFile($path);
        // import page 1
        $tplIdx = $pdf->importPage(1);
        // use the imported page and place it at point 10,10 with a width of 100 mm
        $pdf->useTemplate($tplIdx, 10, 10, 100);

        // now write some text above the imported page
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(255, 0, 0);
        $pdf->SetXY(30, 30);
        $pdf->Write(0, 'This is just a simple text');

        $pdf->Output();
    }
    ///
    public function PutPdf($path){

    }
    ///
    public function GetTree($User = NULL){
        if ($User) {
            $SubManagers = $this->toArray(DB::table('user')->where('ParentId', $User['uid'])->where('Type','1')->where('Status','1')->get() );
            foreach($SubManagers as $key => $manager){
                $arr = $this->GetTree($manager);
                if (count($arr[0])) {
                    foreach($arr[0] as $key => $submanager){
                        $arr2 = $this->GetTree($submanager);
                        $arr[0][$key]['SubManagers'] = $arr2[0];
                        $arr[0][$key]['Agencies'] = $arr2[1];
                    }
                }
                foreach($arr[1] as $key => $Agency){
                    $Users = $this->toArray(DB::table('user')->where('ParentId', $Agency['uid'])->where('Status','1')->get() );
                    foreach($Users as $key => $worker){
                        $Users[$key]['Appointments'] = $this->toArray(DB::table('appointment')->where('UserId', $worker['uid'])->where('Status','1')->get() );
                    }
                    $arr[1][$key]['Users']=$Users;
                }
                $SubManagers[$key]['SubManagers'] = $arr[0];
                $SubManagers[$key]['Agencies']= $arr[1];
            }
            $Agencies = $this->toArray(DB::table('agency')->where('ParentId', $User['uid'])->where('Status','1')->get() );
            foreach($Agencies as $key => $Agency){
                $Users = $this->toArray(DB::table('user')->where('ParentId', $Agency['uid'])->where('Status','1')->get() );
                foreach($Users as $key1 => $worker){
                    $Users[$key1]['Appointments'] = $this->toArray(DB::table('appointment')->where('UserId', $worker['uid'])->where('Status','1')->get() );
                }
                $Agencies[$key]['Users'] = $Users;
            }
            return [$SubManagers,$Agencies];
        }         
        return false;
    }
    ///
    public function Notify($UserId, $Targets, $Content){
        DB::table('notification')->insert([
            'UserId'=>$UserId,
            'Target'=>json_encode($Targets),
            'Content'=>$Content
        ]);
        return true;
    }
    ///
    public function slugify($text, string $divider = '-'){
      // replace non letter or digits by divider
      $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      // trim
      $text = trim($text, $divider);

      // remove duplicate divider
      $text = preg_replace('~-+~', $divider, $text);

      // lowercase
      $text = strtolower($text);

      if (empty($text)) {
        return 'n-a';
      }

      return $text;
    }


    /* End of the Class */
}
