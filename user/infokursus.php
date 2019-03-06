<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
	<li class="active">Info Kursus IELTS</li>
</ul>
<?php
$querykursus = "SELECT * FROM informasi WHERE id = '5'";
$sqlkursus = mysqli_query($koneksi,$querykursus);
$datakursus = mysqli_fetch_array($sqlkursus);
 ?>
<div class="span12 wellwhite" style="margin-left: 0px">
<legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Informasi Kursus IELTS</legend>
<div class="row-fluid">
<?php echo "$datakursus[2]"; ?>
<p>Pada tahap ini sebelum kursus anda diharuskan untuk mengikuti placement test ditempat tersebut dan hasil placement test akan langsung keluar setelah 30 menit anda menyelesaikan test tersebut dan mengenai jadwal kursus dan ujian IELTS akan diberitahu oleh pihak <?php echo "$datakursus[1]"; ?>.</p>
</div>
</div>
 <?php } ?>
