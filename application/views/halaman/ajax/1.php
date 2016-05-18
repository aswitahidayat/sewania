
<?php
if(!empty($_SESSION[kat_produk]) && !empty($_SESSION['search_produk'])){
$quer=mysql_query("select * from produk where nama_produk like '%$_SESSION[search_produk]%' and id_sub_kategori = '$_SESSION[kat_produk]'");
}
elseif(!empty($_SESSION[kat_produk]) && empty($_SESSION['search_produk'])){
$quer=mysql_query("select * from produk where id_sub_kategori = '$_SESSION[kat_produk]'");
}
//echo $_SESSION['search_produk'];
while($row=mysql_fetch_array($quer)){
$sub=mysql_fetch_array(mysql_query("select * from sub_kategori where id_sub_kategori = '$_SESSION[kat_produk]'"));
$exx=explode('$$@',$row['foto']);
?>
 <div class="item-list">
              <div class="cornerRibbons topAds">
 					 <a href="#">Top List</a>
				</div>
                
                <div class="col-sm-2 no-padding photobox">
                  <div class="add-image"> <span class="photo-count"><i class="fa fa-camera"></i> 2 </span> <!--<a href="<?php echo base_url('front/ads_detail/'.rawurlencode($row[1])); ?>">--> <a href="#" class="prodxx" id="img_prod_<?php echo $row[0]; ?>" ><img class="thumbnail no-margin"  src="<?php echo base_url('assets/img/upload/product/'.$exx[0]); ?>" alt="img"></a> </div>
                </div>
                <!--/.photobox-->
                <div class="col-sm-7 add-desc-box">
                  <div class="add-details">
                    <h5 class="add-title"> <a href="#" class="prodxx" id="div_prod_<?php echo $row[0]; ?>"> 
<?php echo $row[1]; ?> </a> </h5>
                    <span class="info-row"> <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="Business Ads">B </span> <span class="date"><i class=" icon-clock"> </i> Today 1:21 pm </span> - <span class="category"><?php echo $sub[1]; ?> </span>- <span class="item-location"><i class="fa fa-map-marker"></i> London </span> </span> </div>
                </div>
                <!--/.add-desc-box-->
                <div class="col-sm-3 text-right  price-box">
                  <h2 class="item-price"> <?php  echo format_rupiah($row['harga']); ?> </h2>
                  <a class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Top Ads</span> </a> <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a> </div>
                <!--/.add-desc-box--> 
              </div>
              <!--/.item-list-->
              
</script>     
<?php
}
?>
     