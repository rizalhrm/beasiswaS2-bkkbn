<?php
      $namafile = $_GET['namafile'];
      $lokasi = "../../file/dokumen/$namafile";
      $lokasi_dok = "tmp_$namafile";
      header('Content-type: application/pdf');
      header('Content-Disposition: inline; filename="' . $lokasi_dok . '"');
      header('Content-Transfer-Encoding: binary');
      header('Accept-Ranges: bytes');
      @readfile($lokasi);
?>
