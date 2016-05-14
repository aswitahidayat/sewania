jQuery("#btn_add_admin").click(function(){

	
 jQuery('.div_success').hide();
 jQuery('#btn_submit_admin').show();	
 //alert('BANGSATRTTTTTTT');
 jQuery('#username_input').val('');
 jQuery('#email_input').val('');
 jQuery('#tps_pengawas').val('');
 jQuery('#alamat_input').val('');
 jQuery('#kontak_input').val('');
 jQuery('#kecamatan_input').val('');
 jQuery('#desa_input').val('');
 jQuery('#kabupaten_tps').val('');
 
 jQuery('#header_admin').html('Tambah TPS');
 jQuery('#aksi_admin_form').val('');
 
 
});


/*$(".delete_admin_btn").popConfirm({
					title: "Delete item ?",
					content: "Are you sure want to delete this item ?",
					placement: "left",
					onConfirm: function()
					{
					  alert('tes');	
					}
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
onConfirm: function(){ delete_data(base_url+"/delete_data/tps"); }, // Set event when click at confirm button
onCancel: function(){}})

}

add_confirm();

jQuery('.close').click(function(){
	//alert('tes');							
})

jQuery('#form_admin2').submit(function(){
		//alert("tes");								   
		var post_form = jQuery('#form_admin2').serialize();
		
		jQuery.ajax({
		  type:"POST",
		  url:base_url+"/add_data_tps/tps",
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
						load_admin("tps");
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