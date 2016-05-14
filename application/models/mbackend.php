<?php
error_reporting(0);

class Mbackend extends CI_Model{

function create_random(){
$date = date('YmdHis');
$chr = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ") , 0 , 8);
return $date.$chr;
}

// add_data

function delete_data($tbl , $id){

  $q = $this->db->query("delete from $tbl where id_$tbl = '$id'");
  return $q;
}


function add_kategori(){
  $kategori = $this->input->post('nama_input');
  $id = $this->input->post('id_kategori');
  $ic=date('YmdHis');
  $rnd=rand(0000,9999);
  $tm=$_FILES['f_upload']['tmp_name'];
  $type=$_FILES['f_upload']['type'];
  $tp=explode('/',$type);
  $icx=$ic.'.'.$tp[1];
  
  if($id == ""){
  $up=move_uploaded_file($tm,'ivory_src/icon/'.$icx);
  $q = $this->db->query("Insert into kategori (nama,icon) VALUES ('$kategori','$icx')");
  }
  else{
  if($tm!=""){
  $up=move_uploaded_file($tm,'ivory_src/icon/'.$icx);
  $q = $this->db->query("Update kategori set nama ='$kategori' , icon='$icx' Where id_kategori = '$id'");
  }
  else{
  $q = $this->db->query("Update kategori set nama ='$kategori' Where id_kategori = '$id'");
  }
  }
}

function add_kota(){
  $kategori = $this->input->post('nama_input');
  $prov = $this->input->post('cmb_provinsi');
  $id = $this->input->post('id_kategori');
  
  if($id == ""){
  $q = $this->db->query("Insert into kota (id_lokasi,nama_kota) VALUES ('$prov','$kategori')");
  }
  else{
  $q = $this->db->query("Update kota set nama_kota = '$kategori' , id_lokasi = '$prov' where id_kota = '$id'");
  }
}

function add_location(){
  $kategori = $this->input->post('nama_input');
  $id = $this->input->post('id_kategori');
  
  if($id == ""){
  $q = $this->db->query("Insert into lokasi (nama_lokasi) VALUES ('$kategori')");
  }
  else{
  $q = $this->db->query("Update lokasi set nama_lokasi ='$kategori' Where id_lokasi = '$id'");
  }
}

function UploadImage($nm,$fupload_name , $idx , $w , $h , $wbesar , $hbesar , $bools){
  //direktori gambar
  $vdir_upload = "upload/product/";
  $vth_upload = "upload/product/thumb/";
  $vfile_upload = $vdir_upload.$fupload_name;
  
  $imageType = $_FILES[$nm]["type"][$idx];

  //Simpan gambar dalam ukuran sebenarnya
  
  move_uploaded_file($_FILES[$nm]["tmp_name"][$idx], $vfile_upload);

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
  if($src_width>=350){
  $dst_width = 350;
  } else {
  $dst_width = $src_width;
  }
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($wbesar,$hbesar);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $wbesar,$hbesar, $src_width, $src_height);
   
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

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

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
  
  $dst_width2 = $w;
 // $dst_height2 = ($dst_width2/$src_width)*$src_height;
 $dst_height2 = $h;

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

function ambil_data_nolimit($tbl,$post,$field){
if(!empty($post)){
$idx = $this->input->post('chk_nama');
$hit = count($idx);

for($c = 0; $c < $hit; $c++){
$this->db->or_where($field , $idx[$c]);
}

}

$ambil = $this->db->get($tbl);
if($ambil->num_rows() > 0){
foreach($ambil->result() as $data){
$hasil[] = $data;
}
return $hasil;
}
}

function ambil_data_nolimit_kategori($tbl){
$ambil = $this->db->get($tbl);
if($ambil->num_rows() > 0){
foreach($ambil->result() as $data){
$hasil[] = $data;
}
return $hasil;
}
}

function ambil_data($tbl,$limit,$post,$field){
if(!empty($post)){
$idx = $this->input->post('chk_nama');
$hit = count($idx);

for($c = 0; $c < $hit; $c++){
$this->db->or_where($field , $idx[$c]);
}

}
if(empty($_GET['halaman'])){
$off = 0;
}
else{
$off = ($_GET['halaman'] - 1) * 20;
}

if(empty($post)){
$this->db->order_by('id_'.$tbl , 'desc');
$this->db->offset($off);
$this->db->limit(20);
}

$ambil = $this->db->get($tbl);
if($ambil->num_rows() > 0){
foreach($ambil->result() as $data){
$hasil[] = $data;
}
return $hasil;
}
}

function maint_kategori($tbl){


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