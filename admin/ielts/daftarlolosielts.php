<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <h3 class="page-header">Ujian IELTS</h3>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <ul class="nav nav-tabs">
      	  <li role="presentation"><a href="placement_test.php">Placement Test</a></li>
      	  <li role="presentation"><a href="kursus_ielts.php">Kursus IELTS</a></li>
      	  <li role="presentation"><a href="ujian_ielts.php">Ujian IELTS</a></li>
          <li role="presentation"><a href="nilai_ujian.php">Nilai Ujian</a></li>
          <li role="presentation" class="active"><a href="daftarlolosielts.php">Daftar CPB Lolos Seleksi Ujian IELTS</a></li>
      	</ul>
        <br>
        <?php
        if (isset($_POST['lanjut'])) {
          $nip = $_POST['nip'];

          $sqltambah = "INSERT INTO surat_perjanjian VALUES ('$nip','','','','')";
          $querytambah = mysqli_query($koneksi,$sqltambah);

          if ($querytambah) {
          echo "<script>alert('Data Berhasil diSimpan'); location.href='beranda.php';</script>";
          }
          else {
            echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='daftarlolosielts.php';</script>";
          }
        }
        $sql_ = "SELECT A.nip , B.nama, A.ket4 , A.overall_band ,A.status_cpb AS status_ielts  from ielts A INNER JOIN formulir B ON B.nip=A.nip WHERE A.status_cpb='Lolos'";
        $query_ = mysqli_query($koneksi,$sql_);
        ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <div align="center" style="margin-top:-8px; margin-bottom:-7px">
              <a class="btn btn-success btn-xs" style="text-align:center;" href="laporan/ujianielts.php" role="button">Cetak Laporan</a>
            </div>
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="table-responsive">
            <table class="table table-bordered table-hover data" style="font-size:13px;">
              <thead>
                <tr>
                  <th style="text-align:center;">No</th>
                  <th style="text-align:center;">NIP</th>
                  <th style="text-align:center;">Nama</th>
                  <th style="text-align:center;">Overall Band</th>
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
                  <?php if (empty($data['overall_band'])) {
                    echo "-"; }
                    else {
                      echo $data['overall_band'];
                    }
                  ?>
                </td>
                <td align="center">
                  <?php
                  $shine="SELECT * FROM jurusan WHERE idj='$data[ket4]'";
                  $query_shine=mysqli_query($koneksi,$shine);
                  $data_shine=mysqli_fetch_array($query_shine);
                  $steady="SELECT * FROM universitas WHERE id_univ='$data_shine[id_univ]'";
                  $query_steady=mysqli_query($koneksi,$steady);
                  $data_steady=mysqli_fetch_array($query_steady);
                   if ($data['status_ielts']=='Lolos') {
                      echo "$data[status_ielts] ke $data_steady[univ] , $data_shine[jurusan]";
                    }
                    elseif ($data['status_ielts']=='Tidak Lolos') {
                    echo "$data[status_ielts]"; }
                  ?>
                </td>
                <td align="center">
                  <button type='submit' name='lanjut' class='btn btn-primary btn-xs'  onclick="return confirm('Apakah anda yakin ingin menlanjutkan <?php echo $data['nip']; ?> ke tahap Surat Perjanjian ?')">Lanjut</button>
                </td>
              </form>
              </tr>
              <?php
              $no++;}
              ?>
              </tbody>
            </table>
            </div>
          </div>
          <!-- /.panel-body -->
        </div>
                    <!-- /.panel -->
      </div>
    </div>
  </div>
</div>

<?php
} ?>
