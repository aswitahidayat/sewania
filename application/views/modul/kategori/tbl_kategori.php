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
                                <div class="muted pull-left"><h2>Tabel Kategori</h2></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $basedx; ?>/dir_pass/kategori/tambah_kategori"><button class="btn btn-success" id="btn_add_admin" data-toggle="modal" data-target="#myModal">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      
                                   
                                   <p>&nbsp;</p>
                                    
                                   <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="example">
				<thead>
					<tr>
                        <th>No</th>
                        <th>Nama </th>
						<th>Aksi</th>
					</tr>
				</thead>
                <tbody id="tb_admin">
                <?php
				foreach($hasil as $row){
				$a++;
				$id = $row->id_kategori;
				$bsdx = $basedx."/dir_pass/kategori/edit_kategori/".$row->id_kategori;
				$del = $basedx."/delete_data/kategori/".$row->id_kategori.'/kategori';
				?>
                <tr class="baris_admin_btn" id="baris_admin_btn_<?php echo $id; ?>">
                <td><?php echo $no; ?></td>
                <td class="baris_admin_username" id="baris_admin_nama_<?php echo $id; ?>"><?php echo $row->nama; ?></td>
                <td><?php echo '<a href="'.$bsdx.'" class="edit_admin_btn" id="edit_admin_btn_'.$id.'_ubah">edit</a> || <a href="'.$del.'" class="delete_admin_btn" id="delete_admin_btn_'.$id.'_delete" style="cursor:pointer" onclick="return confirm(\' Apakah anda yakin akan menghapus data ? \'); ">delete</a>'; ?></td>
                
                </tr>
                <?php
				$no++;
				}
				?>
                </tbody>
			</table>
         </div>
       </div>
     </div>
    </div>
   </div>
  
            <?php
echo "<center><div class=paging>$linkHalaman</div></center><br>";
?>
                                    </div>
                                </div>
                            </div>
                        </div>