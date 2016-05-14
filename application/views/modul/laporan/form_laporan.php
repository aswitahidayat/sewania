 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" id="modal_content">
          
          <!-- httml -->
          
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="header_admin">Tambah Pendonor</h4>
      </div>
      <div class="block">
                          
                            <div class="block-content collapse in">
                                <div class="span12">
                                     <form class="form-horizontal" id="form_admin2" name="form_admin2" method="post">
                                      <fieldset>
                                      
                                      <div class="control-group">
                                          <label class="control-label" for="focusedInput">Tanggal Daftar</label>
                                          <div class="controls">
                                            <div style="margin-top:5px;"> <?php echo tgl_indo(date('Y-m-d')); ?> </div>
                                          </div>
                                        </div>
                                        
                                         <div class="control-group">
                                          <label class="control-label" for="focusedInput">Nama</label>
                                          <div class="controls">
                                            <input id="nama_input" name="nama_input" type="text" placeholder="Inputkan nama admin .." required="required" />
                                            <span class="help-inline red" id="help_username_admin" style="display:none;">Please correct the error</span>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Pekerjaan</label>
                                          <div class="controls">
                                            <input id="pekerjaan_input" name="pekerjaan_input" type="text" placeholder="Inputkan pekerjaan anda .." required="required" />
                                            <input id="id_admin_input" name="id_admin_input" type="hidden" placeholder="Inputkan pekerjaan anda .." required="required" />
                                            <span class="help-inline red" id="help_username_admin" style="display:none;">Please correct the error</span>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Kontak</label>
                                          <div class="controls">
                                            <input id="kontak_input" name="kontak_input" type="text" placeholder="Inputkan kontak anda .." required="required" />
                                            <span class="help-inline red" id="help_username_admin" style="display:none;">Please correct the error</span>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Alamat</label>
                                          <div class="controls">
                                           <textarea name="t_alamat" id="t_alamat"></textarea>
                                            <span class="help-inline red" id="help_username_admin" style="display:none;">Please correct the error</span>
                                          </div>
                                        </div>
                                       
                                        <div class="control-group" style="display:none;">
                                          <label class="control-label" for="optionsCheckbox2">Password</label>
                                          <div class="controls">
                                            <label>
                                              <input id="password_input" name="password_input" type="password" placeholder="Inputkan password admin .."  /> 
                                              <span class="help-inline red" id="help_password_admin" style="display:none;">Please correct the error</span>
                                            </label>
                                          </div>
                                        </div>
                                        
                                         <div class="control-group" style="display:none;">
                                          <label class="control-label" for="optionsCheckbox2">Ulangi</label>
                                          <div class="controls">
                                            <label>
                                              <input id="ulangipassword_input" name="ulangipassword_input" type="password" placeholder="Inputkan kembali password .."  /> 
                                              <input id="aksi_admin_form" name="aksi_admin_form" type="hidden"   /> 
                                              <span class="help-inline red" id="help_ulangi_admin" style="display:none; color:#ff0000;">Password tidak sama</span>
                                            </label>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="optionsCheckbox2">Golongan Darah</label>
                                          <div class="controls">
                                            <label>
                                             <select name="cmb_status" id="cmb_status">
                                             <option value="">-- Pilih Status --</option>
                                             <option value="A">A</option>
                                             <option value="B">B</option>
                                             <option value="AB">AB</option>
                                             <option value="O">O</option>
                                             </select>
                                              <span class="help-inline red" id="help_ulangi_admin" style="display:none; color:#ff0000;">Password tidak sama</span>
                                            </label>
                                          </div>
                                        </div>
                                        
                                          <div class="control-group">
                                          <label class="control-label" for="optionsCheckbox2">Email</label>
                                          <div class="controls">
                                            <label>
                                              <input id="email_input" name="email_input" type="email" placeholder="Inputkan email .." required="required" /> 
                                              <span class="help-inline red" id="help_ulangi_email" style="display:none; color:#ff0000;">Inputkan email yang valid</span>
                                            </label>
                                          </div>
                                        </div>
                                        
                                        
                                        
                                        <br clear="all" />
                                        </fieldset>
                                        
                            </div>
                        </div>
                        <!-- /block -->
                     
                                         <div class="modal-footer">
                                         <div class="div_success" style="float:left; color:#00CC00; display:none; "><img src="<?php echo $url; ?>images/ya_rzl.png" /> <b>Success</b></div>
                                         <button type="button" class="btn btn-default" data-dismiss="modal" style="float:right; margin-left:10px;">Close</button>
                                        <input type="submit" name="btn_submit_admin" id="btn_submit_admin" value="Submit" class="btn btn-primary " style="float:right;" />
                                        
                                        </div>
                                        </form>
                    </div>     
			    </div>
			</div>
     
    </div>

  </div>
</div>

                            </div>
                        </div>
                        <!-- /block -->