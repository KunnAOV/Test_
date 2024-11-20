<?php
require_once ('Session.php');
require_once ('Head.php');
require_once ('Config.php');
 $randomToken = substr(md5(mt_rand()), 0, 1000000);
 $randomCookie = substr(md5(mt_rand()), 0, 1000000);
if (isset($_POST["xulydoipass"])) {
$password = $_POST['password'] ;
$sql = "UPDATE administrator SET password= MD5('$password') where id=1";
mysqli_query($ConnectData,"UPDATE administrator SET token=('$randomToken') where id=1");
mysqli_query($ConnectData,"UPDATE administrator SET cookie=('$randomCookie') where id=1");
if ($ConnectData->query($sql) === TRUE) {
echo '<script type="text/javascript">
Swal.fire({
  title: "Thông báo",
  text: "Bạn đã đổi mật khẩu mới thành '.$password.' Vui lòng đăng nhập lại để tiếp tục",
  icon: "success",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Đồng ý"
}).then((result) => {
  if (result.isConfirmed) {
   window.open("../cp/Login.php");
  }
})
</script>';
} else {
    echo "Error updating record: " . $ConnectData->error;


} 

} 
if  (isset($_POST['xulychangeluotquay'])){
$LvDuocPhep = $_POST['chanlv'];
$fp = fopen('../login/chanlv.txt', 'w');//mở file ở chế độ write-only
fwrite($fp, $LvDuocPhep);
fclose($fp);
echo '<div class="alert alert-success" role="alert">Thay đổi thành công!</div><br>';
}
$luotquay = file_get_contents('../login/luotquay.txt');
$chanlv = file_get_contents('../login/chanlv.txt');
?>
<!doctype html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Thiết Lập Chung</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<br>       
<div class="col-sm-3 col-xs-12">                
<a href="/cp" class="btn btn-primary"> Về AMDIN </a></div><br>
<form method="POST"> 
<HR>
 
     
                    <div class="col-md-12">
                            <div class="header">
                                  <h4 class="title"> Đổi mật khẩu ADMIN</h4>
                           
                    
           
       <input type="text" class="form-control border-input" name="password"  placeholder="Nhập mật khẩu mới">
       <br>
       <input class="btn btn-info" type="submit" name="xulydoipass" value="ĐỔI MẬT KHẨU"><br>
 
</form>
<hr>



<form method="POST">

        <div class="form-group">
            <label for="wheel_7">Chắn Level:</label>
            <input type="number" class="form-control border-input" name="chanlv"  value="<?=$chanlv?>">
        </div>
        </div><br>
   <input class="btn btn-info" type="submit" name="xulychangeluotquay" value="Lưu"><br>

     </div></div>
</form><br>
<?php
if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    $statusMsg = '';
$targetDir = "../Upload/";
$fileName = basename($_FILES["file"]["name"]);
$content = $_POST['content'];
$targetFilePath = $targetDir . $fileName;
if (file_exists($targetDir.$fileName)) {
                $mgupload = "<div class='alert alert-danger'><span>Thất bại:</span> Tên ảnh này đã tồn tại</div>";
            }
            else {
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            $insert = $ConnectData->query("INSERT into phanqua (images, content, time) VALUES ('".$fileName."', '".$content."', NOW())");
            if($insert){
                $mgupload = "<div class='alert alert-success'><span>Thành công:</span> Đã tải lên ảnh</div>";
            }
            
    }
}
}
?>

<div class="col-md-12"><hr>

 <h4 class="title"> UP ẢNH PHẦN QUÀ</h4>
 <?=$mgupload ?>
<form  method="post" enctype="multipart/form-data">
 <div class="mb-3">
  <label for="formFile" class="form-label">Chọn tệp</label>
  <input class="form-control" type="file" name="file" id="formFile">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Tên phần quà</label>
  <input type="text" class="form-control" name="content" id="exampleFormControlInput1" placeholder="Tên phần quà">
</div><br>
    <input type="submit" name="submit" class="btn btn-info" value="Upload">
</form>
<hr>
<h4 class="title"> DANH SÁCH PHẦN QUÀ</h4>
<?php
    if(!$ConnectData)
    {
        die(mysqli_error());
    }
    
    
    $sql = "select * from phanqua";
    $rs = mysqli_query($ConnectData, $sql);
    
    
    if(isset($_GET['deleteid']))
    {
        $querySelect = "select * from phanqua where id = ".$_GET['deleteid'];
        $ResultSelectStmt = mysqli_query($ConnectData,$querySelect);
        $fetchRecords = mysqli_fetch_assoc($ResultSelectStmt);
        
        $fetchImgTitleName = $fetchRecords['images'];
        
        $createDeletePath = "../Upload/".$fetchImgTitleName;
        
        if(unlink($createDeletePath))
        {
            $liveSqlQQ = "delete from phanqua where id = ".$fetchRecords['id'];
            $rsDelete = mysqli_query($ConnectData, $liveSqlQQ);    
            
            if($rsDelete)
            {
                header('location: ../cp/ThietLapChung.php');
                exit();
            }
        }
        else
        {
            $displayErrMessage = "Sorry, Xoá thất bại";
        }
        
    }

    
?>



        <?php 
        if(isset($displayErrMessage))
        {
        ?>
            <div class="alert alert-danger">
                <?php 
                    echo $displayErrMessage;
                    unset($displayErrMessage);
                ?>
            </div>
        <?php 
        }
        ?>
        
        <?php 
        if(isset($_GET['success']) && $_GET['success'] == 'true')
        {
        ?>
            
                <?php 
                    echo "Images has been deleted sucessfully";
                ?>
            
        <?php 
        }
        ?>
        
         <table id="example1" class="table table-bordered table-striped" style="width:100%">
      <thead>
         <tr>
            <th>STT</th>
            <th>Ảnh</th>
            <th>Tên Phần Quà</th>
            <th>ThaoTác</th>
         </tr>
        
    <?php 
        $STT = 1;
        while($row = mysqli_fetch_assoc($rs))
        {
            $galleryImgPathW = "../Upload/".$row['images'];
        ?>  
            <tr>
            <td><?=$STT++?></td>
            <td><img src="<?php echo $galleryImgPathW ?>" width="50" height="50"></td>
            <td><?=$row["content"]?></td>
            <td><a href="?deleteid=<?php echo $row["id"]?>" class="btn btn-primary">Delete</a></td>
            </div>
            </tr>
            
    <?php       
        }
        
    ?>
    </div>
    </div>
    
    
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 



