<?php
session_start();
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else { include "header.php"; } ?>
<div id="page-wrapper">
  <br>
  <!-- /.row MENU ATAS-->
  <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="panel panel-yellow">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col-xs-12 text-center">
                        <img src="../img/administrasi.png" class="text-center" alt="Seleksi Administrasi" class="img-responsive" width="75%"/>
                      </div>
                  </div>
              </div>
            <a href="pernyataan.php" style="text-decoration:none;">
              <div class="panel-footer" align="center">
                <span>Administrasi</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              </div>
            </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="panel panel-green">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col-xs-12 text-center">
                        <img src="../img/wawancara.png" class="text-center" alt="Seleksi Wawancara" class="img-responsive" width="74%"/>
                      </div>
                  </div>
              </div>
              <a href="pengumuman_wawancara.php" style="text-decoration:none;">
                  <div class="panel-footer" align="center">
                    <span>Wawancara</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  </div>
              </a>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="panel panel-primary">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col-xs-12 text-center">
                        <br>
                        <img src="../img/IELTS.png" class="text-center" alt="Kursus IELTS" class="img-responsive" width="89%"/>
                        <br>
                        <br>
                      </div>
                  </div>
              </div>
              <a href="placement_test.php" style="text-decoration:none;">
                  <div class="panel-footer" align="center">
                    <span>Ujian IELTS</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  </div>
              </a>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="panel panel-red">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col-xs-12 text-center">
                        <img src="../img/book.png" class="text-center" alt="Pendaftaran ke Universitas Luar Negeri" class="img-responsive" width="95%"/>
                      </div>
                  </div>
              </div>
              <a href="pendaftaran_ln.php" style="text-decoration:none;">
                  <div class="panel-footer" align="center">
                    <span>Surat Perjanjian</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  </div>
              </a>
          </div>
      </div>
  </div>

      <?php
      if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page == 'alumni') {
            include "alumni.php";
             }
        elseif ($page == 'tentang') {
            include "tentang.php";
             }
        elseif ($page == 'kontak') {
            include "kontak.php";
            }
        elseif ($page == 'download') {
            include "download.php";
            }
        elseif ($page == 'dokumen') {
            include "dokumen.php";
            }
        elseif ($page == 'info_akun') {
            include "info_akun.php";
            }
        elseif ($page == 'persyaratan') {
            include "persyaratan.php";
            }
        elseif ($page == 'ketentuan') {
            include "ketentuan.php";
            }
        elseif ($page == 'panduan') {
            include "panduan.php";
            }
        elseif ($page == 'jadwal_kegiatan') {
            include "jadwal_kegiatan.php";
            }
        elseif ($page == 'infokursus') {
            include "infokursus.php";
            }
        elseif ($page == 'depan') {
            include "depan.php";
            }
        elseif ($page == 'karyawan') {
            include "karyawan.php";
            }
        elseif ($page == 'tambah_karyawan') {
            include "atribut/tambah_karyawan.php";
            }
        elseif ($page == 'pernyataan') {
            include "administrasi/pernyataan.php";
            }
        elseif ($page == 'formulir') {
            include "administrasi/formulir.php";
            }
        elseif ($page == 'berkasdokumen') {
            include "administrasi/berkasdokumen.php";
            }
        elseif ($page == 'daftarlolosadministrasi') {
            include "administrasi/daftarlolosadministrasi.php";
            }
        elseif ($page == 'pengumuman_wawancara') {
            include "wawancara/pengumuman_wawancara.php";
            }
        elseif ($page == 'sesi_wawancara') {
            include "wawancara/sesi_wawancara.php";
            }
        elseif ($page == 'penilaianwawancara') {
            include "wawancara/penilaianwawancara.php";
            }
        elseif ($page == 'pertanyaan') {
            include "pertanyaan/index.php";
            }
        elseif ($page == 'tambah_pertanyaan') {
            include "pertanyaan/tambah_pertanyaan.php";
            }
        elseif ($page == 'daftarloloswawancara') {
            include "wawancara/daftarloloswawancara.php";
            }
        elseif ($page == 'data_bkkbn') {
            include "databkkbn/data_bkkbn.php";
            }
        elseif ($page == 'tambah_data') {
            include "databkkbn/tambah_data.php";
            }
        elseif ($page == 'unitkerja') {
            include "databkkbn/unitkerja.php";
            }
        elseif ($page == 'universitas') {
            include "universitas/universitas.php";
            }
        elseif ($page == 'jurusan') {
            include "universitas/jurusan.php";
            }
        elseif ($page == 'placement_test') {
            include "ielts/placement_test.php";
            }
        elseif ($page == 'kursus_ielts') {
            include "ielts/kursus_ielts.php";
            }
        elseif ($page == 'ujian_ielts') {
            include "ielts/ujian_ielts.php";
            }
        elseif ($page == 'nilai_ujian') {
            include "ielts/nilai_ujian.php";
            }
        elseif ($page == 'daftarlolosielts') {
            include "ielts/daftarlolosielts.php";
            }
        elseif ($page == 'pendaftaran_ln') {
            include "surat_perjanjian/pendaftaran_ln.php";
            }
        elseif ($page == 'surat_perjanjian') {
            include "surat_perjanjian/surat_perjanjian.php";
            }
        elseif ($page == 'penerimabeasiswa') {
            include "surat_perjanjian/penerimabeasiswa.php";
            }
        elseif ($page == 'mengundurkan_diri') {
            include "laporan/mengundurkan_diri.php";
            }
        elseif ($page == 'daftargagallolosadm') {
            include "laporan/daftargagallolosadm.php";
            }
        elseif ($page == 'daftargagalloloswwc') {
            include "laporan/daftargagalloloswwc.php";
            }
        elseif ($page == 'daftargagallolosielts') {
            include "laporan/daftargagallolosielts.php";
            }
        elseif ($page == 'daftargagallolosprj') {
            include "laporan/daftargagallolosprj.php";
            }
        elseif ($page == 'sedang_tubel') {
            include "laporan/sedang_tubel.php";
            }
        else {
            echo "<h2>Halaman Tidak Ditemukan</h2>";
             }
      }
      else {
       ?>
       <!-- /.row -->
        <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Beranda</h3>
        </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <?php
                $undur = "SELECT * FROM mengundurkan_diri";
                $undurdiri = mysqli_query($koneksi,$undur);
                $dataundurdiri = mysqli_num_rows($undurdiri);

                $gagaladm = "SELECT A.nip AS anip , B.nama , B.provinsi_kantor, B.unit_organ , B.tlp FROM pernyataan A LEFT JOIN formulir B ON B.nip=A.nip LEFT JOIN dokumen C ON C.nip=B.nip WHERE A.status_cpb='Tidak Lolos' OR B.status_cpb='Tidak Lolos' OR C.status_cpb='Tidak Lolos'";
                $gagaladm1 = mysqli_query($koneksi,$gagaladm);
                $datagagaladm = mysqli_num_rows($gagaladm1);

                $step3 = "SELECT * FROM wawancara A INNER JOIN formulir B ON B.nip=A.nip WHERE A.status_cpb='Tidak Lolos'";
                $aaa4 = mysqli_query($koneksi,$step3);
                $dataksg3 = mysqli_num_rows($aaa4);

                $step4 = "SELECT * FROM ielts A INNER JOIN formulir B ON B.nip=A.nip WHERE A.status_cpb='Tidak Lolos' OR A.ket='Tidak Lolos Placement Test' OR A.ket2='Tidak Menyelesaikan Kursus' OR A.ket3='Tidak Menyelesaikan Ujian'";
                $aaa5 = mysqli_query($koneksi,$step4);
                $dataksg4 = mysqli_num_rows($aaa5);

                $step5 = "SELECT * FROM surat_perjanjian A INNER JOIN formulir B ON B.nip=A.nip WHERE A.status_pendaftaran_ln='Tidak didaftarkan' OR A.status='Tidak Lolos'";
                $aaa6 = mysqli_query($koneksi,$step5);
                $dataksg5 = mysqli_num_rows($aaa6);
                if ($dataundurdiri>=1 OR $datagagaladm>=1 OR $dataksg3>=1 OR $dataksg4>=1 OR $dataksg5>=1) {
                ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <p style="font-size:12px;"><b>PERHATIAN !</b><br>
                  Hapuslah data Daftar Calon Penerima Beasiswa Mengundurkan Diri dan Gagal Lolos Seleksi agar karyawan tersebut bisa mengikuti Seleksi Beasiswa S2 tahun berikutnya.</p>
                </div>
                <?php } ?>
                Selamat Datang di Halaman Administrator.<br>
                Silahkan klik menu pilihan yang berada di kiri dan di atas untuk mengelola konten website.
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                Proses Seleksi
              </div>
              <div class="panel-body">
                <?php include "bukatutup.php"; ?>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                Daftar Mengundurkan Diri
              </div>
              <div class="panel-body">
                <?php
                $sql_meng = "SELECT * FROM mengundurkan_diri ORDER BY nip ASC LIMIT 4";
                $query_meng = mysqli_query($koneksi,$sql_meng);
                 ?>
                 <div class="table-responsive">
                 <table class="table table-bordered table-hover" style="font-size:12px;">
                   <thead>
                     <tr>
                       <th style="text-align:center;">No</th>
                       <th style="text-align:center;">NIP</th>
                       <th style="text-align:center;">Nama</th>
                       <th style="text-align:center;">No. Hp</th>
                     </tr>
                   </thead>
                   <tbody>
                   <?php
                   $no=1;
                   while ($data_meng = mysqli_fetch_array($query_meng)) {
                   ?>
                   <tr>
                     <td align="center"><?php echo $no ?></td>
                     <td align="center"><?php echo $data_meng['nip']; ?></td>
                     <td align="center"><?php echo $data_meng['nama']; ?></td>
                     <td align="center"><?php echo $data_meng['tlp']; ?></td>
                   </tr>
                   <?php
                   $no++;}
                   ?>
                   </tbody>
                 </table>
                 </div>
                 <div align="center" style="margin-top:-3px;">
                   <a class="btn btn-primary btn-sm" style="text-align:center;" href="mengundurkan_diri.php" role="button">Selengkapnya</a>
                 </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="vendor/jquery/jquery.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/jquery/jquery-latest.min.js"></script>
<script src="vendor/jquery/jquery.plugin.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="vendor/raphael/raphael.min.js"></script>
<script src="vendor/morrisjs/morris.min.js"></script>
<script src="data/morris-data.js"></script>
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/js/dataTables.bootstrap.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>
<script src="../js/jquery.datepick.js"></script>
<script src="../js/bootstrap-toggle.min.js"></script>
<!-- tiny mce -->
<script type="text/javascript" src="../tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinyMCE.init({
// General options
selector : "textarea",
theme : "modern",
plugins: 'table wordcount image image code hr charmap lists link autosave',
content_css: [
    'vendor/font-awesome/css/font-awesome.min.css',
    '../tinymce/css/codepen.min.css']
});
</script>
<script>
		$(document).ready(function(){
		$('.data').DataTable();
	});
