<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class json extends CI_Controller {

public function __construct()
{
parent::__construct();
$this->load->database();
}

public function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}

public function index()
{
$this->load->view("login" , array('error' => ' ' ));
}

public function Home()
{
$this->load->view("sukses");
$data = "";
}

public function ambil_data($idx){

if($idx == ""){
$query = mysql_query("SELECT * FROM product ");
}
else{
$cr = mysql_query("select * from jenis_produk where untuk = '$idx'");
$ct = "";
$ht = count($cr);
$ax = 0;
while($xx = mysql_fetch_array($cr)){
$ct .= $xx[0].',';
}

$ct = substr($ct , 0 , strlen($ct) - 1);
$amb_q = "SELECT * FROM product where ";

$p_ct = explode(',' , $ct);

for($xt = 0; $xt < count($p_ct); $xt++){
if($xt ==  count($p_ct) - 1){
$amb_q .= "kategori = '$p_ct[$xt]'";
}
else{
$amb_q .= "kategori = '$p_ct[$xt]' or ";
}

}

$query = mysql_query($amb_q);
}


$v = '{barang:[';

while ($r = mysql_fetch_array($query)) {
 
	if(strlen($v)<15)
	{
	$v .= '{"id":"'.$r[0].'","nama":"'.$r[1].'","foto":"'.$r[2].'","harga":"'.$this->format_rupiah($r['harga']).'","diskon":"'.$r['diskon'].'","penjelasan":"'.mysql_real_escape_string(strip_tags($r['keterangan'])).'"}';
	}
	else{
	$v .= ',{"id":"'.$r[0].'","nama":"'.$r[1].'","foto":"'.$r[2].'","harga":"'.$this->format_rupiah($r['harga']).'","diskon":"'.$r['diskon'].'","penjelasan":"'.mysql_real_escape_string(strip_tags($r['keterangan'])).'"}';
	}
}
//$data = "{peralatan:".json_encode($rows)."}";
$v .= ']}';
echo $v;

}

public function ambil_detail($idx , $kode){

$query = mysql_query("Select * from product where id_product = '$kode'");

$v = '{barang:[';

while ($r = mysql_fetch_array($query)) {
 
	if(strlen($v)<15)
	{
	$v .= '{"id":"'.$r[0].'","nama":"'.$r[1].'","foto":"'.$r[2].'","harga":"'.$this->format_rupiah($r['harga']).'","diskon":"'.$r['diskon'].'","penjelasan":"'.mysql_real_escape_string(strip_tags($r['keterangan'])).'"}';
	}
	else{
	$v .= ',{"id":"'.$r[0].'","nama":"'.$r[1].'","foto":"'.$r[2].'","harga":"'.$this->format_rupiah($r['harga']).'","diskon":"'.$r['diskon'].'","penjelasan":"'.mysql_real_escape_string(strip_tags($r['keterangan'])).'"}';
	}
}
//$data = "{peralatan:".json_encode($rows)."}";
$v .= ']}';
echo $v;

}
	
	
function logout(){
$this->session->sess_destroy();
$this->load->view("admin" , array('error' => ' ' ));
}

function ubahadmin(){
$nama = $this->uri->segment(3);
$query = $this->db->query("SELECT * from admin WHERE nama='$nama'");	
$hasil = array('query' => $query->result());
$this->load->view("utama" , $hasil);
}

function ubah_admin(){
function anti_sql_inject($data){
$filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
return $filter;
}
$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('txtnama', 'Nama','trim|xss_clean|htmlspecialchars|my_real_escape_string|stripslashes|required');
		
		$this->form_validation->set_rules('txtemail', 'Email', 'required|valid_email');
        
	
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("admin");
		}
		else
		{
		// if($type == 'image/jpg' AND $type == 'image/gif' AND $type == 'image/png' AND $type == 'image/jpeg'){//
		//}//
		$this->load->model('m_validasi');
        $this->m_validasi->ubahdata(anti_sql_inject($this->input->post('txtnama')),anti_sql_inject(md5($this->input->post('txtpass'        ))),anti_sql_inject($this->input->post('txtemail')),anti_sql_inject($this->input->post('fupload'))); 					  
		}
	}
}
?>