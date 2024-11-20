<?php
require_once ('Config.php');
$Select_API_DangDung1 = mysqli_query($ConnectData,"SELECT * FROM administrator WHERE id='1'");
$Row= mysqli_fetch_assoc($Select_API_DangDung1);
$Cookie=$Row['cookie'];
if(!isset($_COOKIE[$Cookie]))
{
 header("location: ../cp/Login.php");
}
$Acc1x      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 9 and sotuong < 20 and passnew != ''")->fetch_array();
$Acc2x      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 19 and sotuong < 30 and passnew != ''")->fetch_array();
$Acc3x      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 29 and sotuong < 40 and passnew != ''")->fetch_array();
$Acc4x      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 39 and sotuong < 50 and passnew != ''")->fetch_array();
$Acc5x      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 49 and sotuong < 60 and passnew != ''")->fetch_array();
$Acc6x      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 59 and sotuong < 70 and passnew != ''")->fetch_array();
$Acc7x      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 69 and sotuong < 80 and passnew != ''")->fetch_array();
$Acc8x      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 79 and sotuong < 90 and passnew != ''")->fetch_array();
$Acc9x      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 89 and sotuong < 100 and passnew != ''")->fetch_array();
$Acc10x      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 99 and sotuong < 115 and passnew != ''")->fetch_array();
$AccKXD      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong = 'KXD' ")->fetch_array();
?>
Acc 1x có: <?=$Acc1x[0]?>

Acc 2x có: <?=$Acc2x[0]?>

Acc 3x có: <?=$Acc3x[0]?>

Acc 4x có: <?=$Acc4x[0]?>

Acc 5x có: <?=$Acc5x[0]?>

Acc 6x có: <?=$Acc6x[0]?>

Acc 7x có: <?=$Acc7x[0]?>

Acc 8x có: <?=$Acc8x[0]?>

Acc 9x có: <?=$Acc9x[0]?>

Acc 10 cóx: <?=$Acc10x[0]?>

Acc KXD có: <?=$AccKXD[0]?>

<?php

