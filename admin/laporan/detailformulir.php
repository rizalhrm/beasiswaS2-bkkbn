<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style type="text/css">

    table{
      font-size: 14px;
    }


    </style>


  </head>
  <body>
<h3 align="center">Data Formulir Pendaftaran Beasiswa S2 Luar Negeri</h3>
    <?php

    $filename ="Data_Formulir_Pendaftaran_Beasiswa_S2_Luar_Negeri.xls";
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename='.$filename);
    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";


        include "../../config/koneksi.php";

        $id = $_GET['nip'];
        $select = "SELECT * FROM formulir WHERE nip='$id'";
        $queryselect = mysqli_query($koneksi,$select);
        $dataf = mysqli_fetch_array($queryselect);
         ?>


          <table border="1" cellpadding="5" cellspacing="0" width="80%">
            <tr>
              <td><b>NIP</b></td>
              <td><?php echo $dataf['nip']; ?></td>
            </tr>
            <tr>
              <td><b>Nama</b></td>
              <td><?php echo $dataf['nama']; ?></td>
            </tr>
            <tr>
              <td><b>Jenis Kelamin</b></td>
              <td>
                <?php
                $jk = $dataf['jk'];
                if ($jk=='L') {
                  echo "Laki-Laki";
                }
                elseif ($jk=='P') {
                  echo "Perempuan";
                }
                ?>
              </td>
            </tr>
            <tr>
              <td><b>Tempat / Tanggal Lahir</b></td>
              <td><?php echo "$dataf[tempat_lahir] / $dataf[tgl_lahir]"; ?></td>
            </tr>
            <tr>
              <td><b>Usia</b></td>
              <td><?php echo "$dataf[usia]"; ?></td>
            </tr>
            <tr>
              <td><b>Agama</b></td>
              <td><?php echo $dataf['agama']; ?></td>
            </tr>
            <tr>
               <td><b>Status Pernikahan</b></td>
               <td><?php echo $dataf['statusnikah']; ?></td>
            </tr>
            <tr>
                <td><b>Jumlah Anak</b></td>
                <td><?php echo $dataf['jmlanak']; ?></td>
            </tr>
            <tr>
              <td><b>Nomor HP</b></td>
              <td><?php echo $dataf['tlp']; ?></td>
            </tr>
            <tr>
              <td><b>E-mail</b></td>
              <td><?php echo $dataf['email']; ?></td>
            </tr>
            <tr>
              <td style="font-weight:bold; background-color:#ccc;" colspan="2">Data Tempat Tinggal</td>
            </tr>
            <tr>
              <td><b>Alamat Rumah</b></td>
              <td><?php echo $dataf['alamat_rumah']; ?></td>
            </tr>
            <tr>
              <td><b>Kabupaten/Kota</b></td>
              <td><?php echo $dataf['kota_rumah']; ?></td>
            </tr>
            <tr>
              <td><b>Provinsi</b></td>
              <td><?php echo $dataf['provinsi_rumah']; ?></td>
            </tr>
            <tr>
              <td><b>Kode Pos</b></td>
              <td><?php echo $dataf['kodepos_rumah']; ?></td>
            </tr>
            <tr>
              <td style="font-weight:bold; background-color:#ccc;" colspan="2">Keluarga Dekat yang Bisa dihubungi</td>
            </tr>
            <tr>
              <td><b>Nama</b></td>
              <td><?php echo $dataf['nama_kel']; ?></td>
            </tr>
            <tr>
              <td><b>Alamat</b></td>
              <td><?php echo $dataf['alamat_kel']; ?></td>
            </tr>
            <tr>
              <td><b>Nomor HP</b></td>
              <td><?php echo $dataf['tlp_kel']; ?></td>
            </tr>
            <tr>
              <td><b>Hubungan Kekerabatan</b></td>
              <td><?php echo $dataf['hubungan']; ?></td>
            </tr>
            <tr>
              <td style="font-weight:bold; background-color:#ccc;" colspan="2">Data Kantor</td>
            </tr>
            <tr>
              <td><b>BKKBN (Pusat/Provinsi)</b></td>
              <td><?php $sql_f="SELECT * FROM data_bkkbn WHERE id_bkkbn='$dataf[provinsi_kantor]'";
              $query_f=mysqli_query($koneksi,$sql_f);
              $data_f=mysqli_fetch_array($query_f);
              echo $data_f['prov']; ?></td>
            </tr>
            <tr>
              <td><b>Alamat Kantor</b></td>
              <td><?php echo $dataf['alamat_kantor']; ?></td>
            </tr>
            <tr>
              <td><b>Unit Kerja</b></td>
              <td><?php
              $switch="SELECT * FROM unit_kerja WHERE id_uk='$dataf[unit_organ]'";
              $query_switch=mysqli_query($koneksi,$switch);
              $data_switch=mysqli_fetch_array($query_switch);
              $cekdata=mysqli_num_rows($query_switch);
              if ($cekdata>=1) {
                echo $data_switch['unit_kerja'];
              }
              elseif ($cekdata<1) {
                echo "$dataf[unit_organ]";
              }
              ?></td>
            </tr>
            <tr>
              <td><b>Jabatan Sekarang</b></td>
              <td><?php echo $dataf['jabatan_skrg']; ?></td>
            </tr>
            <tr>
              <td><b>Pangkat/Golongan</b></td>
              <td><?php echo $dataf['pangkat']; ?></td>
            </tr>
            <tr>
              <td><b>Masa Kerja</b></td>
              <td><?php echo $dataf['masakerja']; ?></td>
            </tr>
            <tr>
              <td style="font-weight:bold; background-color:#ccc;" colspan="2">Pendidikan Terakhir (S1)</td>
            </tr>
            <tr>
              <td><b>Asal Perguruan Tinggi</b></td>
              <td><?php echo $dataf['nama_pt']; ?></td>
            </tr>
            <tr>
              <td><b>Fakultas</b></td>
              <td><?php echo $dataf['fakultas']; ?></td>
            </tr>
            <tr>
              <td><b>Program Studi</b></td>
              <td><?php echo $dataf['program_studi']; ?></td>
            </tr>
            <tr>
              <td><b>Tahun Kelulusan</b></td>
              <td><?php echo $dataf['thn_lulus']; ?></td>
            </tr>
            <tr>
              <td><b>Judul Thesis</b></td>
              <td><?php echo $dataf['judul_thesis']; ?></td>
            </tr>
            <tr>
              <td><b>Nilai Kelulusan/IPK</b></td>
              <td><?php echo $dataf['nilai_ipk']; ?></td>
            </tr>
            <tr>
              <td style="font-weight:bold; background-color:#ccc;" colspan="2">Rencana Studi S2</td>
            </tr>
            <tr>
              <td><b>Pilihan Pertama</b></td>
              <td><?php
              $steady="SELECT * FROM universitas WHERE id_univ='$dataf[univ_1]'";
              $query_steady=mysqli_query($koneksi,$steady);
              $data_steady=mysqli_fetch_array($query_steady);

              $shine="SELECT * FROM jurusan WHERE idj='$dataf[programstudi_1]'";
              $query_shine=mysqli_query($koneksi,$shine);
              $data_shine=mysqli_fetch_array($query_shine);
              echo "$data_steady[univ] , $data_shine[jurusan]"; ?></td>
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
            </tr>
            <tr>
              <td><b>Pilihan ketiga</b></td>
              <td><?php
              $steady3="SELECT * FROM universitas WHERE id_univ='$dataf[univ_3]'";
              $query_steady3=mysqli_query($koneksi,$steady3);
              $data_steady3=mysqli_fetch_array($query_steady3);

              $shine3="SELECT * FROM jurusan WHERE idj='$dataf[programstudi_3]'";
              $query_shine3=mysqli_query($koneksi,$shine3);
              $data_shine3=mysqli_fetch_array($query_shine3);
              echo "$data_steady3[univ] , $data_shine3[jurusan]";
               ?></td>
            </tr>
            <tr>
              <td><b>Esai Maksimal 500 Kata</b></td>
              <td><?php echo $dataf['esai']; ?></td>
            </tr>
          </table>
  </body>
</html>
