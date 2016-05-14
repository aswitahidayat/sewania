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
                
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><h2>Tabel Sub Kategori</h2></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo $basedx; ?>/dir_pass/kategori/tambah_sub_kategori"><button class="btn btn-success" id="btn_add_admin" data-toggle="modal" data-target="#myModal">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      
                                   
                                   <p>&nbsp;</p>
                                    
                                   <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <p></p>
                        <!-- /.panel-heading -->&nbsp; &nbsp; &nbsp;
                        <center>~ <b> Kategori Jasa </b> ~ </center>
                        <form method="post" action="<?php echo base_url('sindrom/viewdata/sub_kategori'); ?>">
                        <fieldset style="border:1px solid #CCCCCC; margin:10px; height:55px; padding:15px;">
                        
                        <?php
						$a = 0;
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
                        <input type="submit" name="tampilkan" value="Tampilkan" class="btn btn-success" />
                        </fieldset>
                        </form>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="example">
				<thead>
					<tr>
                        <th>No</th>
                        <th>Nama Sub Kategori</th>
                        <th>Kategori</th>
						<th>Aksi</th>
					</tr>
				</thead>
                <tbody id="tb_admin">
                <?php
				foreach($hasil as $row){
				$a++;
				$id = $row->id_kategori;
				$kat = mysql_fetch_array(mysql_query("select * from kategori where id_kategori = '$id'"));
				$bsdx = $basedx."/dir_pass/sub_kategori/edit_sub_kategori/".$row->id_sub_kategori;
				$del = $basedx."/delete_data/sub_kategori/".$row->id_sub_kategori.'/sub_kategori';
				?>
                <tr class="baris_admin_btn" id="baris_admin_btn_<?php echo $id; ?>">
                <td><?php echo $no; ?></td>
                <td class="baris_admin_username" id="baris_admin_nama_<?php echo $id; ?>"><?php echo $row->nama; ?></td>
                <td class="baris_admin_username" id="baris_admin_nama_<?php echo $id; ?>"><?php echo $kat[1]; ?></td>
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