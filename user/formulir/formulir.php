<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>

<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
  <li class="active">Isi Formulir</li>
</ul>
<?php
$querybatas = "SELECT * FROM proses_seleksi WHERE id = '1'";
$sqlbatas = mysqli_query($koneksi,$querybatas);
$databatas = mysqli_fetch_array($sqlbatas);
 ?>
<div class="span12 wellwhite" style="margin-left: 0px">
  <legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Pengisian Formulir</legend>
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
      $queryia = "SELECT * FROM user WHERE nip = '$_SESSION[nip]'";
      $sqlia = mysqli_query($koneksi,$queryia);
      $dataia = mysqli_fetch_array($sqlia);
      $dataformulir = mysqli_fetch_array($sqlksg);
  ?>

  <form name="formulir" class="form-horizontal" action="formulir/simpanformulir.php" method="post" onSubmit="return validasi(this)">
    <table cellpadding=5 width=100%>
      <tr>
        <td width="24%">NIP</td>
        <td width="2%">:</td>
        <td width="73%" colspan="2"><input type="text" name="nip" value="<?php echo $dataformulir['nip']; ?>" class="input-xlarge" readonly></td>
        <td width="1%"></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="nama" value="<?php echo $dataia['nama']; ?>" class="input-xlarge input-block-level" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Nama dengan huruf saja.');"></td>
        <td></td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td width="1%"><label class="radio" for="l">
            <input type="radio" name="jk" value="L" required id="l">
            L</label>
        </td>
        <td><label class="radio" for="p">
            <input type="radio" name="jk" value="P" required id="p">
            P</label></div>
        </td>
      </tr>
      <tr>
        <td>Tempat / Tanggal Lahir</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="tempat_lahir" value="" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Tempat Lahir dengan huruf saja.');">&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" name="tgl_lahir" id="txttanggal" value="" maxlength="10" readonly>&nbsp;<img src="../css/popup-calendar/calendar.gif" width="24" height="12" onclick="displayCalendar(document.getElementById('txttanggal'),'yyyy/mm/dd',this)" style="cursor:pointer"></td>
        <td></td>
      </tr>
      <tr>
        <td>Agama</td>
        <td>:</td>
        <td colspan="2"><select name="agama" required>
            <option value="">--Pilih Agama--</option>
            <option value="Islam">Islam</option>
            <option value="Kristen Protestan">Kristen Protestan</option>
            <option value="Kristen Katolik">Kristen Katolik</option>
            <option value="Hindu">Hindu</option>
            <option value="Budha">Budha</option>
            <option value="Konghucu">Konghucu</option>
          </select></td>
        <td></td>
      </tr>
      <tr>
         <td>Status Pernikahan</td>
         <td>:</td>
         <td colspan="2"><select name="status_pernikahan" required>
           <option value="">--Status Pernikahan--</option>
           <option value="Menikah">Menikah</option>
           <option value="Belum Menikah">Belum Menikah</option>
         </select></td>
         <td></td>
      </tr>
      <tr>
          <td>Jumlah Anak</td>
          <td>:</td>
          <td colspan="2"><input type="number" name="jumlah_anak" min="0" value=""></td>
          <td></td>
      </tr>
      <tr>
        <td>Nomor HP</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="telepon" value="" pattern='[0-9]{11,13}' onkeypress="return hanyaAngka(event)" oninvalid="alert('Masukkan No. HP dengan angka, 11-13 digit tanpa spasi.');"></td>
        <td></td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td>:</td>
        <td colspan="2"><input type="email" name="email" value=""></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="4"><span style="font-weight:bold; background-color:#ccc; display:block; padding:2px;">Data Tempat Tinggal</span></td>
      </tr>
      <tr>
        <td>Alamat Rumah</td>
        <td>:</td>
        <td colspan="2"><textarea name="alamat_rumah" rows="3" cols="100" class="input-xlarge"></textarea></td>
        <td></td>
      </tr>
      <tr>
        <td>Kabupaten/Kota</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="kota" value="" class="input-xlarge input-block-level" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Kabupaten/Kota dengan huruf saja.');"></td>
        <td></td>
      </tr>
      <tr>
        <td>Provinsi</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="provinsi" value="" class="input-xlarge input-block-level" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Provinsi dengan huruf saja.');"></td>
        <td></td>
      </tr>
      <tr>
        <td>Kode Pos</td>
        <td>:</td>
        <td colspan="2"><input type="number" min=0 name="kode_pos" value=""></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="4"><span style="font-weight:bold; background-color:#ccc; display:block; padding:2px;">Keluarga Dekat yang Bisa dihubungi<span></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="nama_kel" value="" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Nama Keluarga dengan huruf saja.');"></td>
        <td></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td colspan="2"><textarea name="alamat_kel" rows="3" cols="100" class="input-xlarge"></textarea></td>
        <td></td>
      </tr>
      <tr>
        <td>Nomor HP</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="telepon_kel" value="" pattern='[0-9]{11,13}' onkeypress="return hanyaAngka(event)" oninvalid="alert('Masukkan No. HP Keluarga dengan angka, 11-13 digit tanpa spasi.');"></td>
        <td></td>
      </tr>
      <tr>
        <td>Hubungan Kekerabatan</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="hubungan_kel" value=""></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="4"><span style="font-weight:bold; background-color:#ccc; display:block; padding:2px;">Data Kantor<span></td>
      </tr>
      <tr>
        <td>BKKBN (Pusat/Provinsi)</td>
        <td>:</td>
        <td colspan="2">
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
        <td></td>
      </tr>
      <tr>
        <td>Alamat Kantor</td>
        <td>:</td>
        <td colspan="2"><textarea name="alamat_kantor" id="alamat_kantor" rows="3" cols="100" class="input-xlarge"></textarea></td>
        <td></td>
      </tr>
      <tr>
        <td>Unit Kerja</td>
        <td>:</td>
        <td colspan="2">
          <select name="unitkerja" id="unitkerja" required style="display:block; width:475px;">
          <option value=''>--Pilih Unit Kerja--</option>
          </select>
          <input type="text" name="unitkerja2" value="" id="txt_uk" style="display:none;" class="input-xlarge input-block-level" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Unit Kerja dengan huruf saja.');">
        </td>
        <td></td>
      </tr>
      <tr>
        <td>Jabatan Sekarang</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="jabatan_sekarang" value="" class="input-xlarge input-block-level" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Jabatan dengan huruf saja.');"></td>
        <td></td>
      </tr>
      <tr>
        <td>Golongan</td>
        <td>:</td>
        <td colspan="2">
          <select name="pangkat" required style="display:block;">
            <option value=''>--Pilih Golongan--</option>
            <option value="III A">III A</option>
            <option value="III B">III B</option>
          </select>
        <td></td>
      </tr>
      <tr>
        <td>Masa Kerja</td>
        <td>:</td>
        <td colspan="2"><input type="number" min="0" name="masa_kerja1" style="width:100px;" value=""> Tahun <input type="number" min="0" name="masa_kerja2" style="width:100px;" value=""> Bulan </td>
        <td></td>
      </tr>
      <tr>
        <td colspan="4"><span style="font-weight:bold; background-color:#ccc; display:block; padding:2px;">Pendidikan Terakhir (S1)</span></td>
      </tr>
      <tr>
        <td>Asal Perguruan Tinggi</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="perguruan_tinggi" value="" class="input-xlarge input-block-level" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Nama Universitas dengan huruf saja.');"></td>
        <td></td>
      </tr>
      <tr>
        <td>Fakultas</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="fakultas" value="" class="input-xlarge input-block-level" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Fakultas dengan huruf saja.');"></td>
        <td></td>
      </tr>
      <tr>
        <td>Program Studi</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="program_studi" value="" class="input-xlarge input-block-level" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Program Studi dengan huruf saja.');"></td>
        <td></td>
      </tr>
      <tr>
        <td>Tahun Kelulusan</td>
        <td>:</td>
        <td colspan="2"><select name="tahun_kelulusan" required>
                <option value=''>--Pilih Tahun--</option>
                <?php
                $thn = "1995";
                $thnow= date("Y") - 1;
                  while ($thn <=  $thnow) {
                  echo "<option value=\"$thn\">$thn</option>";
                  $thn++;
                }
                 ?>
              </select></td><td></td>
      </tr>
      <tr>
        <td>Judul Thesis</td>
        <td>:</td>
        <td colspan="2"><input type="text" name="judul_thesis" value="" class="input-xlarge input-block-level"></td>
        <td></td>
      </tr>
      <tr>
        <td>Nilai Kelulusan/IPK</td>
        <td>:</td>
        <td colspan="2"><input type="number" min=0 name="nilai_ipk" step='.01' max="4.0" value=""></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="4"><span style="font-weight:bold; background-color:#ccc; display:block; padding:2px;">Rencana Studi S2</span></td>
      </tr>
      <tr>
        <td>Pilihan Pertama</td>
        <td>:</td>
        <td colspan="2">
          <select name="univ_1" id="univ_1" style="width:270px;" required>
              <option value=''>--Universitas Pilihan Pertama--</option>
              <?php
              //mengambil nama-nama propinsi yang ada di database
              $univ1 = mysqli_query($koneksi,"SELECT * FROM universitas");
              while($dbuniv1=mysqli_fetch_array($univ1)){
              echo "<option value=\"$dbuniv1[id_univ]\">$dbuniv1[univ]</option>";
              }
              ?>
          </select>
          <select name="programstudi_1" id="programstudi_1" required style="width:400px;">
          <option value=''>--Pilih Jurusan--</option>
          </select>
        <td></td>
      </tr>
      <tr>
        <td>Pilihan Kedua</td>
        <td>:</td>
        <td colspan="2">
          <select name="univ_2" id="univ_2" style="width:270px;" required>
              <option value=''>--Universitas Pilihan Kedua--</option>
              <?php
              //mengambil nama-nama propinsi yang ada di database
              $univ2 = mysqli_query($koneksi,"SELECT * FROM universitas");
              while($dbuniv2=mysqli_fetch_array($univ2)){
              echo "<option value=\"$dbuniv2[id_univ]\">$dbuniv2[univ]</option>";
              }
              ?>
          </select>
          <select name="programstudi_2" id="programstudi_2" required style="width:400px;">
          <option value=''>--Pilih Jurusan--</option>
          </select></td>
        <td></td>
      </tr>
      <tr>
        <td>Pilihan ketiga</td>
        <td>:</td>
        <td colspan="2">
          <select name="univ_3" id="univ_3" style="width:270px;" required>
              <option value=''>--Universitas Pilihan Ketiga--</option>
              <?php
              //mengambil nama-nama propinsi yang ada di database
              $univ3 = mysqli_query($koneksi,"SELECT * FROM universitas");
              while($dbuniv3=mysqli_fetch_array($univ3)){
              echo "<option value=\"$dbuniv3[id_univ]\">$dbuniv3[univ]</option>";
              }
              ?>
          </select>
          <select name="programstudi_3" id="programstudi_3" required style="width:400px;">
          <option value=''>--Pilih Jurusan--</option>
          </select>
          </td>
        <td></td>
      </tr>
      <tr>
        <td colspan="4">Tuliskan rencana studi pada Program S2 Prioritas pertama Saudara dalam esai maksimal 500 kata,
          yang terdiri dari (a) Latar belakang bidang studi Saudara; (b) Pengalaman Kerja yang menerangkan tentang tugas
          pokok dan fungsi di unit kerja Saudara; (c) Alasan memilih program gelar prioritas Saudara, dikaitkan dengan latar
          belakang pendidikan dan/atau tugas sehari-hari; (d) Rencana Saudara jika telah menyelesaikan Program Gelar S2 Prioritas
          pertama Saudara dikaitkan dengan tugas pokok dan fungsi sehari-hari dan manfaatnya untuk BKKBN.<br>Silakan isi textbox dibawah ini!</td>
      </tr>
      <tr>
        <td colspan="4"><textarea name="esai" rows="20" cols="100" placeholder="Tulislah esai maksimal 500 kata" class="input-xlarge input-block-level"></textarea></td>
      </tr>
      <tr>
        <td align=center colspan="4"><input type="submit" class="btn btn-default btn-primary" name="simpan" value="Simpan">
          <a class="btn btn-default" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
            Kembali</a>
        </td>
      </tr>
    </table>
  </form>

  <?php
    }
    else {
    echo '<script languange="javascript">window.location="formulir_kosong.php"</script>';
    }
  ?>
</div>
</div>
<?php } ?>
