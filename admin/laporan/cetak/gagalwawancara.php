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
<h3 align="center">Daftar Calon Penerima Beasiswa Gagal Lolos Seleksi Wawancara</h3>
    <table border="1" cellpadding="5" cellspacing="0" width="100%">

      <tr>
        <th style="text-align:center;">No</th>
        <th style="text-align:center;">NIP</th>
        <th style="text-align:center;">Nama</th>
        <th style="text-align:center;">Unit Kerja</th>
        <th style="text-align:center;">No. HP</th>
      </tr>

    <?php


    $filename ="Daftar_CPB_Gagal_Lolos_Seleksi_Wawancara.xls";
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
        include "../../../config/koneksi.php";

        $sql_gwwc = "SELECT * FROM wawancara A INNER JOIN formulir B ON B.nip=A.nip WHERE A.status_cpb='Tidak Lolos'";
        $query_gwwc = mysqli_query($koneksi,$sql_gwwc);
        $no=1;
        while ($data_gwwc = mysqli_fetch_array($query_gwwc)) { ?>
          <tr>
            <td align="center"><?php echo $no ?></td>
            <td align="center"><?php echo $data_gwwc['nip']; ?></td>
            <td align="center"><?php echo $data_gwwc['nama'];?></td>
            <td align="center"><?php
                $sql_f="SELECT * FROM data_bkkbn WHERE id_bkkbn='$data_gwwc[provinsi_kantor]'";
                $query_f=mysqli_query($koneksi,$sql_f);
                $data_f=mysqli_fetch_array($query_f);
                $sql_g="SELECT * FROM unit_kerja WHERE id_uk='$data_gwwc[unit_organ]'";
                $query_g=mysqli_query($koneksi,$sql_g);
                $data_g=mysqli_fetch_array($query_g);
                $cekdatan=mysqli_num_rows($query_g);
                if ($cekdatan>=1) {
                  echo "$data_g[unit_kerja], $data_f[prov]";
                 }
                elseif ($cekdatan<1) {
                  echo "$data_gwwc[unit_organ], $data_f[prov]"; }
              ?>
            </td>
            <td align="center"><?php echo $data_gwwc['tlp']; ?></td>
          </tr>
          <?php
          $no++;}
          ?>

  </table>
  </body>
</html>
