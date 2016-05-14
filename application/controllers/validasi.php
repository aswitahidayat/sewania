<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class validasi extends CI_Controller {

public function __construct()
{
parent::__construct();
$this->load->database();
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

public function validate(){
function anti_sql_inject($data){
$filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
return $filter;
}
$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('txtuser', 'Username', 'trim|xss_clean|htmlspecialchars|my_real_escape_string|stripslashes|required');
        
		if ($this->form_validation->run() == FALSE)
		{
		$data['error'] = '';
		$this->load->view("login" , $data);
		}
		else
		{
		$this->load->model('m_validasi');
        $query = $this->m_validasi->validasidata(anti_sql_inject($this->input->post('txtuser')),anti_sql_inject(md5($this->input->post('txtpass')))); 	
		//$menu = $this->m_validasi->menu();				  
		if($query->num_rows <= 0){
		$data['error'] = 'Unknown Username and Password !';
		$error = 'Unknown Username !';
		$this->load->view("gagal_login" , $data);
		}
		else if($query->num_rows > 0){
		$iduser = anti_sql_inject($this->input->post('txtuser'));
		$amb = $query->result();
		
		$nama = $this->input->post('txtuser');
		$pass = md5($this->input->post('txtpass'));
		
		$query = mysql_fetch_array(mysql_query("select * from admin where nama = '$nama' and password = '$pass'"));
		
		$newdata = array('id_users_ivory' => $iduser , 'login_user_ivory' => TRUE , 'nama_user_ivory' => $query['nama'] , 'level' => 'admin');
		$this->session->set_userdata($newdata);
		$data = array('jenis');
		$data = "Home";
		$hasil = array('query' => $amb);
		redirect("content/" , $hasil);
		}
		}
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