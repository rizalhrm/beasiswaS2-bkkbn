<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
	<li class="active">Ganti Password</li>
</ul>
<?php

	if (isset($_POST['ganti'])){
	$password_lama = md5($_POST['password_lama']);
	$password_baru = md5($_POST['password_baru']);
	$conf_password_baru = md5($_POST['conf_password_baru']);

	// dapatkan password lama
	$sqlchg = "SELECT password FROM user WHERE nip='$_SESSION[nip]'";
	$querychg = mysqli_query($koneksi,$sqlchg);
	$datachg = mysqli_fetch_array($querychg);
  $pw_db= $datachg['password'];
	// jika password lama salah
	if ($password_lama == $pw_db){
    // jika ulangi password baru tidak sama dengan password baru
    if ($password_baru != $conf_password_baru){
      echo "<script>alert('Konfirmasi Password barunya tidak cocok!'); location.href='ganti_password.php';</script>";
    }
    else {
      $updatechg = "UPDATE user SET password = '$password_baru' WHERE nip='$_SESSION[nip]'";
      $simpanupdatechg = mysqli_query($koneksi,$updatechg);

      // arahkan ke halaman ubah password
      if ($simpanupdatechg) {
        echo "<script>alert('Password Berhasil diganti.'); location.href='beranda.php';</script>";
      }
    }
	}

	else{
    // arahkan ke halaman ubah password
    echo "<script>alert('Password Lama yang Anda Masukkan Salah !'); location.href='ganti_password.php';</script>";
	}
}

 ?>
<div class="span12 wellwhite" style="margin-left: 0px">
<legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Ganti Password</legend>
<div class="row-fluid">
<form action="" method="post">
  <table cellpadding=5>
    <tr>
      <td width="200px">Password Lama</td>
      <td width="10px">:</td>
      <td width="300px"><input type="password" name="password_lama" class="input-large" required></td>
    </tr>
    <tr>
      <td>Password Baru</td>
      <td>:</td>
      <td><input type="password" name="password_baru" class="input-large" required></td>
    </tr>
    <tr>
      <td>Konfirmasi Password Baru</td>
      <td>:</td>
      <td><input type="password" name="conf_password_baru" class="input-large" required>
      </td>
    </tr>
    <tr>
      <td align=center colspan="3"><input type="submit" class="btn btn-default btn-primary" name="ganti" value="Ganti Password">
        <a class="btn btn-default" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
          Kembali</a>
      </td>
    </tr>
  </table>
</form>
</div>
</div>
 <?php } ?>
