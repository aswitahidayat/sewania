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
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('assets/ico/apple-touch-icon-144-precomposed.png'); ?>">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('assets/ico/apple-touch-icon-114-precomposed.png'); ?>">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('assets/ico/apple-touch-icon-72-precomposed.png'); ?>">
<link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/ico/apple-touch-icon-57-precomposed.png'); ?>">
<link rel="shortcut icon" href="<?php echo base_url('assets/ico/favicon.png'); ?>">
<title>BOOTCLASIFIED - Responsive Classified Theme</title>
<!-- Bootstrap core CSS -->
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

<?php
  if($this->uri->segment(2) == 'post_ad' || $this->uri->segment(2) == 'account_member'){
?>
<link href="<?php echo base_url('assets/css/fileinput.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />
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

<script src="<?php echo base_url('assets/js/pace.min.js'); ?>"></script>
<?php
  include('config/style_map.php');
?>

<script src="<?php echo base_url('assets/js/jquery-10-min.js'); ?>"> </script>
<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"> </script-->
<script src="<?php echo base_url('assets/js/js_exec.js'); ?>"></script>

<script src="<?php echo base_url('assets/plugins/bxslider/jquery.bxslider.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/ajax_session.js'); ?>"></script>
<!-- include carousel slider plugin  -->
<script src="<?php echo base_url('assets/js/owl.carousel.min.js'); ?>"></script>

<!-- include equal height plugin  -->
<script src="<?php echo base_url('assets/js/jquery.matchHeight-min.js'); ?>"></script>

<!-- include jquery list shorting plugin plugin  -->
<script src="<?php echo base_url('assets/js/hideMaxListItem.js'); ?>"></script>

<!-- include jquery.fs plugin for custom scroller and selecter  -->
<script src="<?php echo base_url('assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js'); ?>"></script>


<!-- include custom script for site  -->
<script src="<?php echo base_url('assets/js/script.js'); ?>"></script>

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

  <?php include('header.php'); ?>

  <?php
   $sg = $this->uri->segment(3);
   $sgx = $this->uri->segment(2);

   if($sgx == ""){

      ?><div id="map" style="display:none;"></div><?php

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

   include('footer.php');
  ?>

  <!-- /.footer -->
</div>
<!-- /.wrapper -->

<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->

<script type="text/javascript">
  var base = "<?php echo base_url(); ?>";
</script>


<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>

<?php
  if($sgx == "post_ad" || $sgx == "account_member"){
?>
<!-- include jquery file upload plugin  -->
<script src="<?php echo base_url('assets/js/fileinput.min.js'); ?>" type="text/javascript"></script>
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
