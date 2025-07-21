
(function ($) {
     "use strict";


      var Widget_service = function($scope, $) {
          
           var service7slider = $scope.find(".service7-slider");
           
           service7slider.slick({
               autoplay: true,
               autoplaySpeed: 1500,
               margin: 30,
               slidesToShow: 3,
               arrows: true,
               centerMode: false,
               loop: true,
               centerMode: false,
               prevArrow: $(".service7-prev-arrow1"),
               nextArrow: $(".service7-next-arrow1"),
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
           elementorFrontend.hooks.addAction( 'frontend/element_ready/vl-services.default', Widget_service );
      } );
 
 
 
 }(jQuery));
 