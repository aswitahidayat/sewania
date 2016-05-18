/*	Table OF Contents
	==========================
	Carousel
	Ajax Tab
	List view , Grid view  and compact view
	Global Plugins
	Customs Script
	responsive cat-collapse for homepage
	*/
	

	
$(document).ready(function() {

    /*==================================
	 Carousel 
	====================================*/

    // Featured Listings  carousel || HOME PAGE
    var owlitem = $(".item-carousel");

    var owlitem2 = $(".item-carousel2");
	
    owlitem.owlCarousel({
        //navigation : true, // Show next and prev buttons
        navigation: false,
        pagination: true,
        items: 5,
		itemsDesktopSmall: 	[979,3],
		itemsTablet: [768, 3],
        itemsTabletSmall: [660, 2],
		itemsMobile: [400,1]


    });
	
	owlitem2.owlCarousel({
        //navigation : true, // Show next and prev buttons
        navigation: false,
        pagination: true,
        items: 5,
		itemsDesktopSmall: 	[979,3],
		itemsTablet: [768, 3],
        itemsTabletSmall: [660, 2],
		itemsMobile: [400,1]


    });

    // Custom Navigation Events
    $("#nextItem").click(function() {
        owlitem.trigger('owl.next');
    })
    $("#prevItem").click(function() {
        owlitem.trigger('owl.prev');
    })
	
	 // Custom Navigation Events
    $("#nextItems").click(function() {
        owlitem2.trigger('owl.next');
    })
    $("#prevItems").click(function() {
        owlitem2.trigger('owl.prev');
    })




    /*==================================
	 Ajax Tab || CATEGORY PAGE
	====================================*/

    //  item listing ajaxTabs 
    $('#ajaxTabs a').click(function(e) {
        e.preventDefault();

        var url = $(this).attr("data-url");
        var href = this.hash;
        var pane = $(this);

        // ajax load from data-url
        $(href).load(url, function(result) {
            pane.tab('show');
            // ajax pre-request callback function 
            $('.tooltipHere').tooltip();
            $('.grid-view').click(function(e) {
                $(function() {
                    $('.item-list').matchHeight();
                    $.fn.matchHeight._apply('.item-list');
                });
            });

        });
    });

    // load first tab content
    $('#allAds').load($('.active a').attr("data-url"), function(result) {
        $('.active a').tab('show');
        // ajax pre-request callback function 
        $('.tooltipHere').tooltip();

        $('.grid-view').click(function(e) {
            $(function() {
                $('.item-list').matchHeight();
                $.fn.matchHeight._apply('.item-list');
            });
        });
    });

    /*==================================
	 List view clickable || CATEGORY 
	====================================*/

    // List view , Grid view  and compact view

    $('.list-view,#ajaxTabs li a').click(function(e) { //use a class, since your ID gets mangled
        e.preventDefault();
        $('.grid-view,.compact-view').removeClass("active");
        $('.list-view').addClass("active");
        $('.item-list').addClass("make-list"); //add the class to the clicked element
        $('.item-list').removeClass("make-grid");
        $('.item-list').removeClass("make-compact");
        $('.item-list .add-desc-box').removeClass("col-sm-9");
        $('.item-list .add-desc-box').addClass("col-sm-7");

        $(function() {
            $('.item-list').matchHeight('remove');
        });
    });

    $('.grid-view').click(function(e) { //use a class, since your ID gets mangled
        e.preventDefault();
        $('.list-view,.compact-view').removeClass("active");
        $(this).addClass("active");
        $('.item-list').addClass("make-grid"); //add the class to the clicked element
        $('.item-list').removeClass("make-list");
        $('.item-list').removeClass("make-compact");
        $('.item-list .add-desc-box').removeClass("col-sm-9");
        $('.item-list .add-desc-box').addClass("col-sm-7");

        $(function() {
            $('.item-list').matchHeight();
            $.fn.matchHeight._apply('.item-list');
        });

    });



    $('.compact-view').click(function(e) { //use a class, since your ID gets mangled
        e.preventDefault();
        $('.list-view,.grid-view').removeClass("active");
        $(this).addClass("active");
        $('.item-list').addClass("make-compact"); //add the class to the clicked element
        $('.item-list').removeClass("make-list");
        $('.item-list').removeClass("make-grid");
        $('.item-list .add-desc-box').toggleClass("col-sm-9 col-sm-7");

        $(function() {
            $('.adds-wrapper .item-list').matchHeight('remove');
        });

    });



    /*==================================
	Global Plugins || 
	====================================*/

    $('.long-list').hideMaxListItems({
        'max': 8,
        'speed': 500,
        'moreText': 'View More ([COUNT])'
    });


    $('.tooltipHere').tooltip(); // bootstrap tooltip

    $(".scrollbar").scroller(); // custom scroll bar plugin

    $("select.selecter").selecter({ // custom scroll select plugin
        label: "Select An Item"
    });

    $(".selectpicker").selecter({ // category list Short by
        customClass: "select-short-by"
    });




    /*=======================================================================================
		cat-collapse Hmepage Category Responsive view  
	========================================================================================*/
	
	

    $(window).bind('resize load', function() {
	
	
		
        if ($(this).width() < 767) {

        $('.cat-collapse').collapse('hide');
		
            $('.cat-collapse').on('shown.bs.collapse', function() {
                $(this).prev('.cat-title').find('.icon-down-open-big').addClass("active-panel");
                //$(this).prev('.cat-title').find('.icon-down-open-big').toggleClass('icon-down-open-big icon-up-open-big');
            });

            $('.cat-collapse').on('hidden.bs.collapse', function() {
                $(this).prev('.cat-title').find('.icon-down-open-big').removeClass("active-panel");
            })

        } else {
			
		$('.cat-collapse').removeClass('out').addClass('in').css('height', 'auto');
           
        }
		
    });

    //======================== Script from index

    $('.bxslider').bxSlider({
      pagerCustom: '#bx-pager'
    });

    jQuery('#btn_cari_produk').click(function(){
      var sr = jQuery("#frm_search_produk").serialize();
      alert(sr);
      jQuery.ajax({
        type:"POST",
        url:base+"session/s_prod_sr/",
        data:sr,
        success:function(data){
          window.location=base+data;
        }
      });
      return false;
    })

    jQuery('.sub_div_kat').click(function(){
      var id=this.id.split('_');
      jQuery.ajax({
        type:"POST",
        data:"id="+id[2],
        url:base+"session/s_prod/",
        success:function(data){
          //alert(data);
          window.location=base+"front/ads_detail/"+data;
        }
      });
    });

    jQuery('.sub_div_kat2').click(function(){
      var id=this.id.split('_');
      jQuery.ajax({
        type:"POST",
        data:"id="+id[2],
        url:base+"session/s_prod/",
        success:function(data){
          //alert(data);
          window.location=base+"front/ads_detail/"+data;
        }
      });
    });

    jQuery('#btn_current_loc').click(function(){
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
          alert(position.coords.latitude + ", " + position.coords.longitude);
          var myLatLng = {lat: position.coords.latitude, lng: position.coords.longitude};

          jQuery("#pac-input").val("My Location");
          jQuery("#s_latitude").val(position.coords.latitude);
          jQuery("#s_longitude").val(position.coords.longitude);

          var markers = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
          });
          map.panTo(myLatLng);
        });
      }
    });

    jQuery('#button1id').click(function(){
      var salah = 0;
      var price = jQuery('#s_teks_Price').val();
      var desc = jQuery('#s_teks_deskripsi').val();
      var title = jQuery('#s_teks_title').val();
      var kategori = jQuery('#s_teks_kategori').val();

      if(price != "" && desc != "" && title != "" && kategori != ""){
        salah = 0;
      } else {
        salah = 1;
        if(price == ""){
          jQuery('#s_warn_harga').show();
        } else {
          jQuery('#s_warn_harga').hide();
        }
        if(desc == ""){
          jQuery('#s_warn_desc').show();
        }else{
         jQuery('#s_warn_desc').hide();
        }
        if(title == ""){
          jQuery('#s_warn_title').show();
        }else{
          jQuery('#s_warn_title').hide();
        }

        if(kategori == ""){
          jQuery('#s_warn_kategori').show();
        }else{
          jQuery('#s_warn_kategori').hide();
        }
      }

      if(salah == 0){
        jQuery('#div_first_step').slideUp('slow');
        jQuery('#div_step_next').slideDown('slow');
      }
    });

    $('.prodxx').click(function(){
      var id=this.id.split('_');
      jQuery.ajax({
        type:"POST",
        data:"id="+id[2],
        url:base+"session/s_prod/",
        success:function(data){
          //alert(data);
          window.location=base+"front/ads_detail/"+data;
        }
      });
    });

    $('.t_customer_name').click(function(){
      var id=this.id.split('_');
      alert(id[3]);
      jQuery.ajax({
        type:"POST",
        data:"id="+id[3],
        url:base+"session/s_member_produk/",
        success:function(data){
          //alert(data);
          window.location=base+"front/member_produk/"+data;
        }
      });
    });

   jQuery('#btn_submit_message').click(function(){
     var nama = jQuery("#recipient-name").val();
     var email = jQuery("#sender-email").val();
     var phone = jQuery("#recipient-Phone-Number").val();
     var teks = jQuery("#message-text").val();

     jQuery('#sp_loading_koment').show();

     jQuery.ajax({
       type:"POST",
       url:base+"front/add_comment/",
       data:"nama="+nama+"&email="+email+"&phone="+phone+"&teks="+teks,
       success:function(data){
         jQuery("#recipient-name").val('');
         jQuery("#sender-email").val('');
         jQuery("#recipient-Phone-Number").val('');
         jQuery("#message-text").val('');
         jQuery('#sp_loading_koment').hide();
       }
     });
   });
	

}); // end Ready


