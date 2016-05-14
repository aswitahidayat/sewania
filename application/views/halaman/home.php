<div class="intro">
  <div class="dtable hw100">
    <div class="dtable-cell hw100">
      <div class="container text-center">
        <h1 class="intro-title animated fadeInDown"> Selamat Datang Di Sewania  </h1>
        <p class="sub animateme fittext3 animated fadeIn"> Portal Sewa Barang Dan Jasa Terlengkap di Indonesia </p>
          <div class="row search-row animated fadeInUp">
            <div class="col-lg-4 col-sm-4 search-col relative locationicon">
              <i class="icon-location-2 icon-append"></i>
              <input type="text" name="country" id="autocomplete-ajax"  class="form-control locinput input-rel searchtag-input has-icon" placeholder="City/Zipcode..." value="">
            </div>
            <div class="col-lg-4 col-sm-4 search-col relative"> <i class="icon-docs icon-append"></i>
              <input type="text" name="ads"  class="form-control has-icon" placeholder="I'm looking for a ..." value="">
            </div>
            <div class="col-lg-4 col-sm-4 search-col">
              <button class="btn btn-primary btn-search btn-block"><i class="icon-search"></i><strong>Find</strong></button>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
  <!-- /.intro -->
  
  <div class="xxmain-containerxxx" style="width:100%;">
    <div class="xxxcontainerxxxx">
      <div class="xxrow">
        <div  style="background:none; height:auto; width:100%; margin-right:auto; margin-left:auto;">
          <div class="inner-box category-content" style="background:none; height:auto; margin:auto; width:60%;">
            <h2 class="title-2" style="text-align:center;">Temukan Kategori Sewa Yang Anda Cari </h2>
            <div class="row row-eq-height">
              <?php
                foreach($qbarang as $hasil){
              ?>
              <div class="col-xs-6 col-sm-3">
                <div class="cat-list">
                 
                <h3 class="title-2"> <!--<i class="icon-search-1"></i>--> <center><a data-toggle="modal" class="kat_rent" onclick="pop_up_kategori('#modal_body_awal','#header_awal_menu','#cont_rental_<?php echo $hasil->id_kategori; ?>','<?php echo $hasil->nama; ?>');" href="#contactAdvertiser"><img src="<?php echo base_url('ivory_src/icon/'.$hasil->icon); ?>" /><br/><font style="font-size:14px;"><?php echo $hasil->nama; ?> </font></a></center></h3>
                
                <!--span data-target=".cat-id-1" data-toggle="collapse" class="btn-cat-collapsed collapsed">   <span class=" icon-down-open-big"></span> </span-->
                   </h3>
                  <ul class="cat-collapse collapse in cat-id-1" id="cont_rental_<?php echo $hasil->id_kategori; ?>" style="display:none;">
                   <?php
				     $qp = mysql_query("select * from sub_kategori where id_kategori = '$hasil->id_kategori'");
					 while($row = mysql_fetch_array($qp)){
					 ?>
                     <span data-target=".cat-id-1" data-toggle="collapse" class="btn-cat-collapsed collapsed">   <span class=" icon-down-open-big"></span> </span>
                   </h3>
                  <ul class="cat-collapse collapse in cat-id-1">
                    <li id="sub_div_<?php echo $row[0]; ?>" class="sub_div_kat" style="cursor:pointer;"><?php echo $row[1]; ?></li>
                  </ul>
                  
                     <?php
					 }
				   ?>
                   <script>
				  
				  $('.sub_div_kat').click(function(){
                    var id=this.id.split('_');
					jQuery.ajax({
					     type:"POST",
						 data:"id="+id[2],
						 url:base+"session/s_kategori/",
						 success:function(data){
						 //alert(data);
						   window.location=base+"front/category/"+data;
						 }
					});
                  });
				  
				  
				  </script>
                  </ul>
                  
                  
                  </div>
                </div>
                <?php
			  }
			?>
            </div>
            
           
          </div>
          
           <div class="inner-box relative slide">
            <h2 class="title-2" style="font-size:16px;"><b>HOT PROMO </b>
            
                        <a id="nextItems" class="link  pull-right carousel-nav"> <i class="icon-right-open-big"></i></a>
             <a id="prevItems" class="link pull-right carousel-nav"> <i class="icon-left-open-big"></i> </a>

            </h2>
            <div class="row" >
              <div class="col-lg-12">
                <div class="no-margin item-carousel2 owl-carousel owl-theme" style="text-align:center;">
                  
                  <?php
          				  $qp = mysql_query("select * from produk where hot_iklan = 'y' limit 8");
          				  while($row = mysql_fetch_array($qp)){
          				  $ft = explode('$$@' , $row['foto']);
        				  ?>
                  <div class="item" style="height:265px; width:165px; border:1px solid #DDDDDD;">
                    <a id="sub_div2_<?php echo $row[0]; ?>" class="sub_div_kat2" >
                       <center><span class="item-carousel-thumb" style="height:140px; width:165px;"> 
                      	<img class="img-responsive" src="<?php echo base_url('ivory_src/upload/product/'.$ft[0]); ?>"  alt="img"  ></span>
                       </span> 
                       <span class="item-name">  <?php echo $row[1] ?> </span> <p></p> 
                       <span class="price" style="color:#444444; font-weight:bold; font-size:15px;">Rp. <?php echo format_rupiah($row['harga']); ?></span>
                   </a> 
                 
                 </div>
                 <?php
				 }
				 ?>
                 <!--
                    <div class="item" style="height:265px; width:165px; border:1px solid #DDDDDD;"> <a href="ads-details.html">
                     <span class="item-carousel-thumb" style="height:165px; width:165px;"> 
                    	<img class="img-responsive" src="<?php echo base_url('ivory_src/source/images/item/1.jpg'); ?>" alt="img" style="height:165px; width:165px; border:none;" >
                     </span> 
                 <span class="item-name"> consectetuer adipiscing elit </span>
                  <span class="price"> $ 240 </span></a> </div>
                 
                 
                   <div class="item" style="height:265px; width:165px; border:1px solid #DDDDDD;"> <a href="ads-details.html">
                     <span class="item-carousel-thumb" style="height:165px; width:165px;"> 
                    	<img class="img-responsive" src="<?php echo base_url('ivory_src/source/images/item/1.jpg'); ?>" alt="img" style="height:165px; width:165px; border:none;" >
                     </span> 
                 <span class="item-name"> consectetuer adipiscing elit </span>
                  <span class="price"> $ 240 </span></a> </div>
               
                    <div class="item" style="height:265px; width:165px; border:1px solid #DDDDDD;"> <a href="ads-details.html">
                     <span class="item-carousel-thumb" style="height:165px; width:165px;"> 
                    	<img class="img-responsive" src="<?php echo base_url('ivory_src/source/images/item/1.jpg'); ?>" alt="img" style="height:165px; width:165px; border:none;" >
                     </span> 
                 <span class="item-name"> consectetuer adipiscing elit </span>
                  <span class="price"> $ 240 </span></a> </div>
                 
                    <div class="item" style="height:265px; width:165px; border:1px solid #DDDDDD;"> <a href="ads-details.html">
                     <span class="item-carousel-thumb" style="height:165px; width:165px;"> 
                    	<img class="img-responsive" src="<?php echo base_url('ivory_src/source/images/item/1.jpg'); ?>" alt="img" style="height:165px; width:165px; border:none;" >
                     </span> 
                 <span class="item-name"> consectetuer adipiscing elit </span>
                  <span class="price"> $ 240 </span></a> </div>
                  
                    <div class="item" style="height:265px; width:165px; border:1px solid #DDDDDD;"> <a href="ads-details.html">
                     <span class="item-carousel-thumb" style="height:165px; width:165px;"> 
                    	<img class="img-responsive" src="<?php echo base_url('ivory_src/source/images/item/1.jpg'); ?>" alt="img" style="height:165px; width:165px; border:none;" >
                     </span> 
                 <span class="item-name"> consectetuer adipiscing elit </span>
                  <span class="price"> $ 240 </span></a> </div>
                 
                    <div class="item" style="height:265px; width:165px; border:1px solid #DDDDDD;"> <a href="ads-details.html">
                     <span class="item-carousel-thumb" style="height:165px; width:165px;"> 
                    	<img class="img-responsive" src="<?php echo base_url('ivory_src/source/images/item/1.jpg'); ?>" alt="img" style="height:165px; width:165px; border:none;" >
                     </span> 
                 <span class="item-name"> consectetuer adipiscing elit </span>
                  <span class="price"> $ 240 </span></a> </div>
                </div> -->
              </div>
            </div>
            
            
          </div>
             
        </div>
        
        <div class="inner-box relative slide">
            <h2 class="title-2" style="font-size:16px;"><b>IKLAN TERBARU </b> 
            
                        <a id="nextItem" class="link  pull-right carousel-nav"> <i class="icon-right-open-big"></i></a>
             <a id="prevItem" class="link pull-right carousel-nav"> <i class="icon-left-open-big"></i> </a>

            </h2>
            <div class="row">
              <div class="col-lg-12">
                <div class="no-margin item-carousel owl-carousel owl-theme">
                
                <?php
				  $qp = mysql_query("select * from produk order by id_produk desc limit 8");
				  while($row = mysql_fetch_array($qp)){
				  $ft = explode('$$@' , $row['foto']);
				  ?>
                  
                  <div class="item" style="height:265px; width:165px; border:1px solid #DDDDDD;"> <a id="sub_div3_<?php echo $row[0]; ?>" class="sub_div_kat">
                     <span class="item-carousel-thumb" style="height:140px; width:165px;"> 
                    	<img class="img-responsive" src="<?php echo base_url('ivory_src/upload/product/'.$ft[0]); ?>" alt="img" style="height:140px; width:165px; border:none;" >
                     </span> 
                     <span class="item-name"> <?php echo $row[1]; ?> </span> 
                     <span class="price">Rp. <?php echo format_rupiah($row['harga']); ?> </span>
                 </a> 
                 </div>
                 <?php
				 }
				 ?>
                 
              </div>
            </div>
            
            
             </div>
             </div>
             
             <div class="inner-box relative" style="padding:10px 20px; width:100%;">
            <h2 class="title-2" style="font-size:16px;"><center><b>KENAPA HARUS SEWANIA ?</b></center><hr/>
            <div class="row">
                
                <div class="col-xs-6 col-sm-4 " >
                <div class="cat-list">
                
                <center><a ><img src="<?php echo base_url('ivory_src/bottom_icon/GEO.png'); ?>" style="width:91px; height:91px;" /></a><br/><p></p><b>Geo Searching</b><br /><font style="font-size:12px;">Bisa Mencari Jasa Sewa Di Sekitar Anda</font></center>
                
              </div>
              </div>
              
              <div class="col-xs-6 col-sm-4 " >
                <div class="cat-list">
                
                <center><a ><img src="<?php echo base_url('ivory_src/bottom_icon/EASY TAKE.png'); ?>" style="width:91px; height:91px;" /></a><br/><p></p><b>Easy Take</b><br /><font style="font-size:12px;">Mengambil Barang Sewaan tanpa <br />harus pergi ke Tukang Sewa</font></center>
                
              </div>
              </div>
              
              <div class="col-xs-6 col-sm-4 " >
                <div class="cat-list">
                
                <center><a ><img src="<?php echo base_url('ivory_src/bottom_icon/RATING.png'); ?>" style="width:91px; height:91px;" /></a><br/><p></p><b>Rating</b><br /><font style="font-size:12px;">Memudahkan Memilih Jasa sewa  <br />dengan melihan popularitasnya</font></center>
                
              </div>
              </div>
              
              <div class="col-xs-6 col-sm-4 " >
                <div class="cat-list">
                
                <center><a ><img src="<?php echo base_url('ivory_src/bottom_icon/CHAT.png'); ?>" style="width:91px; height:91px;" /></a><br/><p></p><b>Chat</b><br /><font style="font-size:12px;">Berkomunikasi langsung dengan tukang <br /> sewa dengan fasilitas Chating</font></center>
                
              </div>
              </div>
              
              <div class="col-xs-6 col-sm-4 " >
                <div class="cat-list">
                
                <center><a ><img src="<?php echo base_url('ivory_src/bottom_icon/verifikasi.jpg'); ?>" style="width:91px; height:91px;" /></a><br/><p></p><b>Verifikasi</b><br /><font style="font-size:12px;">Verifikasi aman sewania</font></center>
                
              </div>
              </div>
              
              <div class="col-xs-6 col-sm-4 " >
                <div class="cat-list">
                
                <center><a ><img src="<?php echo base_url('ivory_src/bottom_icon/REKENING BERSAMA.png'); ?>" style="width:91px; height:91px;" /></a><br/><p></p><b>Rekening Bersama</b><br /><font style="font-size:12px;">Transaksi lebih cepat dan  <br />effisien dengan rekening bersama</font></center>
                
              </div>
              </div>
              
            </div>
            
            </h2>
             
        </div>

        
        <center><b style="color:#888888;">Didukung oleh :</b> <br />
        <img src="<?php echo base_url('ivory_src/logo_bdi.jpg'); ?>" style="width:110px; height:90px;" />
        </center>
        <br />
        
        <div class="col-sm-3 page-sidebar col-thin-left" style="width:100%;">
          <aside>
           <!-- <div class="inner-box no-padding">
              <div class="inner-box-content"> <a href="#"><img class="img-responsive" src="<?php echo base_url('ivory_src/source/images/site/app.jpg'); ?>" alt="tv"></a> </div> 
            </div> -->
           <!-- <div class="inner-box">
              <h2 class="title-2">Popular Categories </h2>
              <div class="inner-box-content">
                <ul class="cat-list arrow">
                  <li> <a href="sub-category-sub-location.html"> Apparel (1,386) </a></li>
                  <li> <a href="sub-category-sub-location.html"> Art (1,163) </a></li>
                  <li> <a href="sub-category-sub-location.html"> Business Opportunities (4,974) </a></li>
                  <li> <a href="sub-category-sub-location.html"> Community and Events (1,258) </a></li>
                  <li> <a href="sub-category-sub-location.html"> Electronics and Appliances (1,578) </a></li>
                  <li> <a href="sub-category-sub-location.html"> Jobs and Employment (3,609) </a></li>
                  <li> <a href="sub-category-sub-location.html"> Motorcycles (968) </a></li>
                  <li> <a href="sub-category-sub-location.html"> Pets (1,188) </a></li>
                  <li> <a href="sub-category-sub-location.html"> Services (7,583) </a></li>
                  <li> <a href="sub-category-sub-location.html"> Vehicles (1,129) </a></li>
                </ul>
              </div>
            </div> -->
            
            <!--<div class="inner-box no-padding"> <img class="img-responsive" src="<?php echo base_url('ivory_src/source/images/add2.jpg'); ?>" alt=""> </div>  -->
          </aside>
    </div>
  </div>
  <!-- /.main-container -->
  
 
  
   <!--<div class="page-info" style="background: url(<?php echo base_url('ivory_src/source/images/bg.jpg'); ?>); background-size:cover">
    <div class="container text-center section-promo"> 
    	<div class="row">
        	<div class="col-sm-3 col-xs-6 col-xxs-12">
                <div class="iconbox-wrap">
                          <div class="iconbox">
                            <div class="iconbox-wrap-icon">
                            <i class="icon  icon-group"></i>
                            </div>
                            <div class="iconbox-wrap-content">
                              <h5><span>2200</span> </h5>
                              <div  class="iconbox-wrap-text">Trusted Seller</div>
                            </div>
                          </div>
  							<!-- /..iconbox -->
                    <!-- </div><!--/.iconbox-wrap-->
            <!--</div>
            
            <div class="col-sm-3 col-xs-6 col-xxs-12">
            	<div class="iconbox-wrap">
                          <div class="iconbox">
                            <div class="iconbox-wrap-icon">
                            <i class="icon  icon-th-large-1"></i>
                            </div>
                            <div class="iconbox-wrap-content">
                              <h5><span>100</span> </h5>
                              <div  class="iconbox-wrap-text">Categories</div>
                            </div>
                          </div>
  							<!-- /..iconbox -->
                    <!-- </div><!--/.iconbox-wrap-->
            <!--</div>
            
            <div class="col-sm-3 col-xs-6  col-xxs-12">
            	<div class="iconbox-wrap">
                          <div class="iconbox">
                            <div class="iconbox-wrap-icon">
                            <i class="icon  icon-map"></i>
                            </div>
                            <div class="iconbox-wrap-content">
                              <h5><span>700</span> </h5>
                              <div  class="iconbox-wrap-text">Location</div>
                            </div>
                          </div>
  							<!-- /..iconbox -->
                   <!--  </div><!--/.iconbox-wrap-->
            <!--</div>
            
            <div class="col-sm-3 col-xs-6 col-xxs-12">
            	<div class="iconbox-wrap">
                          <div class="iconbox">
                            <div class="iconbox-wrap-icon">
                            <i class="icon icon-facebook"></i>
                            </div>
                            <div class="iconbox-wrap-content">
                              <h5><span>50,000</span> </h5>
                              <div  class="iconbox-wrap-text"> Facebook Fans</div>
                            </div>
                          </div>
  							<!-- /..iconbox -->
                    <!-- </div><!--/.iconbox-wrap-->
           <!-- </div>
            
        </div>
    
    </div>
  </div>
  <!-- /.page-info -->
  
  <div class="page-bottom-info">
      <div class="page-bottom-info-inner">
      
      	<div class="page-bottom-info-content text-center">
        	<h1>Ingin Barang atau keahlian anda bisa sewa orang lain? Gabung menjadi SEWAKER di sekarang</h1>
            <a class="btn  btn-lg btn-primary-dark" href="tel:+000000000">
            <i class="icon-mobile"></i> <span class="hide-xs color50">Daftar Sekarang  </a>
        </div>
      
      </div>
  </div>


