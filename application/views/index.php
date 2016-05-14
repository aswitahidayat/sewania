<?php
  session_start();
  include('config/validasi.php');
  function format_rupiah($angka){
    $rupiah=number_format($angka,0,',','.');
    return $rupiah;
  }
  //session_destroy();
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
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

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

<script>
// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.

var map;
function initAutocomplete() {
  map = new google.maps.Map(document.getElementById('map'), {
   // center: {lat: -33.8688, lng: 151.2195},
  center: {lat: -0.789275, lng: 113.921327},
    zoom: 6,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  
  var idx_post = "<?php echo $this->uri->segment(2); ?>";

  // Create the search box and link it to the UI element.
  if(idx_post == "post_ad"){
  var input = document.getElementById('pac-input');
  }
  else{
  var input = document.getElementById('autocomplete-ajax');   
  }

  var searchBox = new google.maps.places.SearchBox(input);

  // Bias the SearchBox results towards current map's viewport.
  map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
    searchBox2.setBounds(map.getBounds());
  });

  var markers = [];
  // [START region_getplaces]
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach(function(marker) {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {
      var icon = {
        url: place.icon,
        draggable: true,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      markers.push(new google.maps.Marker({
        map: map,
        title: place.name,
        draggable: true,
        position: place.geometry.location
      }));
      
   // alert(place.geometry.location);
    var sp = place.geometry.location.toString();
    var spx = sp.split(',');
    var lat = spx[0].replace('(' , '');
    var long = spx[1].replace(')' , '');
    //alert('Latitude : ' + lat + ' Long ' + long);
    jQuery("#s_latitude").val(lat);
    jQuery("#s_longitude").val(long);
      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });
  // [END region_getplaces]
}


    </script>

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCk-C5KEGJUHpasGpXsEsp6ei04K0L7FnA&libraries=places&callback=initAutocomplete"
         async defer></script>

<!-- include jquery autocomplete plugin  -->

</head>
<body>

<div id="wrapper" >

  <div class="header">
    <nav class="navbar   navbar-site navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a href="<?php echo base_url('front/'); ?>" class="navbar-brand logo logo-title">
          <!-- Original Logo will be placed here  -->
          <span class="logo-icon"><img src="<?php echo base_url('ivory_src/bottom_icon/logo.png'); ?>" style="width:50px; height:50px; float:left; margin-right:10px;" /><!--<i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span> BOOT<span>CLASSIFIED </span> </a> -->  <div style="margin-top:8px; float:left;"><b>Sewa</b><span>nia</span></div> </span></div>
        <div class="navbar-collapse collapse">

          <?php
            if($_SESSION['login'] == false){
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
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span><?php echo $nama; ?></span> <i class="icon-user fa"></i> <i class=" icon-down-open-big fa" onClick="if(itm == 0){ jQuery('#drop_menu').show();  itm = 1; }else{ jQuery('#drop_menu').hide(); itm = 0; }"></i></a>
              <ul class="dropdown-menu user-menu" id="drop_menu">
                <li class="active"><a href="<?php echo base_url('front/account_member/home'); ?>"><i class="icon-home"></i> Personal Home </a></li>

                <li><a href="<?php echo base_url('front/account_member/member_ads'); ?>"><i class="icon-th-thumb"></i> My ads </a></li>
                <li><a href="account-favourite-ads.html"><i class="icon-heart"></i> Favourite ads </a></li>
                <li><a href="account-saved-search.html"><i class="icon-star-circled"></i> Saved search </a></li>
                <li><a href="account-archived-ads.html"><i class="icon-folder-close"></i> Archived ads </a></li>
                <li><a href="account-pending-approval-ads.html"><i class="icon-hourglass"></i> Pending approval </a></li>
                <li><a href="statements.html"><i class=" icon-money "></i> Payment history </a></li>
              </ul>
            </li>
            <li class="postadd"><a class="btn btn-block   btn-border btn-post btn-danger" href="<?php echo base_url('front/post_ad'); ?>">Tambahkan Iklan</a></li>
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

  <div id="map" style="display:none;"></div>

  <?php
   $sg = $this->uri->segment(3);
   $sgx = $this->uri->segment(2);

   if($sgx == ""){
      include('halaman/home.php');
   }

   elseif($sgx == "category"){
      include('halaman/category.php');
   }

   elseif($sgx == "ads_detail"){
      include('halaman/ads_detail.php');
   }

   elseif($sgx == "post_ad"){
      include('halaman/post_ad.php');
   }

   elseif($sgx == "signup"){
      include('halaman/sign_up.php');
   }

   elseif($sgx == "member_login"){
      include('halaman/login.php');
   }

   elseif($sgx == "forgot_password"){
      include('halaman/forgot_password.php');
   }

   elseif($sgx == "account_member"){
      include('halaman/account_home.php');
   }

   elseif($sgx == "member_produk"){
      include('halaman/member_produk.php');
   }
   else{
    include('halaman/member_produk.php');
   }

  ?>

  <div class="footer" id="footer">
    <div class="container">
      <ul class=" pull-left navbar-link footer-nav">
        <li><a href="index.html"> Home </a> <a href="about-us.html"> About us </a> <a href="#"> Terms and Conditions </a> <a href="#"> Privacy Policy </a> <a href="contact.html"> Contact us </a> <a href="faq.html"> FAQ </a>
      </ul>
      <ul class=" pull-right navbar-link footer-nav">
        <li> &copy; 2015 Sewania </li>
      </ul>
    </div>

  </div>
  <!-- /.footer -->
</div>
<!-- /.wrapper -->

<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->

<script type="text/javascript">
  var base = "<?php echo base_url(); ?>";
</script>


<!--<script type="text/javascript" src="<?php echo base_url('ivory_src/source/assets/plugins/autocomplete/jquery.mockjax.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('ivory_src/source/assets/plugins/autocomplete/jquery.autocomplete.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('ivory_src/source/assets/plugins/autocomplete/usastates.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('ivory_src/source/assets/plugins/autocomplete/autocomplete-demo.js'); ?>"></script>
-->

<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>

<script type="text/javascript">
  jQuery(document).ready(function(){
    $('.bxslider').bxSlider({
      pagerCustom: '#bx-pager'
    });

    jQuery('#btn_cari_produk').click(function(){
      var sr = jQuery("#frm_search_produk").serialize();
      alert(sr);
      jQuery.ajax({
        type:"POST",
        url:base+"session/s_prod_sr/",
        data:sr,
        success:function(data){
          window.location=base+data;
        }
      });
      return false;
    })

    jQuery('.sub_div_kat').click(function(){
      var id=this.id.split('_');
      jQuery.ajax({
        type:"POST",
        data:"id="+id[2],
        url:base+"session/s_prod/",
        success:function(data){
          //alert(data);
          window.location=base+"front/ads_detail/"+data;
        }
      });
    });

    jQuery('.sub_div_kat2').click(function(){
      var id=this.id.split('_');
      jQuery.ajax({
        type:"POST",
        data:"id="+id[2],
        url:base+"session/s_prod/",
        success:function(data){
          //alert(data);
          window.location=base+"front/ads_detail/"+data;
        }
      });
    });

    jQuery('#btn_current_loc').click(function(){
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
          alert(position.coords.latitude + ", " + position.coords.longitude);
          var myLatLng = {lat: position.coords.latitude, lng: position.coords.longitude};

          jQuery("#pac-input").val("My Location");
          jQuery("#s_latitude").val(position.coords.latitude);
          jQuery("#s_longitude").val(position.coords.longitude);

          var markers = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
          });
          map.panTo(myLatLng);
        });
      }
    });

    jQuery('#button1id').click(function(){
      var salah = 0;
      var price = jQuery('#s_teks_Price').val();
      var desc = jQuery('#s_teks_deskripsi').val();
      var title = jQuery('#s_teks_title').val();
      var kategori = jQuery('#s_teks_kategori').val();

      if(price != "" && desc != "" && title != "" && kategori != ""){
        salah = 0;
      } else {
        salah = 1;
        if(price == ""){
          jQuery('#s_warn_harga').show();
        } else {
          jQuery('#s_warn_harga').hide();
        }
        if(desc == ""){
          jQuery('#s_warn_desc').show();
        }else{
         jQuery('#s_warn_desc').hide();
        }
        if(title == ""){
          jQuery('#s_warn_title').show();
        }else{
          jQuery('#s_warn_title').hide();
        }

        if(kategori == ""){
          jQuery('#s_warn_kategori').show();
        }else{
          jQuery('#s_warn_kategori').hide();
        }
      }

      if(salah == 0){
        jQuery('#div_first_step').slideUp('slow');
        jQuery('#div_step_next').slideDown('slow');
      }
    });

    $('.prodxx').click(function(){
      var id=this.id.split('_');
      jQuery.ajax({
        type:"POST",
        data:"id="+id[2],
        url:base+"session/s_prod/",
        success:function(data){
          //alert(data);
          window.location=base+"front/ads_detail/"+data;
        }
      });
    });

    $('.t_customer_name').click(function(){
      var id=this.id.split('_');
      alert(id[3]);
      jQuery.ajax({
        type:"POST",
        data:"id="+id[3],
        url:base+"session/s_member_produk/",
        success:function(data){
          //alert(data);
          window.location=base+"front/member_produk/"+data;
        }
      });
    });

   jQuery('#btn_submit_message').click(function(){
     var nama = jQuery("#recipient-name").val();
     var email = jQuery("#sender-email").val();
     var phone = jQuery("#recipient-Phone-Number").val();
     var teks = jQuery("#message-text").val();

     jQuery('#sp_loading_koment').show();

     jQuery.ajax({
       type:"POST",
       url:base+"front/add_comment/",
       data:"nama="+nama+"&email="+email+"&phone="+phone+"&teks="+teks,
       success:function(data){
         jQuery("#recipient-name").val('');
         jQuery("#sender-email").val('');
         jQuery("#recipient-Phone-Number").val('');
         jQuery("#message-text").val('');
         jQuery('#sp_loading_koment').hide();
       }
     });
   });
 });

</script>
<?php
  if($sgx == "post_ad" || $sgx == "account_member"){
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



</body>
</html>
