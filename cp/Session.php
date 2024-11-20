<?php
include 'Config.php';
$Select_API_DangDung1 = mysqli_query($ConnectData,"SELECT * FROM administrator WHERE id='1'");
$Row= mysqli_fetch_assoc($Select_API_DangDung1);
$Cookie=$Row['cookie'];
if(!isset($_COOKIE[$Cookie]))
{
 header("location: ../cp/Login.php");
}
?> 