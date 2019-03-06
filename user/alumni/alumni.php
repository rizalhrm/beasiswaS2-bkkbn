<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
	<li class="active">Alumni</li>
</ul>

<div class="span12 wellwhite" style="margin-left: 0px">
<legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Data Alumni Penerima Beasiswa S2 Luar Negeri</legend>

<div class="row-fluid">
  <form action="" method="POST">
    <input class="span3" type="text" name="cari" value="" minlength=3 placeholder="Pencarian Berdasarkan...">
    <select name="berdasarkan" style="width: 120px;">
	    <option value="Semua">Semua</option>
      <option value="nama_alumni">Nama</option>
      <option value="tempat_tugas">Instansi/Unit Kerja</option>
      <option value="bidang_studi">Jurusan</option>
      <option value="univ">Universitas</option>
      <option value="gelar">Gelar</option>
      <option value="mulai">Thn Mulai</option>
      <option value="selesai">Thn Selesai</option>
	  </select>
  </form>
  <a class="btn btn-info pull-right" style="margin-top:-60px; margin-right:70px;" href="alumni.php" role="button">
    Refresh <i class="icon-refresh"></i></a>
  <form  action="alumni/cetak_alumni.php" method="post">
  <button type="submit" name="button" class="btn btn-success pull-right" style="margin-top:-60px;">Cetak</button>

  <table class="table table-bordered table-hover" style="font-size:12px;">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Instansi/Unit Kerja</th>
        <th>Jurusan</th>
        <th>Universitas</th>
        <th>Gelar</th>
        <th>Mulai</th>
        <th>Selesai</th>
        <th>Detail</th>
      </tr>
    </thead>
    <?php
    include "../config/classpaging.php";
     $p      = new Paging;
     $batas  = 20;
     $posisi = $p->cariPosisi($batas);

   if (isset($_POST['cari'])) {
     $cari=$_POST['cari'];

     if (empty($cari))
       {echo "<script>alert('Anda Harus Masukkan Kata'); location.href='';</script>";}

   elseif (!empty($cari)) {
     $berdasarkan=$_POST['berdasarkan'];
     if ($berdasarkan != 'Semua') {
         $select = "SELECT * from alumni WHERE $berdasarkan LIKE '%$cari%' ORDER BY id DESC";

       $queryselect = mysqli_query($koneksi,$select);
       $dataditemukan = mysqli_num_rows($queryselect);

       if ($dataditemukan < 1)
         {echo "<script>alert('Kata Tersebut Tidak Ditemukan'); location.href='';</script>";}
     }
     else {
       $select = "SELECT * from alumni WHERE  nama_alumni LIKE '%$cari%' OR
                                              tempat_tugas LIKE '%$cari%' OR
                                              bidang_studi LIKE '%$cari%' OR
                                              univ LIKE '%$cari%' OR
                                              gelar LIKE '%$cari%' OR
                                              mulai LIKE '%$cari%' OR
                                              selesai LIKE '%$cari%'
                                              ORDER BY id DESC";

       $queryselect = mysqli_query($koneksi,$select);
       $dataditemukan = mysqli_num_rows($queryselect);

       if ($dataditemukan < 1)
         {echo "<script>alert('Kata Tersebut Tidak Ditemukan'); location.href='';</script>";}
     }
       echo "<p align='left' style='font-size: 11px; color: red; margin-top:-13px'>(*Data telah ditemukan sebanyak <b>$dataditemukan</b></p>";
       $nourut=1;
       while ($isi = mysqli_fetch_array($queryselect)) {
         $noid = $isi['id'];
         $nama = $isi['nama_alumni'];
         $tempat_tugas = $isi['tempat_tugas'];
         $bidang_study = $isi['bidang_studi'];
         $univ = $isi['univ'];
         $gelar = $isi['gelar'];
         $mulai = $isi['mulai'];
         $selesai = $isi['selesai'];

         echo "
         <tbody>
         <tr>
           <td><input type=\"hidden\" name=\"primary[]\" value=\"$noid\">$nourut</td>
           <td>$nama</td>
           <td>$tempat_tugas</td>
           <td>$bidang_study</td>
           <td>$univ</td>
           <td>$gelar</td>
           <td>$mulai</td>
           <td>$selesai</td>
           <td><a href=\"detail_alumni.php?id=$noid\"><img src=\"../img/view.ico\" title=\"Melihat Data ini Lebih Detail.\" width=\"20px\"/></a></td>
         </tr>
         </tbody>
           ";  $nourut++;}
     }
 }

 elseif (!isset($_POST['cari'])) {
   $no= $posisi + 1;
   $select = "SELECT * from alumni ORDER BY id DESC LIMIT $posisi,$batas";
   $queryselect = mysqli_query($koneksi,$select);
   while ($isi = mysqli_fetch_array($queryselect)) {
   $noid = $isi['id'];
   $nama = $isi['nama_alumni'];
   $tempat_tugas = $isi['tempat_tugas'];
   $bidang_study = $isi['bidang_studi'];
   $univ = $isi['univ'];
   $gelar = $isi['gelar'];
   $mulai = $isi['mulai'];
   $selesai = $isi['selesai'];

   echo "
   <tbody>
   <tr>
     <td><input type=\"hidden\" name=\"primary[]\" value=\"$noid\">$no</td>
     <td>$nama</td>
     <td>$tempat_tugas</td>
     <td>$bidang_study</td>
     <td>$univ</td>
     <td>$gelar</td>
     <td>$mulai</td>
     <td>$selesai</td>
     <td><a href=\"detail_alumni.php?id=$noid\"><img src=\"../img/view.ico\" title=\"Melihat Data ini Lebih Detail.\" width=\"20px\"/></a></td>
   </tr>
   </tbody>
   ";$no++;}
   }
  ?>

  </table>
</form>
<div class="halaman">
<?php
if (!isset($_POST['cari'])) {
$query=mysqli_query($koneksi,"SELECT * FROM alumni ORDER BY id DESC");
            $jmldata = mysqli_num_rows($query);
            $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
            $linkhalaman = $p->navHalaman($_GET['pg'], $jmlhalaman);
            echo "<center><br>$linkhalaman<br><br></center>";
}
?>
</div>
</div>
</div>
 <?php } ?>
