<?php
$id = $_POST['id'];
$queryed = "SELECT * FROM universitas WHERE id_univ='$id'";
$sqled = mysqli_query($koneksi,$queryed);
$dataed = mysqli_fetch_array($sqled);
 ?>
        <form name="univv" action="" method="POST" onSubmit="return univee(this)">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="form-group">
              <input type=hidden name='id' value="<?php echo $id ?>">
              <label for="prov">Universitas</label>
              <input type="text" class="form-control" name="univ" value="<?php echo $dataed['univ']; ?>" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Nama Universitas dengan Huruf saja.');">
            </div>
            <div class="form-group">
              <label for="alamat">Negara</label>
              <input type="text" class="form-control" name="negara" value="<?php echo $dataed['negara']; ?>" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Nama Negara dengan Huruf saja.');">
            </div>
            <div class="form-group">
              <label for="alamat">Website</label>
              <input type="url" class="form-control" placeholder="URL dgn http:// atau https://" name="website" value="<?php echo $dataed['website']; ?>" required>
            </div>
            <div align="center">
              <button type="submit" name="ubah" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Simpan</button>
              <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
                Batal <span class="glyphicon glyphicon-floppy-remove"></span></a>
            </div>
          </div>
          <div class="col-md-1"></div>
        </form>
