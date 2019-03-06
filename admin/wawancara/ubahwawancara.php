<?php
$queryed = "SELECT * FROM wawancara A INNER JOIN formulir B ON B.nip=A.nip WHERE A.nip='$id'";
$sqled = mysqli_query($koneksi,$queryed);
$dataed = mysqli_fetch_array($sqled);
$pertanyaanberani = "SELECT * FROM pertanyaan_wawancara";
$sqltanya = mysqli_query($koneksi,$pertanyaanberani);
 ?>

  <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
    <label class="col-sm-12 control-label" style="text-align:center;">Sesi Wawancara dari <?php echo $dataed['nama']; ?></label>
    </div>
    <?php
    $no= 1;
    while ($datatanya = mysqli_fetch_array($sqltanya)) {
     ?>
    <div class="form-group">
      <div class="col-sm-offset-1 col-sm-10">
      <label for="jawaban" class="control-label">Pertanyaan <?php echo $no; ?></label>
      <?php echo $datatanya['pertanyaan']; ?><input type=hidden name='pertanyaan[]' value="<?php echo $datatanya['id_pertanyaan']; ?>">
      <textarea name="jawaban[]" rows="8" cols="20" class="form-control" id="jawaban"></textarea>
      <br>
      <input type="text" name="catatan[]" value="" class="form-control input-xlarge input-block-level" placeholder="Catatan">
      </div>
    </div>
    <hr>
    <?php
    $no++;}; ?>
    <div class="form-group" align="center">
      <div class="col-sm-offset-1 col-sm-10">
      <input type=hidden name='nip' value="<?php echo $id ?>">
      <button type="submit" name="ubahwawancara" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Selesai</button>
      <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
        Batal <span class="glyphicon glyphicon-floppy-remove"></span></a>
      </div>
    </div>
  </form>
