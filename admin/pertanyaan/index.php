<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <h3 class="page-header">Pertanyaan Wawancara</h3>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-info">
      <div class="panel-heading">
        Data Pertanyaan Wawancara
        <a class="btn btn-default btn-md pull-right" style="margin-top:-7px;" href="tambah_pertanyaan.php" role="button">
          <span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
      </div>
      <div class="panel-body">
        <?php
        if (isset($_POST['edit'])) {
        include "edit_pertanyaan.php";
        }
        else {
          $querya = "SELECT * FROM pertanyaan_wawancara ORDER BY id_pertanyaan ASC";
          $sqla = mysqli_query($koneksi,$querya);
        ?>
        <div class="table-responsive">
        <table align="center" class="table table-bordered table-hover data">
      		<thead>
      			<th style="text-align:center;">No.</th>
      			<th style="text-align:center;">Pertanyaan</th>
      			<th style="text-align:center;">Aksi</th>
      		</thead>
          <tbody>
      		<?php
      			$no = 1;
      			while ($list = mysqli_fetch_array($sqla)) {
      		?>
      		<tr>
            <form action="" method="POST">
      			<td align="center"><?php echo $no;?><input type=hidden name='id' value="<?php echo $list['id_pertanyaan']; ?>"></td>
      			<td align="center"><?php echo $list['pertanyaan']; ?></td>
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


<?php
if (isset($_POST['hapus'])) {
  $id = $_POST['id'];

		$hasil = mysqli_query($koneksi,"delete from pertanyaan_wawancara where id_pertanyaan='$id'");
		if($hasil){
      echo "<script>alert('Data Berhasil dihapus'); location.href='pertanyaan.php';</script>";
		}
}

if (isset($_POST['ubah'])) {
  $id = $_POST ['id'];
  $pertanyaan = $_POST['pertanyaan'];
  $queryupdate = "UPDATE pertanyaan_wawancara SET pertanyaan='$pertanyaan' WHERE id_pertanyaan = '$id'";
  $update = mysqli_query($koneksi,$queryupdate);

  if ($update) {
  echo "<script>alert('Data Berhasil diubah'); location.href='pertanyaan.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='pertanyaan.php';</script>";
  }
}


} ?>
