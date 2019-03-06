<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='../login.php';</script>";
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
        <a class="btn btn-warning btn-md pull-right" style="margin-top:-7px;" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
          Kembali <span class="glyphicon glyphicon-circle-arrow-left"></span></a>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="" method="POST">
        			  <div class="col-md-1"></div>
        			  <div class="col-md-10">
                  <div class="form-group">
                    <label for="isipertanyaan">Isi Pertanyaan</label>
                    <textarea name="pertanyaan" rows="15" cols="40" class="form-control" id="isipertanyaan"></textarea>
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
  $pertanyaan = $_POST['pertanyaan'];
  $sqltambah = "INSERT INTO pertanyaan_wawancara VALUES ('','$pertanyaan')";
  $querytambah = mysqli_query($koneksi,$sqltambah);

  if ($querytambah) {
  echo "<script>alert('Data Berhasil diSimpan'); location.href='pertanyaan.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='pertanyaan.php';</script>";
  }
}

} ?>
