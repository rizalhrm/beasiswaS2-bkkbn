<?php
$id = $_POST['id'];
$queryed = "SELECT * FROM unit_kerja WHERE id_uk='$id'";
$sqled = mysqli_query($koneksi,$queryed);
$dataed = mysqli_fetch_array($sqled);
 ?>
        <form name="unitk" action="" method="POST" onSubmit="return unit(this)">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="form-group">
              <input type=hidden name='id' value="<?php echo $id ?>">
              <label for="unitkerja">Unit Kerja</label>
              <input type="text" pattern="[A-Za-z ]+" class="form-control" name="unitkerja" value="<?php echo $dataed['unit_kerja']; ?>" oninvalid="alert('Masukkan Unit Kerja dengan Huruf saja.');">
            </div>
                  <div class="form-group">
                    <label for="idprov">BKKBN (Pusat/Provinsi)</label>
                    <select class="form-control" name="idprov" required>
										    <option disabled>--Pilih BKKBN--</option>
                            <?php
                          	$sqlx1=mysqli_query($koneksi,"select * from data_bkkbn WHERE id_bkkbn='$dataed[id_bkkbn]'");
                          	$rsx1=mysqli_fetch_assoc($sqlx1);
                          	$sqlh=mysqli_query($koneksi,"select * from data_bkkbn");
                          	$rsh=mysqli_fetch_assoc($sqlh);
                          	echo "<option if($rsx1[id_bkkbn] == $rsh[id_bkkbn] ) {echo \"selected\"; } hidden value='$rsx1[id_bkkbn]'>$rsx1[prov]</option>";
                          	$sqlx2=mysqli_query($koneksi,"select * from data_bkkbn");
                          	while($rsx2=mysqli_fetch_array($sqlx2)){
                          	echo "<option value='$rsx2[id_bkkbn]'>$rsx2[prov]</option>";
                          }
                          ?>
                    </select>
                  </div>
                  <div align="center">
                    <button type="submit" name="ubah" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Simpan</button>
                    <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
                      Batal <span class="glyphicon glyphicon-floppy-remove"></span></a>
                  </div>
          </div>
          <div class="col-md-1"></div>
        </form>
