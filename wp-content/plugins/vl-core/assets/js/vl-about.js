(function ($) {
     "use strict";
   
      var Widget_vl_about = function($scope, $) {
           var reveal = $scope.find(".reveal").eq(0);
           




      };
      
      // // Make sure you run this code under Elementor.
      $( window ).on( 'elementor/frontend/init', function() {
           elementorFrontend.hooks.addAction( 'frontend/element_ready/vl-about.default', Widget_vl_about );
      } );
 
 
 
 }(jQuery));
 




