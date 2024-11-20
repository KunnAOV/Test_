<?php
require_once ('../SystemLXT/Config.php');
// SOURCE by LE XUAN TRUONG;

    
   $EmailGetLXT  =  str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_GET['email'])))); 
    
    
    
    $MAILCHECKLXT =   $_SESSION['emaillxt'];
    $SESSIONMAIL = substr("$MAILCHECKLXT", 0, 3); 
    $InputMail = substr($EmailGetLXT,  0, 3); 
    $tk = ChecKLogin();
if ($EmailGetLXT == null)
{
     echo '{"error": "validata"}';
}
else if ($InputMail !== $SESSIONMAIL)
{
    echo '{"error": "ErrorEmail"}';
}
else {
     mysqli_query($Connect,"UPDATE `account_main` SET `mailz` =  '{$EmailGetLXT}' where `user`='".$tk."'");
       echo '{"success": "OKLOGIN"}';
}
