<?php 
error_reporting(0);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class m_headline extends CI_Model{

function m_headline(){
parent::__construct();
}



function tambah_member(){
$nama = $this->input->post('txtnama');
$email = $this->input->post('txtemail');
$telp = $this->input->post('txttelp');
$pin = $this->input->post('txtpin');
$rek = $this->input->post('txtrek');
$bank = $this->input->post('rdbvia');
$negara = $this->input->post('negara');
$kota = $this->input->post('cmbkota');
$user = $this->input->post('txtuser');
$member = $this->input->post('chkmember');
$alamat = $this->input->post('txtalamat');
$mac = $this->input->post('txtmac');
$rand = microtime().rand(0000 , 9999);
$awal = rand(0 , 15);
$enkrip = md5($rand);
$akhir = $awal + 6;
$str = substr($enkrip , 0 , 7);
$id_user = $this->session->userdata('id_user');

$name = $_FILES['userfile']['name'];
$tmp = $_FILES['userfile']['tmp_name'];
$type = $_FILES['userfile']['type'];
$size = $_FILES['userfile']['size'];
$acak = rand(0000 , 9999);
$rand = microtime().$acak;
$pass = md5($rand);

if(!empty($name)){
if($type != 'image/gif' and $type != 'image/jpg' and $type != 'image/png' and $type != 'image/jpeg'){
$data['pesanan'] = 'Tipe Image Hanya Boleh jpeg / gif / png';
$this->load->view('main' , $data);
}
/**
else if($size > 3000){
$data = 'Size harus kurang dari 3Mb';
return $data;
} **/
else{
move_uploaded_file($tmp , 'member/'.$acak.$name);
}
}

$query = mysql_query("select * from cart where user = '$mac'");
while($r = mysql_fetch_array($query)){
$data = array('id_produk' => $r['id_produk'] , 'nama' => $r['nama'] , 'qty' => $r['qty'] , 'size' => $r['size'] , 'warna' => $r['warna'] , 'user' => $r['user'] , 'harga' => $r['harga'] , 'sub_total' => $r['sub_total'] , 'merk' => $r['merk'] , 'photos' => $r['photos'] , 'conn' => 'n' , 'tgl_beli' => $r['tgl_beli'] , 'email_date' => $r['exp_date'] , 'nama_pembeli' => $nama);
$this->db->insert('real_cart' , $data);
}

if(!empty($name)){
$data = array('nama' => $nama , 'email' => $email , 'mobile' => $telp , 'pin' => $pin , 'rekening' => $rek , 'alamat' => $alamat , 'negara' => $negara , 'kota' => $kota , 'user' => $user , 'mac' => $id_user , 'password' => $pass , 'photos' => $name , 'member' => $member , 'sub_date' => date('Y-m-d H:i:s') , 'email_date' => date('Y-m-d H:i:s' , strtotime('+1 months')) , 'user' => $user , 'password' => md5($str));
$this->db->insert('member' , $data);
}
else{
$data = array('nama' => $nama , 'email' => $email , 'mobile' => $telp , 'pin' => $pin , 'rekening' => $rek , 'alamat' => $alamat , 'negara' => $negara , 'kota' => $kota , 'user' => $user , 'mac' => $id_user , 'password' => $pass , 'member' => $member , 'sub_date' => date('Y-m-d H:i:s') , 'email_date' => date('Y-m-d H:i:s' , strtotime('+1 months')) , 'user' => $user , 'password' => md5($str));
$this->db->insert('member' , $data);
}
$this->db->where('user' , $id_user);
$this->db->delete('cart');


}

function headline(){
$this->db->select('*');
$this->db->from('main');
$this->db->where('aktif' , 'y');
$this->db->order_by('id_main' , 'asc');
$this->db->limit(4 , 0);
$query = $this->db->get();
return $query;
}

function isi(){
$this->db->select('*');
$this->db->from('artikel');
$this->db->where('aktif' , 'y');
$this->db->order_by('id_artikel' , 'desc');
$this->db->limit(2 , 0);
$query = $this->db->get();
return $query;
}

function artikel(){
$id = $this->uri->segment(3);
$this->db->select('*');
$this->db->from('artikel');
$this->db->where('aktif' , 'y');
$this->db->where('id_artikel' , $id);
$this->db->limit(1 , 0);
$query = $this->db->get();
return $query;
}

function kirim_email(){
$usr = $this->session->userdata('id_user');
$query = mysql_query("select * from cart where pembeli = '$usr'");
$this->load->library('email');
$email = $this->input->post('txtemail');
$produk = "";
$header = "";
while($kirim = mysql_fetch_array($query))
{
$header = "Data Barang Pesanan => ".$usr.' : Jumlah Pesanan :'.mysql_num_rows($query).'<br>';
$produk .= $kirim['nama'].' => '.$kirim['size'].' => '.$kirim['warna'].' => '.$kirim['harga'].' => '.$kirim['qty'].' <br>';
}
    $this->email->to('gusadi@localhost');
    $this->email->from('gusadi@localhost');
    $this->email->subject('Order Detail');
    $this->email->message($header.$produk);
    $this->email->send();
}

function ubah_jenis_produk($id){
$nama = $this->input->post('a');
$alias = $this->input->post('txtalias');
$ac = $this->input->post('rdbya');

$data = array('jenis_produk' => $nama , 'aktif' => $ac , 'alias' => $alias);
$this->db->where('id_jenis_produk' , $id);
$this->db->update('jenis_produk' , $data);
}

function pencarian(){
$cari = $this->input->post('txtcari');
$random_sort = array('id_headline' , 'nama' , 'keterangan' , 'gambar','harga','judul_seo','aktif','kategori');
$rand = rand(0,1);
$kat = $this->input->post('cari');
$tot = count($random_sort) - 1;
$a = rand(0,7);
$random = $random_sort[$a];
if($rand == 0){
$method = 'asc';
}
elseif($rand == 1){
$method = 'desc';
}
if($kat == 'hotel'){
$this->db->select('*');
$this->db->from('headline');
$this->db->where('kategori' , $kat);
$this->db->like('nama',$cari);
$this->db->like('keterangan' , $cari);
$this->db->order_by($random, $method);
}
else if($kat == 'restoran'){
$this->db->select('*');
$this->db->from('headline');
$this->db->where('kategori' , $kat);
$this->db->like('nama' , $cari);
$this->db->like('keterangan' , $cari);
$this->db->order_by($random, $method);
}
else if($kat == 'semua'){
$this->db->select('*');
$this->db->from('headline');
$this->db->like('nama' , $cari);
$this->db->like('keterangan',$cari);
$this->db->order_by($random, $method);
}
$query = $this->db->get();
return $query;
}

function recomended(){
$this->db->select('*');
$this->db->from('product');
$this->db->where('aktif' , 'y');
$this->db->where('kategori' , 3);
$this->db->order_by('id_product' , 'asc');
$this->db->limit(6 , 0);
$query = $this->db->get();
return $query;
}

function author(){
$this->db->select('*');
$this->db->from('autor');
$this->db->where('aktif' , 'y');
$this->db->order_by('id_autor' , 'asc');
$this->db->limit(12 , 0);
$query = $this->db->get();
return $query;
}


function newest(){
$this->db->select('*');
$this->db->from('product');
$this->db->where('aktif' , 'y');
$this->db->where('kategori' , 1);
$this->db->order_by('id_product' , 'asc');
$this->db->limit(25 , 0);
$query = $this->db->get();
return $query;
}

function kontak(){
$this->db->select('*');
$this->db->from('kontak');
$this->db->where('aktif' , 'y');
$this->db->order_by('id_kontak' , 'asc');
$this->db->limit(1 , 0);
$query = $this->db->get();
return $query;
}

function m_order(){
$this->db->select('*');
$this->db->from('orders');
$this->db->where('aktif' , 'y');
$this->db->order_by('id_orders' , 'desc');
$this->db->limit(1 , 0);
$query = $this->db->get();
return $query;
}


function det_produk(){
$sg = $this->uri->segment(3);
$this->db->select('*');
$this->db->from('product');
$this->db->where('id_product' , $sg);
$this->db->where('aktif' , 'y');
$this->db->limit(1 , 0);
$query = $this->db->get();
return $query;
}

function m_main(){
$this->db->select('*');
$this->db->from('main');
$this->db->where('aktif' , 'y');
$this->db->limit(1 , 0);
$query = $this->db->get();
return $query;
}

function m_abouts(){
$this->db->select('*');
$this->db->from('about');
$this->db->limit(1 , 0);
$query = $this->db->get();
return $query;
}

function dets_produk(){
$sg = $this->uri->segment(3);
$this->db->select('*');
$this->db->from('product');
$this->db->where('id_product' , $sg);
$this->db->where('aktif' , 'y');
$this->db->limit(1 , 0);
$query = $this->db->get();
return $query;
}

function artist(){
$this->db->select('*');
$this->db->from('artist');
$this->db->where('aktif' , 'y');
$this->db->order_by('id_artist' , 'asc');
$this->db->limit(6 , 0);
$query = $this->db->get();
return $query;
}

function popular(){
$this->db->select('*');
$this->db->from('product');
$this->db->where('aktif' , 'y');
$this->db->where('kategori' , 2);
$this->db->order_by('id_product' , 'asc');
$this->db->limit(6 , 0);
$query = $this->db->get();
return $query;
}

function allmenu(){
$query = $this->db->get('download');
return $query;
}

function isi_cart(){
$str = $this->session->userdata('id_user');

$query = mysql_query("select * from cart where user = '$str'");
$num = mysql_num_rows($query);
$this->db->where('user' , "$str");
$this->db->order_by('id_cart' , 'desc');
$config['total_rows'] = $num;
$config['base_url'] = base_url().'index.php/content/cart/';
$config['per_page'] = 10;
$config['num_links'] = 3;
$config['first_link'] = 'First';
$config['last_link'] = 'Last';
$config['cur_tag_open'] = ' <b> ';
$config['cur_tag_close'] = ' </b> ';
$config['next_link'] = ' &#187;';
$config['prev_link'] = ' &laquo;';
$this->pagination->initialize($config);
$ambil = $this->db->get('cart' , $config['per_page'] , $this->uri->segment(3));
return $ambil;
}

function produk(){
$this->load->library('Paginations');
$sg = $this->uri->segment(4);
$sort = $this->input->post('cmb_price');
$ex_sort = explode('_' , $this->uri->segment(3));
if(empty($sort)){

$sort = $ex_sort[1];
}

$total = mysql_num_rows(mysql_query("select * from product where kategori = $sg"));
$config['total_rows'] = $total;
$config['base_url'] = base_url().'/front/lists/'.$ex_sort[0]."_$sort/".$this->uri->segment(4);
$config['per_page'] = 12;
$config['first_link'] = 'First';
$config['last_link'] = 'Last';
$config['num_links'] = 3;
$config['next_tag_open'] = '<b>';
$config['next_tag_close'] = '</b>';
$config['prev_tag_open'] = '<b>';
$config['prev_tag_close'] = '</b>';
$config['next_link'] = ' &#187; ';
$config['prev_link'] = ' &laquo; ';
$this->paginations->initialize($config);
$this->db->where('kategori' , $sg);
if($sort == '1'){
$this->db->order_by('harga' , 'desc');
}
else if($sort == '2'){
$this->db->order_by('harga' , 'asc');
}
else{
$this->db->order_by('id_product' , 'desc');
}
$query = $this->db->get('product' , $config['per_page'] , $this->uri->segment(5));

return $query;
}

function form() { 
$this->load->library('email');
$rand = microtime().rand(0000 , 9999);
$awal = rand(0 , 15);
$enkrip = md5($rand);
$akhir = $awal + 6;
$str = substr($enkrip , 0 , 7);
$email = $this->input->post('txtemail');
$this->db->where('email' , $email);
$data = array('password' => md5($str) , 'user' => $str);
$this->db->update('member' , $data);  
$message = 'Password baru anda => '.$str;
$modul = 'hubungi';
$this->email->from($email , 'ivoryclothes'); 
$this->email->to('gusmang@localhost'); 
$this->email->subject('Perubahan Password'); 
$this->email->message($message); 
if (!$this->email->send()) { 
$data['pesanan'] = 'Email gagal dikirim';
$this->load->view('main' , $data);
} 
} 

function login(){
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$nama = anti_injection($this->input->post('txtuser'));
$pass = anti_injection(md5($this->input->post('txtpass')));
$email = anti_injection($this->input->post('txtemail'));

/*
$rand = microtime().rand(0000 , 9999);
$awal = rand(0 , 25);
$enkrip = md5($rand);
$str = substr($enkrip , $awal , $awal + 6);

$this->db->where('nama' , 'gusmang');
$data = array('password' => md5($str) , 'user' => $str);
$this->db->update('member' , $data); */


$query = $this->db->query("SELECT * from member WHERE nama='$nama'  AND password = '$pass' ");	
return $query;
}

function isian_cart(){
$str = $this->session->userdata('id_user');

$sg = $this->uri->segment(4);

$uri_str = $this->uri->uri_string();

$qry = mysql_query("select * from real_cart where tgl_beli = '$sg' and approval = 'n' and nama_pembeli = '$str'");
$r = mysql_fetch_array($qry);
$arr = array('tgl' => $r['tgl_beli']);
$this->session->set_userdata($arr);
$tgl = $this->session->userdata('tgl');

/** if($sg != null && $tgl != null ){
$query = mysql_query("select * from real_cart where nama_pembeli = '$str' and approval = 'n'  and tgl_beli = '$sg'");
$num = mysql_num_rows($query);
}
else{ **/
$query = mysql_query("select * from real_cart where nama_pembeli = '$str' and approval = 'n'");
$num = mysql_num_rows($query);
/*
$impl = "";
if($sg != null && $tgl != null){
$this->db->where('nama_pembeli' , $this->session->userdata('id_user'));
$this->db->where('approval' , 'n');
$this->db->where('tgl_beli' , $tgl);
$this->db->order_by('tgl_beli' , 'asc');
}
else{*/
$this->db->where('nama_pembeli' , "$str");
$this->db->where('approval' , 'n');
$this->db->order_by('id_real_cart' , 'desc');
//}//
$config['total_rows'] = $num;
/** if($sg == null){
$ex_uri = explode('/' , $uri_str);
$cnt = count($ex_uri);
$krg = $cnt - 2;
for($a = 0; $a < $cnt; $a++){
if($a == $cnt){
continue;
}
else{
$impl .= $ex_uri[$a].'/';
$impl = str_replace('10' , '' , $impl);
}

}
}**/
$config['base_url'] = base_url().'index.php/content/daftarbelanja/';
$config['per_page'] = 10;
$config['num_links'] = 3;
$config['first_link'] = 'First';
$config['last_link'] = 'Last';
$config['cur_tag_open'] = ' <b> ';
$config['cur_tag_close'] = ' </b> ';
$config['next_link'] = ' &#187;';
$config['prev_link'] = ' &laquo;';
$this->pagination->initialize($config);
$ambil = $this->db->get('real_cart' , $config['per_page'] , $this->uri->segment(3));
return $ambil;
}

function update_cart(){
$qty = $this->input->post('txtqty');
$cek = $this->input->post('cek');
$hrg = $this->input->post('txtharga');
$size= $this->input->post('txtsize');
$hit = count($cek);
$now = date('Y-m-d H:i:s');
$exp = date('Y-m-d H:i:s' , strtotime("+1 days"));
$warna = $this->input->post('cmbwarna');
$ids = $this->input->post('produks');
$foto = "";
$p_name = "";


for($a = 0; $a < $hit; $a++){
if(empty($cek[$a])){
continue;
}
else{
$qry = mysql_query("select * from cart where id_cart = $cek[$a]");
$tf = mysql_fetch_array($qry);

$win = $tf['id_produk'];
$query = mysql_query("select * from product where id_product = $win");
$k = mysql_fetch_array($query);

$wrn = explode('#' , $k['warna']);
$fotoz = explode('#' , $k['photos']);
$namez = explode('#' , $k['photo_name']);
$hit = count($wrn);

for($f = 0; $f < $hit; $f++){
if(empty($wrn[$f])){
continue;
}
else{
if($wrn[$f] == $warna[$a]){
$foto = $fotoz[$f];
$p_name = $namez[$f];
}
}
}
}
$str = $this->session->userdata('id_user');

$jml = $hrg[$a] * $qty[$a];
$data = array('qty' => $qty[$a] , 'nama' => $p_name , 'sub_total' => $jml , 'tgl_beli' => $now , 'exp_date' => $exp , 'size' => $size[$a] , 
'warna' => $warna[$a] , 'id_produk' => $win , 'photos' => $foto);
$this->db->where('id_cart' , $cek[$a]);
$this->db->where('user' , $str);
$this->db->update('cart' , $data);
}

}

function update_rcart(){
$str = $this->session->userdata('id_user');

$qty = $this->input->post('txtqty');
$cek = $this->input->post('cek');
$hrg = $this->input->post('txtharga');
$size= $this->input->post('txtsize');
$hit = count($cek);
$now = date('Y-m-d H:i:s');
$exp = date('Y-m-d H:i:s' , strtotime("+1 days"));
$warna = $this->input->post('cmbwarna');
$ids = $this->input->post('produks');
$foto = "";
$p_name = "";


for($a = 0; $a < $hit; $a++){
if(empty($cek[$a])){
continue;
}
else{
$qry = mysql_query("select * from real_cart where id_real_cart = $cek[$a]");
$tf = mysql_fetch_array($qry);

$win = $tf['id_produk'];
$query = mysql_query("select * from product where id_product = $win");
$k = mysql_fetch_array($query);

$wrn = explode('#' , $k['warna']);
$fotoz = explode('#' , $k['photos']);
$namez = explode('#' , $k['photo_name']);
$hit = count($wrn);

for($f = 0; $f < $hit; $f++){
if(empty($wrn[$f])){
continue;
}
else{
if($wrn[$f] == $warna[$a]){
$foto = $fotoz[$f];
$p_name = $namez[$f];
}
}
}
}

$jml = $hrg[$a] * $qty[$a];
$data = array('qty' => $qty[$a] , 'nama' => $p_name , 'sub_total' => $jml , 'tgl_beli' => $now , 'exp_date' => $exp , 'size' => $size[$a] , 
'warna' => $warna[$a] , 'id_produk' => $win , 'photos' => $foto);
$this->db->where('id_real_cart' , $cek[$a]);
$this->db->where('nama_pembeli' , $str);
$this->db->update('real_cart' , $data);
}


}

function createcaptcha() { 
$this->load->helper('captcha'); 
$vals = array( 'img_path' => './captcha/', 'img_url' => base_url().'captcha/'  ); 
$cap = create_captcha($vals);  
$data = array( 'captcha_id' => NULL,  'captcha_time' => $cap['time'],  'ip_address' => $this->input-> ip_address(), 'word' => $cap['word']  );  
$query = $this->db->insert_string('captcha', $data); 
 $this->db->query($query);  
return $cap;  
}

function captchabenar($captcha) 
{ 
$expiration = time()-7200; 
$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration); 
$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?"; 
$binds = array($captcha, $this->input->ip_address(), $expiration); 
$query = $this->db->query($sql, $binds); 
$row = $query->row(); 
if ($row->count == 0) 
{ 
return false;
} 
return true; 
}


