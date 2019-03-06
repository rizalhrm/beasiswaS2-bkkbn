<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>

<ul class="breadcrumb wellwhite">
  <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
  <li><a href="dataformulir.php">Data Formulir</a> <span class="divider">/</span></li>
  <li class="active">Ubah Pilihan Universitas</li>
</ul>
<?php
$querybatas = "SELECT * FROM proses_seleksi WHERE id = '1'";
$sqlbatas = mysqli_query($koneksi,$querybatas);
$databatas = mysqli_fetch_array($sqlbatas);
 ?>
<div class="span12 wellwhite" style="margin-left: 0px">
  <legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Ubah Pilihan Universitas</legend>
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
  ?>

  <form class="form-horizontal" action="formulir/updateuniv.php" method="post">
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
        <td><b>Pilihan Pertama</b></td>
        <td><?php
        $steady="SELECT * FROM universitas WHERE id_univ='$dataf[univ_1]'";
        $query_steady=mysqli_query($koneksi,$steady);
        $data_steady=mysqli_fetch_array($query_steady);

        $shine="SELECT * FROM jurusan WHERE idj='$dataf[programstudi_1]'";
        $query_shine=mysqli_query($koneksi,$shine);
        $data_shine=mysqli_fetch_array($query_shine);
        echo "$data_steady[univ] , $data_shine[jurusan]";
         ?></td>
        <td>
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
        </td>
      </tr>
      <tr>
        <td><b>Pilihan Kedua</b></td>
        <td><?php
        $steady2="SELECT * FROM universitas WHERE id_univ='$dataf[univ_2]'";
        $query_steady2=mysqli_query($koneksi,$steady2);
        $data_steady2=mysqli_fetch_array($query_steady2);

        $shine2="SELECT * FROM jurusan WHERE idj='$dataf[programstudi_2]'";
        $query_shine2=mysqli_query($koneksi,$shine2);
        $data_shine2=mysqli_fetch_array($query_shine2);
        echo "$data_steady2[univ] , $data_shine2[jurusan]";
         ?></td>
        <td>
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
          </select>
        </td>
      </tr>
      <tr>
        <td><b>Pilihan Ketiga</b></td>
        <td><?php
        $steady3="SELECT * FROM universitas WHERE id_univ='$dataf[univ_3]'";
        $query_steady3=mysqli_query($koneksi,$steady3);
        $data_steady3=mysqli_fetch_array($query_steady3);

        $shine3="SELECT * FROM jurusan WHERE idj='$dataf[programstudi_3]'";
        $query_shine3=mysqli_query($koneksi,$shine3);
        $data_shine3=mysqli_fetch_array($query_shine3);
        echo "$data_steady3[univ] , $data_shine3[jurusan]";
         ?></td>
        <td>
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
