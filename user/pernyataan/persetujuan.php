<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
	<li class="active">Persetujuan</li>
</ul>
<?php
$querybatas = "SELECT * FROM proses_seleksi WHERE id = '1'";
$sqlbatas = mysqli_query($koneksi,$querybatas);
$databatas = mysqli_fetch_array($sqlbatas);
 ?>
<div class="span12 wellwhite" style="margin-left: 0px">
<legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Persetujuan</legend>
<div class="row-fluid">
  <?php
    if ($databatas['pernyataan']=='0') {
  ?>
  <div class="alert alert-error">
  Maaf , Tahap Pembuatan Surat Pernyataan Sudah ditutup.
  </div>
  <?php }
    elseif ($dataksg<1) {
      if (!isset($_POST['lanjut'])) {
          $queryttg = "SELECT * FROM informasi WHERE id = '1'";
          $sqlttg = mysqli_query($koneksi,$queryttg);
          $datattg = mysqli_fetch_array($sqlttg);
          echo "<p><b>$datattg[1]</b></p>";
          echo "<p>$datattg[2]</p>";
          echo "<br><span class='border_cart'></span><br>";
          $queryttg2 = "SELECT * FROM informasi WHERE id = '2'";
          $sqlttg2 = mysqli_query($koneksi,$queryttg2);
          $datattg2 = mysqli_fetch_array($sqlttg2);
          echo "<p><b>$datattg2[1]</b></p>";
          echo "$datattg2[2]<br>";
         ?>
         <form action="pernyataan.php" method="post" onsubmit="if(document.getElementById('setuju').checked) {return true;}
         else { alert('Anda harus menyetujui persyaratan &amp; ketentuan dengan menceklis!');return false;}">
           <div align="left">
             <label class="checkbox">
              <input type="checkbox" value="setuju" id="setuju"> Saya telah memahami dan menyetujui persyaratan dan ketentuan tersebut.
             </label>
              <button type="submit" name="lanjut" class="btn btn-primary">Lanjut</button>
           </div>
         </form>

         <?php
          }
      }
    else {
      echo '<script languange="javascript">window.location="datapernyataan.php"</script>';
      }
    ?>

</div>
</div>
<?php } ?>
