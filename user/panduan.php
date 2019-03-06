<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
	<li class="active">Panduan Pendaftaran</li>
</ul>
<?php
$queryttg = "SELECT * FROM informasi WHERE id = '6'";
$sqlttg = mysqli_query($koneksi,$queryttg);
$datattg = mysqli_fetch_array($sqlttg);
 ?>
<div class="span12 wellwhite" style="margin-left: 0px">
<legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold"><?php echo "$datattg[1]"; ?></legend>
<div class="row-fluid">
<?php echo "$datattg[2]"; ?>
</div>
</div>
 <?php } ?>
