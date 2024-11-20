<?php
require_once ('Config.php');
$username = '';
$password ='';
if (isset($_POST["btn_submit"]))
{
    $username = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['username']))));
    $password = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['password']))));
    $password = md5($password);
    
    if ($username == "" || $password =="") 
    {
       $error = '<div class="thatbai"><strong>Thất bại: </strong> </strong>Không được bỏ trống tên Username hoặc Password!';
    }
    else
    {   
        
        $CheckToken = mysqli_query($ConnectData,"SELECT * FROM `administrator`");
        $Token = mysqli_fetch_assoc($CheckToken);
        $sql = "SELECT * FROM `administrator` WHERE `username` = '".$username."' AND `password` = '".$password."' AND `level` = 'admin'  ";
        $query = mysqli_query($ConnectData,$sql);
        $num_rows = mysqli_num_rows($query);

        if ($num_rows == 0) 
        {
            $error = '<div class="thatbai"><strong>Thất bại: </strong>Thông tin đăng nhập không chính xác!';
        }
        else
        {
            
          
           $TimeCookie = time() + (60*60*24*1000);
           setcookie($Token['cookie'], $Token["token"],$TimeCookie );
           header("location: Admin.php");
        }
        }
    }

?> 

<html>
<head>
<meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <link rel="stylesheet" type="text/css" href="<?=$Domain?>/cp/theme/Login.css" media="all,handheld" />  
  </head>
    <form method="POST"> 
<center>
    <img src="theme/batdongsan.png" width="300" height="80"> 
<br>  <hr>  <font color="#009ACD"> <b>ĐĂNG NHẬP HỆ THỐNG QUẢN TRỊ BẤT ĐỘNG SẢN!!</b></font></center></b> <br>
<?php echo (isset($error)) ? $error : ''; ?></div>
    <div class="inputGroup inputGroup1">
        <label for="loginEmail"  id="loginEmailLabel">Username</label>
        <input type="text" value="<?php echo (isset($username)) ? $username : ''; ?>" name="username" maxlength="254" />
    </div>
    <div class="inputGroup inputGroup2">
        <label for="loginPassword" id="loginPasswordLabel">Password</label>
        <input type="password" value="" name="password" id="loginPassword" />
      
            <div class="indicator"></div>
        </label>
    </div>
       
    <div class="inputGroup inputGroup3">
        <button name="btn_submit" id="login">Log in</button>

    </div>
</form>
  </body>
</html>






              
            