<?php
ob_start();
session_start();
error_reporting(E_ALL);
/**
 * 
 */

class QrCode{

    public function __construct(){
        //$this->QrBase='https://developers.googleapis.com/chart?chs=%dx%d&cht=qr&chl=%s';
        $this->QrBase = 'https://api.qrserver.com/v1/create-qr-code/?size=%d&data=%s';
    }
    public function Create($url, $size = 250){
        $this->Url=$url;
        $url = sprintf($this->QrBase, $size, $this->Url);
        return $url;
    }
}
///
function getBrowser(){

     $u_agent = $_SERVER['HTTP_USER_AGENT']; 
     $bname = 'Bilinmiyor';
     $platform = 'Bilinmiyor';
     $version= "";
     //Hangi platformdan gelmiş, Linux, Windows, MacOSX?
     if (preg_match('/linux/i', $u_agent)) {
         $platform = 'linux';
     }
     elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
         $platform = 'mac';
     }
     elseif (preg_match('/windows|win32/i', $u_agent)) {
         $platform = 'windows';
     }
     //Sonra hangi tarayıcı olduğuna  göz atalım
     if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
     { 
         $bname = 'Internet Explorer'; 
         $ub = "MSIE"; 
     } 
     elseif(preg_match('/Firefox/i',$u_agent)) 
     { 
         $bname = 'Mozilla Firefox'; 
         $ub = "Firefox"; 
     } 
     elseif(preg_match('/Chrome/i',$u_agent)) 
     { 
         $bname = 'Google Chrome'; 
         $ub = "Chrome"; 
     } 
     elseif(preg_match('/Safari/i',$u_agent)) 
     { 
         $bname = 'Apple Safari'; 
         $ub = "Safari"; 
     } 
     elseif(preg_match('/Opera/i',$u_agent)) 
     { 
         $bname = 'Opera'; 
         $ub = "Opera"; 
     } 
     elseif(preg_match('/Netscape/i',$u_agent)) 
     { 
         $bname = 'Netscape'; 
         $ub = "Netscape"; 
     } 
     $known = array('Version', $ub, 'other');
     $pattern = '#(?<browser>' . join('|', $known) .
     ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
 
     if (!preg_match_all($pattern, $u_agent, $matches)) {
         // buraya kadar bulamadık, aramaya devam
     }
     
     $i = count($matches['browser']);
     if ($i != 1) {
 
         if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
             $version= $matches['version'][0];
         }
         else {
             $version= $matches['version'][1];
         }
     }
     else {
         $version= $matches['version'][0];
     }
     
     if ($version==null || $version=="") {$version="?";}
     
     return array(
         'userAgent' => $u_agent,
         'name'      => $bname,
         'version'   => $version,
         'platform'  => $platform,
         'pattern'    => $pattern
     );
}
///
function GetCookie($dir) {
    $dir = base_path() . '/' . $dir;
    echo "Deleting directory: $dir\n";
    if (!file_exists($dir)) {
        echo "Directory does not exist: $dir\n";
        return true;
    }
    if (!is_dir($dir)) {
        echo "Path is not a directory: $dir\n";
        return unlink($dir);
    }
    foreach (new DirectoryIterator($dir) as $item) {
        if ($item->isDot()) {
            continue;
        }
        if ($item->isDir()) {
            if (!deleteDirectory($item->getPathname())) {
                echo "Failed to delete subdirectory: " . $item->getPathname() . "\n";
                return false;
            }
        } else {
            if (!unlink($item->getPathname())) {
                echo "Failed to delete file: " . $item->getPathname() . "\n";
                return false;
            }
        }
    }
    return rmdir($dir);
}
///
function GetLocation(){

	$ip = $_SERVER['REMOTE_ADDR'];
	$ch = curl_init('http://ip-api.com/json/'.$ip.'?lang=en');
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
	    'Content-Type: application/json'                                                                                
	));
	return $result = curl_exec($ch);    
}
///
function isAnyExist($array1,$array2){
    if ($array1 !=NULL && $array2 !=NULL) {
        foreach ($array1 as $key1 => $value1) {
            if (in_array($value1, $array2)) {
                return $value1;
            }
        }        
    }
    return false;
}
///
function isAllExist($array1,$array2){
    if ($array1 !=NULL && $array2 !=NULL) {
        foreach ($array1 as $key => $value) {
            if (!in_array($value, $array2)) {
                return false;
            }
        }
    }
    return true;
}
///
function User($Parameter=false){
	if (!empty($_SESSION['User'])) {
		if ($Parameter) {
			foreach($_SESSION['User'] as $key => $value){
				if ($key==$Parameter) {
					return $value;
				}
			}
		}else {
			return $_SESSION;
		}
	}else {
		return [];
	}
}
///
function MinVal($array){
    $data=[];
    $i = 0;
    for ($i=0; $i<count($array); $i++) {
        $data[]=$array[$i]['rate'];
    }
    foreach ($array as $row){
        if ($row['rate']==min($data)) {
            return $row;
        }
    }
    return false;
}
///
function MaxVal($array){
    $data=[];
    $i = 0;
    for ($i=0; $i<count($array); $i++) {
        $data[]=$array[$i]['rate'];
    }
    foreach ($array as $row){
        if ($row['rate']==min($data)) {
            return $row;
        }
    }
    return false;
}
function PrintOut($data){
    if (is_array($data)) {
        echo '<pre>';
        print_r($data);
        echo '<pre>';
    }else {
        echo '<pre>';
        echo json_encode($data);
        echo '<pre>';
    }
        exit;
}
function isMobile(){
    if(!empty($_SERVER['HTTP_USER_AGENT'])){
       $user_ag = $_SERVER['HTTP_USER_AGENT'];
       if(preg_match('/(Mobile|Android|Tablet|GoBrowser|[0-9]x[0-9]*|uZardWeb\/|Mini|Doris\/|Skyfire\/|iPhone|Fennec\/|Maemo|Iris\/|CLDC\-|Mobi\/)/uis',$user_ag)){
          return true;
       };
    };
    return false;
}
///
function Country($Param, $SearchType = 'DialCode'){
    if ($SearchType == 'DialCode') {
        if (!empty($Param)) {
            $contents = File::get(base_path('public/assets/json/CountryCodes.json'));
            $Arr = json_decode($contents, true); 
            foreach($Arr as $Country){
                if ($Country['dial_code']==$Param) {
                    return $Country;
                }
            }       
        }else {
            $contents = File::get(base_path('public/assets/json/CountryCodes.json'));
            return $json = json_decode($contents, true);
        }
    }else if ($SearchType == 'Code') {
            $contents = File::get(base_path('public/assets/json/CountryCodes.json'));
            $Arr = json_decode($contents, true); 
            foreach($Arr as $Country){
                if ($Country['code']==$Param) {
                    return $Country;
                }
            } 
    }
}
///
function toArray($Object){
    return json_decode(json_encode($Object), true);
}
///
function Main($param = false){

    if ($param) {
        $Main = toArray( DB::table('main')->first() );
        if (array_key_exists($param, $Main)) {
            return $Main[$param];
        }else {
            return false;
        }
    }else {
        return toArray( DB::table('main')->first() );
    }
}
///
function FormatEuros($amount){

    $formatted = "€" . number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $amount)), 0);
    return $amount < 0 ? "({$formatted})" : "{$formatted}";

}
///
function Categories($params=['Status'=>'1'], $limit=100,$sort=['Id','asc']){
    $Categories =  DB::table('category');
    foreach($params as $keyparam => $param){
        $Categories->where($keyparam, $param);
    }
    $Categories->limit($limit);
    $Categories->orderBy($sort[0],$sort[1]);
    $Categories = toArray($Categories->get());
    foreach($Categories as $key => $Category){
        $Products = toArray( DB::table('treatment')->where('ParentId', $Category['Id'])->where('Status', '1')->get() );  
        $Categories[$key]['Treatments'] = $Products;
    }
    return $Categories;
}
function Treatments($params=['Status'=>'1'], $limit=100,$sort=['Id','asc']){
    $Treatments =  DB::table('treatment')->where('Lang', App::getLocale());
    foreach($params as $keyparam => $param){
        $Treatments->where($keyparam, $param);
    }
    $Treatments->limit($limit);
    $Treatments->orderBy($sort[0],$sort[1]);
    $Treatments = toArray($Treatments->get());
    return $Treatments;
}
function GetData($table=false, $params=['Status'=>'1'], $limit=100,$sort=['Id','asc'],$First=false){
    if ($table) {
        $data =  DB::table($table);
        if ($params) {
            foreach($params as $keyparam => $param){
                $data->where($keyparam, $param);
            }
        }
        if ($limit) {
            $data->limit($limit);
        }
        if ($sort) {
            $data->orderBy($sort[0],$sort[1]);
        }
        if (@$params['Id'] || @$params['uid'] || $First) {
            $data = toArray($data->first());
        }else {
            $data = toArray($data->get());
        }
        
        return $data;
    }
}
function num2k($number) {
    if ($number >= 1000 && $number < 1000000) {
        // Format as 'x.xk'
        return number_format($number / 1000, $number % 1000 === 0 ? 0 : 1) . 'k';
    } elseif ($number >= 1000000) {
        // Format as 'x.xM'
        return number_format($number / 1000000, $number % 1000000 === 0 ? 0 : 1) . 'M';
    }
    // For numbers less than 1000, return as is
    return (string)$number;
}
///
function GetMyMessages(){
        $Count = 0;
        $chats = toArray(DB::table('chat')->where('UserTo',User('uid'))->orwhere('UserFrom',User('uid'))->get());
        foreach($chats as $chat){
            $messages =  toArray(DB::table('message')->where('ChatId',$chat['uid'])->get());
            foreach($messages as $message){
                if (!str_contains($message['Seen'], User('uid')) ) {
                    $Count ++;
                }
                
            }
        }
        return $Count;
}
?>





