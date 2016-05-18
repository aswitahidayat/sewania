<?php
error_reporting(0);

class Madmin extends CI_Model{

function ekstensi($eks){
return $eks;
}

function mysql_pre($value) {

            $magic_quotes_active = get_magic_quotes_gpc();
            $new_enough_php =      function_exists("mysql_real_escape_string(unescaped_string)"); //i.e. PHP >= v4.3.0

            if($new_enough_php) { //PHP v4.3.0 or higher
                //undo any magic quote effect so mysql_real_escape_string can do the work

                if($magic_quotes_active) { $value = stripslashes($value); }

                $value = mysql_real_escape_string($value);

            } else { //before PHP v4.3.0

                if(!$magic_quotes_active) {
                    $value = addslashes($value);
                }
            }
            return $value;
}
		
function create_random(){
$date = date('Ymd');
$chr = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ") , 0 , 8);
return $date.$chr;
}

function UploadImage($nm,$fupload_name , $idx , $w , $h , $wbesar , $hbesar , $bools){
  //direktori gambar
  $vdir_upload = "assets/img/upload/product/";
  $vth_upload = "assets/img/upload/product/thumb/";
  $vfile_upload = $vdir_upload.$fupload_name;
  
  $imageType = $_FILES[$nm.$idx]["type"];
  //Simpan gambar dalam ukuran sebenarnya
  
  move_uploaded_file($_FILES[$nm.$idx]["tmp_name"], $vfile_upload);
  

  //identitas file asli
  switch($imageType) {
		case "image/gif":
			$im_src=imagecreatefromgif($vfile_upload); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$im_src=imagecreatefromjpeg($vfile_upload); 
			break;
	    case "image/png":
		case "image/x-png":
			$im_src=imagecreatefrompng($vfile_upload); 
			break;
  }
  
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi besar 400 pixel
  //Set ukuran gambar hasil perubahan
  /*if($src_width>=350){
  $dst_width = 350;
  } else {
  $dst_width = $src_width;
  }
  $dst_height = ($dst_width/$src_width)*$src_height;*/

   $dst_width = $wbesar;
   $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width,$dst_height, $src_width, $src_height);
   
  //Simpan gambar
  switch($imageType) {
		case "image/gif":
  			imagegif($im,$vdir_upload.$fupload_name);
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
  			imagejpeg($im,$vdir_upload.$fupload_name);
			break;
	    case "image/png":
		case "image/x-png":
  			imagepng($im,$vdir_upload.$fupload_name);
			break;
  }


  //Simpan dalam versi small 200 pixel
  //Set ukuran gambar hasil perubahan
 
 if($bools == true){
  $dst_width2 = $w;
 // $dst_height2 = ($dst_width2/$src_width)*$src_height;
 $dst_height2 = $h;

 $dst_width = $w;
 $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  switch($imageType) {
		case "image/gif":
  			imagegif($im2,$vth_upload . "small_" . $fupload_name);
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
  			imagejpeg($im2,$vth_upload . "small_" . $fupload_name);
			break;
	    case "image/png":
		case "image/x-png":
  			imagepng($im2,$vth_upload . "small_" . $fupload_name);
			break;
  }
  
 

  //proses perubahan ukuran
  $im3 = imagecreatetruecolor(768,1024);
  imagecopyresampled($im3, $im_src, 0, 0, 0, 0, 768, 1024, $src_width, $src_height);

  //Simpan gambar
  switch($imageType) {
		case "image/gif":
  			imagegif($im3,$vth_upload . "big_" . $fupload_name);
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
  			imagejpeg($im3,$vth_upload . "big_" . $fupload_name);
			break;
	    case "image/png":
		case "image/x-png":
  			imagepng($im3,$vth_upload . "big_" . $fupload_name);
			break;
  }
  
  $dst_width2 = $dst_width;
 // $dst_height2 = ($dst_width2/$src_width)*$src_height;
 $dst_height2 = $dst_height;

  //proses perubahan ukuran
 
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
  imagedestroy($im3);
 }
}


function anti_sql_inject($data){
$filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
return $filter;
}