function beli(){

$user = $this->session->userdata('id_user');
$pembeli = $this->session->userdata('id_user');
$query = mysql_query("select * from cart where user = '$user'");
while($r = mysql_fetch_array($query)){
$data = array('id_produk' => $r['id_produk'] , 'nama' => $r['nama'] , 'qty' => $r['qty'] , 'size' => $r['size'] , 'warna' => $r['warna'] , 'user' => $r['user'] , 'harga' => $r['harga'] , 'sub_total' => $r['sub_total'] , 'merk' => $r['merk'] , 'photos' => $r['photos'] , 'conn' => 'n' , 'tgl_beli' => $r['tgl_beli'] , 'exp_date' => $r['exp_date'] , 'nama_pembeli' => $pembeli , 'user' => $r['user']);
$this->db->insert('real_cart' , $data);
}
$this->db->where('user' , $user);
$this->db->delete('cart');
}

function delete_cart(){

$cek = $this->input->post('cek');
$jumlah= count($cek);
for($i=0; $i<$jumlah; $i++){
$this->db->where('id_cart' , $cek[$i]);
$this->db->delete('cart');
}

}

function delete_rcart(){

$cek = $this->input->post('cek');
$jumlah= count($cek);
for($i=0; $i<$jumlah; $i++){
$this->db->where('id_real_cart' , $cek[$i]);
$this->db->delete('real_cart');
}

}

