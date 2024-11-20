
<?php 
session_start();
$KeyTinsoftProxy ="TL5yGFrbrIWYg9grGvMvOWeqYkuM3TkLVBdXUv";
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time_save       = date('d/m/Y H:i:s');
$ip         =  get_user_ip();
$conn       = mysqli_connect
(
'localhost',  // Máy chủ
'hongko22_CONGDONG',  // Tên người dùng
'hongko22_CONGDONG',  // Mật khẩu
'hongko22_CONGDONG'   // Tên database
)
or die ('Chưa kết nối cơ sở dữ liệu');
mysqli_set_charset($conn,"UTF8");
function _chuyenhuong($Alert, $Link)
{
	die('<script>alert("'.$Alert.'");window.location="'.$Link.'";</script>');
}


function get_user_ip() {
    if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') > 0) {
            $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($addr[0]);
        } else {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}





?>