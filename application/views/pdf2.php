<?php
require_once("dompdf/dompdf_config.inc.php");

//include "config/koneksi.php";
include "config/fungsi_indotgl.php";

function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}

$q = mysql_query("select * from laporan");

$html =  "<html><head>
</head><body>
<div><img src='../images/logo.jpg' style='float:left; margin-right:20px; width:150px; height:150px;' /><font style='font-size:22px; font-weight:bold;'>Laporan Pemilihan Ekstrakurikuler</div>
<br clear='all' /><br>
<table style='width:100%;' cellpadding='5' class='paging'>
<tr style='background-color:#6699FF; color:#FFFFFF;' class='paging'><th class='paging'>No</th><th class='paging'>Nis & Nama</th><th class='paging'>Ekskul</th><th class='paging'>Tanggal</th></tr>";

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

$cr = mysql_fetch_array(mysql_query("select * from siswa where nis = '$r[nis]'"));
$rx = mysql_fetch_array(mysql_query("select * from ekskul where id_ekskul = '$r[id_ekskul]'"));
$wkt = explode(' ' , $r[3]);

//$html .="<tr class='paging' bgcolor='$warna'><td class='paging'>$a</td><td class='paging'>$cr[0] / $cr[1]<td class='paging'>$rx[1]</td><td class='paging'>".tgl_indo($r[3]).' '.$wkt[1]."</td></tr>";
}
 

$html .="</table></body></html>";


$dompdf = new DOMPDF();

$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("pdf.pdf");

?>