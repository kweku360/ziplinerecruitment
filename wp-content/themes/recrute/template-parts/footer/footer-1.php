<?php 
/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package recrute
*/

// Get theme customizer settings
$footer_bg_color = get_theme_mod( 'footer_bg_color', '#1a1a2e' );
$footer_cta_switch = get_theme_mod( 'footer_cta_switch', true );
$footer_top_cta_title = get_theme_mod('footer_top_cta_title', __('Ready to Power up your Savings and Reliability?', 'recrute'));
$footer_top_cta_content = get_theme_mod('footer_top_cta_content', __('Feel free to customize this paragraph to better reflect the specific services offered by your IT solution & the unique', 'recrute'));

// Footer content settings
$footer_logo = get_theme_mod( 'recrute_footer_logo', get_template_directory_uri() . '/assets/img/logo/logo-white.png' );
$footer_description = get_theme_mod( 'footer_description', __('Our goal is to demystify the process, address your concerns, and empower you with the knowledge to embark.', 'recrute') );

// Social media links
$footer_fb_url = get_theme_mod( 'recrute_footer_fb_url', '#' );
$footer_twitter_url = get_theme_mod( 'recrute_footer_twitter_url', '#' );
$footer_instagram_url = get_theme_mod( 'recrute_footer_instagram_url', '#' );
$footer_linkedin_url = get_theme_mod( 'recrute_footer_linkedin_url', '#' );

// Contact information
$footer_address = get_theme_mod( 'footer_address', __('8708 Technology Forest PI Suite 125 -G, The Woodlands', 'recrute') );
$footer_email = get_theme_mod( 'footer_email', __('infoseoc@gmail.com', 'recrute') );
$footer_phone = get_theme_mod( 'footer_phone', __('123-456-7890', 'recrute') );

// Copyright text
$copyright_text = get_theme_mod( 'footer_copyright', __('© 2024 recrute, All Rights Reserved. Design By VikingLab', 'recrute') );

?>

<!-- Main Footer -->
<footer class="main-footer" style="background-color: <?php echo esc_attr($footer_bg_color); ?>;">
    <div class="container">
        <div class="row">
            <!-- Company Info Column -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget company-info">
                    <div class="footer-logo">
                        <img src="<?php echo esc_url($footer_logo); ?>" alt="Zipline Recruitment" class="logo-img">
                        <span class="logo-text">Zipline Recruitment</span>
                    </div>
                    <p class="company-description"><?php echo esc_html($footer_description); ?></p>
                    <div class="social-links">
                        <?php if(!empty($footer_fb_url)): ?>
                        <a href="<?php echo esc_url($footer_fb_url); ?>" class="social-link">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <?php endif; ?>
                        
                        <?php if(!empty($footer_twitter_url)): ?>
                        <a href="<?php echo esc_url($footer_twitter_url); ?>" class="social-link">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <?php endif; ?>
                        
                        <?php if(!empty($footer_instagram_url)): ?>
                        <a href="<?php echo esc_url($footer_instagram_url); ?>" class="social-link">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <?php endif; ?>
                        
                        <?php if(!empty($footer_linkedin_url)): ?>
                        <a href="<?php echo esc_url($footer_linkedin_url); ?>" class="social-link">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Quick Links Column -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="widget-title">Quick Links</h3>
                    <?php
                    if ( has_nav_menu( 'footer-menu' ) ) {
                        wp_nav_menu( [
                            'theme_location' => 'footer-menu',
                            'menu_class'     => 'footer-links',
                            'container'      => false,
                        ] );
                    } else {
                        echo '<ul class="footer-links"><li><a href="#">Set up your footer menu in WP Admin</a></li></ul>';
                    }
                    ?>
                </div>
            </div>

            <!-- Explore Column -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="widget-title">Explore</h3>
                    <?php
                    if ( has_nav_menu( 'explore-menu' ) ) {
                        wp_nav_menu( [
                            'theme_location' => 'explore-menu',
                            'menu_class'     => 'footer-links',
                            'container'      => false,
                        ] );
                    } else {
                        echo '<ul class="footer-links"><li><a href="#">Set up your footer menu in WP Admin</a></li></ul>';
                    }
                    ?>
                </div>
            </div>

            <!-- Get In Touch Column -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="widget-title">Get In Touch</h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <span><?php echo esc_html($footer_address); ?></span>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-envelope"></i>
                            <span><?php echo esc_html($footer_email); ?></span>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-phone"></i>
                            <span><?php echo esc_html($footer_phone); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="copyright-text">
                        <p><?php echo esc_html($copyright_text); ?></p>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <div class="back-to-top">
                        <button class="back-to-top-btn">
                            <i class="fa-solid fa-arrow-up"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--===== FOOTER AREA END =======-->