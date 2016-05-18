<div class="main-container">
    <div class="container">
      <div class="row">
        <div class="col-md-12 page-content">
          <div class="inner-box">
            <h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Post a Free Classified Ad</strong> </h2>
            <div class="row">
              <div class="col-sm-12">
                <form class="form-horizontal" method="post" action="<?php echo base_url('front/upload_filed'); ?>" enctype="multipart/form-data">
                  <fieldset>
                  <div id="div_first_step">
                                       <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="Adtitle">Judul Iklan</label>
                      <div class="col-md-8">
                        <input id="s_teks_title" name="Adtitle" placeholder="Ad title" class="form-control input-md" required="" type="text">
                        <input id="s_longitude" name="s_longitude"  class="form-control input-md" required="" type="text" style="display:none;" />
                        <input id="s_latitude" name="s_latitude"  class="form-control input-md" required="" type="text" style="display:none;" />
                        <span class="red" id="s_warn_title" style="display:none;">Field title harus diisi ..  </span>
                        <span class="help-block">A great title needs at least 60 characters. </span>
                      </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                      <label class="col-md-3 control-label" >Kategori</label>
                      <div class="col-md-8">
                        <select name="category-group" id="s_teks_kategori" class="form-control">
                          <option value="" selected="selected"> Select a category... </option>
                          <?php
						                foreach($qbarang as $hasil){
						              ?>
                          <option value="<?php echo $hasil->id_kategori; ?>"> - <?php echo $hasil->nama; ?> - </option>
                          <?php
              						   }
              						?>
                        </select>
                        <span class="red" id="s_warn_kategori" style="display:none;"> Pilih setidaknya 1 kategori untuk dimasukkan ..  </span>
                      </div>
                    </div>
                    
                    <!-- Select Basic -->
                    <div class="form-group">
                      <label class="col-md-3 control-label" >Sub Category</label>
                      <div class="col-md-8">
                        <select name="sub-category-group" id="s_sub_kat" class="form-control">
                           <option value="">-- Pilih Kategori Terlebih Dahulu --</option>
                        </select>
                        
                      <span class="red" id="s_warn_kategori" style="display:none;"> Pilih setidaknya 1 kategori untuk dimasukkan ..  </span>
                      </div>
                    </div>
                    
                    <!-- Textarea -->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="textarea">Deskripsi</label>
                      <div class="col-md-8">
                        <textarea class="form-control" id="s_teks_deskripsi" name="t_describe" placeholder="Describe what makes your ad unique"></textarea>
                        <span class="red" id="s_warn_desc" style="display:none;">Field Deskripsi harus diisi ..  </span>
                      </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                      <label class="col-md-3 control-label" >Provinsi</label>
                      <div class="col-md-8">
                        <select name="category-group" id="s_teks_provinsi" class="form-control">
                            <option value="" selected="selected"> Select a Provinsi... </option>
                            <?php
                              foreach($qprovinsi as $hasil){
                            ?>
                           <option value="<?php echo $hasil->id_lokasi; ?>"> - <?php echo $hasil->nama_lokasi; ?> - </option>
                           <?php
                              }
                            ?>
                        </select>
                        
                      <span class="red" id="s_warn_kategori" style="display:none;"> Pilih setidaknya 1 kategori untuk dimasukkan ..  </span>
                      </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                      <label class="col-md-3 control-label" >Kota / Kab</label>
                      <div class="col-md-8">
                        <select name="category-group" id="s_teks_kota" class="form-control">
                            <option value="">-- Pilih Kategori Terlebih Dahulu --</option>
                        </select>
                        
                      <span class="red" id="s_warn_kategori" style="display:none;"> Pilih setidaknya 1 kategori untuk dimasukkan ..  </span>
                      </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                      <label class="col-md-3 control-label" >Kecamatan</label>
                      <div class="col-md-8">
                        <select name="category-group" id="s_teks_kab" class="form-control">
                            <option value="">-- Pilih Kategori Terlebih Dahulu --</option>
                        </select>
                        
                      <span class="red" id="s_warn_kategori" style="display:none;"> Pilih setidaknya 1 kategori untuk dimasukkan ..  </span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-3 control-label" >Nama Jalan</label>
                      <div class="col-md-8">
                       <input id="pac-input" class="form-control" type="text" placeholder="Search Box" style="float:left;"> &nbsp; 
                       <img src="<?php echo base_url('assets/img/loc.png'); ?>" style="width:24px; height:24px; margin-top:10px;" id="btn_current_loc" /> <br clear="all" />
                       <p></p>
                       </div>
                    </div>
                    <div class="form-group">
                       <div class="col-xs-10 center-map">
    <div id="map" ></div>
    
   
                        
                      <span class="red" id="s_warn_kategori" style="display:none;"> Pilih setidaknya 1 kategori untuk dimasukkan ..  </span>
                      </div>
                    </div>

                    <!-- Multiple Radios (inline) 
                    <div class="form-group">
                      <label class="col-md-3 control-label" >Add Type</label>
                      <div class="col-md-8">
                        <label class="radio-inline" for="radios-0">
                          <input name="radios" id="radios-0" value="Private" checked="checked" type="radio">
                          Private </label>
                        <label class="radio-inline" for="radios-1">
                          <input name="radios" id="radios-1" value="Business" type="radio">
                          Business </label>
                      </div>
                    </div>-->
                    
                    <!-- Prepended text-->
                    
                    <div class="form-group">
                    
                      <label class="col-md-3 control-label" for="Price">Harga</label>
                      <div class="col-md-8">
                        
                          <input id="s_teks_Price" name="Price" class="form-control" value="0" required="" type="text" style="float:left; width:50%; margin-right:20px;">
                          <select name="category-group" id="s_periode" class="form-control"  style="width:auto;">
                            <option value="0">PerTahun</option>
                            <option value="1">PerBulan</option>
                            <option value="2">PerMinggu</option>
                            <option value="3">PerHari</option>
                          </select>
                    
                        
                    <span class="red" id="s_warn_harga" style="display:none;"> Field Harga Harus diisi ..  </span>
                      
                     
                      <span class="red" id="s_warn_kategori" style="display:none;"> Pilih setidaknya 1 kategori untuk dimasukkan ..  </span>
                      </div>
                      </div>
                    </div>
                    
                    <!-- photo -->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="textarea"> Picture </label>
                      <div class="col-md-8">
                        <div class="mb10">
                          <input id="f_upload[]" name="f_upload0" type="file" class="file" data-preview-file-type="text">
                        </div>
                        <div class="mb10">
                          <input id="f_upload[]" name="f_upload1" type="file" class="file" data-preview-file-type="text">
                        </div>
                        <div class="mb10">
                          <input id="f_upload[]" name="f_upload2" type="file" class="file" data-preview-file-type="text">
                        </div>
                        <div class="mb10">
                          <input id="f_upload[]" name="f_upload3" type="file" class="file" data-preview-file-type="text">
                        </div>
                        <div class="mb10">
                          <input id="f_upload[]" name="f_upload4" type="file" class="file" data-preview-file-type="text">
                        </div>
                        <p class="help-block">Add up to 5 photos. Use a real image of your product, not catalogs.</p>
                        
                        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15777.995465477094!2d115.2191478!3d-8.6440118!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1452405220560" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                        
                       
                      </div>
                      
                  
                       <input name="submit"  id="button1id" class="btn btn-success btn-lg"  value="Next &raquo;" style="float:right; margin-right:10px; width:100px;" /> 
                    
                    </div>
                  </div>
                  
                    <div id="div_step_next" style="display:none;">
                    <div class="content-subheading"> <i class="icon-user fa"></i> <strong>Seller information</strong> </div>
                    
                    <form class="form-horizontal" method="post" action="<?php echo base_url('front/member_reg'); ?>">
                  <fieldset>
                    <div class="form-group required">
                      <label class="col-md-4 control-label" >You are a <sup>*</sup></label>
                      <div class="col-md-6">
                        <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                            Professional </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            Individual </label>
                        </div>
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group required">
                      <label class="col-md-4 control-label" >First Name <sup>*</sup></label>
                      <div class="col-md-6">
                        <input  name="t_firstname" placeholder="First Name" class="form-control input-md" required="" type="text">
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group required">
                      <label class="col-md-4 control-label" >Last Name <sup>*</sup></label>
                      <div class="col-md-6">
                        <input  name="t_lastname" placeholder="Last Name" class="form-control input-md" type="text">
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group required">
                      <label class="col-md-4 control-label" >Phone Number <sup>*</sup></label>
                      <div class="col-md-6">
                        <input  name="t_phone" placeholder="Phone Number" class="form-control input-md" type="text">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" value="y" name="t_hidesphone">
                            <small> Hide the phone number on the published ads.</small> </label>
                        </div>
                      </div>
                    </div>
                    
                    <!-- Multiple Radios -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" >Gender</label>
                      <div class="col-md-6">
                        <div class="radio">
                          <label for="Gender-0">
                            <input name="Gender" id="Gender-0" value="L" checked="checked" type="radio">
                            Male </label>
                        </div>
                        <div class="radio">
                          <label for="Gender-1">
                            <input name="Gender" id="Gender-1" value="P" type="radio">
                            Female </label>
                        </div>
                      </div>
                    </div>
                    
                    <!-- Textarea -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="textarea">About Yourself</label>
                      <div class="col-md-6">
                        <textarea class="form-control" id="textarea" name="t_about">About Yourself</textarea>
                      </div>
                    </div>
                    <div class="form-group required">
                      <label for="inputEmail3" class="col-md-4 control-label">Email <sup>*</sup></label>
                      <div class="col-md-6">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="t_email">
                      </div>
                    </div>
                    <div class="form-group required">
                      <label for="inputPassword3" class="col-md-4 control-label">Password </label>
                      <div class="col-md-6">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="t_password">
                        <p class="help-block">At least 5 characters <!--Example block-level help text here.--></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-md-4 control-label"></label>
                      <div class="col-md-8">
                        <div class="termbox mb10">
                          <label class="checkbox-inline" for="checkboxes-1">
                            <input name="t_cond" id="checkboxes-1" value="1" type="checkbox">
                            I have read and agree to the <a href="terms-conditions.html">Terms & Conditions</a> </label>
                        </div>
                        <div style="clear:both"></div>
                        <input type="submit" name="submit" value="Register" class="btn btn-primary" />
                        <!--<a class="btn btn-primary" href="account-home.html">Register</a> --></div>
                    </div>
                  </fieldset>
                </form>
                    
                   <!--
                    <div class="well">
                      <h3><i class=" icon-certificate icon-color-1"></i> Make your Ad Premium </h3>
                      <p>Premium ads help sellers promote their product or service by getting their ads more visibility with more
                        buyers and sell what they want faster. <a href="help.html">Learn more</a></p>
                      <div class="form-group">
                        <table class="table table-hover checkboxtable">
                          <tr>
                            <td><div class="radio">
                                <label>
                                  <input type="radio" name="optionsRadios" id="optionsRadios0" value="option0" checked>
                                  <strong>Regular List </strong> </label>
                              </div></td>
                            <td><p>$00.00</p></td>
                          </tr>
                          <tr>
                            <td><div class="radio">
                                <label>
                                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" >
                                  <strong>Urgent Ad </strong> </label>
                              </div></td>
                            <td><p>$10.00</p></td>
                          </tr>
                          <tr>
                            <td><div class="radio">
                                <label>
                                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                  <strong>Top of the Page Ad </strong> </label>
                              </div></td>
                            <td><p>$20.00</p></td>
                          </tr>
                          <tr>
                            <td><div class="radio">
                                <label>
                                  <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                  <strong>Top of the Page Ad + Urgent Ad </strong> </label>
                              </div></td>
                            <td><p>$40.00</p></td>
                          </tr>
                          <tr>
                            <td><div class="form-group">
                                <div class="col-md-8">
                                  <select class="form-control" name="Method" id="PaymentMethod">
                                    <option value="2">Select Payment Method</option>
                                    <option value="3">Credit / Debit Card </option>
                                    <option value="5">Paypal</option>
                                  </select>
                                </div>
                              </div></td>
                            <td><p> <strong>Payable Amount : $40.00</strong></p></td>
                          </tr>
                        </table>
                        
                      </div>
                    </div>
                    
                     <!-- terms -->
                    <div class="form-group">
                      <label class="col-md-3 control-label">Terms</label>
                      <div class="col-md-8">
                        <label class="checkbox-inline" for="checkboxes-0">
                          <input name="checkboxes" id="checkboxes-0" value="Remember above contact information." type="checkbox">
                          Remember above contact information. </label>
                      </div>
                    </div>
                    
                    <!-- Button  -->
                    <div class="form-group">
                      <label class="col-md-3 control-label"></label>
                      <div class="col-md-8"> <input name="submit"  id="button1id" class="btn btn-success btn-lg" value="Submit" type="submit" /> </div>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
      
        <!-- /.page-content -->
        
         <!--<div class="col-md-3 reg-sidebar">
          <div class="reg-sidebar-inner text-center">
            <div class="promo-text-box"> <i class=" icon-picture fa fa-4x icon-color-1"></i>
              <h3><strong>Post a Free Classified</strong></h3>
              <p> Post your free online classified ads with us. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
            </div>
            
            <div class="panel sidebar-panel">
              <div class="panel-heading uppercase"><small><strong>How to sell quickly?</strong></small></div>
              <div class="panel-content">
                <div class="panel-body text-left">
                  <ul class="list-check">
                    <li> Use a brief title and  description of the item  </li>
                    <li> Make sure you post in the correct category</li>
                    <li> Add nice photos to your ad</li>
                    <li> Put a reasonable price</li>
                    <li> Check the item before publish</li>

                  </ul>
                </div>
              </div>
            </div>
            
            
          </div>
        </div><!--/.reg-sidebar-->
      </div>
      <!-- /.row --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.main-container -->