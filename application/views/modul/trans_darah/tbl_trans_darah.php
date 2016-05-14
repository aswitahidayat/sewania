<?php

 $p      = new Paging;
                $batas  = 10;
                $posisi = $p->cariPosisi($batas);
	
                $no = $posisi+1;

//$jmldata=mysql_num_rows(mysql_query("select * from kelompok where kelompok like '%$cari%' or kode like '%$cari%'"));
                $jmldata=mysql_num_rows(mysql_query("select * from trans_darah"));
                $jmlhalaman  = $p->jumlahHalaman($jumlah, $batas);
                $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman , $cari , 'cari' , 'semua');

	            $a = 0;
?>
                
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><h2>Tabel Transaksi Darah Pendonor</h2></div>
                            </div>
                            
                            <?php
							if($sess_status == "0"){
							?>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $basedx; ?>/dir_pass/pendonor/tambah_pendonor"><button class="btn btn-success" id="btn_add_admin" data-toggle="modal" data-target="#myModal">Tambah Pendonor<i class="icon-plus icon-white"></i></button></a>
                                          <a href="<?php echo $basedx; ?>/dir_pass/lokasi_pendonor/tambah_lokasi"><button class="btn btn-success" id="btn_add_admin" data-toggle="modal" data-target="#myModal">Tambah Data Transaksi Darah<i class="icon-plus icon-white"></i></button></a>
                                      </div>
                             <?php
							 }
							 ?>       
                                      <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="<?php echo base_url('front/pdf_transaksi'); ?>">Save as PDF</a></li>
                                         </ul>
                                      </div>
                                   </div>
                                    <p>&nbsp;</p><p>&nbsp;</p>
                                    <div id="div_tbladmin">
               <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
				<thead>
					<tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tgl Darah</th>
                        <th>Gol Darah</th>
                        <th>Status</th>
                        <th>Lokasi Donor</th>
                        <th>Alamat Donor</th>
					</tr>
				</thead>
                <tbody id="tb_admin">
                <?php
				$q = mysql_query("select * from trans_darah order by id_trans_darah desc limit $posisi , $batas ");
				while($row = mysql_fetch_array($q)){
				$a++;
				$nm = mysql_fetch_array(mysql_query("select * from pendonor where id_pendonor = '$row[1]'"));
				$st = mysql_fetch_array(mysql_query("select * from kategori where id_kategori = '$row[4]'"));
				
				?>
                <tr class="baris_admin_btn" id="baris_admin_btn_<?php echo $row[0]; ?>">
                <td><?php echo $no; ?></td>
                <td class="baris_admin_username" id="baris_admin_nama_<?php echo $row[0]; ?>"><?php echo $nm[1]; ?></td>
                <td class="baris_admin_username" id="baris_admin_tanggal_<?php echo $row[0]; ?>"><?php echo tgl_indo($row[2]); ?></td>
                <td class="baris_admin_username" id="baris_admin_gol_<?php echo $row[0]; ?>"><?php echo $row[3]; ?></td>
                <td class="baris_admin_username" id="baris_admin_status_<?php echo $row[0]; ?>"><?php echo $st[1]; ?></td>
                <td><?php echo $row[5]; ?></td>
                <td><?php echo $row[6]; ?></td>
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