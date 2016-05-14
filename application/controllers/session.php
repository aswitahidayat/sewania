<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class session extends CI_Controller {

public function __construct()
{
parent::__construct();
$this->load->database();
}

public function index()
{
$this->load->view("login" , array('error' => ' ' ));
}

public function s_member_produk()
{
$_SESSION['member_id']=$_POST['id'];
$ft=mysql_fetch_array(mysql_query("select * from member where token_id='$_POST[id]'"));
echo $ft[1]."-".$ft[2];
}

public function s_kategori()
{
$_SESSION['kat_produk']=$_POST['id'];
$ft=mysql_fetch_array(mysql_query("select * from sub_kategori where id_sub_kategori='$_POST[id]'"));
echo rawurlencode($ft[1]);
}

public function s_prod()
{
$_SESSION['id_produk']=$_POST['id'];
$ft=mysql_fetch_array(mysql_query("select * from produk where id_produk='$_POST[id]'"));
echo rawurlencode($ft[1]);
}

public function s_prod_sr()
{
$_SESSION['kat_produk']=$_POST['category'];
$_SESSION['search_produk']=$_POST['t_name_produk'];
$ft=mysql_fetch_array(mysql_query("select * from sub_kategori where id_sub_kategori='$_POST[category]'"));
echo "front/category/".rawurlencode($ft[1])."/".$_POST['t_name_produk'];
}

}
?>