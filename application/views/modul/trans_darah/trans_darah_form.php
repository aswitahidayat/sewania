<div id="modal">
		                       <div class="modal-content">
		                            	<div class="header">
			             	<h2>Form Transaksi Darah</h2>
			                   </div>
			                <div class="copy">
                            <form class="form-horizontal" id="form_admin2" name="form_admin2" method="post">
                            <label class="control-label" for="focusedInput" style="float:left; margin-right:10px; width:150px;">Nama : </label>
				                 <div class="controls">
                                            <input id="nama_input" name="nama_input" type="text" placeholder="Inputkan nama pendonor .." required="required" onblur="jQuery('#t_holder_nama').hide();" /> <input id="id_input" name="id_input" type="hidden"  required="required" /><input id="t_idx" name="t_idx" type="hidden" placeholder="Inputkan id .." required="required"  /><input id="act_input" name="act_input" type="hidden" placeholder="Inputkan id .." required="required"  />
                                            <div id="t_holder_nama" class="t_holder_nama" style="width:40%; height:150px; overflow:auto; background-color:#ffffff; position:absolute; z-index:0; border:1px solid #999999; display:none;"><ul style="list-style:none; margin:2px; padding:2px;" id="ul_holder_pendonor"></ul></div>
                                          </div>
                                   <br clear="all" />
                             
                             <label class="control-label" for="focusedInput" style="float:left; margin-right:10px; margin-top:-20px; width:150px;">Tanggal Donor : </label>
				                 <div class="controls" style="margin-top:-15px;">
                                            <input id="tanggal_input" name="tanggal_input" type="date" placeholder="Inputkan nama kategori .." required="required" disabled="disabled" value="<?php echo date('Y-m-d'); ?>" />
                                           
                                          </div>
                                   <br clear="all" />
                                   
                                   <label class="control-label" for="focusedInput" style="float:left; margin-right:10px; margin-top:-20px; width:150px;">Golongan Darah : </label>
				                 <div class="controls" style="margin-top:-15px;">
                                            <select id="gol_input" name="gol_input">
                                          <?php
										  $arr = array("AB" , "O" , "A" , "B");
										  foreach($arr as $val){
										  echo "<option value='$val'>$val</option>";
										  }
										  ?>
                                          </select>
                                           
                                          </div>
                                          
                                     <br clear="all" />
                                   
                                   <label class="control-label" for="focusedInput" style="float:left; margin-right:10px; margin-top:-20px; width:150px;">Lokasi Donor : </label>
				                 <div class="controls" style="margin-top:-15px;">
                                          <?php
										  if($sts['status_update'] == 'y'){
										  ?>
                                            <input id="nama_tempat" name="nama_tempat" type="text" placeholder="Inputkan nama tempat .." required="required" value="<?php echo $sts[1]; ?>" disabled="disabled" />
                                          <?php
										  }
										  else{
										  ?>
                                            <input id="nama_tempat2" name="nama_tempat" type="text" placeholder="Inputkan nama tempat .." required="required"  /> 
                                          <?php
										  }
										  ?>
                                           
                                          </div>
                                          
                                    <br clear="all" />
                                   
                                   <label class="control-label" for="focusedInput" style="float:left; margin-right:10px; margin-top:-20px; width:150px;">Alamat Donor : </label>
				                 <div class="controls" style="margin-top:-15px;">
                                          <?php
										  if($sts['status_update'] == 'y'){
										  ?>
                                            <input id="alamat_donor" name="alamat_donor" type="text" placeholder="Inputkan alamat_donor .." required="required" value="<?php echo $sts[2]; ?>" disabled="disabled" />
                                          <?php
										  }
										  else{
										  ?>
                                            <input id="alamat_donor2" name="alamat_donor" type="text" placeholder="Inputkan alamat_donor .." required="required"  /> 
                                          <?php
										  }
										  ?>
                                           
                                          </div>
                                          
                                   <br clear="all" />
                                   
                                   <label class="control-label" for="focusedInput" style="float:left; margin-right:10px; margin-top:-20px; width:150px;">Status : </label>
				                 <div class="controls" style="margin-top:-15px;">
                                       <select id="status_input" name="status_input">
                                          <?php
										  $qq = mysql_query("select * from kategori");
										  while($rr = mysql_fetch_array($qq)){
										  echo "<option value='$rr[0]'>$rr[1]</option>";
										  }
										  ?>
                                          </select>
                                           
                                          </div>
                                   <br clear="all" />
                                       </form>
                                  
                                       </div>
			                 <div class="cf footer">
			                   	&nbsp; &nbsp; <a href="#" class="btn">Close</a> <input type="submit" name="btn_submit_admin" id="btn_submit_admin" value="Submit" class="btn btn-primary " style="margin-right:10px;" /> 
			                 </div>
		                   </div>
		                  <div class="overlay"></div>
</div>