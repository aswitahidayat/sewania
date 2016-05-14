<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);

class aktivasi extends CI_Controller {

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

public function index()
{
$this->load->model('madmin');
$data['title'] = 'Detail Barang'; //judul title
$data['qbarang'] = $this->madmin->ambil_data_kategori($segment); //query model barang sesuai id
$data['qprovinsi'] = $this->madmin->ambil_data_provinsi($segment); //query model barang sesuai id

 
$this->load->view('index',$data); //meload views detail barang
}

public function login(){

$username = $this->input->post('user');
$pass = $this->input->post('password');

$user = $this->db->escape($username);

// For use inside LIKE query
$sanitised_user = $this->db->escape_like_str($user);

$username = $this->anti_sql_injection($username);
$pass = $this->anti_sql_injection($pass);

$pass = md5($pass);

$this->db->where('email' , $username);
$this->db->where('password' , $pass);

$query = $this->db->get('member');

$usr = "";
foreach($query->result() as $rows){
$usr = $rows->token_id;
}

if($query->num_rows() > 0){
$_SESSION['login'] = true;
$_SESSION['token_id'] = $usr;
}

echo $usr;

}

public function tes(){
echo "tes";
}

public function verifikasi($seg){
$q = mysql_query("update member set aktif = 'y' where token_id = '$seg'");
echo "Selamat .. anda telah aktif menjadi member sewania.com ...";
}

}
?>