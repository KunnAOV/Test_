
<!doctype html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>View Account Change Password Success</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<br>       
<script>
function copyTo(input) {
  input.select();
  document.execCommand("copy");
}
</script>
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
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 9 and sotuong < 20 ")->fetch_array();
$Acc2x      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 19 and sotuong < 30 ")->fetch_array();
$Acc3x      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 29 and sotuong < 40 ")->fetch_array();
$Acc4x      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 39 and sotuong < 50 ")->fetch_array();
$Acc5x      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 49 and sotuong < 60 ")->fetch_array();
$Acc6x      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 59 and sotuong < 70 ")->fetch_array();
$Acc7x      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 69 and sotuong < 80 ")->fetch_array();
$Acc8x      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 79 and sotuong < 90 ")->fetch_array();
$Acc9x      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 89 and sotuong < 100 ")->fetch_array();
$Acc10x      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong > 99 and sotuong < 115 ")->fetch_array();
$AccKXD      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE sotuong = 'KXD' ")->fetch_array();
$AccChuaDoiPass      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE passnew = '' ")->fetch_array();
?>
<?php
$TableName = "account_ttt";
$SQL1x = mysqli_query  ($ConnectData, "SELECT * FROM $TableName WHERE sotuong > 9 and sotuong < 20  ORDER BY id DESC");
$SQL2x = mysqli_query  ($ConnectData, "SELECT * FROM $TableName WHERE sotuong > 19 and sotuong < 30  ORDER BY id DESC");
$SQL3x = mysqli_query  ($ConnectData, "SELECT * FROM $TableName WHERE sotuong > 29 and sotuong < 40  ORDER BY id DESC");
$SQL4x = mysqli_query  ($ConnectData, "SELECT * FROM $TableName WHERE sotuong > 39 and sotuong < 50  ORDER BY id DESC");
$SQL5x = mysqli_query  ($ConnectData, "SELECT * FROM $TableName WHERE sotuong > 49 and sotuong < 60  ORDER BY id DESC");
$SQL6x = mysqli_query  ($ConnectData, "SELECT * FROM $TableName WHERE sotuong > 59 and sotuong < 70  ORDER BY id DESC");
$SQL7x = mysqli_query  ($ConnectData, "SELECT * FROM $TableName WHERE sotuong > 69 and sotuong < 80  ORDER BY id DESC");
$SQL8x = mysqli_query  ($ConnectData, "SELECT * FROM $TableName WHERE sotuong > 79 and sotuong < 90  ORDER BY id DESC");
$SQL9x = mysqli_query  ($ConnectData, "SELECT * FROM $TableName WHERE sotuong > 89 and sotuong < 100  ORDER BY id DESC");
$SQL10x = mysqli_query  ($ConnectData, "SELECT * FROM $TableName WHERE sotuong > 99 and sotuong < 120  ORDER BY id DESC");
$SQLKXD = mysqli_query  ($ConnectData, "SELECT * FROM $TableName WHERE sotuong = 'KXD'  ORDER BY id DESC");
$ChuaChange = mysqli_query  ($ConnectData, "SELECT * FROM $TableName WHERE passnew = '' ORDER BY id DESC");

?>

<div class="col-sm-3 col-xs-12">            

<a href="/cp" class="btn btn-primary"> Về AMDIN </a><br><BR></div>
<div class="col-md-12">
<div class="container-fluid"><div class="row">
<div class="card">
<div class="header">
<h5 class="title"> List Account TTT </h5>
</div>
<hr>

                    <div class="content">
   
                     
