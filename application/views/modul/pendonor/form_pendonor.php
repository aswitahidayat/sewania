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
				$isi = mysql_fetch_array(mysql_query("select * from pendonor where id_pendonor = '$idx'"));
				//$sts = mysql_fetch_array(mysql_query("select * from lokasi_donor where id_lokasi_donor = '$idx'"));
				}
				?>
               <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Pendonor
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form class="form-horizontal" id="form_admin2" name="form_admin2" method="post" action="<?php echo base_url('front/tambah_pendonor'); ?>">
                                      <fieldset>
                                        
                                         <div class="control-group">
                                          <label class="control-label" for="focusedInput">Nama</label>
                                          <div class="controls">
                                            <input id="nama_input" name="nama_input" type="text" class="form-control" placeholder="Inputkan nama pendonor .." required="required" value="<?php echo $isi[1]; ?>" />
                                            <span class="help-inline red" id="help_username_admin" style="display:none;">Please correct the error</span>
                                          </div>
                                        </div>
                                        
                                       <div class="control-group">
                                          <label class="control-label" for="focusedInput">Email</label>
                                          <div class="controls">
                                            <input id="email_input" name="email_input" class="form-control" type="email" placeholder="Inputkan email .." required="required" value="<?php echo $isi[4]; ?>"  /> 
                                              <input id="id_admin" name="id_admin" class="form-control" type="hidden" placeholder="Inputkan email .."  value="<?php echo $isi[0]; ?>"  />
                                            <span class="help-inline red" id="help_username_admin" style="display:none;">Please correct the error</span>
                                          </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">No telpon</label>
                                          <div class="controls">
                                            <input id="kontak_input" name="kontak_input" type="text" class="form-control" placeholder="Inputkan kontak pendonor .." required="required" value="<?php echo $isi['kontak']; ?>" />
                                            <span class="help-inline red" id="help_username_admin" style="display:none;">Please correct the error</span>
                                          </div>
                                        </div>
                                        
                                         <div class="control-group">
                                          <label class="control-label" for="focusedInput">Tempat Donor</label>
                                          <div class="controls">
                                          <?php
										  if($sts['status_update'] == 'y'){
										  ?>
                                            <input id="nama_tempat" name="nama_tempat" class="form-control" type="text" placeholder="Inputkan nama tempat .." required="required" value="<?php echo $sts[1]; ?>" disabled="disabled" />
                                          <?php
										  }
										  else{
										  ?>
                                            <input id="nama_tempat" name="nama_tempat" class="form-control" type="text" placeholder="Inputkan nama tempat .." required="required"  />
                                          <?php
										  }
										  ?>
                                            <span class="help-inline red" id="help_username_admin" style="display:none;">Please correct the error</span>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Alamat Donor</label>
                                          <div class="controls">
                                          <?php
										  if($sts['status_update'] == 'y'){
										  ?>
                                            <input id="alamat_donor" name="alamat_donor" type="text" placeholder="Inputkan alamat pendonor .." required="required" value="<?php echo $sts[2]; ?>" disabled="disabled" class="form-control"  style="width:90%;" />
                                          <?php
										  }
										  else{
										  ?>
                                            <input id="alamat_donor" class="form-control" name="alamat_donor" type="text" placeholder="Inputkan alamat pendonor .."  required="required" style="width:90%;"  />
                                          <?php
										  }
										  ?>
                                            
                                            <span class="help-inline red" id="help_username_admin" style="display:none;">Please correct the error</span>
                                          </div>
                                        </div>
                                        
                                         <div class="control-group">
                                          <label class="control-label" for="focusedInput">Alamat Pendonor</label>
                                          <div class="controls">
                                            <textarea class="form-control" type="text" placeholder="Inputkan Alamat .." required="required" value="<?php echo $isi[4]; ?>" id="alamat_pendonor" name="alamat_pendonor" ><?php echo $isi['alamat']; ?></textarea>
                                            <span class="help-inline red" id="help_username_admin" style="display:none;">Please correct the error</span>
                                          </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="control-group" style="display:none;">
                                          <label class="control-label" for="optionsCheckbox2">Tanggal Daftar</label>
                                          <div class="controls">
                                            <label>
                                              <input id="tanggal_daftar" name="tanggal_daftar" class="form-control" type="date" placeholder="Inputkan Kontak .." value="<?php echo date('Y-m-d'); ?>"  style="width:500px;"/> 
                                              <span class="help-inline red" id="help_ulangi_email" style="display:none; color:#ff0000;">Inputkan email yang valid</span>
                                            </label>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Pekerjaan</label>
                                          <div class="controls">
                                            <input id="pekerjaan_input" name="pekerjaan_input" class="form-control" type="text" placeholder="Inputkan pekerjaan .." required="required" value="<?php echo $isi['pekerjaan']; ?>"  /> 
                                            <span class="help-inline red" id="help_username_admin" style="display:none;">Please correct the error</span>
                                          </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="optionsCheckbox2">Golongan Darah</label>
                                          <div class="controls">
                                            <label>
                                              <select class="form-control" name="gol_darah" id="gol_darah">
                                              <option value="">-- Pilih Golongan Darah --</option>
                                              <?php
											  $arr = array("-","A","B","AB","0");
											  foreach($arr as $val){
											  if($isi['gol_darah'] == $val){
											  ?>
                                             <option value="<?php echo $val; ?>" selected="selected"><?php echo $val; ?></option>
                                              <?php
											  }
											  else{
											  ?>
                                             <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                                              <?php
											 }
											 }
											 ?>
                                             </select>
                                              <span class="help-inline red" id="help_ulangi_email" style="display:none; color:#ff0000;">Inputkan email yang valid</span>
                                            </label>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group" style="display:none;">
                                          <label class="control-label" for="optionsCheckbox2" >Tanggal Donor</label>
                                          <div class="controls">
                                            <label>
                                              <input id="tanggal_donor" name="tanggal_donor" class="form-control" type="date" placeholder="Inputkan Tanggal Donor .."  value="<?php echo date('Y-m-d'); ?>" /> 
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
                                         <a href="<?php echo $basedx; ?>/viewdata/pendonor/"><button type="button" class="btn btn-default" data-dismiss="modal" style="float:right; margin-left:10px;">Close</button></a>
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
                