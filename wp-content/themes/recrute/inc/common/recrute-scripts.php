<?php

/**
 * recrute_scripts description
 * @return [type] [description]
 */
function recrute_scripts() {

    /**
     * all css files
    */ 

    wp_enqueue_style( 'recrute-fonts', recrute_fonts_url(), array(), '1.0.0' );
    if( is_rtl() ){
        wp_enqueue_style( 'bootstrap-rtl', RECRUTE_THEME_CSS_DIR.'bootstrap.rtl.min.css', array() );
    }else{
        wp_enqueue_style( 'bootstrap', RECRUTE_THEME_CSS_DIR.'bootstrap.css', array() );
    }
    wp_enqueue_style( 'aos', RECRUTE_THEME_CSS_DIR . 'aos.css', [] );
    wp_enqueue_style( 'magnific-popup', RECRUTE_THEME_CSS_DIR . 'magnific-popup.css', [] );
    wp_enqueue_style( 'font-awesome-pro', RECRUTE_THEME_CSS_DIR . 'font-awesome-pro.css', [] );
    wp_enqueue_style( 'slick-slider', RECRUTE_THEME_CSS_DIR . 'slick-slider.css', [] );
    wp_enqueue_style( 'owl-carousel', RECRUTE_THEME_CSS_DIR . 'owl.carousel.min.css', [] );
    wp_enqueue_style( 'spacing', RECRUTE_THEME_CSS_DIR . 'spacing.css', [] );
    wp_enqueue_style( 'recrute-unit', RECRUTE_THEME_CSS_DIR . 'recrute-unit.css', [], time() );
    wp_enqueue_style( 'mobile-menu', RECRUTE_THEME_CSS_DIR . 'mobile-menu.css', [] );
    wp_enqueue_style( 'recrute-core', RECRUTE_THEME_CSS_DIR . 'recrute-core.css', [], time() );
    wp_enqueue_style( 'recrute-custom', RECRUTE_THEME_CSS_DIR . 'recrute-custom.css', [] );
    wp_enqueue_style( 'recrute-style', get_stylesheet_uri() );


    // all js
    wp_enqueue_script( 'waypoints', RECRUTE_THEME_JS_DIR . 'waypoints.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'bootstrap-bundle', RECRUTE_THEME_JS_DIR . 'bootstrap-bundle.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'aos', RECRUTE_THEME_JS_DIR . 'aos.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'mobile-menu', RECRUTE_THEME_JS_DIR . 'mobile-menu.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'magnific-popup', RECRUTE_THEME_JS_DIR . 'magnific-popup.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'owl-carousel', RECRUTE_THEME_JS_DIR . 'owl.carousel.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'slick-slider', RECRUTE_THEME_JS_DIR . 'slick-slider.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'gsap-main', RECRUTE_THEME_JS_DIR . 'gsap.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'j-counterup', RECRUTE_THEME_JS_DIR . 'jquery.countup.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'scrolltriger-js', RECRUTE_THEME_JS_DIR . 'ScrollTrigger.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'splitetext', RECRUTE_THEME_JS_DIR . 'Splitetext.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'smoothscroll', RECRUTE_THEME_JS_DIR . 'SmoothScroll.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'text-animation', RECRUTE_THEME_JS_DIR . 'text-animation.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'line-progeressbar', RECRUTE_THEME_JS_DIR . 'jquery.lineProgressbar.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'tilt-js', RECRUTE_THEME_JS_DIR . 'tilt.jquery.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'recrute-main', RECRUTE_THEME_JS_DIR . 'main.js', [ 'jquery' ], false, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'recrute_scripts' );


/*
Register Fonts
 */
function recrute_fonts_url() {
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'recrute' ) ) {
        $font_url = 'https://fonts.googleapis.com/css2?'. urlencode('family=Figtree:ital,wght@0,300..900;1,300..900&display=swap');
    }
    return $font_url;
}
