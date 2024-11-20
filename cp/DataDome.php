<?php
require_once 'Session.php';
require_once 'User_Agent.php';

$dd = (!empty(file_get_contents('../DataDome.txt')) ? file_get_contents('../DataDome.txt') : '.keep');
$headers = array(
	"x-datadome-clientid: ".$dd,
	  "User-Agent: $UAMobile",
	'X-Requested-With: XMLHttpRequest'
);
$c = curl_init();
$tk="quyethoc1996";
	curl_setopt($c, CURLOPT_URL, "https://connect.garena.com/api/prelogin?account=$tk&format=json&id=$time&app_id=100001");
	curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
	$rq1 = curl_exec($c);
	curl_close($c);
	
	
	$arrayc = json_decode($rq1,true);
	
	
	if(isset($arrayc['url'])){
	    
	    $fields = [
            'url' => $arrayc['url']
        
        ];
        
        $postdata = http_build_query($fields);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, 'https://quaynhanh.net/test3.php?name=ngoctran');
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        
        $result = json_decode($result,true);
        
        if($result['err'] == 0){
            
            
            $handle = fopen("../DataDome.txt", 'w+');
            fwrite($handle, $result['msg']);
            fclose($handle);
            
            
            
            $headers = array(
            	"x-datadome-clientid: ".$result['msg'],
            	  "User-Agent: $UAMobile",
            	'X-Requested-With: XMLHttpRequest'
            );
            $c = curl_init();
        	curl_setopt($c, CURLOPT_URL, "https://connect.garena.com/api/prelogin?account='.$tk.'&format=json&id='.$time.'&app_id=100001");
        	curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        	curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
        	curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
        	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        	curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
        	$rq1 = curl_exec($c);
        	curl_close($c);

            
            
            echo $rq1;
            
        } else {
            
            echo '{"id": "1645879565873", "error": "error_nap_captcha"}';
            die();
        }

	
}