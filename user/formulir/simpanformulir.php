<?php include "../../config/koneksi.php";

$nama = $_POST['nama'];
$nip = $_POST['nip'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
       $pecah= explode("-",$tgl_lahir);
       $thnex = $pecah[0];
$yearnow =date("Y");
$usia = $yearnow - $thnex;
$jk = $_POST['jk'];
$agama = $_POST['agama'];
$status_pernikahan = $_POST['status_pernikahan'];
$jumlah_anak = $_POST['jumlah_anak'];
$alamat_rumah = $_POST['alamat_rumah'];
$kota = $_POST['kota'];
$prov = $_POST['provinsi'];
$kode_pos = $_POST['kode_pos'];
$telepon = $_POST['telepon'];
$email = $_POST['email'];

if ($_POST['unitkerja'] !='0' && $_POST['unitkerja2'] =='') {
  $unitkerja=$_POST['unitkerja'];
}
elseif ($_POST['unitkerja'] !='0' && $_POST['unitkerja2'] !='') {
  $unitkerja=$_POST['unitkerja'];
}
elseif ($_POST['unitkerja'] =='0') {
  $unitkerja=$_POST['unitkerja2'];
}
$alamat_kantor =$_POST['alamat_kantor'];
$provinsi_kantor = $_POST['bkkbn'];
$jabatan_sekarang = $_POST['jabatan_sekarang'];
$pangkat = $_POST['pangkat'];
$masa_kerja1 = $_POST['masa_kerja1'];
$masa_kerja2 = $_POST['masa_kerja2'];

$pilihan_1 = $_POST['univ_1'];
$pilihan_2 = $_POST['univ_2'];
$pilihan_3 = $_POST['univ_3'];
$programstudi_1 = $_POST['programstudi_1'];
$programstudi_2 = $_POST['programstudi_2'];
$programstudi_3 = $_POST['programstudi_3'];
$esai = $_POST['esai'];

$perguruan_tinggi = $_POST['perguruan_tinggi'];
$fakultas = $_POST['fakultas'];
$program_studi = $_POST['program_studi'];
$tahun_kelulusan = $_POST['tahun_kelulusan'];
$nilai_ipk = $_POST['nilai_ipk'];
$judul_thesis = $_POST['judul_thesis'];

$nama_kel = $_POST['nama_kel'];
$alamat_kel = $_POST['alamat_kel'];
$telepon_kel = $_POST['telepon_kel'];
$hubungan_kel = $_POST['hubungan_kel'];

$querycalon="INSERT INTO formulir VALUES('$nip','$nama','$jk','$tgl_lahir','$tempat_lahir','$usia','$agama','$status_pernikahan','$jumlah_anak',
            '$alamat_rumah','$kota','$prov','$kode_pos','$telepon','$email','$nama_kel','$alamat_kel','$telepon_kel','$hubungan_kel','$alamat_kantor','$provinsi_kantor',
            '$unitkerja','$jabatan_sekarang','$pangkat','$masa_kerja1 Tahun $masa_kerja2 Bulan','$perguruan_tinggi','$fakultas',
            '$program_studi','$tahun_kelulusan','$nilai_ipk','$judul_thesis','$pilihan_1','$pilihan_2','$pilihan_3','$programstudi_1','$programstudi_2','$programstudi_3','$esai','')";
$simpancalon=mysqli_query($koneksi,$querycalon);

$queryuntukdokumen ="INSERT INTO dokumen VALUES('$nip','','','','','','','','','','','','')";
$simpanuntukdokumen=mysqli_query($koneksi,$queryuntukdokumen);

if ($simpancalon && $simpanuntukdokumen) {
  echo "<script>alert('Formulir Berhasil Di Simpan'); location.href='../beranda.php';</script>";
}

else {
  echo "<script>alert('Formulir Gagal Di Simpan'); location.href='../beranda.php';</script>";
}

 ?>
