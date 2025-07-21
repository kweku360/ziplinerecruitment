(function ($) {
     "use strict";
   
      var Widget_vl_brand = function($scope, $) {
           var logoSlider = $scope.find(".logo-slider").eq(0);
           var logoSlider3 = $scope.find(".logo-slider3").eq(0);
           var logoSlider4 = $scope.find(".logo-slider4").eq(0);

           logoSlider4.slick({
               slidesToShow: 6,
               slidesToScroll: 1,
               autoplay: true,
               autoplaySpeed: 0,
               speed: 8000,
               pauseOnHover: true,
               arrows: false,
               cssEase: 'linear',
               responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 6,
                    slidesToScroll: 1,
                  }
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                  }
                }
              ],
         
             });

           logoSlider3.slick({
               slidesToShow: 6,
               slidesToScroll: 1,
               autoplay: true,
               autoplaySpeed: 0,
               speed: 12000,
               pauseOnHover: true,
               arrows: false,
             cssEase: 'linear',
               
             responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 6,
                  slidesToScroll: 1,
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                }
              }
            ],
      
         
             });
         
           

           logoSlider.slick({
               slidesToShow: 6,
               slidesToScroll: 1,
               autoplay: true,
               autoplaySpeed: 0,
               speed: 8000,
               pauseOnHover: true,
               arrows: false,
               cssEase: 'linear',
         
               responsive: [
                 {
                   breakpoint: 1024,
                   settings: {
                     slidesToShow: 3,
                     slidesToScroll: 3,
                     infinite: true,
                     dots: false
                   }
                 },
                 {
                   breakpoint: 600,
                   settings: {
                     slidesToShow: 2,
                     slidesToScroll: 2
                   }
                 },
                 {
                   breakpoint: 480,
                   settings: {
                     slidesToShow: 2,
                     slidesToScroll: 1
                   }
                 }
               ]
         
             });
         

      };
      
      // // Make sure you run this code under Elementor.
      $( window ).on( 'elementor/frontend/init', function() {
           elementorFrontend.hooks.addAction( 'frontend/element_ready/vl-brand.default', Widget_vl_brand );
      } );
 
 
 
 }(jQuery));
 