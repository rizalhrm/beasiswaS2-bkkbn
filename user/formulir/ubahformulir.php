<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>

<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
  <li><a href="dataformulir.php">Data Formulir</a> <span class="divider">/</span></li>
  <li class="active">Ubah Data Formulir</li>
</ul>
<?php
$querybatas = "SELECT * FROM proses_seleksi WHERE id = '1'";
$sqlbatas = mysqli_query($koneksi,$querybatas);
$databatas = mysqli_fetch_array($sqlbatas);
$id = $_SESSION['nip'];
$select = "SELECT * FROM formulir WHERE nip='$id'";
$queryselect = mysqli_query($koneksi,$select);
$dataf= mysqli_fetch_array($queryselect);

$nama = $dataf['nama'];
$nip = $dataf['nip'];
$tgl_lahir = $dataf['tgl_lahir'];
$tempat_lahir = $dataf['tempat_lahir'];
$jk = $dataf['jk'];
$agama = $dataf['agama'];
$status_nikah = $dataf['statusnikah'];

      if ($jk =='L') {
        $l = "checked";
        $p = "";
      }
      elseif ($jk == 'P') {
        $p = "checked";
        $l = "";
      }
 ?>
<div class="span12 wellwhite" style="margin-left: 0px">
  <legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Ubah Data Formulir Anda</legend>
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
  ?>

  <form name="ubahformulir" class="form-horizontal" action="formulir/updateformulir.php" method="post" onSubmit="return validasiin(this)">
    <table cellpadding=5 width=100%>
      <tr>
        <td width="24%">NIP</td>
        <td width="2%">:</td>
        <td colspan="2" width="73%"><input type="text" name="nip" value="<?php echo $nip; ?>" class="input-xlarge" readonly></td>
        <td></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="nama" value="<?php echo $nama; ?>" class="input-xlarge input-block-level" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Nama dengan huruf saja.');"></td>
        <td></td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td width="1%"><label class="radio" for="l">
            <input type="radio" name="jk" value="L" required id="l" <?php echo $l; ?>>
            L</label>
        </td>
        <td><label class="radio" for="p">
            <input type="radio" name="jk" value="P" required id="p" <?php echo $p; ?>>
            P</label></div>
        </td>
      </tr>
      <tr>
        <td>Tempat / Tanggal Lahir</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="tempat_lahir" value="<?php echo $tempat_lahir; ?>" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Tempat Lahir dengan huruf saja.');">&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="tgl_lahir" id="txttanggal" value="<?php echo $tgl_lahir; ?>" maxlength="10" readonly>&nbsp;<img src="../css/popup-calendar/calendar.gif" width="24" height="12" onclick="displayCalendar(document.getElementById('txttanggal'),'yyyy/mm/dd',this)" style="cursor:pointer"></td>
        <td></td>
      </tr>
      <tr>
        <td>Agama</td>
        <td>:</td>
        <td colspan="2"><select name="agama" required>
            <?php

            echo "<option if($agama == 'Islam' || 'Kristen Protestan' || 'Kristen Katolik' || 'Hindu' || 'Budha' || 'Konghucu' ) {echo \"selected\"; } hidden value='$agama'>$agama</option>";

             ?>
             <option disabled>--Pilih Agama--</option>
             <option value="Islam">Islam</option>
             <option value="Kristen Protestan">Kristen Protestan</option>
             <option value="Kristen Katolik">Kristen Katolik</option>
             <option value="Hindu">Hindu</option>
             <option value="Konghucu">Konghucu</option>

           </select></td>
        <td></td>
      </tr>
      <tr>
         <td>Status Pernikahan</td>
         <td>:</td>
         <td colspan="2"><select name="status_pernikahan" required>

            <?php

            echo "<option if($status_nikah == 'Menikah' || 'Belum Menikah' ) {echo \"selected\"; } hidden value='$status_nikah'>$status_nikah</option>";

             ?>
             <option disabled>--Status Pernikahan--</option>
             <option value="Menikah">Menikah</option>
             <option value="Belum Menikah">Belum Menikah</option>
           </select></td>
         <td></td>
      </tr>
      <tr>
          <td>Jumlah Anak</td>
          <td>:</td>
          <td colspan="2"><input type="number" name="jumlah_anak" min="0" value="<?php echo $dataf['jmlanak']; ?>"></td>
          <td></td>
      </tr>
      <tr>
        <td>Nomor HP</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="telepon" value="<?php echo $dataf['tlp']; ?>" pattern='[0-9]{11,13}' onkeypress="return hanyaAngka(event)" oninvalid="alert('Masukkan No. HP dengan angka, 11-13 digit tanpa spasi.');"></td>
        <td></td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td>:</td>
        <td colspan="2"><input type="email" name="email" value="<?php echo $dataf['email']; ?>"></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="4"><span style="font-weight:bold; background-color:#ccc; display:block; padding:2px;">Data Tempat Tinggal</span></td>
      </tr>
      <tr>
        <td>Alamat Rumah</td>
        <td>:</td>
        <td colspan="2"><textarea name="alamat_rumah" rows="3" cols="100" class="input-xlarge"><?php echo $dataf['alamat_rumah']; ?></textarea></td>
        <td></td>
      </tr>
      <tr>
        <td>Kabupaten/Kota</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="kota" value="<?php echo $dataf['kota_rumah']; ?>" class="input-xlarge input-block-level" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Kabupaten/Kota dengan huruf saja.');"></td>
        <td></td>
      </tr>
      <tr>
        <td>Provinsi</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="provinsi" value="<?php echo $dataf['provinsi_rumah']; ?>" class="input-xlarge input-block-level" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Provinsi dengan huruf saja.');"></td>
        <td></td>
      </tr>
      <tr>
        <td>Kode Pos</td>
        <td>:</td>
        <td colspan="2"><input type="number" min=0 name="kode_pos" value="<?php echo $dataf['kodepos_rumah']; ?>"></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="4"><span style="font-weight:bold; background-color:#ccc; display:block; padding:2px;">Keluarga Dekat yang Bisa dihubungi<span></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="nama_kel" value="<?php echo $dataf['nama_kel']; ?>" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Nama Keluarga dengan huruf saja.');"></td>
        <td></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td colspan="2"><textarea name="alamat_kel" rows="3" cols="100" class="input-xlarge"><?php echo $dataf['alamat_kel']; ?></textarea></td>
        <td></td>
      </tr>
      <tr>
        <td>Nomor HP</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="telepon_kel" value="<?php echo $dataf['tlp_kel']; ?>" pattern='[0-9]{11,13}' onkeypress="return hanyaAngka(event)" oninvalid="alert('Masukkan No. HP Keluarga dengan angka, 11-13 digit tanpa spasi.');"></td>
        <td></td>
      </tr>
      <tr>
        <td>Hubungan Kekerabatan</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="hubungan_kel" value="<?php echo $dataf['hubungan']; ?>"></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="4"><span style="font-weight:bold; background-color:#ccc; display:block; padding:2px;">Pendidikan Terakhir (S1)</span></td>
      </tr>
      <tr>
        <td>Asal Perguruan Tinggi</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="perguruan_tinggi" value="<?php echo $dataf['nama_pt']; ?>" class="input-xlarge input-block-level" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Nama Universitas dengan huruf saja.');"></td>
        <td></td>
      </tr>
      <tr>
        <td>Fakultas</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="fakultas" value="<?php echo $dataf['fakultas']; ?>" class="input-xlarge input-block-level" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Fakultas dengan huruf saja.');"></td>
        <td></td>
      </tr>
      <tr>
        <td>Program Studi</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="program_studi" value="<?php echo $dataf['program_studi']; ?>" class="input-xlarge input-block-level" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Program Studi dengan huruf saja.');"></td>
        <td></td>
      </tr>
      <tr>
        <td>Tahun Kelulusan</td>
        <td>:</td>
        <td colspan="2">
          <select name="tahun_kelulusan" required>
                <?php
                $thnz= date("Y") - 1;
                  while ($thnw >= 2000 ) {
                  $thnuraian = array($thnz);
                  $thnz--;
                }

                echo "<option if($dataf[thn_lulus] == $thnuraian ) {echo \"selected\"; } hidden value='$dataf[thn_lulus]'>$dataf[thn_lulus]</option>";

                $thnw = date("Y") - 1;
                  while ($thnw >= 2000 )  {
                  echo "<option value=\"$thnw\">$thnw</option>";
                  $thnw--;
                }
                 ?>
              </select>

        </td>
        <td></td>
      </tr>
      <tr>
        <td>Judul Thesis</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="judul_thesis" value="<?php echo $dataf['judul_thesis']; ?>" class="input-xlarge input-block-level"></td>
        <td></td>
      </tr>
      <tr>
        <td>Nilai Kelulusan/IPK</td>
        <td>:</td>
        <td colspan="2"><input type="number" min=0 name="nilai_ipk" step='.01' max="4.0" value="<?php echo $dataf['nilai_ipk']; ?>"></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="4"><span style="font-weight:bold; background-color:#ccc; display:block; padding:2px;">Esai</span></td>
      </tr>

      <tr>
        <td colspan="4">Tuliskan rencana studi pada Program S2 Prioritas pertama Saudara dalam esai maksimal 500 kata,
          yang terdiri dari (a) Latar belakang bidang studi Saudara; (b) Pengalaman Kerja yang menerangkan tentang tugas
          pokok dan fungsi di unit kerja Saudara; (c) Alasan memilih program gelar prioritas Saudara, dikaitkan dengan latar
          belakang pendidikan dan/atau tugas sehari-hari; (d) Rencana Saudara jika telah menyelesaikan Program Gelar S2 Prioritas
          pertama Saudara dikaitkan dengan tugas pokok dan fungsi sehari-hari dan manfaatnya untuk BKKBN.<br>Silakan isi textbox dibawah ini!</td>
      </tr>
      <tr>
        <td colspan="4"><textarea name="esai" rows="20" cols="100" placeholder="Tulislah esai maksimal 500 kata" class="input-xlarge input-block-level"><?php echo $dataf['esai']; ?></textarea></td>
      </tr>
      <tr>
        <td align=center colspan="4"><input type="submit" class="btn btn-default btn-primary" name="ubah" value="Ubah">
          <a class="btn btn-default" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
            Kembali</a>
        </td>
      </tr>
    </table>
  </form>

  <?php
    }
  ?>
</div>
</div>
<?php } ?>
