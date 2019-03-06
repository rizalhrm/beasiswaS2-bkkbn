<?php include "../config/koneksi.php";
$prov = $_GET['bkkbn'];
$alm = mysqli_query($koneksi,"SELECT * FROM data_bkkbn WHERE id_bkkbn='$prov'");
$a = mysqli_fetch_array($alm);
echo "$a[alamat]";
?>
