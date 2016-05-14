<?php
require_once("dompdf/dompdf_config.inc.php");

include "config/fungsi_indotgl.php";

function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}

$url = $_SERVER['DOCUMENT_ROOT'].'/donor_darah_baru/ivory_src/images/imagesj.jpg';

//$url = 'http://localhost/donor_darah_baru//ivory_src/images/LOGO%20-%20PMI.png';
$q = mysql_query("select * from pendonor");

$html =  "<html><head>
</head><body>
<div><img src='$url' style='float:left; margin-right:20px; width:260px; height:180px;' /><font style='font-size:22px; font-weight:bold;'>Laporan Data Pendonor</div>
<br clear='all' /><br>
<table style='width:100%;' cellpadding='5' class='paging'>
<tr style='background-color:#6699FF; color:#FFFFFF;' class='paging'><th class='paging'>No</th><th class='paging'>Nama</th><th class='paging'>Alamat</th><th class='paging'>Kontak</th><th class='paging'>Email</th><th class='paging'>Tanggal Daftar</th><th class='paging'>Gol Darah</th><th class='paging'>Pekerjaan</th></tr>";

$warna = '#EEEEEE';
$warna1 = '#EEEEEE';
$warna2 = '#FFFFFF';

$a = 0;
while($r = mysql_fetch_array($q)){


if($warna == $warna2){
$warna = $warna1;
}
else{
$warna = $warna2;
}

$a++;

$html .="<tr class='paging' bgcolor='$warna'><td class='paging'>$a</td><td class='paging'>$r[1]<td class='paging'>$r[2]</td><td class='paging'>".$r[3]."</td><td class='paging'>".$r[4]."</td><td class='paging'>".$r[5]."</td><td class='paging'>".$r[6]."</td><td class='paging'>".$r[7]."</td></tr>";
}
 

$html .="</tr></table></body></html>";


$dompdf = new DOMPDF();

$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("pdf.pdf");



?>