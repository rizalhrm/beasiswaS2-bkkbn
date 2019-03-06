<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <h3 class="page-header">Wawancara</h3>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <ul class="nav nav-tabs">
      	  <li role="presentation" class="active"><a href="pengumuman_wawancara.php">Pengumuman</a></li>
      	  <li role="presentation"><a href="sesi_wawancara.php">Sesi Wawancara</a></li>
      	  <li role="presentation"><a href="penilaianwawancara.php">Penilaian</a></li>
          <li role="presentation"><a href="daftarloloswawancara.php">Daftar CPB Lolos Seleksi Wawancara</a></li>
      	</ul>
        <br>
        <?php
        if (isset($_POST['ubah'])) {
        include "wawancara/ubahpengumuman.php";
        }
        elseif (isset($_POST['detail'])) {
        include "wawancara/detailpengumuman.php";
        }
        else {
        $sql_wwc = "SELECT * from wawancara A INNER JOIN formulir B ON B.nip=A.nip";
        $query_wwc = mysqli_query($koneksi,$sql_wwc);
        ?>
        <div class="table-responsive">
        <table class="table table-bordered table-hover data" style="font-size:13px;">
          <thead>
            <tr>
              <th style="text-align:center;">No</th>
              <th style="text-align:center;">NIP</th>
              <th style="text-align:center;">Nama</th>
              <th style="text-align:center;">No. HP</th>
              <th style="text-align:center;">Unit Kerja</th>
              <th style="text-align:center;">Jabatan</th>
              <th style="text-align:center;">Pengumuman</th>
              <th style="text-align:center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $no=1;
          while ($wwc = mysqli_fetch_array($query_wwc)) {
          ?>
          <tr>
            <form action="" method="POST">
            <td align="center"><?php echo $no ?></td>
            <td align="center"><input type="hidden" name="nip" value="<?php echo $wwc['nip']; ?>"><?php echo $wwc['nip']; ?></td>
            <td align="center"><?php echo $wwc['nama']; ?></td>
            <td align="center"><?php echo $wwc['tlp']; ?></td>
            <td align="center"><?php
            $sql_f="SELECT * FROM data_bkkbn WHERE id_bkkbn='$wwc[provinsi_kantor]'";
            $query_f=mysqli_query($koneksi,$sql_f);
            $data_f=mysqli_fetch_array($query_f);
            $sql_g="SELECT * FROM unit_kerja WHERE id_uk='$wwc[unit_organ]'";
            $query_g=mysqli_query($koneksi,$sql_g);
            $data_g=mysqli_fetch_array($query_g);
            $cekdata=mysqli_num_rows($query_g);
            if ($cekdata>=1) {
              echo "$data_g[unit_kerja], $data_f[prov]";
             }
            elseif ($cekdata<1) {
              echo "$wwc[unit_organ], $data_f[prov]";  } ?></td>
            <td align="center"><?php echo $wwc['jabatan_skrg']; ?></td>
            <td align="center">
                <input type="hidden" name="pengumuman" value="<?php echo $wwc['nip']; ?>">
                <button type="submit" name='detail' class="btn btn-default btn-sm">
                  <span class="glyphicon glyphicon-eye-open"></span> Detail
                </button>
            </td>
            <td align="center">
              <button type='submit' name='ubah' class='btn btn-success btn-sm'>
                <span class="glyphicon glyphicon-pencil"></span> Ubah Pengumuman</button>
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
if (isset($_POST['ubahpengumuman'])) {
  $nip = $_POST ['nip'];
  $pengumuman = $_POST['pengumuman'];

  $queryupdate = "UPDATE wawancara SET pengumuman='$pengumuman' WHERE nip = '$nip'";
  $update = mysqli_query($koneksi,$queryupdate);
  if ($update) {
  echo "<script>alert('Data Berhasil diubah'); location.href='pengumuman_wawancara.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='pengumuman_wawancara.php';</script>";
  }
}

} ?>
