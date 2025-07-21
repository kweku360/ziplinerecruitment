<?php 

   /**
    * Template part for displaying header side information
    *
    * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
    *
    * @package recrute
   */

    $header_side_logo = get_theme_mod( 'header_side_logo', get_template_directory_uri() . '/assets/img/logo/logo-black.png' );

    //  Text 
    $header_side_contacts_text = get_theme_mod( 'header_side_contacts_text', __( 'Contact Us', 'recrute' ) );
    $header_side_social_heading = get_theme_mod( 'header_side_social_heading', __( 'Socail Media', 'recrute' ) );

    // side button
    $header_button_text = get_theme_mod( 'header_button_text', __( 'Get A Quote', 'recrute' ) );
    $header_button_link = get_theme_mod( 'header_button_link', __( '#', 'recrute' ) );

    //Social Media
    $header_fb_link = get_theme_mod( 'header_fb_link', __( '#', 'recrute' ) );
    $header_twitter_link = get_theme_mod( 'header_twitter_link', __( '#', 'recrute' ) );
    $header_linkedin_link = get_theme_mod( 'header_linkedin_link', __( '#', 'recrute' ) );
    $header_instagram_link = get_theme_mod( 'header_instagram_link', __( '#', 'recrute' ) );
    $header_youtube_link = get_theme_mod( 'header_youtube_link', __( '#', 'recrute' ) );
 

   // Email id 
   $header_top_email = get_theme_mod( 'header_email', __( 'recrute@support.com', 'recrute' ) );

   // Phone Number
   $header_top_phone = get_theme_mod( 'header_phone', __( '+8801310-069824', 'recrute' ) );

   // Header Address Text
   $header_top_address_text = get_theme_mod( 'header_address', __( '734 H, Bryan Burlington, NC 27215', 'recrute' ) );

   // Header Address Link
   $header_top_address_link = get_theme_mod( 'header_address_link', __( 'https://www.google.com/maps/@36.0758266,-79.4558848,17z', 'recrute' ) );


   //Offcanvas About Us
   $offcanvas_about_us = get_theme_mod( 'header_top_offcanvas_textarea', __( 'Web designing in a powerful way of just not an only professions. We have tendency to believe the idea that smart looking .', 'recrute' ) );

    // footer area links  switch
    $header_side_info_switch = get_theme_mod( 'header_side_info_switch', false );
    $header_side_social_switch = get_theme_mod( 'header_side_social_switch', false );
    $header_side_button_switch = get_theme_mod( 'header_side_button_switch', false );

?>

<!--=====Mobile header start=======-->
<div class="mobile-header mobile-header-main d-block d-lg-none ">
     <div class="container-fluid">
          <div class="col-12">
               <div class="mobile-header-elements">
                    <div class="mobile-logo">
                         <a href="<?php print esc_url( home_url( '/' ) );?>">
                              <img src="<?php echo esc_url( $header_side_logo ); ?>"
                                   alt="<?php print esc_attr__( 'logo', 'recrute' );?>">
                         </a>
                    </div>
                    <div class="mobile-nav-icon">
                         <i class="fa-solid fa-bars"></i>
                    </div>
               </div>
          </div>
     </div>
</div>

<div class="mobile-sidebar d-block d-lg-none">
     <div class="logo-m">
          <a href="<?php print esc_url( home_url( '/' ) );?>">
               <img src="<?php echo esc_url( $header_side_logo ); ?>"
                    alt="<?php print esc_attr__( 'logo', 'recrute' );?>">
          </a>
     </div>
     <div class="menu-close">
          <i class="fa-solid fa-xmark"></i>
     </div>
     <div class="mobile-nav">
          <div class="mobile-menu-content"></div>

          <?php if($header_side_info_switch == true): ?>

          <?php if(!empty($header_side_button_switch)): ?>
          <div class="mobile-button">
               <a class="theme-btn1"
                    href="<?php echo esc_url($header_button_link); ?>"><?php echo esc_html($header_button_text); ?>
                    <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
          <?php endif; ?>

          <div class="single-footer-items">
               <h3><?php echo esc_html($header_side_contacts_text); ?></h3>

               <?php if(!empty($header_top_email)): ?>
               <div class="contact-box">
                    <div class="icon">
                         <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="pera">
                         <a href="tel:<?php echo esc_html($header_top_email); ?>"><?php echo esc_html($header_top_email); ?></a>
                    </div>
               </div>
               <?php endif; ?>

               <?php if(!empty($header_top_email)): ?>
               <div class="contact-box">
                    <div class="icon">
                         <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="pera">
                         <a
                              href="mailto:<?php echo esc_html($header_top_email); ?>"><?php echo esc_html($header_top_email); ?></a>
                    </div>
               </div>
               <?php endif;?>

               <?php if(!empty($header_top_address_text)): ?>
               <div class="contact-box">
                    <div class="icon">
                         <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="pera">
                         <a
                              href="<?php echo esc_url($header_top_address_link); ?>"><?php echo esc_html($header_top_address_text); ?></a>
                    </div>
               </div>

               <?php endif; ?>

          </div>

          <?php if($header_side_social_switch == true): ?>
          <div class="contact-infos">
               <h3><?php echo esc_html($header_side_social_heading); ?></h3>
               <ul class="social-icon">

                    <?php if(!empty($header_fb_link)): ?>
                    <li><a href="<?php echo esc_url($header_fb_link); ?>"><i class="fa-brands fa-facebook-f"></i></a>
                    </li>
                    <?php endif; ?>

                    <?php if(!empty($header_linkedin_link)): ?>
                    <li><a href="<?php echo esc_url($header_linkedin_link); ?>"><i
                                   class="fa-brands fa-linkedin-in"></i></a></li>
                    <?php endif; ?>

                    <?php if(!empty($header_instagram_link)): ?>
                    <li><a href="<?php echo esc_url($header_instagram_link); ?>"><i
                                   class="fa-brands fa-instagram"></i></a></li>
                    <?php endif; ?>

                    <?php if(!empty($header_twitter_link)): ?>
                    <li><a href="<?php echo esc_url($header_twitter_link); ?>"><i class="fa-solid fa-x"></i></a></li>
                    <?php endif; ?>

               </ul>
          </div>
          <?php endif; ?>

          <?php endif; ?>
     </div>
</div>


<!--=====Mobile header end=======-->