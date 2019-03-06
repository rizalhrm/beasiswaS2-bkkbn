<?php
class Paging{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['pg'])){
	$posisi=0;
	$_GET['pg']=1;
}
else{
	$posisi = ($_GET['pg']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (Awal) dan sebelumnya (Kembali)
if($halaman_aktif > 1){
	$Kembali = $halaman_aktif-1;
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?page=alumni&pg=1><< Awal</a>
                    <a href=$_SERVER[PHP_SELF]?page=alumni&pg=$Kembali>< Kembali</a>  ";
}
else{
	$link_halaman .= "<< Awal  < Kembali  ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?page=alumni&pg=$i>$i</a>  ";
  }
	  $angka .= " <b>$halaman_aktif</b>  ";

    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?page=alumni&pg=$i>$i</a>  ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=$_SERVER[PHP_SELF]?page=alumni&pg=$jmlhalaman>$jmlhalaman</a> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir)
if($halaman_aktif < $jmlhalaman){
	$Lanjut = $halaman_aktif+1;
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?page=alumni&pg=$Lanjut>Lanjut ></a>
                     <a href=$_SERVER[PHP_SELF]?page=alumni&pg=$jmlhalaman>Akhir >></a> ";
}
else{
	$link_halaman .= " Lanjut >  Akhir >>";
}
return $link_halaman;
}
}

// PERJADIN PERJADIN PERJADIN PERJADIN PERJADIN PERJADIN PERJADIN PERJADIN PERJADIN PERJADIN PERJADIN PERJADIN
class Paging2{
// Fungsi untuk mencek halaman PERJADIN dan posisi data
function cariPosisi($batas){
if(empty($_GET['pg'])){
	$posisi=0;
	$_GET['pg']=1;
}
else{
	$posisi = ($_GET['pg']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (Awal) dan sebelumnya (Kembali)
if($halaman_aktif > 1){
	$Kembali = $halaman_aktif-1;
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?page=perjadin&pg=1><< Awal</a>
                    <a href=$_SERVER[PHP_SELF]?page=perjadin&pg=$Kembali>< Kembali</a> ";
}
else{
	$link_halaman .= "<< Awal < Kembali ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?page=perjadin&pg=$i>$i</a>  ";
  }
	  $angka .= " <b>$halaman_aktif</b>  ";

    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?page=perjadin&pg=$i>$i</a>  ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ...  <a href=$_SERVER[PHP_SELF]?page=perjadin&pg=$jmlhalaman>$jmlhalaman</a> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir)
if($halaman_aktif < $jmlhalaman){
	$Lanjut = $halaman_aktif+1;
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?page=perjadin&pg=$Lanjut>Lanjut ></a>
                     <a href=$_SERVER[PHP_SELF]?page=perjadin&pg=$jmlhalaman>Akhir >></a> ";
}
else{
	$link_halaman .= " Lanjut >  Akhir >>";
}
return $link_halaman;
}
}

?>
