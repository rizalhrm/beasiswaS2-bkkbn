<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
	<li class="active">Daftar Calon Penerima Beasiswa Lolos Seleksi Administrasi</li>
</ul>

<div class="span12 wellwhite" style="margin-left: 0px">
<legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Daftar Calon Penerima Beasiswa Lolos Seleksi Administrasi</legend>

<div class="row-fluid">
  <table align="center" class="table table-bordered table-hover" style="font-size:12px;">
    <thead>
      <tr>
        <th style="text-align:center;">No</th>
        <th style="text-align:center;">NIP</th>
        <th style="text-align:center;">Nama</th>
        <th style="text-align:center;">No. HP</th>
        <th style="text-align:center;">Unit Kerja</th>
        <th style="text-align:center;">Jabatan</th>
        <th style="text-align:center;">Pilihan Pertama</th>
      </tr>
    </thead>
    <tbody>
    <?php
       $select = "SELECT * from wawancara A INNER JOIN formulir B ON B.nip=A.nip";
       $queryselect = mysqli_query($koneksi,$select);
       $no=1;
       while ($wwc = mysqli_fetch_array($queryselect)) { ?>
         <tr>
           <td align="center" width="10px"><?php echo $no ?></td>
           <td align="center"><?php echo $wwc['nip']; ?></td>
           <td align="center"><?php echo $wwc['nama']; ?></td>
           <td align="center"><?php echo $wwc['tlp']; ?></td>
           <td align="center"><?php
           $sql_f="SELECT * FROM data_bkkbn WHERE id_bkkbn='$wwc[provinsi_kantor]'";
           $query_f=mysqli_query($koneksi,$sql_f);
           $data_f=mysqli_fetch_array($query_f);
           $sql_g="SELECT * FROM unit_kerja WHERE id_uk='$wwc[unit_organ]'";
           $query_g=mysqli_query($koneksi,$sql_g);
           $data_g=mysqli_fetch_array($query_g);
           $cekdata=mysqli_num_rows($query_g);
           if ($cekdata>=1) {
             echo "$data_g[unit_kerja], $data_f[prov]";
            }
           elseif ($cekdata<1) {
             echo "$wwc[unit_organ], $data_f[prov]";  } ?></td>
           <td align="center"><?php echo $wwc['jabatan_skrg']; ?></td>
           <td align="center"><?php
           $steady="SELECT * FROM universitas WHERE id_univ='$wwc[univ_1]'";
           $query_steady=mysqli_query($koneksi,$steady);
           $data_steady=mysqli_fetch_array($query_steady);

           $shine="SELECT * FROM jurusan WHERE idj='$wwc[programstudi_1]'";
           $query_shine=mysqli_query($koneksi,$shine);
           $data_shine=mysqli_fetch_array($query_shine);
           echo "$data_steady[univ] , $data_shine[jurusan]"; ?></td>
         </tr>
         <?php
         $no++;}
         ?>
         </tbody>
  </table>
</div>
</div>
 <?php } ?>
