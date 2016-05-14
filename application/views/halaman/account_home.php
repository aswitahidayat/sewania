<?php
$jml_produk = mysql_num_rows(mysql_query("select * from produk where id_member = '$user[token_id]'"));
$aktif_iklan = mysql_num_rows(mysql_query("select * from produk where id_member = '$user[token_id]' and approve = 'y'"));
$pending_iklan = mysql_num_rows(mysql_query("select * from produk where id_member = '$user[token_id]' and approve = 'p'"));
?>
<div class="main-container" style="width:80%; margin-right:auto; margin-left:auto;">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 page-sidebar">
          <aside>
            <div class="inner-box">
              <div class="user-panel-sidebar">
                <div class="collapse-box">
                  <h5 class="collapse-title no-border"> My Classified <a href="#MyClassified" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a></h5>
                  <div class="panel-collapse collapse in" id="MyClassified">
                    <ul class="acc-list">
                      <li><a class="active" href="<?php echo base_url('front/account_member/home'); ?>"><i class="icon-home"></i> Personal Home </a></li>
                      
                    </ul>
                  </div>
                </div>
                <!-- /.collapse-box  -->
                <div class="collapse-box">
                  <h5 class="collapse-title"> My Ads <a href="#MyAds" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a></h5>
                  <div class="panel-collapse collapse in" id="MyAds">
                    <ul class="acc-list">
                      <li><a href="<?php echo base_url('front/account_member/member_ads'); ?>"><i class="icon-docs"></i> Iklan Saya<span class="badge"><?php echo $jml_produk; ?></span> </a></li>
                      <li><a href="account-favourite-ads.html"><i class="icon-heart"></i> Favourite ads <span class="badge">42</span> </a></li>
                      <li><a href="account-saved-search.html"><i class="icon-star-circled"></i> Inbox <span class="badge">42</span> </a></li>
                      <li><a href="account-archived-ads.html"><i class="icon-folder-close"></i> Verified Account <span class="badge">42</span></a></li>
                      <li><a href="account-pending-approval-ads.html"><i class="icon-hourglass"></i> Pending approval <span class="badge">42</span></a></li>
                 
                    </ul>
                  </div>
                </div>
                <!-- /.collapse-box  -->
                
                <div class="collapse-box">
                  <h5 class="collapse-title"> Terminate Account <a href="#TerminateAccount" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a></h5>
                  <div class="panel-collapse collapse in" id="TerminateAccount">
                    <ul class="acc-list">
                      <li><a href="account-close.html"><i class="icon-cancel-circled "></i> Close account </a></li>
                    </ul>
                  </div>
                </div>
                <!-- /.collapse-box  --> 
              </div>
            </div>
            <!-- /.inner-box  --> 
            
          </aside>
        </div>
        <!--/.page-sidebar-->
        
        <div class="col-sm-9 page-content">
          <div class="inner-box">
          <div class="row">
            <div class="col-md-5 col-xs-4 col-xxs-12">
              <h3 class="no-padding text-center-480 useradmin"><a href=""><img class="userImg" src="<?php echo base_url('ivory_src/source/images/user.jpg'); ?>" alt="user"> <?php echo $nama." ".$last; ?> </a> </h3>
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
                
                <!-- revenue data -->
                <div class="hdata">
                  <div class="mcol-left"> 
                    <!-- Icon with green background --> 
                    <i class="icon-th-thumb ln-shadow"></i> </div>
                  <div class="mcol-right"> 
                    <!-- Number of visitors -->
                    <p><a href="#">12</a><em>Ads</em></p>
                  </div>
                  <div class="clearfix"></div>
                </div>
                
                <!-- revenue data -->
                <div class="hdata">
                  <div class="mcol-left"> 
                    <!-- Icon with blue background --> 
                    <i class="fa fa-user ln-shadow"></i> </div>
                  <div class="mcol-right"> 
                    <!-- Number of visitors -->
                    <p><a href="#">18</a> <em>Favorites </em></p>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
          </div>
          
          <div class="inner-box">
            <div class="welcome-msg">
              <h3 class="page-sub-header2 clearfix no-padding">Hello <?php echo $nama." ".$last; ?> </h3>
              <span class="page-sub-header-sub small">You last logged in at: 01-01-2014 12:40 AM [UK time (GMT + 6:00hrs)]</span> </div>
            <div id="accordion" class="panel-group">
              <div class="panel panel-default">
              
                
                <?php 
				$seg = $this->uri->segment(3);
				
				if($seg == 'home'){
				include('sub_hal/home.php'); 
				}
				else if($seg == 'member_ads'){
				include('sub_hal/member_ads.php'); 
				}
				else if($seg == 'edit_ads'){
				include('sub_hal/edit_ads.php'); 
				}
				else{
				?>
                <script type="text/javascript">
				//window.location = "<?php echo base_url(); ?>front/account_member/home";
				</script>
                <?php
				}
				
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
  