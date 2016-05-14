<?php
error_reporting(0);
include("module/koneksi.php");
include("module/tgl_indo.php");
include('config/class_paging.php');
include('config/fungsi_indotgl.php');

$url = "http://localhost/sewania/bower_components/";
$base = "http://localhost/sewania/";

$basedx = "http://localhost/sewania/sindrom/";
$sts = mysql_fetch_array(mysql_query("select * from lokasi_pendonor limit 1"));



$stsx = mysql_fetch_array(mysql_query("select * from lokasi_pendonor limit 1"));

if($stsx['tanggal'] < date('Y-m-d')){
mysql_query("update lokasi_pendonor set status_update = 'n'");
}

$sts = mysql_fetch_array(mysql_query("select * from lokasi_pendonor limit 1"));

$q_pendonor = mysql_query("select * from pendonor");
while($row = mysql_fetch_array($q_pendonor)){
  $time = strtotime($row['tanggal_donor']);
  $final = date("Y-m-d", strtotime("-3 month", $time));
  
  $time2 = strtotime($final);
  $final2 = date("Y-m-d", strtotime("+3 days", $time2));
  
  if(date('Y-m-d') >= $final2){
     mysql_query("update pendonor set status_kirim_sms = 'n' where id_pendonor = '$row[0]'");
  }
  
}

function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $base.'/bower_components/bootstrap/dist/css/bootstrap.min.css'; ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo $base.'/bower_components/metisMenu/dist/metisMenu.min.css'; ?>" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo $base.'/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css'; ?>" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo $base.'/bower_components/datatables-responsive/css/dataTables.responsive.css'; ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $base.'/dist/css/sb-admin-2.css'; ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $base.'/bower_components/font-awesome/css/font-awesome.min.css'; ?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background:#ffffff;">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; width:100%; height:100px;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $base; ?>/">Sewania.Com <br />  &nbsp; Backend Administrator</a> 
               
            </div>
            <!-- /.navbar-header -->