function update_produk_member(){

$cat = $this->mysql_pre($this->input->post('sub-category-group'));
$type = $this->mysql_pre($this->input->post('radios'));
$title = $this->mysql_pre($this->input->post('Adtitle'));
$price = $this->mysql_pre($this->input->post('Price'));
$nego = $this->mysql_pre($this->input->post('chk_harga'));
$desc = $this->mysql_pre($this->input->post('t_describe'));
$lat = $this->mysql_pre($this->input->post('s_latitude'));
$long = $this->mysql_pre($this->input->post('s_longitude'));
$prov = $this->mysql_pre($this->input->post('s_latitude'));
$kota = $this->mysql_pre($this->input->post('cmb_kota'));
$id_produk = $this->mysql_pre($this->input->post('t_id_ac_produk'));

$field = "";

$px = mysql_fetch_array(mysql_query("select * from produk where id_produk = '$id_produk'"));

$prod = $px['foto']."$$@";

for($a = 0; $a < 5; $a++){
$pol = $_FILES["f_upload$a"]['type'];

if(empty($pol)){
continue;
}


$rnd = $this->create_random();

$eks  = explode('/' , $pol);
$field = $rnd.".".$eks[1]."$$@";
$prod .= $field."$$@";
$this->UploadImage("f_upload" , "$rnd.$eks[1]" , $a , 100 , 80 , 450 , 320 , true);
}

$prod = substr($prod , 0 , strlen($prod) - 6);

$dt = date('Y-m-d');

mysql_query("update produk set nama_produk = '$title' , id_sub_kategori = '$cat' , harga = '$price' ,  tanggal = '$dt' , negotiable = '$nego' , foto = '$prod' , deskripsi = '$_POST[t_describe]' , latitude = '$lat' , longitude = '$long' , kabupaten = '$kota' where id_produk = '$id_produk'");
}

function upload_filed(){


$cat = $this->mysql_pre($this->input->post('sub-category-group'));
$type = $this->mysql_pre($this->input->post('radios'));
$title = $this->mysql_pre($this->input->post('Adtitle'));
$price = $this->mysql_pre($this->input->post('Price'));
$nego = $this->mysql_pre($this->input->post('chk_harga'));
$desc = $this->mysql_pre($this->input->post('t_describe'));
$lat = $this->mysql_pre($this->input->post('s_latitude'));
$long = $this->mysql_pre($this->input->post('s_longitude'));

$field = "";

for($a = 0; $a < 5; $a++){
$pol = $_FILES["f_upload$a"]['type'];

if(empty($pol)){
continue;
}


$rnd = $this->create_random();

$eks  = explode('/' , $pol);
$field .= $rnd.".".$eks[1]."$$@";
$this->UploadImage("f_upload" , "$rnd.$eks[1]" , $a , 100 , 80 , 450 , 320 , true);
}

$field = substr($field , 0 , strlen($field) - 3);

$as = $this->input->post('optionsRadios');
$first = $this->input->post('t_firstname');
$last = $this->input->post('t_lastname');
$phone = $this->input->post('t_phone');
$gender = $this->input->post('Gender');
$about = $this->input->post('t_about');
$email = $this->input->post('t_email');
$pass = md5($this->input->post('t_password'));

$hide_phone = 'n';

if($this->input->post('t_hidesphone') != ""){
$hide_phone = $this->input->post('t_hidesphone');
}

$dt = date('Y-m-d H:i:s');

$token = date('YmdHis').str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789");

$token = substr($token , 0 , 32);
mysql_query("Insert into member(first_name , last_name , phone , hide_phone , gender , about_you , email , password , tgl_daftar , aktif , type , token_id) VALUES('$first' , '$last' , '$phone' , '$hide_phone' , '$gender' , '$about' , '$email' , '$pass' , '$dt' , 'n' , '$as' ,'$token')");


$_SESSION['login'] = true;
$_SESSION['token_id'] = $token;


$dt = date('Y-m-d');
mysql_query("Insert into produk(nama_produk,id_sub_kategori,harga,id_member,tanggal,negotiable,foto,deskripsi,latitude,longitude) VALUES('$title','$cat','$price','$token','$dt','$nego','$field','$_POST[t_describe]','$lat','$long')");

$to = 'ibasmara@gmail.com';

$subject = 'Question Anonymous';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: ibasmara <gusmang@localhost>, Kelly <gusmang@localhost>' . "\r\n";
$headers .= "From: admin <sewania.com>" . "\r\n";

$message = "Terima kasih telah mendaftar menjadi member di sewania.com .. Untuk mengaktifkan akun anda , silakan klik link aktivasi berikut <a href='http://localhost/sewania/aktivasi/verifikasi/$token' targey='_blank'>link aktivasi</a>";

mail("gusmang@localhost", $subject, $message, $headers);

}

