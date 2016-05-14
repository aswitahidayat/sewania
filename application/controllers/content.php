<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

error_reporting(0);
class content extends CI_Controller {

public function __construct()
{
parent::__construct();
}

public function index()
{
if($this->session->userdata('login_user_ivory') == FALSE){
$this->load->view('login');
}
else{
$this->load->view('hal_utama');
}
}

public function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}

public function approval(){
$idx = $this->input->post('id_member');

$q = mysql_fetch_array(mysql_query("Select * from member where id_member = '$idx'"));

$ex_produk = explode(',' , $q['produk']);

$jml = count($ex_produk);

$id_product = "";
$size = "";
$qty = "";

$index = 0;
foreach($ex_produk as $hasil){
$idx_pr = $this->input->post('chk_Product'.$index);
$size_pr = $this->input->post('t_size'.$index);
$qty_pr = $this->input->post('t_qtyx'.$index);

if(empty($idx_pr)){
continue;
}
else{
$id_product .=  $idx_pr.',';
$size .=  $size_pr.',';
$qty .=  $qty_pr.',';
}

$index++;
}

$id_product = substr($id_product , 0 , strlen($id_product) - 1);
$size = substr($size , 0 , strlen($size) - 1);
$qty = substr($qty , 0 , strlen($qty) - 1);

//echo $id_product;
$ac = $this->input->post('rdb_paymentx');

mysql_query("Update member set produk = '$id_product' , size = '$size' , qty = '$qty' , bayar = '$ac' where id_member = '$idx'");
redirect('content/data/member');

}

function global_add($mod){
$query = mysql_query("select * from ".$mod);
$num_field = mysql_num_fields($query) - 1;
$a = 1;
$b = 1;
$str = "";
$u = 0;
$c = 1;
$act = $this->uri->segment(4);

$total_sg = $this->uri->total_segments();
$last = $this->uri->segment($total_sg);

if($last != 'no_img'){
$nama_foto = $_FILES[$last]['name'];
$tmp = $_FILES[$last]['tmp_name'];
$rnd_foto = rand(00000 , 99999).$nama_foto;
}

if($act == 'tambah'){
$insert_query = "Insert into ".$mod.' (';
while($b <= $num_field ){
if($b < $num_field){
$insert_query .= mysql_field_name($query , $b).',';
}
else{
$insert_query .= mysql_field_name($query , $b).') Values(';
}
$b++;
}
while($a <= $num_field ){
if($a < $num_field){
if(mysql_field_name($query , $a) != 'password' && mysql_field_name($query , $a) != 'gambar' && mysql_field_name($query , $a) != 'photos' && mysql_field_name($query , $a) != 'foto'){
$insert_query .= "'".$this->input->post(mysql_field_name($query , $a))."'".',';
}
else if(mysql_field_name($query , $a) == 'password'){
$insert_query .= "'".md5($this->input->post(mysql_field_name($query , $a)))."'".',';
}
else if(mysql_field_name($query , $a) == 'gambar' || mysql_field_name($query , $a) == 'foto' || mysql_field_name($query , $a) == 'photos'){
$insert_query .= "'".$rnd_foto."'".',';
}
}
else{
if(mysql_field_name($query , $a) != 'password' && mysql_field_name($query , $a) != 'gambar' && mysql_field_name($query , $a) != 'photos' && mysql_field_name($query , $a) != 'foto'){
$insert_query .= "'".$this->input->post(mysql_field_name($query , $a))."'";
}
else if(mysql_field_name($query , $a) == 'password'){
$insert_query .= "'".md5($this->input->post(mysql_field_name($query , $a)))."'";
}
else if(mysql_field_name($query , $a) == 'gambar' || mysql_field_name($query , $a) == 'foto' || mysql_field_name($query , $a) == 'photos'){
$insert_query .= "'".$rnd_foto."'";
}

}
$a++;
}

$insert_query .= ")";
}
else{
$insert_query = "Update ".$mod." set ";
while($c <= $num_field ){
if($c < $num_field){
if(mysql_field_name($query , $c) != 'password' && mysql_field_name($query , $c) != 'gambar' && mysql_field_name($query , $c) != 'photos' && mysql_field_name($query , $c) != 'foto'){
$insert_query .= mysql_field_name($query , $c)."='".$this->input->post(mysql_field_name($query , $c))."'".',';
}
else if(mysql_field_name($query , $c) == 'password'){
if($this->input->post(mysql_field_name($query , $c)) != ''){
$insert_query .= mysql_field_name($query , $c)."='".md5($this->input->post(mysql_field_name($query , $c)))."'".',';
}
}
else if(mysql_field_name($query , $c) == 'gambar' || mysql_field_name($query , $c) == 'foto' || mysql_field_name($query , $c) == 'photos'){
if(!empty($nama_foto)){
$insert_query .= mysql_field_name($query , $c)."='".$rnd_foto."'".',';
}
}
}
else{
if(mysql_field_name($query , $c) != 'password' && mysql_field_name($query , $c) != 'gambar' && mysql_field_name($query , $c) != 'photos' && mysql_field_name($query , $c) != 'foto'){
$insert_query .= mysql_field_name($query , $c)."='".$this->input->post(mysql_field_name($query , $c))."'";
}
else if(mysql_field_name($query , $c) == 'password'){
if($this->input->post(mysql_field_name($query , $c)) != ''){
$insert_query .= mysql_field_name($query , $c)."='".md5($this->input->post(mysql_field_name($query , $c)))."'";
}
else{
$insert_query = substr($insert_query , 0 , strlen($insert_query) - 1);
}
}
else if(mysql_field_name($query , $c) == 'gambar' || mysql_field_name($query , $c) == 'foto' || mysql_field_name($query , $c) == 'photos'){
if(!empty($nama_foto)){
$insert_query .= mysql_field_name($query , $c)."='".$rnd_foto."'";
}
else{
$insert_query = substr($insert_query , 0 , strlen($insert_query) - 1);
}
}
}
$c++;
}
$insert_query .= "where id_".$mod.' = '.$this->input->post('id_'.$mod);
}

if($mod == "pembelian"){
$stok = explode(',' , $this->input->post('stok_prev'));
$id_brg = explode(','  , $this->input->post('kode_brg'));
$hrg = explode(','  , $this->input->post('hrg_beli_arr'));

$hit_brg = count($id_brg);
for($a = 0; $a < $hit_brg - 1; $a++){
$update = mysql_query("update barang set stok  = '$stok[$a]' , hrg_beli = '$hrg[$a]' where kode_brg = '$id_brg[$a]'");
}


}
else if($mod == "transaksi"){
$stok = explode(',' , $this->input->post('stok_awal'));
$id_brg = explode(','  , $this->input->post('kode_brg'));
$hrg = explode(','  , $this->input->post('hrg_beli_arr'));

$hit_brg = count($id_brg);
for($a = 0; $a < $hit_brg; $a++){
$update = mysql_query("update barang set stok  = '$stok[$a]' , hrg_jual = '$hrg[$a]' where kode_brg = '$id_brg[$a]'");

$kode_cust = $this->input->post('kode_cust');
$nota = $this->input->post('nota');
$tgl = $this->input->post('tgl');
$kode = $this->input->post('kode_brg');
$jml_jual = $this->input->post('jml_jual');
$jml_bayar = $this->input->post('jml_bayar');
$kode_jasa = $this->input->post('kode_jasa');
$ket = $this->input->post('keterangan');
$aktif = $this->input->post('aktif');
$stok = $this->input->post('stok_awal');

}

if($ket == 'bon'){
mysql_query("Insert into bon (kode_cust , nota , tgl , kode_brg , jml_jual , jml_bayar , kode_jasa , keterangan , aktif , stok_awal) VALUES ('$kode_cust' , '$nota' , '$tgl' , '$kode' , '$jml_jual' , '$jml_bayar' , '$kode_jasa' , '$ket' , '$aktif' , $stok)");
}

}

if($last != 'no_img'){
move_uploaded_file($tmp , 'ivory_src/'.$mod.'/'.$rnd_foto);
}

$hasil = mysql_query($insert_query);

echo $this->input->post('deskripsi');

redirect('content/data/'.$this->uri->segment(3));

}

