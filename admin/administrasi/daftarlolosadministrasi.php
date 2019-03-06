<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <h3 class="page-header">Administrasi</h3>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <ul class="nav nav-tabs">
      	  <li role="presentation"><a href="pernyataan.php">Surat Pernyataan</a></li>
      	  <li role="presentation"><a href="formulir.php">Data Formulir</a></li>
      	  <li role="presentation"><a href="berkasdokumen.php">Berkas Dokumen</a></li>
          <li role="presentation" class="active"><a href="daftarlolosadministrasi.php">Daftar CPB Lolos Seleksi Administrasi</a></li>
      	</ul>
        <br>
        <?php
        if (isset($_POST['lanjut'])) {
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $unit_kerja = $_POST['unit_kerja'];
        $tahun= date('Y');
        $pengumuman = "<p>Jakarta, 00 September $tahun</p>
<p>No&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; :&nbsp; 000/WWC/$tahun<br />Lampiran&nbsp;&nbsp; :&nbsp; -<br />Perihal&nbsp; &nbsp; &nbsp;&nbsp; :&nbsp; Wawancara Seleksi Program Beasiswa Master (S2) Luar Negeri<br /><br />Kepada Yth.<br />Kepala $unit_kerja<br /><br />di -<br />Tempat<br /><br />Dengan hormat,</p>
<p>Menindaklanjuti hasil seleksi administrasi dalam rangka seleksi calon peserta studi jangka panjang (S2) luar negeri BKKBN, maka Pusat Pelatihan dan Kerja Sama Internasional Kependudukan dan KB (PULIN) akan melaksanakan tahapan seleksi selanjutnya yaitu Wawancara.</p>
<p>Sehubungan dengan hal tersebut di atas, kami mengharapkan Bapak/Ibu dapat menugaskan Sdr/i $nama untuk mengikuti tahapan seleksi wawancara pada :&nbsp;&nbsp; &nbsp;</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hari/Tanggal &nbsp;&nbsp; &nbsp;&nbsp; :&nbsp; Hari, Tanggal Bulan $tahun<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Waktu &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; :&nbsp; 09:00 WIB s.d selesai<br />&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tempat&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp; Ruang PULIN<br />&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Agenda&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; :&nbsp; Wawancara Seleksi Program Beasiswa Master (S2)<br />&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Luar Negeri</p>
<p>Biaya akomodasi dan tiket pesawat Provinsi &ndash; Jakarta p.p diharapkan dapat ditanggung oleh Unit Kerja asal peserta.</p>
<p>Demikian disampaikan, atas perhatian dan kerja samanya kami ucapkan terima kasih.</p>
<p>Kepala Pusat Pelatihan dan <br />Kerja Sama Internasional KKB</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>Ir. Hermansyah, MA.</p>";
        $sqltambah = "INSERT INTO wawancara VALUES ('$nip','$pengumuman','','','','','','')";
        $querytambah = mysqli_query($koneksi,$sqltambah);

        if ($querytambah) {
        echo "<script>alert('Data Berhasil diSimpan'); location.href='beranda.php';</script>";
        }
        else {
          echo "<script>alert('DATA SUDAH ADA'); location.href='daftarlolosadministrasi.php';</script>";
        }
        }

        $sql_adm = "SELECT pernyataan.nip AS admnip , formulir.nama AS namaf ,
        formulir.tlp AS tlp , formulir.unit_organ AS unit_kerja , formulir.jabatan_skrg AS jabatan , formulir.provinsi_kantor AS provinsi ,
        formulir.univ_1 AS univ_pertama , formulir.programstudi_1 AS jurusan
        FROM dokumen , formulir , pernyataan WHERE pernyataan.nip = formulir.nip AND pernyataan.nip = dokumen.nip AND formulir.nip = dokumen.nip
        AND pernyataan.status_cpb = 'Lolos' AND formulir.status_cpb = 'Lolos' AND dokumen.status_cpb = 'Lolos'";
        $query_adm = mysqli_query($koneksi,$sql_adm);
        ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <div align="center" style="margin-top:-8px; margin-bottom:-7px">
              <a class="btn btn-success btn-xs" style="text-align:center;" href="laporan/administrasi.php" role="button">Cetak Laporan</a>
            </div>
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="table-responsive">
            <table class="table table-bordered table-hover data" style="font-size:13px;">
              <thead>
                <tr>
                  <th style="text-align:center;">No</th>
                  <th style="text-align:center;">NIP</th>
                  <th style="text-align:center;">Nama</th>
                  <th style="text-align:center;">No. HP</th>
                  <th style="text-align:center;">Unit Kerja</th>
                  <th style="text-align:center;">Jabatan</th>
                  <th style="text-align:center;">Pilihan Pertama</th>
                  <th style="text-align:center;">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $no=1;
              while ($adm = mysqli_fetch_array($query_adm)) {
              ?>
              <tr>
                <form action="" method="POST">
                <td align="center"><?php echo $no ?></td>
                <td align="center"><input type="hidden" name="nip" value="<?php echo $adm['admnip']; ?>"><?php echo $adm['admnip']; ?></td>
                <td align="center"><input type="hidden" name="nama" value="<?php echo $adm['namaf']; ?>"><?php echo $adm['namaf']; ?></td>
                <td align="center"><?php echo $adm['tlp']; ?></td>
                <td align="center">
                  <?php $sql_f="SELECT * FROM data_bkkbn WHERE id_bkkbn='$adm[provinsi]'";
                  $query_f=mysqli_query($koneksi,$sql_f);
                  $data_f=mysqli_fetch_array($query_f);
                  $provinsijaya=$data_f['prov'];
                  $sql_g="SELECT * FROM unit_kerja WHERE id_uk='$adm[unit_kerja]'";
                  $query_g=mysqli_query($koneksi,$sql_g);
                  $data_g=mysqli_fetch_array($query_g);
                  $cekdata=mysqli_num_rows($query_g);
                  if ($cekdata>=1) {
                    echo "$data_g[unit_kerja], $provinsijaya";?>
                    <input type="hidden" name="unit_kerja" value="<?php echo $data_g['unit_kerja']; ?>, <?php echo $provinsijaya; ?>">
                  <?php }
                  elseif ($cekdata<1) {
                    echo "$adm[unit_kerja], $provinsijaya"; ?>
                    <input type="hidden" name="unit_kerja" value="<?php echo $adm['unit_kerja']; ?>, <?php echo $provinsijaya; ?>">
                  <?php }
                   ?>
                </td>
                <td align="center"><?php echo $adm['jabatan']; ?></td>
                <td align="center"><?php
                $steady="SELECT * FROM universitas WHERE id_univ='$adm[univ_pertama]'";
                $query_steady=mysqli_query($koneksi,$steady);
                $data_steady=mysqli_fetch_array($query_steady);

                $shine="SELECT * FROM jurusan WHERE idj='$adm[jurusan]'";
                $query_shine=mysqli_query($koneksi,$shine);
                $data_shine=mysqli_fetch_array($query_shine);
                echo "$data_steady[univ] , $data_shine[jurusan]";
                 ?></td>
                <td align="center"><button type='submit' name='lanjut' class='btn btn-primary btn-xs'  onclick="return confirm('Apakah anda yakin ingin menlanjutkan <?php echo $adm['admnip']; ?> ke tahap wawancara ?')">Lanjut</button></td>
              </form>
              </tr>
              <?php
              $no++;}
              ?>
              </tbody>
            </table>
          </div>
          </div>
              <!-- /.panel-body -->
        </div>
          <!-- /.panel -->
      </div>
    </div>
  </div>
</div>
<?php
} ?>