function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}

function add_main($tbl){
$title = $this->input->post('title');
$meta = $this->input->post('meta');
$slide = $_FILES['f_upload']['name'];
$jml = count($_FILES['f_upload']['name']);
$tmp = $_FILES['f_upload']['tmp_name'];

$bawah = count($_FILES['fbottom']['name']);
$bottom = $_FILES['fbottom']['tmp_name'];
$nama = $_FILES['fbottom']['name'];

$foto_slide = "";

for($v = 0; $v < $jml; $v++){
$nama_slide = rand(0000 , 9999).$slide[$v];
if(empty($slide[$v])){
continue;
}
$foto_slide .= $nama_slide.',';
//move_uploaded_file($tmp[$v] , 'upload/'.$slide[$v]);
$this->UploadImage('f_upload' , $nama_slide , $v , 86 , 87 , 920 , 428 , false);
}

for($k = 0; $k < $bawah; $k++){
$nama_bwh = rand(0000 , 9999).$nama[$k];
if(empty($bottom[$k])){
continue;
}
$foto_bottom .= $nama_bwh.',';
//move_uploaded_file($tmp[$v] , 'upload/'.$slide[$v]);
$this->UploadImage('fbottom' , $nama_bwh , $k , 86 , 87 , 300 , 200 , false);
}

//echo $foto_bottom;

//return;
$aktif = $this->input->post('aktif');

$data = array('title' => $title , 'meta' => $meta , 'photos' => $foto_slide , 'display' => $foto_bottom , 'aktif' => $aktif);
$this->db->insert($tbl , $data);
}

function add_about($tbl){
$title = $this->input->post('title');
$meta = $this->input->post('meta');
$jml = count($_FILES['f_upload']['name']);
$tmp = $_FILES['f_upload']['tmp_name'];
$foto = $_FILES['f_upload']['name'][0];

$foto_slide = "";

$eks = explode('.' , $foto); 
$nama_slide = 'about_'.$this->create_random().'.'.$eks[1];

$foto_slide .= $nama_slide;

$aktif = $this->input->post('aktif');

if(!empty($foto)){
$data = array('nama' => $title , 'keterangan' => $meta , 'gambar' => $foto_slide ,'aktif' => $aktif);
$this->UploadImage('f_upload' , $nama_slide , 0 , 86 , 87 , 300 , 200 , false);
}
else{
$data = array('nama' => $title , 'keterangan' => $meta ,'aktif' => $aktif);
}

$this->db->insert($tbl , $data);
}

function add_product($tbl){
$kode = $this->input->post('kode_brg');
$nama = $this->input->post('nama');
$harga = $this->input->post('hrg_beli');
$disc = $this->input->post('diskon');
$ket = $this->input->post('ket');
$spec = $this->input->post('spec');
$jenis = $this->input->post('jenis');
$sub = $this->input->post('satuan');
$display = $this->input->post('display');

$slide = $_FILES['f_upload']['name'];
$jml = count($_FILES['f_upload']['name']);
$tmp = $_FILES['f_upload']['tmp_name'];

$sgs = $this->uri->segment(4);

$foto_slide = "";

for($v = 0; $v < $jml; $v++){
//$nama_slide = rand(0000 , 9999).$slide[$v];
if($sgs == 'update'){
$idx = $this->input->post('id_barang');
$eks = explode('.' , $slide[$v]); 
$nama_slide = $this->create_random().'.'.$eks[1];
if(empty($slide[$v])){
$amb = mysql_fetch_array(mysql_query("select * from product where id_product = '$idx'"));
$pht = explode('#' , $amb['photos']);
$foto_slide .= $pht[$v].'#';
}
else{
$foto_slide .= $nama_slide.'#';
$this->UploadImage('f_upload' , $nama_slide , $v , 199 , 292 , 400 , 350 , true);
}
}
else{
$eks = explode('.' , $slide[$v]); 
$nama_slide = $this->create_random().'.'.$eks[1];
if(empty($slide[$v])){
continue;
}
$foto_slide .= $nama_slide.'#';
//move_uploaded_file($tmp[$v] , 'upload/big_'.$nama_slide);
$this->UploadImage('f_upload' , $nama_slide , $v , 199 , 292 , 360 , 480 , true);
}
}

//return;
$aktif = $this->input->post('aktif');

$data = array('kode' => $kode , 'd_name' => $nama , 'photos' => $foto_slide , 'keterangan' => $ket , 'spec' => $spec ,'diskon' => $disc , 'kategori' => $sub , 'untuk' => $jenis , 'display' => $display , 'aktif' => $aktif , 'size' => $this->input->post('t_sizex') , 'harga' => $harga);

if($sgs == 'tambah'){
$this->db->insert($tbl , $data);
}
else{
$idx = $this->input->post('id_barang');
$this->db->where('id_product' , $idx);
$this->db->update($tbl , $data);
}

}

