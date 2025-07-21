<?php 

	/**
	 * Template part for displaying header layout three
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package recrute
	*/
	// info
     $header_topbar_switch = get_theme_mod( 'header_topbar_switch', false );

     $header_top_phone = get_theme_mod( 'header_phone', __( '+8801765980082', 'recrute' ) );
     $header_top_time = get_theme_mod( 'header_top_time', __( 'Sunday - Friday: 9 am - 8 pm', 'recrute' ) );
     $header_top_email = get_theme_mod( 'header_email', __( 'recrute@support.com', 'recrute' ) );

     $header_top_address_text = get_theme_mod( 'header_address', __( '734 H, Bryan Burlington, NC 27215', 'recrute' ) );
     $header_address_link = get_theme_mod( 'header_address_link', __( '#', 'recrute' ) );

   // Button 
    $recrute_button_text = get_theme_mod( 'header_button_text', __( 'Get Started', 'recrute' ) );
    $recrute_button_link = get_theme_mod( 'header_button_link', __( '#', 'recrute' ) );

   // header right
   $recrute_header_right = get_theme_mod( 'header_right_switch', false );
   $recrute_menu_col = $recrute_header_right ? 'col-xl-7 col-lg-8 d-none d-lg-block' : 'col-xl-10 col-lg-8 d-none d-lg-block';
   $recrute_menu_end = $recrute_header_right ? '' : 'd-flex justify-content-end';

$top_icon_1 = get_template_directory_uri().'/assets/img/icons/header5-top-icon1.png';
$top_icon_2 = get_template_directory_uri().'/assets/img/icons/header5-top-icon2.png';
$top_icon_3 = get_template_directory_uri().'/assets/img/icons/header5-top-icon3.png';
$top_icon_4 = get_template_directory_uri().'/assets/img/icons/header5-top-icon4.png';



?>

<?php if($header_topbar_switch == true): ?>
<div class="header5-top d-none d-lg-block">
     <div class="container">
          <div class="row">

               <?php if(!empty($header_top_email)): ?>
               <div class="col-lg col-md-6">
                    <div class="icon-text">
                         <a href="mailto:<?php echo esc_html($header_top_email); ?>"><img src="<?php echo esc_url($top_icon_1); ?>"
                                   alt=""> <?php echo esc_html($header_top_email); ?></a>
                    </div>
               </div>
               <?php endif; ?>

               <?php if(!empty($header_top_address_text)): ?>
               <div class="col-lg col-md-6">
                    <div class="icon-text">
                         <a href="<?php echo esc_url($header_address_link); ?>"><img src="<?php echo esc_url($top_icon_2); ?>" alt="">
                              <?php echo esc_html($header_top_address_text); ?></a>
                    </div>
               </div>
               <?php endif; ?>

               <?php if(!empty($header_top_time)): ?>
               <div class="col-lg col-md-6">
                    <div class="icon-text">
                         <a href="#"><img src="<?php echo esc_url($top_icon_3); ?>" alt="">
                              <?php echo esc_html($header_top_time); ?> </a>
                    </div>
               </div>
               <?php endif; ?>

               <?php if(!empty($header_top_phone)): ?>
               <div class="col-lg col-md-6">
                    <div class="icon-text">
                         <a href="tel:<?php echo esc_html($header_top_phone); ?>"><img src="<?php echo esc_url($top_icon_4); ?>" alt=""><?php echo esc_html__("Call Now:","recrute"); ?>
                              <?php echo esc_html($header_top_phone); ?></a>
                    </div>
               </div>
               <?php endif; ?>

          </div>
     </div>
</div>

<?php endif; ?>


<header>
     <div class="header-area header-area5 header-area-all d-none d-lg-block" id="header">
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

                              <?php  if ( !empty( $recrute_header_right ) ): ?>
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
<!--=====HEADER END=======-->

<?php get_template_part( 'template-parts/header/header-side-info' ); ?>