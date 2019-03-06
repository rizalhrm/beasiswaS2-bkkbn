<?php
$idcpb = $_POST['nip'];
$queryed = "SELECT * FROM ielts WHERE nip='$idcpb'";
$sqled = mysqli_query($koneksi,$queryed);
$dataed = mysqli_fetch_array($sqled);
$band = $dataed['overall_band'];
 ?>
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data"
        onsubmit="if (eval(ukuran)>1) { alert('Ukuran File ' + ukuran + ' MB Melebihi Batas yaitu 1 MB.'); return false; } else { return pdf(); }">
          <div class="form-group">
            <label for="status" class="col-sm-2 control-label">Overall Band</label>
            <div class="col-sm-8">
            <input type=hidden name='nip' value="<?php echo $idcpb ?>">

            <?php
            if (empty($band)) {
             ?>
            <input type="number" class="form-control" name="overall" min=0 step='.1' value="0" max="9.9" required>
            <?php } else { ?>
            <input type="number" class="form-control" name="overall" min=0 step='.1' max="9.9" value="<?php echo $band; ?>" required>
            <?php } ?>
          </div>
          </div>
          <div class="form-group">
       		  <label for="file" class="col-sm-2 control-label">Test Report Form</label>
            <div class="col-sm-8">
            <?php if (empty($dataed['test_report'])) { ?>
            <input type="file" id="file" name='file' class="file" accept=".pdf" required title="&nbsp;">
            <div style="margin-top:-25px; padding-left:90px;">
            <?php echo "File ini belum diupload"; }  else { ?>
            <input type="file" id="file" name='file' class="file" accept=".pdf" required title="&nbsp;">
            <div style="margin-top:-25px; padding-left:90px;">
              <?php echo "File Sudah Terupload
                      <a style=\"font-size:11px;\" class=\"btn btn-xs btn-info\" href=\"ielts/lihat.php?namafile=$dataed[test_report]\" target=\"_blank\" role=\"button\">Lihat</a>";}
               ?>
            </div>
            </div>
          </div>
          <div class="form-group" align="center">
            <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" name="uploadnilai" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Upload</button>
            <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
              Batal <span class="glyphicon glyphicon-floppy-remove"></span></a>
            </div>
          </div>
        </form>
