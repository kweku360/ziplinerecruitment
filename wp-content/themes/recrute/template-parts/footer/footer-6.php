<?php 

/**
 * Template part for displaying footer layout three
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package recrute
*/

  //Layout & footer logo
  $recrute_footer_logo = get_theme_mod( 'recrute_footer_logo' );
  $recrute_footer_top_space = function_exists('tpmeta_field') ? tpmeta_field('recrute_footer_top_space') : '0';
  $recrute_copyright_center = $recrute_footer_logo ? 'col-lg-4 offset-lg-4 col-md-6 text-right' : 'col-lg-12 text-center';

  //footer bg image & color from page
  $recrute_footer_bg_url_from_page = function_exists( 'tpmeta_image_field' ) ? tpmeta_image_field( 'recrute_footer_bg_image' ) : '';
  $recrute_footer_bg_color_from_page = function_exists( 'tpmeta_field' ) ? tpmeta_field( 'recrute_footer_bg_color' ) : '';

  //Footer bg image & color from theme customizer
  $footer_bg_img = get_theme_mod( 'footer_bg_image' );
  $footer_bg_color = get_theme_mod( 'footer_bg_color' );
  
  //copyright area
  $footer_bottom_copyright_area_switch = get_theme_mod( 'footer_bottom_copyright_area_switch', true );
  $footer_cta_switch = get_theme_mod( 'footer_cta_switch', false );

  // bg image & Color
  $bg_img = !empty( $recrute_footer_bg_url_from_page['url'] ) ? $recrute_footer_bg_url_from_page['url'] : $footer_bg_img;
  $bg_color = !empty( $recrute_footer_bg_color_from_page ) ? $recrute_footer_bg_color_from_page : $footer_bg_color;


  //Footer Top CTA
  $footer_top_cta_title  = get_theme_mod('footer_top_cta_title', __('Ready to Power up your Savings and Reliability?', 'recrute'));
  $footer_top_cta_content  = get_theme_mod('footer_top_cta_content', __('Feel free to customize this paragraph to better reflect the specific services offered by your IT solution & the unique', 'recrute'));
  $footer_top_cta_subscribe  = get_theme_mod('footer_top_cta_subscribe', __('[contact-form-7 id="1721bd5" title="Subscribe-main"]', 'recrute'));

//Footer CTA Color & images
$cta_bg_image = get_theme_mod( 'cta_bg_image' );
$cta_image = get_theme_mod( 'cta_image' );
$cta_bg_color = get_theme_mod( 'cta_bg_color' );
$recrute_footer_cta_bg_url_from_page = function_exists( 'tpmeta_image_field' ) ? tpmeta_image_field( 'recrute_footer_cta_bg_image' ) : '';
$recrute_footer_cta_bg_color_from_page = function_exists( 'tpmeta_field' ) ? tpmeta_field( 'recrute_footer_cta_bg_color' ) : '';
$recrute_footer_cta_image_url_from_page = function_exists( 'tpmeta_image_field' ) ? tpmeta_image_field( 'recrute_footer_cta_image' ) : '';

