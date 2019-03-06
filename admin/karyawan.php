<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <h3 class="page-header">Karyawan (User)</h3>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-info">
      <div class="panel-heading">
        Data Karyawan (User)
        <a class="btn btn-default btn-md pull-right" style="margin-top:-7px;" href="tambah_karyawan.php" role="button">
          <span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
      </div>
      <div class="panel-body">
        <?php
        if (isset($_POST['edit'])) {
        include "atribut/edit_karyawan.php";
        }
        else {
          $querya = "SELECT * FROM user ORDER BY nip ASC";
          $sqla = mysqli_query($koneksi,$querya);
        ?>
        <div class="table-responsive">
        <table align="center" class="table table-bordered table-hover data">
      		<thead>
      			<th style="text-align:center;">No.</th>
      			<th style="text-align:center;">NIP</th>
      			<th style="text-align:center;">Nama</th>
            <th style="text-align:center;">Pendidikan Terakhir</th>
      			<th style="text-align:center;">Pilihan</th>
      		</thead>
          <tbody>
      		<?php
      			$no = 1;
      			while ($list = mysqli_fetch_array($sqla)) {
      		?>
      		<tr>
            <form action="" method="POST">
      			<td align="center"><?php echo $no;?><input type=hidden name='nip' value="<?php echo $list['nip']; ?>"></td>
            <td align="center"><?php echo $list['nip']; ?></td>
      			<td align="center"><input type='hidden' name='nama' value="<?php echo $list['nama']; ?>">
      				<?php echo $list['nama']; ?>
      			</td>
      			<td align="center"><input type=hidden name='pend_terakhir' value="<?php echo $list['pend_terakhir']; ?>">
      				<?php echo $list['pend_terakhir']; ?>
      			</td>
            <td align="center">
              <button type='submit' name='edit' class='btn btn-success btn-sm'>
                <span class="glyphicon glyphicon-pencil"></span> Edit</button>
              <button type='submit' onclick="return confirm('Yakin akan menghapus data ini?');" name='hapus' class='btn btn-danger btn-sm'>
                <span class="glyphicon glyphicon-trash"></span> Hapus</button>
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
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_POST['hapus'])) {
  $id = $_POST['nip'];

		$hasil = mysqli_query($koneksi,"DELETE FROM user WHERE nip='$id'");
		if($hasil){
      echo "<script>alert('Data Berhasil dihapus'); location.href='karyawan.php';</script>";
		}
}

if (isset($_POST['ubah'])) {
  $id = $_POST ['nip'];
  $judul = $_POST['nama'];
  $pend_terakhir = $_POST['pend_terakhir'];

  $queryupdate = "UPDATE user SET nama='$judul' , pend_terakhir='$pend_terakhir' WHERE nip = '$id'";
  $update = mysqli_query($koneksi,$queryupdate);
  if ($update) {
  echo "<script>alert('Data Berhasil diubah'); location.href='karyawan.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='karyawan.php';</script>";
  }
}


} ?>
