<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
	<li class="active">Kontak</li>
</ul>
<?php
$querykt = "SELECT * FROM identitas_web WHERE id = '2'";
$sqlkt = mysqli_query($koneksi,$querykt);
$datakt = mysqli_fetch_array($sqlkt);
 ?>
<div class="span12 wellwhite" style="margin-left: 0px">
<legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold"><?php echo "$datakt[1]"; ?></legend>
<div class="row-fluid">
    <?php echo "$datakt[2]"; ?>
 </div>
</div>
 <?php } ?>
