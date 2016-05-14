<div id="modal2">
		                       <div class="modal-content">
		                            	<div class="header">
			             	<h2>Form Pendonor</h2>
			                   </div>
			                <div class="copy">
                            <form class="form-horizontal" id="form_admin3" name="form_admin2" method="post">
                            <label class="control-label" for="focusedInput" style="float:left; margin-right:10px; width:150px;">Nama : </label>
				                 <div class="controls">
                                           <div style="margin-top:5px;"> <?php echo tgl_indo(date('Y-m-d')); ?> </div>
                                          </div>
                                   <br clear="all" />
                             
                             <label class="control-label" for="focusedInput" style="float:left; margin-right:10px; margin-top:-20px; width:150px;">Nama Pendonor : </label>
				                 <div class="controls" style="margin-top:-15px;">
                                            <input id="nama_pendonor" name="nama_input" type="text" placeholder="Inputkan nama pendonor .." required="required" />
                                           
                                          </div>
                                   <br clear="all" />
                                   
                                   <label class="control-label" for="focusedInput" style="float:left; margin-right:10px; margin-top:-20px; width:150px;">Pekerjaan : </label>
				                 <div class="controls" style="margin-top:-15px;">
                                           <input id="pekerjaan_input" name="pekerjaan_input" type="text" placeholder="Inputkan pekerjaan anda .." required="required" />
                                            <input id="id_admin_input" name="id_admin_input" type="hidden" placeholder="Inputkan pekerjaan anda .." required="required" />
                                           
                                          </div>
                                          
                                           <br clear="all" />
                                   
                                   <label class="control-label" for="focusedInput" style="float:left; margin-right:10px; margin-top:-20px; width:150px;">Tempat Donor : </label>
				                 <div class="controls" style="margin-top:-15px;">
                                          <?php
										  if($sts['status_update'] == 'y'){
										  ?>
                                            <input id="nama_tempat" name="nama_tempat" type="text" placeholder="Inputkan nama tempat .." required="required" value="<?php echo $sts[1]; ?>" disabled="disabled" />
                                          <?php
										  }
										  else{
										  ?>
                                            <input id="nama_tempat" name="nama_tempat" type="text" placeholder="Inputkan nama tempat .." required="required"  />
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
                                            <input id="alamat_donor" name="alamat_donor" type="text" placeholder="Inputkan alamat pendonor .." required="required" value="<?php echo $sts[2]; ?>" disabled="disabled" />
                                          <?php
										  }
										  else{
										  ?>
                                            <input id="alamat_donor" name="alamat_donor" type="text" placeholder="Inputkan alamat pendonor .."  required="required"  />
                                          <?php
										  }
										  ?>
                                           
                                          </div>
                                          
                                   <br clear="all" />
                                   
                                   <label class="control-label" for="focusedInput" style="float:left; margin-right:10px; margin-top:-20px; width:150px;">Kontak : </label>
				                 <div class="controls" style="margin-top:-15px;">
                                       <input id="kontak_input" name="kontak_input" type="text" placeholder="Inputkan kontak anda .." required="required" />
                                          </div>
                                   <br clear="all" />
                                   
                                   <label class="control-label" for="focusedInput" style="float:left; margin-right:10px; margin-top:-20px; width:150px;">Alamat : </label>
				                 <div class="controls" style="margin-top:-15px;">
                                      <textarea name="t_alamat" id="t_alamat"></textarea>
                                          </div>
                                   <br clear="all" />
                                   
                                   <label class="control-label" for="focusedInput" style="float:left; margin-right:10px; margin-top:-20px; width:150px;">Golongan Darah : </label>
				                 <div class="controls" style="margin-top:-15px;">
                                       <select name="cmb_status" id="cmb_status">
                                             <option value="">-- Jenis Darah --</option>
                                             <option value="-">-</option>
                                             <option value="A">A</option>
                                             <option value="B">B</option>
                                             <option value="AB">AB</option>
                                             <option value="O">O</option>
                                             </select>
                                          </div>
                                   <br clear="all" />
                                   
                                   <label class="control-label" for="focusedInput" style="float:left; margin-right:10px; margin-top:-20px; width:150px;">Email : </label>
				                 <div class="controls" style="margin-top:-15px;">
                                      <input id="email_input" name="email_input" type="email" placeholder="Inputkan email .." required="required" /> 
                                          </div>
                                   <br clear="all" />
                                   
                                       </form>
                                  
                                       </div>
			                 <div class="cf footer">
			                   	&nbsp; &nbsp; <a href="#" class="btn" style="margin-right:10px; float:right" id="btn_close2">Close</a> <input type="submit" name="btn_submit_admin" id="btn_submit_admin2" value="Submit" class="btn btn-primary " style="margin-right:10px; float:right" /> 
			                 </div>
		                   </div>
		                  <div class="overlay"></div>
</div>