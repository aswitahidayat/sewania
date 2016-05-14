<script type="text/javascript">

function delete_admin_data(input){
	$("#myModal").modal('show'); 
	jQuery('#header_admin').html('Hapus Admin');
	jQuery('#header_admins').html('Hapus Admin');
}

function load_admin_data(input){
		$("#myModal").modal('show'); 
		
	
		var idx = input.id.split('_');
		
		
		jQuery('#t_idx').val(idx[3]);
		jQuery('#nama_input').val(jQuery('#baris_admin_nama_'+idx[3]).html());
		jQuery('#act_input').val("ubah");
		jQuery('#header_admin').html('Edit Kategori');
		jQuery('#header_admins').html('Edit Kategori');
		jQuery('#aksi_admin_form').val('ubah');
		jQuery('.div_success').hide();
        jQuery('#btn_submit_admin').show();	
		}
		
		function load_admin(kat){
		 
		 jQuery.ajax({
		   type:"GET",
		   url:base_url+'/ambil_data_admin/'+kat+'?halaman='+<?php echo $_GET['halaman']; ?>,
		   data:"",
		   success:function(data){
		   if(<?php echo $_GET['halaman'] ?> == 1){
		   jQuery('#tb_admin').html('');
		   jQuery('#tb_admin').html(data);
		   
		   jQuery('.edit_admin_btn').bind("click", function(){ load_admin_data(this); });
		   add_confirm();
		   }
		    // alert(data);
		   }
		 });
		 
		}
</script>