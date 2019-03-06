<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <h3 class="page-header">Download</h3>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-info">
      <div class="panel-heading">
        Data File Download
        <form class="form-horizontal" action="" method="POST">
        <button type="button" style="margin-top:-27px;" class="btn btn-default btn-md pull-right" data-toggle="modal" data-target="#ModalTambahDownload">
          <span class="glyphicon glyphicon-plus"></span> Tambah Data
        </button>
        </form>
      </div>
      <div class="panel-body">
        <?php
        if (isset($_POST['edit'])) {
        include "atribut/edit_download.php";
        }
        else {
          $querya = "SELECT * FROM download ORDER BY id_download ASC";
          $sqla = mysqli_query($koneksi,$querya);
        ?>
        <div class="table-responsive">
        <table align="center" class="table table-bordered table-hover data">
      		<thead>
      			<th style="text-align:center;">No.</th>
      			<th style="text-align:center;">Judul</th>
      			<th style="text-align:center;">File</th>
            <th style="text-align:center;">Status</th>
      			<th style="text-align:center;">Pilihan</th>
      		</thead>
          <tbody>
      		<?php
      			$no = 1;
      			while ($list = mysqli_fetch_array($sqla)) {
      		?>
      		<tr>
            <form action="" method="POST">
      			<td align="center"><?php echo $no;?><input type=hidden name='id' value="<?php echo $list['id_download']; ?>"></td>
      			<td align="center"><input type=hidden name='judul' value="<?php echo $list['judul']; ?>">
      				<?php echo $list['judul']; ?>
      			</td>
      			<td align="center"><input type=hidden name='file' value="<?php echo $list['file']; ?>">
      				<?php echo "<a href=\"../download/$list[file]\" download>$list[file]</a>"; ?>
      			</td>
            <td align="center">
      				<?php echo "$list[status]"; ?>
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

<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data"
 onsubmit="if (eval(ukurandownload)>2) { alert('Ukuran File ' + ukuran + ' MB Melebihi Batas yaitu 2 MB.'); return false; }">
	<div class="modal fade" id="ModalTambahDownload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Tambah Data File Download</h4>
		  </div>
		  <div class="modal-body">
			<div class="row">
			  <div class="col-md-1"></div>
			  <div class="col-md-10">
				<form action="" method="POST">
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" name="judul" value="" required>
          </div>
          <div class="form-group">
            <label for="file">File</label>
            <input id="file" type="file" name='file' required>
          </div>
          <div class="form-group">
            <label for="file">Status</label>
            <select class="form-control" name="status" required>
             <option value=''>--Pilih Status--</option>
             <option value="Publik">Publik</option>
             <option value="Rahasia">Rahasia</option>
            </select>
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
  $number = "SELECT id_download from download ORDER BY id_download DESC LIMIT 1";
  $querynum = mysqli_query($koneksi, $number);
  $urut_number = mysqli_fetch_array($querynum);
  $urutanum = substr($urut_number[0],0);
  $idnum = $urutanum + 1;

  $judul = $_POST['judul'];
  $status = $_POST['status'];
  $file = $_FILES['file']['name'];
  $sqltambah = "INSERT INTO download VALUES ('$idnum','$judul','','$status')";
  $querytambah = mysqli_query($koneksi,$sqltambah);
  if (!empty($file)) {
    $lokasi = "../download/".$file;
    if ($file)
    {copy($_FILES['file']['tmp_name'],$lokasi);}
    $queryfiles="UPDATE download SET file='$file' WHERE id_download='$idnum'";
    $updatefiles=mysqli_query($koneksi,$queryfiles);
  }
  if ($querytambah) {
  echo "<script>alert('Data Berhasil diSimpan'); location.href='download.php';</script>";
  }
  elseif ($querytambah && $updatefiles) {
    echo "<script>alert('Data Berhasil diSimpan'); location.href='download.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='download.php';</script>";
  }
}

if (isset($_POST['hapus'])) {
  $id = $_POST['id'];

		$hasil = mysqli_query($koneksi,"delete from download where id_download='$id'");
		if($hasil){
      echo "<script>alert('Data Berhasil dihapus'); location.href='download.php';</script>";
		}
}

if (isset($_POST['ubah'])) {
  $id = $_POST ['id'];
  $judul = $_POST['judul'];
  $status = $_POST['status'];
  $file = $_FILES['file']['name'];
  $queryupdate = "UPDATE download SET judul='$judul' , status='$status' WHERE id_download = '$id'";
  $updatedownload = mysqli_query($koneksi,$queryupdate);
  if (!empty($file)) {
    $lokasi2 = "../download/".$file;
    if ($file)
    {copy($_FILES['file']['tmp_name'],$lokasi2);}
    $queryfiles2="UPDATE download SET file='$file' WHERE id_download='$id'";
    $updatefiles2=mysqli_query($koneksi,$queryfiles2);
  }
  if ($updatedownload) {
  echo "<script>alert('Data Berhasil diubah'); location.href='download.php';</script>";
  }
  elseif ($queryfiles2 && $updatefiles2) {
    echo "<script>alert('Data Berhasil diubah'); location.href='download.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='download.php';</script>";
  }
}


} ?>
