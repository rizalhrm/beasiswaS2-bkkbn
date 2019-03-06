<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='../login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <h3 class="page-header">Karyawan (User)</h3>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-info">
      <div class="panel-heading">
        Tambah Data Karyawan (User)
        <a class="btn btn-warning btn-md pull-right" style="margin-top:-7px;" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
          Kembali <span class="glyphicon glyphicon-circle-arrow-left"></span></a>
      </div>
      <div class="panel-body">
        <form name="karyawan" class="form-horizontal" action="" method="POST" onSubmit="return validasi(this)">
        			  <div class="col-md-1"></div>
        			  <div class="col-md-10">
                  <div class="form-group">
                    <label>NIP</label>
                    <input type="text" onkeypress="return hanyaAngka(event)" pattern='[0-9]{8}' style="width:100px;" class="form-control" name="nip1" minlength=8 maxlength=8 placeholder="19700101" oninvalid="alert('Masukkan NIP Bagian Pertama dengan 8 Digit Angka saja.');">
                    <input type="text" onkeypress="return hanyaAngka(event)" pattern='[0-9]{6}' style="width:80px; margin-top:-34px; margin-left:110px;" class="form-control" name="nip2" minlength=6 maxlength=6 placeholder="199001" oninvalid="alert('Masukkan NIP Bagian Kedua dengan 6 Digit Angka saja.');">
                    <input type="text" onkeypress="return hanyaAngka(event)" pattern='[0-9]{1}' style="width:40px; margin-top:-34px; margin-left:200px;" class="form-control" name="nip3" maxlength=1 placeholder="1" oninvalid="alert('Masukkan NIP Bagian Ketiga dengan 1 Digit Angka saja.');">
                    <input type="text" onkeypress="return hanyaAngka(event)" pattern='[0-9]{3}' style="width:55px; margin-top:-34px; margin-left:250px;" class="form-control" name="nip4" minlength=3 placeholder="001" maxlength=3 oninvalid="alert('Masukkan NIP Bagian Keempat dengan 3 Digit Angka saja.');">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" value="" pattern="[A-Za-z ]+" oninvalid="alert('Masukkan Nama dengan Huruf saja.');">
                  </div>
                  <div class="form-group">
                    <label for="pend_terakhir">Pendidikan Terakhir</label>
                    <select class="form-control" name="pend_terakhir">
                      <option disabled>-- Pilih Jenjang Pendidikan --</option>
                      <option value="D3">D3</option>
                      <option value="S1" selected>S1</option>
                      <option value="S1 (Kuliah S2)">S1 (Kuliah S2)</option>
                      <option Value="S2">S2</option>
                      <option Value="S3">S3</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="password">Password (Tanggal Lahir)</label>
                    <input type="text" class="form-control" name="password" value="" id="popupDatepicker" maxlength="10" readonly>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="tambah" class="btn btn-primary"><span class="glyphicon glyphicon-floppy"></span> Simpan</button>
                  </div>
        			  </div>
        			  <div class="col-md-1"></div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_POST['tambah'])) {
  $nama = $_POST['nama'];
  $nip1 = $_POST['nip1'];
  $nip2 = $_POST['nip2'];
  $nip3 = $_POST['nip3'];
  $nip4 = $_POST['nip4'];
  $pend = $_POST['pend_terakhir'];
  $password = md5($_POST['password']);
  $sqltambah = "INSERT INTO user VALUES ('$nip1 $nip2 $nip3 $nip4','$nama','$pend','$password')";
  $querytambah = mysqli_query($koneksi,$sqltambah);

  if ($querytambah) {
  echo "<script>alert('Data Berhasil diSimpan'); location.href='karyawan.php';</script>";
  }
  else {
    echo "<script>alert('DATA GAGAL DISIMPAN'); location.href='karyawan.php';</script>";
  }
}

} ?>
