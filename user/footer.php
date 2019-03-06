<hr>
<footer>
		<div>Copyright &copy; <?php echo date("Y"); ?> Pulin. All Right Reserved.</div>
</footer>
<br>
 </div><!--/.fluid-container-->
 </div>
		<script src="../js/jquery.js"></script>
    <script src="../js/bootstrap-transition.js"></script>
    <script src="../js/bootstrap-alert.js"></script>
    <script src="../js/bootstrap-modal.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
    <script src="../js/bootstrap-scrollspy.js"></script>
    <script src="../js/bootstrap-tab.js"></script>
    <script src="../js/bootstrap-tooltip.js"></script>
    <script src="../js/bootstrap-popover.js"></script>
    <script src="../js/bootstrap-button.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
    <script src="../js/bootstrap-carousel.js"></script>
    <script src="../js/bootstrap-typeahead.js"></script>
		<script type="text/javascript" src="../css/popup-calendar/dhtmlgoodies_calendar.js"></script>
		<script type="text/javascript">
				var ukuran = 0;
				$('#file').bind('change', function() {
					ukuran = this.files[0].size/1024/1024;
					ukuran = ukuran.toFixed(2);
						//alert('This file size is: ' + this.files[0].size/1024/1024 + "MB");
				});

				var ukurandok = 0;
				$('#file').bind('change', function() {
					ukurandok = this.files[0].size/1024/1024;
					ukurandok = ukurandok.toFixed(2);
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
				}
		</script>
    <script type="text/javascript">
        var htmlobjek;
        $(document).ready(function(){
          //apabila terjadi event onchange terhadap object <select id=propinsi>

          $("#bkkbn").change(function(){
            var bkkbn = $("#bkkbn").val();
            $.ajax({
                url: "unitkerja.php",
                data: "bkkbn="+bkkbn,
                cache: false,
                success: function(msg){
                    $("#unitkerja").html(msg);
                }
            });
          });

          $("#bkkbn").change(function(){
            var bkkbn = $("#bkkbn").val();
            $.ajax({
                url: "alamat_kantor.php",
                data: "bkkbn="+bkkbn,
                cache: false,
                success: function(msg){
                    $("#alamat_kantor").html(msg);
                }
            });
          });

          $("#univ_1").change(function(){
            var univ_1 = $("#univ_1").val();
            $.ajax({
                url: "jrs/pilihjurusan.php",
                data: "univ_1="+univ_1,
                cache: false,
                success: function(msg){
                    $("#programstudi_1").html(msg);
                }
            });
          });

          $("#univ_2").change(function(){
            var univ_2 = $("#univ_2").val();
            $.ajax({
                url: "jrs/pilihjurusan2.php",
                data: "univ_2="+univ_2,
                cache: false,
                success: function(msg){
                    $("#programstudi_2").html(msg);
                }
            });
          });

          $("#univ_3").change(function(){
            var univ_3 = $("#univ_3").val();
            $.ajax({
                url: "jrs/pilihjurusan3.php",
                data: "univ_3="+univ_3,
                cache: false,
                success: function(msg){
                    $("#programstudi_3").html(msg);
                }
            });
          });
        });
    </script>
    <script type="text/javascript">
          function cek_uk(obj) {
          var value = obj.value;
            if (obj.selectedIndex!=1) {
              document.getElementById("txt_uk").style.display="block";
              document.getElementById("unitkerja").style.display="none";
            }
            else if (obj.selectedIndex==1) {
              document.getElementById("txt_uk").style.display="none";
              document.getElementById("unitkerja").style.display="block";
            }
          }
    </script>
		<script type="text/javascript">
		function validasi(formulir){
		  if (formulir.nama.value == ""){
		    alert("Anda belum mengisikan Nama.");
		    formulir.nama.focus();
		    return (false);
		  }
		  if (formulir.tempat_lahir.value == ""){
		    alert("Anda belum mengisikan Tempat Lahir.");
		    formulir.tempat_lahir.focus();
		    return (false);
		  }
		  if (formulir.tgl_lahir.value == ""){
		     alert("Anda belum mengisikan Tanggal Lahir.");
		    formulir.tgl_lahir.focus();
		    return (false);
		  }
		  if (formulir.jumlah_anak.value == ""){
		    alert("Anda belum mengisikan Jumlah Anak.");
		    formulir.jumlah_anak.focus();
		    return (false);
		  }
		  if (formulir.telepon.value == 0){
		    alert("Anda belum mengisikan No. Handphone.");
		    formulir.telepon.focus();
		    return (false);
		  }
		  if (formulir.email.value == ""){
		    alert("Anda belum mengisikan Email.");
		    formulir.email.focus();
		    return (false);
		  }
			if (formulir.nama_kel.value == ""){
		    alert("Anda belum mengisikan Nama Keluarga.");
		    formulir.nama_kel.focus();
		    return (false);
		  }
			if (formulir.telepon_kel.value == ""){
		    alert("Anda belum mengisikan No. HP Keluarga.");
		    formulir.telepon_kel.focus();
		    return (false);
		  }
			if (formulir.hubungan_kel.value == ""){
		    alert("Anda belum mengisikan Hubungan Kekerabatan.");
		    formulir.hubungan_kel.focus();
		    return (false);
		  }
			if (formulir.alamat_kantor.value == ""){
		    alert("Anda belum mengisikan Alamat Kantor.");
		    formulir.alamat_kantor.focus();
		    return (false);
		  }
			if (formulir.jabatan_sekarang.value == ""){
		    alert("Anda belum mengisikan Jabatan Sekarang.");
		    formulir.jabatan_sekarang.focus();
		    return (false);
		  }
			if (formulir.masa_kerja1.value == ""){
		    alert("Anda belum mengisikan Tahun Masa Kerja.");
		    formulir.masa_kerja1.focus();
		    return (false);
		  }
			if (formulir.masa_kerja2.value == ""){
		    alert("Anda belum mengisikan Bulan Masa Kerja.");
		    formulir.masa_kerja2.focus();
		    return (false);
		  }
			if (formulir.perguruan_tinggi.value == ""){
		    alert("Anda belum mengisikan Asal Perguruan Tinggi.");
		    formulir.perguruan_tinggi.focus();
		    return (false);
		  }
			if (formulir.fakultas.value == ""){
		    alert("Anda belum mengisikan Fakultas.");
		    formulir.fakultas.focus();
		    return (false);
		  }
			if (formulir.program_studi.value == ""){
		    alert("Anda belum mengisikan Program Studi.");
		    formulir.program_studi.focus();
		    return (false);
		  }
			if (formulir.judul_thesis.value == ""){
		    alert("Anda belum mengisikan Judul Thesis.");
		    formulir.judul_thesis.focus();
		    return (false);
		  }
			if (formulir.nilai_ipk.value == ""){
		    alert("Anda belum mengisikan Nilai IPK.");
		    formulir.nilai_ipk.focus();
		    return (false);
		  }
			if (formulir.esai.value == ""){
		    alert("Anda belum mengisikan Esai.");
		    formulir.esai.focus();
		    return (false);
		  }
		  return (true);
		}

		function validasiin(ubahformulir){
		  if (ubahformulir.nama.value == ""){
		    alert("Anda belum mengisikan Nama.");
		    ubahformulir.nama.focus();
		    return (false);
		  }
		  if (ubahformulir.tempat_lahir.value == ""){
		    alert("Anda belum mengisikan Tempat Lahir.");
		    ubahformulir.tempat_lahir.focus();
		    return (false);
		  }
		  if (ubahformulir.tgl_lahir.value == ""){
		     alert("Anda belum mengisikan Tanggal Lahir.");
		    ubahformulir.tgl_lahir.focus();
		    return (false);
		  }
		  if (ubahformulir.jumlah_anak.value == ""){
		    alert("Anda belum mengisikan Jumlah Anak.");
		    ubahformulir.jumlah_anak.focus();
		    return (false);
		  }
		  if (ubahformulir.telepon.value == 0){
		    alert("Anda belum mengisikan No. Handphone.");
		    ubahformulir.telepon.focus();
		    return (false);
		  }
		  if (ubahformulir.email.value == ""){
		    alert("Anda belum mengisikan Email.");
		    ubahformulir.email.focus();
		    return (false);
		  }
			if (ubahformulir.nama_kel.value == ""){
		    alert("Anda belum mengisikan Nama Keluarga.");
		    ubahformulir.nama_kel.focus();
		    return (false);
		  }
			if (ubahformulir.telepon_kel.value == ""){
		    alert("Anda belum mengisikan No. HP Keluarga.");
		    ubahformulir.telepon_kel.focus();
		    return (false);
		  }
			if (ubahformulir.hubungan_kel.value == ""){
		    alert("Anda belum mengisikan Hubungan Kekerabatan.");
		    ubahformulir.hubungan_kel.focus();
		    return (false);
		  }
			if (ubahformulir.perguruan_tinggi.value == ""){
		    alert("Anda belum mengisikan Asal Perguruan Tinggi.");
		    ubahformulir.perguruan_tinggi.focus();
		    return (false);
		  }
			if (ubahformulir.fakultas.value == ""){
		    alert("Anda belum mengisikan Fakultas.");
		    ubahformulir.fakultas.focus();
		    return (false);
		  }
			if (ubahformulir.program_studi.value == ""){
		    alert("Anda belum mengisikan Program Studi.");
		    ubahformulir.program_studi.focus();
		    return (false);
		  }
			if (ubahformulir.judul_thesis.value == ""){
		    alert("Anda belum mengisikan Judul Thesis.");
		    ubahformulir.judul_thesis.focus();
		    return (false);
		  }
			if (ubahformulir.nilai_ipk.value == ""){
		    alert("Anda belum mengisikan Nilai IPK.");
		    ubahformulir.nilai_ipk.focus();
		    return (false);
		  }
			if (ubahformulir.esai.value == ""){
		    alert("Anda belum mengisikan Esai.");
		    ubahformulir.esai.focus();
		    return (false);
		  }
		  return (true);
		}

		function validasikan(ubahkantor){
			if (ubahkantor.alamat_kantor.value == ""){
			alert("Anda belum mengisikan Alamat Kantor.");
			ubahkantor.alamat_kantor.focus();
			return (false);
			}
			if (ubahkantor.jabatan_sekarang.value == ""){
				alert("Anda belum mengisikan Jabatan Sekarang.");
				uubahkantor.jabatan_sekarang.focus();
				return (false);
			}
			if (ubahkantor.masa_kerja1.value == ""){
				alert("Anda belum mengisikan Tahun Masa Kerja.");
				ubahkantor.masa_kerja1.focus();
				return (false);
			}
			if (ubahkantor.masa_kerja2.value == ""){
				alert("Anda belum mengisikan Bulan Masa Kerja.");
				ubahkantor.masa_kerja2.focus();
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
