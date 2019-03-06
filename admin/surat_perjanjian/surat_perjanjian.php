<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <h3 class="page-header">Surat Perjanjian</h3>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <ul class="nav nav-tabs">
      	  <li role="presentation"><a href="pendaftaran_ln.php">Pendaftaran Ke Universitas LN</a></li>
      	  <li role="presentation" class="active"><a href="surat_perjanjian.php">Surat Perjanjian</a></li>
      	  <li role="presentation"><a href="penerimabeasiswa.php">Daftar Penerima Beasiswa S2 Luar Negeri</a></li>
      	</ul>
        <br>
        <?php
        if (isset($_POST['ubah'])) {
        include "surat_perjanjian/ubahstatus.php";
        }
        else {
        $sql_ = "SELECT A.nip , B.nama, A.perjanjian , A.ikatan_tubel ,A.status, A.status_pendaftaran_ln FROM surat_perjanjian A JOIN formulir B ON B.nip=A.nip WHERE A.status_pendaftaran_ln='Sudah didaftarkan'";
        $query_ = mysqli_query($koneksi,$sql_);
        ?>
        <div class="table-responsive">
        <table class="table table-bordered table-hover data" style="font-size:12px;">
          <thead>
            <tr>
              <th style="text-align:center;">No</th>
              <th style="text-align:center;">NIP</th>
              <th style="text-align:center;">Nama</th>
              <th style="text-align:center;">Surat Perjanjian</th>
              <th style="text-align:center;">Ikatan Tugas Belajar</th>
              <th style="text-align:center;">Status</th>
              <th style="text-align:center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $no=1;
          while ($data = mysqli_fetch_array($query_)) {
          ?>
          <tr>
            <form action="" method="POST">
            <td align="center"><?php echo $no ?></td>
            <td align="center"><input type="hidden" name="nip" value="<?php echo $data['nip']; ?>"><?php echo $data['nip']; ?></td>
            <td align="center"><?php echo $data['nama']; ?></td>
            <td align="center">
              <?php if (empty($data['perjanjian'])) {
                echo "<i>Belum Mengunggah Surat Perjanjian</i>"; }
                else {
              ?>
              <a class="btn btn-info btn-sm" role="button" href="surat_perjanjian/lihatdokumen.php?namafile=<?php echo $data['perjanjian']; ?>" target=\"_blank\">
              <span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
              <?php } ?>
            </td>
            <td align="center">
              <?php if (empty($data['ikatan_tubel'])) {
                echo "<i>Belum Mengunggah Ikatan Tugas Belajar</i>"; }
                else {
              ?>
              <a class="btn btn-info btn-sm" role="button" href="surat_perjanjian/lihatdokumen.php?namafile=<?php echo $data['ikatan_tubel']; ?>" target=\"_blank\">
              <span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
              <?php } ?>
            </td>
            <td align="center">
              <?php if (empty($data['status'])) {
                echo "-"; }
                else {
                  echo $data['status'];
                }
              ?>
            </td>
            <td align="center">
              <button type='submit' name='ubah' class='btn btn-success btn-xs'>
                <span class="glyphicon glyphicon-pencil"></span> Ubah Status</button>
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
if (isset($_POST['ubahstatus'])) {
  $nip = $_POST ['nip'];
  $status = $_POST['status'];

  $queryupdate = "UPDATE surat_perjanjian SET status='$status' WHERE nip = '$nip'";
  $update = mysqli_query($koneksi,$queryupdate);
  if ($update) {
  echo "<script>alert('Data Berhasil diubah'); location.href='surat_perjanjian.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='surat_perjanjian.php';</script>";
  }
}

} ?>
