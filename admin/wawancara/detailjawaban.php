<?php
$id = $_POST['nip'];
$queryed = "SELECT * FROM wawancara A INNER JOIN formulir B ON B.nip=A.nip WHERE A.nip='$id'";
$sqled = mysqli_query($koneksi,$queryed);
$dataed = mysqli_fetch_array($sqled);

$pertanyaanberani = "SELECT jawaban_wawancara.jawaban AS jawaban , jawaban_wawancara.catatan AS catatan , pertanyaan_wawancara.pertanyaan AS pertanyaan
 FROM pertanyaan_wawancara , jawaban_wawancara WHERE pertanyaan_wawancara.id_pertanyaan  = jawaban_wawancara.id_pertanyaan AND jawaban_wawancara.nip ='$dataed[nip]' ORDER BY pertanyaan_wawancara.id_pertanyaan";
$sqljwb = mysqli_query($koneksi,$pertanyaanberani);
 ?>

  <div class="form-group">
  <label class="col-sm-12 control-label" style="text-align:center;">Jawaban Wawancara dari <?php echo "$dataed[nama] ($id)"; ?></label>
  </div>
  <?php
  $no= 1;
  while ($datajwb = mysqli_fetch_array($sqljwb)) {
   ?>
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
    <label class="control-label">Pertanyaan <?php echo $no; ?></label>
    <?php echo $datajwb['pertanyaan']; ?><br>
    <?php echo $datajwb['jawaban']; ?>
    <br>
    Catatan : <?php echo $datajwb['catatan']; ?><br>
    <hr>
    </div>
  </div>

  <?php
  $no++;}; ?>
  <div class="form-group" align="center">
    <div class="col-sm-offset-1 col-sm-10">
    <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
      Kembali <span class="glyphicon glyphicon-circle-arrow-left"></span></a>
    </div>
  </div>
