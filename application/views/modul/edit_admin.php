<div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left" id="label_admin2">Edit Admin</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                     <form class="form-horizontal" id="form_admin2" name="form_admin2" action="<?php echo base_url('front/tambah_admin'); ?>" method="post">
                                      <fieldset>
                                        <legend class="label_admin">Edit Admin</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Username</label>
                                          <div class="controls">
                                            <input id="username_input" name="username_input" type="text" placeholder="Inputkan username admin .." required="required" />
                                            <span class="help-inline red" id="help_username_admin" style="display:none;">Please correct the error</span>
                                          </div>
                                        </div>
                                       
                                        <div class="control-group">
                                          <label class="control-label" for="optionsCheckbox2">Password</label>
                                          <div class="controls">
                                            <label>
                                              <input id="password_input" name="password_input" type="password" placeholder="Inputkan password admin .." required="required" /> 
                                              <span class="help-inline red" id="help_password_admin" style="display:none;">Please correct the error</span>
                                            </label>
                                          </div>
                                        </div>
                                        
                                         <div class="control-group">
                                          <label class="control-label" for="optionsCheckbox2">Ulangi</label>
                                          <div class="controls">
                                            <label>
                                              <input id="ulangipassword_input" name="ulangipassword_input" type="password" placeholder="Inputkan kembali password .." required="required" /> 
                                              <span class="help-inline red" id="help_ulangi_admin" style="display:none;">Password tidak sama</span>
                                            </label>
                                          </div>
                                        </div>
                                        
                                          <div class="control-group">
                                          <label class="control-label" for="optionsCheckbox2">Email</label>
                                          <div class="controls">
                                            <label>
                                              <input id="email_input" name="email_input" type="text" placeholder="Inputkan email .." required="required" /> 
                                              <span class="help-inline red" id="help_ulangi_email" style="display:none;">Inputkan email yang valid</span>
                                            </label>
                                          </div>
                                        </div>
                                        
                                        
                                        
                                        </fieldset>
                                        </form>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>

                    
			    </div>
			</div>