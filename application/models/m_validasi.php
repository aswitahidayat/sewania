<?php

class m_validasi extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function validasidata($iduser,$pass)
	{ 
	$id = $this->session->userdata('session_id');
	$query = $this->db->query("SELECT * from admin WHERE nama='$iduser' AND password = '$pass' ");	
	$this->db->query("UPDATE admin SET session='$id' WHERE nama='$iduser'");
	return $query;
	}
       
	/*function menu()
	{ 
	$menu = $this->db->query("SELECT * from dropdown ORDER by urutan");	
	return $menu;
	}*/
	
	function ubahdata($iduser,$pass,$email)
	{ 
	$pswd = trim($this->input->post('txtpass'));
	$nama = trim($this->input->post('txtnama'));
	if(empty($pswd)){
	$query = $this->db->query("SELECT * from admin WHERE nama='$nama'");	
	$hasil = array('query' => $query->result() , 'page_title' => 'Info Admin');
	 $data = array(
	   'email' => "$email");

	    $this->db->where('nama', $iduser);

		$this->db->update('admin', $data);
		redirect('validasi/validate',$hasil);
	}
	else{
	$query = $this->db->query("SELECT * from Admin WHERE nama='$nama'");	
	$hasil = array('query' => $query->result() , 'page_title' => 'Info Admin');
	$data = array(
	   'password' => "$pass" ,
	   'email' => "$email");

	$this->db->where('nama', $iduser);

    $this->db->update('admin', $data);
	redirect('validasi/validate',$hasil);
	}
	}
}

?>