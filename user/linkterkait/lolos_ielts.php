<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
	<li class="active">Daftar Calon Penerima Beasiswa Lolos Seleksi Ujian IELTS</li>
</ul>

<div class="span12 wellwhite" style="margin-left: 0px">
<legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Daftar Calon Penerima Beasiswa Lolos Seleksi Ujian IELTS</legend>

<div class="row-fluid">
  <table align="center" class="table table-bordered table-hover" style="font-size:13px;">
    <thead>
      <tr>
        <th style="text-align:center;">No</th>
        <th style="text-align:center;">NIP</th>
        <th style="text-align:center;">Nama</th>
        <th style="text-align:center;">Overall Band</th>
        <th style="text-align:center;">Status</th>
      </tr>
    </thead>
    <tbody>
    <?php
       $select = "SELECT A.nip , B.nama, A.ket4 , A.overall_band ,A.status_cpb AS status_ielts  from ielts A INNER JOIN formulir B ON B.nip=A.nip WHERE A.status_cpb='Lolos'";
       $queryselect = mysqli_query($koneksi,$select);
       $no=1;
       while ($its = mysqli_fetch_array($queryselect)) { ?>
         <tr>
           <td align="center" width="10px"><?php echo $no ?></td>
           <td align="center"><?php echo $its['nip']; ?></td>
           <td align="center"><?php echo $its['nama']; ?></td>
           <td align="center">
             <?php
                 echo $its['overall_band'];
             ?>
           </td>
           <td align="center">
             <?php
             $shine="SELECT * FROM jurusan WHERE idj='$its[ket4]'";
             $query_shine=mysqli_query($koneksi,$shine);
             $data_shine=mysqli_fetch_array($query_shine);
             $steady="SELECT * FROM universitas WHERE id_univ='$data_shine[id_univ]'";
             $query_steady=mysqli_query($koneksi,$steady);
             $data_steady=mysqli_fetch_array($query_steady);
             if ($its['status_ielts']=='Lolos') {
               echo "$its[status_ielts] ke $data_steady[univ] , $data_shine[jurusan]";
             }
             elseif ($its['status_ielts']=='Tidak Lolos') {
               echo "$its[status_ielts]";
             }
             ?>
           </td>
         </tr>
         <?php
         $no++;}
         ?>
         </tbody>
  </table>
</div>
</div>
 <?php } ?>
