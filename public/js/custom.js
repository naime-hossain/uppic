  $(document).ready(function() { // makes sure the whole site is loaded
         


              $("html").niceScroll({
               cursorcolor:"#002c53"
        });

    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    });

        });   

      $(window).ready(
        function() {  
             $('#status').fadeOut(); // will first fade out the loading animation
            $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
            $('body').delay(350).css({'overflow':'visible'});
      
        });