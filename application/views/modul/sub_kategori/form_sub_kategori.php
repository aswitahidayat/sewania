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
				$isi = mysql_fetch_array(mysql_query("select * from kategori where id_kategori = '$idx'"));
				}
				?>
                <div class="panel panel-default">
                        <div class="panel-heading">
                        <?php
						if($this->uri->segment(4) == 'tambah_kategori'){
                            echo "Form Tambah Kategori User";
						}
						else{
						    echo "Form Ubah Kategori User";
						}
						?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <form class="form-horizontal" id="form_admin2" name="form_admin2" method="post" action="<?php echo base_url('sindrom/tambah_kategori'); ?>">
                                      <fieldset>
                                        
                                         <div class="control-group">
                                          <label class="control-label" for="focusedInput">Nama</label>
                                          <div class="controls">
                                            <input id="nama_input" name="nama_input" type="text" class="form-control" placeholder="Inputkan nama Kategori .." required="required" value="<?php echo $isi[1]; ?>" />
                                            <input id="id_kategori" name="id_kategori" type="hidden" placeholder="Inputkan username admin .." required="required" value="<?php echo $isi[0]; ?>" />
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
                                         <a href="<?php echo $basedx; ?>/viewdata/kategori/"><button type="button" class="btn btn-default" data-dismiss="modal" style="float:right; margin-left:10px;">Close</button></a>
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
                