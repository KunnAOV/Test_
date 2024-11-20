<?php
$RdPhanQuaLXT = mysqli_fetch_assoc(mysqli_query($Connect, "SELECT * FROM phanqua ORDER BY RAND() LIMIT 1"));
?>
<div class="ReactModalPortal">
   <div class="ReactModal__Overlay ReactModal__Overlay--after-open" style="position: fixed; inset: 0px; background-color: rgba(255, 255, 255, 0.75);">
      <div class="ReactModal__Content ReactModal__Content--after-open modal-select modal-register-info" tabindex="-1" role="dialog">
         <div class="modal-description modal-register-info">
            <div class="modal-header">
               <h2 class="modal-title"><img src="/ThemeLXT/Images/icon-register.png" alt="Đăng ký thông tin">THÔNG BÁO  </h2>
            </div>
            <div class="modal-body">
               <div class="ScrollbarsCustom trackYVisible" style="position: relative; width: 100%; height: 52vh;">
                  <div class="ScrollbarsCustom-Wrapper" style="position: absolute; inset: 0px 10px 0px 0px; overflow: hidden;">
                     <div class="ScrollbarsCustom-Scroller" style="position: absolute; inset: 0px; overflow: hidden scroll; padding-right: 20px; margin-right: -21px;">
                        <div class="ScrollbarsCustom-Content" style="box-sizing: border-box; padding: 0.05px; min-height: 100%; min-width: 100%;">
                           <div class="modal-content">
                              <form class="form-register-info">
                     

                             <p class="not-log" style="color: #fff;font-size: 14px;text-align:center;"> Đăng ký thành công. Bạn nhận được phần quà của Sự Kiện Cộng Đồng: </p>
    
                             
 <style>
        .imgqua {
        border: 10px solid transparent;
        padding: 0px;
        border-image: url(ThemeLXT/Images/border.png) 30 round;    
        }
    </style>  


                            <center>
                            
<p><img src="Upload/<?=$RdPhanQuaLXT['images']?>" width="120px" height="120px" class="imgqua" alt="Phần quà"></p>  
<b><p class="not-log" style="color: #CCCC00;font-size: 16px;text-align:center;"> <?=$RdPhanQuaLXT['content']?> </p>        </b>
<p><br></p>
<p><a href="logout" title="Đăng Xuất" class="btn-submit btn-blue btn-blue-sm">Đằng Xuất</a></p>
</center>
                       
                          
                                     




                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
           
            </div>
            <div class="modal-footer">
               <div class="form-action">
                  <div class="custom-control">Bản quyền thuộc Garena Center</div>
                  
               </div>
            </div>
         </div>
         <a href="index.php" class="close" data-dismiss="modal" aria-label="Close" title="Đóng">×</a>
      </div>
   </div>
</div>