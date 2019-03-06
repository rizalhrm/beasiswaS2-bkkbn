<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cetak Data Alumni S2 Luar Negeri</title>
    <style type="text/css">

    table{
      font-size: 11px;
    }

      table .no{
        width: 33px;
      }

      table .nama{
        width: 120px;
      }

      table .nip{
        width: 70px;
      }

      table .tempat_tugas{
        width: 140px;
      }

      table .bidang_studi{
        width: 120px;
      }

      table .univ{
        width: 120px;
      }

      table .gelar{
        width: 45px
      }

      table .jenjang{
        width: 45px;
      }

      table .ket{
        width: 70px;
      }

      table th{
        background-color: royalblue;
        color: white;
      }

      table .tdno{
        vertical-align: middle;
        line-height: 300px;
        text-align: center;
      }

      table .tdnama{
         vertical-align: middle;
        line-height: 200px;
        text-align: center;
      }

      table .tdnip{
        text-align: center;
      vertical-align: middle;
      line-height: 300px;
      mso-number-format:\@;
      }

      table .tdbidang_studi{
        text-align: center;
      vertical-align: middle;
      line-height: 300px;
      }

      table .tduniv{
        text-align: center;
      vertical-align: middle;
      line-height: 300px;
      }

      table .tdgelar{
        text-align: center;
      vertical-align: middle;
      line-height: 300px;
      }

      table .tdjenjang{
        text-align: center;
      vertical-align: middle;
      line-height: 300px;
      }

      table .tdmulai{
        text-align: center;
      vertical-align: middle;
      line-height: 300px;
      }

      table .tdselesai{
        text-align: center;
      vertical-align: middle;
      line-height: 300px;
      }

      table .tdsponsor{
        text-align: center;
      vertical-align: middle;
      line-height: 300px;
      }


    </style>


  </head>
  <body>
<h2 align="center">Data Alumni Penerima Beasiswa S2 Luar Negeri</h2>
    <table border="1" cellpadding="5" cellspacing="0" width="250">

      <tr>
        <th class="no">No</th>
        <th class="nama">Nama</th>
        <th class="nip">NIP</th>
        <th class="tempat_tugas">Instansi/Unit Kerja</th>
        <th class="bidang_studi">Jurusan</th>
        <th class="univ">Universitas</th>
        <th class="gelar">Gelar</th>
        <th class="mulai">Mulai</th>
        <th class="selesai">Selesai</th>
        <th class="sponsor">Sponsor</th>
        <th class="ket">Keterangan</th>
      </tr>

    <?php


    $filename ="Data_Alumni_Penerima_Beasiswa_S2_Luar_Negeri.xls";
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
        $primary=$_POST['primary'];

        $select ="SELECT * FROM alumni WHERE id IN (".implode(',',$primary).") ORDER BY id DESC";
        $queryselect = mysqli_query($koneksi,$select);
        $no=1;
        while ($isi = mysqli_fetch_array($queryselect)) {
          // $no = $isi['no'];
          $nama = $isi['nama_alumni'];
          $nip = $isi['nip'];
          $tempat_tugas = $isi['tempat_tugas'];
          $bidang_study = $isi['bidang_studi'];
          $univ = $isi['univ'];
          $gelar = $isi['gelar'];
          $mulai = $isi['mulai'];
          $selesai = $isi['selesai'];
          $sponsor = $isi['sponsor'];
          $ket = $isi['keterangan'];

          echo "
          <tr>
            <td align=\"center\" class=\"tdno\">$no</td>
            <td class=\"tdnama\">$nama</td>
            <td class=\"tdnip\">$nip</td>
            <td class=\"tdtempat_tugas\">$tempat_tugas</td>
            <td class=\"tdbidang_studi\">$bidang_study</td>
            <td class=\"tduniv\">$univ</td>
            <td class=\"tdgelar\" align=\"center\">$gelar</td>
            <td class=\"tdmulai\" align=\"center\">$mulai</td>
            <td class=\"tdselesai\" align=\"center\">$selesai</td>
            <td class=\"tdsponsor\" align=\"center\">$sponsor</td>
            <td>$ket</td>
          </tr>
          "; $no++;


        }





    ?>
  </table>
  </body>
</html>
