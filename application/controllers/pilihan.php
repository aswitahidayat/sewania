<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);

class pilihan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function anti_sql_injection($string) {
		$string = stripslashes($string);
		$string = strip_tags($string);
		$string = mysql_real_escape_string($string);
		return $string;
	}


	public function cari_kategori($seg){
		$r = mysql_query("SELECT * FROM sub_kategori where id_kategori = '$_POST[kat]'");
		$a = 0;
		$v = '[';
		while($row = mysql_fetch_array($r)){
			if($a == 0){
				$v .= '{"nama" : "'.$row[1].'" , "id" : "'.$row[0].'"}';
			} else{
				$v .= ',{"nama" : "'.$row[1].'" , "id" : "'.$row[0].'"}';
			}

			$a++;
		}
					
		$v .= ']';
		echo $v;

	}

	public function cari_kota($seg){
		$r = mysql_query("SELECT * FROM kota where id_lokasi = '$_POST[prov]'");
		$a = 0;
		$v = '[';
		while($row = mysql_fetch_array($r)){
			if($a == 0){
				$v .= '{"nama_kota" : "'.$row[2].'" , "id" : "'.$row[0].'"}';
			} else{
				$v .= ',{"nama_kota" : "'.$row[2].'" , "id" : "'.$row[0].'"}';
			}

			$a++;
		}
					
		$v .= ']';
		echo $v;

	}

}
?>