<?php
$queryielts = "SELECT * FROM ielts WHERE nip = '$_SESSION[nip]'";
$sqlielts = mysqli_query($koneksi,$queryielts);
$lolosielts=mysqli_fetch_array($sqlielts);
if ($lolosielts['status_cpb']=='Lolos' && $databatas2['ielts']=='1') {
?>
 <div class="alert alert-info">
   <b>PENGUMUMAN !</b>
   <br>
   Selamat, Anda dinyatakan lolos Seleksi Ujian IELTS dan akan kuliah di
   <?php
   $shine="SELECT * FROM jurusan WHERE idj='$lolosielts[ket4]'";
   $query_shine=mysqli_query($koneksi,$shine);
   $data_shine=mysqli_fetch_array($query_shine);
   $steady="SELECT * FROM universitas WHERE id_univ='$data_shine[id_univ]'";
   $query_steady=mysqli_query($koneksi,$steady);
   $data_steady=mysqli_fetch_array($query_steady);
       echo "$data_steady[univ] , Jurusan $data_shine[jurusan]"; ?>
   <ul>
     <li>BKKBN akan mendaftarkan Anda ke Universitas tersebut.</li>
     <li>Jika pendaftaran ke universitas tersebut sudah selesai maka Anda diwajibkan membuat surat perjanjian dan ikatan tugas belajar.</li>
     <li>Klik <a href="ielts/lihat.php?namafile=<?php echo $lolosielts['test_report'];?>" target='_blank' style="color:green;">disini</a> untuk melihat hasil Ujian IELTS.</li>
     <li>Klik <a href="lolos_ielts.php" style="color:green;">disini</a> untuk melihat daftar nama para calon penerima beasiswa yang dinyatakan lolos Seleksi Ujian IELTS.</li>
   </ul>
 </div>
<?php }
elseif ($lolosielts['status_cpb']=='Tidak Lolos' && $databatas2['ielts']=='1') {
?>
<div class="alert alert-error">
  <b>PENGUMUMAN !</b>
  <br>
  Maaf, Anda dinyatakan tidak lolos Seleksi Ujian IELTS.
  <ul>
    <li>Klik <a href="ielts/lihat.php?namafile=<?php echo $lolosielts['test_report'];?>" target='_blank' style="color:green;">disini</a> untuk melihat hasil Ujian IELTS.</li>
    <li>Klik <a href="lolos_ielts.php" style="color:green;">disini</a> untuk melihat daftar nama para calon penerima beasiswa yang dinyatakan lolos Seleksi Ujian IELTS.</li>
  </ul>
</div>
<?php }
?>
