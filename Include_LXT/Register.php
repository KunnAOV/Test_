<div class="ReactModalPortal">
   <div class="ReactModal__Overlay ReactModal__Overlay--after-open" style="position: fixed; inset: 0px; background-color: rgba(255, 255, 255, 0.75);">
      <div class="ReactModal__Content ReactModal__Content--after-open modal-select modal-register-info" tabindex="-1" role="dialog">
         <div class="modal-description modal-register-info">
            <div class="modal-header">
                
     <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">   
                
                
               <h2 class="modal-title"><img src="/ThemeLXT/Images/icon-register.png" alt="Đăng ký thông tin">ĐĂNG KÝ THÔNG TIN -  NHẬN SKIN SSS</h2>
            </div>
            <div class="modal-body">
               <div class="ScrollbarsCustom trackYVisible" style="position: relative; width: 100%; height: 52vh;">
                  <div class="ScrollbarsCustom-Wrapper" style="position: absolute; inset: 0px 10px 0px 0px; overflow: hidden;">
                     <div class="ScrollbarsCustom-Scroller" style="position: absolute; inset: 0px; overflow: hidden scroll; padding-right: 20px; margin-right: -21px;">
                        <div class="ScrollbarsCustom-Content" style="box-sizing: border-box; padding: 0.05px; min-height: 100%; min-width: 100%;">
                           <div class="modal-content">
                              <form class="form-register-info">
                                 <div class="main-form">
                                    <div class="image-uploader">
                                       <div class="preview" ><img id="blah" class="preview">
                                       </div>
                                       <label  for="avatarInput" class="btn-upload btn-blue" title="Tải ảnh lên"><img src="/ThemeLXT/Images/icon-upload-image.png">Tải ảnh lên</label><input type="file" name="avatar" id="avatarInput" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="form-control d-none ">
                                        </div>
                                    <div class="form-inputs">
                                       <label for="avatarInput" class="btn-upload-photo" title="Tải ảnh lên"><img src="/ThemeLXT/Images/icon-upload-photo.png" alt="Tải ảnh lên"></label>
                                       <div class="form-group"><label for="fullNameInput">Họ tên:</label><input type="text" class="form-control " id="hoten" name="hoten" value=""></div>
                                       <div class="form-group">
                                          <label for="positionInput">Chức vụ:</label>
                                          <select class="form-control " id="positionInput" name="position">
                                             <option value=""></option>
                                             <option value="Thành viên">Khác</option>
                                             <option value="Thành viên">Thành viên</option>
                                             <option value="Leader CLB">Leader CLB</option>
                                             <option value="Leader Coffee">Leader Coffee</option>
                                             <option value="Leader Campus">Leader Campus</option>
                                             <option value="Nhân viên văn phòng">Nhân viên văn phòng</option>
                                          </select>
                                       </div>
                                       
                                  <?php 
                                  if (isset($_SESSION['phoneyes'])){   
                                       
                                  ?>
                                       
                                       <div class="form-group"><label for="phoneInput">Điện thoại:</label><input type="tel" class="form-control " id="phone" name="phone" value="" placeholder="Nhập lại SĐT  <?=$_SESSION['phone']?>"></div>
                                 <?php } ?>      
                                       
                                  <?php 
                                  if (isset($_SESSION['emailyes'])){   
                                       
                                  ?>     
                                       
                                       <div class="form-group"><label for="emailInput">Email:</label><input type="email" class="form-control " id="email" name="email" placeholder="Nhập lại Email <?=$_SESSION['emaillxt']?>"></div>
                                       
                                   <?php } ?>          
                                       
                                    <?php 
                                  if (isset($_SESSION['emaivaphoneyes'])){   
                                       
                                  ?>     
                                       
                                          
                                       <div class="form-group"><label for="phoneInput">Điện thoại:</label><input type="tel" class="form-control " id="phone" name="phone" value="" placeholder="Nhập lại SĐT  <?=$_SESSION['phone']?>"></div>
                               
                                       
                                       <div class="form-group"><label for="emailInput">Email:</label><input type="email" class="form-control " id="email" name="email" placeholder="Nhập lại Email <?=$_SESSION['emaillxt']?>"></div>
                                       
                                   <?php } ?>       
                                       
                                       
                                       
                                       
                                       
                                       
                                       <div class="form-group full-width"><label for="commitInput">Chữ ký:</label><textarea class="form-control " id="commitInput" name="commitment"></textarea></div>
                                    </div>
                                 </div>
                                 <button type="submit" class="d-none" disabled="">&nbsp;</button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="ScrollbarsCustom-Track ScrollbarsCustom-TrackY" style="position: absolute; overflow: hidden; border-radius: 4px; background: rgba(0, 0, 0, 0.1); user-select: none; width: 10px; height: calc(100% - 20px); top: 10px; right: 0px;">
                     <div class="ScrollbarsCustom-Thumb ScrollbarsCustom-ThumbY" style="cursor: pointer; border-radius: 4px; background: rgba(0, 0, 0, 0.4); width: 100%; height: 258.918px; transform: translateY(0px);"></div>
                  </div>
                  <div class="ScrollbarsCustom-Track ScrollbarsCustom-TrackX" style="position: absolute; overflow: hidden; border-radius: 4px; background: rgba(0, 0, 0, 0.1); user-select: none; height: 10px; width: calc(100% - 20px); bottom: 0px; left: 10px; display: none;">
                     <div class="ScrollbarsCustom-Thumb ScrollbarsCustom-ThumbX" style="cursor: pointer; border-radius: 4px; background: rgba(0, 0, 0, 0.4); height: 100%; width: 0px; display: none;"></div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <div class="form-action">
                  <div class="custom-control custom-checkbox"><input type="checkbox" id="confirmReadRegister" class="custom-control-input"><label class="custom-control-label" for="confirmReadRegister">Tôi đã đọc và đồng ý với những điều kiện trên</label></div>
                  <button type="submit" title="Xác nhận"  id="btnLogin" class="btn-submit btn-blue btn-blue-sm">Xác nhận</button>
               </div>
            </div>
         </div>
         <a href="index.php" class="close" data-dismiss="modal" aria-label="Close" title="Đóng">×</a>
      </div>
   </div>
