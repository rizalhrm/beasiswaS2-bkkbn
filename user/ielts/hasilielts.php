<?php
$queryielts = "SELECT * FROM ielts WHERE nip = '$_SESSION[nip]'";
$sqlielts = mysqli_query($koneksi,$queryielts);
$lolosielts=mysqli_fetch_array($sqlielts);
if ($lolosielts['status_cpb']=='Lolos') {
?>
 <div class="alert alert-info">
  Klik <a href="ielts/lihat.php?namafile=<?php echo $lolosielts['test_report'];?>" target='_blank' style="color:green;">disini</a> untuk melihat hasil Ujian IELTS.
 </div>
<?php }
elseif ($lolosielts['status_cpb']=='Tidak Lolos') {
?>
<div class="alert alert-info">
  Klik <a href="ielts/lihat.php?namafile=<?php echo $lolosielts['test_report'];?>" target='_blank' style="color:green;">disini</a> untuk melihat hasil Ujian IELTS.
</div>
<?php }
?>
