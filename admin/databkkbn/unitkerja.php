<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <h3 class="page-header">Unit Kerja</h3>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-info">
      <div class="panel-heading">
        Data Unit Kerja
        <form class="form-horizontal" action="" method="POST">
        <button type="button" style="margin-top:-27px;" class="btn btn-default btn-md pull-right" data-toggle="modal" data-target="#ModalTambahUnitKerja">
          <span class="glyphicon glyphicon-plus"></span> Tambah Data
        </button>
        </form>
      </div>
      <div class="panel-body">
        <?php
        if (isset($_POST['edit'])) {
        include "edit_unitk.php";
        }
        else {
          $querya = "SELECT data_bkkbn.prov , unit_kerja.unit_kerja, unit_kerja.id_uk FROM unit_kerja, data_bkkbn WHERE unit_kerja.id_bkkbn = data_bkkbn.id_bkkbn ORDER BY id_uk ASC";
          $sqla = mysqli_query($koneksi,$querya);
        ?>
        <div class="table-responsive">
        <table align="center" class="table table-bordered table-hover data">
      		<thead>
      			<th style="text-align:center;">No.</th>
            <th style="text-align:center;">Unit Kerja</th>
      			<th style="text-align:center;">BKKBN</th>
      			<th style="text-align:center;">Aksi</th>
      		</thead>
          <tbody>
      		<?php
      			$no = 1;
      			while ($list = mysqli_fetch_array($sqla)) {
      		?>
      		<tr>
            <form action="" method="POST">
      			<td align="center"><?php echo $no;?><input type=hidden name='id' value="<?php echo $list['id_uk']; ?>"></td>
      			<td align="center"><?php echo $list['unit_kerja']; ?></td>
            <td align="center"><?php echo $list['prov']; ?></td>
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

<form name="unitk" class="form-horizontal" action="" method="POST" onSubmit="return unit(this)">
  <div class="modal fade" id="ModalTambahUnitKerja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Tambah Data Unit Kerja</h4>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <form action="" method="POST">
          <div class="form-group">
            <label for="unitkerja">Unit Kerja</label>
            <input type="text" pattern="[A-Za-z ]+" class="form-control" name="unitkerja" value="" oninvalid="alert('Masukkan Unit Kerja dengan Huruf saja.');">
          </div>
          <div class="form-group">
            <label for="idprov">BKKBN (Pusat/Provinsi)</label>
            <select class="form-control" name="idprov" required>
              <option value=''>--Pilih BKKBN--</option>
                <?php
                $sql=mysqli_query($koneksi,"select * from data_bkkbn");
                while($rs=mysqli_fetch_array($sql)){
                echo "<option value='$rs[id_bkkbn]'>$rs[prov]</option>";
                }
                ?>
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
  $idprov = $_POST['idprov'];
  $unitkerja = $_POST['unitkerja'];
  $sqltambah = "INSERT INTO unit_kerja VALUES ('','$idprov','$unitkerja')";
  $querytambah = mysqli_query($koneksi,$sqltambah);

  if ($querytambah) {
  echo "<script>alert('Data Berhasil diSimpan'); location.href='unitkerja.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='unitkerja.php';</script>";
  }
}

if (isset($_POST['hapus'])) {
  $id = $_POST['id'];

		$hasil = mysqli_query($koneksi,"delete from unit_kerja where id_uk='$id'");
		if($hasil){
      echo "<script>alert('Data Berhasil dihapus'); location.href='unitkerja.php';</script>";
		}
}

if (isset($_POST['ubah'])) {
  $id = $_POST ['id'];
  $idprov = $_POST['idprov'];
  $unitkerja = $_POST['unitkerja'];
  $queryupdate = "UPDATE unit_kerja SET id_bkkbn='$idprov' , unit_kerja='$unitkerja' WHERE id_uk = '$id'";
  $update = mysqli_query($koneksi,$queryupdate);

  if ($update) {
  echo "<script>alert('Data Berhasil diubah'); location.href='unitkerja.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='unitkerja.php';</script>";
  }
}


} ?>
