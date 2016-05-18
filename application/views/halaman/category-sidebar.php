<div class="col-sm-3 page-sidebar">
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
              <?php } ?>
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
        </div>
        <!--/.list-filter-->
        
        <div class="locations-list  list-filter">
            <h5 class="list-title"><strong><a href="#">Seller</a></strong></h5>
            <ul class="browse-list list-unstyled long-list">
              <li> <a href="sub-category-sub-location.html"><strong>All Ads</strong> <span class="count">228,705</span></a></li>
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
    </div>
    
    <!--/.categories-list--> 
</div>
<!--/.page-side-bar-->