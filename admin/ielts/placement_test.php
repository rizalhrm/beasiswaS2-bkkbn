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
      	  <li role="presentation" class="active"><a href="placement_test.php">Placement Test</a></li>
      	  <li role="presentation"><a href="kursus_ielts.php">Kursus IELTS</a></li>
      	  <li role="presentation"><a href="ujian_ielts.php">Ujian IELTS</a></li>
          <li role="presentation"><a href="nilai_ujian.php">Nilai Ujian</a></li>
          <li role="presentation"><a href="daftarlolosielts.php">Daftar CPB Lolos Seleksi Ujian IELTS</a></li>
      	</ul>
        <br>
        <?php
        if (isset($_POST['ubah'])) {
        include "ielts/ubahplacement.php";
        }
        elseif (isset($_POST['place'])) {
        include "ielts/ubahket.php";
        }
        elseif (isset($_POST['detail'])) {
        include "ielts/detailplacement.php";
        }
        else {
        $sql_ = "SELECT * from ielts A INNER JOIN formulir B ON B.nip=A.nip";
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
              <th style="text-align:center;">Pengumuman</th>
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
                <input type="hidden" name="pengumuman" value="<?php echo $data['nip']; ?>">
                <button type="submit" name='detail' class="btn btn-default btn-xs">
                  <span class="glyphicon glyphicon-eye-open"></span> Detail
                </button>
            </td>
            <td align="center">
              <?php if (empty($data['ket'])) {
                echo "Belum Mengikuti Placement Test"; }
                else {
                  echo $data['ket'];
                }
              ?>
            </td>
            <td align="center">
              <button type='submit' name='ubah' class='btn btn-success btn-xs'>
                <span class="glyphicon glyphicon-pencil"></span> Ubah Pengumuman</button>
              <hr style="margin-top:0px; margin-bottom: 0px;">
              <?php if (empty($data['ket2'])) { ?>
              <button type='submit' name='place' class='btn btn-info btn-xs'>
                <span class="glyphicon glyphicon-ok"></span> Telah Mengikuti Placement</button>
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
if (isset($_POST['ubahpengumuman'])) {
  $id_nip = $_POST ['nip'];
  $pengumuman = $_POST['pengumuman'];

  $queryupdate = "UPDATE ielts SET placement='$pengumuman' WHERE nip = '$id_nip'";
  $update = mysqli_query($koneksi,$queryupdate);
  if ($update) {
  echo "<script>alert('Data Berhasil diubah'); location.href='placement_test.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='placement_test.php';</script>";
  }
}

elseif (isset($_POST['ubahket'])) {
  $id_nip = $_POST ['nip'];
  $keterangan = $_POST['keterangan'];

  $queryupdate = "UPDATE ielts SET ket='$keterangan' WHERE nip = '$id_nip'";
  $update = mysqli_query($koneksi,$queryupdate);
  if ($update) {
  echo "<script>alert('Data Berhasil diubah'); location.href='placement_test.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='placement_test.php';</script>";
  }
}

} ?>
