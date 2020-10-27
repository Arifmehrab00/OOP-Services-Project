(function($) {
  'use strict';    
    /*======================================/
                  Preloader JS
    ======================================*/  
      var prealoaderOption = $(window);
      prealoaderOption.on("load", function () {
          var preloader = jQuery('.spinner');
          var preloaderArea = jQuery('.preloader-area');
          preloader.fadeOut();
          preloaderArea.delay(350).fadeOut('slow');
      });
    /*======================================/
                  Preloader JS
    ======================================*/
    /* meanmenu */
      $('.main-menu nav').meanmenu({
          meanMenuContainer: '.mobile-menu',
          meanScreenWidth: "766"
      });
    /*======================================/  
                    sticky header JS
    ======================================*/ 
      $(window).on('scroll',function() {    
          var scroll = $(window).scrollTop();
           if (scroll < 100) {
            $("#header-area").removeClass("sticky");
           }else{
            $("#header-area").addClass("sticky");
           }
      }); 
    /*======================================/  
                    sticky header JS
    ======================================*/
        $("a.page-scroll").on('click', function (event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                //console.log($(hash).offset().top - topOffset);
                $('html, body').animate({
                    scrollTop: $(hash).offset().top - $("header").outerHeight() + "px"
                }, 1200, function () {
                    //window.location.hash = hash;
                });
            } // End if
        });
    /*===================================== 
                slick slider js
    ======================================*/ 
        $(".regular").slick({
          dots: false,
          arrows: true,
          autoplay: false,
          infinite: true,
          slidesToShow:1,
          speed: 1500,
          slidesToScroll: 1
        });
        $(".responsive").slick({
          dots: true,
          arrows: false,
          autoplay: false,
          infinite: true,
          slidesToShow:1,
          speed: 300,
          slidesToScroll: 1
        });
    /*===================================== 
                slick slider js
    ======================================*/  
    /*======================================/  
                    counterup JS
    ======================================*/   
      $('.counter').counterUp({
          delay: 80,
          time: 8000
      });
    /*======================================/  
                    counterup JS
    ======================================*/
    /*=======================
          Scroll top js
    =========================*/
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 100) {
            $('#scroll-up').fadeIn();
        } else {
            $('#scroll-up').fadeOut();
        }
    });
    $('#scroll-up').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
  /*=======================
          Scroll top js
  =========================*/
  /*=======================
       Ajax contact form js
    =========================*/
	
	$("#contact-form").submit(function (event) {

        var successMail = '#success' ;
        var errorMail = '#error' ;

        event.preventDefault();



        var formData = $("#contact-form").serialize();

        $("#contact-form :input").prop("disabled", true);

        $.ajax({
            type: 'POST',
            url: $('#contact-form').attr('action'),
            data: formData
        })
            .done(function (response) {
                $(successMail).show();
                $(errorMail).hide();
                $('.contact-form input').val('');
                $('.contact-form textarea').val('');
                $("#contact-form :input").prop("disabled", false);
                console.log(response);
                $(successMail).text(response.success);
            })
            .fail(function (jqXHR, textStatus, errorThrown) {

                var msg = JSON.parse(jqXHR.responseText) ;
                $(errorMail).show();
                $(successMail).hide();
                $("#contact-form :input").prop("disabled", false);
                $(errorMail).text(msg.error);
            });


        return false ;
    })

  
  
})(window.jQuery);