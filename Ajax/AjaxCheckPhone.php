<?php
require_once ('../SystemLXT/Config.php');
// SOURCE by LE XUAN TRUONG;

$PhoneGetLXT  = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_GET['phone']))));
    $PHONECHECK =   $_SESSION['phone'];
    $SESSIONPHONE = substr($PHONECHECK, -4);
    $InputPhone = substr($PhoneGetLXT, -4); 
    $tk = ChecKLogin();
if ($PhoneGetLXT == null)
{
     echo '{"error": "validata"}';
}
else if ($InputPhone !== $SESSIONPHONE)
{
    echo '{"error": "ErrorPhone"}';
}
else {
     mysqli_query($Connect,"UPDATE `account_main` SET `sdtz` =  '{$PhoneGetLXT}' where `user`='".$tk."'");
     echo '{"success": "OKLOGIN"}';

}