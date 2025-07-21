(function ($) {
     "use strict";
   
      var Widget_vl_testimonial = function($scope, $) {
           var Testimonial1 = $scope.find(".tes1-slider").eq(0);
           var Testimonial4 = $scope.find(".tes4-slider").eq(0);
           var Testimonial6 = $scope.find(".tes6-slider").eq(0);
           var Slidergaleria = $scope.find(".slider-galeria").eq(0);
           var Slidergaleriathumbs = $scope.find(".slider-galeria-thumbs").eq(0);
           var Testimonial8 = $scope.find(".tes8-slider").eq(0);
           var Tes2slider = $scope.find(".tes2-slider").eq(0);
  
          Tes2slider.owlCarousel({
            loop: true,
            autoplay: true,
            margin: 30,
            nav: false,
            items: 1,
            smartSpeed: 500,
            autoplayTimeout: 10000,
          });
                  
        Testimonial8.slick({
            margin: 30,
            slidesToShow: 1,
            arrows: true,
            centerMode: true,
            loop: true,
            autoplay: true,
            autoplaySpeed: 2000,
            centerMode: false,
            prevArrow: $(".tes8-next-arrow"),
            nextArrow: $(".tes8-prev-arrow"),
            draggable: true,
            fade: false,
            responsive: [
              {
                breakpoint: 769,
                settings: {
                  arrows: false,
                  centerMode: false,
                  centerPadding: "40px",
                  slidesToShow: 1,
                },
              },
              {
                breakpoint: 480,
                settings: {
                  arrows: false,
                  centerMode: false,
                  centerPadding: "40px",
                  slidesToShow: 1,
                },
              },
            ],
          });


           Slidergaleria.slick({
               slidesToShow: 1,
               slidesToScroll: 1,
               arrows: true,
               infinite: false,
               asNavFor: '.slider-galeria-thumbs',
               prevArrow: $('.testimonial-next-arrow2'),
               nextArrow: $('.testimonial-prev-arrow2'),
           });
           
          Slidergaleriathumbs.slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          items: 15,
          arrows: true,
          asNavFor: '.slider-galeria',
          vertical: true,
          verticalSwiping: true,
          focusOnSelect: true,
          infinite: false,
          prevArrow: $('.testimonial-next-arrow2'),
          nextArrow: $('.testimonial-prev-arrow2'),
          });

           Testimonial6.slick({
               margin: 30,
               slidesToShow: 3,
               arrows: true,
               centerMode: true,
               loop: true,
               autoplay: true,
               autoplaySpeed: 2000,
               centerMode: false,
               prevArrow: $(".tes6-next-arrow"),
               nextArrow: $(".tes6-prev-arrow"),
               draggable: true,
               fade: false,
               responsive: [
                 {
                   breakpoint: 769,
                   settings: {
                     arrows: false,
                     centerMode: false,
                     centerPadding: "40px",
                     slidesToShow: 1,
                   },
                 },
                 {
                   breakpoint: 480,
                   settings: {
                     arrows: false,
                     centerMode: false,
                     centerPadding: "40px",
                     slidesToShow: 1,
                   },
                 },
               ],
             });


           Testimonial4.slick({
               margin: 30,
               slidesToShow: 3,
               arrows: true,
               centerMode: false,
               loop: true,
               centerMode: false,
               prevArrow: $(".testimonial-prev-arrow1"),
               nextArrow: $(".testimonial-next-arrow1"),
               draggable: true,
               centerPadding: "40px",
               dots: false,
               scroll: true,
               responsive: [
               {
               breakpoint: 769,
               settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: "40px",
                    slidesToShow: 2,
               },
               },
               {
               breakpoint: 480,
               settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: "40px",
                    slidesToShow: 1,
               },
               },
               ],
          });

           Testimonial1.slick({
               autoplay: true,
               autoplaySpeed: 1500,
               margin: 30,
               slidesToShow: 2,
               arrows: true,
               centerMode: false,
               loop: true,
               centerMode: false,
               prevArrow: $(".testimonial-prev-arrow1"),
               nextArrow: $(".testimonial-next-arrow1"),
               draggable: true,
               centerPadding: "40px",
               dots: false,
               scroll: true,
               responsive: [
                 {
                   breakpoint: 769,
                   settings: {
                     arrows: false,
                     centerMode: true,
                     centerPadding: "40px",
                     slidesToShow: 2,
                   },
                 },
                 {
                   breakpoint: 480,
                   settings: {
                     arrows: false,
                     centerMode: true,
                     centerPadding: "40px",
                     slidesToShow: 1,
                   },
                 },
               ],
             });
          

      };
      
      // // Make sure you run this code under Elementor.
      $( window ).on( 'elementor/frontend/init', function() {
           elementorFrontend.hooks.addAction( 'frontend/element_ready/vl-testimonial.default', Widget_vl_testimonial );
      } );
 
 
 
 }(jQuery));
 