function jumlahklik(){
$pesan = $this->uri->segment(4);
$len = strlen($pesan) - 5;
$pesan = substr(str_replace("-", " ", $pesan) , 0 , $len);
$hits = 1;
$sql = mysql_query("SELECT * FROM headline where nama = '$pesan'");
$hasil = mysql_fetch_array($sql);
$counter = $hasil['hits'] + $hits;
$ambil = $this->db->get('headline');
$data = array('hits' => $counter);
$this->db->where('nama' , $pesan);
$this->db->update('headline' , $data);
}

function subscribes(){
$email = $this->input->post('txtsub');
$now = date('Y-m-d H:i:s');
$kirim = date('Y-m-d H:i:s' , strtotime('+1 months'));

$data = array('email' => $email , 'sub_date' => $now , 'email_date' => $kirim);
$this->db->insert('subscribe' , $data);
}

function details(){
$pesan = $this->uri->segment(4);
$len = strlen($pesan) - 5;
$pesan = substr(str_replace("-", " ", $pesan) , 0 , $len);
$random_sort = array('id_headline' , 'nama' , 'keterangan' , 'gambar','harga','judul_seo','aktif','kategori');
$rand = rand(0,1);
$tot = count($random_sort) - 1;
if($rand == 0){
$method = 'asc';
}
elseif($rand == 1){
$method = 'desc';
}
$a = rand(0,7);
$random = $random_sort[$a];
$this->db->select('*');
$this->db->from('headline');
$this->db->where('nama' , $pesan);
$this->db->order_by($random, $method);
$query = $this->db->get();
return $query;
}

