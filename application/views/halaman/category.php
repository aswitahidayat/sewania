<div class="search-row-wrapper">
    <div class="container ">
      <form action="#" method="POST" id="frm_search_produk">
        <div class="col-sm-3">
          <input class="form-control keyword" type="text" name="t_name_produk" placeholder="e.g. Mobile Sale">
        </div>
        <div class="col-sm-3">
        <?php
		$fx = mysql_fetch_array(mysql_query("select * from sub_kategori where id_sub_kategori = '$_SESSION[kat_produk]'"));
		$ff=mysql_fetch_array(mysql_query("select * from kategori where id_kategori = '$fx[2]'"))
		?>
          <select class="form-control selecter" name="category" id="search-category" >
            <option value="">Semua <?php echo $ff[1]; ?></option>
           <!-- <option value="Vehicles" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> - Vehicles - </option>
            <option value="Cars"> Cars </option>
            <option value="Commercial vehicles"> Commercial vehicles </option>
            <option value="Motorcycles"> Motorcycles </option>
            <option value="Motorcycle Equipment"> Car &amp; Motorcycle Equipment </option>
            <option value="Boats"> Boats </option>
            <option value="Vehicles"> Other Vehicles </option>
            <option value="House" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> - House and Children - </option>
            <option value="Appliances"> Appliances </option>
            <option value="Inside"> Inside </option>
            <option value="Games"> Games and Clothing </option>
            <option value="Garden"> Garden </option>
            <option value="Multimedia" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> - Multimedia - </option>
            <option value="Telephony"> Telephony </option>
            <option value="Image"> Image and sound </option>
            <option value="Computers"> Computers and Accessories </option>
            <option value="Video"> Video games and consoles </option>
            <option value="Real" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> - Real Estate - </option>
            <option value="Apartment"> Apartment </option>
            <option value="Home"> Home </option>
            <option value="Vacation"> Vacation Rentals </option>
            <option value="Commercial"> Commercial offices and local </option>
            <option value="Grounds"> Grounds </option>
            <option value="Houseshares"> Houseshares </option>
            <option value="Other real estate"> Other real estate </option>
            <option value="Services" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> - Services - </option>
            <option value="Jobs"> Jobs </option>
            <option value="Job application"> Job application </option>
            <option value="Services"> Services </option>
            <option value="Price"> Price </option>
            <option value="Business"> Business and goodwill </option>
            <option value="Professional"> Professional equipment </option>
            <option value="dropoff" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> - Extra - </option>
            <option value="Other"> Other </option> -->
            
            <?php
			
			$fx = mysql_query("select * from kategori");
			//while($px = mysql_fetch_array($fx)){
			?>
            <!--<option value="<?php echo $px[0]; ?>" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> - <?php echo $px[1]; ?> - </option>-->
            <?php
			$pp = mysql_query("select * from sub_kategori where id_kategori = '$ff[0]'");
			while($rx = mysql_fetch_array($pp)){
			if($_SESSION[kat_produk]==$rx['id_sub_kategori']){
			?>
            <option value="<?php echo $rx[0]; ?>" selected="selected"> <?php echo $rx[1]; ?> </option>
            <?php
			}
			else{
			?>
            <option value="<?php echo $rx[0]; ?>"> <?php echo $rx[1]; ?> </option>
            <?php
			}
			}
			//}
			
			?>
          </select>
        </div>
        <div class="col-sm-3">
          <select class="form-control selecter" name="location" id="id-location">
            <option selected="selected" value="">All Locations</option>
            <?php
			$pl=mysql_query("select * from lokasi");
			while($row=mysql_fetch_array($pl)){
			?>
            <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
            <?php
			}
			?>
          </select>
        </div>
        <div class="col-sm-3">
          <button class="btn btn-block btn-primary" type="submit" id="btn_cari_produk"> <i class="fa fa-search"></i> </button>
        </div>
      </form>
    </div>
  </div>
  <!-- /.search-row -->
  <div class="main-container" style="width:80%; margin-right:auto; margin-left:auto;">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 page-sidebar">
          <aside>
            <div class="inner-box">
              <div class="categories-list  list-filter">
                <h5 class="list-title"><strong><a href="#">All Categories2</a></strong></h5>
                <ul class=" list-unstyled">
                <?php
				    $qr=mysql_query("select * from kategori");
					while($rw=mysql_fetch_array($qr)){
					$jml=mysql_num_rows(mysql_query("select produk.* , kategori.* , sub_kategori.* from produk inner join sub_kategori on produk.id_sub_kategori = sub_kategori.id_sub_kategori inner join kategori on kategori.id_kategori=sub_kategori.id_kategori where kategori.id_kategori = '$rw[0]'"));
				?>
                  <li><a href="sub-category-sub-location.html"><span class="title"><?php echo $rw[1]; ?></span><span class="count">&nbsp;<?php echo $jml; ?></span></a> </li>
                  <?php
				  }
				  ?>
                  <!--
                  <li><a href="sub-category-sub-location.html"><span class="title">Automobiles </span><span class="count">&nbsp;123</span></a> </li>
                  <li><a href="sub-category-sub-location.html"><span class="title">Property </span><span class="count">&nbsp;742</span></a> </li>
                  <li><a href="sub-category-sub-location.html"><span class="title">Services </span><span class="count">&nbsp;8525</span></a> </li>
                  <li><a href="sub-category-sub-location.html"><span class="title">For Sale </span><span class="count">&nbsp;357</span></a> </li>
                  <li><a href="sub-category-sub-location.html"><span class="title">Learning </span><span class="count">&nbsp;3576</span></a> </li>
                  <li><a href="sub-category-sub-location.html"><span class="title">Jobs </span><span class="count">&nbsp;453</span></a> </li>
                  <li><a href="sub-category-sub-location.html"><span class="title">Cars & Vehicles</span><span class="count">&nbsp;801</span></a> </li>
                  <li><a href="sub-category-sub-location.html"><span class="title">Other</span><span class="count">&nbsp;9803</span></a> </li>
                  -->
                </ul>
              </div>
              <!--/.categories-list-->
              
              <div class="locations-list  list-filter">
                <h5 class="list-title"><strong><a href="#">Location</a></strong></h5>
                <ul class="browse-list list-unstyled long-list">
                  <li> <a href="sub-category-sub-location.html"> Atlanta </a></li>
                  <li> <a href="sub-category-sub-location.html"> Wichita </a></li>
                  <li> <a href="sub-category-sub-location.html"> Anchorage </a></li>
                  <li> <a href="sub-category-sub-location.html"> Dallas </a></li>
                  <li> <a href="sub-category-sub-location.html">New York </a></li>
                  <li> <a href="sub-category-sub-location.html"> Santa Ana/Anaheim </a></li>
                  <li> <a href="sub-category-sub-location.html"> Miami </a></li>
                  <li> <a href="sub-category-sub-location.html"> Virginia Beach </a></li>
                  <li> <a href="sub-category-sub-location.html"> San Diego </a></li>
                  <li> <a href="sub-category-sub-location.html"> Boston </a></li>
                  <li> <a href="sub-category-sub-location.html"> Houston </a></li>
                  <li> <a href="sub-category-sub-location.html">Salt Lake City </a></li>
                  <li> <a href="sub-category-sub-location.html"> Other Locations </a></li>
                </ul>
              </div>
              <!--/.locations-list-->
              
              <div class="locations-list  list-filter">
                <h5 class="list-title"><strong><a href="#">Price range</a></strong></h5>
                <form role="form" class="form-inline ">
                  <div class="form-group col-sm-4 no-padding">
                    <input type="text" placeholder="$ 2000 " id="minPrice" class="form-control">
                  </div>
                  <div class="form-group col-sm-1 no-padding text-center"> - </div>
                  <div class="form-group col-sm-4 no-padding">
                    <input type="text" placeholder="$ 3000 " id="maxPrice" class="form-control">
                  </div>
                  <div class="form-group col-sm-3 no-padding">
                    <button class="btn btn-default pull-right" type="submit">GO</button>
                  </div>
                </form>
                <div style="clear:both"></div>
              </div>
              <!--/.list-filter-->
              <div class="locations-list  list-filter">
                <h5 class="list-title"><strong><a href="#">Seller</a></strong></h5>
                <ul class="browse-list list-unstyled long-list">
                  <li> <a href="sub-category-sub-location.html"><strong>All Ads</strong> <span class="count">228,705</span></a></li>
                  <!--<li> <a href="sub-category-sub-location.html">Business <span class="count">28,705</span></a></li>
                  <li> <a href="sub-category-sub-location.html">Personal <span class="count">18,705</span></a></li>-->
                </ul>
              </div>
              <!--/.list-filter-->
              <div class="locations-list  list-filter">
                <h5 class="list-title"><strong><a href="#">Condition</a></strong></h5>
                <ul class="browse-list list-unstyled long-list">
                  <li> <a href="sub-category-sub-location.html">New <span class="count">228,705</span></a></li>
                  <li> <a href="sub-category-sub-location.html">Used <span class="count">28,705</span></a></li>
                  <li> <a href="sub-category-sub-location.html">None </a></li>
                </ul>
              </div>
              <!--/.list-filter-->
              <div style="clear:both"></div>
            </div>
            
            <!--/.categories-list--> 
          </aside>
        </div>
        <!--/.page-side-bar-->
        <div class="col-sm-9 page-content col-thin-left">
          <div class="category-list">
            <div class="tab-box "> 
              
              <!-- Nav tabs -->
              <ul class="nav nav-tabs add-tabs" id="ajaxTabs" role="tablist">
                <li class="active"><a href="#allAds" data-url="<?php echo base_url('front/ajax_tab_2'); ?>" role="tab" data-toggle="tab">All Ads <span class="badge">228,705</span></a></li>
                <!--<li><a href="#businessAds" data-url="<?php echo base_url('front/ajax_tab_2'); ?>" role="tab" data-toggle="tab">Business <span class="badge">22,805</span></a></li>
                <li><a href="#personalAds" data-url="halaman/ajax/3.html" role="tab" data-toggle="tab">Personal <span class="badge">18,705</span></a></li>-->
              </ul>
              <div class="tab-filter">
                <select class="selectpicker" data-style="btn-select" data-width="auto">
                  <option>Short by</option>
                  <option>Price: Low to High</option>
                  <option>Price: High to Low</option>
                </select>
              </div>
            </div>
            <!--/.tab-box-->
            
            <div class="listing-filter">
              <div class="pull-left col-xs-6">
                <div class="breadcrumb-list"> <a href="#" class="current"> <span>All ads</span></a> in New York <a href="#selectRegion" id="dropdownMenu1"  data-toggle="modal"> <span class="caret"></span> </a> </div>
              </div>
              <div class="pull-right col-xs-6 text-right listing-view-action"> <span class="list-view active"><i class="  icon-th"></i></span> <span class="compact-view"><i class=" icon-th-list  "></i></span> <span class="grid-view "><i class=" icon-th-large "></i></span> </div>
              <div style="clear:both"></div>
            </div>
            <!--/.listing-filter-->
            
            
            <div class="adds-wrapper">
              <div class="tab-content">
                <div class="tab-pane active" id="allAds"><?php include('ajax/1.php'); ?></div>
                <div class="tab-pane" id="businessAds"></div>
                <div class="tab-pane" id="personalAds"></div>
              </div>
            </div>
            <!--/.adds-wrapper-->
            
            <div class="tab-box  save-search-bar text-center"> <a href=""> <i class=" icon-star-empty"></i> Save Search </a> </div>
          </div>
          <div class="pagination-bar text-center">
            <ul class="pagination">
              <li  class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#"> ...</a></li>
              <li><a class="pagination-btn" href="#">Next &raquo;</a></li>
            </ul>
          </div>
          <!--/.pagination-bar -->
          
          <div class="post-promo text-center">
            <h2> Do you get anything for sell ? </h2>
            <h5>Sell your products online FOR FREE. It's easier than you think !</h5>
            <a href="post-ads.html" class="btn btn-lg btn-border btn-post btn-danger">Post a Free Ad </a></div>
          <!--/.post-promo--> 
          
        </div>
        <!--/.page-content--> 
        
      </div>
    </div>
  </div>
  <!-- /.main-container -->
  
  <!-- Modal Change City -->

