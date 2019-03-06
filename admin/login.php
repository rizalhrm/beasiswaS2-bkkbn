<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Pulin | Admin Login</title>
    <link rel="shortcut icon" href="../img/logo.ico">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="dist/css/login.css">
  </head>
  <body class="login">
    <?php include '../config/koneksi.php'; ?>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <?php
          if (isset($_POST['login'])) {
          $username=$_POST['username'];
          $password=md5($_POST['password']);
          $sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";
          $query=mysqli_query($koneksi,$sql);
          $dataia = mysqli_fetch_array($query);
          $id = $dataia['id_admin'];
          $cari=mysqli_num_rows($query);
          if ($cari>0)
          { session_start();
            $_SESSION['id_admin']=$id;
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
            header('location:index.php');

          }
          else {
            echo "<div class=\"alert alert-danger\">
                 <i class='glyphicon glyphicon-alert'></i> Maaf Username atau Password Anda Salah.
                  </div>";
            }
          }
          ?>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="text-center">
            <h3 style="color:white;">Administrator Login</h3>
          </div>
              <form name="login" action="" method="post" class="form-signin" onSubmit="return validasi(this)">
                <input type="text" name="username" placeholder="Masukkan Username" class="form-control" pattern="[a-z]+" oninvalid="alert('Username hanya boleh huruf kecil saja tanpa spasi.');">
                <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
              </form>
        </div>
      </div>
    </div><!-- /container -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
    function validasi(login){
      if (login.username.value == ""){
      alert("Anda belum mengisikan Username.");
      login.username.focus();
      return (false);
      }
      if (login.password.value == ""){
      alert("Anda belum mengisikan Password.");
      login.password.focus();
      return (false);
      }
      return (true);
    }
    </script>
  </body>
</html>