function edit_main($tbl){
$title = $this->input->post('title');
$meta = $this->input->post('meta');
$slide = $_FILES['f_uploadganti']['name'];
$jml = count($_FILES['f_uploadganti']['name']);
$tmp = $_FILES['f_uploadganti']['tmp_name'];

$add_slide = $_FILES['f_upload']['name'];
$add_jml = count($_FILES['f_upload']['name']);
$add_tmp = $_FILES['f_upload']['tmp_name'];

$idx = $this->input->post('id_main');

$bawah = count($_FILES['fbottom']['name']);
$bottom = $_FILES['fbottom']['tmp_name'];
$nama = $_FILES['fbottom']['name'];

$foto_slide = "";
$ambil_slide = mysql_fetch_array(mysql_query("select photos , display from main where id_main = '$idx'"));
$slide_lama = explode(',' , $ambil_slide[0]);
$slide_bottom = explode(',' , $ambil_slide[1]);



for($v = 0; $v < $jml; $v++){
$is_hapus = $this->input->post('chk_hapusslide'.$v);
$eks = explode('.' , $slide[$v]); 
$nama_slide = $this->create_random().'.'.$eks[1];
if(!empty($is_hapus)){
unlink("upload/product/".$slide_lama[$v]);
continue;
}
else if(empty($slide[$v])){
$foto_slide .= $slide_lama[$v].',';
}
else{
$foto_slide .= $nama_slide.',';
unlink("upload/product/".$slide_lama[$v]);
$this->UploadImage('f_uploadganti' , $nama_slide , $v , 86 , 87 , 920 , 428 , false);
}
}

for($v = 0; $v < $add_jml; $v++){
$eks = explode('.' , $bawah[$v]);
$nama_slide = $this->create_random().'.'.$eks[1]; 
if(empty($add_slide[$v])){
continue;
}
else{
$foto_slide .= $nama_slide.',';
$this->UploadImage('f_upload' , $nama_slide , $v , 86 , 87 , 920 , 428 , false);
}
}
 
for($k = 0; $k < $bawah; $k++){
$nama_bwh = rand(0000 , 9999).$nama[$k];
if(empty($bottom[$k])){
$foto_bottom .= $slide_bottom[$k].',';
}
else{
$foto_bottom .= $nama_bwh.',';
$this->UploadImage('fbottom' , $nama_bwh , $k , 86 , 87 , 300 , 200 , false);
unlink("upload/product/".$slide_bottom[$k]);
}
}

$aktif = $this->input->post('aktif');

$data = array('title' => $title , 'meta' => $meta , 'photos' => $foto_slide , 'display' => $foto_bottom);

$this->db->where('id_main' , $this->input->post('id_main'));
$this->db->update($tbl , $data);
}

function ambil_data_kategori($tbl){
$ambil = $this->db->get("kategori");
if($ambil->num_rows() > 0){
foreach($ambil->result() as $data){
$hasil[] = $data;
}
return $hasil;
}
}

function ambil_data_provinsi($tbl){
$ambil = $this->db->get("lokasi");
if($ambil->num_rows() > 0){
foreach($ambil->result() as $data){
$hasil[] = $data;
}
return $hasil;
}
}

function ambil_data_kota($tbl){
$ambil = $this->db->get("kota");
if($ambil->num_rows() > 0){
foreach($ambil->result() as $data){
$hasil[] = $data;
}
return $hasil;
}
}


