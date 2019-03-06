<?php include "../../config/koneksi.php";

    $nip = $_POST ['nip'];
    $pernyataan= $_FILES['pernyataan']['name'];
    $lokasi= "../../file/pernyataan/"."Pernyataan_".$nip."_".basename($pernyataan);
    $name_file = "Pernyataan_".$nip."_".basename($pernyataan);
    if($name_file){
    copy($_FILES['pernyataan']['tmp_name'],$lokasi);
    }
    $querycpb="INSERT INTO pernyataan VALUES('$nip','$name_file','')";
    $simpancpb=mysqli_query($koneksi,$querycpb);
    if ($simpancpb) {
      echo "<script>alert('Upload file berhasil'); location.href='../beranda.php';</script>";
    }
     else{
     echo "<script>alert('Upload file gagal'); location.href='../pernyataan.php';</script>";
     }

 ?>