function store(){
$this->db->select('*');
$this->db->from('store');
$this->db->where('aktif' , 'y');
$this->db->order_by('id_store' , 'desc');
$this->db->limit(1);
$query = $this->db->get();
return $query;
}

function content_contact(){
$this->db->select('*');
$this->db->from('content');
$this->db->where('id_content' , 'contact');
$query = $this->db->get();
return $query;
}

function content_home(){
$this->db->select('*');
$this->db->from('content');
$this->db->where('id_content' , 'home');
$query = $this->db->get();
return $query;
}

function kategori(){
$query = $this->db->query("SELECT * FROM category where ac = '1'");
return $query;
}

function restoran(){
$query = $this->db->query("SELECT * FROM headline where kategori = 'restoran' and aktif = 'y'");
return $query;
}

function jalan_jalan(){
$query = $this->db->query("SELECT * FROM headline where kategori = 'jalan jalan' and aktif = 'y'");
return $query;
}

function souvenir(){
$query = $this->db->query("SELECT * FROM headline where kategori = 'souvenir' and aktif = 'y'");
return $query;
}

function other(){
$query2 = $this->db->query("SELECT * FROM headline where kategori = 'other' and aktif = 'y'");
return $query2;
}

function w_sport(){
$query2 = $this->db->query("SELECT * FROM headline where kategori = 'water sport' and aktif = 'y'");
return $query2;
}

