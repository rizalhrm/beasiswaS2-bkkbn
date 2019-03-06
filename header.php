<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/logo.ico">
    <title>Pulin | Beasiswa S2 Luar Negeri</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
    	body {
        padding-top: 12px;
        padding-bottom: 0px;
    		font-family: 'Arial', sans-serif;
    		background-image: url(img/background.png);
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
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


    <!-- Fav and touch icons -->
    </head>
    <body>
    <div class="container well" style="width: 85%">
    <div class="navbar navbar-inverse">

			<img src="img/header.jpg" alt="header">


		<div class="navbar-inner" style="margin-top: 0px">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          <div class="nav-collapse collapse">

            <ul class="nav">

			<li><a style="font-size:15px;" href="beranda.php">Beranda</a></li>
      <li><a style="font-size:15px;" href="alumni.php">Alumni</a></li>
      <li><a style="font-size:15px;" href="kontak.php">Kontak</a></li>
      <li><a style="font-size:15px;" href="tentang.php">Tentang Kami</a></li>

            </ul>

			<div class="btn-group navbar-form pull-right" style="margin-right: 10px">
				<a style="font-size:15px;" class="btn dropdown-toggle" href="user/login.php">
				<b>Login</b>
				</a>
			</div>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <?php date_default_timezone_set("Asia/Jakarta"); include "config/koneksi.php"; ?>
    <div class="container-fluid" style="margin-top: 0px">
      <div class="row-fluid">
        <div class="span3">
          <div class="wellwhite sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">&nbsp;&nbsp;Informasi</li>
              <li><a href='persyaratan.php'>Persyaratan</a></li>
              <li><a href='ketentuan.php'>Ketentuan</a></li>
              <li><a href='dokumen.php'>Dokumen Pendaftaran</a></li>
              <li><a href='jadwal_kegiatan.php'>Jadwal Kegiatan</a></li>
              <li><a  style="font-size:13px;" href='panduan.php'>Panduan Mendaftar dan Mengikuti Seleksi</a></li>
            </ul>
          </div><!--/.well -->
          <div class="wellwhite sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">&nbsp;&nbsp;Download</li>
              <?php
              $querydl = "SELECT * FROM download WHERE status='Publik' ORDER BY id_download ASC";
              $sqldl = mysqli_query($koneksi,$querydl);
              while ($datadl = mysqli_fetch_array($sqldl)) {
               ?>
      				<li><a href="download/<?php echo "$datadl[file]"; ?>" download><?php echo "$datadl[judul]"; ?></a></li>
              <?php } ?>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
