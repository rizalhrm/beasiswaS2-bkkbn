<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
  <ul class="breadcrumb wellwhite">
    <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
    <li><a href="berkasdokumen.php">Pengunggahan Surat Perjanjian</a> <span class="divider">/</span></li>
  	<li class="active">Unggah Ikatan Tugas Belajar</li>
  </ul>
  <?php
  $querybatas = "SELECT * FROM proses_seleksi WHERE id = '1'";
  $sqlbatas = mysqli_query($koneksi,$querybatas);
  $databatas = mysqli_fetch_array($sqlbatas);
   ?>
  <div class="span12 wellwhite" style="margin-left: 0px">
  <legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Unggah Ikatan Tugas Belajar</legend>
  <div class="row-fluid">
    <?php
    $queryprj= "SELECT * FROM surat_perjanjian WHERE nip = '$_SESSION[nip]'";
    $sqlprj = mysqli_query($koneksi,$queryprj);
    $lolosprj=mysqli_fetch_array($sqlprj);
      if ($databatas['surat_perjanjian']=='0') {
    ?>
    <div class="alert alert-error">
      Maaf , Tahap Surat Perjanjian Sudah ditutup.
    </div>
    <?php }

    elseif ($lolosprj['status_pendaftaran_ln']=='Sudah didaftarkan' && $databatas['surat_perjanjian']=='1') {

       ?>
       <div class="alert alert-info">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <b>Ketentuan Unggah Dokumen !</b>
         <ul>
           <li>Gunakanlah Format yang sudah disediakan, Anda bisa download di sidebar kiri website ini</li>
           <li>File dokumen yang diunggah harus merupakan hasil scan, bukan hasil foto.</li>
           <li>Ukuran file masing-masing yang diunggah tidak melebihi 1 MB dan berekstensi *.pdf</li>
           <li>Anda bisa unggah ulang semua dokumen asalkan sebelum batas yang telah ditentukan.<br>Klik <a href="jadwal_kegiatan.php" style="color:green;">disini</a> untuk melihat jadwal kegiatan.</li>
         </ul>
       </div>

       <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"
       onsubmit="if (eval(ukuran )>1) { alert('Ukuran File ' + ukuran + ' MB Melebihi Batas yaitu 1 MB.'); return false; } else { return pdf(); }">

         <div class="control-group" align="center">
           <input type="hidden" name="nip" value="<?php echo $_SESSION['nip']; ?>">
           <input type="file" id="file" name="tubel" value="" accept=".pdf" required>
         </div>
         <div class="control-group" align="center">
           <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
       </div>
       </form>

       <?php }
       else {
       echo '<script languange="javascript">window.location="surat_perjanjian.php"</script>';
       }
       ?>
  </div>
  </div>
  <?php
   if (isset($_POST['simpan'])) {
     $nip =$_POST['nip'];

     $prj= $_FILES['tubel']['name'];
     $lokasi= "../file/dokumen/"."Ikatan_Tugas_Belajar_".$nip."_".basename($prj);
     $name_file = "Ikatan_Tugas_Belajar_".$nip."_".basename($prj);
     if($name_file){
     copy($_FILES['tubel']['tmp_name'],$lokasi);
     }
     $querydrh="UPDATE surat_perjanjian SET ikatan_tubel='$name_file' WHERE nip='$nip'";
     $simpandrh=mysqli_query($koneksi,$querydrh);
     if ($simpandrh) {
       echo "<script>alert('Upload file berhasil'); location.href='surat_perjanjian.php';</script>";
     }
      else{
      echo "<script>alert('Upload file gagal'); location.href='';</script>";
      }
   }
   ?>
<?php } ?>
