<?php include('intro.php'); ?>
<div class="inner-box category-content">
    <h2 class="title-2">Temukan Kategori Sewa Yang Anda Cari </h2>
    <div class="row row-eq-height">
        <?php foreach($qbarang as $hasil){ ?>
            <div class="col-xs-6 col-sm-3 cat-list title-2 text-center">
                <a data-toggle="modal" class="kat_rent" onclick="pop_up_kategori('#modal_body_awal','#header_awal_menu','#cont_rental_<?php echo $hasil->id_kategori; ?>','<?php echo $hasil->nama; ?>');" href="#contactAdvertiser">
                    <img src="<?php echo base_url('assets/img/icon/'.$hasil->icon); ?>" /><br/>
                    <?php echo $hasil->nama; ?>
                </a>
                <ul class="cat-collapse collapse in cat-id-1" id="cont_rental_<?php echo $hasil->id_kategori; ?>" style="display:none;">
                    <?php
                        $qp = mysql_query("select * from sub_kategori where id_kategori = '$hasil->id_kategori'");
    			         while($row = mysql_fetch_array($qp)){
    			     ?>
                        <span data-target=".cat-id-1" data-toggle="collapse" class="btn-cat-collapsed collapsed">   
                            <span class=" icon-down-open-big"></span>
                        </span>
                        <ul class="cat-collapse collapse in cat-id-1">
                            <li id="sub_div_<?php echo $row[0]; ?>" class="sub_div_kat" style="cursor:pointer;"><?php echo $row[1]; ?></li>
                        </ul>
              
                    <?php } ?>
                    <script src="<?php echo base_url('assets/js/category.js'); ?>"> </script>
                </ul>
            </div>
        <?php } ?>
    </div>
</div>
<?php include('hot-promo.php'); ?>
<?php include('iklan-terbaru.php'); ?>
<?php include('feature.php'); ?>
<?php include('bottom.php'); ?>             
  
<div class="modal fade" id="contactAdvertiser" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="header_awal_menu"> Contact advertisers </h4>
            </div>
        <div class="modal-body" id="modal_body_awal">
            <ul class="cat-collapse collapse in cat-id-1"></ul>
        </div>
    </div>
</div>
    
