<?php
$koneksi = mysqli_connect('localhost','root','');
$database = "db_pulin";

$pilihdatabase = mysqli_select_db($koneksi,$database);

// if ($pilihdatabase) {
//   echo "terkoneksi";
// }
// else {
//   echo "gagal";
// }

 ?>
