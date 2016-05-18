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
                
                    <?php
                        $fx = mysql_query("select * from kategori");
                        $pp = mysql_query("select * from sub_kategori where id_kategori = '$ff[0]'");
                        while($rx = mysql_fetch_array($pp)){
                            if($_SESSION[kat_produk]==$rx['id_sub_kategori']){
        			?>
                        <option value="<?php echo $rx[0]; ?>" selected="selected"> <?php echo $rx[1]; ?> </option>
                    <?php } else{ ?>
                        <option value="<?php echo $rx[0]; ?>"> <?php echo $rx[1]; ?> </option>
                    <?php
                        }
                    }
        			
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
                <?php } ?>
              </select>
            </div>
            <div class="col-sm-3">
                <button class="btn btn-block btn-primary" type="submit" id="btn_cari_produk"> <i class="fa fa-search"></i> </button>
            </div>
        </form>
    </div>
</div>
<!-- /.search-row -->