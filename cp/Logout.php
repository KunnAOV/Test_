<?php
$TimeCookie = time() - (60*60*24*1000);
           setcookie("Cookie_Type_Admin", $Token["token"],$TimeCookie );
           ?>