<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);

class sindrom extends CI_Controller {

public function __construct()
{
parent::__construct();
$this->load->database();
}

public function dir_pass()
{
$this->load->model('mbackend');
$this->load->model('m_global');

$data['hasil'] = $this->mbackend->ambil_data($this->uri->segment(3) , $this->m_global->limit() , $this->input->post('tampilkan') , "id_kategori");
$data['kategori'] = $this->mbackend->ambil_data_nolimit_kategori("kategori");
$data['jumlah'] = count($this->mbackend->ambil_data_nolimit($this->uri->segment(3) , $this->input->post('tampilkan') , "id_kategori"));
$data['limit'] = $this->m_global->limit();

$this->load->view('home_admin' , $data);
}

public function tambah_kategori()
{
$this->load->model('mbackend');
$this->load->model('m_global');
$q = $this->mbackend->add_kategori();
$limit = $this->m_global->limit();
redirect('sindrom/viewdata/kategori/'.$limit);
}



public function tambah_lokasi()
{
$this->load->model('mbackend');
$this->load->model('m_global');
$q = $this->mbackend->add_location();
$limit = $this->m_global->limit();
redirect('sindrom/viewdata/lokasi/'.$limit);
}

public function tambah_kota()
{
$this->load->model('mbackend');
$this->load->model('m_global');
$q = $this->mbackend->add_kota();
$limit = $this->m_global->limit();
redirect('sindrom/viewdata/kota/'.$limit);
}

public function delete_data($tbl,$id)
{
$this->load->model('mbackend');
$this->load->model('m_global');
$q = $this->mbackend->delete_data($tbl,$id);
$limit = $this->m_global->limit();
redirect('sindrom/viewdata/kategori/'.$limit);
}


public function index()
{
$this->load->view("home_admin" , array('error' => ' ' ));
}

public function viewdata()
{
$this->load->model('mbackend');
$this->load->model('m_global');

$data['hasil'] = $this->mbackend->ambil_data($this->uri->segment(3) , $this->m_global->limit() , $this->input->post('tampilkan') , "id_kategori");
$data['kategori'] = $this->mbackend->ambil_data_nolimit_kategori("kategori");
$data['jumlah'] = count($this->mbackend->ambil_data_nolimit($this->uri->segment(3) , $this->input->post('tampilkan') , "id_kategori"));
$data['limit'] = $this->m_global->limit();
$this->load->view('home_admin' , $data);	
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