<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
  <ul class="breadcrumb wellwhite">
    <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
    <li><a href="berkasdokumen.php">Pengunggahan Dokumen</a> <span class="divider">/</span></li>
  	<li class="active">Unggah Ijazah S1</li>
  </ul>
  <?php
  $querybatas = "SELECT * FROM proses_seleksi WHERE id = '1'";
  $sqlbatas = mysqli_query($koneksi,$querybatas);
  $databatas = mysqli_fetch_array($sqlbatas);
   ?>
  <div class="span12 wellwhite" style="margin-left: 0px">
  <legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Unggah Ijazah S1</legend>
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
           <input type="file" id="file" name="fc_ijazah" value="" accept=".pdf" required>
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
     $fc_ijazah= $_FILES['fc_ijazah']['name'];
     $lokasi= "../file/dokumen/"."Ijazah_S1_".$nip."_".basename($fc_ijazah);
     $name_file = "Ijazah_S1_".$nip."_".basename($fc_ijazah);
     if($name_file){
     copy($_FILES['fc_ijazah']['tmp_name'],$lokasi);
     }
     $queryfc_ijazah="UPDATE dokumen SET fc_ijazah='$name_file' WHERE nip='$nip'";
     $simpanfc_ijazah=mysqli_query($koneksi,$queryfc_ijazah);
     if ($simpanfc_ijazah) {
       echo "<script>alert('Upload file berhasil'); location.href='berkasdokumen.php';</script>";
     }
      else{
      echo "<script>alert('Upload file gagal'); location.href='';</script>";
      }
   }
   ?>
<?php } ?>
