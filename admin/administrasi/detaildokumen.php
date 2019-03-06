<?php
$idcpb = $_POST['doknip'];
$namadari = $_POST['namaf'];
$select = "SELECT * FROM dokumen WHERE nip='$idcpb'";
$queryselect = mysqli_query($koneksi,$select);
$dataf = mysqli_fetch_array($queryselect);
 ?>

  <div align="left">
    <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
          Kembali <span class="glyphicon glyphicon-circle-arrow-left"></span></a>
  </div>
  <br>
  <table class="table table-bordered table-hover" style="font-size:13px;">
    <tr>
      <td><b>NIP</b></td>
      <td><?php echo $dataf['nip']; ?></td>
    </tr>
    <tr>
      <td><b>Nama</b></td>
      <td><?php echo $namadari; ?></td>
    </tr>
    <tr>
      <td><b>Daftar Riwayat Hidup</b></td>
      <td>
        <?php
        if (empty($dataf['drh'])) {
          echo "<img src=\"../img/kali.png\"/> Belum diunggah";
        }
        else {?>
        <a class="btn btn-info btn-sm" role="button" href="administrasi/lihatdokumen.php?namafile=<?php echo $dataf['drh']; ?>" target=\"_blank\">
        <span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td><b>Scan SK pengangkatan pada pangkat terakhir</b></td>
      <td>
        <?php
        if (empty($dataf['fc_sk'])) {
          echo "<img src=\"../img/kali.png\"/> Belum diunggah";
        }
        else {?>
        <a class="btn btn-info btn-sm" role="button" href="administrasi/lihatdokumen.php?namafile=<?php echo $dataf['fc_sk']; ?>" target=\"_blank\">
        <span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td><b>Scan DP3 dalam 2 (dua) tahun terakhir</b></td>
      <td>
        <?php
        if (empty($dataf['fc_dp3'])) {
          echo "<img src=\"../img/kali.png\"/> Belum diunggah";
        }
        else {?>
        <a class="btn btn-info btn-sm" role="button" href="administrasi/lihatdokumen.php?namafile=<?php echo $dataf['fc_dp3']; ?>" target=\"_blank\">
        <span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td><b>Scan Pakta Integritas</b></td>
      <td>
        <?php
        if (empty($dataf['fc_pakta'])) {
          echo "<img src=\"../img/kali.png\"/> Belum diunggah";
        }
        else {?>
        <a class="btn btn-info btn-sm" role="button" href="administrasi/lihatdokumen.php?namafile=<?php echo $dataf['fc_pakta']; ?>" target=\"_blank\">
        <span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td><b>Scan Nomor Pokok Wajib Pajak (NPWP).</b></td>
      <td>
        <?php
        if (empty($dataf['fc_npwp'])) {
          echo "<img src=\"../img/kali.png\"/> Belum diunggah";
        }
        else {?>
        <a class="btn btn-info btn-sm" role="button" href="administrasi/lihatdokumen.php?namafile=<?php echo $dataf['fc_npwp']; ?>" target=\"_blank\">
        <span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td><b>Scan Kartu Keluarga.</b></td>
      <td>
        <?php
        if (empty($dataf['fc_kk'])) {
          echo "<img src=\"../img/kali.png\"/> Belum diunggah";
        }
        else {?>
        <a class="btn btn-info btn-sm" role="button" href="administrasi/lihatdokumen.php?namafile=<?php echo $dataf['fc_kk']; ?>" target=\"_blank\">
        <span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td><b>Scan Kartu Tanda Penduduk.</b></td>
      <td>
        <?php
        if (empty($dataf['fc_ktp'])) {
          echo "<img src=\"../img/kali.png\"/> Belum diunggah";
        }
        else {?>
        <a class="btn btn-info btn-sm" role="button" href="administrasi/lihatdokumen.php?namafile=<?php echo $dataf['fc_ktp']; ?>" target=\"_blank\">
        <span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td><b>Scan ijazah S1</b></td>
      <td>
        <?php
        if (empty($dataf['fc_ijazah'])) {
          echo "<img src=\"../img/kali.png\"/> Belum diunggah";
        }
        else {?>
        <a class="btn btn-info btn-sm" role="button" href="administrasi/lihatdokumen.php?namafile=<?php echo $dataf['fc_ijazah']; ?>" target=\"_blank\">
        <span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td><b>Scan transkrip S1</b></td>
      <td>
        <?php
        if (empty($dataf['fc_transkrip'])) {
          echo "<img src=\"../img/kali.png\"/> Belum diunggah";
        }
        else {?>
        <a class="btn btn-info btn-sm" role="button" href="administrasi/lihatdokumen.php?namafile=<?php echo $dataf['fc_transkrip']; ?>" target=\"_blank\">
        <span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td><b>Scan Keterangan sehat jasmani dari dokter rumah sakit pemerintah</b></td>
      <td>
        <?php
        if (empty($dataf['ket_sehat'])) {
          echo "<img src=\"../img/kali.png\"/> Belum diunggah";
        }
        else {?>
        <a class="btn btn-info btn-sm" role="button" href="administrasi/lihatdokumen.php?namafile=<?php echo $dataf['ket_sehat']; ?>" target=\"_blank\">
        <span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td><b>Scan Keterangan bebas narkoba yang dilengkapi dengan hasil pemeriksaan laboratorium dalam 1 bulan terakhir</b></td>
      <td>
        <?php
        if (empty($dataf['ket_bebas_narkoba'])) {
          echo "<img src=\"../img/kali.png\"/> Belum diunggah";
        }
        else {?>
        <a class="btn btn-info btn-sm" role="button" href="administrasi/lihatdokumen.php?namafile=<?php echo $dataf['ket_bebas_narkoba']; ?>" target=\"_blank\">
        <span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
        <?php } ?>
      </td>
    </tr>
  </table>
  <div align="left">
    <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
          Kembali <span class="glyphicon glyphicon-circle-arrow-left"></span></a>
  </div>
