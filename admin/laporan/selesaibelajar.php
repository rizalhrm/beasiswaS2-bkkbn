<?php
$nip = $_POST['nip'];
$queryed = "SELECT * FROM tubel WHERE nip='$nip'";
$sqled = mysqli_query($koneksi,$queryed);
$dataed = mysqli_fetch_array($sqled);
$selesai = $dataed['mulai']+2;
$number = "SELECT id from alumni ORDER BY id DESC LIMIT 1";
$querynum = mysqli_query($koneksi, $number);
$urut_number = mysqli_fetch_array($querynum);
$urutanum = substr($urut_number[0],0);
$idnum = $urutanum + 1;
 ?>
        <form class="form-horizontal" action="" method="POST">
          <input type=hidden name='nip' value="<?php echo $nip; ?>">
          <input type=hidden name='id' value="<?php echo $idnum; ?>">

          <div class="form-group">
            <label for="status" class="col-sm-2 control-label">Tahun Selesai</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" pattern="[0-9]{4}" name="selesai" value="<?php echo $selesai; ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label for="status" class="col-sm-2 control-label">Gelar</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" maxlength="5" name="gelar" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="status" class="col-sm-2 control-label">Keterangan</label>
            <div class="col-sm-8">
            <textarea name="ket" rows="8" cols="40"></textarea>
            </div>
          </div>
          <div class="form-group" align="center">
            <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" name="simpaaan" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Simpan</button>
            <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
              Batal <span class="glyphicon glyphicon-floppy-remove"></span></a>
            </div>
          </div>
        </form>
