<?php
$id = $_SESSION['id_ac_produk'];
$pt = mysql_fetch_array(mysql_query("select * from produk where id_produk = '$id'"));
$ex_ft = explode('$$@' , $pt['foto']);
?>
                <div class="panel-heading">
                  <h4 class="panel-title"> <a href="#collapseB1"  data-toggle="collapse"> My details </a> </h4>
                </div>
                <div class="panel-collapse collapse in" id="collapseB1">
                  <div class="panel-body">
                   <form class="form-horizontal" method="post" action="<?php echo base_url('front/update_produk_member'); ?>" enctype="multipart/form-data">
                  <fieldset>
                  <div id="div_first_step">
                    <!-- Select Basic -->
                    <div class="form-group">
                      <label class="col-md-3 control-label" >Category</label>
                      <div class="col-md-8">
                        <select name="category-group" id="s_teks_kategori" class="form-control">
                           <option value="" selected="selected"> Select a category... </option>
                        <?php
						   $sub = $pt['id_sub_kategori'];
						   $px = mysql_fetch_array(mysql_query("select * from sub_kategori where id_sub_kategori = '$sub'"));
						   foreach($qbarang as $hasil){
						   if($px[2] == $hasil->id_kategori){
						   ?>
                           <option value="<?php echo $hasil->id_kategori; ?>"  selected="selected"> - <?php echo $hasil->nama; ?> - </option>
                           <?php
						   }
						   else{
						   ?>
                           <option value="<?php echo $hasil->id_kategori; ?>"> - <?php echo $hasil->nama; ?> - </option>
                           <?php
						   }
						   }
						?>
                        </select>
                        
                      <span class="red" id="s_warn_kategori" style="display:none;"> Pilih setidaknya 1 kategori untuk dimasukkan ..  </span>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-md-3 control-label" >Sub Category</label>
                      <div class="col-md-8">
                        <select name="sub-category-group" id="s_sub_kat" class="form-control">
                           <?php
						   $subx = mysql_query("select * from sub_kategori where id_kategori = '$px[2]'");
						   while($rowx = mysql_fetch_array($subx)){
						   if($rowx[0] == $sub){
						   ?>
                           <option value="<?php echo $rowx[0]; ?>" selected="selected"><?php echo $rowx[1]; ?></option>
                           <?php
						   }
						   else{
						   ?>
                           <option value="<?php echo $rowx[0]; ?>"><?php echo $rowx[1]; ?></option>
                           <?php
						   }
						   }
						   ?>
                        </select>
                        
                      <span class="red" id="s_warn_sub_kategori" style="display:none;"> Pilih setidaknya 1 sub_kategori untuk dimasukkan ..  </span>
                      </div>
                    </div>
                    
                     <div class="form-group">
                      <label class="col-md-3 control-label" >Lokasi</label>
                      <div class="col-md-8">
                      
                       <input id="pac-input" class="form-control" type="text" placeholder="Search Box" style="float:left;"> &nbsp; <img src="<?php echo base_url('assets/img/loc.png'); ?>" style="width:24px; height:24px; margin-top:10px;" id="btn_current_loc" /> <br clear="all" />
                       <p></p>
                       </div>
                       <div class="col-md-10" style="float:right;">
    <div id="map" ></div>
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
  

  // Create the search box and link it to the UI element.
  var input = document.getElementById('pac-input');
  var searchBox = new google.maps.places.SearchBox(input);
  //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  // Bias the SearchBox results towards current map's viewport.
  map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
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
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      markers.push(new google.maps.Marker({
        map: map,
        icon: icon,
        title: place.name,
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
                        
                      <span class="red" id="s_warn_kategori" style="display:none;"> Pilih setidaknya 1 kategori untuk dimasukkan ..  </span>
                      </div>
                    </div>
                    
                    <!-- Multiple Radios (inline) -->
                    
                    
                    
                    <div class="form-group">
                      <label class="col-md-3 control-label" >Provinsi</label>
                      <div class="col-md-8">
                          <select name="cmb_provinsi" class="form-control">
						  <?php
						  foreach($qprovinsi as $hasil){
						  ?>
                          <option value="<?php echo $hasil->id_lokasi; ?>"><?php echo $hasil->nama_lokasi; ?></option>
                          <?php
						  }
						  ?></select>
                      </div>
                    </div>
                    
                     <div class="form-group">
                      <label class="col-md-3 control-label" >Kota</label>
                      <div class="col-md-8">
                          <select name="cmb_kota" class="form-control">
                          <?php
						  foreach($qkota as $hasil){
						  ?>
                          <option value="<?php echo $hasil->id_kota; ?>"><?php echo $hasil->nama_kota; ?></option>
                          <?php
						  }
						  ?>
                          </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-md-3 control-label" >Add Type</label>
                      <div class="col-md-8">
                        <label class="radio-inline" for="radios-0">
                          <input name="radios" id="radios-0" value="Private" checked="checked" type="radio">
                          Private </label>
                        <label class="radio-inline" for="radios-1">
                          <input name="radios" id="radios-1" value="Business" type="radio">
                          Business </label>
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="Adtitle">Ad title</label>
                      <div class="col-md-8">
                        <input id="s_teks_title" name="Adtitle" placeholder="Ad title" class="form-control input-md" required="" type="text" value="<?php echo $pt['nama_produk']; ?>">
                        <input id="t_id_ac_produk" name="t_id_ac_produk"  class="form-control input-md" required="" value="<?php echo $_SESSION['id_ac_produk']; ?>" type="text" style="display:none;" />
                        <input id="s_longitude" name="s_longitude"  class="form-control input-md" required="" value="<?php echo $pt['longitude']; ?>" type="text" style="display:none;" />
                        <input id="s_latitude" name="s_latitude"  class="form-control input-md" required="" value="<?php echo $pt['latitude']; ?>" type="text" style="display:none;" />
                    <span class="red" id="s_warn_title" style="display:none;">Field title harus diisi ..  </span>
                        <span class="help-block">A great title needs at least 60 characters. </span>
                         </div>
                        
                    </div>
                    
                    <!-- Textarea -->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="textarea">Describe ad </label>
                      <div class="col-md-8">
                        <textarea class="form-control" id="s_teks_deskripsi" name="t_describe" placeholder="Describe what makes your ad unique"><?php echo $pt['deskripsi']; ?></textarea>
                        <span class="red" id="s_warn_desc" style="display:none;">Field Deskripsi harus diisi ..  </span>
                      </div>
                    </div>
                    
                    <!-- Prepended text-->
                    
                    <div class="form-group">
                    
                      <label class="col-md-3 control-label" for="Price">Price</label>
                      <div class="col-md-4">
                        <div class="input-group"> <span class="input-group-addon">$</span>
                        
                          <input id="s_teks_Price" name="Price" class="form-control" placeholder="placeholder" required="" type="text" value="<?php echo $pt['harga']; ?>">
                          
                        </div>
                        
                        
                    <span class="red" id="s_warn_harga" style="display:none;"> Field Harga Harus diisi ..  </span>
                      </div>
                      <div class="col-md-4">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="chk_harga" value="y">
                            Negotiable </label>
                        </div>
                      </div>
                    </div>
                    
                     <div class="form-group">
                      <label class="col-md-3 control-label" >Foto</label>
                      <div class="col-md-8">
                        <?php
						$tt = 0;
						  foreach($ex_ft as $val){
						?>
                        <input type="checkbox" name="chk_img1" style="float:left;" onchange="if(this.checked == true){ jQuery('.mb10<?php echo $tt ?>').show(); } else { jQuery('.mb10<?php echo $tt ?>').hide(); }" /><img src="<?php echo base_url('ivory_src/upload/product/thumb/small_'.$ex_ft[$tt]); ?>" style="float:left; margin-right:20px;" id="img_prod<?php echo $tt; ?>" title="<?php echo $pt[1]; ?>" alt="<?php echo $pt[1]; ?>"  /> 
                        <?php
						$tt++;
						}
						?>
                         <br clear="all" /> *) <i> Centang gambar yang akan di rubah ... </i>
                      </div>
                     </div>
                    
                    <!-- photo -->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="textarea"> Picture </label>
                      <div class="col-md-8">
                      <?php
					  $hit = count($ex_ft);
					  for($j = 0; $j < 5; $j++){
					  if($j < $hit){
					  ?>
                        <div class="mb10<?php echo $j ?>" style="display:none;">
                          <input  name="f_upload<?php echo $j; ?>" type="file" id="f_upload<?php echo $j; ?>" class="file" data-preview-file-type="text"  />
                        </div>
                      <?php
					  }
					  else{
					  ?>
                        <div class="mb10<?php echo $tt ?>">
                          <input  name="f_upload<?php echo $j; ?>" id="f_upload<?php echo $j; ?>" type="file" class="file" data-preview-file-type="text"= />
                        </div>
                      <?php
					  }
					  
					  }
					  ?>
                       
                        <p class="help-block">Add up to 5 photos. Use a real image of your product, not catalogs.</p>
                        
                        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15777.995465477094!2d115.2191478!3d-8.6440118!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1452405220560" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                        
                       
                      </div>
                      
                       <!-- Textarea -->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="textarea"></label>
                      <div class="col-md-8">
                       <input type="submit" name="submit" value="Register" class="btn btn-primary" />
                      </div>
                    </div>
                      
                  
                       
                    </form>
                  </div>
                </div>
              </div>
              </div>