function lain_lain(){
$sg = $this->uri->segment(3);
$sg = str_replace("-" , " " , $sg);
$query2 = $this->db->query("SELECT * FROM headline where kategori = '$sg' and aktif = 'y'");
return $query2;
}

function sejarah(){
$sg = $this->uri->segment(4);
$sg = str_replace("-" , " " , $sg);
$query2 = $this->db->query("SELECT * FROM headline where kategori = 'sejarah' and nama = '$sg' and aktif = 'y'");
return $query2;
}

function obj_wisata(){
$query2 = $this->db->query("SELECT * FROM headline where kategori = 'Objek Wisata' and aktif = 'y'");
return $query2;
}

function accordion(){
$query = $this->db->query("SELECT * FROM headline where kategori = 'accordion' and aktif = 'y'");
return $query;
}

function accordion2(){
$query = $this->db->query("SELECT * FROM headline where kategori = 'accordion2' and aktif = 'y'");
return $query;
}

function sewamobil(){
$query = $this->db->query("SELECT * FROM headline where kategori = 'Sewa Mobil' and aktif = 'y'");
return $query;
}

function tiketcruise(){
$query = $this->db->query("SELECT * FROM headline where kategori = 'cruise' and aktif = 'y'");
return $query;
}

function accordion3(){
$query = $this->db->query("SELECT * FROM headline where kategori = 'accordion3' and aktif = 'y'");
return $query;
}

