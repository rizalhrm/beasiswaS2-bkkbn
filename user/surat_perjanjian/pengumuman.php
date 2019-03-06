<?php
$queryprj= "SELECT * FROM surat_perjanjian WHERE nip = '$_SESSION[nip]'";
$sqlprj = mysqli_query($koneksi,$queryprj);
$lolosprj=mysqli_fetch_array($sqlprj);
$queryielts2 = "SELECT * FROM ielts WHERE nip = '$_SESSION[nip]'";
$sqlielts2 = mysqli_query($koneksi,$queryielts2);
$lolosielts2=mysqli_fetch_array($sqlielts2);
if ($lolosprj['status_pendaftaran_ln']=='Sudah didaftarkan' && $databatas2['surat_perjanjian']=='1') {
?>
 <div class="alert alert-info">
   <b>PENGUMUMAN !</b>
   <br>
   Selamat Anda sudah didaftarkan ke
   <?php
   $shine2="SELECT * FROM jurusan WHERE idj='$lolosielts2[ket4]'";
   $query_shine2=mysqli_query($koneksi,$shine2);
   $data_shine2=mysqli_fetch_array($query_shine2);
   $steady2="SELECT * FROM universitas WHERE id_univ='$data_shine2[id_univ]'";
   $query_steady2=mysqli_query($koneksi,$steady2);
   $data_steady2=mysqli_fetch_array($query_steady2);
       echo "$data_steady2[univ] , Jurusan $data_shine2[jurusan]"; ?>
   <ul>
     <li>Tahap Surat Perjanjian sudah dibuka. Segeralah upload dokumen tersebut sebelum tahap ini ditutup.</li>
     <li>Klik <a href="surat_perjanjian.php" style="color:green;">disini</a> untuk mengunggah surat perjanjian.</li>
   </ul>
 </div>
<?php }
elseif ($lolosprj['status_pendaftaran_ln']=='Belum didaftarkan' && $databatas2['surat_perjanjian']=='1') {
?>
<div class="alert alert-error">
  <b>PENGUMUMAN !</b>
  <br>
  Maaf, Anda belum didaftarkan ke
  <?php
  $shine2="SELECT * FROM jurusan WHERE idj='$lolosielts2[ket4]'";
  $query_shine2=mysqli_query($koneksi,$shine2);
  $data_shine2=mysqli_fetch_array($query_shine2);
  $steady2="SELECT * FROM universitas WHERE id_univ='$data_shine2[id_univ]'";
  $query_steady2=mysqli_query($koneksi,$steady2);
  $data_steady2=mysqli_fetch_array($query_steady2);
      echo "$data_steady2[univ] , Jurusan $data_shine2[jurusan]"; ?>
</div>
<?php }
if ($lolosprj['status']=='Lolos' && $databatas2['surat_perjanjian']=='1') {
?>
<div class="alert alert-info">
  <b>PENGUMUMAN !</b>
  <br>
  Selamat, Anda sudah diterima di
  <?php
  $shine2="SELECT * FROM jurusan WHERE idj='$lolosielts2[ket4]'";
  $query_shine2=mysqli_query($koneksi,$shine2);
  $data_shine2=mysqli_fetch_array($query_shine2);
  $steady2="SELECT * FROM universitas WHERE id_univ='$data_shine2[id_univ]'";
  $query_steady2=mysqli_query($koneksi,$steady2);
  $data_steady2=mysqli_fetch_array($query_steady2);
      echo "$data_steady2[univ] , Jurusan $data_shine2[jurusan]"; ?>
</div>
<?php }
elseif ($lolosprj['status']=='Tidak Lolos') {
?>
<div class="alert alert-error">
  <b>PENGUMUMAN !</b>
  <br>
  Mohon Maaf, Anda tidak berhak untuk menerima beasiswa S2 luar negeri.<br>
  Untuk informasi detailnya, silahkan hubungi kami pada menu kontak.
</div>
<?php } ?>
