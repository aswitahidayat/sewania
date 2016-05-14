<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Forms</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                <?php
				//if($_GET['hal'] == 'edit_kategori'){
					//$isi = mysql_fetch_array(mysql_query("select * from kategori_obat where id_kategori_obat = '$_GET[id]'"));
			    if($this->uri->segment(5) != ''){
				$idx = $this->uri->segment(5);
				$isi = mysql_fetch_array(mysql_query("select * from admin where id_admin = '$idx'"));
				}
				?>
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Edit User
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <form class="form-horizontal" id="form_admin2" name="form_admin2" method="post" action="<?php echo base_url('front/tambah_admin'); ?>">
                                      <fieldset>
                                        
                                         <div class="control-group">
                                          <label class="control-label" for="focusedInput">Nama</label>
                                          <div class="controls">
                                            <input id="nama_input" name="nama_input" type="text" class="form-control" placeholder="Inputkan nama admin .." required="required" value="<?php echo $isi[1]; ?>" />
                                            <span class="help-inline red" id="help_username_admin" style="display:none;">Please correct the error</span>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Username</label>
                                          <div class="controls">
                                            <input id="username_input" name="username_input" type="text" placeholder="Inputkan username admin .." required="required" class="form-control" value="<?php echo $isi[2]; ?>" />
                                            <input id="id_admin_input" name="id_admin_input" type="hidden" placeholder="Inputkan username admin .." required="required" value="<?php echo $isi[0]; ?>" />
                                            <span class="help-inline red" id="help_username_admin" style="display:none;">Please correct the error</span>
                                          </div>
                                        </div>
                                       
                                        <div class="control-group">
                                          <label class="control-label" for="optionsCheckbox2">Password</label>
                                          <div class="controls">
                                            <label>
                                              <input id="password_input" class="form-control" name="password_input" type="password" placeholder="Inputkan password admin .."  /> 
                                              <span class="help-inline red" id="help_password_admin" style="display:none;">Please correct the error</span>
                                            </label>
                                          </div>
                                        </div>
                                        
                                         <div class="control-group">
                                          <label class="control-label" for="optionsCheckbox2">Ulangi</label>
                                          <div class="controls">
                                            <label>
                                              <input id="ulangipassword_input" name="ulangipassword_input" class="form-control" type="password" placeholder="Inputkan kembali password .."  /> 
                                              <input id="aksi_admin_form" name="aksi_admin_form" type="hidden"   /> 
                                              <span class="help-inline red" id="help_ulangi_admin" style="display:none; color:#ff0000;">Password tidak sama</span>
                                            </label>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="optionsCheckbox2">Status</label>
                                          <div class="controls">
                                            <label>
                                             <select name="cmb_status" id="cmb_status" class="form-control">
                                             <option value="">-- Pilih Status --</option>
                                             <?php
											 if($isi['status'] == '0'){
											 ?>
                                             <option value="0" selected>Admin</option>
                                             <option value="1">Kepala Rumah Sakit</option>
                                             <?php
											 }
											 else{
											 ?>
                                             <option value="0">Admin</option>
                                             <option value="1" selected>Kepala Rumah Sakit</option>
                                             <?php
											 }
											 ?>
                                             </select>
                                              <span class="help-inline red" id="help_ulangi_admin" style="display:none; color:#ff0000;">Password tidak sama</span>
                                            </label>
                                          </div>
                                        </div>
                                        
                                          <div class="control-group">
                                          <label class="control-label" for="optionsCheckbox2">Email</label>
                                          <div class="controls">
                                            <label>
                                              <input id="email_input" name="email_input" class="form-control" type="email" placeholder="Inputkan email .." required="required" value="<?php echo $isi[4]; ?>" /> 
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
                                         <a href="<?php echo $basedx; ?>/viewdata/admin/"><button type="button" class="btn btn-default" data-dismiss="modal" style="float:right; margin-left:10px;">Close</button></a>
                                        <input type="submit" name="btn_submit_admin" id="btn_submit_admin" value="Submit" class="btn btn-primary " style="float:right;" />
                                        
                                        </div>
                                        </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
                <?php
				//}
				//else if($_GET['hal'] == 'tambah_kategori'){
			    ?>
                