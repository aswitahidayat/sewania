
 
 <div class="main-container">
    <div class="container">
    
      <div class="row">
        <div class="col-sm-5 login-box">
          <div class="panel panel-default">
          <div style="width:90%; box-shadow:4px 4px 0 0 #999999; margin-right:auto; margin-left:auto; margin-top:10px; line-height:50px;  border-radius:10px; color:#FF0000; height:50px; text-align:center; background-color:#FFFFFF; display:none;" id="div_conn"> <b>Login salah .. Coba Lagi ..</b> </div>
            <div class="panel-intro text-center">
              <h2 class="logo-title"> 
                <!-- Original Logo will be placed here  --> 
                  <p></p>
                <span class="logo-icon"><i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span> BOOT<span>CLASSIFIED </span> </h2>
            </div>
            <div class="panel-body">
              <form role="form" method="post">
                <div class="form-group">
                  <label for="sender-email" class="control-label">Email:</label>
                  <div class="input-icon"> <i class="icon-user fa"></i>
                    <input  type="text"  placeholder="Username" class="form-control email" name="t_username" id="t_username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="user-pass"  class="control-label">Password:</label>
                  <div class="input-icon"> <i class="icon-lock fa"></i>
                    <input class="form-control" placeholder="Password"  type="password" name="t_password" id="t_password">
                  </div>
                </div>
                <div class="form-group">
                  <input class="btn btn-primary  btn-block" value="Submit" id="btn_submit" />
                </div>
              </form>
            </div>
            <div class="panel-footer">

              <div class="checkbox pull-left">
                <label> <input type="checkbox" value="1" name="remember" id="remember"> Keep me logged in</label>
              </div>


              <p class="text-center pull-right"> <a href="<?php echo base_url('front/forgot_password'); ?>"> Lost your password? </a> </p>
              <div style=" clear:both"></div>
            </div>
          </div>
          <div class="login-box-btm text-center">
            <p> Don't have an account? <br>
              <a href="<?php echo base_url('front/signup'); ?>"><strong>Sign Up !</strong> </a> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.main-container -->