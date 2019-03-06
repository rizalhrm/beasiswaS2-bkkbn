<?php
$id = $_POST['nip'];
$queryed = "SELECT * FROM user WHERE nip='$id'";
$sqled = mysqli_query($koneksi,$queryed);
$dataed = mysqli_fetch_array($sqled);
$jenjang = $dataed['pend_terakhir'];
 ?>
        <form name="ubahkaryawan" action="" method="POST" onSubmit="return val(this)">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type=hidden name='nip' value="<?php echo $id ?>">
                    <input type="text" class="form-control" name="nama" value="<?php echo $dataed['nama']; ?>" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Nama dengan Huruf saja.');">
                  </div>
                  <div class="form-group">
                    <label for="pend_terakhir">Pendidikan Terakhir</label>
                    <select class="form-control" name="pend_terakhir">
            <?php

            echo "<option if($jenjang == 'D3' || 'S1' || 'S1 (Kuliah S2)' || 'S2' || 'S3' ) {echo \"selected\"; } hidden value='$jenjang'>$jenjang</option>";

             ?>
             <option disabled>-- Pilih Jenjang Pendidikan --</option>
             <option value="D3">D3</option>
             <option value="S1">S1</option>
             <option value="S1 (Kuliah S2)">S1 (Kuliah S2)</option>
             <option Value="S2">S2</option>
             <option Value="S3">S3</option>

           </select>
                  </div>
                  <div align="center">
                    <button type="submit" name="ubah" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Simpan</button>
                    <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
                      Batal <span class="glyphicon glyphicon-floppy-remove"></span></a>
                  </div>
        </form>
