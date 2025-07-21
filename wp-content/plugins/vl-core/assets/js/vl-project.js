(function ($) {
     "use strict";
   
      var Widget_vl_project = function($scope, $) {
           var projectTwo = $scope.find(".project-two__box li");
           var two__carousel = $scope.find(".project-two__carousel");
           var three__carousel = $scope.find(".project-there__carousel");
           var case7Slider = $scope.find(".case7-slider");


           case7Slider.slick({
               autoplay: true,
               autoplaySpeed: 1500,
               margin: 30,
               slidesToShow: 3,
               arrows: true,
               centerMode: false,
               loop: true,
               centerMode: false,
               prevArrow: $(".case7-prev-arrow1"),
               nextArrow: $(".case7-next-arrow1"),
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

          three__carousel.owlCarousel({
               loop: true,
               autoplay: false,
               margin: 30,
               nav:true,
               navText: ['<i class="fa-solid fa-angle-left"></i>', '<i class="fa-solid fa-angle-right"></i>'],
               dots: false,
               smartSpeed: 500,
               autoplayTimeout: 10000,
               responsive: {
                    0: {
                         items: 1
                    },
                    768: {
                         items: 1
                    },
                    992: {
                         items: 2
                    },
                    1200: {
                         items: 3,
                    }
               }
          });

           two__carousel.owlCarousel({
               loop: true,
               autoplay: true,
               margin: 30,
               nav: false,
               dots: true,
               smartSpeed: 500,
               autoplayTimeout: 10000,
               responsive: {
                 0: {
                   items: 1
                 },
                 768: {
                   items: 1
                 },
                 992: {
                   items: 2
                 },
                 1200: {
                   items: 3
                 }
               }
             });
           

           if (projectTwo.length) {
               $(".project-two__box li").each(function () {
                 let self = $(this);
         
                 self.on("mouseenter", function () {
                   console.log($(this));
                   projectTwo.removeClass("active");
                   $(this).addClass("active");
                 });
               });
             }


      };
      
      // // Make sure you run this code under Elementor.
      $( window ).on( 'elementor/frontend/init', function() {
           elementorFrontend.hooks.addAction( 'frontend/element_ready/vl-projects.default', Widget_vl_project );
      } );
 
 
 
 }(jQuery));
 




