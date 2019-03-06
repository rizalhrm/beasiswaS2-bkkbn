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

$querycalon="UPDATE formulir SET nama='$nama', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', jk='$jk', usia='$usia', agama='$agama', statusnikah='$status_pernikahan', jmlanak='$jumlah_anak',
            alamat_rumah='$alamat_rumah', kota_rumah='$kota', provinsi_rumah='$prov', kodepos_rumah='$kode_pos', tlp='$telepon', email='$email', nama_kel='$nama_kel', alamat_kel='$alamat_kel', tlp_kel='$telepon_kel', hubungan='$hubungan_kel',
           nama_pt='$perguruan_tinggi', fakultas='$fakultas',   program_studi='$program_studi', thn_lulus='$tahun_kelulusan',
           nilai_ipk='$nilai_ipk', judul_thesis='$judul_thesis',  esai='$esai' where nip ='$nip'";
$simpancalon=mysqli_query($koneksi,$querycalon);



if ($simpancalon) {
  echo "<script>alert('Formulir Berhasil diUbah'); location.href='../dataformulir.php';</script>";
}

else {
  echo "<script>alert('Formulir Gagal diUbah'); location.href='../dataformulir.php';</script>";
}

 ?>
