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
      	  <li role="presentation" class="active"><a href="pendaftaran_ln.php">Pendaftaran Ke Universitas LN</a></li>
      	  <li role="presentation"><a href="surat_perjanjian.php">Surat Perjanjian</a></li>
      	  <li role="presentation"><a href="penerimabeasiswa.php">Daftar Penerima Beasiswa S2 Luar Negeri</a></li>
      	</ul>
        <br>
        <?php
        if (isset($_POST['ubah'])) {
        include "surat_perjanjian/ubah.php";
        }
        else {
        $sql_ = "SELECT * FROM surat_perjanjian A JOIN formulir B ON B.nip=A.nip JOIN ielts C ON C.nip=B.nip";
        $query_ = mysqli_query($koneksi,$sql_);
        ?>
        <div class="table-responsive">
        <table class="table table-bordered table-hover data" style="font-size:13px;">
          <thead>
            <tr>
              <th style="text-align:center;">No</th>
              <th style="text-align:center;">NIP</th>
              <th style="text-align:center;">Nama</th>
              <th style="text-align:center;">Target</th>
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
            <?php
            $shine="SELECT * FROM jurusan WHERE idj='$data[ket4]'";
            $query_shine=mysqli_query($koneksi,$shine);
            $data_shine=mysqli_fetch_array($query_shine);
            $steady="SELECT * FROM universitas WHERE id_univ='$data_shine[id_univ]'";
            $query_steady=mysqli_query($koneksi,$steady);
            $data_steady=mysqli_fetch_array($query_steady);
                echo "$data_steady[univ] , $data_shine[jurusan]";
            ?>
          </td>
            <td align="center">
              <?php if (empty($data['status_pendaftaran_ln'])) {
                echo "<i>Belum didaftarkan</i>"; }
                else {
                  echo $data['status_pendaftaran_ln'];
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

  $queryupdate = "UPDATE surat_perjanjian SET status_pendaftaran_ln='$status' WHERE nip = '$nip'";
  $update = mysqli_query($koneksi,$queryupdate);
  if ($update) {
  echo "<script>alert('Data Berhasil diubah'); location.href='pendaftaran_ln.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='pendaftaran_ln.php';</script>";
  }
}

} ?>
