<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <h3 class="page-header">Universitas Luar Negeri</h3>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-info">
      <div class="panel-heading">
        Universitas Luar Negeri
        <form class="form-horizontal" action="" method="POST">
        <button type="button" style="margin-top:-27px;" class="btn btn-default btn-md pull-right" data-toggle="modal" data-target="#ModalTambahUniv">
          <span class="glyphicon glyphicon-plus"></span> Tambah Data
        </button>
        </form>
      </div>
      <div class="panel-body">
        <?php
        if (isset($_POST['edit'])) {
        include "edit_univ.php";
        }
        else {
          $querya = "SELECT * FROM universitas ORDER BY id_univ ASC";
          $sqla = mysqli_query($koneksi,$querya);
        ?>
        <div class="table-responsive">
        <table align="center" class="table table-bordered table-hover data">
      		<thead>
      			<th style="text-align:center;">No.</th>
      			<th style="text-align:center;">Universitas</th>
            <th style="text-align:center;">Negara</th>
            <th style="text-align:center;">Website</th>
      			<th style="text-align:center;">Aksi</th>
      		</thead>
          <tbody>
      		<?php
      			$no = 1;
      			while ($list = mysqli_fetch_array($sqla)) {
      		?>
      		<tr>
            <form action="" method="POST">
      			<td align="center"><?php echo $no;?><input type=hidden name='id' value="<?php echo $list['id_univ']; ?>"></td>
      			<td align="center"><?php echo $list['univ']; ?></td>
            	<td align="center"><?php echo $list['negara']; ?></td>
              <td align="center"><?php echo $list['website']; ?></td>
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

<form name="univ" class="form-horizontal" action="" method="POST" onSubmit="return unive(this)">
  <div class="modal fade" id="ModalTambahUniv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Tambah Data Universitas Luar Negeri</h4>
		  </div>
      <div class="modal-body">
			<div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <form action="" method="POST">
          <div class="form-group">
            <label for="alamat">Universitas</label>
            <input type="text" class="form-control" name="univ" value="" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Nama Universitas dengan Huruf saja.');">
          </div>
          <div class="form-group">
            <label for="alamat">Negara</label>
            <input type="text" class="form-control" name="negara" value="" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Nama Negara dengan Huruf saja.');">
          </div>
          <div class="form-group">
            <label for="alamat">Website</label>
            <input type="url" placeholder="URL dgn http:// atau https://" class="form-control" name="website" value="" required>
          </div>
          </form>
        </div>
        <div class="col-md-1"></div>
      </div>
      </div>
      <div class="modal-footer">
      <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    </div>
  </div>
</form>

<?php
if (isset($_POST['tambah'])) {
  $univ = $_POST['univ'];
  $negara = $_POST['negara'];
  $website = $_POST['website'];
  $sqltambah = "INSERT INTO universitas VALUES ('','$univ','$negara','$website')";
  $querytambah = mysqli_query($koneksi,$sqltambah);

  if ($querytambah) {
  echo "<script>alert('Data Berhasil diSimpan'); location.href='universitas.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='universitas.php';</script>";
  }
}

if (isset($_POST['hapus'])) {
  $id = $_POST['id'];

		$hasil = mysqli_query($koneksi,"delete from universitas where id_univ='$id'");
		if($hasil){
      echo "<script>alert('Data Berhasil dihapus'); location.href='universitas.php';</script>";
		}
}

if (isset($_POST['ubah'])) {
  $id = $_POST ['id'];
  $univ = $_POST['univ'];
  $negara = $_POST['negara'];
  $website = $_POST['website'];
  $queryupdate = "UPDATE universitas SET univ='$univ' , negara='$negara' , website='$website' WHERE id_univ = '$id'";
  $update = mysqli_query($koneksi,$queryupdate);

  if ($update) {
  echo "<script>alert('Data Berhasil diubah'); location.href='universitas.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='universitas.php';</script>";
  }
}


} ?>
