<?php
$nip = $_POST['nip'];
$select = "SELECT * FROM tubel WHERE nip='$nip'";
$queryselect = mysqli_query($koneksi,$select);
$datat = mysqli_fetch_array($queryselect);
 ?>

  <div align="left">
    <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
          Kembali <span class="glyphicon glyphicon-circle-arrow-left"></span></a>
  </div>
  <br>
  <table class="table table-bordered table-hover" style="font-size:13px;">
    <tr>
      <td><b>NIP</b></td>
      <td><?php echo $datat['nip']; ?></td>
    </tr>
    <tr>
      <td><b>Nama</b></td>
      <td><?php echo $datat['nama']; ?></td>
    </tr>
    <tr>
      <td><b>Jenis Kelamin</b></td>
      <td><?php
      if ($datat['jk']=='P') {
        echo "Perempuan";
      }
      else {
        echo "Laki-Laki";
      }
      ?>
      </td>
    </tr>
    <tr>
      <td><b>Email</b></td>
      <td><?php echo $datat['email']; ?></td>
    </tr>
    <tr>
      <td><b>Usia</b></td>
      <td><?php echo $datat['usia']; ?></td>
    </tr>
    <tr>
      <td><b>Status Pernikahan</b></td>
      <td><?php echo $datat['statusnikah']; ?></td>
    </tr>
    <tr>
      <td><b>Jurusan</b></td>
      <td><?php echo $datat['jurusan']; ?></td>
    </tr>
    <tr>
      <td><b>Universitas</b></td>
      <td><?php echo $datat['univ']; ?></td>
    </tr>
    <tr>
      <td><b>Mulai</b></td>
      <td><?php echo $datat['mulai']; ?></td>
    </tr>
    <tr>
      <td><b>Unit Kerja</b></td>
      <td><?php echo $datat['unit_kerja']; ?></td>
    </tr>
    <tr>
      <td><b>Jabatan</b></td>
      <td><?php echo $datat['jabatan']; ?></td>
    </tr>
    <tr>
      <td><b>Overall Band</b></td>
      <td><?php echo $datat['overall_band']; ?></td>
    </tr>
    <tr>
      <td><b>Test Report Form</b></td>
      <td>
        <?php
        if (empty($datat['test_report'])) {
          echo "<img src=\"../img/kali.png\"/> Belum diunggah";
        }
        else {?>
        <a class="btn btn-info btn-sm" role="button" href="laporan/lihatielts.php?namafile=<?php echo $datat['test_report']; ?>" target="_blank">
        <span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td><b>Surat Perjanjian</b></td>
      <td>
        <?php
        if (empty($datat['perjanjian'])) {
          echo "<img src=\"../img/kali.png\"/> Belum diunggah";
        }
        else {?>
        <a class="btn btn-info btn-sm" role="button" href="laporan/lihatdokumen.php?namafile=<?php echo $datat['perjanjian']; ?>" target="_blank">
        <span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td><b>Ikatan Tugas Belajar</b></td>
      <td>
        <?php
        if (empty($datat['ikatan_tubel'])) {
          echo "<img src=\"../img/kali.png\"/> Belum diunggah";
        }
        else {?>
        <a class="btn btn-info btn-sm" role="button" href="laporan/lihatdokumen.php?namafile=<?php echo $datat['ikatan_tubel']; ?>" target="_blank">
        <span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
        <?php } ?>
      </td>
    </tr>
    <tr>
      <td><b>Sumber Pembiayaan</b></td>
      <td><?php echo $datat['pembiayaan']; ?></td>
    </tr>
  </table>
  <div align="left">
    <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
          Kembali <span class="glyphicon glyphicon-circle-arrow-left"></span></a>
  </div>
