<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <h3 class="page-header">Jadwal Kegiatan</h3>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <br>
        <?php
        if (isset($_POST['simpan'])) {
          $judul = $_POST['judul'];
          $isi = $_POST['isi'];
          $updatea = "UPDATE informasi SET judul='$judul' , isi='$isi' where id='3'";
          $queryupdatea = mysqli_query($koneksi, $updatea);

          if ($queryupdatea) {
            echo "<script>alert('Data Berhasil Diubah'); location.href='jadwal_kegiatan.php';</script>";
          }
          else {
            echo "<div class=\"alert alert-danger alert-dismissable\">
                  <i class='glyphicon glyphicon-alert'></i> Data Gagal Diubah.
                  </div>";
          }
        }
        $syarat = "select * from informasi where id = '3'";
        $querysyarat = mysqli_query($koneksi,$syarat);
        $isi = mysqli_fetch_array($querysyarat);
        ?>
        <form class="form-horizontal" method="post" action="">
          <div class="form-group">
            <label for="judul" class="col-sm-2 control-label">Judul</label>
            <div class="col-sm-9">
              <input type="text" name="judul" class="form-control" id="judul" value="<?php echo $isi['judul']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="isi" class="col-sm-2 control-label">Isi</label>
            <div class="col-sm-9">
              <textarea name="isi" rows="15" cols="40" class="form-control" id="isi"><?php echo $isi['isi']; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-9">
              <input type="submit" class="btn btn-primary" name="simpan" value="Ubah">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>