<?php
$rw = mysql_fetch_array(mysql_query("select * from admin where id_admin = '$_SESSION[id]'"));
$sess_status = $rw['status'];
$sess_id = $rw[0];
$stsk = "";
if($rw['status'] == 0){
$stsk = "Admin";
}
else{
$stsk = "Kepala Kantor";
}
?>
            <ul class="nav navbar-top-links navbar-right">
            <span style="margin-top:10px; font-size:16px;"><i class="fa fa-user fa-fw"></i>&nbsp;<?php echo ucwords($rw[1]); ?> &nbsp; &nbsp;<br />
            &nbsp; &nbsp;&nbsp; &nbsp;<i><?php echo $stsk; ?></i> &nbsp; &nbsp;</span>
              <!--
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo $basedx; ?>/viewdata/admin/"><i class="fa fa-user fa-fw"></i> View Admin</a>
                        </li>

                        <li class="divider"></li>
                        <li><a href="<?php echo $basedx; ?>/logout/"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                <!--</li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->


            <div class="navbar-default sidebar" role="navigation" style="margin-top:100px;">
            
                <div class="sidebar-nav navbar-collapse">
                
                    <ul class="nav" id="side-menu">
                       <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                               <img src="<?php echo $base; ?>/ivory_src/images/firefox3.png" style="width:220px; height:160px; float:left;"/>
                        
                            </div>
                            <!-- /input-group -->
                        </li>
                      <li>
                            <a href="<?php echo $basedx; ?>/viewdata/admin"><i class="fa fa-table fa-fw"></i> View Admin</a>
                        </li>
                        <li>
                            <a href="<?php echo $basedx; ?>/viewdata/kategori"><i class="fa fa-edit fa-fw"></i> View Kategori</a>
                        </li>
                        
                        <li>
                            <a href="<?php echo $basedx; ?>/viewdata/sub_kategori"><i class="fa fa-edit fa-fw"></i> View Sub Kategori</a>
                        </li>
                         <li>
                            <a href="<?php echo $basedx; ?>/dir_pass/sms_terkirim"><i class="fa fa-edit fa-fw"></i> View Sms Terkirim</a>
                        </li>
                        <li>
                            <a href="<?php echo $basedx; ?>/dir_pass/lokasi_pendonor"><i class="fa fa-edit fa-fw"></i> View Transaksi Darah </a>
                        </li>
                        <li>
                            <a href="<?php echo $basedx; ?>/logout"><i class="fa fa-edit fa-fw"></i> Logout </a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
           <?php
           $sg = $this->uri->segment(3);
							 $sgs = $this->uri->segment(2);
							 
							 
							 
							 if($sgs == 'sms_terkirim'){
							    include('modul/sent_items.php');
							 }
							 else if($sg == 'kategori'){
							   if($this->uri->segment(4) == 'tambah_kategori' || $this->uri->segment(4) == 'edit_kategori'){
							   
							  include('modul/kategori/form_kategori_new.php');
							  }
							  else{
							  include('modul/kategori/tbl_kategori.php');
							  }
							 }
							 else if($sg == 'sub_kategori'){
							   if($this->uri->segment(4) == 'tambah_sub_kategori' || $this->uri->segment(4) == 'edit_sub_kategori'){
							   
							  include('modul/sub_kategori/form_sub_kategori.php');
							  }
							  else{
							  include('modul/sub_kategori/tbl_sub_kategori.php');
							  }
							 }
							 else if($sg == 'pendonor'){
							   
							   if($this->uri->segment(4) == 'tambah_pendonor' || $this->uri->segment(4) == 'edit_pendonor'){
							   if($sess_status == "1"){
							     redirect('front/');
							   }
							  include('modul/pendonor/form_pendonor.php');
							  }
							  else{
							  include('modul/pendonor/tbl_pendonor.php');
							  }
							 }
							 else if($sg == 'lokasi_pendonor'){
							   if($this->uri->segment(4) == 'tambah_lokasi' || $this->uri->segment(4) == 'edit_lokasi'){
							   if($sess_status == "1"){
							     redirect('front/');
							   }
							  include('modul/trans_darah/trans_form.php');
							  }
							  else{
							  include('modul/trans_darah/tbl_trans_darah.php');
							  }
							 }
							 else if($sgs == 'trans_darah'){
							  include('modul/trans_darah/tbl_trans_darah.php');
							  include('modul/trans_darah/pendonor_darah_form.php');
							  include('modul/trans_darah/js_trans_darah.php');
							  include('modul/trans_darah/trans_darah_form.php'); ?> 
                              <script src="<?php echo $url; ?>bootstrap/js/trans_darah/trans_darah.js"></script>
							  <script src="<?php echo $url; ?>bootstrap/js/trans_darah/admin2.js"></script>
							  <?php
							 }
							 else if($sg == '' && $sgs != 'viewdata'){
							  include('modul/home.php');
							 }
							 else if($sg == 'admin'){
							  if($this->uri->segment(4) == 'tambah_admin' || $this->uri->segment(4) == 'edit_admin'){
							  include('modul/admin/form_admin_new.php');
							  }
							  else{
							  include('modul/admin/tbl_admin.php');
							  }
							 }
							 else if($sg == 'pendonor2'){
							  include('modul/tbl_suara_valid.php');
							 }
							 else if($sg == 'sms_terkirim'){
							  include('modul/items/sms_terkirim.php');
							 }
							 else if($sg == 'pendonor'){
							 include('modul/pendonor/tbl_pendonor2.php');
							 include('modul/pendonor/form_pendonor.php');
							 include('modul/pendonor/js_pendonor.php'); ?> 
                             <script src="<?php echo $url; ?>bootstrap/js/pengawas/admin2.js"></script>
							  <?php
							 }
							 else if($sg == 'history'){
							 include('modul/laporan/tbl_laporan.php');
							 }
							 
							 else if($sg == 'tps'){
							 include('modul/tps/tbl_tps.php');
							 include('modul/tps/form_tps.php');
							 include('modul/tps/js_tps.php'); ?> 
                             <script src="<?php echo $url; ?>bootstrap/js/tps/tps.js"></script><?php
							 }
							 else if($sg == 'suara'){
							 include('modul/tbl_suara.php');
							 }
							 ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo $base.'/bower_components/jquery/dist/jquery.min.js'; ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $base.'bower_components/bootstrap/dist/js/bootstrap.min.js'; ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo $base.'/bower_components/metisMenu/dist/metisMenu.min.js'; ?>"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo $base.'/bower_components/datatables/media/js/jquery.dataTables.min.js'; ?>"></script>
    <script src="<?php echo $base.'/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js' ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $base.'/dist/js/sb-admin-2.js' ?>"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
		
		jQuery("#btn_message").click(function(){
		
		});
		
		var url = "http://localhost/sewania/front/form_admin/";
		var base_url = "http://localhost/sewania/front/";
		var site_url = "http://localhost/sewania/";
		
		jQuery('#nama_input').keyup(function(){
			
			var vl = this.value.trim();
			
			if(vl.length == 0){
			jQuery('#t_holder_nama').hide();
			   return false;
			}
			
			
			    jQuery.ajax({
				   type:"POST",
				   data:"val="+this.value,
				   url:base_url+"/ambil_kategori",
				   success:function(data){
				   
				      if(data.trim() != ""){ 
					  jQuery('#t_holder_nama').show();
				      jQuery('#ul_holder_pendonor').html(data);
					  }
				   }
				});
			});
			
			//$('#myLightbox').lightbox(options)
			
			
			
                 var auto_refresh = setInterval(
                     function (){
                       // alert("tes");
					     jQuery.ajax({
						   url:base_url+'/kirim_sms/',
						   data:"",
						   success:function(data){
						  // alert(data);
						     if(parseInt(data) > 0){
						      //alert("sms terkirim");
							 }
						   }
						 });
						 
					 }, 10000);
					 
    });
    </script>

</body>

</html>

