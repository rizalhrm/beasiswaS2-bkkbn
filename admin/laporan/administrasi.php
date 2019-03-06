<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style type="text/css">

    table{
      font-size: 14px;
    }

      table th{
        background-color: #4a4a4a;
        color: white;
      }

    </style>


  </head>
  <body>
<h3 align="center">Daftar Calon Penerima Beasiswa Lolos Seleksi Administrasi</h3>
    <table border="1" cellpadding="5" cellspacing="0" width="100%">

      <tr>
        <th style="text-align:center;">No</th>
        <th style="text-align:center;">NIP</th>
        <th style="text-align:center;">Nama</th>
        <th style="text-align:center;">No. HP</th>
        <th style="text-align:center;">Unit Kerja</th>
        <th style="text-align:center;">Jabatan</th>
        <th style="text-align:center;">Pilihan Pertama</th>
      </tr>

    <?php


    $filename ="Daftar_CPB_Lolos_Seleksi_Administrasi.xls";
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename='.$filename);
    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
    // header('Content-type: application/octet-stream');
    // header('Content-Disposition: attachment; filename='. $filename);
    // header('Pragma: no-cache');
    // header('Expires: 0');

    // header("Content-Type: application/download");
    // header("Content-Disposition: inline; filename=". $filename);
    // header("Expires: 0");
    // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    // header("Pragma: public");

    // include 'alumni.php';
        include "../../config/koneksi.php";

        $select = "SELECT * from wawancara A INNER JOIN formulir B ON B.nip=A.nip";
        $queryselect = mysqli_query($koneksi,$select);
        $no=1;
        while ($wwc = mysqli_fetch_array($queryselect)) {  ?>
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

  </table>
  </body>
</html>
