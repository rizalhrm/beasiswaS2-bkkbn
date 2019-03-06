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
      	  <li role="presentation" class="active"><a href="sesi_wawancara.php">Sesi Wawancara</a></li>
      	  <li role="presentation"><a href="penilaianwawancara.php">Penilaian</a></li>
          <li role="presentation"><a href="daftarloloswawancara.php">Daftar CPB Lolos Seleksi Wawancara</a></li>
      	</ul>
        <br>
        <?php
        if (isset($_POST['mulai'])) {
        $id = $_POST['nip'];
        $mulai = "UPDATE wawancara SET mulai=CURTIME() WHERE nip = '$id'";
        $update = mysqli_query($koneksi,$mulai);
        include "wawancara/ubahwawancara.php";
        }
        elseif (isset($_POST['detail'])) {
        include "wawancara/detailjawaban.php";
        }
        else {
        $sql_wwc = "SELECT * from wawancara A INNER JOIN formulir B ON B.nip=A.nip WHERE A.pengumuman !=''";
        $query_wwc = mysqli_query($koneksi,$sql_wwc);
        ?>
        <div class="table-responsive">
        <table class="table table-bordered table-hover data" style="font-size:13px;">
          <thead>
            <tr>
              <th style="text-align:center;">No</th>
              <th style="text-align:center;">NIP</th>
              <th style="text-align:center;">Nama</th>
              <th style="text-align:center;">Mulai</th>
              <th style="text-align:center;">Selesai</th>
              <th style="text-align:center;">Ket</th>
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
            <td align="center">
              <?php if ($wwc['mulai'] == '00:00:00') {
                echo "-"; }
                else {
                  echo $wwc['mulai'];
                }
              ?>
            </td>
            <td align="center">
              <?php if ($wwc['selesai'] == '00:00:00') {
                echo "-"; }
                else {
                  echo $wwc['selesai'];
                }
              ?>
            </td>
            <td align="center">
              <?php if (empty($wwc['ket'])) {
                echo "Belum diwawancarai"; }
                else {
                  echo $wwc['ket'];
                }
              ?>
            </td>
            <td align="center">
              <?php
                if ($wwc['selesai'] == '00:00:00') {
               ?>
              <button type='submit' name='mulai' class='btn btn-success btn-sm'>
                <span class="glyphicon glyphicon-play-circle"></span> Mulai</button>
              <?php } else { ?>
              <button type="submit" name='detail' class="btn btn-info btn-sm">
                <span class="glyphicon glyphicon-eye-open"></span> Lihat Jawaban
              </button>
              <?php } ?>
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
if (isset($_POST['ubahwawancara'])) {
  $nip = $_POST ['nip'];
  $jawaban = $_POST ['jawaban'];
  $id_pertanyaan = $_POST['pertanyaan'];
  $catatan = $_POST ['catatan'];

  $queryupdate = "UPDATE wawancara SET selesai=CURTIME() , tanggal_wawancara=CURDATE() , ket='Sudah diwawancarai' WHERE nip = '$nip'";
  $updatewwc = mysqli_query($koneksi,$queryupdate);

  $pilih = count($id_pertanyaan);
  for ($i=0; $i < $pilih ; $i++) {
    $queryjwb = "INSERT INTO jawaban_wawancara VALUES ('','$nip','$id_pertanyaan[$i]','$jawaban[$i]','$catatan[$i]')";
    $insertjwb = mysqli_query($koneksi,$queryjwb);
  }

  if ($updatewwc & $insertjwb) {
  echo "<script>alert('Data Berhasil diubah'); location.href='sesi_wawancara.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='sesi_wawancara.php';</script>";
  }
}

} ?>