</div>

<?php 
if (isset($_SESSION['phoneyes'])){   
?>
<script>
       $("#btnLogin").on("click", function() {
    $('#btnLogin').html('Đang tải...').prop('disabled',
        true);
    $.ajax({
        url: "Ajax/AjaxCheckPhone.php",
        method: "GET",
        dataType: "JSON",
        data: {
            phone: $("#phone").val(),
            email: $("#email").val(),
            phrase: $("#phrase").val()
        },
        success: function(respone) {
            if (respone.error == 'validata') {
                 Swal.fire(
                    'Thông báo',
                    'Vui lòng nhập lại số điện thoại',
                    'error'
                );
            
            } 
            else if (respone.error == 'ErrorPhone') {
                 Swal.fire(
                    'Thông báo',
                    'Số điện thoại bạn nhập không khớp với tài khoản mà bạn đã Đăng Nhập ',
                    'error'
                );
            
            } 
                
          else if (respone.success == 'OKLOGIN') {
                   window.location.href="?DangKyThanhCong";
            }       
                
            else {
                window.location.href="?DangKyThanhCong";
            }
             
             
            
           
            $('#btnLogin').html('Xác nhận').prop('disabled', false);
        },
        error: function() {
            cuteToast({
                type: "error",
                message: 'Không thể xác nhận',
                timer: 5000
            });
            $('#btnLogin').html('Xác nhận').prop('disabled', false);
        }

    });
});
      
</script>
<?php
}
?>








