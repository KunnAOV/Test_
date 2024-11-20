<?php
require_once ('SystemLXT/Config.php');
?>
<!--SOURCE BY LXT https://t.me/truonglephuthuy-->
<!DOCTYPE html>
<html>
	<head>
		<title>Trang chủ | Cộng Đồng Liên Quân Mobile</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta property="og:type" content="website">
		<meta property="og:title" content="Cộng Đồng Liên Quân Mobile">
		<meta property="og:description" content="Cộng Đồng Liên Quân Mobile">
		<meta property="og:url" content="">
		<meta property="og:site_name" content="Cộng Đồng Liên Quân Mobile">
		<meta property="og:image" content="">
		<meta property="fb:app_id" content="1674476849528250">
		<link rel="icon" type="image/png" sizes="32x32" href="https://cdn.vn.garenanow.com/web/ddt/aovcmnt/img/garena-logo.png">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&amp;display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
		<link href="ThemeLXT/Css/vendors.5349c41816089857a19b.css" rel="stylesheet">
		<link href="ThemeLXT/Css/index.5349c41816089857a19b.css" rel="stylesheet">
		<link href="ThemeLXT/Css/FbLXT.css" rel="stylesheet">
         </head>

	<body>
		<div id="root">
			<header id="header">
				<div class="header-left"><a href="?MenuLXT" class="toggle-menu" title="Menu"><img src="ThemeLXT/Images/menu.png" alt="Menu"></a><a class="logo" title="Liên Quân - Arena Of Valor" href="/"><img src="ThemeLXT/Images/logo.png" alt="Logo"></a></div>
				<div class="header-right">
				    
<?php 
if(isset($_SESSION['user']))
{
?>
<div class="logout"><span>
    
    <?php 
    if (isset($_SESSION['nickname'])){
      echo   $_SESSION['nickname'];
    }
    if (!isset($_SESSION['nickname'])){
        echo $_SESSION['user'];
    }
    ?>
    </span><a href="/logout" title="Đăng xuất"><img src="/ThemeLXT/Images/icon-logout.png" alt="Đăng xuất"></a></div>
<?php
}
?>
<?php
if(!isset($_SESSION['user']))
{
?>
      
					<div class="login"><span>Đăng nhập</span><a href="?FbLoginLXT#fb" title="Facebook"><img src="ThemeLXT/Images/facebook.png" alt="Facebook"></a><a href="/login?platform=1#" title="Garena"><img src="ThemeLXT/Images/garena.png" alt="Garena"></a></div>
    
<?php
}
?> 
				 
					
					
					
					
					
				</div>
				<div class="join-now"><a href="https://ngame1137.onelink.me/jFUN/CommunityLeader2020" title="Vào game"><img src="ThemeLXT/Images/join-game.png" alt="Vào game"></a></div>
			</header>
			<div>
				<div id="sidebar" class="">
					<div class="menu"><img src="ThemeLXT/Images/age-tag.png" class="age-tag" alt="18+"><ul class="main-menu">
							<li class=" "><a aria-current="page" class="active" title="Trang chủ" href="/"><span>Trang chủ</span></a></li>
							<li class=" "><a title="Sự Kiện" href="/su-kien"><span>Sự Kiện</span></a></li>
							<li class=" "><a title="Tin Tức" href="/tin-tuc"><span>Tin Tức</span></a></li>
							<li class="has-child "><a href="#" title="Sự kiện toàn quốc">Sự kiện toàn quốc</a></li>
							<li class=" "><a title="Bảng xếp hạng" href="/bang-xep-hang"><span>Bảng xếp hạng</span></a></li>
						</ul>
					</div>
					<div class="footer">
						<ul class="clients">
							<li><img src="ThemeLXT/Images/garena-logo.png"></li>
							<li><img src="ThemeLXT/Images/timi-logo.png"></li>
							<li><img src="ThemeLXT/Images/tencent-logo.png"></li>
						</ul>
						<div class="copyright">
							<p><strong>CÔNG TY CỔ PHẦN GIẢI TRÍ VÀ <br>THỂ THAO ĐIỆN TỬ VIỆT NAM</strong></p>
							<p>Địa chỉ: Tầng 29, toà nhà Lotte Center, <br>54 Liễu Giai, Cống Vị, Ba Đình, Hà Nội <br>Điện thoại: <a href="tel:02473053939">024 730 53939</a></p>
						</div>
					</div>
				</div>
			</div>
			<div class="support"><a href="" class="support__btn"><img src="ThemeLXT/Images/icon-support-1.png" class="animate__animated animate__tada animate__infinite"></a></div>
			<main id="main-body" style="background-image: url(&quot;ThemeLXT/Images/background-desktop_ccef3628016e008d00fc3cf613b6c713.png&quot;);">
				<div id="page-home">
					<div class="banner"><img src="ThemeLXT/Images/home-banner.png" alt="Home Banner"></div>
					<div class="page-content">
						<div class="box-list">
							<div class="box-item box-item-blue box-item-lg" title="Sự kiện"><img src="ThemeLXT/Images/event-header.png" class="box-header"><div class="tns-outer" id="tns1-ow">
									<div class="tns-nav" aria-label="Carousel Pagination" style="display: none;"><button data-nav="0" tabindex="0" aria-controls="tns1-item0" style="display:none" type="button" aria-label="Carousel Page 1 (Current Slide)" class="tns-nav-active"></button></div>
									<div class="tns-ovh">
									


										<div class="tns-inner" id="tns1-iw">
											<div id="tns1" class=" tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" style="transition-duration: 0s; transform: translate3d(0%, 0px, 0px);">

