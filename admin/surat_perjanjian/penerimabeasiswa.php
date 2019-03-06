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
        	  <li role="presentation"><a href="surat_perjanjian.php">Surat Perjanjian</a></li>
        	  <li role="presentation" class="active"><a href="penerimabeasiswa.php">Daftar Penerima Beasiswa S2 Luar Negeri</a></li>
        	</ul>
        <br>
        <?php
        if (isset($_POST['mulai'])) {
          $nip = $_POST['nip'];

          $formulir = "SELECT * FROM formulir WHERE nip = '$nip'";
          $queryformulir = mysqli_query($koneksi,$formulir);
          $dataform = mysqli_fetch_array($queryformulir);
          $nama=$dataform['nama'];
          $jk=$dataform['jk'];
          $email=$dataform['email'];
          $usia=$dataform['usia'];
          $statusnikah=$dataform['statusnikah'];
          $mulai=date('Y');
          $jabatan=$dataform['jabatan_skrg'];
          $sponsor="BKKBN";

          $sql_f="SELECT * FROM data_bkkbn WHERE id_bkkbn='$dataform[provinsi_kantor]'";
          $query_f=mysqli_query($koneksi,$sql_f);
          $data_f=mysqli_fetch_array($query_f);
          $sql_g="SELECT * FROM unit_kerja WHERE id_uk='$dataform[unit_organ]'";
          $query_g=mysqli_query($koneksi,$sql_g);
          $data_g=mysqli_fetch_array($query_g);
          $cekdataa=mysqli_num_rows($query_g);
          if ($cekdataa>=1) {
            $unit_kerja= "$data_g[unit_kerja] , $data_f[prov]";
           }
          elseif ($cekdataa<1) {
            $unit_kerja= "$dataform[unit_organ] , $data_f[prov]";  }

          $ielts = "SELECT * FROM ielts WHERE nip = '$nip'";
          $queryielts = mysqli_query($koneksi,$ielts);
          $dielts = mysqli_fetch_array($queryielts);
          $overall=$dielts['overall_band'];
          $test_report=$dielts['test_report'];

          $shine="SELECT * FROM jurusan WHERE idj='$dielts[ket4]'";
          $query_shine=mysqli_query($koneksi,$shine);
          $data_shine=mysqli_fetch_array($query_shine);
          $steady="SELECT * FROM universitas WHERE id_univ='$data_shine[id_univ]'";
          $query_steady=mysqli_query($koneksi,$steady);
          $data_steady=mysqli_fetch_array($query_steady);

          $univ=$data_steady['univ'];
          $jurusan=$data_shine['jurusan'];

          $surat_perjanjian = "SELECT * FROM surat_perjanjian WHERE nip = '$nip'";
          $querysurat_perjanjian = mysqli_query($koneksi,$surat_perjanjian);
          $braveyou = mysqli_fetch_array($querysurat_perjanjian);
          $perjanjian=$braveyou['perjanjian'];
          $ikatan_tubel=$braveyou['ikatan_tubel'];

          $sqltubel = "INSERT INTO tubel VALUES ('$nip','$nama','$jk','$email','$usia','$statusnikah','$jurusan','$univ','$mulai','$unit_kerja','$jabatan','$overall','$test_report','$perjanjian','$ikatan_tubel','$sponsor')";
          $querytubel = mysqli_query($koneksi,$sqltubel);

          if ($querytubel) {

          $hasil1 = mysqli_query($koneksi,"delete from pernyataan where nip='$nip'");

          $hasil2 = mysqli_query($koneksi,"delete from formulir where nip='$nip'");

          $hasil3 = mysqli_query($koneksi,"delete from dokumen where nip='$nip'");

          $hasil4 = mysqli_query($koneksi,"delete from wawancara where nip='$nip'");

          $hasil5 = mysqli_query($koneksi,"delete from jawaban_wawancara where nip='$nip'");

          $hasil6 = mysqli_query($koneksi,"delete from ielts where nip='$nip'");

          $hasil7 = mysqli_query($koneksi,"delete from surat_perjanjian where nip='$nip'");

          echo "<script>alert('Data Berhasil diSimpan'); location.href='beranda.php';</script>";
          }
          else {
            echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='penerimabeasiswa.php';</script>";
          }
        }
        $sql_ = "SELECT A.nip , B.nama, C.ket4 ,A.status from surat_perjanjian A INNER JOIN formulir B ON B.nip=A.nip JOIN ielts C ON C.nip=b.nip WHERE A.status='Lolos'";
        $query_ = mysqli_query($koneksi,$sql_);
        ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <div align="center" style="margin-top:-8px; margin-bottom:-7px">
              <a class="btn btn-success btn-xs" style="text-align:center;" href="laporan/penerimabeasiswa.php" role="button">Cetak Laporan</a>
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
                   if ($data['status']=='Lolos') {
                      echo "Telah $data[status] ke $data_steady[univ] , $data_shine[jurusan]";
                    }
                  ?>
                </td>
                <td align="center">
                  <button type='submit' name='mulai' class='btn btn-primary btn-xs'  onclick="return confirm('<?php echo $data['nip']; ?> <?php echo $data['nama']; ?> sudah mulai belajar ?')">Mulai Belajar</button>
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
