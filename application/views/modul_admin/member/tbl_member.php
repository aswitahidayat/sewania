<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
	      <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3>List Kota</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<?php
				//if($_GET['hal'] == 'edit_kategori'){
					//$isi = mysql_fetch_array(mysql_query("select * from kategori_obat where id_kategori_obat = '$_GET[id]'"));
			    if($this->uri->segment(5) != ''){
				$idx = $this->uri->segment(5);
				$isi = mysql_fetch_array(mysql_query("select * from kota where id_kota = '$idx'"));
				}
				?>
						
						<div class="tabbable">
						<ul class="nav nav-tabs">
                        <?php
						if($sg == "dir_pass"){
						?>
						  <li  class="active">
						    <a href="#formcontrols" data-toggle="tab">Form Controls</a>
						  </li>
						  <li><a href="#jscontrols" data-toggle="tab">JS Controls</a></li>
                        <?php
						}
						else{
						?>
						  <li >
						    <a href="#formcontrols" data-toggle="tab">Form Controls</a>
						  </li>
						  <li   class="active"><a href="#jscontrols" data-toggle="tab">JS Controls</a></li>
                        <?php
						}
						?>
						</ul>
						
						<br>
						
							<div class="tab-content">
                            
								<?php
								if($sg == "dir_pass"){
								?>
								<div class="tab-pane active" id="formcontrols">
                                <?php
								}
								else{
								?>
								<div class="tab-pane" id="formcontrols">
                                <?php
								}
								?>
								<form id="edit-profile" class="form-horizontal" action="<?php echo base_url('sindrom/tambah_kota'); ?>" method="post">
									<fieldset>
										
                                        <div class="control-group">											
											<label class="control-label" for="username">Provinsi</label>
											<div class="controls">
												<select name="cmb_provinsi" class="form-control">
                                                  <?php
												  $qx = mysql_query("select * from lokasi");
												  while($row = mysql_fetch_array($qx)){
												  if($row[0] == $isi[1]){
												  ?>
                                                  <option value="<?php echo $row[0]; ?>" selected="selected"><?php echo $row[1]; ?></option>
                                                  <?php
												  }
												  else{
												  ?>
                                                  <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                                                  <?php
												  }
												  }
												  ?>
                                                </select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
                                        
										<div class="control-group">											
											<label class="control-label" for="username">Nama Kota</label>
											<div class="controls">
												<input id="nama_input" name="nama_input" type="text" class="form-control" placeholder="Inputkan nama Kategori .." required="required" value="<?php echo $isi[2]; ?>" />
                                            <input id="id_kategori" name="id_kategori" type="hidden" placeholder="Inputkan username admin .." required="required" value="<?php echo $isi[0]; ?>" />
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										
										 <br />
										
											
										<div class="form-actions">
											 <a href="<?php echo base_url('sindrom/viewdata/kota/20/'); ?>"><button type="button" class="btn btn-default" data-dismiss="modal" style="float:right; margin-left:10px;">Close</button></a>
                                        <input type="submit" name="btn_submit_admin" id="btn_submit_admin" value="Submit" class="btn btn-primary " style="float:right;" />
										</div> <!-- /form-actions -->
									</fieldset>
								</form>
								</div>
								
                                <?php
								if($sg == "viewdata"){
								?>
								<div class="tab-pane active" id="jscontrols">
                                <?php
								}
								else{
								?>
								<div class="tab-pane" id="jscontrols">
                                <?php
								}
								?>
                                
                                 <div class="btn-group">
                                         <a href="<?php echo base_url("sindrom/dir_pass/kota/tambah_kota/"); ?>"><button class="btn btn-success" id="btn_add_admin" >Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <p></p>
									<form id="edit-profile2" class="form-vertical">
										<fieldset>
											
                                            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama </th>
                     <th>Telp </th>
                     <th>Gender </th>
                     <th>About </th>
                     <th>Email </th>
                     <th>Tanggal </th>
                     <th>Status </th>
					 <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
				  $no = 1;
				foreach($hasil as $row){
				$a++;
				$id = $row->id_kategori;
				$bsdx = $basedx."/dir_pass/lokasi/edit_lokasi/".$row->id_lokasi;
				$del = $basedx."/delete_data/lokasi/".$row->id_lokasi.'/lokasi';
				$rt = $row->id_lokasi;
				$ac = $row->aktif;
				
				if($ac == 'y'){
				$img = "<img src='".base_url('ivory_src/images/ya_rzl.png')."' />";
				}
				else{
				$img = "<img src='".base_url('ivory_src/images/cross.png')."' />";
				}
				
				$pr = mysql_fetch_array(mysql_query("select * from lokasi where id_lokasi = '$rt'"));
				?>
                <tr class="baris_admin_btn" id="baris_admin_btn_<?php echo $id; ?>">
                <td><?php echo $no; ?></td>
                <td class="baris_admin_username" id="baris_admin_nama_<?php echo $id; ?>"><?php echo $row->first_name." ".$row->last_name; ?></td>
                <td class="baris_admin_username" id="baris_admin_nama_<?php echo $id; ?>"><?php echo $row->phone; ?></td>
                <td class="baris_admin_username" id="baris_admin_nama_<?php echo $id; ?>"><?php echo $row->gender; ?></td>
                <td class="baris_admin_username" id="baris_admin_nama_<?php echo $id; ?>"><?php echo $row->about_you; ?></td>
                <td class="baris_admin_username" id="baris_admin_nama_<?php echo $id; ?>"><?php echo $row->email; ?></td>
                <td class="baris_admin_username" id="baris_admin_nama_<?php echo $id; ?>"><?php echo $row->tgl_daftar; ?></td>
                <td class="baris_admin_username" id="baris_admin_nama_<?php echo $id; ?>"><?php echo $img; ?></td>
                <td><?php echo '<a href="'.base_url("sindrom/dir_pass/kota/edit_kota/".$row->id_kota).'" class="edit_admin_btn" id="edit_admin_btn_'.$id.'_ubah">edit</a> || <a href="'.base_url("sindrom/delete_data/kota/".$row->id_kota.'/kota').'" class="delete_admin_btn" id="delete_admin_btn_'.$id.'_delete" style="cursor:pointer" onclick="return confirm(\' Apakah anda yakin akan menghapus data ? \'); ">delete</a>'; ?></td>
                
                </tr>
                <?php
				$no++;
				}
				?>
                </tbody>
              </table>
              
										</fieldset>
									</form>
								</div>
								
							</div>
						  
						  
						</div>
						
						
						
						
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
	      		
		    </div> <!-- /span8 -->
	      	
	      	
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->