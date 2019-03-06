<?php include "../../config/koneksi.php";
$univ2 = $_GET['univ_2'];
$nama = mysqli_query($koneksi,"SELECT * FROM universitas WHERE id_univ='$univ2'");
$hey=mysqli_fetch_array($nama);
$xxuniv = mysqli_query($koneksi,"SELECT * FROM jurusan WHERE id_univ='$hey[id_univ]'");
echo "<option value=0>--Pilih Jurusan--</option>";
while($h = mysqli_fetch_array($xxuniv)){
    echo "<option value=\"".$h['idj']."\">".$h['jurusan']."</option>";
}
?>
