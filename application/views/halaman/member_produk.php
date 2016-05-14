<?php
$jml_produk = mysql_num_rows(mysql_query("select * from produk where id_member = '$user[token_id]'"));
$aktif_iklan = mysql_num_rows(mysql_query("select * from produk where id_member = '$user[token_id]' and approve = 'y'"));
$pending_iklan = mysql_num_rows(mysql_query("select * from produk where id_member = '$user[token_id]' and approve = 'p'"));
?>
<div class="main-container" style="width:80%; margin-right:auto; margin-left:auto;">

    <div class="container">
      
          <div style="width:100%; height:100px; background-color:#FFFFFF;">
          
          <div class="inner-box">
          <div class="row">
            <div class="col-md-5 col-xs-4 col-xxs-12">
              <h3 class="no-padding text-center-480 useradmin"><a href=""><img class="userImg" src="<?php echo base_url('ivory_src/source/images/user.jpg'); ?>" alt="user" /> <img class="userImg" src="<?php echo base_url('ivory_src/bottom_icon/verifikasi.jpg'); ?>" alt="verified" style="width:50px; height:50px;" />  </a> </h3>
            </div>
            
            <div class="col-md-7 col-xs-8 col-xxs-12">
              <div class="header-data text-center-xs"> 
                
                <!-- Traffic data -->
                <div class="hdata">
                  <div class="mcol-left"> 
                    <!-- Icon with red background --> 
                    <i class="fa fa-eye ln-shadow"></i> </div>
                  <div class="mcol-right"> 
                    <!-- Number of visitors -->
                    <p><a href="#">7000</a> <em>visits</em></p>
                  </div>
                  <div class="clearfix"></div>
                </div>
                </div>
                
           </div>
           </div> 
           
           </div>
           
          
          </div>
          
          <p></p>
          
          <div class="inner-box">
            <div class="welcome-msg">
              <h3 class="page-sub-header2 clearfix no-padding">Iklan Member <?php echo $this->uri->segment(3); ?> </h3>
              <span class="page-sub-header-sub small">Berikut adalah iklan aktif dari <?php echo $this->uri->segment(3)
			  
			  ; ?> : </span> </div>
            <div id="accordion" class="panel-group">
              <div class="panel panel-default">
              
                
                <?php 
				$seg = $this->uri->segment(3);
				
				
				include('sub_hal/member_produk.php'); 
				
				
				?>
                </div>
              </div>
            <!--/.row-box End--> 
            
          </div>
        </div>
        <!--/.page-content--> 
      </div>
      <!--/.row--> 
    </div>
    <!--/.container--> 
  </div>
  <!-- /.main-container -->
  