<?php
$id = $_POST['nip'];
$queryed = "SELECT * from wawancara A INNER JOIN formulir B ON B.nip=A.nip WHERE a.nip='$id'";
$sqled = mysqli_query($koneksi,$queryed);
$dataed = mysqli_fetch_array($sqled);
 ?>

  <form class="form-horizontal" action="" method="POST" name='penilaian'>
    <div class="form-group">
    <label class="col-sm-12 control-label" style="text-align:center;">Penilaian Wawancara untuk <?php echo $dataed['nama']; ?> <?php echo " ($id)"; ?></label>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-1 col-sm-10">

        <table class="table table-bordered" style="font-size:13px;">
          <thead>
            <tr>
              <th style="text-align:center; vertical-align: middle;">No</th>
              <th colspan="2" style="text-align:center; vertical-align: middle;">Kriteria Penilaian</th>
              <th style="text-align:center; vertical-align: middle;">Nilai Skala (1-5)</th>
              <th style="text-align:center; vertical-align: middle;">Sub total</th>
              <th style="text-align:center; vertical-align: middle;">Bobot Nilai</th>
              <th style="text-align:center; vertical-align: middle;">Sub total x Bobot Nilai</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="vertical-align: middle;" align="center">1</td>
              <td style="vertical-align: middle;" rowspan="5" align="center">PEMAHAMAN SUBTANSI</td>
              <td align="center">Pengetahuan tentang beasiswa S2 Luar Negeri BKKBN</td>
              <td align="center"><input type="number" class="form-control" min="1" max="5" name="subtansi1" style="width:75px;" value="1" autofocus onFocus="startCalc();" onBlur="stopCalc();"></td>
              <td style="vertical-align: middle;" rowspan="5" align="center"><input type="number" class="form-control" style="width:75px;" name="subtotal1" value="" readonly></td>
              <td style="vertical-align: middle;" rowspan="5" align="center">50%</td>
              <td style="vertical-align: middle;" rowspan="5" align="center"><input type="number" class="form-control" style="width:75px;" name="kalkulasi1" value="" readonly></td>
            </tr>
            <tr>
              <td style="vertical-align: middle;" align="center">2</td>
              <td align="center">Motivasi ikut seleksi beasiswa S2 luar negeri</td>
              <td align="center"><input type="number" min="1" max="5" name="subtansi2" class="form-control" style="width:75px;" value="1" onFocus="startCalc();" onBlur="stopCalc();"></td>
            </tr>
            <tr>
              <td style="vertical-align: middle;" align="center">3</td>
              <td align="center">Alasan pemilihan jurusan dan perguruan tinggi luar negeri</td>
              <td align="center"><input type="number" min="1" max="5" name="subtansi3" class="form-control" style="width:75px;" value="1" onFocus="startCalc();" onBlur="stopCalc();"></td>
            </tr>
            <tr>
              <td style="vertical-align: middle;" align="center">4</td>
              <td align="center">Relevansi jurusan terhadap tupoksi.</td>
              <td align="center"><input type="number" min="1" max="5" name="subtansi4" class="form-control" style="width:75px;" value="1" onFocus="startCalc();" onBlur="stopCalc();"></td>
            </tr>
            <tr>
              <td style="vertical-align: middle;" align="center">5</td>
              <td align="center">Rencana kerja setelah tugas belajar dan kontribusi terhadap BKKBN</td>
              <td align="center"><input type="number" min="1" max="5" name="subtansi5" class="form-control" style="width:75px;" value="1" onFocus="startCalc();" onBlur="stopCalc();"></td>
            </tr>

            <tr>
              <td style="vertical-align: middle;" align="center">6</td>
              <td style="vertical-align: middle;" rowspan="5" align="center">MOTIVASI DAN STRATEGI</td>
              <td align="center">Sikap, rencana dan strategi untuk menyelesaikan masa tugas belajar tepat waktu</td>
              <td align="center"><input type="number" class="form-control" min="1" max="5" name="motivasi1" style="width:75px;" value="1" autofocus onFocus="startCalc();" onBlur="stopCalc();"></td>
              <td style="vertical-align: middle;" rowspan="5" align="center"><input type="number" class="form-control" style="width:75px;" name="subtotal2" value="" readonly></td>
              <td style="vertical-align: middle;" rowspan="5" align="center">30%</td>
              <td style="vertical-align: middle;" rowspan="5" align="center"><input type="number" class="form-control" style="width:75px;" name="kalkulasi2" value="" readonly></td>
            </tr>
            <tr>
              <td style="vertical-align: middle;" align="center">7</td>
              <td align="center">Alasan pengambilan judul thesis atau disertasi</td>
              <td align="center"><input type="number" min="1" max="5" name="motivasi2" class="form-control" style="width:75px;" value="1" onFocus="startCalc();" onBlur="stopCalc();"></td>
            </tr>
            <tr>
              <td style="vertical-align: middle;" align="center">8</td>
              <td align="center">Motivasi dalam mengerjakan tugas belajar</td>
              <td align="center"><input type="number" min="1" max="5" name="motivasi3" class="form-control" style="width:75px;" value="1" onFocus="startCalc();" onBlur="stopCalc();"></td>
            </tr>
            <tr>
              <td style="vertical-align: middle;" align="center">9</td>
              <td align="center">Kesiapan peserta terhadap sanksi yang akan diterima jika gagal tugas belajar</td>
              <td align="center"><input type="number" min="1" max="5" name="motivasi4" class="form-control" style="width:75px;" value="1" onFocus="startCalc();" onBlur="stopCalc();"></td>
            </tr>
            <tr>
              <td style="vertical-align: middle;" align="center">10</td>
              <td align="center">Kesanggupan mengikuti prosedur seleksi</td>
              <td align="center"><input type="number" min="1" max="5" name="motivasi5" class="form-control" style="width:75px;" value="1" onFocus="startCalc();" onBlur="stopCalc();"></td>
            </tr>

            <tr>
              <td style="vertical-align: middle;" align="center">11</td>
              <td style="vertical-align: middle;" rowspan="5" align="center">ETIKA DAN ETIKET</td>
              <td align="center">Ketepatan waktu kehadiran</td>
              <td align="center"><input type="number" class="form-control" min="1" max="5" name="etika1" style="width:75px;" value="1" autofocus onFocus="startCalc();" onBlur="stopCalc();"></td>
              <td style="vertical-align: middle;" rowspan="5" align="center"><input type="number" class="form-control" style="width:75px;" name="subtotal3" value="" readonly></td>
              <td style="vertical-align: middle;" rowspan="5" align="center">20%</td>
              <td style="vertical-align: middle;" rowspan="5" align="center"><input type="number" class="form-control" style="width:75px;" name="kalkulasi3" value="" readonly></td>
            </tr>
            <tr>
              <td style="vertical-align: middle;" align="center">12</td>
              <td align="center">Kerapihan dan cara berpakaian</td>
              <td align="center"><input type="number" min="1" max="5" name="etika2" class="form-control" style="width:75px;" value="1" onFocus="startCalc();" onBlur="stopCalc();"></td>
            </tr>
            <tr>
              <td style="vertical-align: middle;" align="center">13</td>
              <td align="center">Menunjukkan sikap sopan santun dalam bertutur kata maupun bertingkah laku</td>
              <td align="center"><input type="number" min="1" max="5" name="etika3" class="form-control" style="width:75px;" value="1" onFocus="startCalc();" onBlur="stopCalc();"></td>
            </tr>
            <tr>
              <td style="vertical-align: middle;" align="center">14</td>
              <td align="center">Mimik dan gesture tubuh dalam menjawab pertanyaan pewawancara</td>
              <td align="center"><input type="number" min="1" max="5" name="etika4" class="form-control" style="width:75px;" value="1" onFocus="startCalc();" onBlur="stopCalc();"></td>
            </tr>
            <tr>
              <td style="vertical-align: middle;" align="center">15</td>
              <td align="center">Penggunaan bahasa baku dalam menjawab pertanyaan</td>
              <td align="center"><input type="number" min="1" max="5" name="etika5" class="form-control" style="width:75px;" value="1" onFocus="startCalc();" onBlur="stopCalc();"></td>
            </tr>
            <tr>
              <td style="vertical-align: middle;" colspan="6" align="right"><b>Total Nilai Wawancara (max. 100)</b></td>
              <td style="vertical-align: middle;" align="center"><input type="number" class="form-control" style="width:75px;" name="totalnilai" value="" readonly></td>
            </tr>
          </tbody>
        </table>
        <table style="font-size:13px;">
          <tr>
            <td>
              <b>Keterangan :</b>
              <ul>
                <li>Calon Penerima Beasiswa dinyatakan lulus jika nilai wawancara di atas <b>74</b></li>
                <li>
                  <table class="table table-bordered" style="font-size:13px;">
                    <thead>
                      <tr>
                        <th style="text-align:center;">Parameter</th>
                        <th style="text-align:center;">Nilai</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td align="center">Sangat Kurang</td>
                        <td align="center">1</td>
                      </tr>
                      <tr>
                        <td align="center">Kurang</td>
                        <td align="center">2</td>
                      </tr>
                      <tr>
                        <td align="center">Cukup</td>
                        <td align="center">3</td>
                      </tr>
                      <tr>
                        <td align="center">Baik</td>
                        <td align="center">4</td>
                      </tr>
                      <tr>
                        <td align="center">Sangat Baik</td>
                        <td align="center">5</td>
                      </tr>
                    </tbody>
                  </table>
                </li>
              </ul>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="form-group" align="center">
      <div class="col-sm-offset-1 col-sm-10">
      <input type=hidden name='nip' value="<?php echo $id ?>">
      <button type="submit" name="tombolberinilai" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Simpan</button>
      <a class="btn btn-warning btn-md" href="<?php if(isset($_SERVER['HTTP_REFERER'])){ echo $_SERVER['HTTP_REFERER']; } ?>" role="button">
        Batal <span class="glyphicon glyphicon-floppy-remove"></span></a>
      </div>
    </div>
  </form>
