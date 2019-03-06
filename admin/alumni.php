<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <h3 class="page-header">Alumni Penerima Beasiswa S2 Luar Negeri</h3>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-info">
      <div class="panel-body">
    <?php
if (isset($_POST['edit'])) {
include "atribut/edit_alumni.php";
}
elseif (isset($_POST['detail'])) {
include "atribut/detail_alumni.php";
}
 else {
   $select = "SELECT * from alumni ORDER BY id DESC";
   $queryselect = mysqli_query($koneksi,$select);
?>
   <div class="table-responsive">
   <table class="table table-bordered table-hover data">
     <thead>
       <tr>
         <th style="text-align:center;">No</th>
         <th style="text-align:center;">Nama</th>
         <th style="text-align:center;">Instansi/Unit Kerja</th>
         <th style="text-align:center;">Jurusan</th>
         <th style="text-align:center;">Universitas</th>
         <th style="text-align:center;">Gelar</th>
         <th style="text-align:center;">Mulai</th>
         <th style="text-align:center;">Selesai</th>
         <th style="text-align:center;">Pilihan</th>
       </tr>
     </thead>

   <tbody>
     <?php
       $no=1;
     while ($isi = mysqli_fetch_array($queryselect)) {
        $noid = $isi['id'];
        $nama = $isi['nama_alumni'];
        $tempat_tugas = $isi['tempat_tugas'];
        $bidang_study = $isi['bidang_studi'];
        $univ = $isi['univ'];
        $gelar = $isi['gelar'];
        $mulai = $isi['mulai'];
        $selesai = $isi['selesai']; ?>
   <tr>
     <form action="" method="POST">
     <td><input type="hidden" name="primary" value="<?php echo $noid ?>"><?php echo $no ?></td>
     <td><?php echo $nama ?></td>
     <td><?php echo $tempat_tugas?></td>
     <td><?php echo $bidang_study?></td>
     <td><?php echo $univ ?></td>
     <td><?php echo $gelar ?></td>
     <td><?php echo $mulai ?></td>
     <td><?php echo $selesai ?></td>
     <td align="center">
       <button type='submit' name='edit' class='btn btn-success btn-xs'>
         <span class="glyphicon glyphicon-pencil"></span> Edit</button>
         <hr style="margin-top:0px; margin-bottom: 0px;">
       <button type='submit' name='detail' class='btn btn-info btn-xs'>
         <span class="glyphicon glyphicon-eye-open"></span> Detail</button>
     </td>
   </form>
   </tr>
   <?php
   $no++;}
   ?>
   </tbody>
  </table>
  </div>
  <?php
  }
  ?>
</div>
</div>
</div>
</div>
<?php
if (isset($_POST['ubah'])) {
  $id = $_POST ['id'];
  $nip1 = $_POST ['nip1'];
  $nip2 = $_POST ['nip2'];
  $nip3 = $_POST ['nip3'];
  $nip4 = $_POST ['nip4'];
  $nama = $_POST['nama'];
$tempat_tugas = $_POST['tempat_tugas'];
$bidang_studi = $_POST['bidang_studi'];
$univ = $_POST['univ'];
$gelar = $_POST['gelar'];
$mulai = $_POST['mulai'];
$selesai = $_POST['selesai'];
$ket = $_POST['ket'];
$sponsor = $_POST['sponsor'];

  $queryupdate = "UPDATE alumni SET nip='$nip1 $nip2 $nip3 $nip4' , nama_alumni='$nama' ,
  tempat_tugas='$tempat_tugas', bidang_studi='$bidang_studi', univ='$univ',
  gelar='$gelar', mulai='$mulai', selesai='$selesai', sponsor='$sponsor' , keterangan='$ket' WHERE id = '$id'";
  $update = mysqli_query($koneksi,$queryupdate);
  if ($update) {
  echo "<script>alert('Data Berhasil diubah'); location.href='alumni.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='alumni.php';</script>";
  }
}

} ?>
