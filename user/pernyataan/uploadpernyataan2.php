<?php include "../../config/koneksi.php";
    $nip = $_POST ['nip'];
    $acuan = "SELECT * FROM pernyataan WHERE nip='$nip'";
    $acuan2 = mysqli_query($koneksi,$acuan);
    $acuan3 = mysqli_fetch_array($acuan2);
;
    $pernyataan= $_FILES['pernyataan']['name'];
    $lokasi= "../../file/pernyataan/"."Pernyataan_".$nip."_".basename($pernyataan);
    $name_file = "Pernyataan_".$nip."_".basename($pernyataan);
    if($name_file){
    copy($_FILES['pernyataan']['tmp_name'],$lokasi);
    }
    $querycpb="UPDATE pernyataan SET pernyataan='$name_file' WHERE nip='$nip'";
    $simpancpb=mysqli_query($koneksi,$querycpb);
    if ($simpancpb) {
      echo "<script>alert('Upload file berhasil'); location.href='../datapernyataan.php';</script>";
    }
     else{
     echo "<script>alert('Upload file gagal'); location.href='../datapernyataan.php';</script>";
     }

 ?>
