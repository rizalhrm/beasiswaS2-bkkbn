<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='../login.php';</script>";
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
        Tambah Data BKKBN
        <a class="btn btn-warning btn-md pull-right" style="margin-top:-7px;" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
          Kembali <span class="glyphicon glyphicon-circle-arrow-left"></span></a>
      </div>
      <div class="panel-body">
        <form name="edbk" class="form-horizontal" action="" method="POST" onSubmit="return valid(this)">
        			  <div class="col-md-1"></div>
        			  <div class="col-md-10">
                  <div class="form-group">
                    <label for="alamat">BKKBN (Pusat/Provinsi)</label>
                    <input type="text" pattern="[A-Za-z ]+" class="form-control" name="prov" value="" oninvalid="alert('Masukkan BKKBN dengan Huruf saja.');">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" rows="5" cols="15" class="form-control" id="alamat" required></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="tambah" class="btn btn-primary"><span class="glyphicon glyphicon-floppy"></span> Simpan</button>
                  </div>
        			  </div>
        			  <div class="col-md-1"></div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_POST['tambah'])) {
  $prov = $_POST['prov'];
  $alamat = $_POST['alamat'];
  $sqltambah = "INSERT INTO data_bkkbn VALUES ('','$prov','$alamat')";
  $querytambah = mysqli_query($koneksi,$sqltambah);

  if ($querytambah) {
  echo "<script>alert('Data Berhasil diSimpan'); location.href='data_bkkbn.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='data_bkkbn.php';</script>";
  }
}

} ?>
