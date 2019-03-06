<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <h3 class="page-header">Jurusan</h3>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-info">
      <div class="panel-heading">
        Jurusan-jurusan Universitas Luar Negeri yang ditawarkan.
        <form class="form-horizontal" action="" method="POST">
        <button type="button" style="margin-top:-27px;" class="btn btn-default btn-md pull-right" data-toggle="modal" data-target="#ModalTambahJurusan">
          <span class="glyphicon glyphicon-plus"></span> Tambah Data
        </button>
        </form>
      </div>
      <div class="panel-body">
        <?php
        if (isset($_POST['edit'])) {
        include "edit_jurusan.php";
        }
        else {
          $querya = "SELECT universitas.univ , jurusan.id_univ AS kampus, jurusan.jurusan,jurusan.ielts, jurusan.idj FROM jurusan, universitas WHERE jurusan.id_univ = universitas.id_univ ORDER BY idj ASC";
          $sqla = mysqli_query($koneksi,$querya);
        ?>
        <div class="table-responsive">
        <table align="center" class="table table-bordered table-hover data">
      		<thead>
      			<th style="text-align:center;">No.</th>
            <th style="text-align:center;">Universitas</th>
      			<th style="text-align:center;">Jurusan</th>
            <th style="text-align:center;">IELTS (Overall Band)</th>
      			<th style="text-align:center;">Aksi</th>
      		</thead>
          <tbody>
      		<?php
      			$no = 1;
      			while ($list = mysqli_fetch_array($sqla)) {
      		?>
      		<tr>
            <form action="" method="POST">
      			<td align="center"><?php echo $no;?><input type=hidden name='id' value="<?php echo $list['idj']; ?>"></td>
      			<td align="center"><?php echo $list['univ']; ?></td>
            <td align="center"><?php echo $list['jurusan']; ?></td>
            <td align="center"><?php echo $list['ielts']; ?></td>
            <td align="center">
              <button type='submit' name='edit' class='btn btn-success btn-sm'>
                <span class="glyphicon glyphicon-pencil"></span> Edit</button>
              <hr style="margin-top:0px; margin-bottom: 0px;">
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

<form name="jurusan" class="form-horizontal" action="" method="POST" onSubmit="return valjur(this)">
  <div class="modal fade" id="ModalTambahJurusan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Tambah Data Jurusan</h4>
		  </div>
      <div class="modal-body">
			<div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <form action="" method="POST">
          <div class="form-group">
            <label for="unitkerja">Jurusan</label>
            <input type="text" class="form-control" name="jurusan" value="" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Jurusan dengan Huruf saja.');">
          </div>
          <div class="form-group">
            <label for="idprov">Universitas</label>
            <select class="form-control" name="univ" required>
              <option value=''>--Pilih Universitas--</option>
                <?php
                $sql=mysqli_query($koneksi,"select * from universitas");
                while($rs=mysqli_fetch_array($sql)){
                echo "<option value='$rs[id_univ]'>$rs[univ]</option>";
                }
                ?>
              </select>
          </div>
          <div class="form-group">
            <label for="unitkerja">IELTS (Overall Band)</label>
            <input type="number" class="form-control" name="ielts" min=0 step='.1' value="" max="9.9" value="" required>
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
  $jurusan = $_POST['jurusan'];
  $ielts = $_POST['ielts'];
  $sqltambah = "INSERT INTO jurusan VALUES ('','$univ','$jurusan','$ielts')";
  $querytambah = mysqli_query($koneksi,$sqltambah);

  if ($querytambah) {
  echo "<script>alert('Data Berhasil diSimpan'); location.href='jurusan.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='jurusan.php';</script>";
  }
}

if (isset($_POST['hapus'])) {
  $id = $_POST['id'];

		$hasil = mysqli_query($koneksi,"delete from jurusan where idj='$id'");
		if($hasil){
      echo "<script>alert('Data Berhasil dihapus'); location.href='jurusan.php';</script>";
		}
}

if (isset($_POST['ubah'])) {
  $id = $_POST ['id'];
  $univ = $_POST['univ'];
  $jurusan = $_POST['jurusan'];
  $ielts = $_POST['ielts'];
  $queryupdate = "UPDATE jurusan SET jurusan='$jurusan' , id_univ='$univ' , ielts='$ielts' WHERE idj = '$id'";
  $update = mysqli_query($koneksi,$queryupdate);

  if ($update) {
  echo "<script>alert('Data Berhasil diubah'); location.href='jurusan.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='jurusan.php';</script>";
  }
}


} ?>
