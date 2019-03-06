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
          <li role="presentation" class="active"><a href="nilai_ujian.php">Nilai Ujian</a></li>
          <li role="presentation"><a href="daftarlolosielts.php">Daftar CPB Lolos Seleksi Ujian IELTS</a></li>
      	</ul>
        <br>
        <?php
        if (isset($_POST['ubah'])) {
        include "ielts/uploadnilai.php";
        }
        else {
        $sql_ = "SELECT A.nip , B.nama, B.univ_1, B.programstudi_1, B.univ_2, B.programstudi_2, B.univ_3, B.programstudi_3, A.overall_band ,A.status_cpb AS status_ielts  from ielts A INNER JOIN formulir B ON B.nip=A.nip WHERE A.ket3='Telah Menyelesaikan Ujian'";
        $query_ = mysqli_query($koneksi,$sql_);
        ?>
        <div class="table-responsive">
        <table class="table table-bordered table-hover data" style="font-size:11px;">
          <thead>
            <tr>
              <th style="text-align:center;">No</th>
              <th style="text-align:center;">NIP</th>
              <th style="text-align:center;">Nama</th>
              <th style="text-align:center;">Pilihan Pertama</th>
              <th style="text-align:center;">Pilihan Kedua</th>
              <th style="text-align:center;">Pilihan Ketiga</th>
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
              <?php
              $steady="SELECT * FROM universitas WHERE id_univ='$data[univ_1]'";
              $query_steady=mysqli_query($koneksi,$steady);
              $data_steady=mysqli_fetch_array($query_steady);

              $shine="SELECT * FROM jurusan WHERE idj='$data[programstudi_1]'";
              $query_shine=mysqli_query($koneksi,$shine);
              $data_shine=mysqli_fetch_array($query_shine);
              echo "$data_steady[univ] , $data_shine[jurusan]";
              ?>
            </td>
            <td align="center">
              <?php
              $steady2="SELECT * FROM universitas WHERE id_univ='$data[univ_2]'";
              $query_steady2=mysqli_query($koneksi,$steady2);
              $data_steady2=mysqli_fetch_array($query_steady2);

              $shine2="SELECT * FROM jurusan WHERE idj='$data[programstudi_2]'";
              $query_shine2=mysqli_query($koneksi,$shine2);
              $data_shine2=mysqli_fetch_array($query_shine2);
              echo "$data_steady2[univ] , $data_shine2[jurusan]";
              ?>
            </td>
            <td align="center">
              <?php
              $steady3="SELECT * FROM universitas WHERE id_univ='$data[univ_3]'";
              $query_steady3=mysqli_query($koneksi,$steady3);
              $data_steady3=mysqli_fetch_array($query_steady3);

              $shine3="SELECT * FROM jurusan WHERE idj='$data[programstudi_3]'";
              $query_shine3=mysqli_query($koneksi,$shine3);
              $data_shine3=mysqli_fetch_array($query_shine3);
              echo "$data_steady3[univ] , $data_shine3[jurusan]";
              ?>
            </td>
            <td align="center">
              <?php if (empty($data['overall_band'])) {
                echo "-"; }
                else {
                  echo $data['overall_band'];
                }
              ?>
            </td>
            <td align="center">
              <?php if (empty($data['status_ielts'])) {
                echo "<i>Hasil Ujian IELTS Belum Keluar</i>"; }
                else {
                  echo $data['status_ielts'];
                }
              ?>
            </td>
            <td align="center">
              <button type='submit' name='ubah' class='btn btn-success btn-xs'>
                <span class="glyphicon glyphicon-upload"></span> Upload Nilai</button>
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
if (isset($_POST['uploadnilai'])) {
  $nip = $_POST ['nip'];
  $overall = $_POST['overall'];

  $file= $_FILES['file']['name'];
  $lokasi= "../file/ielts/"."Hasil_Ujian_IELTS_".$nip."_".basename($file);
  $name_file = "Hasil_Ujian_IELTS_".$nip."_".basename($file);
  if($name_file){
  copy($_FILES['file']['tmp_name'],$lokasi);
  }

  $sql_n = "SELECT B.programstudi_1, B.programstudi_2, B.programstudi_3 FROM ielts A INNER JOIN formulir B ON B.nip=A.nip WHERE A.ket3='Telah Menyelesaikan Ujian' AND A.nip='$nip'";
  $query_n = mysqli_query($koneksi,$sql_n);
  $data_n = mysqli_fetch_array($query_n);
  $jurs1=$data_n['programstudi_1'];
  $jurs2=$data_n['programstudi_2'];
  $jurs3=$data_n['programstudi_3'];

  $jurusan="SELECT * FROM jurusan WHERE idj='$jurs1'";
  $query_j = mysqli_query($koneksi,$jurusan);
  $data_j = mysqli_fetch_array($query_j);
  $jursn1=$data_j['ielts'];

  $jurusan2="SELECT * FROM jurusan WHERE idj='$jurs2'";
  $query_j2 = mysqli_query($koneksi,$jurusan2);
  $data_j2 = mysqli_fetch_array($query_j2);
  $jursn2=$data_j2['ielts'];

  $jurusan3="SELECT * FROM jurusan WHERE idj='$jurs3'";
  $query_j3 = mysqli_query($koneksi,$jurusan3);
  $data_j3 = mysqli_fetch_array($query_j3);
  $jursn3=$data_j3['ielts'];

  if ($overall >= $jursn1) {
    $status_ielts='Lolos';
    $ket4=$data_j['idj'];
  }
  elseif($overall >= $jursn2) {
    $status_ielts='Lolos';
    $ket4=$data_j2['idj'];
  }
  elseif ($overall >= $jursn3) {
    $status_ielts='Lolos';
    $ket4=$data_j3['idj'];
  }
  else {
    $status_ielts='Tidak Lolos';
    $ket4=0;
  }

  $queryup="UPDATE ielts SET overall_band='$overall' , test_report='$name_file' , status_cpb='$status_ielts' ,ket4='$ket4' WHERE nip='$nip'";
  $simpanup=mysqli_query($koneksi,$queryup);
  if ($simpanup) {
    echo "<script>alert('Upload Hasil Ujian IELTS Berhasil'); location.href='nilai_ujian.php';</script>";
  }
   else{
   echo "<script>alert('Upload file gagal'); location.href='nilai_ujian.php';</script>";
   }
}

} ?>
