<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style type="text/css">

    table{
      font-size: 12px;
    }

      table th{
        background-color: #4a4a4a;
        color: white;
      }

    </style>


  </head>
  <body>
<h3 align="center">Daftar Karyawan Sedang Tugas Belajar S2 Luar Negeri</h3>
    <table border="1" cellpadding="5" cellspacing="0" width="100%">

      <tr>
        <th style="text-align:center;">No.</th>
        <th style="text-align:center;">NIP</th>
        <th style="text-align:center;">Nama</th>
        <th style="text-align:center;">JK</th>
        <th style="text-align:center;">Email</th>
        <th style="text-align:center;">Usia</th>
        <th style="text-align:center;">Status Pernikahan</th>
        <th style="text-align:center;">Jurusan</th>
        <th style="text-align:center;">Universitas</th>
        <th style="text-align:center;">Mulai</th>
        <th style="text-align:center;">Unit Kerja</th>
        <th style="text-align:center;">Jabatan</th>
        <th style="text-align:center;">Overall Band</th>
        <th style="text-align:center;">Pembiayaan</th>
      </tr>

    <?php


    $filename ="Daftar_Karyawan_Sedang_Tugas_Belajar_S2_LN.xls";
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

        $querya = "SELECT * FROM tubel ORDER BY nip ASC";
        $sqla = mysqli_query($koneksi,$querya);
        $no=1;
        while ($list = mysqli_fetch_array($sqla)) { ?>
          <tr>
            <td align="center"><?php echo $no;?></td>
            <td align="center"><?php echo $list['nip']; ?></td>
            <td align="center">
              <?php echo $list['nama']; ?>
            </td>
            <td align="center"><?php echo $list['jk']; ?></td>
            <td align="center">
              <?php echo $list['email']; ?>
            </td>
            <td align="center"><?php echo $list['usia']; ?></td>
            <td align="center"><?php echo $list['statusnikah']; ?></td>
            <td align="center">
              <?php echo $list['jurusan']; ?>
            </td>
            <td align="center">
              <?php echo $list['univ']; ?>
            </td>
            <td align="center">
              <?php echo $list['mulai']; ?>
            </td>
            <td align="center">
              <?php echo $list['unit_kerja']; ?>
            </td>
            <td align="center">
              <?php echo $list['jabatan']; ?>
            </td>
            <td align="center">
              <?php echo $list['overall_band']; ?>
            </td>
            <td align="center">
              <?php echo $list['pembiayaan']; ?>
            </td>
          </tr>
          <?php
          $no++;}
          ?>

  </table>
  </body>
</html>