<!--// Check mail -->
<?php 
if (isset($_SESSION['emailyes'])){   
?>
<script>
       $("#btnLogin").on("click", function() {
    $('#btnLogin').html('Đang tải...').prop('disabled',
        true);
    $.ajax({
        url: "Ajax/AjaxCheckEmail.php",
        method: "GET",
        dataType: "JSON",
        data: {
            email: $("#email").val(),
            phrase: $("#phrase").val()
        },
        success: function(respone) {
            if (respone.error == 'validata') {
                 Swal.fire(
                    'Thông báo',
                    'Vui lòng nhập lại Email',
                    'error'
                );
            
            } 
            else if (respone.error == 'ErrorEmail') {
                 Swal.fire(
                    'Thông báo',
                    'Email bạn nhập không khớp với tài khoản mà bạn đã Đăng Nhập ',
                    'error'
                );
            
            } 
                
           else if (respone.success == 'OKLOGIN') {
                   window.location.href="?DangKyThanhCong";
            }       
                
            else {
                window.location.href="?DangKyThanhCong";
            }
             
            
           
            $('#btnLogin').html('Xác nhận').prop('disabled', false);
        },
        error: function() {
            cuteToast({
                type: "error",
                message: 'Không thể xác nhận',
                timer: 5000
            });
            $('#btnLogin').html('Xác nhận').prop('disabled', false);
        }

    });
});
      
</script>
<?php
}
?>


<!--CHECK MAIL + PHONE -->




<?php 
if (isset($_SESSION['emaivaphoneyes'])){   
?>
<script>
       $("#btnLogin").on("click", function() {
    $('#btnLogin').html('Đang tải...').prop('disabled',
        true);
    $.ajax({
        url: "Ajax/AjaxCheckPhone_Email.php",
        method: "GET",
        dataType: "JSON",
        data: {
            phone: $("#phone").val(),
            email: $("#email").val(),
            phrase: $("#phrase").val()
        },
        success: function(respone) {
            if (respone.error == 'validata') {
                 Swal.fire(
                    'Thông báo',
                    'Vui lòng nhập lại SĐT và Email',
                    'error'
                );
            
            } 
            
             else if (respone.error == 'ErrorPhone') {
                 Swal.fire(
                    'Thông báo',
                    'SDT bạn nhập không khớp với tài khoản mà bạn đã Đăng Nhập ',
                    'error'
                );
            
            } 
            
            
            else if (respone.error == 'ErrorEmail') {
                 Swal.fire(
                    'Thông báo',
                    'Email bạn nhập không khớp với tài khoản mà bạn đã Đăng Nhập ',
                    'error'
                );
            
            } 
                
           else if (respone.success == 'OKLOGIN') {
                   window.location.href="?DangKyThanhCong";
            }       
                
            else {
                window.location.href="?DangKyThanhCong";
            }
             
            
           
            $('#btnLogin').html('Xác nhận').prop('disabled', false);
        },
        error: function() {
            cuteToast({
                type: "error",
                message: 'Không thể xác nhận',
                timer: 5000
            });
            $('#btnLogin').html('Xác nhận').prop('disabled', false);
        }

    });
});
      
</script>
<?php
}
?>









<?php 
if (isset($_SESSION['noxm'])){   
?>
<script>
       $("#btnLogin").on("click", function() {
    $('#btnLogin').html('Đang tải...').prop('disabled',
        true);
    $.ajax({
        url: "Ajax/NoPhoneLXT.php",
        method: "GET",
        dataType: "JSON",
        data: {
            hoten: $("#hoten").val(),
            phrase: $("#phrase").val()
        },
        success: function(respone) {
            if (respone.error == 'validata') {
                 Swal.fire(
                    'Thông báo',
                    'Vui lòng nhập đầy đủ các trường !',
                    'error'
                );
            
            } 
           else if (respone.success == 'OKLOGIN') {
                   window.location.href="?DangKyThanhCong";
            }       
                
            else {
                window.location.href="?DangKyThanhCong";
            }
             
            
           
            $('#btnLogin').html('Xác nhận').prop('disabled', false);
        },
        error: function() {
            cuteToast({
                type: "error",
                message: 'Không thể xác nhận',
                timer: 5000
            });
            $('#btnLogin').html('Xác nhận').prop('disabled', false);
        }

    });
});
      
</script>
<?php
}
?>
