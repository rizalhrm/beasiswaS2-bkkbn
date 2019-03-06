<?php include "../config/koneksi.php";
$prov = $_GET['bkkbn'];
$unitkerja = mysqli_query($koneksi,"SELECT * FROM unit_kerja WHERE id_bkkbn='$prov'");
echo "<option value=0>--Pilih Unit Kerja--</option>";
while($k = mysqli_fetch_array($unitkerja)){
    echo "<option value=\"".$k['id_uk']."\">".$k['unit_kerja']."</option>";
}
?>
