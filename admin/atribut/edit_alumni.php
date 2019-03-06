<?php
$id = $_POST['primary'];
$select = "SELECT * FROM alumni WHERE id='$id'";
$queryselect = mysqli_query($koneksi,$select);
$isi = mysqli_fetch_array($queryselect);

    $noid = $isi['id'];
    $nama = $isi['nama_alumni'];
    $nip = $isi['nip'];
    if (!empty($nip)) {
      $pecah= explode(" ",$nip);
      $nip1 = $pecah[0];
      $nip2 = $pecah[1];
      $nip3 = $pecah[2];
      $nip4 = $pecah[3];
    }
    $tempat_tugas = $isi['tempat_tugas'];
    $bidang_study = $isi['bidang_studi'];
    $univ = $isi['univ'];
    $gelar = $isi['gelar'];
    $mulai = $isi['mulai'];
    $selesai = $isi['selesai'];
    $sponsor = $isi['sponsor'];
    $ket = $isi['keterangan']; ?>

    <form action="" method="POST">
      <div class="col-md-1"></div>
      <div class="col-md-10">
      <div class="form-group">
        <label>NIP</label>
        <?php if (empty($nip)) { ?>
          <input onkeypress="return hanyaAngka(event)" pattern='[0-9]{8}' type="text" style="width:100px;" class="form-control" name="nip1" minlength=8 maxlength=8
          placeholder="19700101" value="" oninvalid="alert('Masukkan NIP dengan Angka saja.');">
          <input onkeypress="return hanyaAngka(event)" pattern='[0-9]{6}' type="text" style="width:80px; margin-top:-34px; margin-left:110px;" class="form-control" name="nip2" minlength=6 maxlength=6
          placeholder="199001" value="" oninvalid="alert('Masukkan NIP dengan Angka saja.');">
          <input onkeypress="return hanyaAngka(event)" pattern='[0-9]{1}' type="text" style="width:40px; margin-top:-34px; margin-left:200px;" class="form-control" name="nip3" maxlength=1
          placeholder="1" value="" oninvalid="alert('Masukkan NIP dengan Angka saja.');">
          <input onkeypress="return hanyaAngka(event)" pattern='[0-9]{3}' type="text" style="width:55px; margin-top:-34px; margin-left:250px;" class="form-control" name="nip4" minlength=3
          placeholder="001" maxlength=3 value="" oninvalid="alert('Masukkan NIP dengan Angka saja.');">
        <?php } else { ?>
        <input onkeypress="return hanyaAngka(event)" pattern='[0-9]{8}' type="text" style="width:100px;" class="form-control" name="nip1" minlength=8 maxlength=8
        placeholder="19700101" value="<?php echo $nip1 ?>" oninvalid="alert('Masukkan NIP dengan Angka saja.');">
        <input onkeypress="return hanyaAngka(event)" pattern='[0-9]{6}' type="text" style="width:80px; margin-top:-34px; margin-left:110px;" class="form-control" name="nip2" minlength=6 maxlength=6
        placeholder="199001" value="<?php echo $nip2 ?>" oninvalid="alert('Masukkan NIP dengan Angka saja.');">
        <input onkeypress="return hanyaAngka(event)" pattern='[0-9]{1}' type="text" style="width:40px; margin-top:-34px; margin-left:200px;" class="form-control" name="nip3" maxlength=1
        placeholder="1" value="<?php echo $nip3 ?>" oninvalid="alert('Masukkan NIP dengan Angka saja.');">
        <input onkeypress="return hanyaAngka(event)" pattern='[0-9]{3}' type="text" style="width:55px; margin-top:-34px; margin-left:250px;" class="form-control" name="nip4" minlength=3
        placeholder="001" maxlength=3 value="<?php echo $nip4 ?>" oninvalid="alert('Masukkan NIP dengan Angka saja.');">
          <?php } ?>
      </div>
       <div class="form-group">
         <label for="nama">Nama</label>
         <input type="hidden" name="id" value="<?php echo $noid ?>">
         <input type="text" pattern="[A-Za-z ]+" name='nama' class="form-control" value="<?php echo $nama ?>" oninvalid="alert('Masukkan Nama dengan Huruf saja.');">
       </div>
       <div class="form-group">
         <label for="nama">Instansi/Unit Kerja</label>
         <input type="text" name='tempat_tugas' class="form-control" value="<?php echo $tempat_tugas ?>">
       </div>
       <div class="form-group">
         <label for="nama">Jurusan</label>
         <input type="text" pattern="[A-Za-z ]+" name='bidang_studi' class="form-control" value="<?php echo $bidang_study ?>" oninvalid="alert('Masukkan Jurusan dengan Huruf saja.');">
       </div>
       <div class="form-group">
         <label for="nama">Universitas</label>
         <input type="text" pattern="[A-Za-z ]+" name='univ' class="form-control" value="<?php echo $univ ?>" oninvalid="alert('Masukkan Nama Universitas dengan Huruf saja.');">
       </div>
       <div class="form-group">
         <label for="nama">Gelar</label>
         <input type="text" name='gelar' class="form-control" value="<?php echo $gelar ?>">
       </div>
       <div class="form-group">
         <label for="nama">Waktu Mulai</label>
         <select class="form-control" name="mulai" required>
          <?php
          $thnz = date("Y");
          while ($thnz >= 1960 ) {
          $thnuraian = array($thnz);
          $thnz--;
          }
          echo "<option if($mulai == $thnuraian ) {echo \"selected\"; } hidden value='$mulai'>$mulai</option>";

          $thnw = date("Y");
          while ($thnw >= 1960 ) {
          echo "<option value=\"$thnw\">$thnw</option>";
          $thnw--;
          }
          ?>
          </select>
       </div>
       <div class="form-group">
         <label for="nama">Waktu Selesai</label>
         <select class="form-control" name="selesai" required>
          <?php
          $thnz = date("Y");
          while ($thnz >= 1960 ) {
          $thnuraian = array($thnz);
          $thnz--;
          }
          echo "<option if($selesai == $thnuraian ) {echo \"selected\"; } hidden value='$selesai'>$selesai</option>";

          $thnw = date("Y");
          while ($thnw >= 1960 ) {
          echo "<option value=\"$thnw\">$thnw</option>";
          $thnw--;
          }
          ?>
          </select>
       </div>
       <div class="form-group">
         <label for="nama">Sponsor atau Sumber Biaya</label>
         <input type="text" name='sponsor' class="form-control" value="<?php echo $sponsor ?>">
       </div>
       <div class="form-group">
         <label for="nama">Keterangan</label>
         <textarea name="ket" rows="4" cols="40"><?php echo $ket ?></textarea>
       </div>
       <div align="center">
         <button type='submit' name='ubah' class='btn btn-primary btn-md'><span class="glyphicon glyphicon-floppy-saved"></span> Simpan</button>
         <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
           Batal <span class="glyphicon glyphicon-floppy-remove"></span></a>
       </div>
     </div>
     <div class="col-md-1"></div>
     </form>
