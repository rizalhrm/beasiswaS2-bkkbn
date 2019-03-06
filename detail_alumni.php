<?php
include "header.php";
 ?>
<div class="span9">
<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
  <li><a href="alumni.php">Alumni</a> <span class="divider">/</span></li>
	<li class="active">Detail Data Alumni</li>
</ul>

<?php
$id = $_GET['id'];
$select = "SELECT * FROM alumni WHERE id='$id'";
$queryselect = mysqli_query($koneksi,$select);
$isi = mysqli_fetch_array($queryselect);
 ?>

<div class="span12 wellwhite" style="margin-left: 0px">
<legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Data Alumni (<?php echo "$isi[nama_alumni]"; ?>)</legend>

<div class="row-fluid">
  <a class="btn btn-info pull-left" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button"><i class="icon-arrow-left"></i>
    Kembali</a><br><br>

<?php
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

</div>
</div>
</div>
</div><!--/span-->
 </div><!--/row-->

  <?php include "footer.php"; ?>