<div class="modal fade" id="selectRegion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class=" icon-map"></i> Select your region </h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
        
            <p>Popular cities in <strong>New York</strong>
            </p>

<div style="clear:both"></div>            
            <div class="col-sm-6 no-padding">
            <select  class="form-control selecter  " id="region-state" name="region-state">
		<option value="">All States/Provinces</option>
		<option value="Alabama">Alabama</option>
		<option value="Alaska">Alaska</option>
		<option value="Arizona">Arizona</option>
		<option value="Arkansas">Arkansas</option>
		<option value="California">California</option>
		<option value="Colorado">Colorado</option>
		<option value="Connecticut">Connecticut</option>
		<option value="Delaware">Delaware</option>
		<option value="District of Columbia">District of Columbia</option>
		<option value="Florida">Florida</option>
		<option value="Georgia">Georgia</option>
		<option value="Hawaii">Hawaii</option>
		<option value="Idaho">Idaho</option>
		<option value="Illinois">Illinois</option>
		<option value="Indiana">Indiana</option>
		<option value="Iowa">Iowa</option>
		<option value="Kansas">Kansas</option>
		<option value="Kentucky">Kentucky</option>
		<option value="Louisiana">Louisiana</option>
		<option value="Maine">Maine</option>
		<option value="Maryland">Maryland</option>
		<option value="Massachusetts">Massachusetts</option>
		<option value="Michigan">Michigan</option>
		<option value="Minnesota">Minnesota</option>
		<option value="Mississippi">Mississippi</option>
		<option value="Missouri">Missouri</option>
		<option value="Montana">Montana</option>
		<option value="Nebraska">Nebraska</option>
		<option value="Nevada">Nevada</option>
		<option value="New Hampshire">New Hampshire</option>
		<option value="New Jersey">New Jersey</option>
		<option value="New Mexico">New Mexico</option>
		<option selected value="New York">New York</option>
		<option value="North Carolina">North Carolina</option>
		<option value="North Dakota">North Dakota</option>
		<option value="Ohio">Ohio</option>
		<option value="Oklahoma">Oklahoma</option>
		<option value="Oregon">Oregon</option>
		<option value="Pennsylvania">Pennsylvania</option>
		<option value="Rhode Island">Rhode Island</option>
		<option value="South Carolina">South Carolina</option>
		<option value="South Dakota">South Dakota</option>
		<option value="Tennessee">Tennessee</option>
		<option value="Texas">Texas</option>
		<option value="Utah">Utah</option>
		<option value="Vermont">Vermont</option>
		<option value="Virgin Islands">Virgin Islands</option>
		<option value="Virginia">Virginia</option>
		<option value="Washington">Washington</option>
		<option value="West Virginia">West Virginia</option>
		<option value="Wisconsin">Wisconsin</option>
		<option value="Wyoming">Wyoming</option>
	</select>
            </div>
           <div style="clear:both"></div>            

            <hr class="hr-thin">
          </div>
          <div class="col-md-4">
            <ul  class="list-link list-unstyled">
              <li> <a  href="#" title="">All Cities</a> </li>
		 <li> <a  href="#" title="Albany">Albany</a> </li>
		 <li> <a  href="#" title="Altamont">Altamont</a> </li>
		 <li> <a  href="#" title="Amagansett">Amagansett</a> </li>
		 <li> <a  href="#" title="Amawalk">Amawalk</a> </li>
		 <li> <a  href="#" title="Bellport">Bellport</a> </li>
		 <li> <a  href="#" title="Centereach">Centereach</a> </li>
		 <li> <a  href="#" title="Chappaqua">Chappaqua</a> </li>
         <li> <a  href="#" title="East Elmhurst">East Elmhurst</a> </li>
		 <li> <a  href="#" title="East Greenbush">East Greenbush</a> </li>
		 <li> <a  href="#" title="East Meadow">East Meadow</a> </li>
	
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-link list-unstyled">
              <li> <a  href="#" title="Elmont">Elmont</a> </li>
		 <li> <a  href="#" title="Elmsford">Elmsford</a> </li>
		 <li> <a  href="#" title="Farmingville">Farmingville</a> </li>
		 <li> <a  href="#" title="Floral Park">Floral Park</a> </li>
		 <li> <a  href="#" title="Flushing">Flushing</a> </li>
		 <li> <a  href="#" title="Fonda">Fonda</a> </li>
		 <li> <a  href="#" title="Freeport">Freeport</a> </li>
		 <li> <a  href="#" title="Fresh Meadows">Fresh Meadows</a> </li>
		 <li> <a  href="#" title="Fultonville">Fultonville</a> </li>
		 <li> <a  href="#" title="Gansevoort">Gansevoort</a> </li>
		 <li> <a  href="#" title="Garden City">Garden City</a> </li>

	
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-link list-unstyled">
               <li> <a  href="#" title="Oceanside">Oceanside</a> </li>
		 <li> <a  href="#" title="Orangeburg">Orangeburg</a> </li>
		 <li> <a  href="#" title="Orient">Orient</a> </li>
         <li> <a  href="#" title="Ozone Park">Ozone Park</a> </li>
		 <li> <a  href="#" title="Palatine Bridge">Palatine Bridge</a> </li>
		 <li> <a  href="#" title="Patterson">Patterson</a> </li>
		 <li> <a  href="#" title="Pearl River">Pearl River</a> </li>
		 <li> <a  href="#" title="Peekskill">Peekskill</a> </li>
		 <li> <a  href="#" title="Pelham">Pelham</a> </li>
		 <li> <a  href="#" title="Penn Yan">Penn Yan</a> </li>
		 <li> <a  href="#" title="Peru">Peru</a> </li>
	
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /.modal --> 