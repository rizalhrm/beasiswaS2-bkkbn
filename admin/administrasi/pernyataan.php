<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <h3 class="page-header">Administrasi</h3>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <ul class="nav nav-tabs">
      	  <li role="presentation" class="active"><a href="pernyataan.php">Surat Pernyataan</a></li>
      	  <li role="presentation"><a href="formulir.php">Data Formulir</a></li>
      	  <li role="presentation"><a href="berkasdokumen.php">Berkas Dokumen</a></li>
          <li role="presentation"><a href="daftarlolosadministrasi.php">Daftar CPB Lolos Seleksi Administrasi</a></li>
      	</ul>
        <br>
        <?php
        if (isset($_POST['ubah'])) {
        include "administrasi/ubahpernyataan.php";
        }
        else {
        $sql_perny = "SELECT * FROM pernyataan";
        $query_perny = mysqli_query($koneksi,$sql_perny);
        ?>
        <div class="table-responsive">
        <table class="table table-bordered table-hover data">
          <thead>
            <tr>
              <th style="text-align:center;">No</th>
              <th style="text-align:center;">NIP</th>
              <th style="text-align:center;">Status</th>
              <th style="text-align:center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $no=1;
          while ($perny = mysqli_fetch_array($query_perny)) {
          ?>
          <tr>
            <form action="" method="POST">
            <td align="center"><?php echo $no ?></td>
            <td align="center"><input type="hidden" name="nip" value="<?php echo $perny['nip']; ?>"><?php echo $perny['nip']; ?></td>
            <td align="center">
              <?php if (empty($perny['status_cpb'])) {
                echo "-"; }
                else {
                  echo $perny['status_cpb'];
                }
              ?>
            </td>
            <td align="center">
              <button type='submit' name='ubah' class='btn btn-success btn-sm'>
                <span class="glyphicon glyphicon-pencil"></span> Ubah Status</button>
              <a class="btn btn-info btn-sm" role="button" href="administrasi/lihatpernyataan.php?namafile=<?php echo $perny['pernyataan']; ?>" target=\"_blank\">
                <span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
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
  $id_nip = $_POST ['nip2'];
  $status = $_POST['status'];

  $queryupdate = "UPDATE pernyataan SET status_cpb='$status' WHERE nip = '$id_nip'";
  $update = mysqli_query($koneksi,$queryupdate);
  if ($update) {
  echo "<script>alert('Data Berhasil diubah'); location.href='pernyataan.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='pernyataan.php';</script>";
  }
}

} ?>
