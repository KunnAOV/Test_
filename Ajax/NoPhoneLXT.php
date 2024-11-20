<?php
session_start();
// SOURCE by LE XUAN TRUONG;
    $HOTEN  = $_GET['hoten'];
if ($HOTEN == null)
{
     echo '{"error": "validata"}';
}
else {
    echo '{"success": "OKLOGIN"}';
}
