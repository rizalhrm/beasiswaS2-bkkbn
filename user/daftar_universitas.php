<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
	<li class="active">Universitas Luar Negeri</li>
</ul>

<div class="span12 wellwhite" style="margin-left: 0px">
<legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Daftar Jurusan Universitas Luar Negeri yang ditawarkan</legend>

<div class="row-fluid">
  <table align="center" class="table table-bordered table-hover" style="font-size:13px;">
    <thead>
      <tr>
        <th style="text-align:center;">No</th>
        <th style="text-align:center;">Universitas</th>
        <th style="text-align:center;">Jurusan</th>
        <th style="text-align:center;">IELTS (Overall Band)</th>
        <th style="text-align:center;">Negara</th>
        <th style="text-align:center;">Website</th>
      </tr>
    </thead>
    <tbody>
    <?php
       $select = "SELECT * FROM universitas A INNER JOIN jurusan B ON B.id_univ=A.id_univ";
       $queryselect = mysqli_query($koneksi,$select);
       $no=1;
       while ($un = mysqli_fetch_array($queryselect)) { ?>
         <tr>
           <td align="center" width="10px"><?php echo $no ?></td>
           <td align="center"><?php echo $un['univ']; ?></td>
           <td align="center"><?php echo $un['jurusan']; ?></td>
           <td align="center"><?php echo $un['ielts']; ?></td>
           <td align="center"><?php echo $un['negara']; ?></td>
           <td align="center"> <a href="<?php echo "$un[website]"; ?>"><?php echo $un['website']; ?></a></td>
         </tr>
         <?php
         $no++;}
         ?>
         </tbody>
  </table>
</div>
</div>
 <?php } ?>
