<?php
$id = $_POST['id'];
$queryed = "SELECT * FROM jurusan WHERE idj='$id'";
$sqled = mysqli_query($koneksi,$queryed);
$dataed = mysqli_fetch_array($sqled);
 ?>
        <form name="ditjurusan" action="" method="POST" onSubmit="return valjurdit(this)">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="form-group">
              <input type=hidden name='id' value="<?php echo $id ?>">
              <label for="unitkerja">Jurusan</label>
              <input type="text" class="form-control" name="jurusan" value="<?php echo $dataed['jurusan']; ?>" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Jurusan dengan Huruf saja.');">
            </div>
            <div class="form-group">
              <label for="idprov">Universitas</label>
              <select class="form-control" name="univ" required>
							    <option disabled>--Pilih Universitas--</option>
                      <?php
                    	$sqlx1=mysqli_query($koneksi,"select * from universitas WHERE id_univ='$dataed[id_univ]'");
                    	$rsx1=mysqli_fetch_assoc($sqlx1);
                    	$sqlh=mysqli_query($koneksi,"select * from universitas");
                    	$rsh=mysqli_fetch_assoc($sqlh);
                    	echo "<option if($rsx1[id_univ] == $rsh[id_univ] ) {echo \"selected\"; } hidden value='$rsx1[id_univ]'>$rsx1[univ]</option>";
                    	$sqlx2=mysqli_query($koneksi,"select * from universitas");
                    	while($rsx2=mysqli_fetch_array($sqlx2)){
                    	echo "<option value='$rsx2[id_univ]'>$rsx2[univ]</option>";
                    }
                    ?>
              </select>
            </div>
            <div class="form-group">
              <label for="unitkerja">IELTS (Overall Band)</label>
              <input type="number" class="form-control" name="ielts" min=0 step='.1' value="<?php echo $dataed['ielts']; ?>" max="9.9" required>
            </div>
            <div align="center">
              <button type="submit" name="ubah" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Simpan</button>
              <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
                Batal <span class="glyphicon glyphicon-floppy-remove"></span></a>
            </div>
          </div>
          <div class="col-md-1"></div>
        </form>
