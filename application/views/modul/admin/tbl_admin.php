<?php

 $p      = new Paging;
                $batas  = 10;
                $posisi = $p->cariPosisi($batas);
	
                $no = $posisi+1;

                if($sess_status == '0'){
                $jmldata=mysql_num_rows(mysql_query("select * from admin"));
				}
				else{
				$jmldata=mysql_num_rows(mysql_query("select * from admin where id_admin = '$sess_id'"));
				}
				
                $jmlhalaman  = $p->jumlahHalaman($jumlah, $batas);
                $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman , $cari , 'cari' , 'semua');

	            $a = 0;
?>
                
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><h2>Tabel Admin</h2></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                   <?php
								   if($sess_status == '0'){
								   ?>
                                      <div class="btn-group">
                                         <a href="<?php echo $basedx; ?>/dir_pass/admin/tambah_admin"><button class="btn btn-success" id="btn_add_admin" data-toggle="modal" data-target="#myModal">Add New <i class="icon-plus icon-white"></i></button></a>
                                         <?php
										 }
										 ?>
                                      </div>
                                      
                                   </div>
                                    <p>&nbsp;</p><p>&nbsp;</p>
                                    <div id="div_tbladmin">
               <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
				<thead>
					<tr>
                        <th>No</th>
                        <th>Nama</th>
						<th>Username</th>
						<th>Email</th>
                        <th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
                <tbody id="tb_admin">
                <?php
				if($sess_status == '0'){
                $q=mysql_query("select * from admin");
				}
				else{
				$q=mysql_query("select * from admin where id_admin = '$sess_id'");
				}
				while($row = mysql_fetch_array($q)){
				$a++;
				$id = $row[id_admin];
				
				
				if($row[status] == 0){
				   $sts = "Admin";
				}
				else{
	               $sts = "Kepala Rumah Sakit";			
				}
				
				$bsdx = $basedx."/dir_pass/admin/edit_admin/".$row[id_admin];
				$del = $basedx."/delete_data/admin/".$row[id_admin].'/admin';
				?>
                <tr class="baris_admin_btn" id="baris_admin_btn_<?php echo $id; ?>">
                <td><?php echo $no; ?></td>
                <td class="baris_admin_username" id="baris_admin_nama_<?php echo $id; ?>"><?php echo $row[nama]; ?></td>
                <td class="baris_admin_nama" id="baris_admin_username_<?php echo $id; ?>"><?php echo $row[username]; ?></td>                
                <td class="baris_admin_email" id="baris_admin_email_<?php echo $id; ?>"><?php echo $row[email]; ?></td>
                <td class="baris_admin_status" id="baris_admin_status_<?php echo $id; ?>"><?php echo $sts; ?><span id="sp_admin_status_<?php echo $id; ?>" style="display:none;"><?php echo $row[status] ; ?></span></td>
                <?php
				if($sess_status == '1'){
				?>
                <td><?php echo '<a href="'.$bsdx.'" class="edit_admin_btn" id="edit_admin_btn_'.$id.'_ubah">edit</a>'; ?></td>
                <?php
				}
				else{
				?>
                <td><?php echo '<a href="'.$bsdx.'" class="edit_admin_btn" id="edit_admin_btn_'.$id.'_ubah">edit</a> || <a href="'.$del.'" class="delete_admin_btn" id="delete_admin_btn_'.$id.'_delete" style="cursor:pointer" onclick="return confirm(\' Apakah anda yakin akan menghapus data ? \'); ">delete</a>'; ?></td>
                <?php
				}
				?>
                
                </tr>
                <?php
				$no++;
				}
				?>
                </tbody>
			</table>
            <?php
echo "<center><div class=paging>$linkHalaman</div></center><br>";
?>
                                    </div>
                                </div>
                            </div>
                        </div>