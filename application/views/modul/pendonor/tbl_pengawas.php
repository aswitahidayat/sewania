<?php

 $p      = new Paging;
                $batas  = 10;
                $posisi = $p->cariPosisi($batas);
	
                $no = $posisi+1;

//$jmldata=mysql_num_rows(mysql_query("select * from kelompok where kelompok like '%$cari%' or kode like '%$cari%'"));
                $jmlhalaman  = $p->jumlahHalaman($jumlah, $batas);
                $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman , $cari , 'cari' , 'semua');

	            $a = 0;
?>
                
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Tabel Pengawas</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#"><button class="btn btn-success" id="btn_add_admin" data-toggle="modal" data-target="#myModal">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="#">Print</a></li>
                                            <li><a href="#">Save as PDF</a></li>
                                            <li><a href="#">Export to Excel</a></li>
                                         </ul>
                                      </div>
                                   </div>
                                    
                                    <div id="div_tbladmin">
               <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
				<thead>
					<tr>
                        <th>No</th>
						<th>Nama</th>
						<th>Telp</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>TPS</th>
						<th>Aksi</th>
					</tr>
				</thead>
                <tbody id="tb_admin">
                <?php
				foreach($hasil->result() as $row){
				
				$a++;
				$id = $row->id_pengawas;
				$tp = mysql_fetch_array(mysql_query("select * from tps where pengawas = '$id'"));
				$tpsx = $tp[1];
				$qq2 = mysql_query("select * from tps where pengawas = '$id'");
				
				if(mysql_num_rows($qq2) == 0){
				$tpsx = " - ";
				}
				else{
				
				while($kl = mysql_fetch_array($qq2)){
				 $tsp .= "- ".$kl[1];
				}
				
				}
				?>
                <tr class="baris_admin_btn" id="baris_admin_btn_<?php echo $id; ?>">
                <td><?php echo $no; ?></td>
                <td class="baris_admin_username" id="baris_admin_username_<?php echo $id; ?>"><?php echo $row->nama_pengawas; ?></td>
                <td class="baris_admin_telp" id="baris_admin_telp_<?php echo $id; ?>"><?php echo $row->telp; ?></td>
                <td class="baris_admin_email" id="baris_admin_email_<?php echo $id; ?>"><?php echo $row->email; ?></td>
                <td class="baris_admin_alamat" id="baris_admin_alamat_<?php echo $id; ?>"><?php echo $row->alamat; ?></td>
                <td style="display:none;" class="baris_admin_tpsid" id="baris_admin_tpsid_<?php echo $id; ?>"><?php echo $tp[0]; ?></td>
                <td class="baris_admin_tps" id="baris_admin_tps_<?php echo $id; ?>"><?php echo $tsp.'ss'; ?></td>
                <td><?php echo '<a href="#" class="edit_admin_btn" id="edit_admin_btn_'.$id.'_ubah">edit</a> || <a href="#" class="delete_admin_btn" id="delete_admin_btn_'.$id.'_delete" style="cursor:pointer" onclick="index_admin=this.id">delete</a>'; ?></td>
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