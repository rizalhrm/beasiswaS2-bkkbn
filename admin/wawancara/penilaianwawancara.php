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
      	  <li role="presentation"><a href="pengumuman_wawancara.php">Pengumuman</a></li>
      	  <li role="presentation"><a href="sesi_wawancara.php">Sesi Wawancara</a></li>
      	  <li role="presentation" class="active"><a href="penilaianwawancara.php">Penilaian</a></li>
          <li role="presentation"><a href="daftarloloswawancara.php">Daftar CPB Lolos Seleksi Wawancara</a></li>
      	</ul>
        <br>
        <?php
        if (isset($_POST['berinilai'])) {
        include "wawancara/berinilai.php";
        }
        else {
        $sql_nilai = "SELECT * from wawancara A INNER JOIN formulir B ON B.nip=A.nip WHERE A.pengumuman !='' AND A.selesai !='00:00:00'";
        $query_nilai = mysqli_query($koneksi,$sql_nilai);
        ?>
        <div class="table-responsive">
        <table class="table table-bordered table-hover data" style="font-size:13px;">
          <thead>
            <tr>
              <th style="text-align:center;">No</th>
              <th style="text-align:center;">NIP</th>
              <th style="text-align:center;">Nama</th>
              <th style="text-align:center;">Tanggal Wawancara</th>
              <th style="text-align:center;">Total Nilai (max. 100)</th>
              <th style="text-align:center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $no=1;
          while ($nilai = mysqli_fetch_array($query_nilai)) {
          ?>
          <tr>
            <form action="" method="POST">
            <td align="center"><?php echo $no ?></td>
            <td align="center"><input type="hidden" name="nip" value="<?php echo $nilai['nip']; ?>"><?php echo $nilai['nip']; ?></td>
            <td align="center"><?php echo $nilai['nama']; ?></td>
            <td align="center"><?php echo $nilai['tanggal_wawancara']; ?></td>
            <td align="center">
              <?php if ($nilai['ket']=='Sudah diwawancarai') {
                echo "-"; }
                else {
                  echo $nilai['total_nilai'];
                }
              ?>
            </td>
            <td align="center">
              <?php if ($nilai['ket']=='Sudah diwawancarai') {
                echo "Belum dinilai<br>
                <button type='submit' name='berinilai' class='btn btn-success btn-xs'>
                  <span class='glyphicon glyphicon-pencil'></span> Beri Nilai</button>"; }
                else {
                  echo $nilai['ket'];
                }
              ?>
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
if (isset($_POST['tombolberinilai'])) {
  $nip = $_POST ['nip'];
  $totalnilai = $_POST ['totalnilai'];
  if ($totalnilai>74) {
    $queryupdate = "UPDATE wawancara SET total_nilai='$totalnilai' , ket='Sudah dinilai' , status_cpb='Lolos' WHERE nip = '$nip'";
  }
  elseif ($totalnilai<=74) {
    $queryupdate = "UPDATE wawancara SET total_nilai='$totalnilai' , ket='Sudah dinilai' , status_cpb='Tidak Lolos' WHERE nip = '$nip'";
  }
  $updatewwc = mysqli_query($koneksi,$queryupdate);

  if ($updatewwc) {
  echo "<script>alert('Data Berhasil diubah'); location.href='penilaianwawancara.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='penilaianwawancara.php';</script>";
  }
}

} ?>
