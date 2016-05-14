
                <div class="panel-heading">
                  <h4 class="panel-title"> <a href="#collapseB1"  data-toggle="collapse"> My details </a> </h4>
                </div>
                <div class="panel-collapse collapse in" id="collapseB1">
                  <div class="panel-body">
                    <form class="form-horizontal" role="form">
                      <div class="form-group">
                        <label  class="col-sm-3 control-label">First Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control"  value="<?php echo $nama; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-sm-3 control-label">Last name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="<?php echo $last; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control"  value="<?php echo $email; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control"  value="<?php echo $nama; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Phone" class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="Phone" placeholder="880 124 9820" value="<?php echo $phone; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-sm-3 control-label">Postcode</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control"  placeholder="1217">
                        </div>
                      </div>
                      
                      <div class="form-group hide"> <!-- remove it if dont need this part -->
                        <label  class="col-sm-3 control-label">Facebook account map</label>
                        <div class="col-sm-9">
                          <div class="form-control"> <a class="link" href="fb.com">Jhone.doe</a> <a class=""> <i class="fa fa-minus-circle"></i></a> </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9"> </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <button type="submit" class="btn btn-default">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"> <a href="#collapseB2"  data-toggle="collapse" id="tab2" onclick="if(ctab2 == '0'){ jQuery('#collapseB2').slideDown(); ctab2 = 1; }else{ jQuery('#collapseB2').slideUp(); ctab2 = 0; }"> Settings </a> </h4>
                </div>
                <div class="panel-collapse collapse" id="collapseB2">
                  <div class="panel-body">
                    <form class="form-horizontal" role="form">
                      <div class="form-group">
                        <div class="col-sm-12">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox">
                              Comments are enabled on my ads </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-sm-3 control-label">New Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control"  placeholder="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-sm-3 control-label">Confirm Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control"  placeholder="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <button type="submit" class="btn btn-default">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"> <a href="#collapseB3"  data-toggle="collapse" id="tab3" onclick="if(ctab3 == '0'){ jQuery('#collapseB3').slideDown(); ctab3 = 1; }else{ jQuery('#collapseB3').slideUp(); ctab3 = 0; }"> Preferences </a> </h4>
                </div>
                <div class="panel-collapse collapse" id="collapseB3">
                  <div class="panel-body">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox">
                            I want to receive newsletter. </label>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox">
                            I want to receive advice on buying and selling. </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
             