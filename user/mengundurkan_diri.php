<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
	<li class="active">Mengundurkan Diri</li>
</ul>
<?php
if (isset($_POST['simpan'])) {
  $nip=$_SESSION['nip'];
  $querydr = "SELECT * FROM formulir WHERE nip = '$nip'";
  $sqldr = mysqli_query($koneksi,$querydr);
  $datadr = mysqli_fetch_array($sqldr);

  $nama = $datadr['nama'];
  $tlp = $datadr['tlp'];
  $email = $datadr['email'];
  $alamat_rumah = $datadr['alamat_rumah'];
  $nama_kel = $datadr['nama_kel'];
  $tlp_kel = $datadr['tlp_kel'];
  $hubungan = $datadr['hubungan'];
  $alasan = $_POST['alasan'];

  $sql_f="SELECT * FROM data_bkkbn WHERE id_bkkbn='$datadr[provinsi_kantor]'";
  $query_f=mysqli_query($koneksi,$sql_f);
  $data_f=mysqli_fetch_array($query_f);
  $sql_g="SELECT * FROM unit_kerja WHERE id_uk='$datadr[unit_organ]'";
  $query_g=mysqli_query($koneksi,$sql_g);
  $data_g=mysqli_fetch_array($query_g);
  $cekdata=mysqli_num_rows($query_g);
  if ($cekdata>=1) {
    $unit_kerja= "$data_g[unit_kerja] , $data_f[prov]";
  }
  elseif ($cekdata<1) {
    $unit_kerja= "$datadr[unit_organ] , $data_f[prov]";
  }

  $sqltambah2 = "INSERT INTO mengundurkan_diri VALUES ('$nip','$nama','$unit_kerja','$tlp','$email','$alamat_rumah','$nama_kel','$tlp_kel','$hubungan','$alasan')";
  $querytambah2 = mysqli_query($koneksi,$sqltambah2);

  if ($querytambah2) {
    $dataksgway = mysqli_num_rows($sqlksg3);

    $queryksg4 = "SELECT * FROM wawancara WHERE nip='$nip'";
    $sqlksg4 = mysqli_query($koneksi,$queryksg4);
    $dataksg4 = mysqli_num_rows($sqlksg4);

    $queryksg5 = "SELECT * FROM ielts WHERE nip='$nip'";
    $sqlksg5 = mysqli_query($koneksi,$queryksg5);
    $dataksg5 = mysqli_num_rows($sqlksg5);

    $queryksg6 = "SELECT * FROM surat_perjanjian WHERE nip='$nip'";
    $sqlksg6 = mysqli_query($koneksi,$queryksg6);
    $dataksg6 = mysqli_num_rows($sqlksg6);

    $jawaban = "SELECT * FROM jawaban_wawancara WHERE nip = '$nip'";
    $jawabanx = mysqli_query($koneksi,$jawaban);
    $jawabanksg = mysqli_num_rows($jawabanx);

    if ($dataksg>=1) {
      $hasil1 = mysqli_query($koneksi,"delete from pernyataan where nip='$nip'");
    }
    if ($dataksg2>=1) {
      $hasil2 = mysqli_query($koneksi,"delete from formulir where nip='$nip'");
    }
    if ($dataksgway>=1) {
      $hasil3 = mysqli_query($koneksi,"delete from dokumen where nip='$nip'");
    }

    if ($dataksg4>=1) {
      $hasil4 = mysqli_query($koneksi,"delete from wawancara where nip='$nip'");
    }

    if ($jawabanksg>=1) {
      $hasil5 = mysqli_query($koneksi,"delete from jawaban_wawancara where nip='$nip'");
    }

    if ($dataksg5>=1) {
      $hasil5 = mysqli_query($koneksi,"delete from ielts where nip='$nip'");
    }

    if ($dataksg6>=1) {
      $hasil6 = mysqli_query($koneksi,"delete from surat_perjanjian where nip='$nip'");
    }
  echo "<script>alert('Data Berhasil diSimpan'); location.href='logout.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='';</script>";
  }
};

 ?>
<?php
$dataksgway = mysqli_num_rows($sqlksg3);
if ($dataksgway>=1) { ?>
<div class="span12 wellwhite" style="margin-left: 0px">
<legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Mengundurkan Diri dari Seleksi Beasiswa S2 Luar Negeri</legend>
<div class="row-fluid">
  <form action="" method="post" onsubmit="if(document.getElementById('konsekuensi').checked) {return true;}
  else { alert('Anda harus siap menerima konsekuensi dengan menceklis terlebih dahulu!');return false;}">
    <table cellpadding=5>
      <tr>
        <td width="900px">Berdasarkan Surat Pernyataan bahwa Anda bersedia mengembalikan seluruh biaya yang sudah dikeluarkan BKKBN sejak proses seleksi apabila mengundurkan diri dari proses seleksi beasiswa program Master (S2).</td>
      </tr>
      <tr>
        <td>
          <label class="checkbox"><input type="checkbox" value="konsekuensi" id="konsekuensi"> Saya siap menerima konsekuensi tersebut.</label>
        </td>
      </tr>
      <tr>
        <td>Ketiklah Alasan Mengundurkan Diri dibawah ini.<br><textarea name="alasan" rows="8" style="width: 481px; height: 173px;" cols="40"></textarea></td>
      </tr>
      <tr>
        <td align=center><input type="submit" class="btn btn-default btn-primary" name="simpan" value="Simpan">
          <a class="btn btn-default" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
            Kembali</a>
        </td>
      </tr>
    </table>
  </form>
</div>
 <?php }
 else {
   echo '<script languange="javascript">window.location="beranda.php"</script>';
 }
 ?>
</div>
 <?php } ?>
