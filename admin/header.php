<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../img/logo.ico">
    <title>Pulin | Administrator</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="vendor/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendor/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/jquery.datepick.css" rel="stylesheet">
    <link href="../css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style media="screen">
    .file{
    padding: 3px;
    width: 90px;
    color:transparent;
    }
    </style>
    <script type="text/javascript">
      function startCalc(){
      interval = setInterval("calc()",1);}
      function calc() {
      var one = document.penilaian.subtansi1.value;
      var two = document.penilaian.subtansi2.value;
      var three = document.penilaian.subtansi3.value;
      var four = document.penilaian.subtansi4.value;
      var five = document.penilaian.subtansi5.value;
      document.penilaian.subtotal1.value = parseInt(one) + parseInt(two) + parseInt(three) + parseInt(four) + parseInt(five)
      var snk = document.penilaian.subtotal1.value;
      document.penilaian.kalkulasi1.value = parseFloat(snk) * 0.5
      var k_snk = document.penilaian.kalkulasi1.value;

      var onee = document.penilaian.motivasi1.value;
      var twoe = document.penilaian.motivasi2.value;
      var threee = document.penilaian.motivasi3.value;
      var foure = document.penilaian.motivasi4.value;
      var fivee = document.penilaian.motivasi5.value;
      document.penilaian.subtotal2.value = parseInt(onee) + parseInt(twoe) + parseInt(threee) + parseInt(foure) + parseInt(fivee)
      var fmab = document.penilaian.subtotal2.value;
      document.penilaian.kalkulasi2.value = parseFloat(fmab) * 0.3
      var k_fmab = document.penilaian.kalkulasi2.value;

      var satu = document.penilaian.etika1.value;
      var dua = document.penilaian.etika2.value;
      var tiga = document.penilaian.etika3.value;
      var empat = document.penilaian.etika4.value;
      var lima = document.penilaian.etika5.value;
      document.penilaian.subtotal3.value = parseInt(satu) + parseInt(dua) + parseInt(tiga) + parseInt(empat) + parseInt(lima)
      var nhk = document.penilaian.subtotal3.value;
      document.penilaian.kalkulasi3.value = parseFloat(nhk) * 0.2
      var k_nhk = document.penilaian.kalkulasi3.value;

      document.penilaian.totalnilai.value = (parseFloat(k_snk) + parseFloat(k_fmab) + parseFloat(k_nhk) )* 4

      }
      function stopCalc(){
      clearInterval(interval);}
    </script>
</head>

<body>
    <?php date_default_timezone_set("Asia/Jakarta"); include '../config/koneksi.php'; ?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="beranda.php">Pulin | Administrator</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
              <?php
              $queryas = "SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'";
              $sqlas = mysqli_query($koneksi,$queryas);
              $dataas = mysqli_fetch_array($sqlas);
              ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo "$dataas[username]"; ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="setting_akun.php"><i class="fa fa-gear fa-fw"></i> Setting Akun</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>

                        </li>
                        <li>
                            <a href="beranda.php"><i class="fa fa-dashboard fa-fw"></i> Beranda</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Data Master<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="karyawan.php">Karyawan (User)</a>
                                </li>
                                <li>
                                    <a href="#">Universitas Luar Negeri <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="jurusan.php">Jurusan</a>
                                        </li>
                                        <li>
                                            <a href="universitas.php">Universitas</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="alumni.php">Alumni</a>
                                </li>
                                <li>
                                    <a href="pertanyaan.php">Pertanyaan Wawancara</a>
                                </li>
                                <li>
                                    <a href="#">Data BKKBN <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="data_bkkbn.php">BKKBN</a>
                                        </li>
                                        <li>
                                            <a href="unitkerja.php">Unit Kerja</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-paperclip fa-fw"></i> Informasi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="persyaratan.php">Persyaratan</a>
                                </li>
                                <li>
                                    <a href="ketentuan.php">Ketentuan</a>
                                </li>
                                <li>
                                    <a href="dokumen.php">Dokumen Pendaftaran</a>
                                </li>
                                <li>
                                    <a href="jadwal_kegiatan.php">Jadwal Kegiatan</a>
                                </li>
                                <li>
                                    <a href="panduan.php">Panduan Pendaftaran</a>
                                </li>
                                <li>
                                    <a href="download.php">Download</a>
                                </li>
                                <li>
                                    <a href="infokursus.php">Info Kursus</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                              <li>
                                  <a style="font-size:11px;" href="sedang_tubel.php">Daftar Karyawan Sedang Tugas Belajar</a>
                              </li>
                              <li>
                                  <a style="font-size:11px;" href="daftargagallolosadm.php">Daftar CPB Gagal Lolos Seleksi</a>
                              </li>
                              <li>
                                  <a style="font-size:11px;" href="mengundurkan_diri.php">Daftar CPB Mengundurkan Diri</a>
                              </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Identitas Website<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="depan.php">Beranda Pengunjung Umum</a>
                                </li>
                                <li>
                                    <a href="kontak.php">Kontak</a>
                                </li>
                                <li>
                                    <a href="tentang.php">Tentang Kami</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
