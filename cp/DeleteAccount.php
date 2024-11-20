<?php
require_once ('Session.php');
require_once ('Config.php');
?>
<?php
// Xử lý xoá tất cả Account xây dựng bởi Lê Trường
if (isset($_GET['deleteallfacebook'])) {
$Tablename = 'acc';
$Delete = 'TRUNCATE '.$Tablename;
$Query=mysqli_query($ConnectData,$Delete);
header ('location: /cp');
} elseif (isset($_GET['DeleteAllGas'])) {
$Tablename = 'account_main';
$Delete = 'TRUNCATE '.$Tablename;
$Query=mysqli_query($ConnectData,$Delete);
header ('location: /cp');
} elseif (isset($_GET['DeleteAllGasAuthen'])) {
$Tablename = 'account_sms';
$Delete = 'TRUNCATE '.$Tablename;
$Query=mysqli_query($ConnectData,$Delete);
header ('location: /cp');
} elseif (isset($_GET['DeleteAllGasTrang'])) {
$Tablename = 'account_ttt';
$Delete = 'TRUNCATE '.$Tablename;
$Query=mysqli_query($ConnectData,$Delete);
header ('location: /cp');
} elseif (isset($_GET['DeleteAllGasLoiPassWord'])) {
$Tablename = 'account_loi';
$Delete = 'TRUNCATE '.$Tablename;
$Query=mysqli_query($ConnectData,$Delete);
header ('location: /cp');
}

// Xử lý xoá từng User xây dựng bởi Lê Trường

if (isset($_GET['ApiDeleteUserFacebook'])) {
$id=$_GET['id'];
$sql = "DELETE FROM acc WHERE id='$id'";
$ConnectData->query($sql);
header ('location: /cp');
} elseif (isset($_GET['ApiDeleteUserTongGas'])) {
$id=$_GET['id'];
$sql = "DELETE FROM account_main WHERE id='$id'";
$ConnectData->query($sql);
header ('location: /cp');
} 
elseif (isset($_GET['ApiDeleteURLAPI'])) {
$id=$_GET['id'];
$sql = "DELETE FROM API WHERE id='$id'";
$ConnectData->query($sql);
header ('location: /cp/Api.php');
} elseif (isset($_GET['ApiDeleteUserGasAuthen'])) {
$id=$_GET['id'];
$sql = "DELETE FROM account_sms WHERE id='$id'";
$ConnectData->query($sql);
header ('location: /cp');
} elseif (isset($_GET['ApiDeleteUserGasTTT'])) {
$id=$_GET['id'];
$sql = "DELETE FROM account_ttt WHERE id='$id'";
$ConnectData->query($sql);
header ('location: /cp');
} elseif (isset($_GET['ApiDeleteUserGasLoiPass'])) {
$id=$_GET['id'];
$sql = "DELETE FROM account_loi WHERE id='$id'";
$ConnectData->query($sql);
header ('location: /cp');
    }
?>