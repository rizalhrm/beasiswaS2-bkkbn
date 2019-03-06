<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>

<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
  <li class="active">Surat Perjanjian</li>
</ul>
<?php
$querybatas = "SELECT * FROM proses_seleksi WHERE id = '1'";
$sqlbatas = mysqli_query($koneksi,$querybatas);
$databatas = mysqli_fetch_array($sqlbatas);
 ?>
<div class="span12 wellwhite" style="margin-left: 0px">
  <legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Surat Perjanjian</legend>
<div class="row-fluid">
  <?php
  $databerkas = mysqli_fetch_array($sqlksg7);
  $queryprj= "SELECT * FROM surat_perjanjian WHERE nip = '$_SESSION[nip]'";
  $sqlprj = mysqli_query($koneksi,$queryprj);
  $lolosprj=mysqli_fetch_array($sqlprj);
    if ($databatas['surat_perjanjian']=='0') {
  ?>
  <div class="alert alert-error">
  Maaf , Tahap Surat Perjanjian Sudah ditutup.
  </div>
  <?php }
  elseif ($lolosprj['status_pendaftaran_ln']=='Belum didaftarkan' && $databatas['surat_perjanjian']=='1') {
  ?>
 <div class="alert alert-error">
  Maaf, Anda belum didaftarkan ke universitas pilihan anda.
 </div>
 <?php }
    elseif ($lolosprj['status_pendaftaran_ln']=='Sudah didaftarkan' && $databatas['surat_perjanjian']=='1') {
  ?>

    <div class="alert alert-info">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <b>Ketentuan Unggah Dokumen !</b>
      <ul>
        <li>Gunakanlah Format yang sudah disediakan, Anda bisa download di sidebar kiri website ini</li>
        <li>File dokumen yang diunggah harus merupakan hasil scan, bukan hasil foto.</li>
        <li>Ukuran file masing-masing yang diunggah tidak melebihi 1 MB dan berekstensi *.pdf</li>
        <li>Anda bisa unggah ulang semua dokumen asalkan sebelum batas yang telah ditentukan.</li>
        <li>Klik <a href="jadwal_kegiatan.php" style="color:green;">disini</a> untuk melihat jadwal kegiatan.</li>
      </ul>
    </div>
    <?php
      }
    ?>
    <table class="table table-bordered table-hover" cellpadding="6px" style="font-size:13px;">
      <tr>
        <td style="text-align:center;"><b>Surat Perjanjian</b></td>
        <td style="text-align:center;">
          <?php
          $dokumn = $databatas['surat_perjanjian'];
          $prj = $databerkas['perjanjian'];
          if ($lolosprj['status_pendaftaran_ln']=='Sudah didaftarkan' && $dokumn == '1' && $prj == '') { ?>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_prj.php" role="button">Unggah Dokumen ini</a>
          <?php }
          elseif ($lolosprj['status_pendaftaran_ln']=='Sudah didaftarkan' && $dokumn == '1' && $prj != '') { ?>
          <a style="font-size:13px;" class="btn btn-info" href="surat_perjanjian/lihat.php?namafile=<?php echo $prj; ?>" target="_blank" role="button">Lihat</a>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_prj.php" role="button">Unggah Ulang</a>
          <?php }
          elseif ($lolosprj['status_pendaftaran_ln']=='Sudah didaftarkan' && $dokumn == '0' && $prj == '') {
            echo "<img src=\"../img/kali.png\"/> Belum diunggah";
          }
          elseif ($lolosprj['status_pendaftaran_ln']=='Sudah didaftarkan' && $dokumn == '0' && $prj != '') {
            echo "<a style=\"font-size:13px;\" class=\"btn btn-info\" href=\"surat_perjanjian/lihat.php?namafile=$prj\" target=\"_blank\" role=\"button\">Lihat</a>";
          }
          else {
            echo "-";
          }
          ?>
        </td>
      </tr>
      <tr>
        <td style="text-align:center;"><b>Ikatan Tugas Belajar</b></td>
        <td style="text-align:center;">
          <?php
          $dokumn = $databatas['surat_perjanjian'];
          $tubel = $databerkas['ikatan_tubel'];
          if ($lolosprj['status_pendaftaran_ln']=='Sudah didaftarkan' && $dokumn == '1' && $tubel == '') { ?>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_tubel.php" role="button">Unggah Dokumen ini</a>
          <?php }
          elseif ($lolosprj['status_pendaftaran_ln']=='Sudah didaftarkan' && $dokumn == '1' && $tubel != '') { ?>
          <a style="font-size:13px;" class="btn btn-info" href="surat_perjanjian/lihat.php?namafile=<?php echo $tubel; ?>" target="_blank" role="button">Lihat</a>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_tubel.php" role="button">Unggah Ulang</a>
          <?php }
          elseif ($lolosprj['status_pendaftaran_ln']=='Sudah didaftarkan' && $dokumn == '0' && $tubel == '') {
            echo "<img src=\"../img/kali.png\"/> Belum diunggah";
          }
          elseif ($lolosprj['status_pendaftaran_ln']=='Sudah didaftarkan' && $dokumn == '0' && $tubel != '') {
            echo "<a style=\"font-size:13px;\" class=\"btn btn-info\" href=\"surat_perjanjian/lihat.php?namafile=$tubel\" target=\"_blank\" role=\"button\">Lihat</a>";
          }
          else {
            echo "-";
          }
          ?>
        </td>
      </tr>
    </table>
</div>
</div>
<?php } ?>
