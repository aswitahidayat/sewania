<!DOCTYPE html>
<html>

  <head>
    <link rel="stylesheet" href="ivory_src/assets/promo-style.css" />

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
  if($this->uri->segment(2) == 'post_ad' || $this->uri->segment(2) == 'account_member'){
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

<script type="text/javascript">

  function pop_up_kategori(nama , id_head , isi , title){
     jQuery(nama).html(jQuery(isi).html()); jQuery(id_head).html(title);
  }
</script>

<script src="<?php echo base_url('ivory_src/source/assets/js/pace.min.js'); ?>"></script>
<?php
  include('config/style_map.php');
?>

<script src="<?php echo base_url('ivory_src/bootstrap/js/jquery-10-min.js'); ?>"> </script>
<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"> </script-->
<script src="<?php echo base_url('ivory_src/js/js_exec.js'); ?>"></script>

<script src="<?php echo base_url('ivory_src/source/assets/plugins/bxslider/jquery.bxslider.min.js'); ?>"></script>

<script src="<?php echo base_url('ivory_src/source/assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('ivory_src/js/ajax_session.js'); ?>"></script>
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
          <span class="logo-icon"><img src="<?php echo base_url('ivory_src/bottom_icon/logo.png'); ?>" style="width:50px; height:50px; float:left; margin-right:10px;" /><!--<i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span> BOOT<span>CLASSIFIED </span> </a> -->  <div style="margin-top:8px; float:left;"><b>Sewa</b><span>nia</span></div> </span></div>
        </a>
        <!--/.nav-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>

  <div class="col-md-6">
    <div class="main-container">
    <section id="image-slider-container">
      <div class="image-slider-inner">
        <div id="image-area">
          <div class="img-area-wrapper">
            <img src="ivory_src/images/promo1.jpg" class="actual-img" />
          </div>
        </div>
        <div id="image-area2">
          <div class="img-area-wrapper">
            <img src="ivory_src/images/promo2.jpg" class="actual-img" />
          </div>
        </div>
        <div id="image-area3">
          <div class="img-area-wrapper">
            <img src="ivory_src/images/promo3.jpg" class="actual-img" />
          </div>
        </div>
        <div class="slider-buttons">
          <div class="slider-buttons-container">
            <a href="image-area" class="o-links"></a>
            <a href="image-area2" class="o-links"></a>
            <a href="image-area3" class="o-links"></a>
          </div>
        </div>
      </div>
    </section>
    </div>
    </div>

    <div class="col-md-6">
      <div class="main-container">
      <div class="inner-box">
        <b>DAFTAR SEBAGAI PENYEDIA JASA SEWA DI SEWANIA DAN DAPATKAN VOUCHER BELANJA DI INDOMART</b><br>
        <span class="gratis">
          GRATIS!
        </span>
        <form class="form-horizontal" method="post" action="<?php echo base_url('front/member_reg'); ?>">
          <div class="form-group ">
            <div class="col-sm-6">
              <label>Nama Depan</label>
              <input  name="t_firstname" placeholder="First Name" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-sm-6">
              <label>Nama Belakang</label>
              <input  name="t_lastname" placeholder="Last Name" class="form-control input-md" type="text">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <label>Email</label>
              <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="t_email">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <label>No Telp</label>
              <input  name="t_phone" placeholder="Phone Number" class="form-control input-md" type="text">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12"><label>Kategori Jasa Sewa</label></div>
            <div class="col-sm-6">
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                  Professional </label>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                  Individual </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <div class="termbox mb10">
                <label class="checkbox-inline" for="checkboxes-1">
                  <input name="t_cond" id="checkboxes-1" value="1" type="checkbox">
                  I have read and agree to the <a href="terms-conditions.html">Terms & Conditions</a> </label>
              </div>
              <div style="clear:both"></div>
              <input type="submit" name="submit" value="Register" class="btn btn-primary" />
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    	$(document).ready(function() {

        //loads default content
        //$('#image-area').load($('.menu_top a:first-child').attr('href'));

        $('.o-links').click(function() {

          // href has to be the id of the hidden content element
          var href = $(this).attr('href');
            $('#image-area').fadeOut(1000, function() {
                $(this).html($('#' + href).html()).fadeIn(1000);
            });
          return false;
        });

      });

      $(function() {
          $('.o-links').click(function(e) {

              //e.preventDefault();

              $('.o-links').not(this).removeClass('O_Nav_Current');
              $(this).addClass('O_Nav_Current');
          });
      });
    </script>
  </body>

</html>
