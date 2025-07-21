(function ($) {
     "use strict";
   
      var Widget_vl_price = function($scope, $) {
           var ce_toggle = $scope.find("#ce-toggle").eq(0);
           var price_toggle_wrap = $scope.find(".plan-toggle-wrap").eq(0);
           var contentyearly = $scope.find(".tab-content #yearly").eq(0);
           var contentmonthly = $scope.find(".tab-content #monthly").eq(0);

           ce_toggle.click(function (event) {
               price_toggle_wrap.toggleClass("active");
             });
         
             ce_toggle.change(function () {
               if ($(this).is(":checked")) {
                    contentyearly.hide();
                    contentmonthly.show();
               } else {
                    contentyearly.show();
                    contentmonthly.hide();
               }
             });


      };
      
      // // Make sure you run this code under Elementor.
      $( window ).on( 'elementor/frontend/init', function() {
           elementorFrontend.hooks.addAction( 'frontend/element_ready/vl-pricing-plan.default', Widget_vl_price );
      } );
 
 
 
 }(jQuery));
 




