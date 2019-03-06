<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
  <ul class="breadcrumb wellwhite">
    <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
  	<li class="active">Data Surat Pernyataan</li>
  </ul>

  <div class="span12 wellwhite" style="margin-left: 0px">
  <legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Data Surat Pernyataan</legend>
  <div class="row-fluid">
     <div class="control-group">
       <?php
       $querybatas = "SELECT * FROM proses_seleksi WHERE id = '1'";
       $sqlbatas = mysqli_query($koneksi,$querybatas);
       $databatas = mysqli_fetch_array($sqlbatas);

          if ($databatas['pernyataan']=='0') {
        ?>
        <div class="alert alert-error">
        Maaf , Tahap Pembuatan Surat Pernyataan Sudah ditutup.
        </div>
        <?php }
        else {
        ?>
       <div class="alert alert-info">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         Anda bisa unggah ulang surat pernyataannya asalkan sebelum batas yang telah ditentukan.<br>Klik <a href="jadwal_kegiatan.php" style="color:green;">disini</a> untuk melihat jadwal kegiatan seleksi.
       </div>
       <?php } ?>
     </div>
  </div>
  <div class="row-fluid">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>NIP</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $querydatap = "SELECT * FROM pernyataan WHERE nip='$_SESSION[nip]'";
        $sqldatap = mysqli_query($koneksi,$querydatap);
        $listdatap = mysqli_fetch_array($sqldatap);
        ?>
        <tr>
          <td style="text-align: center"><?php echo $listdatap['nip']; ?></td>
          <td style="text-align: center" width="200px"><a class="btn btn-info" role="button" href="pernyataan/lihatpernyataan.php?namafile=<?php echo $listdatap['pernyataan']; ?>" target=\"_blank\">Lihat</a>
            <?php
            if ($databatas['pernyataan']=='1') {
              echo "<a class=\"btn btn-success\" role=\"button\" href=\"unggah_ulang_pernyataan.php\">Unggah Ulang</a>";
            } ?>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  </div>
<?php } ?>
