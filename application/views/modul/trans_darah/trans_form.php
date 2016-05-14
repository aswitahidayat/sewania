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
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Tambah Transaksi Darah
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <form class="form-horizontal" id="form_admin2" name="form_admin2" method="post" action="<?php echo base_url('front/tambah_trans'); ?>">
                                      <fieldset>
                                        
                                         <div class="control-group">
                                          <label class="control-label" for="focusedInput">Nama</label>
                                          <div class="controls">
                                            <input id="nama_input" name="nama_input" type="text" placeholder="Inputkan nama pendonor .." required="required" onblur="jQuery('#t_holder_nama').hide();" class="form-control" /> <input id="id_input" name="id_input" type="hidden"  required="required" /><input id="t_idx" name="t_idx" type="hidden" placeholder="Inputkan id .." required="required"  /><input id="act_input" name="act_input" type="hidden" placeholder="Inputkan id .." required="required"  />
                                           <div id="t_holder_nama" class="t_holder_nama" style="width:40%; height:150px; overflow:auto; background-color:#ffffff; position:absolute; z-index:0; border:1px solid #999999; display:none;"><ul style="list-style:none; margin:2px; padding:2px;" id="ul_holder_pendonor"></ul></div>
                                          </div>
                                        </div>
                                        
                                         <div class="control-group">
                                          <label class="control-label" for="optionsCheckbox2">Tanggal Donor</label>
                                          <div class="controls">
                                            <label>
                                             <input id="tanggal_input" name="tanggal_input" type="date" placeholder="Inputkan tanggal .." required="required" disabled="disabled" value="<?php echo date('Y-m-d'); ?>" class="form-control" />
                                              <span class="help-inline red" id="help_ulangi_email" style="display:none; color:#ff0000;">Inputkan email yang valid</span>
                                            </label>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="optionsCheckbox2">Golongan Darah : </label>
                                          <div class="controls">
                                            <label>
                                              <select id="gol_input" name="gol_input" class="form-control">
                                          <?php
										  $arr = array("AB" , "O" , "A" , "B");
										  foreach($arr as $val){
										  echo "<option value='$val'>$val</option>";
										  }
										  ?>
                                          </select>
                                              <span class="help-inline red" id="help_ulangi_email" style="display:none; color:#ff0000;">Inputkan email yang valid</span>
                                            </label>
                                          </div>
                                        </div>
                                        
                                         <div class="control-group">
                                          <label class="control-label" for="focusedInput">Tempat Donor</label>
                                          <div class="controls">
                                           <?php
										  if($sts['status_update'] == 'y'){
										  ?>
                                            <input id="nama_tempat" class="form-control" name="nama_tempat" type="text" placeholder="Inputkan nama tempat .." required="required" value="<?php echo $sts[1]; ?>" disabled="disabled" />
                                          <?php
										  }
										  else{
										  ?>
                                            <input  class="form-control" id="nama_tempat2" name="nama_tempat2" type="text" placeholder="Inputkan nama tempat .." required="required"  /> 
                                          <?php
										  }
										  ?>
                                            <span class="help-inline red" id="help_username_admin" style="display:none;">Please correct the error</span>
                                          </div>
                                        </div>
                                        
                                         <div class="control-group">
                                          <label class="control-label" for="optionsCheckbox2">Alamat</label>
                                          <div class="controls">
                                            <label>
                                              <?php
										  if($sts['status_update'] == 'y'){
										  ?>
                                            <input id="alamat_donor"  class="form-control" name="alamat_donor" type="text" placeholder="Inputkan alamat_donor .." required="required" value="<?php echo $sts[2]; ?>" disabled="disabled" />
                                          <?php
										  }
										  else{
										  ?>
                                            <input id="alamat_donor2"  class="form-control" name="alamat_donor2" type="text" placeholder="Inputkan alamat_donor .." required="required"  /> 
                                          <?php
										  }
										  ?>
                                              <span class="help-inline red" id="help_ulangi_email" style="display:none; color:#ff0000;">Inputkan email yang valid</span>
                                            </label>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="optionsCheckbox2">Tanggal Daftar</label>
                                          <div class="controls">
                                            <label>
                                              <select id="status_input" name="status_input"  class="form-control">
                                          <?php
										  $qq = mysql_query("select * from kategori");
										  while($rr = mysql_fetch_array($qq)){
										  echo "<option value='$rr[0]'>$rr[1]</option>";
										  }
										  ?>
                                          </select>
                                              <span class="help-inline red" id="help_ulangi_email" style="display:none; color:#ff0000;">Inputkan email yang valid</span>
                                            </label>
                                          </div>
                                        </div>
                                        
                                        
                     
                                         <div class="modal-footer">
                                         <div class="div_success" style="float:left; color:#00CC00; display:none; "><img src="<?php echo $url; ?>images/ya_rzl.png" /> <b>Success</b></div>
                                         <a href="<?php echo $basedx; ?>/dir_pass/lokasi_pendonor/"><button type="button" class="btn btn-default" data-dismiss="modal" style="float:right; margin-left:10px;">Close</button></a>
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
                