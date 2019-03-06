<?php
if (!isset($_SESSION['nip']) || !isset($_SESSION['password']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
  <ul class="breadcrumb wellwhite">
    <li><a href="beranda.php">Beranda</a> <span class="divider">/</span></li>
  	<li class="active">Data Formulir</li>
  </ul>

  <div class="span12 wellwhite" style="margin-left: 0px">
  <legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Data Formulir</legend>
  <div class="row-fluid">
     <div class="control-group">
       <?php
       $querybatas = "SELECT * FROM proses_seleksi WHERE id = '1'";
       $sqlbatas = mysqli_query($koneksi,$querybatas);
       $databatas = mysqli_fetch_array($sqlbatas);

         if ($databatas['formulir']=='0') {
       ?>
       <div class="alert alert-error">
       Maaf , Tahap Pengisian Formulir Sedang ditutup.
       </div>
        <?php }
        elseif ($dataksg>=1 && $dataksg2<1) {
          echo '<script languange="javascript">window.location="formulir.php"</script>';
        }
        elseif ($dataksg<1 && $dataksg2<1) {
          echo '<script languange="javascript">window.location="formulir_kosong.php"</script>';
        }
        else {
        ?>
        <div class="alert alert-info">
          <b>PERHATIAN !</b>
          <ul>
            <li>Lengkapilah data formulir anda sebelum tahap ini ditutup.</li>
            <li>Klik <a href="jadwal_kegiatan.php" style="color:green;">disini</a> untuk melihat jadwal kegiatan seleksi.</li>
          </ul>
       </div>
       <?php } ?>
     </div>
  </div>
  <div class="row-fluid">
    <table class="table table-bordered table-hover" style="font-size:12px;">
      <thead>
        <tr>
          <th>NIP</th>
          <th>Nama</th>
          <th>No. HP</th>
          <th>BKKBN</th>
          <th>Unit Kerja</th>
          <th>Universitas Pilihan 1</th>
          <th>Pilihan</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $querydataf = "SELECT * FROM formulir WHERE nip='$_SESSION[nip]'";
        $sqldataf = mysqli_query($koneksi,$querydataf);
        $listdataf = mysqli_fetch_array($sqldataf);
        ?>
        <tr>
          <td style="text-align: center"><?php echo $listdataf['nip']; ?></td>
          <td style="text-align: center"><?php echo $listdataf['nama']; ?></td>
          <td style="text-align: center"><?php echo $listdataf['tlp']; ?></td>
          <td style="text-align: center"><?php
          $sql_f="SELECT * FROM data_bkkbn WHERE id_bkkbn='$listdataf[provinsi_kantor]'";
          $query_f=mysqli_query($koneksi,$sql_f);
          $data_f=mysqli_fetch_array($query_f);
          echo $data_f['prov']; ?>
          </td>
          <td style="text-align: center"><?php
          $switch="SELECT * FROM unit_kerja WHERE id_uk='$listdataf[unit_organ]'";
          $query_switch=mysqli_query($koneksi,$switch);
          $data_switch=mysqli_fetch_array($query_switch);
          $cekdata=mysqli_num_rows($query_switch);
          if ($cekdata>=1) {
            echo $data_switch['unit_kerja'];
          }
          elseif ($cekdata<1) {
            echo "$listdataf[unit_organ]";
          } ?></td>

          <td style="text-align: center"><?php
          $steady="SELECT * FROM universitas WHERE id_univ='$listdataf[univ_1]'";
          $query_steady=mysqli_query($koneksi,$steady);
          $data_steady=mysqli_fetch_array($query_steady);

          $shine="SELECT * FROM jurusan WHERE idj='$listdataf[programstudi_1]'";
          $query_shine=mysqli_query($koneksi,$shine);
          $data_shine=mysqli_fetch_array($query_shine);
          echo "$data_steady[univ] , $data_shine[jurusan]"; ?></td>

          <td style="text-align: center"><a class="btn btn-small btn-info" role="button" href="detailformulir.php">Detail</a>
            <?php
            if ($databatas['formulir']=='1') {
              echo "
              <div class=btn-group>
                <a class=\"btn btn-small btn-success\" role=\"button\" href=\"ubahformulir.php\">Ubah</a>
                <button class=\"btn btn-small btn-success dropdown-toggle\" data-toggle=\"dropdown\">
                <span class=\"caret\"></span>
                </button>
                <ul class=\"dropdown-menu pull-right\">
                  <li><a href=\"ubahkantor.php\">Ubah Data Kantor</a></li>
                  <li><a href=\"ubahpilihanuniv.php\">Ubah Pilihan Universitas</a></li>
                </ul>
              </div>";
            } ?>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  </div>
<?php } ?>
