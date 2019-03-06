<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
	<li class="active">Info Akun</li>
</ul>
<?php
if (isset($_POST['ubah'])) {
$nama=$_POST['nama'];
$nip=$_POST['nip'];
$update = "UPDATE user SET nama='$nama' where nip='$nip'";
$queryupdate = mysqli_query($koneksi, $update);

if ($queryupdate) {
  echo "<script>alert('Data Berhasil Diubah'); location.href='beranda.php';</script>";
}
else {
  echo "<script>alert('Data Gagal Diubah'); location.href='ubah_akun.php';</script>";
}
};

$queryia = "SELECT * FROM user WHERE nip = '$_SESSION[nip]'";
$sqlia = mysqli_query($koneksi,$queryia);
$dataia = mysqli_fetch_array($sqlia);

 ?>
<div class="span12 wellwhite" style="margin-left: 0px">
<legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Info Akun</legend>
<div class="row-fluid">
<form action="" method="post">
  <table cellpadding=5>
    <tr>
      <td width="100px">NIP</td>
      <td width="10px">:</td>
      <td width="300px"><input type="text" name="nip" value="<?php echo $dataia['nip']; ?>" readonly></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td><input type="text" name="nama" value="<?php echo $dataia['nama']; ?>" class="input-xlarge" required></td>
    </tr>
    <tr>
      <td align=center colspan="3"><input type="submit" class="btn btn-default btn-primary" name="ubah" value="Ubah">
        <a class="btn btn-default" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
          Kembali</a>
      </td>
    </tr>
  </table>
</form>
</div>
</div>
 <?php } ?>
