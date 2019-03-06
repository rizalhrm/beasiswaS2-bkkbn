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
      	  <li role="presentation" class="active"><a href="ujian_ielts.php">Ujian IELTS</a></li>
          <li role="presentation"><a href="nilai_ujian.php">Nilai Ujian</a></li>
          <li role="presentation"><a href="daftarlolosielts.php">Daftar CPB Lolos Seleksi Ujian IELTS</a></li>
      	</ul>
        <br>
        <?php
        if (isset($_POST['ubah'])) {
        include "ielts/ubahstatusujian.php";
        }
        else {
        $sql_ = "SELECT * from ielts A INNER JOIN formulir B ON B.nip=A.nip WHERE A.ket2='Telah Menyelesaikan Kursus'";
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
              <?php if (empty($data['ket3'])) {
                echo "<i>Belum Mengerjakan Ujian IELTS</i>"; }
                else {
                  echo $data['ket3'];
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
if (isset($_POST['ubahstatusujian'])) {
  $nip = $_POST ['nip'];
  $keterangan3 = $_POST['keterangan3'];

  $queryupdate = "UPDATE ielts SET ket3='$keterangan3' WHERE nip = '$nip'";
  $update = mysqli_query($koneksi,$queryupdate);
  if ($update) {
  echo "<script>alert('Data Berhasil diubah'); location.href='ujian_ielts.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='ujian_ielts.php';</script>";
  }
}

} ?>