$TableName = "account_ttt"; 
$Output = "";
$strSQL = "SELECT * FROM $TableName WHERE sotuong > 9 and sotuong < 20 and passnew != '' ORDER BY id DESC";  
$sql = mysqli_query($ConnectData, $strSQL); 
if (mysqli_error($ConnectData)) { 
echo mysqli_error($ConnectData);
} else {
$columns_total = mysqli_num_fields($sql);
$Output .= "\n";$Output .= "\n";
while ($row = mysqli_fetch_array($sql)) {
$Output .=''.$row["user"].'|'.
$row["passnew"].'|'.
$row["sotuong"].'';
$Output .= "\n";
}
}
$strSQL = "SELECT * FROM $TableName WHERE sotuong > 19 and sotuong < 30 and passnew != '' ORDER BY id DESC";  
$sql = mysqli_query($ConnectData, $strSQL); 
if (mysqli_error($ConnectData)) { 
echo mysqli_error($ConnectData);
} else {
$columns_total = mysqli_num_fields($sql);
$Output .= "\n";$Output .= "\n";
while ($row = mysqli_fetch_array($sql)) {
$Output .=''.$row["user"].'|'.
$row["passnew"].'|'.
$row["sotuong"].'';
$Output .= "\n";
}
}
$strSQL = "SELECT * FROM $TableName WHERE sotuong > 29 and sotuong < 40 and passnew != '' ORDER BY id DESC";  
$sql = mysqli_query($ConnectData, $strSQL); 
if (mysqli_error($ConnectData)) { 
echo mysqli_error($ConnectData);
} else {
$columns_total = mysqli_num_fields($sql);
$Output .= "\n";$Output .= "\n";
while ($row = mysqli_fetch_array($sql)) {
$Output .=''.$row["user"].'|'.
$row["passnew"].'|'.
$row["sotuong"].'';
$Output .= "\n";
}
$strSQL = "SELECT * FROM $TableName WHERE sotuong > 39 and sotuong < 50 and passnew != '' ORDER BY id DESC";  
$sql = mysqli_query($ConnectData, $strSQL); 
if (mysqli_error($ConnectData)) { 
echo mysqli_error($ConnectData);
} else {
$columns_total = mysqli_num_fields($sql);
$Output .= "\n";$Output .= "\n";
while ($row = mysqli_fetch_array($sql)) {
$Output .=''.$row["user"].'|'.
$row["passnew"].'|'.
$row["sotuong"].'';
$Output .= "\n";
}
}
$strSQL = "SELECT * FROM $TableName WHERE sotuong > 49 and sotuong < 60 and passnew != '' ORDER BY id DESC";  
$sql = mysqli_query($ConnectData, $strSQL); 
if (mysqli_error($ConnectData)) { 
echo mysqli_error($ConnectData);
} else {
$columns_total = mysqli_num_fields($sql);
$Output .= "\n";$Output .= "\n";
while ($row = mysqli_fetch_array($sql)) {
$Output .=''.$row["user"].'|'.
$row["passnew"].'|'.
$row["sotuong"].'';
$Output .= "\n";
}
}
$strSQL = "SELECT * FROM $TableName WHERE sotuong > 59 and sotuong < 70  and passnew != ''  ORDER BY id DESC";  
$sql = mysqli_query($ConnectData, $strSQL); 
if (mysqli_error($ConnectData)) { 
echo mysqli_error($ConnectData);
} else {
$columns_total = mysqli_num_fields($sql);
$Output .= "\n";$Output .= "\n";
while ($row = mysqli_fetch_array($sql)) {
$Output .=''.$row["user"].'|'.
$row["passnew"].'|'.
$row["sotuong"].'';
$Output .= "\n";
}
}
$strSQL = "SELECT * FROM $TableName WHERE sotuong > 69 and sotuong < 80 and passnew != '' ORDER BY id DESC";  
$sql = mysqli_query($ConnectData, $strSQL); 
if (mysqli_error($ConnectData)) { 
echo mysqli_error($ConnectData);
} else {
$columns_total = mysqli_num_fields($sql);
$Output .= "\n";$Output .= "\n";
while ($row = mysqli_fetch_array($sql)) {
$Output .=''.$row["user"].'|'.
$row["passnew"].'|'.
$row["sotuong"].'';
$Output .= "\n";
}
}
$strSQL = "SELECT * FROM $TableName WHERE sotuong > 79 and sotuong < 90  and passnew != '' ORDER BY id DESC";  
$sql = mysqli_query($ConnectData, $strSQL); 
if (mysqli_error($ConnectData)) { 
echo mysqli_error($ConnectData);
} else {
$columns_total = mysqli_num_fields($sql);
$Output .= "\n";$Output .= "\n";
while ($row = mysqli_fetch_array($sql)) {
$Output .=''.$row["user"].'|'.
$row["passnew"].'|'.
$row["sotuong"].'';
$Output .= "\n";
}
}
$strSQL = "SELECT * FROM $TableName WHERE sotuong > 89 and sotuong < 100  and passnew != '' ORDER BY id DESC";  
$sql = mysqli_query($ConnectData, $strSQL); 
if (mysqli_error($ConnectData)) { 
echo mysqli_error($ConnectData);
} else {
$columns_total = mysqli_num_fields($sql);
$Output .= "\n";$Output .= "\n";
while ($row = mysqli_fetch_array($sql)) {
$Output .=''.$row["user"].'|'.
$row["passnew"].'|'.
$row["sotuong"].'';
$Output .= "\n";
}
}
$strSQL = "SELECT * FROM $TableName WHERE sotuong > 99 and sotuong < 115 and passnew != '' ORDER BY id DESC";  
$sql = mysqli_query($ConnectData, $strSQL); 
if (mysqli_error($ConnectData)) { 
echo mysqli_error($ConnectData);
} else {
$columns_total = mysqli_num_fields($sql);
$Output .= "\n";$Output .= "\n";
while ($row = mysqli_fetch_array($sql)) {
$Output .=''.$row["user"].'|'.
$row["passnew"].'|'.
$row["sotuong"].'';
$Output .= "\n";
}
}
$strSQL = "SELECT * FROM $TableName WHERE sotuong = 'KXD' and passnew != '' ORDER BY id DESC";  
$sql = mysqli_query($ConnectData, $strSQL); 
if (mysqli_error($ConnectData)) { 
echo mysqli_error($ConnectData);
} else {
$columns_total = mysqli_num_fields($sql);
$Output .= "\n";$Output .= "\n";
while ($row = mysqli_fetch_array($sql)) {
$Output .=''.$row["user"].'|'.
$row["passnew"].'|'.
$row["sotuong"].'';
$Output .= "\n";
}
}
echo $Output;
$Filename = 'AccDaDoiPassThanhCong.txt';
header('Content-type: application/txt');
header('Content-Disposition: attachment; filename=' . $Filename);
}


$sql = "DELETE FROM account_ttt WHERE sotuong > 9 and sotuong < 20  and passnew != ''";
$ConnectData->query($sql);


$sql = "DELETE FROM account_ttt WHERE sotuong > 19 and sotuong < 30  and passnew != ''";
$ConnectData->query($sql);


$sql = "DELETE FROM account_ttt WHERE sotuong > 29 and sotuong < 40  and passnew != ''";
$ConnectData->query($sql);

$sql = "DELETE FROM account_ttt WHERE sotuong > 39 and sotuong < 50  and passnew != ''";
$ConnectData->query($sql);

$sql = "DELETE FROM account_ttt WHERE sotuong > 49 and sotuong < 60  and passnew != ''";
$ConnectData->query($sql);

$sql = "DELETE FROM account_ttt WHERE sotuong > 59 and sotuong < 70  and passnew != ''";
$ConnectData->query($sql);

$sql = "DELETE FROM account_ttt WHERE sotuong > 69 and sotuong < 80  and passnew != ''";
$ConnectData->query($sql);

$sql = "DELETE FROM account_ttt WHERE sotuong > 79 and sotuong < 90  and passnew != ''";
$ConnectData->query($sql);

$sql = "DELETE FROM account_ttt WHERE sotuong > 89 and sotuong < 100  and passnew != ''";
$ConnectData->query($sql);

$sql = "DELETE FROM account_ttt WHERE sotuong > 99 and sotuong < 110  and passnew != ''";
$ConnectData->query($sql);

$sql = "DELETE FROM account_ttt WHERE sotuong = 'KXD'";
$ConnectData->query($sql);


exit;