function cari_transaksi(){
$this->load->model('madmin');
$data['hasil'] = $this->madmin->cari_transaksi();
$this->load->view('hal_utama' , $data);
}

function mass_email(){
$this->load->model('madmin');
$data['hasil'] = $this->madmin->mass_email();
$this->load->view('hal_utama' , $data);
}

function email_massal(){

$cust = "From: MaroonAndRose <maroonandrose@gmail.com>";
$cust .= "\nMIME-VERSION: 1.0 \n";
$cust .= "Content-Type:text/html; charset=iso-8859-1"."\r\n";

$krm_email = $this->input->post('cmb_kirim');

if($krm_email == 'all'){
$q = mysql_query("select * from member order by sub_date desc");
}
else{
$q = mysql_query("select * from member order by sub_date desc limit 100");
}

while($r = mysql_fetch_array($q)){
$isi = "";
$isi = "Dear <b>$r[nama]</b> , This is our newest product, check it out below :<p></p>";

$isi .= $this->input->post('t_isi');

mail($r['email'] , "Sub letter" , $isi , $cust);
}

redirect('content/data/member');
}

function data($tbl){
if($this->uri->segment(4) == 'import'){
$this->load->view('hal_utama');
}
else if($_POST == NULL){
$this->load->model('madmin');
if($this->uri->segment(5) == ''){
$data['hasil'] = $this->madmin->ambildata($tbl);
}
else{

$data['hasil'] = $this->madmin->selectmodul($tbl);
}
$data['kosong'] = 'Data masih kosong';
$this->load->view('hal_utama' , $data);
}
else{
$this->load->model('madmin');
//$this->madmin->ubah_jenis_produk($id);

}
}

function add_main($tbl){
$this->load->model('madmin');
$this->madmin->add_main($tbl);
redirect('content/data/'.$tbl);
}

function add_about($tbl){
$this->load->model('madmin');
$this->madmin->add_about($tbl);
redirect('content/data/'.$tbl);
}

function add_product($tbl){
$this->load->model('madmin');
$this->madmin->add_product($tbl);
redirect('content/data/'.$tbl);
}

function edit_main($tbl){
$this->load->model('madmin');
$this->madmin->edit_main($tbl);
redirect('content/data/'.$tbl);
}

function delete_alldata($tbl){
$this->load->model('madmin');
$this->madmin->delete_alldata($tbl);
redirect('content/data/'.$tbl);
}

function delete_data($tbl){
$this->load->model('madmin');
$this->madmin->delete_data($tbl);
redirect('content/data/'.$tbl);
}

function logout(){
$this->session->sess_destroy();
$this->load->view('login');
}

}
?>