<?php
$id = $_POST['id'];
$queryed = "SELECT * FROM pertanyaan_wawancara WHERE id_pertanyaan='$id'";
$sqled = mysqli_query($koneksi,$queryed);
$dataed = mysqli_fetch_array($sqled);
 ?>
        <form action="" method="POST">
          <div class="col-md-1"></div>
          <div class="col-md-10">
                  <div class="form-group">
                    <input type=hidden name='id' value="<?php echo $id ?>">
                    <label for="isipertanyaan">Isi Pertanyaan</label>
                    <textarea name="pertanyaan" rows="15" cols="40" class="form-control" id="isipertanyaan"><?php echo $dataed['pertanyaan']; ?></textarea>
                  </div>
                  <div align="center">
                    <button type="submit" name="ubah" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Simpan</button>
                    <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
                      Batal <span class="glyphicon glyphicon-floppy-remove"></span></a>
                  </div>
          </div>
          <div class="col-md-1"></div>
        </form>
