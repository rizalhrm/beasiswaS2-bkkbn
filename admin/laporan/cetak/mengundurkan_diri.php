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
<h3 align="center">Daftar Calon Penerima Beasiswa Mengundurkan Diri</h3>
    <table border="1" cellpadding="5" cellspacing="0" width="100%">

      <tr>
        <th style="text-align:center;">No.</th>
        <th style="text-align:center;">NIP</th>
        <th style="text-align:center;">Nama</th>
        <th style="text-align:center;">Unit Kerja</th>
        <th style="text-align:center;">No. HP</th>
        <th style="text-align:center;">Email</th>
        <th style="text-align:center;">Alamat Rumah</th>
        <th style="text-align:center;">Nama Keluarga</th>
        <th style="text-align:center;">No. HP Keluarga</th>
        <th style="text-align:center;">Hubungan Keluarga</th>
        <th style="text-align:center;">Alasan</th>
      </tr>

    <?php


    $filename ="Daftar_CPB_Mengundurkan_Diri.xls";
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

        $querya = "SELECT * FROM mengundurkan_diri ORDER BY nip ASC";
        $sqla = mysqli_query($koneksi,$querya);
        $no=1;
        while ($list = mysqli_fetch_array($sqla)) { ?>
          <tr>
            <td align="center"><?php echo $no;?></td>
            <td align="center"><?php echo $list['nip']; ?></td>
            <td align="center">
              <?php echo $list['nama']; ?>
            </td>
            <td align="center">
              <?php echo $list['unit_kerja']; ?>
            </td>
            <td align="center">
              <?php echo $list['tlp']; ?>
            </td>
            <td align="center">
              <?php echo $list['email']; ?>
            </td>
            <td align="center">
              <?php echo $list['alamat_rumah']; ?>
            </td>
            <td align="center">
              <?php echo $list['nama_kel']; ?>
            </td>
            <td align="center">
              <?php echo $list['tlp_kel']; ?>
            </td>
            <td align="center">
              <?php echo $list['hubungan']; ?>
            </td>
            <td align="center">
              <?php echo $list['alasan']; ?>
            </td>
          </tr>
          <?php
          $no++;}
          ?>

  </table>
  </body>
</html>
