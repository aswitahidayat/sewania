<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);

class front extends CI_Controller {

public function __construct()
{
parent::__construct();
}

public function member_produk()
{
$this->load->model('madmin');

$this->load->view('index'); //meload views detail barang
}

public function index()
{
$this->load->model('madmin');
$data['title'] = 'Detail Barang'; //judul title
$data['qbarang'] = $this->madmin->ambil_data_kategori($segment); //query model barang sesuai id
$data['qprovinsi'] = $this->madmin->ambil_data_provinsi($segment); //query model provinsis sesuai id
 
$this->load->view('index',$data); //meload views detail barang
}

public function upload_filed($segment)
{
$this->load->model('madmin');
//$data['title'] = 'Detail Barang'; //judul title
$data['qbarang'] = $this->madmin->upload_filed(); //query model barang sesuai id
$data['qprovinsi'] = $this->madmin->ambil_data_provinsi($segment); //query model provinsis sesuai id
 
//$this->load->view('index',$data); //meload views detail barang
}

public function update_produk_member($segment)
{
  $this->load->model('madmin');
  //$data['title'] = 'Detail Barang'; //judul title
  $data['qbarang'] = $this->madmin->update_produk_member(); //query model barang sesuai id
  $data['qprovinsi'] = $this->madmin->ambil_data_provinsi($segment); //query model provinsis sesuai id

//$this->load->view('index',$data); //meload views detail barang
}


public function ajax_tab_2()
{
$this->load->model('madmin');

$this->load->view('halaman/ajax/1',$data); //meload views detail barang
}

public function member_reg()
{
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

$dt = date('Y-m-d');

$token = date('YmdHis').str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789");

$token = substr($token , 0 , 32);
mysql_query("Insert into member(first_name , last_name , phone , hide_phone , gender , about_you , email , password , tgl_daftar , aktif , type , token_id) VALUES('$first' , '$last' , '$phone' , '$hide_phone' , '$gender' , '$about' , '$email' , '$pass' , '$dt' , 'y' , '$as' ,'$token')");


$_SESSION['login'] = true;
$_SESSION['token_id'] = $token;

redirect('front/account_member');
}

public function category()
{
$this->load->model('madmin');
$data['title'] = 'Detail Barang'; //judul title
$data['qbarang'] = $this->madmin->ambil_data_kategori($segment); //query model barang sesuai id
 
$this->load->view('index',$data); //meload views detail barang
}

public function ads_detail()
{
$this->load->model('madmin');
$this->load->view('index',$data); //meload views detail barang

}

public function account_member()
{
$this->load->model('madmin');
$data['qbarang'] = $this->madmin->ambil_data_kategori($segment);
$data['qprovinsi'] = $this->madmin->ambil_data_provinsi($segment);
$data['qkota'] = $this->madmin->ambil_data_kota($segment);
$this->load->view('index',$data); //meload views detail barang

}

public function post_ad()
{
  $this->load->model('madmin');
  $data['title'] = 'Detail Barang'; //judul title
  $data['qbarang'] = $this->madmin->ambil_data_kategori($segment); //query model barang sesuai id
  $data['qprovinsi'] = $this->madmin->ambil_data_provinsi($segment); //query model provinsis sesuai id
  $data['qkota'] = $this->madmin->ambil_data_kota($segment); //query model kota sesuai id

$this->load->view('index',$data); //meload views detail barang
}

public function add_comment()
{
$nama=$_POST['nama'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$teks=$_POST['teks'];
$prod=$_SESSION['id_produk'];
mysql_query("Insert into komentar(id_produk,nama,no_telp,email,pesan) VALUES('$prod','$nama','$phone','$email','$teks')");
}

public function signup()
{
$this->load->model('madmin');
$this->load->view('index',$data); //meload views detail barang
}

public function member_login()
{
$this->load->model('madmin');
$this->load->view('index',$data); //meload views detail barang
}

public function forgot_password()
{
$this->load->model('madmin');
$this->load->view('index',$data); //meload views detail barang
}

public function utama()
{
$this->load->view("index");
}

public function upload_file(){
$file_path = "assets/img/upload/";
$rnd = date('Ymd').str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789').'.jpg';     
//$file_path = $file_path.$_FILES['uploaded_file']['name'];
$file_path = $file_path.$rnd;
 if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
            echo "success";
			
 } else{
            echo "fail";
 }
 mysql_query("insert into suara(id_tps , jumlah_1 , jumlah_2 , foto,keterangan)VALUES('$_POST[tps_id]','$_POST[jm1]','$_POST[jm2]','$rnd','$_POST[ket]')");
}


public function pdf()
{
$this->load->view("pdf");
}

public function pdf_transaksi()
{
$this->load->view("pdf_transaksi");
}

public function trans_darah()
{
$this->load->view("home");
}

public function delete_data($tbl){
 mysql_query('delete from '.$tbl.' where id_'.$tbl.' = '.$this->uri->segment(4)); 
 redirect('front/viewdata/'.$this->uri->segment(5));
}

public function detail($segment){ //fungsi detail barang
        $this->load->model('madmin');
        $data['title'] = 'Detail Barang'; //judul title
        $data['qbarang'] = $this->madmin->ambil_data($segment); //query model barang sesuai id
 
        $this->load->view('index',$data); //meload views detail barang
    }

public function ambil_desa_tps()
{
$kec = $_POST['kec'];
$q = mysql_query("select distinct(desa) from tps where kecamatan = '$kec' and terisi = 'n'");
//echo "select * from tps where kecamatan = '$kec'";
$js = '{"desa":[';
$a = 0;
while($row = mysql_fetch_array($q)){
if($a == 0){
   $js .= '{"id" : "'.$row[0].'", "desa" : "'.$row[desa].'"}';
}
else{
   $js .= ',{"id" : "'.$row[0].'", "desa" : "'.$row[desa].'"}';
}
$a++;
}
$js .= "]}";

echo $js;
}

}
?>