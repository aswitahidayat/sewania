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
                            <img class="img-responsive" src="<?php echo base_url('assets/img/upload/product/'.$ft[0]); ?>"  alt="img"  ></span>
                           </span> 
                           <span class="item-name">  <?php echo $row[1] ?> </span> <p></p> 
                           <span class="price" style="color:#444444; font-weight:bold; font-size:15px;">Rp. <?php echo format_rupiah($row['harga']); ?></span>
                       </a> 
                 
                    </div>
                <?php } ?>
            </div>
        </div>    
    </div>         
</div>