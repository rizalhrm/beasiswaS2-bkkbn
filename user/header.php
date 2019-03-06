<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../img/logo.ico">
    <title>Pulin | Ruang Calon Penerima Beasiswa</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content=""
    <!-- Le styles -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
    	body {
    		font-family: 'Arial', sans-serif;
        }
        .sidebar-nav {
        padding: 9px 0;
        }
        .halaman {
          color: #444;
          font-weight: border;
        }
        .halaman a{
          background-color: #d4d4d4;
          color :black;
          padding: 5px ;
          margin-left: -4px;
          border-left: 1px solid white;
          text-decoration: none;
        }

        .halaman a:hover{
          background-color: #444;
          color: white;
        }
        span.border_cart{
          width:100%;
          height:1px;
          margin:3px 0 3px 0;
          display:block;
          border-top:1px #4a4a4a dashed;
          }
    </style>
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/popup-calendar/dhtmlgoodies_calendar.css" media="screen"></link>
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


    <!-- Fav and touch icons -->
    </head>
    <body>
    <?php date_default_timezone_set("Asia/Jakarta"); include "../config/koneksi.php"; ?>
    <div style="width: 100%">
    <div class="navbar navbar-inverse">

			<img src="../img/header.jpg" alt="header">


		<div class="navbar-inner" style="margin-top: 0px">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          <div class="nav-collapse collapse">

            <ul class="nav">

			<li><a style="font-size:14px;" href="beranda.php">Beranda</a></li>
      <li><a style="font-size:14px;" href="alumni.php">Alumni</a></li>
      <li><a style="font-size:14px;" href='daftar_universitas.php'>Universitas Luar Negeri</a></li>
      <li><a style="font-size:14px;" href="kontak.php">Kontak</a></li>
      <li><a style="font-size:14px;" href="tentang.php">Tentang Kami</a></li>


            </ul>
      <?php
      $queryuser = "SELECT * FROM user WHERE nip = '$_SESSION[nip]'";
      $sqluser = mysqli_query($koneksi,$queryuser);
      $datauser = mysqli_fetch_array($sqluser);
       ?>
			<div class="btn-group navbar-form pull-right" style="margin-right: 10px">
				<a style="font-size:15px;" class="btn dropdown-toggle" data-toggle="dropdown" href="#">
				<b><?php echo "$datauser[nama]"; ?></b>
        <span class="caret"></span>
				</a>
        <ul class="dropdown-menu">
					<li><a style="font-size:15px;" href="ubah_akun.php">Info Akun</a></li>
          <li><a style="font-size:15px;" href="ganti_password.php">Ganti Password</a></li>
          <li class="divider"></li>
					<li><a style="font-size:15px;" href="logout.php">Logout</a></li>
				</ul>
			</div>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid" style="margin-top: 0px">
      <div class="row-fluid">
        <div class="span3">
          <div class="wellwhite sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">&nbsp;&nbsp;Proses Seleksi</li>
              <?php
              $queryksg = "SELECT * FROM pernyataan WHERE nip = '$_SESSION[nip]'";
              $sqlksg = mysqli_query($koneksi,$queryksg);
              $dataksg = mysqli_num_rows($sqlksg);
              if ($dataksg<1) {
              ?>
              <li><a href='persetujuan.php'>Pembuatan Surat Pernyataan</a></li>
              <?php } else { ?>
              <li><a href='datapernyataan.php'>Pembuatan Surat Pernyataan</a></li>
              <?php } ?>

              <?php
              $queryksg2 = "SELECT * FROM formulir WHERE nip = '$_SESSION[nip]'";
              $sqlksg2 = mysqli_query($koneksi,$queryksg2);
              $dataksg2 = mysqli_num_rows($sqlksg2);
              if ($dataksg<1 && $dataksg2<1) {
              ?>
              <li><a href='formulir_kosong.php'>Pengisian Formulir</a></li>
              <?php } elseif ($dataksg>=1 && $dataksg2<1) {
              ?>
      				<li><a href='formulir.php'>Pengisian Formulir</a></li>
              <?php } else { ?>
              <li><a href='dataformulir.php'>Pengisian Formulir</a></li>
              <?php } ?>

              <?php
              $queryksg3 = "SELECT * FROM dokumen WHERE nip = '$_SESSION[nip]'";
              $sqlksg3 = mysqli_query($koneksi,$queryksg3);
              ?>
              <li><a href='berkasdokumen.php'>Pengunggahan Dokumen</a></li>

              <li><a href='wawancara.php'>Wawancara</a></li>
              <li><a href='ielts.php'>Ujian IELTS</a></li>
              <?php
              $queryksg7 = "SELECT * FROM surat_perjanjian WHERE nip = '$_SESSION[nip]'";
              $sqlksg7 = mysqli_query($koneksi,$queryksg7);
              ?>
              <li><a href='surat_perjanjian.php'>Surat Perjanjian</a></li>
            </ul>
          </div><!--/.well -->
          <div class="wellwhite sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">&nbsp;&nbsp;Link Terkait</li>
              <li><a style="font-size:13px;" href='lolos_administrasi.php'>Daftar Calon Penerima Beasiswa Lolos Seleksi Administrasi</a></li>
              <li><a style="font-size:13px;" href='lolos_wawancara.php'>Daftar Calon Penerima Beasiswa Lolos Seleksi Wawancara</a></li>
              <li><a style="font-size:13px;" href='lolos_ielts.php'>Daftar Calon Penerima Beasiswa Lolos Seleksi Ujian IELTS</a></li>
              <li><a style="font-size:13px;" href='penerimabeasiswa.php'>Daftar Penerima Beasiswa S2 Luar Negeri</a></li>
            </ul>
          </div><!--/.well -->
          <div class="wellwhite sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">&nbsp;&nbsp;Informasi</li>
              <li><a href='persyaratan.php'>Persyaratan</a></li>
              <li><a href='ketentuan.php'>Ketentuan</a></li>
              <li><a href='dokumen.php'>Dokumen Pendaftaran</a></li>
              <li><a href='jadwal_kegiatan.php'>Jadwal Kegiatan</a></li>
              <li><a style="font-size:13px;" href='panduan.php'>Panduan Mendaftar dan Mengikuti Seleksi</a></li>
              <?php
              $queryksgielts = "SELECT * FROM ielts WHERE nip = '$_SESSION[nip]'";
              $sqlksgielts = mysqli_query($koneksi,$queryksgielts);
              $dataksgielts = mysqli_num_rows($sqlksgielts);
              if ($dataksgielts=1) {
              ?>
              <li><a href='infokursus.php'>Info Kursus IELTS</a></li>
              <?php } ?>
            </ul>
          </div><!--/.well -->
          <div class="wellwhite sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">&nbsp;&nbsp;Download</li>
              <?php
              $querydl = "SELECT * FROM download ORDER BY id_download ASC";
              $sqldl = mysqli_query($koneksi,$querydl);
              while ($datadl = mysqli_fetch_array($sqldl)) {
               ?>
      				<li><a href="../download/<?php echo "$datadl[file]"; ?>" download><?php echo "$datadl[judul]"; ?></a></li>
              <?php } ?>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
