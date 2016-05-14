function load_kategori(kat){
	  //var idx = input.id.split('_');
		//alert(idx[1]);
		var url_p = base_url+"/ambil_data_kategori_forum/"+kat;
		//alert(url_p);
		jQuery.ajax({
		async:false,
		global:false,
		type:"POST",
		url:url_p,
		data:"id=",
		success:function(data){
		//var obj = JSON.parse(data);
		alert(data);
		jQuery('#tbd_admin').html(data);
		}
		
		});
		
		
		//return false;
	}