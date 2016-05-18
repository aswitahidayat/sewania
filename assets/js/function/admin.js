// JavaScript Document

function load_admin_data(input){
		$("#myModal").modal('show'); 
		var idx = input.id.split('_');
		
		jQuery('#password_input').val('');
    
        jQuery('#ulangipassword_input').val('');
 
		jQuery('#id_admin_input').val(idx[3]);
		jQuery('#username_input').val(jQuery('#baris_admin_username_'+idx[3]).html());
		jQuery('#email_input').val(jQuery('#baris_admin_email_'+idx[3]).html());
		jQuery('#header_admin').html('Edit Admin');
		jQuery('#aksi_admin_form').val('ubah');
		jQuery('.div_success').hide();
        jQuery('#btn_submit_admin').show();	
		}
		
		function load_admin(kat){
		 
		 jQuery.ajax({
		   type:"GET",
		   url:base_url+'/ambil_data_kategori_forum/'+kat+'?halaman='+<?php echo $_GET['halaman']; ?>,
		   data:"",
		   success:function(data){
		   if(<?php echo $_GET['halaman'] ?> == 1){
		   jQuery('#tb_admin').html('');
		   jQuery('#tb_admin').html(data);
		   
		   jQuery('.edit_admin_btn').bind("click", function(){ load_admin_data(this); });
		   }
		    // alert(data);
		   }
		 });
		 
		}