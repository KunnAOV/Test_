<?php
require_once ('../SystemLXT/Config.php');
// SOURCE by LE XUAN TRUONG;
    $PhoneGetLXT  = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_GET['phone']))));
    $EmailGetLXT  =  str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_GET['email'])))); 
    
    $PHONECHECK =   $_SESSION['phone'];
    $SESSIONPHONE = substr($PHONECHECK, -4);
    $InputPhone = substr($PhoneGetLXT, -4); 
    
    $MAILCHECKLXT =   $_SESSION['emaillxt'];
    $SESSIONMAIL = substr("$MAILCHECKLXT", 0, 3); 
    $InputMail = substr($EmailGetLXT,  0, 3); 
    $tk = ChecKLogin();
if ($PhoneGetLXT == null || $EmailGetLXT == null)
{
     echo '{"error": "validata"}';
}
else if ($InputPhone !== $SESSIONPHONE)
{
    echo '{"error": "ErrorPhone"}';
}
else if ($InputMail !== $SESSIONMAIL)
{
    echo '{"error": "ErrorEmail"}';
}
else {
    
    mysqli_query($Connect,"UPDATE `account_main` SET `sdtz` =  '{$PhoneGetLXT}' where `user`='".$tk."'"); 
    mysqli_query($Connect,"UPDATE `account_main` SET `mailz` =  '{$EmailGetLXT}' where `user`='".$tk."'");
     echo '{"success": "OKLOGIN"}';
}
