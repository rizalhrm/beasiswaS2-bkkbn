<?php include "header.php"; ?>

<div class="span9">
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
    elseif ($page == 'gantipassword') {
        include "gantipassword.php";
         }
    elseif ($page == 'persyaratan') {
        include "persyaratan.php";
         }
    elseif ($page == 'ketentuan') {
        include "ketentuan.php";
         }
    elseif ($page == 'jadwal_kegiatan') {
        include "jadwal_kegiatan.php";
         }
    elseif ($page == 'dokumen') {
        include "dokumen.php";
         }
     elseif ($page == 'panduan') {
         include "panduan.php";
         }
    else {
        echo "<h2>Halaman Tidak Ditemukan</h2>";
         }
  }
  else {
   ?>
   <div id="myCarousel" class="carousel slide">
   <ol class="carousel-indicators">
     <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
     <li data-target="#myCarousel" data-slide-to="1"></li>
     <li data-target="#myCarousel" data-slide-to="2"></li>
   </ol>
   <!-- Carousel items -->
   <div class="carousel-inner">

     <div class="active item"><img src="img/slider01.jpg" alt="" />
       <div class="carousel-caption">
           <div class="content-heading"> <!-- Input Your Home Content Here -->
               <br><h4>MAHIDOL UNIVERSITY</h4>
               <p>Bangkok, Thailand</p><br>
           </div><!-- End Input Your Home Content Here -->
       </div>
     </div>

     <div class="item"><img src="img/slider02.jpg" alt="" />
       <div class="carousel-caption">
           <div class="content-heading"> <!-- Input Your Home Content Here -->
               <br><h4>UNIVERSITI SAINS MALAYSIA</h4>
               <p>Pulau Pinang, Malaysia</p><br>
           </div><!-- End Input Your Home Content Here -->
       </div>
     </div>

     <div class="item"><img src="img/slider03.jpg" alt="" />
       <div class="carousel-caption">
           <div class="content-heading"> <!-- Input Your Home Content Here -->
               <br><h4>AUSTRALIAN NATIONAL UNIVERSITY</h4>
               <p>Canberra, Australia</p><br>
           </div><!-- End Input Your Home Content Here -->
       </div>
     </div>

   </div>
   <!-- Carousel nav -->
   <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
   <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
 </div>
   <?php
   $querybr = "SELECT * FROM identitas_web WHERE id = '1'";
   $sqlbr = mysqli_query($koneksi,$querybr);
   $databr = mysqli_fetch_array($sqlbr);
    ?>
  <div class="span12 wellwhite" style="margin-left: 0px">
  <legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold"><?php echo "$databr[1]"; ?></legend>
  <div class="row-fluid">
  <?php echo "$databr[2]"; ?>
  <center><a class="btn btn-primary" href="panduan.php" role="button">Panduan</a></center>
</div>
</div>
<?php } ?>

</div><!--/span-->
 </div><!--/row-->

  <?php include "footer.php"; ?>
