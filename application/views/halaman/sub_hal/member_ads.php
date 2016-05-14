<div class="panel-heading" style="border-bottom:3px solid #999999;">
                  <h4 class="panel-title"> <a href="#collapseB1"  data-toggle="collapse"> My details </a> </h4>
                </div>
                
          <div class="category-list">
            <div class="tab-box "> 
              
              <!-- Nav tabs -->
              <ul class="nav nav-tabs add-tabs" id="ajaxTabs" role="tablist">
                <li class="active"><a href="#allAds"  role="tab" data-toggle="tab">Iklan Aktif <span class="badge"><?php echo $aktif_iklan; ?></span></a></li>
                <li><a href="#businessAds" data-url="<?php echo base_url('front/ajax_tab_2'); ?>" role="tab" data-toggle="tab">Iklan Non Aktif <span class="badge">0</span></a></li>
                <li><a href="#personalAds" data-url="halaman/ajax/3.html" role="tab" data-toggle="tab">Iklan Pending <span class="badge"><?php echo $pending_iklan; ?></span></a></li>
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
            
            <!--<div class="listing-filter">
              <div class="pull-left col-xs-6">
                <div class="breadcrumb-list"> <a href="#" class="current"> <span>All ads</span></a> in New York <a href="#selectRegion" id="dropdownMenu1"  data-toggle="modal"> <span class="caret"></span> </a> </div>
              </div>
              <div class="pull-right col-xs-6 text-right listing-view-action"> <span class="list-view active"><i class="  icon-th"></i></span> <span class="compact-view"><i class=" icon-th-list  "></i></span> <span class="grid-view "><i class=" icon-th-large "></i></span> </div>
              <div style="clear:both"></div>
            
            <!--/.listing-filter-->
            <p>&nbsp;</p>
            
            <div class="adds-wrapper">
              <div class="tab-content">
                <div class="tab-pane active" id="allAds">
                
                <?php
				 $prod = mysql_query("select * from produk where id_member = '$user[token_id]'");
				 
				 while($baris = mysql_fetch_array($prod)){
				 $exp_prod = explode('$$@' , $baris['foto']);
				 $sub = mysql_fetch_array(mysql_query("select * from sub_kategori where id_sub_kategori = '$baris[id_sub_kategori]'"));
				 $kat = mysql_fetch_array(mysql_query("select * from kategori where id_kategori = '$sub[2]'"));
				?>
                
                <div class="item-list">
                
                
              <div class="cornerRibbons topAds">
 					 <a href="#"> Top Ads</a>
				</div>
                
                <div class="col-sm-2 no-padding photobox">
                  <div class="add-image"> <span class="photo-count"><i class="fa fa-camera"></i> 2 </span> <a href="<?php echo base_url('front/ads_detail'); ?>"><img class="thumbnail no-margin" src="<?php echo base_url('ivory_src/upload/product/thumb/small_'.$exp_prod[0]); ?>" alt="img"></a> </div>
                </div>
                <!--/.photobox-->
                <div class="col-sm-7 add-desc-box">
                  <div class="add-details">
                    <h5 class="add-title"> <a href="ads-details.html"> 
<?php echo ucwords(strtolower($baris[1])); ?> </a> </h5>
                    <span class="info-row"> <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="Business Ads">B </span> <span class="date"><i class=" icon-clock"> </i> <?php echo $kat[1]; ?> </span> - <span class="category"><?php echo $sub[1]; ?> </span>- <span class="item-location"><i class="fa fa-map-marker"></i> London </span>  <br /> <i class=" icon-pencil" style="margin-left:28px;"> </i><a onclick="<?php $_SESSION['id_ac_produk'] = $baris[0]; ?> window.location='<?php echo base_url('front/account_member/edit_ads/'.$baris[1]); ?>'"><span class="category" > Edit</span></a> <i class=" icon-eye" style="margin-left:10px;"> </i><span class="category" > View</span> </span> </div>
                </div>
                <!--/.add-desc-box-->
                <div class="col-sm-3 text-right  price-box">
                  <h2 class="item-price"> Rp. <?php echo format_rupiah($baris['harga']);  ?></h2>
                  <a class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Top Ads</span> </a> <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a> </div>
                <!--/.add-desc-box--> 
              </div>
              <!--/.item-list-->
              <?php
			  }
			  ?>
               
                 
                </div>
                <div class="tab-pane" id="businessAds"></div>
                <div class="tab-pane" id="personalAds"></div>
              </div>
            </div>
            <!--/.adds-wrapper-->