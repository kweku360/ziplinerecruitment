(function ($) {
     "use strict";
   
      var Widget_vl_hero = function($scope, $) {
           var hero_slider10 = $scope.find(".hero10-sliders").eq(0);
           
           hero_slider10.slick({
               margin: "30",
               slidesToShow: 1,
               arrows: true,
               autoplay: true,
               autoplaySpeed: 5000,
               centerMode: true,
               loop: true,
               centerMode: false,
               prevArrow: $(".hero10-next-arrow"),
               nextArrow: $(".hero10-prev-arrow"),
               draggable: true,
               fade: true,
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
         

      };
      
      // // Make sure you run this code under Elementor.
      $( window ).on( 'elementor/frontend/init', function() {
           elementorFrontend.hooks.addAction( 'frontend/element_ready/vl-hero.default', Widget_vl_hero );
      } );
 
 
 
 }(jQuery));
 