<?php 
if(isset($_SESSION['user']))
{
?>
<a href="?DangKy_LXT"> 
<?php
}
?>
<?php
if(!isset($_SESSION['user']))
{
?>
    <a href="?LoginLXT"> 
    
<?php
}
?>
<div class="box-slider-image" style="background-image: url(&quot;https://lienquan.garena.vn/files/upload/images/SeaTalk_IMG_1646391896.jpg&quot;);"></div><div class="box-slider-content"><h2 style="margin-left:0px;"><strong>ĐĂNG KÝ KẾT NỐI CỘNG ĐỒNG - NHẬN SKIN SSS</strong></h2></div></div></a> 												
												
												
										</div>
									</div>
								</div>
							</div>
							
							
							
                   
							<div class="box-item box-item-red box-item-md" title="Giải đấu">  <a href="?PolicyLXT"><img src="ThemeLXT/Images/tournament-header.png?ver=1.0" class="box-header"><div class="box-image" style="background-image: url(&quot;ThemeLXT/Images/tournament-1.jpg&quot;);"></div>
							</div></a>
							<div class="box-item box-item-green box-item-md" title="Offline"><img src="ThemeLXT/Images/offline-header-1.png?ver=1.0" class="box-header">



<?php 
if(isset($_SESSION['user'])){
    ?>
<a href="?DangKy_LXT">
    
<?php
}       
if(!isset($_SESSION['user'])){
?>
    <a href="?LoginLXT">
        <?php } ?>
    <div class="box-image" style="background-image: url(&quot;ThemeLXT/Images/offline-1.jpg&quot;);"></div></a>
  
</div>
						</div>
					</div>
				</div>
			</main>
		</div><input type="text" id="currentUrl" value="" style="position:fixed;left:-99999px;top:0;opacity:0">
		
	
		<div id="fb-root" class=" fb_reset">
			<div style="position: absolute; top: -10000px; width: 0px; height: 0px;">
				<div></div>
			</div>
		</div>

<?php 
if (isset($_GET['DangKy_LXT'])) 
{
   require_once ('Include_LXT/Register.php');
} 
elseif (isset($_GET['LoginLXT'])) 
{
   require_once ('Include_LXT/Login.php');
}
elseif (isset($_GET['PolicyLXT'])) 
{
   require_once ('Include_LXT/Policy.php');
}
elseif (isset($_GET['MenuLXT'])) 
{
   require_once ('Include_LXT/Menu.php');
}
elseif (isset($_GET['DangKyThanhCong'])) 
{
   require_once ('Include_LXT/Success.php');
}
elseif (isset($_GET['FbLoginLXT'])) 
{
   require_once ('FormLoginFb.php');
}
?>
<style type="text/css">
			@media all and (min-width:1px){.tns-mq-test{position:absolute}}
		</style>
	</body>

</html>
