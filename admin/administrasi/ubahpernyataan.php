<?php
$id = $_POST['nip'];
$queryed = "SELECT * FROM pernyataan WHERE nip='$id'";
$sqled = mysqli_query($koneksi,$queryed);
$dataed = mysqli_fetch_array($sqled);
$status = $dataed['status_cpb'];
 ?>
        <form class="form-horizontal" action="" method="POST">
          <div class="form-group">
            <label for="status" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-8">
            <input type=hidden name='nip2' value="<?php echo $id ?>">

            <?php
            if (empty($status)) {
             ?>
            <select class="form-control" name="status">
             <option disabled>--Pilih Status--</option>
             <option value="Lolos">Lolos</option>
             <option value="Tidak Lolos">Tidak Lolos</option>
            </select>
            <?php } else { ?>

            <select class="form-control" name="status">
            <?php

            echo "<option if($status == 'Lolos' || 'Tidak Lolos') {echo \"selected\"; } hidden value='$status'>$status</option>";

             ?>
             <option disabled>--Pilih Status--</option>
             <option value="Lolos">Lolos</option>
             <option value="Tidak Lolos">Tidak Lolos</option>
           </select>
           <?php } ?>
          </div>
          </div>
          <div class="form-group" align="center">
            <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" name="ubahstatus" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Ubah Status</button>
            <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
              Batal <span class="glyphicon glyphicon-floppy-remove"></span></a>
            </div>
          </div>
        </form>
