<?php
include "../../config/koneksi.php";
require ("../../config/html2pdf/html2pdf.class.php");
$idcpb=$_POST['idc'];
$filename="Surat_Panggilan_Wawancara_".$idcpb.".pdf";
$content = ob_get_clean();
$sql_peng = "SELECT * FROM wawancara WHERE nip='$idcpb'";
$query_peng = mysqli_query($koneksi,$sql_peng);
$peng = mysqli_fetch_array($query_peng);
$content="<page backtop=14mm backbottom=14mm backleft=10mm backright=10mm style=font-size: 12pt>
          <page_header style='margin-bottom:40px'>
              <table class=page_header>
                  <tr>
                      <td style='width: 100%; text-align:center;'>
                          <img src='../../img/logo2.png' style='margin-left:235px;' alt='Logo BKKBN' />
                      </td>
                  </tr>
              </table>
          </page_header>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          $peng[pengumuman]
          <page_footer>
              <table class=page_footer>
                  <tr>
                      <td style='width: 100%;'>
                        <p style='padding-left:139px;'><b>Badan Kependudukan dan Keluarga Berencana Nasional</b></p>
                        <p style='margin-top:-10px; font-size:11px; padding-left:163px;'>Jl. Permata No. 1, Halim Perdanakusuma, Jakarta Timur 13650</p>
                        <p style='margin-top:-10px; font-size:11px; padding-left:65px;'>Telp. : (021) 8098018, 8009029-45-53-69-77-85 Fax. : (021) 8008554 Website : http://www.bkkbn.go.id</p>
                      </td>
                  </tr>
              </table>
          </page_footer>
      </page>";
      try
            	{
            		$html2pdf = new HTML2PDF('P','A4','fr', false, 'ISO-8859-15',array(20, 10, 20, 10)); //setting ukuran kertas dan margin pada dokumen anda
            		// $html2pdf->setModeDebug();
            		$html2pdf->setDefaultFont('Arial');
            		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            		$html2pdf->Output($filename);
            	}
            	catch(HTML2PDF_exception $e) { echo $e; }
?>
