<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
  <ul class="breadcrumb wellwhite">
    <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
    <li><a href="berkasdokumen.php">Pengunggahan Dokumen</a> <span class="divider">/</span></li>
  	<li class="active">Unggah Daftar Riwayat Hidup</li>
  </ul>
  <?php
  $querybatas = "SELECT * FROM proses_seleksi WHERE id = '1'";
  $sqlbatas = mysqli_query($koneksi,$querybatas);
  $databatas = mysqli_fetch_array($sqlbatas);
   ?>
  <div class="span12 wellwhite" style="margin-left: 0px">
  <legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Unggah Daftar Riwayat Hidup</legend>
  <div class="row-fluid">
    <?php
      if ($databatas['dokumen']=='0') {
    ?>
    <div class="alert alert-error">
    Maaf , Tahap Pengunggahan Dokumen Sedang ditutup.
    </div>
    <?php }
    elseif ($dataksg2<1) {
      echo "<div class=\"alert alert-error\">
      Anda harus mengisi formulir terlebih dahulu
      </div>";
    }
    else {

       ?>
       <div class="alert alert-info">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <b>Ketentuan Unggah Dokumen !</b>
         <ul>
           <li>File dokumen yang diunggah harus merupakan hasil scan, bukan hasil foto.</li>
           <li>Ukuran file masing-masing yang diunggah tidak melebihi 1.5 MB dan berekstensi *.pdf</li>
           <li>Anda bisa unggah ulang semua dokumen asalkan sebelum batas yang telah ditentukan.<br>Klik <a href="jadwal_kegiatan.php" style="color:green;">disini</a> untuk melihat jadwal kegiatan.</li>
         </ul>
       </div>

       <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"
       onsubmit="if (eval(ukurandok )>1.5) { alert('Ukuran File ' + ukurandok + ' MB Melebihi Batas yaitu 1.5 MB.'); return false; } else { return pdf(); }">

         <div class="control-group" align="center">
           <input type="hidden" name="nip" value="<?php echo $_SESSION['nip']; ?>">
           <input type="file" id="file" name="drh" value="" accept=".pdf" required>
         </div>
         <div class="control-group" align="center">
           <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
       </div>
       </form>

       <?php } ?>
  </div>
  </div>
  <?php
   if (isset($_POST['simpan'])) {
     $nip =$_POST['nip'];
     $drh= $_FILES['drh']['name'];
     $lokasi= "../file/dokumen/"."Daftar_Riwayat_Hidup_".$nip."_".basename($drh);
     $name_file = "Daftar_Riwayat_Hidup_".$nip."_".basename($drh);
     if($name_file){
     copy($_FILES['drh']['tmp_name'],$lokasi);
     }
     $querydrh="UPDATE dokumen SET drh='$name_file' WHERE nip='$nip'";
     $simpandrh=mysqli_query($koneksi,$querydrh);
     if ($simpandrh) {
       echo "<script>alert('Upload file berhasil'); location.href='berkasdokumen.php';</script>";
     }
      else{
      echo "<script>alert('Upload file gagal'); location.href='';</script>";
      }
   }
   ?>
<?php } ?>
