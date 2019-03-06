<?php
session_start();
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";}

else {
include "header.php"; } ?>

<div class="span9">
  <?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == 'alumni') {
        include "alumni/alumni.php";
         }
    elseif ($page == 'tentang') {
        include "tentang.php";
         }
    elseif ($page == 'kontak') {
        include "kontak.php";
        }
    elseif ($page == 'ubah_akun') {
        include "akun/ubah_akun.php";
        }
    elseif ($page == 'pernyataan') {
        include "pernyataan/pernyataan.php";
        }
    elseif ($page == 'datapernyataan') {
        include "pernyataan/datapernyataan.php";
        }
    elseif ($page == 'unggah_ulang_pernyataan') {
        include "pernyataan/unggah_ulang_pernyataan.php";
        }
    elseif ($page == 'persetujuan') {
        include "pernyataan/persetujuan.php";
        }
    elseif ($page == 'ganti_password') {
        include "akun/ganti_password.php";
        }
    elseif ($page == 'persyaratan') {
        include "persyaratan.php";
        }
    elseif ($page == 'ketentuan') {
        include "ketentuan.php";
        }
    elseif ($page == 'jadwal_kegiatan') {
        include "jadwal_kegiatan.php";
        }
    elseif ($page == 'dokumen') {
        include "dokumen.php";
        }
    elseif ($page == 'formulir') {
        include "formulir/formulir.php";
        }
    elseif ($page == 'formulir_kosong') {
        include "formulir/kosong.php";
        }
    elseif ($page == 'dataformulir') {
        include "formulir/dataformulir.php";
        }
    elseif ($page == 'detailformulir') {
        include "formulir/detailformulir.php";
        }
    elseif ($page == 'ubahformulir') {
        include "formulir/ubahformulir.php";
        }
    elseif ($page == 'ubahkantor') {
        include "formulir/ubahkantor.php";
        }
    elseif ($page == 'berkasdokumen') {
        include "berkasdokumen.php";
        }
    elseif ($page == 'unggah_drh') {
        include "dokumen/unggah_drh.php";
        }
    elseif ($page == 'unggah_fc_sk') {
        include "dokumen/unggah_fc_sk.php";
        }
    elseif ($page == 'unggah_fc_dp3') {
        include "dokumen/unggah_fc_dp3.php";
        }
    elseif ($page == 'unggah_fc_pakta') {
        include "dokumen/unggah_fc_pakta.php";
        }
    elseif ($page == 'unggah_fc_npwp') {
        include "dokumen/unggah_fc_npwp.php";
        }
    elseif ($page == 'unggah_fc_kk') {
        include "dokumen/unggah_fc_kk.php";
        }
    elseif ($page == 'unggah_fc_ktp') {
        include "dokumen/unggah_fc_ktp.php";
        }
    elseif ($page == 'unggah_fc_ijazah') {
        include "dokumen/unggah_fc_ijazah.php";
        }
    elseif ($page == 'unggah_fc_transkrip') {
        include "dokumen/unggah_fc_transkrip.php";
        }
    elseif ($page == 'unggah_ket_sehat') {
        include "dokumen/unggah_ket_sehat.php";
        }
    elseif ($page == 'unggah_ket_bebas_narkoba') {
        include "dokumen/unggah_ket_bebas_narkoba.php";
        }
    elseif ($page == 'wawancara') {
        include "wawancara/wawancara.php";
        }
    elseif ($page == 'lolos_administrasi') {
        include "linkterkait/lolos_administrasi.php";
        }
    elseif ($page == 'ubahpilihanuniv') {
        include "formulir/ubahpilihanuniv.php";
        }
    elseif ($page == 'daftar_universitas') {
        include "daftar_universitas.php";
        }
    elseif ($page == 'lolos_wawancara') {
        include "linkterkait/lolos_wawancara.php";
        }
    elseif ($page == 'lolos_ielts') {
        include "linkterkait/lolos_ielts.php";
        }
    elseif ($page == 'infokursus') {
        include "infokursus.php";
        }
    elseif ($page == 'ielts') {
        include "ielts/ielts.php";
        }
    elseif ($page == 'surat_perjanjian') {
        include "surat_perjanjian/surat_perjanjian.php";
        }
    elseif ($page == 'unggah_prj') {
        include "surat_perjanjian/unggah_prj.php";
        }
    elseif ($page == 'unggah_tubel') {
        include "surat_perjanjian/unggah_tubel.php";
        }
    elseif ($page == 'penerimabeasiswa') {
        include "linkterkait/penerimabeasiswa.php";
        }
    elseif ($page == 'mengundurkan_diri') {
        include "mengundurkan_diri.php";
        }
    elseif ($page == 'panduan') {
        include "panduan.php";
        }
    else {
        echo "<h2>Halaman Tidak Ditemukan</h2>";
         }
  }
  else {
   ?>
   <ul class="breadcrumb wellwhite">
     <li class="active">Beranda</li>
   </ul>

  <div class="span12 wellwhite" style="margin-left: 0px">
  <legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Selamat Datang <?php echo "$datauser[nama]"; ?> di Ruang Calon Penerima Beasiswa S2 Luar Negeri</legend>
  <div class="row-fluid">
    <div class="alert alert-warning">
      <b>PERHATIAN !</b>
      <ul>
        <li>Klik <a href="#" style="color:red;">disini</a> untuk melihat panduan mendaftar beasiswa ini.</li>
        <li>Klik <a href="jadwal_kegiatan.php" style="color:red;">disini</a> untuk melihat jadwal kegiatan seleksi.</li>
        <?php
        $dataksgway = mysqli_num_rows($sqlksg3);
        if ($dataksgway>=1) { ?>
        <li>Klik <a href="mengundurkan_diri.php" style="color:red;">disini</a> untuk mengundurkan diri dari Seleksi Beasiswa S2 Luar Negeri.</li>
        <?php } ?>
      </ul>
   </div>
   <?php
   $querybatas2 = "SELECT * FROM proses_seleksi WHERE id = '1'";
   $sqlbatas2 = mysqli_query($koneksi,$querybatas2);
   $databatas2 = mysqli_fetch_array($sqlbatas2);

    if ($databatas2['pernyataan']=='1') {
    ?>
    <div class="alert alert-info">
      Tahap Pembuatan Surat Pernyataan sudah dibuka, segeralah upload sebelum tahap ini ditutup.
    </div>
   <?php }
   if ($databatas2['formulir']=='1') {
   ?>
    <div class="alert alert-info">
     Tahap Pengisian Formulir Sudah dibuka , segeralah mengisi dan lengkapi data Anda sebelum tahap ini ditutup.
    </div>
   <?php }
   if ($databatas2['dokumen']=='1') {
   ?>
    <div class="alert alert-info">
     Tahap Pengunggahan Dokumen Sudah dibuka , segeralah upload dan lengkapi dokumen-dokumen persyaratan Anda sebelum tahap ini ditutup.
    </div>
   <?php }
   $queryint = "SELECT * FROM wawancara WHERE nip = '$_SESSION[nip]'";
   $sqlint = mysqli_query($koneksi,$queryint);
   $dataint = mysqli_num_rows($sqlint);
   $ceklolospernyataan = mysqli_fetch_array($sqlksg);
   $ceklolosformulir = mysqli_fetch_array($sqlksg2);
   $ceklolosdokumen = mysqli_fetch_array($sqlksg3);
   if ($ceklolospernyataan['status_cpb']=='Lolos' && $ceklolosformulir['status_cpb']=='Lolos' && $ceklolosdokumen['status_cpb']=='Lolos' && $dataint>=1 && $databatas2['wawancara']=='1') {
  ?>
    <div class="alert alert-info">
      <b>PENGUMUMAN !</b>
      <br>
      Selamat, Anda dinyatakan lolos Seleksi Administrasi dan berhak mengikuti Seleksi Wawancara.
      <ul>
        <li>Klik <a href="wawancara.php" style="color:green;">disini</a> untuk melihat surat panggilan wawancara.</li>
        <li>Klik <a href="lolos_administrasi.php" style="color:green;">disini</a> untuk melihat daftar nama para calon penerima beasiswa yang dinyatakan lolos Seleksi Administrasi.</li>
      </ul>
    </div>
<?php }
    elseif (($ceklolospernyataan['status_cpb']=='Tidak Lolos' || $ceklolosformulir['status_cpb']=='Tidak Lolos' || $ceklolosdokumen['status_cpb']=='Tidak Lolos') && $databatas2['wawancara']=='1') {
?>
    <div class="alert alert-error">
      <b>PENGUMUMAN !</b>
      <br>
      Maaf, Anda dinyatakan tidak lolos Seleksi Administrasi.
      <ul>
        <li>Klik <a href="lolos_administrasi.php" style="color:green;">disini</a> untuk melihat daftar nama para calon penerima beasiswa yang dinyatakan lolos Seleksi Administrasi.</li>
      </ul>
    </div>
<?php }
$queryielts = "SELECT * FROM ielts WHERE nip = '$_SESSION[nip]'";
$sqlielts = mysqli_query($koneksi,$queryielts);
$dataielts = mysqli_num_rows($sqlielts);
$datasqlint = mysqli_fetch_array($sqlint);
if ($datasqlint['status_cpb']=='Lolos' && $dataielts>=1 && $databatas2['ielts']=='1') {
?>
 <div class="alert alert-info">
   <b>PENGUMUMAN !</b>
   <br>
   Selamat, Anda dinyatakan lolos Seleksi Wawancara dan berhak mengikuti Kursus IELTS.
   <ul>
     <li>Klik <a href="infokursus.php" style="color:green;">disini</a> untuk melihat informasi tempat kursus IELTS.</li>
     <li>Klik <a href="ujian_ielts" style="color:green;">disini</a> untuk melihat surat panggilan untuk mengikuti placement test.</li>
     <li>Klik <a href="lolos_wawancara.php" style="color:green;">disini</a> untuk melihat daftar nama para calon penerima beasiswa yang dinyatakan lolos Seleksi Wawancara.</li>
   </ul>
 </div>
<?php }
 elseif ($datasqlint['status_cpb']=='Tidak Lolos' && $databatas2['ielts']=='1') {
?>
 <div class="alert alert-error">
   <b>PENGUMUMAN !</b>
   <br>
   Maaf, Anda dinyatakan tidak lolos Seleksi Wawancara.
   <ul>
     <li>Klik <a href="lolos_wawancara.php" style="color:green;">disini</a> untuk melihat daftar nama para calon penerima beasiswa yang dinyatakan lolos Seleksi Wawancara.</li>
   </ul>
 </div>
<?php }
include "ielts/pengumuman.php";
include "surat_perjanjian/pengumuman.php";
?>

  </div>
  </div>
<?php }
?>

</div><!--/span-->
 </div><!--/row-->

  <?php include "footer.php"; ?>
