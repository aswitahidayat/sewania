// JavaScript Document

jQuery(document).ready(function(){			
								
								
  
		/*$.mockjax({
        url: base+'/data',
        responseTime: 0,
        response: function (settings) {
            alert('tes');
        }
      }); */
		
		//var wpjmel = {"start_point":"Jakarta Raya, Indonesia","start_geo_lat":"-6.1744651","start_geo_long":"106.82274499999994","enable_map":"1","map_elements":"#job_location, #setting-wpjmel_map_start_location","user_location":null,"file_path":"https:\/\/nyewain.com\/wp-content\/plugins\/wp-job-manager-extended-location\/.\/assets","l10n":{"locked":"Lock Pin Location","unlocked":"Unlock Pin Location"},"list_geo_lat":"","list_geo_long":""};
		
		jQuery('#s_teks_kategori').change(function(){
		  // alert('tes');
		   jQuery.ajax({
		   type:"POST",
		   url:base+"pilihan/cari_kategori/",
		   data:"kat="+this.value,
		   success:function(data){
			jQuery("#s_sub_kat").html('');
			$.each(JSON.parse(data), function(idx, obj) {
	         //alert(obj.nama);
			 
			 jQuery("#s_sub_kat").append('<option value='+obj.id+'>'+obj.nama+'</option>');
           });
			  
			 
		   }
		  });
		   
		});

		jQuery('#s_teks_provinsi').change(function(){
		  // alert('tes');
		   jQuery.ajax({
		   type:"POST",
		   url:base+"pilihan/cari_kota/",
		   data:"prov="+this.value,
		   success:function(data){
			jQuery("#s_teks_kota").html('');
			$.each(JSON.parse(data), function(idx, obj) {
	         //alert(obj.nama_kota);
			 
			 jQuery("#s_teks_kota").append('<option value='+obj.id+'>'+obj.nama_kota+'</option>');
           });
			  
			 
		   }
		  });
		   
		});
		
		jQuery('#btn_submit').click(function(){
		var username = jQuery('#t_username').val();
		var password = jQuery('#t_password').val();
		 jQuery.ajax({
		   type:"POST",
		   url:base+"aktivasi/login/",
		   data:"user="+username+"&password="+password,
		   success:function(data){
		    //alert(data);
			alert(data);
			
			if(data == "0"){
			  jQuery('#div_conn').show();
			}
			else{
			  window.location = base+'front/account_member/home';	
			}
			
		   }
		 })
     });
		
});		