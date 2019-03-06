<?php
$os = "select * from proses_seleksi where id = '1'";
$queryos= mysqli_query($koneksi,$os);
$isios = mysqli_fetch_array($queryos);
?>
<form class="form-horizontal" method="post">
          <div align="left" style="margin-left:10px;">
            <input type="hidden" name="id" value="<?php echo $isios['id']; ?>">
            <!-- pernyataan -->
            <?php
            if ($isios['pernyataan']=='1') { ?>
            <div>
              <label class="checkbox-inline">
                 <input checked="checked" type="checkbox" value="1" name="pernyataan" data-toggle="toggle" data-on="Buka" data-off="Tutup" data-onstyle="success" data-offstyle="danger" />
              Pembuatan Surat Pernyataan
              </label>
            </div>
            <?php } elseif ($isios['pernyataan']=='0') {?>
            <div>
            <label class="checkbox-inline">
                 <input type="checkbox" name="pernyataan" value="1" data-toggle="toggle" data-on="Buka" data-off="Tutup" data-onstyle="success" data-offstyle="danger" />
              Pembuatan Surat Pernyataan
              </label>
            </div>
            <?php } ?>
            <!-- formulir -->
            <?php
            if ($isios['formulir']=='1') { ?>
              <div>
                <label class="checkbox-inline">
                   <input checked="checked" type="checkbox" value="1" name="formulir" data-toggle="toggle"  data-on="Buka" data-off="Tutup" data-onstyle="success" data-offstyle="danger" />
                Pengisian Formulir
                </label>
              </div>
            <?php } elseif ($isios['formulir']=='0') {?>
              <div>
                <label class="checkbox-inline">
                   <input type="checkbox" value="1" name="formulir" data-toggle="toggle"  data-on="Buka" data-off="Tutup" data-onstyle="success" data-offstyle="danger" />
                Pengisian Formulir
                </label>
              </div>
            <?php } ?>
            <!-- dokumen -->
            <?php
            if ($isios['dokumen']=='1') { ?>
              <div>
                <label class="checkbox-inline">
                   <input checked="checked" type="checkbox" value="1" name="dokumen" data-toggle="toggle"  data-on="Buka" data-off="Tutup" data-onstyle="success" data-offstyle="danger" />
                Pengunggahan Dokumen
                </label>
              </div>
            <?php } elseif ($isios['dokumen']=='0') {?>
              <div>
                <label class="checkbox-inline">
                   <input type="checkbox" value="1" name="dokumen" data-toggle="toggle"  data-on="Buka" data-off="Tutup" data-onstyle="success" data-offstyle="danger" />
                Pengunggahan Dokumen
                </label>
              </div>
            <?php } ?>
            <!-- wawancara -->
            <?php
            if ($isios['wawancara']=='1') { ?>
              <div>
                <label class="checkbox-inline">
                   <input checked="checked" value="1" type="checkbox" name="wawancara" data-toggle="toggle"  data-on="Buka" data-off="Tutup" data-onstyle="success" data-offstyle="danger" />
                Wawancara
                </label>
              </div>
            <?php } elseif ($isios['wawancara']=='0') {?>
              <div>
                <label class="checkbox-inline">
                   <input type="checkbox" value="1" name="wawancara" data-toggle="toggle"  data-on="Buka" data-off="Tutup" data-onstyle="success" data-offstyle="danger" />
                Wawancara
                </label>
              </div>
            <?php } ?>
            <!-- ielts -->
            <?php
            if ($isios['ielts']=='1') { ?>
            <div>
              <label class="checkbox-inline">
                 <input checked="checked" type="checkbox" value="1" name="ielts" data-toggle="toggle"  data-on="Buka" data-off="Tutup" data-onstyle="success" data-offstyle="danger" />
              Kursus IELTS
              </label>
            </div>
            <?php } elseif ($isios['ielts']=='0') {?>
              <div>
                <label class="checkbox-inline">
                   <input type="checkbox" value="1" name="ielts" data-toggle="toggle"  data-on="Buka" data-off="Tutup" data-onstyle="success" data-offstyle="danger" />
                Kursus IELTS
                </label>
              </div>
            <?php } ?>
            <!-- surat perjanjian -->
            <?php
            if ($isios['surat_perjanjian']=='1') { ?>
            <div>
              <label class="checkbox-inline">
                 <input checked="checked" type="checkbox" value="1" name="surat_perjanjian" data-toggle="toggle"  data-on="Buka" data-off="Tutup" data-onstyle="success" data-offstyle="danger" />
              Surat Perjanjian
              </label>
            </div>
            <?php } elseif ($isios['surat_perjanjian']=='0') {?>
              <div>
                <label class="checkbox-inline">
                   <input type="checkbox" value="1" name="surat_perjanjian" data-toggle="toggle"  data-on="Buka" data-off="Tutup" data-onstyle="success" data-offstyle="danger" />
                Surat Perjanjian
                </label>
              </div>
            <?php } ?>
            <div align="center" style="margin-top:10px;">
              <input type="submit" name="simpan" class="btn btn-primary btn-md" value="Simpan" />
            </div>
          </div>
    </form>
    <?php
    if (isset($_POST['simpan'])) {
      $id =$_POST['id'];
      if (isset($_POST['pernyataan'])) {
        $pernyataan = '1';
      }
      else {
        $pernyataan = '0';
      }
      if (isset($_POST['formulir'])) {
        $formulir = '1';
      }
      else {
        $formulir = '0';
      }
      if (isset($_POST['dokumen'])) {
        $dokumen = '1';
      }
      else {
        $dokumen = '0';
      }
      if (isset($_POST['wawancara'])) {
        $wawancara = '1';
      }
      else {
        $wawancara = '0';
      }
      if (isset($_POST['ielts'])) {
        $ielts = '1';
      }
      else {
        $ielts = '0';
      }
      if (isset($_POST['surat_perjanjian'])) {
        $surat_perjanjian = '1';
      }
      else {
        $surat_perjanjian = '0';
      }
      $queryupdate = "UPDATE proses_seleksi SET pernyataan='$pernyataan' , formulir='$formulir' , dokumen='$dokumen'
      , wawancara='$wawancara' , ielts='$ielts' , surat_perjanjian='$surat_perjanjian' WHERE id = '$id'";
      $update = mysqli_query($koneksi,$queryupdate);
      if ($update) {
      echo "<script>alert('Data Berhasil diubah'); location.href='beranda.php';</script>";
      }
    }
     ?>
