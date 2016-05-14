<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

public function __construct()
{
parent::__construct();
$this->load->database();
}

public function index()
{
$this->load->view('shoutbox');
}

public function nojs(){
$this->load->view('nojs');
}

public function show()
{
$this->load->view('proses.php');
}

public function cekuser()
{
$this->load->view('checking.php');
}

public function cekemail()
{
$this->load->view('cekemail.php');
}

public function cekusername()
{
$this->load->view('cekusername.php');
}
public function video()
{
$this->load->view('vid_player.php');
}

public function komentar(){
$this->load->view('komentar.php');
}

public function insert()
{
$this->load->view('addshoutbox.php');
}
}
?>