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
<h3 align="center">Daftar Calon Penerima Beasiswa Lolos Seleksi Ujian IELTS</h3>
    <table border="1" cellpadding="5" cellspacing="0" width="100%">
      <tr>
        <th style="text-align:center;">No</th>
        <th style="text-align:center;">NIP</th>
        <th style="text-align:center;">Nama</th>
        <th style="text-align:center;">Overall Band</th>
        <th style="text-align:center;">Status</th>
      </tr>
    <?php


    $filename ="Daftar_CPB_Lolos_Seleksi_Ujian_IELTS.xls";
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

        $select = "SELECT A.nip , B.nama, A.ket4 , A.overall_band ,A.status_cpb AS status_ielts  from ielts A INNER JOIN formulir B ON B.nip=A.nip WHERE A.status_cpb='Lolos'";
        $queryselect = mysqli_query($koneksi,$select);
        $no=1;
        while ($its = mysqli_fetch_array($queryselect)) {  ?>
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

  </table>
  </body>
</html>
