<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <h3 class="page-header">Wawancara</h3>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <ul class="nav nav-tabs">
      	  <li role="presentation"><a href="pengumuman_wawancara.php">Pengumuman</a></li>
      	  <li role="presentation"><a href="sesi_wawancara.php">Sesi Wawancara</a></li>
      	  <li role="presentation"><a href="penilaianwawancara.php">Penilaian</a></li>
          <li role="presentation"  class="active"><a href="daftarloloswawancara.php">Daftar CPB Lolos Seleksi Wawancara</a></li>
      	</ul>
        <br>
        <?php
        if (isset($_POST['lanjut'])) {
        $nip = $_POST['nip'];
        $nama=$_POST['nama'];
        $unit_kerja=$_POST['unit_kerja'];
        $tahun= date('Y');
        $kursus = "select * from informasi where id = '5'";
        $querykursus = mysqli_query($koneksi,$kursus);
        $isikursus = mysqli_fetch_array($querykursus);
        $placement="<p>Jakarta, 00 Oktober $tahun</p>
        <p>No&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; :&nbsp; 000/PL/$tahun<br />Lampiran&nbsp;&nbsp; :&nbsp; -<br />Perihal&nbsp; &nbsp; &nbsp;&nbsp; :&nbsp; Pemanggilan Placement Test bagi Peserta Kursus Intensif Bahasa Inggris IELTS
        <br /><br />Kepada Yth.<br />Kepala $unit_kerja<br /><br />di -<br />Tempat<br /><br />Dengan hormat,</p>
        <p>Menindaklanjuti hasil wawancara dalam rangka seleksi calon peserta studi jangka panjang (S2) luar negeri, maka Pusat Pelatihan dan Kerja Sama Internasional Kependudukan dan KB (PULIN) akan melaksanakan tahapan seleksi selanjutnya yaitu kursus intensif Bahasa Inggris (IELTS) tetapi sebelum kursus diadakan, para calon peserta diwajibkan mengikuti placement test.</p>
        <p>Sehubungan dengan hal tersebut di atas, kami mengharapkan Bapak/Ibu dapat menugaskan Sdr/i $nama untuk mengikuti placement test pada :&nbsp;&nbsp; &nbsp;</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hari/Tanggal &nbsp;&nbsp; &nbsp;&nbsp; :&nbsp; Hari, Tanggal Bulan $tahun<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Waktu &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; :&nbsp; 10:00 WIB s.d selesai<br />&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tempat&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp; $isikursus[judul];<br />&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Agenda&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; :&nbsp; <i>Placement Test</i></p>
        <p>Biaya akomodasi dan tiket pesawat Provinsi &ndash; Jakarta p.p diharapkan dapat ditanggung oleh Unit Kerja asal peserta.</p>
        <p>Demikian disampaikan, atas perhatian dan kerja samanya  kami ucapkan terima kasih.</p>
        <p>Kepala Pusat Pelatihan dan <br />Kerja Sama Internasional KKB</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>Ir. Hermansyah, MA.</p>";
        $sqltambah = "INSERT INTO ielts VALUES ('$nip','$placement','','','','','','','')";
        $querytambah = mysqli_query($koneksi,$sqltambah);

        if ($querytambah) {
        echo "<script>alert('Data Berhasil diSimpan'); location.href='beranda.php';</script>";
        }
        else {
          echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='daftarloloswawancara.php';</script>";
        }
        }

        $sql_wwc = "SELECT A.nip, B.nama, B.tlp, B.unit_organ, B.jabatan_skrg, B.provinsi_kantor, B.univ_1, B.programstudi_1, A.status_cpb AS status_wwc FROM wawancara A INNER JOIN formulir B ON B.nip=A.nip WHERE A.status_cpb='Lolos'";
        $query_wwc = mysqli_query($koneksi,$sql_wwc);
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
              <div align="center" style="margin-top:-8px; margin-bottom:-7px">
                <a class="btn btn-success btn-xs" style="text-align:center;" href="laporan/wawancara.php" role="button">Cetak Laporan</a>
              </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <div class="table-responsive">
              <table class="table table-bordered table-hover data" style="font-size:12px;">
                <thead>
                  <tr>
                    <th style="text-align:center;">No</th>
                    <th style="text-align:center;">NIP</th>
                    <th style="text-align:center;">Nama</th>
                    <th style="text-align:center;">No. HP</th>
                    <th style="text-align:center;">Unit Kerja</th>
                    <th style="text-align:center;">Jabatan</th>
                    <th style="text-align:center;">Pilihan Pertama</th>
                    <th style="text-align:center;">Status</th>
                    <th style="text-align:center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                while ($wwc = mysqli_fetch_array($query_wwc)) {
                ?>
                <tr>
                  <form action="" method="POST">
                  <td align="center"><?php echo $no ?></td>
                  <td align="center"><input type="hidden" name="nip" value="<?php echo $wwc['nip']; ?>"><?php echo $wwc['nip']; ?></td>
                  <td align="center"><input type="hidden" name="nama" value="<?php echo $wwc['nama']; ?>"><?php echo $wwc['nama']; ?></td>
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
                    echo "$data_g[unit_kerja], $data_f[prov]";?>
                    <input type="hidden" name="unit_kerja" value="<?php echo $data_g['unit_kerja']; ?>, <?php echo $data_f['prov']; ?>">
                  <?php }
                  elseif ($cekdata<1) {
                    echo "$wwc[unit_organ], $data_f[prov]"; ?>
                    <input type="hidden" name="unit_kerja" value="<?php echo $wwc['unit_organ']; ?>, <?php echo $data_f['prov']; ?>">
                  <?php } ?></td>
                  <td align="center"><?php echo $wwc['jabatan_skrg']; ?></td>
                  <td align="center"><?php
                  $steady="SELECT * FROM universitas WHERE id_univ='$wwc[univ_1]'";
                  $query_steady=mysqli_query($koneksi,$steady);
                  $data_steady=mysqli_fetch_array($query_steady);

                  $shine="SELECT * FROM jurusan WHERE idj='$wwc[programstudi_1]'";
                  $query_shine=mysqli_query($koneksi,$shine);
                  $data_shine=mysqli_fetch_array($query_shine);
                  echo "$data_steady[univ] , $data_shine[jurusan]"; ?></td>
                  <td align="center">
                    <?php  echo $wwc['status_wwc']; ?>
                  </td>
                  <td align="center">
                    <button type='submit' name='lanjut' class='btn btn-primary btn-xs'  onclick="return confirm('Apakah anda yakin ingin menlanjutkan <?php echo $wwc['nip']; ?> ke tahap kursus IELTS ?')">Lanjut</button>
                  </td>
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
      </div>
    </div>
  </div>
</div>
<?php
} ?>
