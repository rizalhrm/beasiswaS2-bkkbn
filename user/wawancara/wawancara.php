<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
  <ul class="breadcrumb wellwhite">
    <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
  	<li class="active">Wawancara</li>
  </ul>

  <div class="span12 wellwhite" style="margin-left: 0px">
  <legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Seleksi Wawancara</legend>
  <div class="row-fluid">
     <div class="control-group">
       <?php
       $querybatas = "SELECT * FROM proses_seleksi WHERE id = '1'";
       $sqlbatas = mysqli_query($koneksi,$querybatas);
       $databatas = mysqli_fetch_array($sqlbatas);
       $queryint = "SELECT * FROM wawancara WHERE nip = '$_SESSION[nip]'";
       $sqlint = mysqli_query($koneksi,$queryint);
       $peng = mysqli_fetch_array($sqlint);
       $dataint = mysqli_num_rows($sqlint);
          if ($dataint<1 && $databatas['wawancara']=='0') {
        ?>
        <div class="alert alert-error">
        Maaf , Seleksi Wawancara sedang di tutup.
        </div>
      </div>
   </div>
        <?php }
        elseif ($dataint<1 && $databatas['wawancara']=='1') {
        ?>
       <div class="alert alert-error">
        Maaf, Anda dinyatakan tidak lolos Seleksi Administrasi.
       </div>
     </div>
  </div>
       <?php }
       elseif ($dataint>=1 && $databatas['wawancara']=='1') {
       ?>
       <div class="alert alert-info">
        Cetak dan jangan lupa membawa Surat Panggilan Wawancara dibawah ini saat wawancara nanti.
       </div>
     </div>
  </div>
  <div class="row-fluid">
    <div align="center" class="span8 offset2">
    <table class="table table-bordered" style="font-size:12px;" align="center">
      <tr>
        <td><?php echo $peng['pengumuman']; ?></td>
      </tr>
    </table>
    <table>
      <tr>
        <td align="center">
          <form action="wawancara/panggilan_wawancara.php" method="post">
              <input type="hidden" name="idc" value="<?php echo $peng['nip']; ?>">
              <button type="submit" name="cetak" class="btn btn-primary"><i class="icon-print"></i> Cetak</button>
          </form>
        </td>
      </tr>
    </table>
    </div>
  </div>
  <?php }

        elseif ($dataint>=1 && $databatas['wawancara']=='0') {
        ?>
        <div class="alert alert-error">
        Maaf , Seleksi Wawancara sedang di tutup.
        </div>
        </div>
        </div>
        <div class="row-fluid">
        <div align="center" class="span8 offset2">
        <table class="table table-bordered" style="font-size:12px;" align="center">
        <tr>
         <td><?php echo $peng['pengumuman']; ?></td>
        </tr>
        </table>
        </div>
        </div>
        <?php }
   ?>
  </div>
<?php } ?>
