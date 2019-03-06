<?php
$id = $_POST['id'];
$queryed = "SELECT * FROM data_bkkbn WHERE id_bkkbn='$id'";
$sqled = mysqli_query($koneksi,$queryed);
$dataed = mysqli_fetch_array($sqled);
 ?>
        <form name="edbk" action="" method="POST" onSubmit="return valid(this)">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="form-group">
              <input type=hidden name='id' value="<?php echo $id ?>">
              <label for="prov">BKKBN (Pusat/Provinsi)</label>
              <input type="text" pattern="[A-Za-z ]+" class="form-control" name="prov" value="<?php echo $dataed['prov']; ?>" oninvalid="alert('Masukkan BKKBN dengan Huruf saja.');">
            </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" rows="5" cols="15" class="form-control" id="alamat"><?php echo $dataed['alamat']; ?></textarea>
                  </div>
                  <div align="center">
                    <button type="submit" name="ubah" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Simpan</button>
                    <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
                      Batal <span class="glyphicon glyphicon-floppy-remove"></span></a>
                  </div>
          </div>
          <div class="col-md-1"></div>
        </form>
