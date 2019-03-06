<?php include "../../config/koneksi.php";

$id = $_POST['nip'];
$pilihan_1 = $_POST['univ_1'];
$pilihan_2 = $_POST['univ_2'];
$pilihan_3 = $_POST['univ_3'];
$programstudi_1 = $_POST['programstudi_1'];
$programstudi_2 = $_POST['programstudi_2'];
$programstudi_3 = $_POST['programstudi_3'];

$queryuniv="UPDATE formulir SET univ_1='$pilihan_1', univ_2='$pilihan_2', univ_3='$pilihan_3', programstudi_1='$programstudi_1' ,
programstudi_2='$programstudi_2' , programstudi_3='$programstudi_3' where nip ='$id'";
$simpanuniv=mysqli_query($koneksi,$queryuniv);

if ($simpanuniv) {
  echo "<script>alert('Formulir (data pilihan universitas) Berhasil diUbah'); location.href='../dataformulir.php';</script>";
}

else {
  echo "<script>alert('Formulir (data pilihan universitas) Gagal diUbah'); location.href='../dataformulir.php';</script>";
}

 ?>
