$(document).ready(function() {

        //loads default content
        //$('#image-area').load($('.menu_top a:first-child').attr('href'));

        $('.o-links').click(function() {

          // href has to be the id of the hidden content element
          var href = $(this).attr('href');
            $('#image-area').fadeOut(1000, function() {
                $(this).html($('#' + href).html()).fadeIn(1000);
            });
          return false;
        });

      });

      $(function() {
          $('.o-links').click(function(e) {

              //e.preventDefault();

              $('.o-links').not(this).removeClass('O_Nav_Current');
              $(this).addClass('O_Nav_Current');
          });
      });