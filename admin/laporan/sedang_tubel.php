<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <h4 class="page-header">Daftar Karyawan Sedang Tugas Belajar S2 Luar Negeri</h4>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-info">
      <div class="panel-body">
        <?php
        if (isset($_POST['selesai'])) {
        include "selesaibelajar.php";
        }
        elseif (isset($_POST['detail'])) {
        include "detailtubel.php";
        }
        else {
          $querya = "SELECT * FROM tubel ORDER BY nip ASC";
          $sqla = mysqli_query($koneksi,$querya);
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
              <div align="center" style="margin-top:-8px; margin-bottom:-7px">
                <a class="btn btn-success btn-xs" style="text-align:center;" href="laporan/cetak/tubel.php" role="button">Cetak Laporan</a>
              </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <div class="table-responsive">
              <table align="center" class="table table-bordered table-hover data" style="font-size:11px;">
            		<thead>
            			<th style="text-align:center;">No.</th>
            			<th style="text-align:center;">NIP</th>
            			<th style="text-align:center;">Nama</th>
            			<th style="text-align:center;">Email</th>
                  <th style="text-align:center;">Jurusan</th>
                  <th style="text-align:center;">Universitas</th>
                  <th style="text-align:center;">Unit Kerja</th>
                  <th style="text-align:center;">Mulai</th>
                  <th style="text-align:center;">Surat Perjanjian</th>
            			<th style="text-align:center;">Aksi</th>
            		</thead>
                <tbody>
            		<?php
            			$no = 1;
            			while ($list = mysqli_fetch_array($sqla)) {
            		?>
            		<tr>
                  <form action="" method="POST">
            			<td align="center"><?php echo $no;?></td>
                  <td align="center"><input type="hidden" name="nip" value="<?php echo "$list[nip]"; ?>">
                  <?php echo $list['nip']; ?></td>
                  <td align="center">
            				<?php echo $list['nama']; ?>
            			</td>
            			<td align="center">
            				<?php echo $list['email']; ?>
            			</td>
                  <td align="center">
            				<?php echo $list['jurusan']; ?>
            			</td>
                  <td align="center">
            				<?php echo $list['univ']; ?>
            			</td>
                  <td align="center">
            				<?php echo $list['unit_kerja']; ?>
            			</td>
                  <td align="center">
            				<?php echo $list['mulai']; ?>
            			</td>
                  <td align="center">
                    <a class="btn btn-info btn-xs" role="button" href="laporan/lihatdokumen.php?namafile=<?php echo $list['perjanjian']; ?>" target=\"_blank\">
                    <span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
            			</td>
                  <td align="center">
                    <button type='submit' name='selesai' class='btn btn-primary btn-xs'>Selesai</button>
                    <hr style="margin-top:0px; margin-bottom: 0px;">
                    <button type='submit' name='detail' class='btn btn-default btn-xs'>Detail</button>
            			</td>
                  </form>
            		</tr>
            		<?php
            			$no +=1;
            			}
            		?>
              </tbody>
            	</table>
              </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_POST['simpaaan'])) {
  $id = $_POST['id'];
  $nip = $_POST['nip'];
  $ket= $_POST['ket'];
  $selesai= $_POST['selesai'];
  $gelar = $_POST['gelar'];

  $formulir = "SELECT * FROM tubel WHERE nip = '$nip'";
  $queryformulir = mysqli_query($koneksi,$formulir);
  $dataform = mysqli_fetch_array($queryformulir);
  $mulai=$dataform['mulai'];
  $nama=$dataform['nama'];
  $jurusan=$dataform['jurusan'];
  $univ=$dataform['univ'];
  $unit_kerja=$dataform['unit_kerja'];
  $sponsor=$dataform['pembiayaan'];

  $sqltambah = "INSERT INTO alumni VALUES ('$id','$nama','$nip','$unit_kerja','$jurusan','$univ','$gelar','$mulai','$selesai','$sponsor','$ket')";
  $querytambah = mysqli_query($koneksi,$sqltambah);

  $updatependidikan = "UPDATE user SET pend_terakhir='S2' WHERE nip = '$nip'";
  $updateterakhir = mysqli_query($koneksi,$updatependidikan);

  if ($querytambah && $updateterakhir) {
  $hasil1 = mysqli_query($koneksi,"delete from tubel where nip='$nip'");
  echo "<script>alert('Data Berhasil diSimpan'); location.href='sedang_tubel.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='sedang_tubel.php';</script>";
  }
}

} ?>
