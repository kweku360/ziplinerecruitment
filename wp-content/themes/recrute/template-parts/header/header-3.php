<?php 

	/**
	 * Template part for displaying header layout three
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package recrute
	*/
	// info

   // Button 
    $recrute_button_text = get_theme_mod( 'header_button_text', __( 'Get Started', 'recrute' ) );
    $recrute_button_link = get_theme_mod( 'header_button_link', __( '#', 'recrute' ) );

   // header right
   $recrute_header_right = get_theme_mod( 'header_right_switch', false );
   $recrute_menu_col = $recrute_header_right ? 'col-xl-7 col-lg-8 d-none d-lg-block' : 'col-xl-10 col-lg-8 d-none d-lg-block';
   $recrute_menu_end = $recrute_header_right ? '' : 'd-flex justify-content-end';


?>


<!--=====HEADER START=======-->
<header>
     <div class="header-area header-area4 header-area-all d-none d-lg-block" id="header">
          <div class="container">
               <div class="row header-bg">
                    <div class="col-12">
                         <div class="header-elements">
                              <div class="site-logo">
                                   <?php recrute_header_logo(); ?>
                              </div>

                              <div class="main-menu-ex main-menu-ex1">
                                   <nav class="main-menu-content">
                                        <?php recrute_header_menu(); ?>
                                   </nav>
                              </div>

                              <?php  if ( !empty( $recrute_header_right ) ): ?>
                              <div class="header2-buttons">
                                   <div class="button">
                                        <a class="theme-btn8"
                                             href="<?php echo esc_url($recrute_button_link); ?>"><?php echo esc_html($recrute_button_text); ?>
                                             <span><i class="fa-solid fa-arrow-right"></i></span></a>
                                   </div>
                              </div>
                              <?php endif; ?>

                         </div>
                    </div>
               </div>
          </div>
     </div>
</header>
<!--=====HEADER END=======-->

<?php get_template_part( 'template-parts/header/header-side-info' ); ?>