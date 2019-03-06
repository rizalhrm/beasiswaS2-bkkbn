<?php
$pengumuman = $_POST['pengumuman'];
$sql_peng = "SELECT * FROM wawancara WHERE nip='$pengumuman'";
$query_peng = mysqli_query($koneksi,$sql_peng);
$peng = mysqli_fetch_array($query_peng);
 ?>

  <div align="center">
    <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
          Kembali <span class="glyphicon glyphicon-circle-arrow-left"></span></a>
  </div>
  <br>
  <div class="col-sm-offset-2 col-sm-8">
  <table class="table table-bordered" align="center">
    <tr>
      <td align="center"><b>Isi Pengumuman</b></td>
    </tr>
    <tr>
      <td><?php echo $peng['pengumuman']; ?></td>
    </tr>
  </table>
  </div>
