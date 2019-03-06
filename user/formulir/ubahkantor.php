<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>

<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
  <li><a href="dataformulir.php">Data Formulir</a> <span class="divider">/</span></li>
  <li class="active">Ubah Data Kantor</li>
</ul>
<?php
$querybatas = "SELECT * FROM proses_seleksi WHERE id = '1'";
$sqlbatas = mysqli_query($koneksi,$querybatas);
$databatas = mysqli_fetch_array($sqlbatas);
 ?>
<div class="span12 wellwhite" style="margin-left: 0px">
  <legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Ubah Data Kantor Anda</legend>
<div class="row-fluid">
  <?php
    if ($databatas['formulir']=='0') {
  ?>
  <div class="alert alert-error">
  Maaf , Tahap Pengisian Formulir Sedang ditutup.
  </div>
  <?php
    }
    elseif ($dataksg>=1 && $dataksg2<1) {
      echo '<script languange="javascript">window.location="formulir.php"</script>';
    }
    elseif ($dataksg<1 && $dataksg2<1) {
      echo '<script languange="javascript">window.location="formulir_kosong.php"</script>';
    }
    else {
      $id = $_SESSION['nip'];
      $select = "SELECT * FROM formulir WHERE nip='$id'";
      $queryselect = mysqli_query($koneksi,$select);
      $dataf= mysqli_fetch_array($queryselect);

      $tl = $dataf['masakerja'];
      $pecah= explode(" ",$tl);
      $masa_kerja1 = $pecah[0];
      $masa_kerja2= $pecah[2];
  ?>

  <form name="ubahkantor" class="form-horizontal" action="formulir/updatekantor.php" method="post" onSubmit="return validasikan(this)">
    <table cellpadding=5 width=100% border=1>
      <thead>
        <tr>
          <th style="text-align:center;"><input type="hidden" name="nip" value="<?php echo $id; ?>"></th>
          <th style="text-align:center;">Data Sekarang</th>
          <th style="text-align:center;">Ubah</th>
        </tr>
      </thead>
      <tbody>
      <tr>
        <td><b>BKKBN (Pusat/Provinsi)</b></td>
        <td><?php  $sql_f="SELECT * FROM data_bkkbn WHERE id_bkkbn='$dataf[provinsi_kantor]'";
          $query_f=mysqli_query($koneksi,$sql_f);
          $data_f=mysqli_fetch_array($query_f);
          echo $data_f['prov']; ?></td>
        <td>
          <select name="bkkbn" id="bkkbn" onchange="cek_uk(this)" required>
              <option value=''>--Pilih BKKBN--</option>
              <?php
              //mengambil nama-nama propinsi yang ada di database
              $bkkbn = mysqli_query($koneksi,"SELECT * FROM data_bkkbn");
              while($p=mysqli_fetch_array($bkkbn)){
              echo "<option value=\"$p[id_bkkbn]\">$p[prov]</option>";
              }
              ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><b>Alamat Kantor</b></td>
        <td><?php echo $dataf['alamat_kantor']; ?></td>
        <td><textarea name="alamat_kantor" id="alamat_kantor" rows="3" cols="100" class="input-xlarge"><?php echo $dataf['alamat_kantor']; ?></textarea></td>
      </tr>
      <tr>
        <td><b>Unit Kerja</b></td>
        <td><?php
        $switch="SELECT * FROM unit_kerja WHERE id_uk='$dataf[unit_organ]'";
        $query_switch=mysqli_query($koneksi,$switch);
        $data_switch=mysqli_fetch_array($query_switch);
        $cekdata=mysqli_num_rows($query_switch);
        if ($cekdata>=1) {
          echo $data_switch['unit_kerja'];
        }
        elseif ($cekdata<1) {
          echo "$dataf[unit_organ]";
        }
        ?></td>
        <td>
          <select name="unitkerja" id="unitkerja" required style="display:block;">
          <option value=''>--Pilih Unit Kerja--</option>
          </select>
          <input type="text" name="unitkerja2" value="" id="txt_uk" style="display:none;" class="input-xlarge input-block-level" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Unit Kerja dengan huruf saja.');">
        </td>
      </tr>
      <tr>
        <td><b>Jabatan Sekarang</b></td>
        <td><?php echo $dataf['jabatan_skrg']; ?></td>
        <td><input type="text" name="jabatan_sekarang" value="<?php echo $dataf['jabatan_skrg']; ?>" class="input-xlarge input-block-level" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Jabatan dengan huruf saja.');"></td>
      </tr>
      <tr>
        <td><b>Golongan</b></td>
        <td><?php echo $dataf['pangkat']; ?></td>
        <td>
          <select name="pangkat" required style="display:block;">
            <?php

            echo "<option if($dataf[pangkat] == 'III A' || 'III B' ) {echo \"selected\"; } hidden value='$dataf[pangkat]'>$dataf[pangkat]</option>";

             ?>
            <option disabled>--Pilih Golongan--</option>
            <option value="III A">III A</option>
            <option value="III B">III B</option>
          </select>
        </td>
      </tr>
      <tr>
        <td><b>Masa Kerja</b></td>
        <td><?php echo $tl; ?></td>
        <td><input type="number" min="0" name="masa_kerja1" style="width:50px;" value="<?php echo $masa_kerja1; ?>"> Tahun <input type="number" min="0" name="masa_kerja2" style="width:50px;" value="<?php echo $masa_kerja2; ?>"> Bulan</td>

      </tr>
      <tr>
        <td align=center colspan="4"><input type="submit" class="btn btn-default btn-primary" name="ubah" value="Simpan">
          <a class="btn btn-default" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
            Kembali</a>
        </td>
      </tr>
      </tbody>
    </table>
  </form>

  <?php
    }
  ?>
</div>
</div>
<?php } ?>
