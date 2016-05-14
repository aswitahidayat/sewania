<script type="text/javascript">

jQuery('#cmb_kecamatan_tps').change(function(){

if(this.value != ""){
   jQuery('#cmb_desa_tps').prop('disabled' , 0);
   jQuery.ajax({
     type:"POST",
	 url:base_url+'/ambil_desa_tps/',
	 data:"kec="+this.value,
	 success:function(data){
	 jQuery('#cmb_desa_tps').html('');
	    var jsonData = JSON.parse(data);
       for (var i = 0; i < jsonData.desa.length; i++) {
         var counter = jsonData.desa[i];
        //console.log(counter.counter_name);
		
         jQuery('#cmb_desa_tps').append("<option value='"+counter.desa+"'>"+counter.desa+"</option>");
       }
	 }
   })
   
}
else{
   jQuery('#cmb_desa_tps').prop('disabled' , 1);
   jQuery('#cmb_desa_tps').html('');
   jQuery('#cmb_desa_tps').append("<option value=''> Pilih Desa </option>");
}

})

function delete_admin_data(input){
	$("#myModal").modal('show'); 
	jQuery('#header_admin').html('Hapus Admin');
	jQuery('#header_admins').html('Hapus Admin');
}

function load_admin_data(input){
		$("#myModal").modal('show'); 
		
	
		var idx = input.id.split('_');
		
		jQuery('#password_input').val('');
    
        jQuery('#ulangipassword_input').val('');
 
		jQuery('#id_admin_input').val(idx[3]);
		jQuery('#username_input').val(jQuery('#baris_admin_username_'+idx[3]).html());
		jQuery('#tps_pengawas').val(jQuery('#baris_admin_tpsid_'+idx[3]).html());
		jQuery('#alamat_input').val(jQuery('#baris_admin_alamat_'+idx[3]).html());
		jQuery('#kontak_input').val(jQuery('#baris_admin_telp_'+idx[3]).html());
		jQuery('#email_input').val(jQuery('#baris_admin_email_'+idx[3]).html());
		jQuery('#header_admin').html('Edit Pengawas');
		jQuery('#header_admins').html('Edit Admin');
		jQuery('#aksi_admin_form').val('ubah');
		jQuery('.div_success').hide();
        jQuery('#btn_submit_admin').show();	
		}
		
		function load_admin(kat){
		 
		 jQuery.ajax({
		   type:"GET",
		   url:base_url+'/ambil_data_kategori_pengawas/'+kat+'?halaman='+<?php echo $_GET['halaman']; ?>,
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