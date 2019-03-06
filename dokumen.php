<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
	<li class="active">Dokumen Pendaftaran</li>
</ul>
<?php
$queryttg = "SELECT * FROM informasi WHERE id = '4'";
$sqlttg = mysqli_query($koneksi,$queryttg);
$datattg = mysqli_fetch_array($sqlttg);
 ?>
<div class="span12 wellwhite" style="margin-left: 0px">
<legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold"><?php echo "$datattg[1]"; ?></legend>
<div class="row-fluid">
<?php echo "$datattg[2]"; ?>
</div>
</div>
