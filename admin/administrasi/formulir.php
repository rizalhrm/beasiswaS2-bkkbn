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
      	  <li role="presentation" class="active"><a href="formulir.php">Data Formulir</a></li>
      	  <li role="presentation"><a href="berkasdokumen.php">Berkas Dokumen</a></li>
          <li role="presentation"><a href="daftarlolosadministrasi.php">Daftar CPB Lolos Seleksi Administrasi</a></li>
      	</ul>
        <br>
        <?php
        if (isset($_POST['ubah'])) {
        include "administrasi/ubahformulir.php";
        }
        elseif (isset($_POST['detail'])) {
        include "administrasi/detailformulir.php";
        }
        else {
        $sql_form = "SELECT * FROM formulir";
        $query_form = mysqli_query($koneksi,$sql_form);
        ?>
        <div class="table-responsive">
        <table class="table table-bordered table-hover data" style="font-size:12px;">
          <thead>
            <tr>
              <th style="text-align:center;">No</th>
              <th style="text-align:center;">NIP</th>
              <th style="text-align:center;">Nama</th>
              <th style="text-align:center;">No. HP</th>
              <th style="text-align:center;">BKKBN</th>
              <th style="text-align:center;">Unit Kerja</th>
              <th style="text-align:center;">Universitas Pilihan 1</th>
              <th style="text-align:center;">Status</th>
              <th style="text-align:center;">Pilihan</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $no=1;
          while ($form = mysqli_fetch_array($query_form)) {
          ?>
          <tr>
            <form action="" method="POST">
            <td align="center"><?php echo $no ?></td>
            <td align="center"><input type="hidden" name="nip" value="<?php echo $form['nip']; ?>"><?php echo $form['nip']; ?></td>
            <td align="center"><?php echo $form['nama']; ?></td>
            <td align="center"><?php echo $form['tlp']; ?></td>
            <td align="center"><?php
            $sql_f="SELECT * FROM data_bkkbn WHERE id_bkkbn='$form[provinsi_kantor]'";
            $query_f=mysqli_query($koneksi,$sql_f);
            $data_f=mysqli_fetch_array($query_f);
            echo $data_f['prov']; ?></td>
            <td align="center"><?php
            $switch="SELECT * FROM unit_kerja WHERE id_uk='$form[unit_organ]'";
            $query_switch=mysqli_query($koneksi,$switch);
            $data_switch=mysqli_fetch_array($query_switch);
            $cekdata=mysqli_num_rows($query_switch);
            if ($cekdata>=1) {
              echo $data_switch['unit_kerja'];
            }
            elseif ($cekdata<1) {
              echo "$form[unit_organ]";
            }
            ?></td>
            <td align="center"><?php
            $steady="SELECT * FROM universitas WHERE id_univ='$form[univ_1]'";
            $query_steady=mysqli_query($koneksi,$steady);
            $data_steady=mysqli_fetch_array($query_steady);

            $shine="SELECT * FROM jurusan WHERE idj='$form[programstudi_1]'";
            $query_shine=mysqli_query($koneksi,$shine);
            $data_shine=mysqli_fetch_array($query_shine);
            echo "$data_steady[univ] , $data_shine[jurusan]";
             ?></td>
            <td align="center">
              <?php if (empty($form['status_cpb'])) {
                echo "-"; }
                else {
                  echo $form['status_cpb'];
                }
              ?>
            </td>
            <td align="center">
              <button type='submit' name='ubah' class='btn btn-success btn-xs'>
                <span class="glyphicon glyphicon-pencil"></span> Ubah Status</button>
              <hr style="margin-top:0px; margin-bottom: 0px;">
              <button type='submit' name='detail' class='btn btn-info btn-xs'>
                <span class="glyphicon glyphicon-eye-open"></span> Detail</button>
            </td>
          </form>
          </tr>
          <?php
          $no++;}
          ?>
          </tbody>
        </table>
        </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php
if (isset($_POST['ubahstatus'])) {
  $id_nip = $_POST ['nip2'];
  $status = $_POST['status'];

  $queryupdate = "UPDATE formulir SET status_cpb='$status' WHERE nip = '$id_nip'";
  $update = mysqli_query($koneksi,$queryupdate);
  if ($update) {
  echo "<script>alert('Data Berhasil diubah'); location.href='formulir.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='formulir.php';</script>";
  }
}

} ?>