<!-- Modal contactAdvertiser -->

<div class="modal fade" id="contactAdvertiser" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="header_awal_menu"><i class=" icon-mail-2"></i> Contact advertisers </h4>
      </div>
      <div class="modal-body" id="modal_body_awal">
      <ul class="cat-collapse collapse in cat-id-1">
      
      </ul>
        <!--<form role="form">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Name:</label>
            <input class="form-control required" id="recipient-name" placeholder="Your name" data-placement="top" data-trigger="manual" data-content="Must be at least 3 characters long, and must only contain letters." type="text">
          </div>
          <div class="form-group">
            <label for="sender-email" class="control-label">E-mail:</label>
            <input id="sender-email" type="text" data-content="Must be a valid e-mail address (user@gmail.com)" data-trigger="manual" data-placement="top" placeholder="email@you.com" class="form-control email">
          </div>
          <div class="form-group">
            <label for="recipient-Phone-Number"  class="control-label">Phone Number:</label>
            <input type="text"  maxlength="60" class="form-control" id="recipient-Phone-Number">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message <span class="text-count">(300) </span>:</label>
            <textarea class="form-control" id="message-text"  placeholder="Your message here.." data-placement="top" data-trigger="manual"></textarea>
          </div>
          <div class="form-group">
            <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p>
          </div>
        </form> -->
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success pull-right">Send message!</button>
      </div>-->
    </div>
    </div>
    </div>
    </div>
    
    </div>
    
    </div>