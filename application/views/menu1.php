<?php
//$cek=umenu_akses("?module=identitas");
if($this->session->userdata('level')=='admin'){
?>
<li><a href="<?php echo base_url('content/home'); ?>"><b>Home</b></a></li>
<li><a href="<?php echo base_url('content/data/admin'); ?>"><b>Admin</b></a></li>
<li><a href="<?php echo base_url('content/data/main'); ?>"><b>Main Page</b></a></li>
<?php
}

?>
