<?php
//error_reporting(0);
//session_start();

function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}

//fungsi cek akses user
function user_akses($mod,$id){
	$link = "?module=".$mod;
	$cek = mysql_num_rows(mysql_query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'"));
	return $cek;
}
//fungsi cek akses menu
function umenu_akses($link,$id){
	$cek = mysql_num_rows(mysql_query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'"));
	return $cek;
}
//fungsi redirect
function akses_salah(){
	$pesan = "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Maaf Anda tidak berhak mengakses halaman ini</center>";
 	$pesan.= "<meta http-equiv='refresh' content='2;url=media.php?module=home'>";
	return $pesan;
}

if ($this->session->userdata('nama_user_ivory') == '' && $this->session->userdata('login_user_ivory') == FALSE){

  ?>
  <link href='<?php echo base_url('ivory_src/css/zalstyle.css') ?>' rel='stylesheet' type='text/css'>";
  
  </head>
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  
  <img src='<?php echo base_url('ivory_src/img/lock.png'); ?>'>
  <h1>AKSES ILEGAL</h1>
  
  <p><span class style=\"font-size:14px; color:#ccc;\">
  Maaf, untuk masuk Halaman Administrator
  anda harus Login dahulu!</p></span><br/>
  
  </section>
  
  <section id='error-text'>
  <p><a class='button' href='<?php echo base_url('content'); ?>'>&nbsp;&nbsp; <b>LOGIN DI SINI</b> &nbsp;&nbsp;</a></p>
  </section>
  </div>
<?php 
}
else{
?>

  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
	<meta charset="utf-8"/>
	<title>.:: HALAMAN ADMINISTRATOR ::.</title>
	
	<meta charset="utf-8" />
	<link rel="dns-prefetch" href="http://fonts.googleapis.com/" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="shortcut icon" href="../favicon.png" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" href="<?php echo base_url('ivory_src/css/zalstyle.css'); ?>" />
	<link href="http://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet" type="text/css" />
	<script src="<?php echo base_url('ivory_src/js/libs/modernizr-2.0.6.min.js'); ?>"></script> 
   
    
    <script src="<?php echo base_url('upload/js/jquery-1.7.js'); ?>" type="text/javascript"></script>
    
    <script src="<?php echo base_url('ivory_src/ui/jquery.ui.core.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('ivory_src/ui/jquery.ui.widget.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('ivory_src/ui/jquery.ui.mouse.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('ivory_src/ui/jquery.ui.button.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('ivory_src/ui/jquery.ui.draggable.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('ivory_src/ui/jquery.ui.position.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('ivory_src/ui/jquery.ui.resizable.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('ivory_src/ui/jquery.ui.button.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('ivory_src/ui/jquery.ui.dialog.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('ivory_src/ui/jquery.ui.effect.js'); ?>" type="text/javascript"></script>
	
    <style type="text/css">
		/* body { font-size: 62.5%; } */
		#dialog label, #dialog input { display:block; }
		#dialog input.text { margin-bottom:12px; width:95%; padding: .4em; }
		#dialog fieldset { padding:0; border:0; margin-top:25px; }
		#dialog h1 { font-size: 1.2em; margin: .6em 0; }
		
		#dialog_pmb label, #dialog input { display:block; }
		#dialog_pmb input.text { margin-bottom:12px; width:95%; padding: .4em; }
		#dialog_pmb fieldset { padding:0; border:0; margin-top:25px; }
		#dialog_pmb h1 { font-size: 1.2em; margin: .6em 0; }
		
		div#users-contain {  width: 350px; margin: 20px 0; }
		div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
		div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
		.ui-button { outline: 0; margin:0; padding: .4em 1em .5em; text-decoration:none;  !important; cursor:pointer; position: relative; text-align: center; }
		.ui-dialog .ui-state-highlight, .ui-dialog .ui-state-error { padding: .3em;  }
		
		
	</style>
	
	<style>
		.validateTips { border: 1px solid transparent; padding: 0.3em; }
	</style>
    <script src="<?php echo base_url('ivory_src/ui/jquery.ui.datepicker.js'); ?>" type="text/javascript"></script>
	
	<script type="text/javascript">
	jQuery(function() {
	
	jQuery("#dialog").dialog({
			bgiframe: true,
			autoOpen: false,
			height: 600,
			width:800,
			modal: true,
			
			buttons: {
			
			'Pick Items !': function() {
			var kode = jQuery('#txt_kdbrg_names').val();
			
			if(kode == ""){
		     jQuery('#cr_kode_brg').val(jQuery('.brs_pertama').html());
			}
			
			alert(jQuery('.brs_pertama').html());
			
			jQuery('#cr_kode_brg').val(jQuery('#brs_rdb_brg' + kode).html());
			jQuery('#id_barang').val(jQuery('#brs_nama_brg' + kode).html());
			jQuery('#hrgbeli_transaksi_brg').val(jQuery('#brs_hrgbeli_brg' + kode).html());
			jQuery('#hrgjual_transaksi_brg').val(jQuery('#brs_hrgjual_brg' + kode).html());
			jQuery('#stok_transaksi_brg').val(jQuery('#brs_stok_brg' + kode).html());
			
			document.getElementById('frm_inputrans').cr_kode_brg.focus();
			jQuery(this).dialog('close');
			},
			
			Cancel: function() {
					jQuery(this).dialog('close');
			}
			
			}
	});
	
	jQuery('#trn_find_brg').click(function() {
			jQuery('#dialog').dialog('open');
			
			jQuery('#tbl_list_brg').empty();
			jQuery('#txt_kdbrg_names').val('');
			jQuery('#txt_crbrg_name').val('');
			
			jQuery('#tbl_list_brg').append('<td style="border-right:1px solid #999;" colspan="6">Data Masih Kosong !!</td>');
			return false;
	})
	
	jQuery("#dialog_pmb").dialog({
			bgiframe: true,
			autoOpen: false,
			height: 600,
			width:800,
			modal: true,
			
			buttons: {
			
			'Pick Items !': function() {
			var kode;
			
			if(jQuery('#txt_kdbrg_names').val() == ""){
		    kode = jQuery('.brs_pertama').html();
			}
			else{
			kode = jQuery('#txt_kdbrg_names').val();
			}
			
			jQuery('#cr_kode_brg').val(jQuery('#brs_rdb_brg' + kode).html());
			jQuery('#id_barang').val(jQuery('#brs_nama_brg' + kode).html());
			jQuery('#hrgbeli_pembelian_brg').val(jQuery('#brs_hrgbeli_brg' + kode).html());
			jQuery('#hrgjual_pembelian_brg').val(jQuery('#brs_hrgjual_brg' + kode).html());
			jQuery('#stok_pembelian_brg').val(jQuery('#brs_stok_brg' + kode).html());
			
			document.getElementById('frm_inputrans').cr_kode_brg.focus();
			jQuery(this).dialog('close');
			},
			
			Cancel: function() {
					jQuery(this).dialog('close');
			}
			
			}
	});
	
	jQuery('#pmb_find_brg').click(function() {
			jQuery('#dialog_pmb').dialog('open');
			
			jQuery('#tbl_list_brg').empty();
			jQuery('#txt_kdbrg_names').val('');
		    jQuery('#txt_crbrg_name').val('');
			
			jQuery('#tbl_list_brg').append('<td style="border-right:1px solid #999;" colspan="6">Data Masih Kosong !!</td>');
			return false;
	})
		
		jQuery( "#tgl_lahir" ).datepicker({
			showOn: "button",
			dateFormat:"yy-mm-dd",
			buttonImage: "<?php echo base_url('ivory_src/images/calendar.gif'); ?>",
			buttonImageOnly: true
		});
	});
	
	jQuery(function() {
		jQuery( "#tgl_fromto" ).datepicker({
			showOn: "button",
			dateFormat:"yy-mm-dd",
			buttonImage: "<?php echo base_url('ivory_src/images/calendar.gif'); ?>",
			buttonImageOnly: true
		});
	});
	</script>
    
    <script type="text/javascript">
	function cek_angka(input){
	var value = input.value.replace('.' , '');
	var number = new Number(value);
	
	if(input.value == ""){
	input.value = 0;
	}
	
	if(input.value.substring(0,1) == 0 && input.value.length == 2){
	input.value = input.value.substring(1,2);
	}
	
	if(isNaN(number)){
	input.value = parseInt(input.value);
	}
	else{
	input.value = input.value;
	}
	}
	
	</script>
	 <script language="javascript" type="text/javascript"
src="<?php echo base_url('ivory_src/editor/tiny_mce_src.js'); ?>"></script>
<script type="text/javascript">
tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "table,youtube,advhr,advimage,advlink,emotions,flash,searchreplace,paste,directionality,noneditable,contextmenu",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "separator,preview,zoom,separator,forecolor,backcolor,liststyle",
		theme_advanced_buttons2_add_before: "cut,copy,paste,separator,search,replace,separator",
		theme_advanced_buttons3_add_before : "tablecontrols,separator,youtube,separator",
		theme_advanced_buttons3_add : "emotions,flash",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		extended_valid_elements : "hr[class|width|size|noshade]",
		file_browser_callback : "fileBrowserCallBack",
		paste_use_dialog : false,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
		apply_source_formatting : true
});

	function fileBrowserCallBack(field_name, url, type, win) {
		var connector = "../../filemanager/browser.html?Connector=connectors/php/connector.php";
		var enableAutoTypeSelection = true;
		
		var cType;
		tinymcpuk_field = field_name;
		tinymcpuk = win;
		
		switch (type) {
			case "image":
				cType = "Image";
				break;
			case "flash":
				cType = "Flash";
				break;
			case "file":
				cType = "File";
				break;
		}
		
		if (enableAutoTypeSelection && cType) {
			connector += "&Type=" + cType;
		}
		
		window.open(connector, "tinymcpuk", "modal,width=600,height=400");
	}
</script>
	
	
	
  </head>
  <body id="top">
  <div id="container">
  <div id="header-surround">
  <header id="header">
  <img src="<?php echo base_url('ivory_src/img/logo.png'); ?>" alt="Grape" class="logo" /> 
				
			
									
  <div id="user-info">
  <p> 
  <a target='_blank' href=../index.php  class="button blue">Lihat Web</a> 
  <a href="logout.php" class="button red">Logout</a> </p>
  </div>
  </header>
  </div>
  <div class="fix-shadow-bottom-height"></div>
  
  
  <aside id="sidebar">
  <section id="login-details">
  <?php include "foto.php"; ?>
  <div class='selamat'><SCRIPT language=JavaScript>var d = new Date();
  var h = d.getHours();
  if (h < 11) { document.write('Selamat pagi,'); }
  else { if (h < 15) { document.write('Selamat siang,'); }
  else { if (h < 19) { document.write('Selamat sore,'); }
  else { if (h <= 23) { document.write('Selamat malam,'); }
  }}}</SCRIPT></div>
  <h3><?php include "nama.php"; ?></h3>
  <h3>Status :<b style="color:#00CCFF;"> <?php echo ucfirst($this->session->userdata('level')); ?></b></h3>
  <div class="clearfix"></div>
  </section>
			
  <nav id="nav">
  <ul class="menu collapsible shadow-bottom">
	
  <li>
  <a href="javascript:void(0);">
   MENU UTAMA</a> 
  <ul class="sub">
  <?php include "menu1.php"; ?>
  </ul>
   <li>
  <a href="javascript:void(0);">
   MODUL BARANG</a> 
  <ul class="sub">
  <?php include "menu2.php"; ?>
  </ul>
  <li>
  <a href="javascript:void(0);">
   MODUL COMPANY</a> 
  <ul class="sub">
  <li><a href="<?php echo base_url('content/data/about/'); ?>"><b>About Us</b></a></li>
  </ul>
  </li>
  <li>
  <a href="javascript:void(0);">
   MODUL HELP</a> 
  <ul class="sub">
  <li><a href="<?php echo base_url('content/data/jasa/'); ?>"><b>Contact Us</b></a></li>
  <li><a href='<?php echo base_url('content/data/jenis_beban/'); ?>'><b>Track and Order</b></a></li>
  <li><a href='<?php echo base_url('content/data/beban/'); ?>'><b>FAQS</b></a></li>
  <li><a href='<?php echo base_url('content/data/main/'); ?>'><b>Shipping Info</b></a></li>
  </ul>
  </li>
   <li>
  <a href="javascript:void(0);">
   MODUL TRANSAKSI</a> 
  <ul class="sub">
  <li><a href="<?php echo base_url('content/data/member/'); ?>"><b>Data Pemesanan</b></a></li>
  </ul>
  </li>
   <li>
  <a href="javascript:void(0);">
   MODUL LAINNYA</a> 
  <ul class="sub">
  <?php include "menu3.php"; ?>
  </ul>
  </ul>
  </nav>
  </aside>
		
  <div id="main" role="main">
  <div id="title-bar">
  <ul id="breadcrumbs">
  <li><a href="?module=home" title="Beranda"><span id="bc-home"></span></a></li>
  <li class="no-hover">Selamat Datang di Halaman Administrator. </li>
  </ul>
  </div>
  <div class="shadow-bottom shadow-titlebar"></div>
  <?php
   
   include "content.php"; ?>
  </div>
  
  <script src="<?php echo base_url('ivory_src/js/jquery.min.js'); ?>"></script> 
  <script>window.jQuery||document.write('<script src="<?php echo base_url('ivory_src/js/libs/jquery-1.6.2.min.js'); ?>"><\/script>');</script>
 
  <script defer type="text/javascript" src="<?php echo base_url('ivory_src/js/zal.js'); ?>"></script>
<!-- <button id="create-user" class="ui-button ui-state-default ui-corner-all">Create new user</button> -->

 

  </body></html>



  <?php
  }
  ?>