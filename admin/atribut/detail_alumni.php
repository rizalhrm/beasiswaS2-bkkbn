<?php
$id = $_POST['primary'];
$select = "SELECT * FROM alumni WHERE id='$id'";
$queryselect = mysqli_query($koneksi,$select);
$isi = mysqli_fetch_array($queryselect);

    $noid = $isi['id'];
    $nama = $isi['nama_alumni'];
    $nip = $isi['nip'];
    $tempat_tugas = $isi['tempat_tugas'];
    $bidang_study = $isi['bidang_studi'];
    $univ = $isi['univ'];
    $gelar = $isi['gelar'];
    $mulai = $isi['mulai'];
    $selesai = $isi['selesai'];
    $sponsor = $isi['sponsor'];
    $ket = $isi['keterangan']; ?>

  <div align="left">
    <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
          Kembali <span class="glyphicon glyphicon-circle-arrow-left"></span></a>
  </div>
  <br>
  <table class="table table-bordered table-hover">
      <tr>
        <td><b>ID</b></td>
        <td><?php echo "$noid"; ?></td>
      </tr>
      <tr>
        <td><b>NIP</b></td>
        <td><?php echo "$nip"; ?></td>
      </tr>
      <tr>
        <td><b>Nama</b></td>
        <td><?php echo "$nama"; ?></td>
      </tr>
      <tr>
        <td><b>Instansi/Unit Kerja</b></td>
        <td><?php echo "$tempat_tugas"; ?></td>
      </tr>
      <tr>
        <td><b>Jurusan</b></td>
        <td><?php echo "$bidang_study"; ?></td>
      </tr>
      <tr>
        <td><b>Universitas</b></td>
        <td><?php echo "$univ"; ?></td>
      </tr>
      <tr>
        <td><b>Gelar</b></td>
        <td><?php echo "$gelar"; ?></td>
      </tr>
      <tr>
        <td><b>Waktu Mulai</b></td>
        <td><?php echo "$mulai"; ?></td>
      </tr>
      <tr>
        <td><b>Waktu Selesai</b></td>
        <td><?php echo "$selesai"; ?></td>
      </tr>
      <tr>
        <td><b>Sponsor atau Sumber Biaya</b></td>
        <td><?php echo "$sponsor"; ?></td>
      </tr>
      <tr>
        <td><b>Keterangan</td>
        <td><?php echo "$ket"; ?></td>
      </tr>
  </table>