$footer_cta_bg_img = !empty($recrute_footer_cta_bg_url_from_page['url']) ? $recrute_footer_cta_bg_url_from_page['url'] : $cta_bg_image;
$footer_cta_bg_color = !empty($recrute_footer_cta_bg_color_from_page) ? $recrute_footer_cta_bg_color_from_page : $cta_bg_color;
$footer_cta_image_img = !empty($recrute_footer_cta_image_url_from_page['url']) ? $recrute_footer_cta_image_url_from_page['url'] : $cta_image;



  // footer_columns
  $footer_columns = 0;
  $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

  for ( $num = 1; $num <= $footer_widgets + 1; $num++ ) {
      if ( is_active_sidebar( 'footer-' . $num ) ) {
          $footer_columns++;
      }
  }

  switch ( $footer_columns ) {
  case '1':
      $footer_class[1] = 'col-lg-12';
      break;
  case '2':
      $footer_class[1] = 'col-lg-6 col-md-6';
      $footer_class[2] = 'col-lg-6 col-md-6';
      break;
  case '3':
      $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
      $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
      $footer_class[3] = 'col-xl-4 col-lg-6';
      break;
  case '4':
      $footer_class[1] = 'col-xl-3 col-lg-4 col-md-6 col-sm-6';
      $footer_class[2] = 'col-xl-3 col-lg-2 col-md-6 col-sm-6';
      $footer_class[3] = 'col-xl-3 col-lg-3 col-md-6 col-sm-6';
      $footer_class[4] = 'col-xl-3 col-lg-3 col-md-6 col-sm-6';
      break;
  default:
      $footer_class = 'col-xl-3 col-lg-3 col-md-6';
      break;
  }

  if ( is_active_sidebar('footer-6-1') OR is_active_sidebar('footer-6-2') OR is_active_sidebar('footer-6-3') OR is_active_sidebar('footer-6-4') ){
     $footertopSpecing = 'footer-top-spacing';
    }


?>

<?php if($footer_cta_switch == true): ?>
<!--=====CTA AREA START=======-->
<div class="cta6">
     <div class="container">
          <div class="row">
               <div class="col-lg-5">
                    <div class="heading6-w">
                      <h2><?php echo esc_html($footer_top_cta_title); ?></h2>
                         <div class="space16"></div>
                         <p><?php echo esc_html($footer_top_cta_content); ?></p>
                         <div class="form-area">
                          <?php echo do_shortcode($footer_top_cta_subscribe); ?>
                         </div>
                    </div>
               </div>
               <?php if(!empty($footer_cta_image_img)): ?>
               <div class="col-md-7">
                    <div class="images">
                         <div class="img2">
                          <img src="<?php echo esc_url($footer_cta_image_img); ?>" alt="">
                         </div>
                    </div>
               </div>
              <?php endif; ?>
          </div>
     </div>
</div>
<!--=====CTA AREA END=======-->
<?php endif; ?>

<!--===== FOOTER AREA START =======-->
<div class="footer6 _relative <?php echo esc_attr($footertopSpecing); ?>" style="background-image:url(<?php echo esc_url($bg_img ); ?>); background-color:<?php echo esc_attr($bg_color); ?>">
<?php if ( is_active_sidebar('footer-6-1') OR is_active_sidebar('footer-6-2') OR is_active_sidebar('footer-6-3') OR is_active_sidebar('footer-6-4') ): ?>
     <div class="container">
          <div class="row">
          <?php
                    if ( $footer_columns < 5 ) {
                        print '<div class="col-lg-4 col-md-6 col-sm-6 footer-logo-area">';
                        dynamic_sidebar( 'footer-6-1' );
                        print '</div>';

                        print '<div class="col-lg col-md-6 col-sm-6">';
                        dynamic_sidebar( 'footer-6-2' );
                        print '</div>';

                        print '<div class="col-lg col-md-6 col-sm-6">';
                        dynamic_sidebar( 'footer-6-3' );
                        print '</div>';

                        print '<div class="col-lg-3 col-md-6 col-sm-6">';
                        dynamic_sidebar( 'footer-6-4' );
                        print '</div>';
                    } else {
                    for ( $num = 1; $num <= $footer_columns; $num++ ) {
                    if ( !is_active_sidebar( 'footer-6-' . $num ) ) {
                    continue;
                    }
                        print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                        dynamic_sidebar( 'footer-6-' . $num );
                        print '</div>';
                    }
                    }
                ?>
          </div>
     </div>
     <?php endif; ?>
     <?php if($footer_bottom_copyright_area_switch == true): ?>
     <div class="copyright-area _relative">
          <div class="container">
               <div class="row align-items-center">
                    <div class="col-md-12">
                         <div class="coppyright">
                         <p><?php print recrute_copyright_text(); ?></p>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <?php endif; ?>
</div>
<!--===== FOOTER AREA END =======-->
