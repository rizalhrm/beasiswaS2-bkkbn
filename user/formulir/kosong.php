<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='../login.php';</script>";
    }

    else {
?>

<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
  <li class="active">Isi Formulir</li>
</ul>
<div class="span12 wellwhite" style="margin-left: 0px">
  <legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Pengisian Formulir</legend>
<div class="row-fluid">
  <?php
  if ($dataksg<1 && $dataksg2<1) {
      echo "<div class=\"alert alert-error\">
      Anda harus mengunggah surat pernyataan terlebih dahulu
      </div>";
  }
  elseif ($dataksg>=1 && $dataksg2<1) {
    echo '<script languange="javascript">window.location="formulir.php"</script>';
  }
  else {
  echo '<script languange="javascript">window.location="dataformulir.php"</script>';
  }
  ?>
</div>
</div>
<?php } ?>
