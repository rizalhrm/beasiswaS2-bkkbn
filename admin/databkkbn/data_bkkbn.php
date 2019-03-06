<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <h3 class="page-header">Data BKKBN</h3>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-info">
      <div class="panel-heading">
        Data BKKBN
        <a class="btn btn-default btn-md pull-right" style="margin-top:-7px;" href="tambah_databkkbn.php" role="button">
          <span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
      </div>
      <div class="panel-body">
        <?php
        if (isset($_POST['edit'])) {
        include "edit_data.php";
        }
        else {
          $querya = "SELECT * FROM data_bkkbn ORDER BY id_bkkbn ASC";
          $sqla = mysqli_query($koneksi,$querya);
        ?>
        <div class="table-responsive">
        <table align="center" class="table table-bordered table-hover data">
      		<thead>
      			<th style="text-align:center;">No.</th>
      			<th style="text-align:center;">BKKBN</th>
            <th style="text-align:center;">Alamat</th>
      			<th style="text-align:center;">Aksi</th>
      		</thead>
          <tbody>
      		<?php
      			$no = 1;
      			while ($list = mysqli_fetch_array($sqla)) {
      		?>
      		<tr>
            <form action="" method="POST">
      			<td align="center"><?php echo $no;?><input type=hidden name='id' value="<?php echo $list['id_bkkbn']; ?>"></td>
      			<td align="center"><?php echo $list['prov']; ?></td>
            	<td align="center"><?php echo $list['alamat']; ?></td>
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
  $id = $_POST['id'];

		$hasil = mysqli_query($koneksi,"delete from data_bkkbn where id_bkkbn='$id'");
		if($hasil){
      echo "<script>alert('Data Berhasil dihapus'); location.href='data_bkkbn.php';</script>";
		}
}

if (isset($_POST['ubah'])) {
  $id = $_POST ['id'];
  $prov = $_POST['prov'];
  $alamat = $_POST['alamat'];
  $queryupdate = "UPDATE data_bkkbn SET prov='$prov' , alamat='$alamat' WHERE id_bkkbn = '$id'";
  $update = mysqli_query($koneksi,$queryupdate);

  if ($update) {
  echo "<script>alert('Data Berhasil diubah'); location.href='data_bkkbn.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='data_bkkbn.php';</script>";
  }
}


} ?>
