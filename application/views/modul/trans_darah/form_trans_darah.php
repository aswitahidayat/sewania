 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" id="modal_content">
          
          <!-- httml -->
          
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="header_admin">Tambah Kategori</h4>
      </div>
      <div class="block">
                          
                            <div class="block-content collapse in">
                                <div class="span12">
                                     <form class="form-horizontal" id="form_admin2" name="form_admin2" method="post">
                                      <fieldset>
                                        
                                         <div class="control-group">
                                          <label class="control-label" for="focusedInput">Nama</label>
                                          <div class="controls">
                                            <input id="nama_input" name="nama_input" type="text" placeholder="Inputkan nama pendonor .." required="required" onblur="jQuery('#t_holder_nama').hide();" /> <input id="id_input" name="id_input" type="hidden"  required="required" /><input id="t_idx" name="t_idx" type="hidden" placeholder="Inputkan id .." required="required"  /><input id="act_input" name="act_input" type="hidden" placeholder="Inputkan id .." required="required"  />
                                            <div id="t_holder_nama" class="t_holder_nama" style="width:40%; height:150px; overflow:auto; background-color:#ffffff; position:absolute; z-index:0; border:1px solid #999999; display:none;"><ul style="list-style:none; margin:2px; padding:2px;" id="ul_holder_pendonor"></ul></div>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Tanggal Donor</label>
                                          <div class="controls">
                                            <input id="tanggal_input" name="tanggal_input" type="date" placeholder="Inputkan nama kategori .." required="required" />
                                            <span class="help-inline red" id="help_username_admin" style="display:none;">Please correct the error</span>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Golongan Darah</label>
                                          <div class="controls">
                                            <select id="gol_input" name="gol_input">
                                          <?php
										  $arr = array("AB" , "O" , "A" , "B");
										  foreach($arr as $val){
										  echo "<option value='$val'>$val</option>";
										  }
										  ?>
                                          </select>
                                            <span class="help-inline red" id="help_username_admin" style="display:none;">Please correct the error</span>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Status</label>
                                          <div class="controls">
                                          <select id="status_input" name="status_input">
                                          <?php
										  $qq = mysql_query("select * from kategori");
										  while($rr = mysql_fetch_array($qq)){
										  echo "<option value='$rr[0]'>$rr[1]</option>";
										  }
										  ?>
                                          </select>
                                           
                                            <span class="help-inline red" id="help_username_admin" style="display:none;">Please correct the error</span>
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