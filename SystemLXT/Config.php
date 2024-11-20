<?php
// SOURCE BY LXT;
error_reporting(0);
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
function LxtConnectDB()
{
    define("LOCALHOST", "localhost");      // GIỮ NGUYÊN;
    define("USERNAME", "hongko22_CONGDONG"); // USERNAME;
    define("PASSWORD", "hongko22_CONGDONG"); // PASSWORDS;
    define("DATABASE", "hongko22_CONGDONG"); // DATABASE;
    $Connect = mysqli_connect(LOCALHOST, USERNAME, PASSWORD, DATABASE) or die("LỖI: CHƯA KẾT NỐI CƠ SỞ DỮ LIỆU");
    return $Connect;
}   
    $Connect = LxtConnectDB();
    mysqli_set_charset($Connect, "UTF8");
    $QUERY_SETTING = mysqli_query($Connect,"SELECT * FROM `settingsite` WHERE id=1");
while ($site = mysqli_fetch_array($QUERY_SETTING) ) 
{
    $YeuCau = $site['YeuCau'];
    $QuaChaoMung = $site['QuaChaoMung'];
    $QuaHangThang = $site['QuaHangThang'];
    $QuaSuKienDacBiet = $site['QuaSuKienDacBiet'];
    $HoTroTruyenThong = $site['HoTroTruyenThong'];
    $LuuY = $site['LuuY'];
    $ThoiDiemBatDauSK = $site['ThoiDiemBatDauSK'];
    $PhanQua1 = $site['PhanQua1'];
    $PhanQua2 = $site['PhanQua2'];
    $PhanQua3 = $site['PhanQua3'];
    $ChanLV = $site['ChanLV'];
    $ThongBaoAuthen = $site['ThongBaoAuthen'];

}   
function ChecKLogin() {
$USERS = $_SESSION['user'];
return $USERS;
}


?>