function ambil_data($tbl){
$ambil = $this->db->get($tbl);
if($ambil->num_rows() > 0){
foreach($ambil->result() as $data){
$hasil[] = $data;
}
return $hasil;
}
}

function cari_transaksi(){
$tgl_from = $this->input->post('tanggal_from');
$tgl_to = $this->input->post('tanggal_to');

if(empty($tgl_to) && empty($tgl_from)){
$ambil = $this->db->query("select * from member order by sub_date limit 100");
}
else{
$ambil = $this->db->query("select * from member where sub_date >= '$tgl_from' and sub_date <= '$tgl_to' order by sub_date ");
}
foreach($ambil->result() as $data){
$hasil[] = $data;
}
return $hasil;
}

function ambildata_suara($tbl){

$hal = $_GET['halaman'];

if(empty($hal)){
$off = 0;
}
else{
$off = ($hal - 1) * 10;
}

$this->db->where('valid' , 'y');
$this->db->order_by('id_'.$tbl , 'desc');

$this->db->limit(10,$off);
$ambil = $this->db->get($tbl);
//foreach($ambil->result() as $data){
//$hasil[] = $data;
//}
return $ambil;

}

function ambildata_suara_tdk($tbl){
$hal = $_GET['halaman'];

if(empty($hal)){
$off = 0;
}
else{
$off = ($hal - 1) * 10;
}

$this->db->where('valid' , 'n');
$this->db->where('tmp' , 'y');

$this->db->order_by('id_'.$tbl , 'desc');
$this->db->limit(10,$off);
$ambil = $this->db->get($tbl);

return $ambil;
}

function ambildata($tbl){
//$this->db->where('aktif' , 'y');
$hal = $_GET['halaman'];

if(empty($hal)){
$off = 0;
}
else{
$off = ($hal - 1) * 10;
}

$this->db->order_by('id_'.$tbl , 'desc');
$this->db->limit(10,$off);
$ambil = $this->db->get($tbl);
//foreach($ambil->result() as $data){
//$hasil[] = $data;
//}
return $ambil;
}

function ambildata_nolimit_valid($tbl){
//$this->db->where('aktif' , 'y');
$this->db->where('tmp' , 'n');
$this->db->where('valid' , 'y');

$this->db->order_by('id_'.$tbl , 'desc');
//$this->db->limit(10);
$ambil = $this->db->get($tbl);
//foreach($ambil->result() as $data){
//$hasil[] = $data;
//}
return $ambil;
}

function ambildata_nolimit_tdkvalid($tbl){

$this->db->where('tmp' , 'y');
$this->db->where('valid' , 'n');

$this->db->order_by('id_'.$tbl , 'desc');

$ambil = $this->db->get($tbl);

return $ambil;
}

function ambildata_nolimit($tbl){
//$this->db->where('aktif' , 'y');
$this->db->order_by('id_'.$tbl , 'desc');
//$this->db->limit(10);
$ambil = $this->db->get($tbl);
//foreach($ambil->result() as $data){
//$hasil[] = $data;
//}
return $ambil;
}

function selectmodul($tbl){
$modul = $this->uri->segment(3);
$id = $this->uri->segment(5);
return $this->db->get_where($modul , array('id_'.$modul => $id))->row();
}

function delete_data($tbl){
$modul = $this->uri->segment(3);
$id = $this->uri->segment(4);
//$this->db->where('id_'.$tbl , $id);
//$data = array('aktif' => 'n');

if($tbl == 'about'){
$total_sg = $this->uri->total_segments();
$gbr = $this->uri->segment($total_sg);
$amb = mysql_fetch_array(mysql_query("select $gbr from $tbl where id_$tbl = $id"));
unlink('upload/product/'.$amb[0]);
}


$this->db->where('id_'.$tbl , $id);
$this->db->delete($tbl);

}

function delete_alldata($tbl){
$modul = $this->uri->segment(3);
$id = $this->uri->segment(4);
$cek = $this->input->post('cek');
$jumlah= count($cek);
for($i=0;$i<$jumlah;$i++){
$data = array('aktif' => 'n');
$this->db->where('id_'.$tbl , $cek[$i]);
$this->db->update($tbl , $data);
}
}

}

?>