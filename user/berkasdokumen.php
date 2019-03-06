<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>

<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
  <li class="active">Pengunggahan Dokumen</li>
</ul>
<?php
$querybatas = "SELECT * FROM proses_seleksi WHERE id = '1'";
$sqlbatas = mysqli_query($koneksi,$querybatas);
$databatas = mysqli_fetch_array($sqlbatas);
 ?>
<div class="span12 wellwhite" style="margin-left: 0px">
  <legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Pengunggahan Dokumen</legend>
<div class="row-fluid">
  <?php
  $databerkas = mysqli_fetch_array($sqlksg3);
    if ($databatas['dokumen']=='0') {
  ?>
  <div class="alert alert-error">
  Maaf , Tahap Pengunggahan Dokumen Sudah ditutup.
  </div>
  <?php }
  elseif ($dataksg2<1) {
    echo "<div class=\"alert alert-error\">
    Anda harus mengisi formulir terlebih dahulu
    </div>";
  }
    else {
  ?>

    <div class="alert alert-info">
      <b>Ketentuan Unggah Dokumen !</b>
      <ul>
        <li>File dokumen yang diunggah harus merupakan hasil scan, bukan hasil foto.</li>
        <li>Ukuran file masing-masing yang diunggah tidak melebihi 1.5 MB dan berekstensi *.pdf</li>
        <li>Anda bisa unggah ulang semua dokumen asalkan sebelum batas yang telah ditentukan.</li>
        <li>Klik <a href="jadwal_kegiatan.php" style="color:green;">disini</a> untuk melihat jadwal kegiatan.</li>
      </ul>
    </div>
    <?php
      }
    ?>
    <table class="table table-bordered table-hover" cellpadding="6px" style="font-size:13px;">
      <tr>
        <td style="text-align:center;"><b>Daftar Riwayat Hidup</b></td>
        <td style="text-align:center;">
          <?php
          $dokumn = $databatas['dokumen'];
          $drh = $databerkas['drh'];
          if ($dokumn == '1' && $drh == '' && $dataksg2>=1) { ?>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_drh.php" role="button">Unggah Dokumen ini</a>
          <?php }
          elseif ($dokumn == '1' && $drh != '') { ?>
          <a style="font-size:13px;" class="btn btn-info" href="dokumen/lihat.php?namafile=<?php echo $drh; ?>" target="_blank" role="button">Lihat</a>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_drh.php" role="button">Unggah Ulang</a>
          <?php }
          elseif ($dokumn == '0' && $drh == '') {
            echo "<img src=\"../img/kali.png\"/> Belum diunggah";
          }
          elseif ($dokumn == '0' && $drh != '') {
            echo "<a style=\"font-size:13px;\" class=\"btn btn-info\" href=\"dokumen/lihat.php?namafile=$drh\" target=\"_blank\" role=\"button\">Lihat</a>";
          }
          else {
            echo "-";
          }
          ?>
        </td>
      </tr>
      <tr>
        <td style="text-align:center;"><b>Scan SK pengangkatan pada pangkat terakhir</b></td>
        <td style="text-align:center;">
          <?php
          $dokumn = $databatas['dokumen'];
          $fc_sk = $databerkas['fc_sk'];
          if ($dokumn == '1' && $fc_sk == '' && $dataksg2>=1) { ?>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_fc_sk.php" role="button">Unggah Dokumen ini</a>
          <?php }
          elseif ($dokumn == '1' && $fc_sk != '') { ?>
          <a style="font-size:13px;" class="btn btn-info" href="dokumen/lihat.php?namafile=<?php echo $fc_sk; ?>" target="_blank" role="button">Lihat</a>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_fc_sk.php" role="button">Unggah Ulang</a>
          <?php }
          elseif ($dokumn == '0' && $fc_sk == '') {
            echo "<img src=\"../img/kali.png\"/> Belum diunggah";
          }
          elseif ($dokumn == '0' && $fc_sk != '') {
            echo "<a style=\"font-size:13px;\" class=\"btn btn-info\" href=\"dokumen/lihat.php?namafile=$fc_sk\" target=\"_blank\" role=\"button\">Lihat</a>";
          }
          else {
            echo "-";
          }
          ?>
        </td>
      </tr>
      <tr>
        <td style="text-align:center;"><b>Scan DP3 dalam 2 (dua) tahun terakhir</b></td>
        <td style="text-align:center;">
          <?php
          $dokumn = $databatas['dokumen'];
          $fc_dp3 = $databerkas['fc_dp3'];
          if ($dokumn == '1' && $fc_dp3 == '' && $dataksg2>=1) { ?>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_fc_dp3.php" role="button">Unggah Dokumen ini</a>
          <?php }
          elseif ($dokumn == '1' && $fc_dp3 != '') { ?>
          <a style="font-size:13px;" class="btn btn-info" href="dokumen/lihat.php?namafile=<?php echo $fc_dp3; ?>" target="_blank" role="button">Lihat</a>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_fc_dp3.php" role="button">Unggah Ulang</a>
          <?php }
          elseif ($dokumn == '0' && $fc_dp3 == '') {
            echo "<img src=\"../img/kali.png\"/> Belum diunggah";
          }
          elseif ($dokumn == '0' && $fc_dp3 != '') {
            echo "<a style=\"font-size:13px;\" class=\"btn btn-info\" href=\"dokumen/lihat.php?namafile=$fc_dp3\" target=\"_blank\" role=\"button\">Lihat</a>";
          }
          else {
            echo "-";
          }
          ?>
        </td>
      </tr>
      <tr>
        <td style="text-align:center;"><b>Scan Pakta Integritas</b></td>
        <td style="text-align:center;">
          <?php
          $dokumn = $databatas['dokumen'];
          $fc_pakta = $databerkas['fc_pakta'];
          if ($dokumn == '1' && $fc_pakta == '' && $dataksg2>=1) { ?>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_fc_pakta.php" role="button">Unggah Dokumen ini</a>
          <?php }
          elseif ($dokumn == '1' && $fc_pakta != '') { ?>
          <a style="font-size:13px;" class="btn btn-info" href="dokumen/lihat.php?namafile=<?php echo $fc_pakta; ?>" target="_blank" role="button">Lihat</a>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_fc_pakta.php" role="button">Unggah Ulang</a>
          <?php }
          elseif ($dokumn == '0' && $fc_pakta == '') {
            echo "<img src=\"../img/kali.png\"/> Belum diunggah";
          }
          elseif ($dokumn == '0' && $fc_pakta != '') {
            echo "<a style=\"font-size:13px;\" class=\"btn btn-info\" href=\"dokumen/lihat.php?namafile=$fc_pakta\" target=\"_blank\" role=\"button\">Lihat</a>";
          }
          else {
            echo "-";
          }
          ?>
        </td>
      </tr>
      <tr>
        <td style="text-align:center;"><b>Scan Nomor Pokok Wajib Pajak (NPWP).</b></td>
        <td style="text-align:center;">
          <?php
          $dokumn = $databatas['dokumen'];
          $fc_npwp = $databerkas['fc_npwp'];
          if ($dokumn == '1' && $fc_npwp == '' && $dataksg2>=1) { ?>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_fc_npwp.php" role="button">Unggah Dokumen ini</a>
          <?php }
          elseif ($dokumn == '1' && $fc_npwp != '') { ?>
          <a style="font-size:13px;" class="btn btn-info" href="dokumen/lihat.php?namafile=<?php echo $fc_npwp; ?>" target="_blank" role="button">Lihat</a>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_fc_npwp.php" role="button">Unggah Ulang</a>
          <?php }
          elseif ($dokumn == '0' && $fc_npwp == '') {
            echo "<img src=\"../img/kali.png\"/> Belum diunggah";
          }
          elseif ($dokumn == '0' && $fc_npwp != '') {
            echo "<a style=\"font-size:13px;\" class=\"btn btn-info\" href=\"dokumen/lihat.php?namafile=$fc_npwp\" target=\"_blank\" role=\"button\">Lihat</a>";
          }
          else {
            echo "-";
          }
          ?>
        </td>
      </tr>
      <tr>
         <td style="text-align:center;"><b>Scan Kartu Keluarga.</b></td>
         <td style="text-align:center;">
           <?php
           $dokumn = $databatas['dokumen'];
           $fc_kk = $databerkas['fc_kk'];
           if ($dokumn == '1' && $fc_kk == '' && $dataksg2>=1) { ?>
           <a style="font-size:13px;" class="btn btn-success" href="unggah_fc_kk.php" role="button">Unggah Dokumen ini</a>
           <?php }
           elseif ($dokumn == '1' && $fc_kk != '') { ?>
           <a style="font-size:13px;" class="btn btn-info" href="dokumen/lihat.php?namafile=<?php echo $fc_kk; ?>" target="_blank" role="button">Lihat</a>
           <a style="font-size:13px;" class="btn btn-success" href="unggah_fc_kk.php" role="button">Unggah Ulang</a>
           <?php }
           elseif ($dokumn == '0' && $fc_kk == '') {
             echo "<img src=\"../img/kali.png\"/> Belum diunggah";
           }
           elseif ($dokumn == '0' && $fc_kk != '') {
             echo "<a style=\"font-size:13px;\" class=\"btn btn-info\" href=\"dokumen/lihat.php?namafile=$fc_kk\" target=\"_blank\" role=\"button\">Lihat</a>";
           }
           else {
             echo "-";
           }
           ?>
         </td>
      </tr>
      <tr>
          <td style="text-align:center;"><b>Scan Kartu Tanda Penduduk.</b></td>
          <td style="text-align:center;">
            <?php
            $dokumn = $databatas['dokumen'];
            $fc_ktp = $databerkas['fc_ktp'];
            if ($dokumn == '1' && $fc_ktp == '' && $dataksg2>=1) { ?>
            <a style="font-size:13px;" class="btn btn-success" href="unggah_fc_ktp.php" role="button">Unggah Dokumen ini</a>
            <?php }
            elseif ($dokumn == '1' && $fc_ktp != '') { ?>
            <a style="font-size:13px;" class="btn btn-info" href="dokumen/lihat.php?namafile=<?php echo $fc_ktp; ?>" target="_blank" role="button">Lihat</a>
            <a style="font-size:13px;" class="btn btn-success" href="unggah_fc_ktp.php" role="button">Unggah Ulang</a>
            <?php }
            elseif ($dokumn == '0' && $fc_ktp == '') {
              echo "<img src=\"../img/kali.png\"/> Belum diunggah";
            }
            elseif ($dokumn == '0' && $fc_ktp != '') {
              echo "<a style=\"font-size:13px;\" class=\"btn btn-info\" href=\"dokumen/lihat.php?namafile=$fc_ktp\" target=\"_blank\" role=\"button\">Lihat</a>";
            }
            else {
              echo "-";
            }
            ?>
          </td>
      </tr>
      <tr>
        <td style="text-align:center;"><b>Scan ijazah S1</b></td>
        <td style="text-align:center;">
          <?php
          $dokumn = $databatas['dokumen'];
          $fc_ijazah = $databerkas['fc_ijazah'];
          if ($dokumn == '1' && $fc_ijazah == '' && $dataksg2>=1) { ?>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_fc_ijazah.php" role="button">Unggah Dokumen ini</a>
          <?php }
          elseif ($dokumn == '1' && $fc_ijazah != '') { ?>
          <a style="font-size:13px;" class="btn btn-info" href="dokumen/lihat.php?namafile=<?php echo $fc_ijazah; ?>" target="_blank" role="button">Lihat</a>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_fc_ijazah.php" role="button">Unggah Ulang</a>
          <?php }
          elseif ($dokumn == '0' && $fc_ijazah == '') {
            echo "<img src=\"../img/kali.png\"/> Belum diunggah";
          }
          elseif ($dokumn == '0' && $fc_ijazah != '') {
            echo "<a style=\"font-size:13px;\" class=\"btn btn-info\" href=\"dokumen/lihat.php?namafile=$fc_ijazah\" target=\"_blank\" role=\"button\">Lihat</a>";
          }
          else {
            echo "-";
          }
          ?>
        </td>
      </tr>
      <tr>
        <td style="text-align:center;"><b>Scan transkrip S1</b></td>
        <td style="text-align:center;">
          <?php
          $dokumn = $databatas['dokumen'];
          $fc_transkrip = $databerkas['fc_transkrip'];
          if ($dokumn == '1' && $fc_transkrip == '' && $dataksg2>=1) { ?>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_fc_transkrip.php" role="button">Unggah Dokumen ini</a>
          <?php }
          elseif ($dokumn == '1' && $fc_transkrip != '') { ?>
          <a style="font-size:13px;" class="btn btn-info" href="dokumen/lihat.php?namafile=<?php echo $fc_transkrip; ?>" target="_blank" role="button">Lihat</a>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_fc_transkrip.php" role="button">Unggah Ulang</a>
          <?php }
          elseif ($dokumn == '0' && $fc_transkrip == '') {
            echo "<img src=\"../img/kali.png\"/> Belum diunggah";
          }
          elseif ($dokumn == '0' && $fc_transkrip != '') {
            echo "<a style=\"font-size:13px;\" class=\"btn btn-info\" href=\"dokumen/lihat.php?namafile=$fc_transkrip\" target=\"_blank\" role=\"button\">Lihat</a>";
          }
          else {
            echo "-";
          }
          ?>
        </td>
      </tr>
      <tr>
        <td style="text-align:center;"><b>Scan Keterangan sehat jasmani dari dokter rumah sakit pemerintah</b></td>
        <td style="text-align:center;">
          <?php
          $dokumn = $databatas['dokumen'];
          $ket_sehat = $databerkas['ket_sehat'];
          if ($dokumn == '1' && $ket_sehat == '' && $dataksg2>=1) { ?>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_ket_sehat.php" role="button">Unggah Dokumen ini</a>
          <?php }
          elseif ($dokumn == '1' && $ket_sehat != '') { ?>
          <a style="font-size:13px;" class="btn btn-info" href="dokumen/lihat.php?namafile=<?php echo $ket_sehat; ?>" target="_blank" role="button">Lihat</a>
          <a style="font-size:13px;" class="btn btn-success" href="unggah_ket_sehat.php" role="button">Unggah Ulang</a>
          <?php }
          elseif ($dokumn == '0' && $ket_sehat == '') {
            echo "<img src=\"../img/kali.png\"/> Belum diunggah";
          }
          elseif ($dokumn == '0' && $ket_sehat != '') {
            echo "<a style=\"font-size:13px;\" class=\"btn btn-info\" href=\"dokumen/lihat.php?namafile=$ket_sehat\" target=\"_blank\" role=\"button\">Lihat</a>";
          }
          else {
            echo "-";
          }
          ?>
        </td>
      </tr>
      <tr>
        <td style="text-align:center;"><b>Scan Keterangan bebas narkoba yang dilengkapi dengan hasil pemeriksaan laboratorium dalam 1 bulan terakhir</b></td>
        <td style="text-align:center;">
        <?php
        $dokumn = $databatas['dokumen'];
        $ket_bebas_narkoba = $databerkas['ket_bebas_narkoba'];
        if ($dokumn == '1' && $ket_bebas_narkoba == '' && $dataksg2>=1) { ?>
        <a style="font-size:13px;" class="btn btn-success" href="unggah_ket_bebas_narkoba.php" role="button">Unggah Dokumen ini</a>
        <?php }
        elseif ($dokumn == '1' && $ket_bebas_narkoba != '') { ?>
        <a style="font-size:13px;" class="btn btn-info" href="dokumen/lihat.php?namafile=<?php echo $ket_bebas_narkoba; ?>" target="_blank" role="button">Lihat</a>
        <a style="font-size:13px;" class="btn btn-success" href="unggah_ket_bebas_narkoba.php" role="button">Unggah Ulang</a>
        <?php }
        elseif ($dokumn == '0' && $ket_bebas_narkoba == '') {
          echo "<img src=\"../img/kali.png\"/> Belum diunggah";
        }
        elseif ($dokumn == '0' && $ket_bebas_narkoba != '') {
          echo "<a style=\"font-size:13px;\" class=\"btn btn-info\" href=\"dokumen/lihat.php?namafile=$ket_bebas_narkoba\" target=\"_blank\" role=\"button\">Lihat</a>";
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