<form method="POST"> 
<div class="row">
    <div class="col-sm-3 col-xs-12">
        <div class="form-group">
            <label for="wheel_1"> Account 1x Có <?=$Acc1x[0]?> :</label>
            <textarea class="form-control" name="Notify" id="exampleFormControlTextarea1" rows="3" onclick="copyTo(this)"><?php while ($row = mysqli_fetch_assoc($SQL1x)){echo $row['user'].'|'.$row['passnew'];?>&#13;&#10;<?php } ?></textarea>
        </div>
    </div>
    <div class="col-sm-3 col-xs-12">
        <div class="form-group">
                 <label for="wheel_1"> Account 2x Có <?=$Acc2x[0]?>:</label>
            <textarea class="form-control" name="Notify" id="exampleFormControlTextarea1" rows="3" onclick="copyTo(this)"><?php while ($row = mysqli_fetch_assoc($SQL2x)){echo $row['user'].'|'.$row['passnew'];?>&#13;&#10;<?php } ?></textarea>
        </div>
    </div>
    <div class="col-sm-3 col-xs-12">
        <div class="form-group">
                     <label for="wheel_1"> Account 3x  <?=$Acc3x[0]?>:</label>
             <textarea class="form-control" name="Notify" id="exampleFormControlTextarea1" rows="3" onclick="copyTo(this)"><?php while ($row = mysqli_fetch_assoc($SQL3x)){echo $row['user'].'|'.$row['passnew'];?>&#13;&#10;<?php } ?></textarea>
        </div>
    </div>
    <div class="col-sm-3 col-xs-12">
        <div class="form-group">
                  <label for="wheel_1">  Account 4x Có <?=$Acc4x[0]?>:</label>
            <textarea class="form-control" name="Notify" id="exampleFormControlTextarea1" rows="3" onclick="copyTo(this)"><?php while ($row = mysqli_fetch_assoc($SQL4x)){echo $row['user'].'|'.$row['passnew'];?>&#13;&#10;<?php } ?></textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-3 col-xs-12">
        <div class="form-group">
                      <label for="wheel_1"> Account 5x Có <?=$Acc5x[0]?>:</label>
            <textarea class="form-control" name="Notify" id="exampleFormControlTextarea1" rows="3" onclick="copyTo(this)"><?php while ($row = mysqli_fetch_assoc($SQL5x)){echo $row['user'].'|'.$row['passnew'];?>&#13;&#10;<?php } ?></textarea>
        </div>
    </div>
    <div class="col-sm-3 col-xs-12">
        <div class="form-group">
                       <label for="wheel_1"> Account 6x Có <?=$Acc6x[0]?>:</label>
             <textarea class="form-control" name="Notify" id="exampleFormControlTextarea1" rows="3" onclick="copyTo(this)"><?php while ($row = mysqli_fetch_assoc($SQL6x)){echo $row['user'].'|'.$row['passnew'];?>&#13;&#10;<?php } ?></textarea>
        </div>
    </div>
    <div class="col-sm-3 col-xs-12">
        <div class="form-group">
                   <label for="wheel_1">Account 7x Có <?=$Acc7x[0]?> :</label>
            <textarea class="form-control" name="Notify" id="exampleFormControlTextarea1" rows="3" onclick="copyTo(this)"><?php while ($row = mysqli_fetch_assoc($SQL7x)){echo $row['user'].'|'.$row['passnew'];?>&#13;&#10;<?php } ?></textarea>
        </div>
    </div>
    <div class="col-sm-3 col-xs-12">
        <div class="form-group">
                     <label for="wheel_1">Account 8x Có <?=$Acc8x[0]?> :</label>
             <textarea class="form-control" name="Notify" id="exampleFormControlTextarea1" rows="3" onclick="copyTo(this)"><?php while ($row = mysqli_fetch_assoc($SQL8x)){echo $row['user'].'|'.$row['passnew'];?>&#13;&#10;<?php } ?></textarea>
        </div>
    </div>
     <div class="col-sm-3 col-xs-12">
        <div class="form-group">
                  <label for="wheel_1">Account 9x Có <?=$Acc9x[0]?> :</label>
             <textarea class="form-control" name="Notify" id="exampleFormControlTextarea1" rows="3" onclick="copyTo(this)"><?php while ($row = mysqli_fetch_assoc($SQL9x)){echo $row['user'].'|'.$row['passnew'];?>&#13;&#10;<?php } ?></textarea>
        </div>
    </div>
     <div class="col-sm-3 col-xs-12">
        <div class="form-group">
                     <label for="wheel_1"> Account 10x Có <?=$Acc10x[0]?>:</label>
             <textarea class="form-control" name="Notify" id="exampleFormControlTextarea1" rows="3" onclick="copyTo(this)"><?php while ($row = mysqli_fetch_assoc($SQL10x)){echo $row['user'].'|'.$row['passnew'];?>&#13;&#10;<?php } ?></textarea>
        </div>
    </div>
     <div class="col-sm-3 col-xs-12">
        <div class="form-group">
                      <label for="wheel_1">Account KXD Có <?=$AccKXD[0]?> :</label>
             <textarea class="form-control" name="Notify" id="exampleFormControlTextarea1" rows="3" onclick="copyTo(this)"><?php while ($row = mysqli_fetch_assoc($SQLKXD)){echo $row['user'].'|'.$row['passnew'];?>&#13;&#10;<?php } ?></textarea>
        </div>
    </div>



 </div>

<hr>
  
  
  </form>
 <!--// </fieldset>-->
</table>

<hr>
Copyright by:<a href="https://t.me/truonglephuthuy"> Le Xuan Truong</a>