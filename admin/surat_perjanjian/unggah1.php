<?php
$idcpb = $_POST['id_cpb'];
$queryed = "SELECT * FROM ielts WHERE id_cpb='$idcpb'";
$sqled = mysqli_query($koneksi,$queryed);
$dataed = mysqli_fetch_array($sqled);
 ?>
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data"
        onsubmit="if (eval(size)>0.6) { alert('Ukuran File ' + size + ' MB Melebihi Batas yaitu 0.6 MB'); return false; } else { return doc(); }">
          <div class="form-group">
       		  <label for="file" class="col-sm-2 control-label">Soft Copy Surat Perjanjian</label>
            <div class="col-sm-8">
            <input type=hidden name='id_cpb' value="<?php echo $idcpb ?>">
            <input type="file" id="surat" name='perjanjian' class="file" accept=".docx,.doc">
            </div>
          </div>
          <div class="form-group" align="center">
            <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" name="unggah" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Unggah</button>
            <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
              Batal <span class="glyphicon glyphicon-floppy-remove"></span></a>
            </div>
          </div>
        </form>
