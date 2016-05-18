$('.sub_div_kat').click(function(){
    var id=this.id.split('_');
	jQuery.ajax({
	     type:"POST",
		 data:"id="+id[2],
		 url:base+"session/s_kategori/",
		 success:function(data){
		 //alert(data);
		   window.location=base+"front/category/"+data;
		 }
	});
});