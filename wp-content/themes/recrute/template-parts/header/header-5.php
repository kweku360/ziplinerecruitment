<?php 

	/**
	 * Template part for displaying header layout three
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package recrute
	*/
	// info

    // contact button
    $recrute_button_text = get_theme_mod( 'header_button_text', __( 'Get Started', 'recrute' ) );
    $recrute_button_link = get_theme_mod( 'header_button_link', __( '#', 'recrute' ) );
    $recrute_sticky_logo = get_theme_mod( 'header_sticky_logo', get_template_directory_uri() . '/assets/img/logo/logo-white.png' );
    
   // Button 
   $header_top_button_link = get_theme_mod( 'header_button_link', __( '#', 'recrute' ) );
   $recrute_header_right = get_theme_mod( 'header_right_switch', false );

?>


<header>
     <div class="header-area header-area2 header-area-all d-none d-lg-block" id="header">
          <div class="container">
               <div class="row">
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

                              <?php if($recrute_header_right == true): ?>
                              <div class="header2-buttons">
                                   <div class="button">
                                        <a class="theme-btn4"
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

<?php get_template_part( 'template-parts/header/header-side-info' ); ?>