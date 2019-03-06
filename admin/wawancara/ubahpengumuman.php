<?php
$id = $_POST['nip'];
$queryed = "SELECT * FROM wawancara WHERE nip='$id'";
$sqled = mysqli_query($koneksi,$queryed);
$dataed = mysqli_fetch_array($sqled);
 ?>
        <form class="form-horizontal" action="" method="POST">
          <div class="form-group">
            <label for="pengumuman" class="col-sm-2 control-label">Isi Pengumuman</label>
            <div class="col-sm-9">
            <input type=hidden name='nip' value="<?php echo $id ?>">
            <textarea name="pengumuman" rows="25" cols="40" class="form-control" id="pengumuman"><?php echo $dataed['pengumuman']; ?></textarea>
            </div>
          </div>
          <div class="form-group" align="center">
            <div class="col-sm-offset-2 col-sm-9">
            <button type="submit" name="ubahpengumuman" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Ubah Pengumuman</button>
            <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
              Batal <span class="glyphicon glyphicon-floppy-remove"></span></a>
            </div>
          </div>
        </form>