function headline_offer(){
$this->load->helper('array');
$random_sort = array('id_headline' , 'nama' , 'keterangan' , 'gambar','harga','judul_seo','aktif','kategori');
$rand = rand(0,1);
$tot = count($random_sort) - 1;
if($rand == 0){
$method = 'asc';
}
elseif($rand == 1){
$method = 'desc';
}
$a = rand(0,$tot);
$random = $random_sort[$a];
$this->db->select('*');
$this->db->from('headline');
$this->db->limit(10 , 0);
$this->db->order_by($random, $method);
$query = $this->db->get();
return $query;
}

function m_headline_latest($limit , $offset){
$this->db->select('*');
$this->db->from('headline');
$this->db->where('kategori' , 'Sekilas Info');
$this->db->where('aktif' , 'Y');
$this->db->limit($limit , $offset);
$this->db->order_by("id_headline", "desc");
$query = $this->db->get();
return $query;
}

function tambahshoutcontent(){
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}
$name = anti_injection($this->input->post('a'));
$tgl_sekarang = date("Y-m-d");
$jam_sekarang = date("H:i:s");
$website = anti_injection($this->input->post('txtwebsite'));
$pesan = anti_injection($this->input->post('txtpesan'));
		
$data = array('nama' => $name , 'website' => $website , 'pesan' => $pesan ,'tanggal' => $tgl_sekarang , 'jam' => $jam_sekarang);
$this->db->insert('shoutbox' , $data);
}

function m_shoutcontent(){
$this->db->order_by('id_shoutbox' , 'DESC');
$ambil = $this->db->get('shoutbox');
if($ambil->num_rows() > 0){
foreach($ambil->result() as $data){
$hasil[] = $data;
}
return $hasil;
}
}

function m_about($limit , $offset){
$this->db->select('*');
$this->db->from('about');
$this->db->limit($limit , $offset);
$this->db->order_by("id_about", "desc");
$query = $this->db->get();
return $query;
}

function conn_cart(){
ob_start();
system('ipconfig/all');
$mycom = ob_get_contents();
ob_clean();

$findme = "Physical";
$pmac = strpos($mycom , $findme);
$mac = substr($mycom , ($pmac + 36) , 17);


$data = array('conn' => 'n');
$this->db->where('user' , $mac);
$this->db->update('cart' , $data);
}

function hapus_cart(){
ob_start();
system('ipconfig/all');
$mycom = ob_get_contents();
ob_clean();

$findme = "Physical";
$pmac = strpos($mycom , $findme);
$mac = substr($mycom , ($pmac + 36) , 17);

$this->db->where('user', $mac);
$this->db->delete('cart');
}


}
?>