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
                                         
                                      </div>
                                      
                                   </div>
                                    
                                    <p></p>
                                   
                                    <div id="div_tbladmin">
               <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
				<thead>
					<tr>
                        <th>No</th>
						<th>Nama</th>
						<th>No Tujuan</th>
                        <th>Tanggal</th>
					</tr>
				</thead>
                <tbody id="tb_admin">
                <?php
				
				$q = mysql_query("select * from sentitems");
				
				
				while($row=mysql_fetch_array($q)){
				$tsp = "";
				$a++;
				//$id = $row->id_pendonor;
				
				$jm = mysql_fetch_array(mysql_query("select * from pendonor where kontak = '$row[DestinationNumber]'"));
				
				?>
                <tr class="baris_admin_btn" id="baris_admin_btn_<?php echo $id; ?>">
                <td><?php echo $no; ?></td>
                <td class="baris_admin_username2" id="baris_admin_nama_<?php echo $id; ?>"><?php echo $jm[1] ?></td>
                <td class="baris_admin_username" id="baris_admin_nama_<?php echo $id; ?>"><?php echo $row['DestinationNumber']; ?></td>
                <td class="baris_admin_telp" id="baris_admin_kontak_<?php echo $id; ?>"><?php echo tgl_indo($row[2]); ?></td> 
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