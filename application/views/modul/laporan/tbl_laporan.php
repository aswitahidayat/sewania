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
                                         <!--<a href="#"><button class="btn btn-success" id="btn_add_admin" data-toggle="modal" data-target="#myModal">Cetak Laporan <i class="icon-plus icon-white"></i></button></a> -->
                                      </div>
                                     <!-- <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="#">Print</a></li>
                                            <li><a href="#">Save as PDF</a></li>
                                            <li><a href="#">Export to Excel</a></li>
                                         </ul>
                                      </div> -->
                                   </div>
                                    
                                    <p></p>
                                    <form method="get"> Tanggal Awal : <input type="date" name="t_awal" /> s/d Tanggal Akhir : <input type="date" name="t_awal" /></form>
                                    <div id="div_tbladmin">
               <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
				<thead>
					<tr>
                        <th>No</th>
						<th>Nama</th>
						<th>Tanggal donor</th>
                        <th>CC Darah</th>
					</tr>
				</thead>
                <tbody id="tb_admin">
                <?php
				if($_GET['cari'] != ''){
				$q = mysql_query("select * from history where tanggal_donor >= '$_GET[t_awal]' and tanggal_donor <= '$_GET[t_akhir]'");
				}
				else{
				$q = mysql_query("select * from history");
				}
				
				while($row=mysql_fetch_array($q)){
				$tsp = "";
				$a++;
				$id = $row->id_pendonor;
				
				$jm = mysql_fetch_array(mysql_query("select * from pendonor where id_pendonor = '$row[id_pendonor]'"));
				
				?>
                <tr class="baris_admin_btn" id="baris_admin_btn_<?php echo $id; ?>">
                <td><?php echo $no; ?></td>
                <td class="baris_admin_username" id="baris_admin_nama_<?php echo $id; ?>"><?php echo $jm[1]; ?></td>
                <td class="baris_admin_telp" id="baris_admin_kontak_<?php echo $id; ?>"><?php echo tgl_indo($row[tgl_donor]); ?></td>
                <td class="baris_admin_email" id="baris_admin_email_<?php echo $id; ?>"><?php echo $row[cc_donor].' liter '; ?></td>
                
                
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