<!DOCTYPE html>
<html>
<head>
	<title>Pulin | Login User</title>
	<link rel="shortcut icon" href="../img/logo.ico">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style.default.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
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
				<?php
				if (isset($_POST['login'])) {
				$nip=$_POST['nip'];
				$querydilema = "SELECT * FROM mengundurkan_diri WHERE nip='$nip'";
		    $sqldilema = mysqli_query($koneksi,$querydilema);
		    $datadilema = mysqli_num_rows($sqldilema);

				$hologram = "SELECT * FROM tubel WHERE nip='$nip'";
		    $sqlhologram = mysqli_query($koneksi,$hologram);
		    $qury = mysqli_num_rows($sqlhologram);

				$password=md5($_POST['password']);
				$cekpendidikansql="SELECT * FROM user WHERE nip='$nip'";
				$query1=mysqli_query($koneksi,$cekpendidikansql);
				$cekpend = mysqli_fetch_array($query1);

				if ($datadilema>=1) {
					echo "<script>alert('Anda Sudah Mengundurkan Diri, cobalah ikut seleksi tahun berikutnya !'); location.href='login.php';</script>";
				}

				elseif ($qury>=1) {
					echo "<script>alert('Maaf, Akses Anda ditolak karena Anda masih dalam Tugas Belajar'); location.href='login.php';</script>";
				}

				elseif ($cekpend['pend_terakhir']=='S1') {
					$sql="SELECT * FROM user WHERE nip='$nip' AND password='$password'";
					$query=mysqli_query($koneksi,$sql);
					$cari=mysqli_num_rows($query);
					if ($cari>0)
					{ session_start();
						$_SESSION['nip']=$nip;
						$_SESSION['password']=$password;
						header('location:index.php');
					}
					else {
					echo "<script>alert('Mohon periksa kembali NIP & Password Anda'); location.href='login.php';</script>";
					}
				}

				elseif ($cekpend['pend_terakhir']!='S1') {
					echo "<script>alert('Perlu diingat bahwa Pendidikan Terakhir Anda harus S1 jika ingin mengikuti seleksi beasiswa ini'); location.href='login.php';</script>";
				}
				}
				?>
				<div class="loginwrap zindex100 animate2 bounceInDown">
				<h1 class="logintitle"></span><img src="../img/logo.png" class="logo"> Sistem Informasi Pendaftaran Beasiswa S2 Luar Negeri<span class="subtitle">Silahkan Anda Login.</span></h1>
			<div class="loginwrapperinner">
			<form action="" method="POST" id="loginform">
				<p class="animate4 bounceIn"><input type="text" id="username" required placeholder="NIP (19700101 199001 1 001)" name="nip"/></p>
				<p class="animate5 bounceIn"><input type="password" id="password" required placeholder="Password (Default YYYY-MM-DD)" name="password" /></p>
				<p class="animate6 bounceIn"><button type="submit" class="btn btn-primary btn-block" name="login">LOGIN</button></p>
			</form>
			</div>
			</div>
			<br>
			<div class="animate11 fadeInLeftBig" align=center><font color="white">Tidak Bisa Login ?<a href="hubungikami.php" style="color:royalblue"> <b>Hubungi Kami.</b></a></div>
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
