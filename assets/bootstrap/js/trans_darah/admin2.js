jQuery("#btn_add_admin2").click(function(){

	
 jQuery('.div_success').hide();
 jQuery('#btn_submit_admin').show();	
 //alert('BANGSATRTTTTTTT');
 jQuery('#username_input').val('');
 jQuery('#password_input').val('');
 jQuery('#email_input').val('');
 jQuery('#ulangipassword_input').val('');
 
 jQuery('#header_admin').html('Tambah Pendonor');
 jQuery('#aksi_admin_form').val('');
 
 
});

/*jQuery('.delete_admin_btn').click(function(){
	delete_admin_data(this);	
	jQuery('#modal_content').html('');
	//alert(jQuery('#modal-hapusadmin').html());
	jQuery('#modal_content').html(jQuery('#modal-hapusadmin').html());
}); */

function add_confirm(isi,url,input,aksi,isis){

$(input).confirmation({

placement: 'left', // How to position the confirmation - top | bottom | left | right

trigger: 'click', // How confirmation is triggered - click | hover | focus | manual

target : '_self', // Default target value if `data-target` attribute isn't present.

href   : '#', // Default href value if `data-href` attribute isn't present.

title: isi, // Default title value if `data-title` attribute isn't present

template: '<div class="popover">' +

        '<div class="arrow"></div>' +

        '<h3 class="popover-title"></h3>' +

        '<div class="popover-content text-center">' +

        '<div class="btn-group">' + isis +

        '<a class="btn btn-small" href="" target=""></a>' +

        '<a class="btn btn-small closed" data-dismiss="confirmation" class="btn_close_confirm"></a>' +

        '</div>' +
      '</div>' +

        '</div>',

btnOkClass:  'btn-primary', // Default btnOkClass value if `data-btnOkClass` attribute isn't present.

btnCancelClass:  '', // Default btnCancelClass value if `data-btnCancelClass` attribute isn't present.
btnOkLabel: '<i class="icon-ok-sign icon-white"></i> Yes', // Default btnOkLabel value if `data-btnOkLabel` attribute isn't present.
btnCancelLabel: '<i class="icon-remove-sign"></i> No', // Default btnCancelLabel value if `data-btnCancelLabel` attribute isn't present.
singleton: true, // Set true to allow only one confirmation to show at a time.

popout: true, // Set true to hide the confirmation when user clicks outside of it.
onConfirm: function(){ if(aksi == "delete"){ delete_data(base_url+url); } else{ validasi_data(base_url+url , jQuery('#t_darah').val()); jQuery('.closed').click(); } }, // Set event when click at confirm button
onCancel: function(){}})

}

 add_confirm('Hapus Data ini ?',"/delete_data/pendonor",'.delete_admin_btn',"delete","");
 add_confirm('Validasi Data ini ?',"/validasi_data/pendonor",'.validasi_admin_btn',"validasi","<input type='number' name='t_darah' id='t_darah' value='0' style='width:80px; display:none;' placeholder='CC darah ..'  /> &nbsp; <label style='color:#000000; display:none;'>liter</label> <br /><p></p>");
 
jQuery('.close').click(function(){
	//alert('tes');							
})

jQuery('#btn_submit_admin2').click(function(){
		
		
                 var username = jQuery('#nama_pendonor').val();
				  var pekerjaan = jQuery('#pekerjaan_input').val();
				  var email = jQuery('#email_input').val();
				  var alamat = jQuery('#t_alamat').val();
				  var kontak = jQuery('#kontak_input').val();
				  var status = jQuery('#cmb_status').val();

					var post_form = "nama="+username+"&pekerjaan="+pekerjaan+"&email="+email+"&id_admin="+jQuery('#id_admin_input').val()+"&act="+"&status="+jQuery('#cmb_status').val()+"&alamat="+jQuery('#t_alamat').val()+"&kontak="+jQuery('#kontak_input').val()+"&nama_tempat="+jQuery('#nama_tempat').val()+"&alamat_donor="+jQuery('#alamat_donor').val();
				
				  
				  if(username == ""){
						form_admin3.nama_input.focus();	
						
						return false;
				  }
					
				  if(pekerjaan == ""){
						form_admin3.pekerjaan_input.focus();	
						return false;
				  }
				  
				  if(email == ""){
						form_admin3.email_input.focus();	
						return false;
				  }
				  
				  if(alamat == ""){
						form_admin3.t_alamat.focus();	
						return false;
				  }
				  
				  if(status == ""){
						form_admin3.cmb_status.focus();	
						return false;
				  }
				 
				  
				 jQuery.ajax({
				    type:"POST",
					url:base_url+"/tambah_pendonor",
					data:post_form,
					async:false,
					success:function(data){
					
				    jQuery('.div_success').show();
					jQuery('#btn_submit_admin2').hide();
                    setTimeout(function(){
                      //  dialogRef.close();
					  //jQuery('#btn_submit_admin').hide();
						// $("#btn_submit_admin").modal('hide'); 
						//$("#myModal2").modal('hide'); 
						//jQuery('#btn_close2').click();
						window.location = base_url+'/trans_darah';
						//load_admin("admin");
                    }, 2000);
					 
					}
				  });
				  
			return false;	 
		});

jQuery('.edit_admin_btn').click(function(){
	
		//jQuery('#modal_content').html('');
	//alert(jQuery('#modal-hapusadmin').html());
	  //  jQuery('#modal_content').html(jQuery('#modal_maintadmin').html());
		 load_admin_data(this);
		});