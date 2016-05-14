<?php
error_reporting(0);

if($_SESSION['login'] == true){
   $user = mysql_fetch_array(mysql_query("select * from member where token_id = '$_SESSION[token_id]'"));
   $nama = $user['first_name'];
   $last = $user['last_name'];
   $email = $user['email'];
   $phone = $user['phone'];
   $about = $user['about_you'];
   $type = $user['type'];
   
   if($user['gender'] == 'L'){
   $kelamin = "Laki - Laki";
   }
   else{
   $kelamin = "Perempuan";
   }
   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('ivory_src/source/assets/ico/apple-touch-icon-144-precomposed.png'); ?>">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('ivory_src/source/assets/ico/apple-touch-icon-114-precomposed.png'); ?>">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('ivory_src/source/assets/ico/apple-touch-icon-72-precomposed.png'); ?>">
<link rel="apple-touch-icon-precomposed" href="<?php echo base_url('ivory_src/source/ico/apple-touch-icon-57-precomposed.png'); ?>">
<link rel="shortcut icon" href="<?php echo base_url('ivory_src/source/assets/ico/favicon.png'); ?>">
<title>BOOTCLASIFIED - Responsive Classified Theme</title>
<!-- Bootstrap core CSS -->
<link href="<?php echo base_url('ivory_src/source/assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="<?php echo base_url('ivory_src/source/assets/css/style.css'); ?>" rel="stylesheet">

<!-- styles needed for carousel slider -->
<link href="<?php echo base_url('ivory_src/source/assets/css/owl.carousel.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('ivory_src/source/assets/css/owl.theme.css'); ?>" rel="stylesheet">

<link href="<?php echo base_url('ivory_src/source/assets/plugins/bxslider/jquery.bxslider.css'); ?>" rel="stylesheet" />

<?php
if($this->uri->segment(2) == 'post_ad'){
?>
<link href="<?php echo base_url('ivory_src/source/assets/css/fileinput.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />
<?php
}
?>

<!-- Just for debugging purposes. -->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<!-- include pace script for automatic web page progress bar  -->

<script>
    paceOptions = {
      elements: true
    };
	
	var itm = 0;
	var ctab1 = 0;
	var ctab2 = 0;
	var ctab3 = 0;
</script>
<script src="<?php echo base_url('ivory_src/source/assets/js/pace.min.js'); ?>"></script>

</head>
<body>
  
<div id="wrapper">

  <div class="header">
    <nav class="navbar   navbar-site navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a href="<?php echo base_url('front/'); ?>" class="navbar-brand logo logo-title"> 
          <!-- Original Logo will be placed here  --> 
          <span class="logo-icon"><i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span> BOOT<span>CLASSIFIED </span> </a> </div>
        <div class="navbar-collapse collapse">
          
          <?php
		   if($_SESSION['login']  == false){
		   ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url('front/member_login'); ?>"><?php echo $_SESSION['token_id']; ?>Login</a></li>
            <li><a href="<?php echo base_url('front/signup'); ?>">Signup</a></li>
            <li class="postadd"><a class="btn btn-block   btn-border btn-post btn-danger" href="<?php echo base_url('front/post_ad'); ?>">Post Free Add</a></li>
          </ul>
          <?php
		  }
		  else{
		  ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Signout <i class="glyphicon glyphicon-off"></i> </a></li>
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span><?php echo $nama; ?></span> <i class="icon-user fa"></i> <i class=" icon-down-open-big fa" onclick="if(itm == 0){ jQuery('#drop_menu').show();  itm = 1; }else{ jQuery('#drop_menu').hide(); itm = 0; }"></i></a>
              <ul class="dropdown-menu user-menu" id="drop_menu">
                <li class="active"><a href="<?php echo base_url('front/account_member'); ?>"><i class="icon-home"></i> Personal Home </a></li>
                
                <li><a href="<?php echo base_url('front/account_member'); ?>"><i class="icon-th-thumb"></i> My ads </a></li>
                <li><a href="../../application/views/account-favourite-ads.html"><i class="icon-heart"></i> Favourite ads </a></li>
                <li><a href="../../application/views/account-saved-search.html"><i class="icon-star-circled"></i> Saved search </a></li>
                <li><a href="../../application/views/account-archived-ads.html"><i class="icon-folder-close"></i> Archived ads </a></li>
                <li><a href="../../application/views/account-pending-approval-ads.html"><i class="icon-hourglass"></i> Pending approval </a></li>
                <li><a href="../../application/views/statements.html"><i class=" icon-money "></i> Payment history </a></li>
              </ul>
            </li>
            <li class="postadd"><a class="btn btn-block   btn-border btn-post btn-danger" href="../../application/views/post-ads.html">Post Free Add</a></li>
          </ul>
          <?php
		  }
          ?>         
           
        </div>
        <!--/.nav-collapse --> 
      </div>
      <!-- /.container-fluid --> 
    </nav>
  </div>
  <!-- /.header -->
  
  <?php
   $sg = $this->uri->segment(3);
   $sgx = $this->uri->segment(2);
   
   if($sgx == ""){
      include('halaman/home.php');
   }
   
   else if($sgx == "category"){
      include('halaman/category.php');
   }
   
   else if($sgx == "ads_detail"){
      include('halaman/ads_detail.php');
   }
   
   else if($sgx == "post_ad"){
      include('halaman/post_ad.php');
   }
   
   else if($sgx == "signup"){
      include('halaman/sign_up.php');
   }
   
   else if($sgx == "member_login"){
      include('halaman/login.php');
   }
   
   else if($sgx == "forgot_password"){
      include('halaman/forgot_password.php');
   }
   
   else if($sgx == "account_member"){
      include('halaman/account_home.php');
   }
   
  ?>
 
 
  
  
  
  <div class="footer" id="footer">
    <div class="container">
      <ul class=" pull-left navbar-link footer-nav">
        <li><a href="../../application/views/index.html"> Home </a> <a href="../../application/views/about-us.html"> About us </a> <a href="#"> Terms and Conditions </a> <a href="#"> Privacy Policy </a> <a href="../../application/views/contact.html"> Contact us </a> <a href="../../application/views/faq.html"> FAQ </a>
      </ul>
      <ul class=" pull-right navbar-link footer-nav">
        <li> &copy; 2015 BootClassified </li>
      </ul>
    </div>
    
  </div>
  <!-- /.footer --> 
</div>
<!-- /.wrapper --> 

<!-- Le javascript
================================================== --> 

<!-- Placed at the end of the document so the pages load faster --> 
 
<script src="<?php echo base_url('ivory_src/source/jquery-min.js'); ?>"> </script> 


<script src="<?php echo base_url('ivory_src/source/assets/plugins/bxslider/jquery.bxslider.min.js'); ?>"></script> 
<script>
$('.bxslider').bxSlider({
  pagerCustom: '#bx-pager'
});
</script>
<?php
if($sgx == "post_ad"){
?>
<!-- include jquery file upload plugin  --> 
<script src="<?php echo base_url('ivory_src/source/assets/js/fileinput.min.js'); ?>" type="text/javascript"></script> 
<script>
// initialize with defaults
$("#input-upload-img1").fileinput();
$("#input-upload-img2").fileinput();
$("#input-upload-img3").fileinput();
$("#input-upload-img4").fileinput();
$("#input-upload-img5").fileinput();


</script> 
<?php
}
?>
<script src="<?php echo base_url('ivory_src/source/assets/bootstrap/js/bootstrap.min.js'); ?>"></script> 

<!-- include carousel slider plugin  --> 
<script src="<?php echo base_url('ivory_src/source/assets/js/owl.carousel.min.js'); ?>"></script> 

<!-- include equal height plugin  --> 
<script src="<?php echo base_url('ivory_src/source/assets/js/jquery.matchHeight-min.js'); ?>"></script> 

<!-- include jquery list shorting plugin plugin  --> 
<script src="<?php echo base_url('ivory_src/source/assets/js/hideMaxListItem.js'); ?>"></script> 

<!-- include jquery.fs plugin for custom scroller and selecter  --> 
<script src="<?php echo base_url('ivory_src/source/assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js'); ?>"></script>
<script src="<?php echo base_url('ivory_src/source/assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js'); ?>"></script>


<!-- include custom script for site  --> 
<script src="<?php echo base_url('ivory_src/source/assets/js/script.js'); ?>"></script>

<!-- include jquery autocomplete plugin  -->

<script type="text/javascript" src="<?php echo base_url('ivory_src/source/assets/plugins/autocomplete/jquery.mockjax.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('ivory_src/source/assets/plugins/autocomplete/jquery.autocomplete.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('ivory_src/source/assets/plugins/autocomplete/usastates.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('ivory_src/source/assets/plugins/autocomplete/autocomplete-demo.js'); ?>"></script>



</body>
</html>
