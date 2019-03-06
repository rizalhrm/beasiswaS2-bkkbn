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
      	  <li role="presentation"><a href="pernyataan.php">Surat Pernyataan</a></li>
      	  <li role="presentation"><a href="formulir.php">Data Formulir</a></li>
      	  <li role="presentation" class="active"><a href="berkasdokumen.php">Berkas Dokumen</a></li>
          <li role="presentation"><a href="daftarlolosadministrasi.php">Daftar CPB Lolos Seleksi Administrasi</a></li>
      	</ul>
        <br>
        <?php
        if (isset($_POST['ubah'])) {
        include "administrasi/ubahdokumen.php";
        }
        elseif (isset($_POST['detail'])) {
        include "administrasi/detaildokumen.php";
        }
        else {
        $sql_dok = "SELECT dokumen.nip AS doknip , dokumen.status_cpb AS dokstatus , formulir.nama AS namaf
        FROM dokumen , formulir WHERE dokumen.nip = formulir.nip";
        $query_dok = mysqli_query($koneksi,$sql_dok);
        ?>
        <div class="table-responsive">
        <table class="table table-bordered table-hover data">
          <thead>
            <tr>
              <th style="text-align:center;">No</th>
              <th style="text-align:center;">NIP</th>
              <th style="text-align:center;">Nama</th>
              <th style="text-align:center;">Status</th>
              <th style="text-align:center;">Pilihan</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $no=1;
          while ($dok = mysqli_fetch_array($query_dok)) {
          ?>
          <tr>
            <form action="" method="POST">
            <td align="center"><?php echo $no ?></td>
            <td align="center"><input type="hidden" name="doknip" value="<?php echo $dok['doknip']; ?>"><?php echo $dok['doknip']; ?></td>
            <td align="center"><input type="hidden" name="namaf" value="<?php echo $dok['namaf']; ?>"><?php echo $dok['namaf']; ?></td>
            <td align="center">
              <?php if (empty($dok['dokstatus'])) {
                echo "-"; }
                else {
                  echo $dok['dokstatus'];
                }
              ?>
            </td>
            <td align="center">
              <button type='submit' name='ubah' class='btn btn-success btn-sm'>
                <span class="glyphicon glyphicon-pencil"></span> Ubah Status</button>
              <button type='submit' name='detail' class='btn btn-info btn-sm'>
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
if (isset($_POST['ubahstatus'])) {
  $idcpb2 = $_POST ['nip2'];
  $status = $_POST['status'];

  $queryupdate = "UPDATE dokumen SET status_cpb='$status' WHERE nip = '$idcpb2'";
  $update = mysqli_query($koneksi,$queryupdate);
  if ($update) {
  echo "<script>alert('Data Berhasil diubah'); location.href='berkasdokumen.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='berkasdokumen.php';</script>";
  }
}

} ?>
