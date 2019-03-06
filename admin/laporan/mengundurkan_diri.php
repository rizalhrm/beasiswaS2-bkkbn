<?php
if (!isset($_SESSION['id_admin']) || !isset($_SESSION['username']))
    {echo "<script>alert('Maaf, Anda harus login terlebih dahulu.'); location.href='login.php';</script>";
    }

    else {
?>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <h3 class="page-header">Daftar CPB Mengundurkan Diri</h3>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-info">
      <div class="panel-body">
        <?php
          $querya = "SELECT * FROM mengundurkan_diri ORDER BY nip ASC";
          $sqla = mysqli_query($koneksi,$querya);
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
              <div align="center" style="margin-top:-8px; margin-bottom:-7px">
                <a class="btn btn-success btn-xs" style="text-align:center;" href="laporan/cetak/mengundurkan_diri.php" role="button">Cetak Laporan</a>
              </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <div class="table-responsive">
              <table align="center" class="table table-bordered table-hover data" style="font-size:11px;">
            		<thead>
            			<th style="text-align:center;">No.</th>
            			<th style="text-align:center;">NIP</th>
            			<th style="text-align:center;">Nama</th>
                  <th style="text-align:center;">Unit Kerja</th>
                  <th style="text-align:center;">No. HP</th>
            			<th style="text-align:center;">Email</th>
            			<th style="text-align:center;">Alamat Rumah</th>
                  <th style="text-align:center;">Nama Keluarga</th>
                  <th style="text-align:center;">No. HP Keluarga</th>
                  <th style="text-align:center;">Hubungan Kekerabatan</th>
                  <th style="text-align:center;">Alasan</th>
            			<th style="text-align:center;">Aksi</th>
            		</thead>
                <tbody>
            		<?php
            			$no = 1;
            			while ($list = mysqli_fetch_array($sqla)) {
            		?>
            		<tr>
                  <form action="" method="POST">
            			<td align="center"><?php echo $no;?><input type=hidden name='nip' value="<?php echo $list['nip']; ?>"></td>
                  <td align="center"><?php echo $list['nip']; ?></td>
                  <td align="center">
            				<?php echo $list['nama']; ?>
            			</td>
            			<td align="center">
            				<?php echo $list['unit_kerja']; ?>
            			</td>
                  <td align="center">
            				<?php echo $list['tlp']; ?>
            			</td>
                  <td align="center">
            				<?php echo $list['email']; ?>
            			</td>
                  <td align="center">
            				<?php echo $list['alamat_rumah']; ?>
            			</td>
                  <td align="center">
            				<?php echo $list['nama_kel']; ?>
            			</td>
                  <td align="center">
            				<?php echo $list['tlp_kel']; ?>
            			</td>
                  <td align="center">
            				<?php echo $list['hubungan']; ?>
            			</td>
                  <td align="center">
            				<?php echo $list['alasan']; ?>
            			</td>
                  <td align="center">
                    <button type='submit' onclick="return confirm('Yakin akan menghapus data ini?');" name='hapus' class='btn btn-danger btn-sm'>
                      <span class="glyphicon glyphicon-trash"></span> Hapus</button>
            			</td>
                  </form>
            		</tr>
            		<?php
            			$no +=1;
            			}
            		?>
              </tbody>
            	</table>
              </div>
            </div>
            <!-- /.panel-body -->
        </div>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_POST['hapus'])) {
  $id = $_POST['nip'];

		$hasil = mysqli_query($koneksi,"DELETE FROM mengundurkan_diri WHERE nip='$id'");
		if($hasil){
      echo "<script>alert('Data Berhasil dihapus'); location.href='mengundurkan_diri.php';</script>";
		}
}

} ?>
