<?php

 $p      = new Paging;
                $batas  = 10;
                $posisi = $p->cariPosisi($batas);
	
                $no = $posisi+1;

//$jmldata=mysql_num_rows(mysql_query("select * from kelompok where kelompok like '%$cari%' or kode like '%$cari%'"));
                if(!isset($_POST['submit'])){
				$q = mysql_query("select * from pendonor");
				}
				else{
				$q = mysql_query("select * from pendonor where nama like '%$_POST[t_nama]%'");
				}
				
                $jmlhalaman  = $p->jumlahHalaman(mysql_num_rows($q), $batas);
                $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman , $cari , 'cari' , 'semua');

	            $a = 0;
?>
                
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><h2>Tabel Pendonor</h2></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                    <?php
							          if($sess_status == "0"){
							        ?>
                                      <div class="btn-group">
                                         <a href="<?php echo $basedx; ?>/dir_pass/pendonor/tambah_pendonor"><button class="btn btn-success" id="btn_add_admin" data-toggle="modal" data-target="#myModal">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <?php
									  }
									  ?>
                                      
                                      <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="<?php echo base_url('front/pdf'); ?>">Save as PDF</a></li>
                                         </ul>
                                      </div>
                                   </div>
                                    <p>&nbsp;</p><p>&nbsp;</p>
                                    
                                    <form method="post" action="<?php echo base_url('front/viewdata/pendonor?module=&halaman=1'); ?>">Cari Berdasarkan Nama : <input type="text" name="t_nama" style="width:60%; height:30px; padding:2px;" placeholder="Masukkan nama ... " />  <input type="submit" value="Submit" name="submit" /></form>
                                    <p>&nbsp;</p>
                                    
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover"  style="width:100%;">
				<thead>
					<tr>
                        <th>No</th>
                        <th>Nama</th>
						<th>Alamat</th>
						<th>Kontak</th>
                        <th>Email</th>
                        <th>Tanggal</th>
                        <th>Gol Darah</th>
                        <th>Pekerjaan</th>
                        <th>Tanggal_Donor</th>
                       <?php
				   if($sess_status == "0"){
				 ?>
						<th>Aksi</th>
                        <?php
						}
						?>
					</tr>
				</thead>
                <tbody id="tb_admin">
                <?php
				if(!isset($_POST['submit'])){
				$q = mysql_query("select * from pendonor order by id_pendonor desc limit $posisi , $batas");
				}
				else{
				$q = mysql_query("select * from pendonor order by id_pendonor desc  where nama like '%$_POST[t_nama]%' limit $posisi , $batas");
				}
				while($row = mysql_fetch_array($q)){
				//foreach($hasil->result() as $row){
				$a++;
				$id = $row[id_admin];
				
				
				
				$bsdx = $basedx."/dir_pass/pendonor/edit_pendonor/".$row[id_pendonor];
				$del = $basedx."/delete_data/pendonor/".$row[id_pendonor].'/pendonor';
				?>
                <tr class="baris_admin_btn" id="baris_admin_btn_<?php echo $id; ?>">
                <td><?php echo $no; ?></td>
                <td class="baris_admin_username" id="baris_admin_nama_<?php echo $id; ?>"><?php echo $row[nama]; ?></td>
                <td class="baris_admin_nama" id="baris_admin_username_<?php echo $id; ?>"><?php echo $row[alamat]; ?></td>                
                <td class="baris_admin_email" id="baris_admin_email_<?php echo $id; ?>"><?php echo $row[kontak]; ?></td>
               
                <td class="baris_admin_email" id="baris_admin_email_<?php echo $id; ?>"><?php echo $row[email]; ?></td>
                <td class="baris_admin_email" id="baris_admin_email_<?php echo $id; ?>"><?php echo tgl_indo($row[tanggal_daftar]); ?></td>
                <td class="baris_admin_email" id="baris_admin_email_<?php echo $id; ?>"><?php echo $row[gol_darah]; ?></td>
                <td class="baris_admin_email" id="baris_admin_email_<?php echo $id; ?>"><?php echo $row[pekerjaan]; ?></td>
                <td class="baris_admin_email" id="baris_admin_email_<?php echo $id; ?>"><?php echo tgl_indo($row[tanggal_donor]); ?></td>
                 <?php
				   if($sess_status == "0"){
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
            </div>
            <?php
echo "<center><div class=paging>$linkHalaman</div></center><br>";
?>
                                    </div>
                                </div>
                            </div>
                        </div>