</script>
<script>
	$(function() {
		$('#popupDatepicker').datepick({dateFormat: "yyyy-mm-dd"});
		$('#inlineDatepicker').datepick({onSelect: showDate});
	});

	function showDate(date) {
		alert('The date chosen is ' + date);
	}
</script>
<script type="text/javascript">
    var ukuran = 0;
    $('#file').bind('change', function() {
      ukuran = this.files[0].size/1024/1024;
      ukuran = ukuran.toFixed(2);
        //alert('This file size is: ' + this.files[0].size/1024/1024 + "MB");
    });

    var ukurandownload = 0;
    $('#file').bind('change', function() {
      ukurandownload = this.files[0].size/1024/1024;
      ukurandownload = ukurandownload.toFixed(2);
        //alert('This file size is: ' + this.files[0].size/1024/1024 + "MB");
    });

    var size = 0;
    $('#surat').bind('change', function() {
      size = this.files[0].size/1024/1024;
      size = size.toFixed(2);
        //alert('This file size is: ' + this.files[0].size/1024/1024 + "MB");
    });

    function pdf()
    {
      var fup = document.getElementById('file');
      var filename =fup.value;
      var ext = filename.substring(filename.lastIndexOf('.') + 1);
      if (ext== "pdf") {
        return true;
      }
      else {
        alert("File yang diunggah harus berekstensi *.pdf"),
        fup.focus();
        return false;
      }

      function doc()
      {
        var fup = document.getElementById('file');
        var filename =fup.value;
        var ext = filename.substring(filename.lastIndexOf('.') + 1);
        if (ext== "doc" || "docx") {
          return true;
        }
        else {
          alert("File yang diunggah harus berekstensi *.doc atau *.docx"),
          fup.focus();
          return false;
        }
    }
</script>
<script type="text/javascript">
function validasi(karyawan){
  if (karyawan.nip1.value == ""){
  alert("Anda belum mengisikan NIP Bagian Pertama.");
  karyawan.nip1.focus();
  return (false);
  }
  if (karyawan.nip2.value == ""){
    alert("Anda belum mengisikan NIP Bagian Kedua.");
    karyawan.nip2.focus();
    return (false);
  }
  if (karyawan.nip3.value == ""){
    alert("Anda belum mengisikan NIP Bagian Ketiga.");
    karyawan.nip3.focus();
    return (false);
  }
  if (karyawan.nip4.value == ""){
    alert("Anda belum mengisikan NIP Bagian Keempat.");
    karyawan.nip4.focus();
    return (false);
  }
  if (karyawan.nama.value == ""){
    alert("Anda belum mengisikan Nama.");
    karyawan.nama.focus();
    return (false);
  }
  if (karyawan.password.value == ""){
    alert("Anda belum mengisikan Password (Tanggal Lahir).");
    karyawan.password.focus();
    return (false);
  }
  return (true);
}

function val(ubahkaryawan){
  if (ubahkaryawan.nama.value == ""){
  alert("Anda belum mengisikan Nama.");
  ubahkaryawan.nama.focus();
  return (false);
  }
  return (true);
}

function valjur(jurusan){
  if (jurusan.jurusan.value == ""){
  alert("Anda belum mengisikan Jurusan.");
  jurusan.jurusan.focus();
  return (false);
  }
  return (true);
}

function valjurdit(ditjurusan){
  if (ditjurusan.jurusan.value == ""){
  alert("Anda belum mengisikan Jurusan.");
  ditjurusan.jurusan.focus();
  return (false);
  }
  return (true);
}

function unive(univ){
  if (univ.univ.value == ""){
  alert("Anda belum mengisikan Nama Universitas.");
  univ.univ.focus();
  return (false);
  }
  if (univ.negara.value == ""){
  alert("Anda belum mengisikan Nama Negara.");
  univ.negara.focus();
  return (false);
  }
  return (true);
}

function univee(univv){
  if (univv.univ.value == ""){
  alert("Anda belum mengisikan Nama Universitas.");
  univv.univ.focus();
  return (false);
  }
  if (univv.negara.value == ""){
  alert("Anda belum mengisikan Nama Negara.");
  univv.negara.focus();
  return (false);
  }
  return (true);
}

function unit(unitk){
  if (unitk.unitkerja.value == ""){
  alert("Anda belum mengisikan Unit Kerja.");
  unitk.unitkerja.focus();
  return (false);
  }
  return (true);
}

function valid(edbk){
  if (edbk.prov.value == ""){
  alert("Anda belum mengisikan BKKBN (Pusat/Provinsi).");
  edbk.prov.focus();
  return (false);
  }
  return (true);
}

function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
   if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
  return true;
}
</script>
</body>

</html>
