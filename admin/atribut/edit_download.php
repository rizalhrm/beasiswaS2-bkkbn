<?php
$id = $_POST['id'];
$queryed = "SELECT * FROM download WHERE id_download='$id'";
$sqled = mysqli_query($koneksi,$queryed);
$dataed = mysqli_fetch_array($sqled);
 ?>
 <form action="" method="POST" enctype="multipart/form-data"
 onsubmit="if (eval(ukurandownload)>2) { alert('Ukuran File ' + ukuran + ' MB Melebihi Batas yaitu 2 MB.'); return false; }">
 <div class="col-md-1"></div>
 <div class="col-md-10">
 		<div class="form-group">
 			<label for="judul">Judul</label>
			<input type="text" class="form-control" name="judul" value="<?php echo $dataed['judul']; ?>" required>
 			<input type="hidden" name="id" value="<?php echo $dataed['id_download']; ?>">
 		</div>
	  <div class="form-group">
 		  <label for="file">File</label>
      <input type="file" id="file" name='file' class="file" title="&nbsp;" required>
      <div style="margin-top:-25px; padding-left:90px;">
        <?php if (empty($dataed['file'])) { echo "File ini belum diupload";}
              else {echo "File Sudah Terupload";}
         ?>
      </div>
 	  </div>
    <div class="form-group">
 		  <label for="file">Status</label>
      <select class="form-control" name="status" required>
      <?php

      echo "<option if($status == 'Publik' || 'Rahasia' || '') {echo \"selected\"; } hidden value='$dataed[status]'>$dataed[status]</option>";

       ?>
       <option value=''>--Pilih Status--</option>
       <option value="Publik">Publik</option>
       <option value="Rahasia">Rahasia</option>
     </select>
    </div>
 		<div align="center">
 			<button type='submit' name='ubah' class='btn btn-primary btn-md'><span class="glyphicon glyphicon-floppy-saved"></span> Simpan</button>
      <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
        Batal <span class="glyphicon glyphicon-floppy-remove"></span></a>
 		</div>
  </div>
  <div class="col-md-1"></div>
 	</form>
