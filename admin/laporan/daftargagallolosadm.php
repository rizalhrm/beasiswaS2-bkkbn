<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <h3 class="page-header">Daftar CPB Gagal Lolos Seleksi</h3>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <ul class="nav nav-tabs">
      	  <li role="presentation" class="active"><a href="daftargagallolosadm.php">Administrasi</a></li>
      	  <li role="presentation"><a href="daftargagalloloswwc.php">Wawancara</a></li>
      	  <li role="presentation"><a href="daftargagallolosielts.php">Ujian IELTS</a></li>
          <li role="presentation"><a href="daftargagallolosprj.php">Surat Perjanjian</a></li>
      	</ul>
        <br>
        <?php
        $sql_gadm = "SELECT A.nip AS anip , B.nama , B.provinsi_kantor, B.unit_organ , B.tlp FROM pernyataan A LEFT JOIN formulir B ON B.nip=A.nip LEFT JOIN dokumen C ON C.nip=B.nip WHERE A.status_cpb='Tidak Lolos' OR B.status_cpb='Tidak Lolos' OR C.status_cpb='Tidak Lolos'";
        $query_gadm = mysqli_query($koneksi,$sql_gadm);
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
              <div align="center" style="margin-top:-8px; margin-bottom:-7px">
                <a class="btn btn-success btn-xs" style="text-align:center;" href="laporan/cetak/gagaladministrasi.php" role="button">Cetak Laporan</a>
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
                    <th style="text-align:center;">Unit Kerja</th>
                    <th style="text-align:center;">No. HP</th>
                    <th style="text-align:center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                while ($data_gadm = mysqli_fetch_array($query_gadm)) {
                ?>
                <tr>
                  <form action="" method="POST">
                  <td align="center"><?php echo $no ?></td>
                  <td align="center"><input type="hidden" name="anip" value="<?php echo $data_gadm['anip']; ?>"><?php echo $data_gadm['anip']; ?></td>
                  <td align="center"><?php
                    $zzz = "SELECT * FROM formulir WHERE nip = '$data_gadm[anip]'";
                    $aaa = mysqli_query($koneksi,$zzz);
                    $cekdata = mysqli_num_rows($aaa);
                    if ($cekdata<1) {
                      echo "-";
                    }
                    else {
                      echo $data_gadm['nama'];
                    }
                    ?>
                  </td>
                  <td align="center"><?php
                    $zzzz = "SELECT * FROM formulir WHERE nip = '$data_gadm[anip]'";
                    $aaaa = mysqli_query($koneksi,$zzzz);
                    $cekdataa = mysqli_num_rows($aaaa);
                    if ($cekdataa<1) {
                      echo "-";
                    }
                    else {
                      $sql_f="SELECT * FROM data_bkkbn WHERE id_bkkbn='$data_gadm[provinsi_kantor]'";
                      $query_f=mysqli_query($koneksi,$sql_f);
                      $data_f=mysqli_fetch_array($query_f);
                      $sql_g="SELECT * FROM unit_kerja WHERE id_uk='$data_gadm[unit_organ]'";
                      $query_g=mysqli_query($koneksi,$sql_g);
                      $data_g=mysqli_fetch_array($query_g);
                      $cekdatan=mysqli_num_rows($query_g);
                      if ($cekdatan>=1) {
                        echo "$data_g[unit_kerja], $data_f[prov]";
                       }
                      elseif ($cekdatan<1) {
                        echo "$data_gadm[unit_organ], $data_f[prov]"; }
                    }
                    ?>
                  </td>
                  <td align="center"><?php
                  $zzz = "SELECT * FROM formulir WHERE nip = '$data_gadm[anip]'";
                  $aaa = mysqli_query($koneksi,$zzz);
                  $cekdata = mysqli_num_rows($aaa);
                  if ($cekdata<1) {
                    echo "-";
                  }
                  else {
                    echo $data_gadm['tlp'];
                  }
                  ?>
                  </td>
                  <td align="center">
                    <button type='submit' onclick="return confirm('Yakin akan menghapus data ini?');" name='hapus' class='btn btn-danger btn-sm'>
                      <span class="glyphicon glyphicon-trash"></span> Hapus</button>
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
if (isset($_POST['hapus'])) {
  $id = $_POST['anip'];

  $step = "SELECT * FROM pernyataan WHERE nip = '$id'";
  $aaa1 = mysqli_query($koneksi,$step);
  $dataksg = mysqli_num_rows($aaa1);

  $step1 = "SELECT * FROM formulir WHERE nip = '$id'";
  $aaa2 = mysqli_query($koneksi,$step1);
  $dataksg2 = mysqli_num_rows($aaa2);

  $step2 = "SELECT * FROM dokumen WHERE nip = '$id'";
  $aaa3 = mysqli_query($koneksi,$step2);
  $dataksgway = mysqli_num_rows($aaa3);

  $step3 = "SELECT * FROM wawancara WHERE nip = '$id'";
  $aaa4 = mysqli_query($koneksi,$step3);
  $dataksg3 = mysqli_num_rows($aaa4);

  $jawaban = "SELECT * FROM jawaban_wawancara WHERE nip = '$id'";
  $jawabanx = mysqli_query($koneksi,$jawaban);
  $jawabanksg = mysqli_num_rows($jawabanx);

  $step4 = "SELECT * FROM ielts WHERE nip = '$id'";
  $aaa5 = mysqli_query($koneksi,$step4);
  $dataksg4 = mysqli_num_rows($aaa5);

  $step5 = "SELECT * FROM surat_perjanjian WHERE nip = '$id'";
  $aaa6 = mysqli_query($koneksi,$step5);
  $dataksg5 = mysqli_num_rows($aaa6);

  if ($dataksg>=1) {
    $hasil1 = mysqli_query($koneksi,"delete from pernyataan where nip='$id'");
  }
  if ($dataksg2>=1) {
    $hasil2 = mysqli_query($koneksi,"delete from formulir where nip='$id'");
  }
  if ($dataksgway>=1) {
    $hasil3 = mysqli_query($koneksi,"delete from dokumen where nip='$id'");
  }
  if ($dataksg3>=1) {
    $hasil4 = mysqli_query($koneksi,"delete from wawancara where nip='$id'");
  }
  if ($jawabanksg>=1) {
    $hasil5 = mysqli_query($koneksi,"delete from jawaban_wawancara where nip='$id'");
  }
  if ($dataksg4>=1) {
    $hasil6 = mysqli_query($koneksi,"delete from ielts where nip='$id'");
  }
  if ($dataksg5>=1) {
    $hasil7 = mysqli_query($koneksi,"delete from surat_perjanjian where nip='$id'");
  }
  echo "<script>alert('Data Berhasil dihapus'); location.href='daftargagallolosadm.php';</script>";
}

} ?>
