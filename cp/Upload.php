<?php
include 'Config.php';
include 'Session.php';
if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    $statusMsg = '';
$targetDir = "../Upload/";
$fileName = basename($_FILES["file"]["name"]);
$content = $_POST['content'];
$targetFilePath = $targetDir . $fileName;
if (file_exists($targetDir.$fileName)) {
        echo "<div class='alert alert-danger'><span>Thất bại:</span> Tên ảnh này đã tồn tại</div>";
            }
            else {
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            $insert = $conn->query("INSERT into phanqua (images, content, time) VALUES ('".$fileName."', '".$content."', NOW())");
            if($insert){
                echo "<div class='alert alert-success'><span>Thành công:</span> Đã tải lên ảnh</div>";
            }
            
    }
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Up ảnh Phần Quà</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="col-md-12">
 <h4 class="title"> UP ẢNH PHẦN QUÀ</h4>
<form  method="post" enctype="multipart/form-data">
 <div class="mb-3">
  <label for="formFile" class="form-label">Chọn tệp</label>
  <input class="form-control" type="file" name="file" id="formFile">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Tên phần quà</label>
  <input type="text" class="form-control" name="content" id="exampleFormControlInput1" placeholder="Tên phần quà">
</div><br>
    <input type="submit" name="submit" value="Upload">
</form>

<h4 class="title"> DANH SÁCH PHẦN QUÀ</h4>
<?php
    if(!$conn)
    {
        die(mysqli_error());
    }
    
    
    $sql = "select * from phanqua";
    $rs = mysqli_query($conn, $sql);
    
    
    if(isset($_GET['deleteid']))
    {
        $querySelect = "select * from phanqua where id = ".$_GET['deleteid'];
        $ResultSelectStmt = mysqli_query($conn,$querySelect);
        $fetchRecords = mysqli_fetch_assoc($ResultSelectStmt);
        
        $fetchImgTitleName = $fetchRecords['images'];
        
        $createDeletePath = "../Upload/".$fetchImgTitleName;
        
        if(unlink($createDeletePath))
        {
            $liveSqlQQ = "delete from phanqua where id = ".$fetchRecords['id'];
            $rsDelete = mysqli_query($conn, $liveSqlQQ);    
            
            if($rsDelete)
            {
                header('location:');
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


