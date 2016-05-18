<div class="header">
    <nav class="navbar   navbar-site navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a href="<?php echo base_url('front/'); ?>" class="navbar-brand logo logo-title">
          <!-- Original Logo will be placed here  -->
          <span class="logo-icon"><img src="<?php echo base_url('assets/img/logo.png'); ?>" style="width:50px; height:50px; float:left; margin-right:10px;" /><!--<i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span> BOOT<span>CLASSIFIED </span> </a> -->  <div style="margin-top:8px; float:left;"><b>Sewa</b><span>nia</span></div> </span></div>
        <div class="navbar-collapse collapse">

          <?php
            if($_SESSION['login'] == false){
          ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url('front/member_login'); ?>"><?php echo $_SESSION['token_id']; ?>Login</a></li>
            <li><a href="<?php echo base_url('front/signup'); ?>">Signup</a></li>
            <li class="postadd"><a class="btn btn-block   btn-border btn-post btn-danger" href="<?php echo base_url('front/post_ad'); ?>">Post Free Add</a></li>
          </ul>
          <?php
		  }
		  else{
		  ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Signout <i class="glyphicon glyphicon-off"></i> </a></li>
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span><?php echo $nama; ?></span> <i class="icon-user fa"></i> <i class=" icon-down-open-big fa" onClick="if(itm == 0){ jQuery('#drop_menu').show();  itm = 1; }else{ jQuery('#drop_menu').hide(); itm = 0; }"></i></a>
              <ul class="dropdown-menu user-menu" id="drop_menu">
                <li class="active"><a href="<?php echo base_url('front/account_member/home'); ?>"><i class="icon-home"></i> Personal Home </a></li>

                <li><a href="<?php echo base_url('front/account_member/member_ads'); ?>"><i class="icon-th-thumb"></i> My ads </a></li>
                <li><a href="account-favourite-ads.html"><i class="icon-heart"></i> Favourite ads </a></li>
                <li><a href="account-saved-search.html"><i class="icon-star-circled"></i> Saved search </a></li>
                <li><a href="account-archived-ads.html"><i class="icon-folder-close"></i> Archived ads </a></li>
                <li><a href="account-pending-approval-ads.html"><i class="icon-hourglass"></i> Pending approval </a></li>
                <li><a href="statements.html"><i class=" icon-money "></i> Payment history </a></li>
              </ul>
            </li>
            <li class="postadd"><a class="btn btn-block   btn-border btn-post btn-danger" href="<?php echo base_url('front/post_ad'); ?>">Tambahkan Iklan</a></li>
          </ul>
          <?php
		  }
          ?>

        </div>
        <!--/.nav-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </div>
  <!-- /.header -->