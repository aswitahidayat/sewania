<?php

 $p      = new Paging;
                $batas  = 10;
                $posisi = $p->cariPosisi($limit);
	
                $no = $posisi+1;

//$jmldata=mysql_num_rows(mysql_query("select * from kelompok where kelompok like '%$cari%' or kode like '%$cari%'"));
                $jmlhalaman  = $p->jumlahHalaman($jumlah, $limit);
                $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman , $cari , 'cari' , 'semua');

	            $a = 0;
?>
                
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
	      <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3>Kategori Jasa</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<?php
				//if($_GET['hal'] == 'edit_kategori'){
					//$isi = mysql_fetch_array(mysql_query("select * from kategori_obat where id_kategori_obat = '$_GET[id]'"));
			    if($this->uri->segment(5) != ''){
				$idx = $this->uri->segment(5);
				$isi = mysql_fetch_array(mysql_query("select * from kategori where id_kategori = '$idx'"));
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
								<form id="edit-profile" class="form-horizontal" action="<?php echo base_url('sindrom/tambah_kategori'); ?>" method="post">
									<fieldset>
										
										<div class="control-group">											
											<label class="control-label" for="username">Nama Kategori</label>
											<div class="controls">
												<input id="nama_input" name="nama_input" type="text" class="form-control" placeholder="Inputkan nama Kategori .." required="required" value="<?php echo $isi[1]; ?>" />
                                            <input id="id_kategori" name="id_kategori" type="hidden" placeholder="Inputkan username admin .." required="required" value="<?php echo $isi[0]; ?>" />
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										
										 <br />
										
											
										<div class="form-actions">
											 <a href="<?php echo $basedx; ?>/viewdata/kategori/"><button type="button" class="btn btn-default" data-dismiss="modal" style="float:right; margin-left:10px;">Close</button></a>
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
                                         <a href="<?php echo base_url("sindrom/dir_pass/kategori/tambah_kategori/"); ?>"><button class="btn btn-success" id="btn_add_admin" >Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <p></p>
                                      <form method="post" action="<?php echo base_url('sindrom/viewdata/sub_kategori'); ?>">
                        <fieldset style="border:1px solid #CCCCCC; margin:10px; height:auto; padding:15px;">
                        
                                      <?php
						$a = 0;
						$vv = 0;
						foreach($kategori as $row_kat){
						if($_POST['chk_nama'][$a] == $row_kat->id_kategori){
						
						
						 ?>
                         <input type="checkbox" checked="checked" name="chk_nama[]" value="<?php echo $row_kat->id_kategori; ?>" /> <?php echo $row_kat->nama; ?> &nbsp;
                         <?php
						 $a++;
						 }
						 else{
						 ?>
                         <input type="checkbox"  name="chk_nama[]" value="<?php echo $row_kat->id_kategori; ?>" /> <?php echo $row_kat->nama; ?>
                          &nbsp; 
                         <?php
						 }
						 
						}
						?>
                        <br />
                        <input type="submit" name="tampilkan" value="Tampilkan" class="btn btn-success" />
                        </fieldset>
                        <p></p>
									<form id="edit-profile2" class="form-vertical">
										<fieldset>
											
                                            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama </th>
                     <th>Kategori </th>
					 <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
				foreach($hasil as $row){
				$a++;
				$id = $row->id_kategori;
				$bsdx = $basedx."/dir_pass/kategori/edit_kategori/".$row->id_kategori;
				$del = $basedx."/delete_data/kategori/".$row->id_kategori.'/kategori';
				$kat = mysql_fetch_array(mysql_query("select * from kategori where id_kategori = '$id'"));
				?>
                <tr class="baris_admin_btn" id="baris_admin_btn_<?php echo $id; ?>">
                <td><?php echo $no; ?></td>
                <td class="baris_admin_username" id="baris_admin_nama_<?php echo $id; ?>"><?php echo $row->nama; ?></td>
                <td class="baris_admin_usernames" id="baris_admin_namas_<?php echo $id; ?>"><?php echo $kat[1]; ?></td>
                <td><?php echo '<a href="'.base_url("sindrom/dir_pass/kategori/edit_kategori/".$row->id_kategori).'" class="edit_admin_btn" id="edit_admin_btn_'.$id.'_ubah">edit</a> || <a href="'.base_url("sindrom/delete_data/kategori/".$row->id_kategori.'/kategori').'" class="delete_admin_btn" id="delete_admin_btn_'.$id.'_delete" style="cursor:pointer" onclick="return confirm(\' Apakah anda yakin akan menghapus data ? \'); ">delete</a>'; ?></td>
                
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
						
						
						
						 <?php
echo "<center><div class=paging>$linkHalaman</div></center><br>";
?>
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
	      		
		    </div> <!-- /span8 -->
	      	
	      	
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->