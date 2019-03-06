<?php include "../../config/koneksi.php";

$id = $_POST['nip'];
$alamat_kantor =$_POST['alamat_kantor'];
$jabatan_sekarang = $_POST['jabatan_sekarang'];
$pangkat = $_POST['pangkat'];
$masa_kerja1 = $_POST['masa_kerja1'];
$masa_kerja2 = $_POST['masa_kerja2'];
$provinsi_kantor = $_POST['bkkbn'];
if ($_POST['unitkerja'] !='0' && $_POST['unitkerja2'] =='') {
  $unitkerja=$_POST['unitkerja'];
}
elseif ($_POST['unitkerja'] !='0' && $_POST['unitkerja2'] !='') {
  $unitkerja=$_POST['unitkerja'];
}
elseif ($_POST['unitkerja'] =='0') {
  $unitkerja=$_POST['unitkerja2'];
}

$querykantor="UPDATE formulir SET alamat_kantor='$alamat_kantor', provinsi_kantor='$provinsi_kantor' , unit_organ='$unitkerja',
jabatan_skrg='$jabatan_sekarang', pangkat='$pangkat', masakerja='$masa_kerja1 Tahun $masa_kerja2 Bulan'
             where nip ='$id'";
$simpankantor=mysqli_query($koneksi,$querykantor);



if ($simpankantor) {
  echo "<script>alert('Formulir (data kantor) Berhasil diUbah'); location.href='../dataformulir.php';</script>";
}

else {
  echo "<script>alert('Formulir (data kantor) Gagal diUbah'); location.href='../dataformulir.php';</script>";
}

 ?>
