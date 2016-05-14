var ads = '<div class="block"><div class="navbar navbar-inner block-header"><div class="muted pull-left" id="label_admin2">Tambah Admin</div></div><div class="block-content collapse in"><div class="span12"><form class="form-horizontal" id="form_admin2" name="form_admin2" action="front/tambah_admin" method="post"><fieldset><legend class="label_admin">Tambah Admin</legend><div class="control-group"><label class="control-label" for="focusedInput">Username</label><div class="controls"><input id="username_input" name="username_input" type="text" placeholder="Inputkan username admin .." required="required" /><span class="help-inline red" id="help_username_admin" style="display:none;">Please correct the error</span></div></div><div class="control-group"><label class="control-label" for="optionsCheckbox2">Password</label><div class="controls"><label><input id="password_input" name="password_input" type="password" placeholder="Inputkan password admin .." required="required" /> <span class="help-inline red" id="help_password_admin" style="display:none;">Please correct the error</span></label></div></div><div class="control-group"><label class="control-label" for="optionsCheckbox2">Ulangi</label><div class="controls"><label><input id="ulangipassword_input" name="ulangipassword_input" type="password" placeholder="Inputkan kembali password .." required="required" /> <span class="help-inline red" id="help_ulangi_admin" style="display:none;">Password tidak sama</span></label></div></div><div class="control-group"><label class="control-label" for="optionsCheckbox2">Email</label><div class="controls"><label><input id="email_input" name="email_input" type="text" placeholder="Inputkan email .." required="required" /> <span class="help-inline red" id="help_ulangi_email" style="display:none;">Inputkan email yang valid</span></label></div></div></fieldset></form></div></div></div></div></div>'; 


jQuery('#btn_admin').click(function(){
									
		 BootstrapDialog.show({
            title: 'Button Hotkey',
            message: $(ads),
		   // message: $('<div></div>').load(url),
			
			cssClass: 'login-dialog',
			draggable:true,
            buttons: [{
                label: 'Submit',
                cssClass: 'btn-primary',
                hotkey: 13, // Enter.
                action: function(dialogRef) {
                  var username = jQuery('#username_input').val();
				  var password = jQuery('#password_input').val();
				  var serial = jQuery('#email_input').val();
				  var ulangi = jQuery('#ulangipassword_input').val();
				  
				  var post_form = "user="+username+"&password="+password+"&email="+serial+"&status="+jQuery('#cmb_status').val()+"&nama="+jQuery('#nama_input').val();
				  //alert(post_form);
				  //alert(serial);
				  
				  //return false;
				  
				 jQuery.ajax({
				    type:"POST",
					url:base_url+"/tambah_admin",
					data:post_form,
					async:false,
					success:function(data){
					
					if(username.trim() == ""){
						form_admin2.username_input.focus();	
						return false;
					}
					
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
					
					dialogRef.enableButtons(false);
                    dialogRef.setClosable(false);
                    dialogRef.getModalBody().html('Data admin berhasil di tambahkan .');
                    setTimeout(function(){
                        dialogRef.close();
						//window.location = ''
						//load_admin("admin");
                    }, 5000);
					 
					}
				  });
			
					
                }
            },
			{
                label: 'Cancel',
                cssClass: 'btn-primary',
                action: function(dialogRef) {
                    dialogRef.close();
					//dialogRef.setSize(BootstrapDialog.SIZE_WIDE);
                }
            }]
          });
		});

jQuery('.edit_admin_btn').click(function(){
		jQuery('.control-label').hide();
		BootstrapDialog.show({
            title: 'Button Hotkey',
            //message: $('<textarea class="form-control" placeholder="Try to input multiple lines here..." id="teks2"></textarea>'),
		    message: $(ads),
			
			cssClass: 'login-dialog',
			draggable:true,
            buttons: [{
                label: 'Submit',
                cssClass: 'btn-primary',
                hotkey: 13, // Enter.
                action: function(dialogRef) {
                  var username = jQuery('#username_input').val();
				  var password = jQuery('#password_input').val();
				  var serial = jQuery('#email_input').val();
				  var ulangi = jQuery('#ulangipassword_input').val();
				  
				  var post_form = "user="+username+"&password="+password+"&email="+serial;
				  //alert(post_form);
				  //alert(serial);
				  
				  //return false;
				  
				 jQuery.ajax({
				    type:"POST",
					url:base_url+"/tambah_admin",
					data:post_form,
					async:false,
					success:function(data){
					
					if(username.trim() == ""){
						form_admin2.username_input.focus();	
						return false;
					}
					
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
					
					dialogRef.enableButtons(false);
                    dialogRef.setClosable(false);
                    dialogRef.getModalBody().html('Data admin berhasil di tambahkan .');
                    setTimeout(function(){
                        dialogRef.close();
						
						load_admin("admin");
                    }, 5000);
					 
					}
				  });
			
					
                }
            },
			{
                label: 'Cancel',
                cssClass: 'btn-primary',
                action: function(dialogRef) {
                    dialogRef.close();
					//dialogRef.setSize(BootstrapDialog.SIZE_WIDE);
                }
            }]
          });
		
		});