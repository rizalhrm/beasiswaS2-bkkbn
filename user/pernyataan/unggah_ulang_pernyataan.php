<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
  <ul class="breadcrumb wellwhite">
    <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
    <li><a href="datapernyataan.php">Data Surat Pernyataan</a> <span class="divider">/</span></li>
  	<li class="active">Unggah Ulang Surat Pernyataan</li>
  </ul>
  <?php
  $querybatas = "SELECT * FROM proses_seleksi WHERE id = '1'";
  $sqlbatas = mysqli_query($koneksi,$querybatas);
  $databatas = mysqli_fetch_array($sqlbatas);
   ?>
  <div class="span12 wellwhite" style="margin-left: 0px">
  <legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Unggah Ulang Surat Pernyataan</legend>
  <div class="row-fluid">
    <?php
      if ($databatas['pernyataan']=='0') {
    ?>
    <div class="alert alert-error">
    Maaf , Tahap Pembuatan Surat Pernyataan Sedang ditutup.
    </div>
    <?php }
    else {

       ?>

       <form class="form-horizontal" action="pernyataan/uploadpernyataan2.php" method="post" enctype="multipart/form-data"
       onsubmit="if (eval(ukuran)>1) { alert('Ukuran File ' + ukuran + ' MB Melebihi Batas yaitu 1 MB.'); return false; } else { return pdf(); }">
         <div class="control-group">
           <div class="alert alert-info">
             <b>PERHATIAN !</b>
             <ul>
               <li>Gunakan Format Surat Pernyataan dari kami, anda bisa unduh di sebelah kiri website.</li>
               <li>Jangan lupa untuk diberi materai 6000 dan ditandatangan.</li>
             </ul>
          </div>

           <div class="alert alert-info">
             <button type="button" class="close" data-dismiss="alert">&times;</button>
             <b>Ketentuan Upload Surat Pernyataan !</b>
             <ul>
               <li>File dokumen yang diunggah harus merupakan hasil scan, bukan hasil foto.</li>
               <li>Ukuran file yang diunggah tidak melebihi 1MB dan berekstensi *.pdf</li>
             </ul>
           </div>
         </div>

         <div class="control-group" align="center">
           <input type="hidden" name="nip" value="<?php echo $_SESSION['nip']; ?>">
           <input type="file" id="file" name="pernyataan" value="" accept=".pdf" required>
         </div>
         <div class="control-group" align="center">
         <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
       </div>
       </form>
       <?php } ?>
  </div>
  </div>
<?php } ?>
