jQuery("#btn_add_admin").click(function(){

 
 jQuery('.div_success').hide();
 jQuery('#btn_submit_admin').show();	
 //alert('BANGSATRTTTTTTT');
 jQuery('#username_input').val('');
 jQuery('#password_input').val('');
 jQuery('#email_input').val('');
 jQuery('#ulangipassword_input').val('');
 
 jQuery('#header_admin').html('Tambah Admin');
 jQuery('#aksi_admin_form').val('');
 
 
});

/*jQuery('.delete_admin_btn').click(function(){
	delete_admin_data(this);	
	jQuery('#modal_content').html('');
	//alert(jQuery('#modal-hapusadmin').html());
	jQuery('#modal_content').html(jQuery('#modal-hapusadmin').html());
}); */

function add_confirm(){

$('.delete_admin_btn').confirmation({

placement: 'top', // How to position the confirmation - top | bottom | left | right

trigger: 'click', // How confirmation is triggered - click | hover | focus | manual

target : '_self', // Default target value if `data-target` attribute isn't present.

href   : '#', // Default href value if `data-href` attribute isn't present.

title: 'Hapus Data ini ?', // Default title value if `data-title` attribute isn't present

template: '<div class="popover">' +

        '<div class="arrow"></div>' +

        '<h3 class="popover-title"></h3>' +

        '<div class="popover-content text-center">' +

        '<div class="btn-group">' +

        '<a class="btn btn-small" href="" target=""></a>' +

        '<a class="btn btn-small" data-dismiss="confirmation"></a>' +

        '</div>' +
      '</div>' +

        '</div>',

btnOkClass:  'btn-primary', // Default btnOkClass value if `data-btnOkClass` attribute isn't present.

btnCancelClass:  '', // Default btnCancelClass value if `data-btnCancelClass` attribute isn't present.
btnOkLabel: '<i class="icon-ok-sign icon-white"></i> Yes', // Default btnOkLabel value if `data-btnOkLabel` attribute isn't present.
btnCancelLabel: '<i class="icon-remove-sign"></i> No', // Default btnCancelLabel value if `data-btnCancelLabel` attribute isn't present.
singleton: true, // Set true to allow only one confirmation to show at a time.

popout: true, // Set true to hide the confirmation when user clicks outside of it.
onConfirm: function(){ delete_data(base_url+"/delete_data/admin"); }, // Set event when click at confirm button
onCancel: function(){}})

}

 add_confirm();
 
jQuery('.close').click(function(){
	//alert('tes');							
})

jQuery('#btn_submit_admin').click(function(){
										   
		
		
		var idx = jQuery('#aksi_admin_form').val();
		
                 var username = jQuery('#username_input').val();
				  var password = jQuery('#password_input').val();
				  var serial = jQuery('#email_input').val();
				  var ulangi = jQuery('#ulangipassword_input').val();
				  
				 // var post_form = "user="+username+"&password="+password+"&email="+serial;
				 if(idx == 'ubah'){
				   var post_form = "user="+username+"&password="+password+"&email="+serial+"&id_admin="+jQuery('#id_admin_input').val()+"&act=ubah"+"&status="+jQuery('#cmb_status').val()+"&nama="+jQuery('#nama_input').val();
				 }
				 else{
					var post_form = "user="+username+"&password="+password+"&email="+serial+"&id_admin="+jQuery('#id_admin_input').val()+"&act="+"&status="+jQuery('#cmb_status').val()+"&nama="+jQuery('#nama_input').val(); 
				 }
				  //alert(post_form);
				  //alert(serial);
				  
				  //return false;
				  
				  if(username.trim() == ""){
						form_admin2.username_input.focus();	
						return false;
					}
					
					if(idx == 'ubah'){
						if(password.trim() != ""){
						form_admin2.ulangipassword_input.focus();	
						return false;
					    }
					}
					else{
					
					if(password.trim() == ""){
						form_admin2.password_input.focus();	
						return false;
					}
					
					if(ulangi.trim() == ""){
						form_admin2.ulangipassword_input.focus();	
						return false;
					}
					
					if(ulangi != password){
					  jQuery('#help_ulangi_admin').show();
					  form_admin2.ulangipassword_input.focus();
					  return false;
					}
					else{
					  jQuery('#help_ulangi_admin').hide();
					  //form_admin2.ulangipassword_input.focus();
					  //return false;
					}
					
					}
					
					if(serial.trim() == ""){
						form_admin2.email_input.focus();	
						return false;
					}
					
					if(serial.indexOf('@') == -1 && serial.indexOf('.') == -1){
						jQuery('#help_ulangi_email').show();
						form_admin2.email_input.focus();	
						return false;
					}
					else{
					  jQuery('#help_ulangi_email').hide();
					}
				  
				 jQuery.ajax({
				    type:"POST",
					url:base_url+"/tambah_admin",
					data:post_form,
					async:false,
					success:function(data){
					
					
					
				    jQuery('.div_success').show();
					jQuery('#btn_submit_admin').hide();
                    setTimeout(function(){
                      //  dialogRef.close();
					  //jQuery('#btn_submit_admin').hide();
						// $("#btn_submit_admin").modal('hide'); 
						  $("#myModal").modal('hide'); 
						  window.location = base_url+'/viewdata/admin/';
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