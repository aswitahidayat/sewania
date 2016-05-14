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
                                <div class="muted pull-left">Tabel Admin</div>
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
                                            <li><a href="<?php echo base_url('front/pdf'); ?>">Save as PDF</a></li>
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
                        <th>Tgl Daftar</th>
                        <th style="width:30px;">Gol</th>
                        <th>Pekerjaan</th>
                        <th style="width:30px;">Jml</th>
						<th style="width:80px;">Aksi</th>
					</tr>
				</thead>
                <tbody id="tb_admin">
                <?php
				foreach($hasil->result() as $row){
				$tsp = "";
				$a++;
				$id = $row->id_pendonor;
				
				$jm = mysql_num_rows(mysql_query("select * from history where id_pendonor = '$row->id_pendonor'"));
				$trans = mysql_num_rows(mysql_query("select * from trans_darah where id_pendonor = '$row->id_pendonor'"));
				?>
                <tr class="baris_admin_btn" id="baris_admin_btn_<?php echo $id; ?>">
                <td><?php echo $no; ?></td>
                <td class="baris_admin_username" id="baris_admin_nama_<?php echo $id; ?>"><?php echo $row->nama; ?></td>
                <td class="baris_admin_telp" id="baris_admin_kontak_<?php echo $id; ?>"><?php echo $row->kontak; ?></td>
                <td class="baris_admin_email" id="baris_admin_email_<?php echo $id; ?>"><?php echo $row->email; ?></td>
                <td class="baris_admin_alamat" id="baris_admin_alamat_<?php echo $id; ?>" ><span id="baris2_admin_alamat_<?php echo $id; ?>"><?php echo $row->alamat; ?></span><div style="display:none;"><?php echo "tes"; ?></div><span id="sp_admin_status_<?php echo $id; ?>"></span></td>
                
                <td class="baris_admin_tps" id="baris_admin_tps_<?php echo $id; ?>" style="width:90px;"><?php echo tgl_indo($row->tanggal_daftar); // $tpsx;  ?></td>
                <td class="baris_admin_tps" id="baris_admin_goldar_<?php echo $id; ?>" style="width:20px;"><?php echo $row->gol_darah; // $tpsx;  ?></td>
                <td class="baris_admin_tps" id="baris_admin_pekerjaan_<?php echo $id; ?>"><?php echo $row->pekerjaan; // $tpsx;  ?></td>
                <td class="baris_admin_tps" id="baris_admin_jumlah_<?php echo $id; ?>"><span id="sp_jml_donor_<?php echo $id; ?>"><?php echo $trans.'</span> X donor'; // $tpsx;  ?></td>
                <td><?php echo '<center><a href="#" class="edit_admin_btn" id="edit_admin_btn_'.$id.'_ubah"><img src="'.base_url('ivory_src/images/edit.png').'" title="edit" /></a> || <a href="#" class="delete_admin_btn" id="delete_admin_btn_'.$id.'_delete"   style="cursor:pointer" onclick="index_admin=this.id"><img src="'.base_url('ivory_src/images/hapus.png').'" title="delete" /></a></center>';
				?>
                <!--<p></p><center><a href="#" class="validasi_admin_btn" id="validasi_admin_btn_'.$id.'_delete"   style="cursor:pointer; margin-top:-30px;" onclick="index_admin=this.id"><img src="'.base_url('ivory_src/images/ya_rzl.png').'" title="validasi" /></a></center>'; ?> -->
				</td>
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