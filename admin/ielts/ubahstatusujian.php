<?php
$idcpb = $_POST['nip'];
$queryed = "SELECT * FROM ielts WHERE nip='$idcpb'";
$sqled = mysqli_query($koneksi,$queryed);
$dataed = mysqli_fetch_array($sqled);
$ket = $dataed['ket3'];
 ?>
        <form class="form-horizontal" action="" method="POST">
          <div class="form-group">
            <label for="status" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-8">
            <input type=hidden name='nip' value="<?php echo $idcpb ?>">

            <?php
            if (empty($ket)) {
             ?>
            <select class="form-control" name="keterangan3">
             <option disabled>--Pilih Status--</option>
             <option value="Telah Menyelesaikan Ujian">Telah Menyelesaikan Ujian</option>
             <option value="Tidak Menyelesaikan Ujian">Tidak Menyelesaikan Ujian</option>
            </select>
            <?php } else { ?>

            <select class="form-control" name="keterangan3">
            <?php

            echo "<option if($ket == 'Telah Menyelesaikan Ujian' || 'Tidak Menyelesaikan Ujian') {echo \"selected\"; } hidden value='$ket'>$ket</option>";

             ?>
             <option disabled>--Pilih Status--</option>
             <option value="Telah Menyelesaikan Ujian">Telah Menyelesaikan Ujian</option>
             <option value="Tidak Menyelesaikan Ujian">Tidak Menyelesaikan Ujian</option>
           </select>
           <?php } ?>
          </div>
          </div>
          <div class="form-group" align="center">
            <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" name="ubahstatusujian" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Ubah Status</button>
            <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
              Batal <span class="glyphicon glyphicon-floppy-remove"></span></a>
            </div>
          </div>
        </form>
