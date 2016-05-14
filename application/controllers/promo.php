<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);

class promo extends CI_Controller {

public function __construct()
{
parent::__construct();
}

public function index()
{
	$this->load->view('promo'); //meload views detail barang
}
}
?>
