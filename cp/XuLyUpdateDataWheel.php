<?php
require_once ('Session.php');
require_once ('Config.php');
?>  
<?php
    $UrlImages1 = $_POST['url1'];
    $UrlImages2 = $_POST['url2'];
    $UrlImages3 = $_POST['url3'];
    $UrlImages4 = $_POST['url4'];
    $UrlImages5 = $_POST['url5'];
    $UrlImages6 = $_POST['url6'];
    $UrlImages7 = $_POST['url7'];
    $UrlImages8 = $_POST['url8'];
    $Conten1 = $_POST['conten1'];
    $Conten2 = $_POST['conten2'];
    $Conten3 = $_POST['conten3'];
    $Conten4 = $_POST['conten4'];
    $Conten5 = $_POST['conten5'];
    $Conten6 = $_POST['conten6'];
    $Conten7 = $_POST['conten7'];
    $Conten8 = $_POST['conten8'];
if (isset($_POST['XuLyDuLieuGocQuay'])) {
    mysqli_query($ConnectData,"UPDATE `dulieuvongquay` SET `images` = '".$UrlImages1."' where `id`='1'");
    mysqli_query($ConnectData,"UPDATE `dulieuvongquay` SET `noidung` = '".$Conten1."' where `id`='1'");
    
    mysqli_query($ConnectData,"UPDATE `dulieuvongquay` SET `images` = '".$UrlImages2."' where `id`='2'");
    mysqli_query($ConnectData,"UPDATE `dulieuvongquay` SET `noidung` = '".$Conten2."' where `id`='2'");
    
    mysqli_query($ConnectData,"UPDATE `dulieuvongquay` SET `images` = '".$UrlImages3."' where `id`='3'");
    mysqli_query($ConnectData,"UPDATE `dulieuvongquay` SET `noidung` = '".$Conten3."' where `id`='3'");
    
    mysqli_query($ConnectData,"UPDATE `dulieuvongquay` SET `images` = '".$UrlImages4."' where `id`='4'");
    mysqli_query($ConnectData,"UPDATE `dulieuvongquay` SET `noidung` = '".$Conten4."' where `id`='4'");
    
    mysqli_query($ConnectData,"UPDATE `dulieuvongquay` SET `images` = '".$UrlImages5."' where `id`='5'");
    mysqli_query($ConnectData,"UPDATE `dulieuvongquay` SET `noidung` = '".$Conten5."' where `id`='5'");
    
    mysqli_query($ConnectData,"UPDATE `dulieuvongquay` SET `images` = '".$UrlImages6."' where `id`='6'");
    mysqli_query($ConnectData,"UPDATE `dulieuvongquay` SET `noidung` = '".$Conten6."' where `id`='6'");
    
    mysqli_query($ConnectData,"UPDATE `dulieuvongquay` SET `images` = '".$UrlImages7."' where `id`='7'");
    mysqli_query($ConnectData,"UPDATE `dulieuvongquay` SET `noidung` = '".$Conten7."' where `id`='7'");
    
    mysqli_query($ConnectData,"UPDATE `dulieuvongquay` SET `images` = '".$UrlImages8."' where `id`='8'");
    mysqli_query($ConnectData,"UPDATE `dulieuvongquay` SET `noidung` = '".$Conten8."' where `id`='8'");

         echo '<script type="text/javascript">Swal.fire("Thông Báo","Thay đổi thành công","success");
                setTimeout(function(){ location.href = "../cp/ThietLapChung.php" },1000);</script>';
  }
?>