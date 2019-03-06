<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
    <h3 class="page-header">Setting Akun</h3>
</div>
</div>
<div class="row">
  <div class="col-lg-6">
    <div class="panel panel-default">
      <div class="panel-heading">
          Ubah Username
      </div>
      <div class="panel-body">
        <?php
        if (isset($_POST['ubah'])) {
        $username=$_POST['username'];
        $updatea = "UPDATE admin SET username='$username' where id_admin='$_SESSION[id_admin]'";
        $queryupdatea = mysqli_query($koneksi, $updatea);

        if ($queryupdatea) {
          echo "<script>alert('Username Berhasil Diubah'); location.href='setting_akun.php';</script>";
        }
        else {
          echo "<div class=\"alert alert-danger alert-dismissable\">
                <i class='glyphicon glyphicon-alert'></i> Username Gagal Diubah.
                </div>";
        }
        }

          $querya = "SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'";
          $sqla = mysqli_query($koneksi,$querya);
          $dataa = mysqli_fetch_array($sqla);
        ?>
          <form class="form-horizontal" method="post" action="">
            <div class="form-group">
              <label for="username" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" oninvalid="this.setCustomValidity('username hanya boleh huruf kecil saja tanpa spasi.')" pattern="[a-z]+" name="username" class="form-control" id="username" value="<?php echo $dataa['username']; ?>">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" name="ubah" value="Ubah">
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="panel panel-default">
      <div class="panel-heading">
          Ubah Password
      </div>
      <div class="panel-body">
        <?php
        if (isset($_POST['ganti'])){
        $password_lama = md5($_POST['password_lama']);
        $password_baru = md5($_POST['password_baru']);
        $conf_password_baru = md5($_POST['konf_password_baru']);

        // dapatkan password lama
        $sqlchg = "SELECT password FROM admin WHERE id_admin='$_SESSION[id_admin]'";
        $querychg = mysqli_query($koneksi,$sqlchg);
        $datachg = mysqli_fetch_array($querychg);
        $pw_db= $datachg['password'];
        // jika password lama salah
        if ($password_lama == $pw_db){
          // jika ulangi password baru tidak sama dengan password baru
          if ($password_baru != $conf_password_baru){
            echo "<div class=\"alert alert-warning alert-dismissable\">
                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                  <i class='glyphicon glyphicon-alert'></i> Konfirmasi Password barunya tidak cocok!
                  </div>";
          }
          else {
            $updatechg = "UPDATE admin SET password = '$password_baru' WHERE id_admin='$_SESSION[id_admin]'";
            $simpanupdatechg = mysqli_query($koneksi,$updatechg);

            // arahkan ke halaman ubah password
            if ($simpanupdatechg) {
              echo "<script>alert('Password Berhasil diganti.'); location.href='beranda.php';</script>";
            }
          }
        }

        else{
          // arahkan ke halaman ubah password
          echo "<div class=\"alert alert-danger alert-dismissable\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                <i class='glyphicon glyphicon-alert'></i> Password yang Anda Masukkan Salah !
                </div>";
        }
        }
        ?>
        <form class="form-horizontal" method="post" action="">
          <div class="form-group">
            <label for="password_lama" class="col-sm-4 control-label">Password Lama</label>
            <div class="col-sm-8">
              <input type="password" name="password_lama" class="form-control" id="password_lama">
            </div>
          </div>
          <div class="form-group">
            <label for="password_baru" class="col-sm-4 control-label">Password Baru</label>
            <div class="col-sm-8">
              <input type="password" name="password_baru" class="form-control" id="password_baru">
            </div>
          </div>
          <div class="form-group">
            <label for="konf_password_baru" class="col-sm-4 control-label">Konfirmasi Password Baru</label>
            <div class="col-sm-8">
              <input type="password" name="konf_password_baru" class="form-control" id="konf_password_baru">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
              <input type="submit" class="btn btn-primary" name="ganti" value="Ubah">
            </div>
          </div>
        </form>
      </div>
    </div>
</div>
</div>
<?php } ?>
