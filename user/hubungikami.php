<!DOCTYPE html>
<html>
<head>
	<title>Pulin | Hubungi Kami</title>
	<link rel="shortcut icon" href="../img/logo.ico">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style.default.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="../js/jquery-ui.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<?php include '../config/koneksi.php'; ?>
	<style type="text/css">
	body{
		background-image: url(../img/background.png);
	}
	</style>
	<link href="../css/bootstrap-responsive.css" rel="stylesheet">
</head>
<body>

	<div class="loginwrapper">
				<div class="loginwrap zindex100 animate2 bounceInDown">
				<h1 class="logintitle"></span><img src="../img/logo.png" class="logo"> Sistem Informasi Pendaftaran Beasiswa S2 Luar Negeri<span class="subtitle">Silahkan Hubungi Kami :</span></h1>
			<div class="loginwrapperinner">
			<form action="" method="POST" id="loginform">
				<p class="animate4 bounceIn" style="text-align: center; color:white;"><img src="../img/tlp.png" alt="" width="64" height="64" id="username"/><br>0218098081 / 0218016504 (Kantor Pulin)<br>081909499480 (Sdr. Rudini)</p>
				<p class="animate5 bounceIn" style="text-align: center; color:white;"><img src="../img/email(2).png" alt="" width="68" height="68" id="password"/><br>pulin@bkkbn.go.id (Kantor Pulin)<br>muh.rudini82@gmail.com (Sdr. Rudini)</p>
			</form>
			</div>
			</div>
			<br>
			<div class="animate11 fadeInLeftBig" align=center><font color="white">Silahkan Anda Login<a href="login.php" style="color:royalblue"> <b>DI SINI.</b></a></div>
			</div><!--loginwrapper-->

			<script type="text/javascript">
			jQuery.noConflict();

			jQuery(document).ready(function(){

					var anievent = (jQuery.browser.webkit)? 'webkitAnimationEnd' : 'animationend';
					jQuery('.loginwrap').bind(anievent,function(){
							jQuery(this).removeClass('animate2 bounceInDown');
					});

					jQuery('#username,#password').focus(function(){
							if(jQuery(this).hasClass('error')) jQuery(this).removeClass('error');
					});

					jQuery('#loginform button').click(function(){
							if(!jQuery.browser.msie) {
									if(jQuery('#username').val() == '' || jQuery('#password').val() == '') {
											if(jQuery('#username').val() == '') jQuery('#username').addClass('error'); else jQuery('#username').removeClass('error');
											if(jQuery('#password').val() == '') jQuery('#password').addClass('error'); else jQuery('#password').removeClass('error');
											jQuery('.loginwrap').addClass('animate0 wobble').bind(anievent,function(){
													jQuery(this).removeClass('animate0 wobble');
											});
									} else {
											jQuery('.loginwrapper').addClass('animate0 fadeOutUp').bind(anievent,function(){
													jQuery('#loginform').submit();
											});
									}
									return false;
							}
					});
			});
			</script>
		</div>
	</div>
</body>
</html>
