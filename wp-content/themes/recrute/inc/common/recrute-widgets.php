<?php 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function recrute_widgets_init() {

    $footer_style_2_switch = get_theme_mod( 'footer_layout_2_switch', false );
    $footer_style_3_switch = get_theme_mod( 'footer_layout_3_switch', false );
    $footer_style_4_switch = get_theme_mod( 'footer_layout_4_switch', false );
    $footer_style_5_switch = get_theme_mod( 'footer_layout_5_switch', false );
    $footer_style_6_switch = get_theme_mod( 'footer_layout_6_switch', false );
    $footer_style_7_switch = get_theme_mod( 'footer_layout_7_switch', false );
    $footer_style_8_switch = get_theme_mod( 'footer_layout_8_switch', false );
    $footer_style_9_switch = get_theme_mod( 'footer_layout_9_switch', false );
    $footer_style_10_switch = get_theme_mod( 'footer_layout_10_switch', false );

    /**
     * blog sidebar
     */
    register_sidebar( [
        'name'          => esc_html__( 'Blog Sidebar', 'recrute' ),
        'id'            => 'blog-sidebar',
        'before_widget' => '<div id="%1$s" class="vl-sidebar-widget mb-40 %2$s"><div class="vl-sidebar-widget-content">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h3 class="vl-sidebar-widget-title">',
        'after_title'   => '</h3>',
    ] );


        /**
     * blog sidebar
     */
    if(class_exists("VL_Core")) :
        register_sidebar( [
            'name'          => esc_html__( 'Service Sidebar', 'recrute' ),
            'id'            => 'vl-service-sidebar',
            'before_widget' => '<div id="%1$s" class="vl-sidebar-widget mb-40 %2$s"><div class="vl-sidebar-widget-content">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h3 class="vl-sidebar-widget-title">',
            'after_title'   => '</h3>',
        ] );
        endif;


    /**
     * project sidebar
     */
    if(class_exists("VL_Core")) :
     register_sidebar( [
        'name'          => esc_html__( 'Project Sidebar', 'recrute' ),
        'id'            => 'vl-project-sidebar',
        'before_widget' => '<div id="%1$s" class="vl-sidebar-widget mb-40 %2$s"><div class="vl-sidebar-widget-content">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h3 class="vl-sidebar-widget-title">',
        'after_title'   => '</h3>',
    ] );
    endif;


    /**
     * Job sidebar
     */
    if(class_exists("VL_Core")) :
     register_sidebar( [
        'name'          => esc_html__( 'Job Sidebar', 'recrute' ),
        'id'            => 'vl-job-sidebar',
        'before_widget' => '<div id="%1$s" class="vl-sidebar-widget mb-40 %2$s"><div class="vl-sidebar-widget-content">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h3 class="vl-sidebar-widget-title">',
        'after_title'   => '</h3>',
    ] );
    endif;


    $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

    // footer default
    for ( $num = 1; $num <= $footer_widgets; $num++ ) {
        register_sidebar( [
            'name'          => sprintf( esc_html__( 'Footer %1$s', 'recrute' ), $num ),
            'id'            => 'footer-' . $num,
            'description'   => sprintf( esc_html__( 'Footer Column %1$s', 'recrute' ), $num ),
            'before_widget' => '<div id="%1$s" class="vl-footer-widget single-footer-items vl-footer-2-col-'.$num.' mb-50 %2$s"> <div class="vl-footer-widget-content">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h3 class="vl-footer-widget-title">',
            'after_title'   => '</h3>',
        ] );
    }

    // footer 2
    if ( $footer_style_2_switch ) {
        for ( $num = 1; $num <= $footer_widgets; $num++ ) {

            register_sidebar( [
                'name'          => sprintf( esc_html__( 'Footer Style 2 : %1$s', 'recrute' ), $num ),
                'id'            => 'footer-2-' . $num,
                'description'   => sprintf( esc_html__( 'Footer Style 2 : %1$s', 'recrute' ), $num ),
                'before_widget' => '<div id="%1$s" class="vl-footer-widget single-footer-items vl-footer-col-'.$num.' mb-50 %2$s"> <div class="vl-footer-widget-content">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h3 class="vl-footer-widget-title">',
                'after_title'   => '</h3>',
            ] );
        }
    }    
  
    // footer 3
    if ( $footer_style_3_switch ) {
        for ( $num = 1; $num <= $footer_widgets; $num++ ) {

            register_sidebar( [
                'name'          => sprintf( esc_html__( 'Footer Style 3 : %1$s', 'recrute' ), $num ),
                'id'            => 'footer-3-' . $num,
                'description'   => sprintf( esc_html__( 'Footer Style 3 : %1$s', 'recrute' ), $num ),
                'before_widget' => '<div id="%1$s" class="vl-footer-widget single-footer-items vl-footer-3-col-'.$num.' mb-50 %2$s"> <div class="vl-footer-widget-content">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h3 class="vl-footer-widget-title">',
                'after_title'   => '</h3>',
            ] );
        }
    }    

        // footer 4
        if ( $footer_style_4_switch ) {
            for ( $num = 1; $num <= $footer_widgets; $num++ ) {
    
                register_sidebar( [
                    'name'          => sprintf( esc_html__( 'Footer Style 4 : %1$s', 'recrute' ), $num ),
                    'id'            => 'footer-4-' . $num,
                    'description'   => sprintf( esc_html__( 'Footer Style 4 : %1$s', 'recrute' ), $num ),
                    'before_widget' => '<div id="%1$s" class="vl-footer-widget single-footer-items vl-footer-3-col-'.$num.' mb-50 %2$s"> <div class="vl-footer-widget-content">',
                    'after_widget'  => '</div></div>',
                    'before_title'  => '<h3 class="vl-footer-widget-title">',
                    'after_title'   => '</h3>',
                ] );
            }
        }    

        // footer 5
        if ( $footer_style_5_switch ) {
            for ( $num = 1; $num <= $footer_widgets; $num++ ) {
    
                register_sidebar( [
                    'name'          => sprintf( esc_html__( 'Footer Style 5 : %1$s', 'recrute' ), $num ),
                    'id'            => 'footer-5-' . $num,
                    'description'   => sprintf( esc_html__( 'Footer Style 5 : %1$s', 'recrute' ), $num ),
                    'before_widget' => '<div id="%1$s" class="vl-footer-widget single-footer-items vl-footer-3-col-'.$num.' mb-50 %2$s"> <div class="vl-footer-widget-content">',
                    'after_widget'  => '</div></div>',
                    'before_title'  => '<h3 class="vl-footer-widget-title">',
                    'after_title'   => '</h3>',
                ] );
            }
        }    

        // footer 6
        if ( $footer_style_6_switch ) {
            for ( $num = 1; $num <= $footer_widgets; $num++ ) {
    
                register_sidebar( [
                    'name'          => sprintf( esc_html__( 'Footer Style 6 : %1$s', 'recrute' ), $num ),
                    'id'            => 'footer-6-' . $num,
                    'description'   => sprintf( esc_html__( 'Footer Style 6 : %1$s', 'recrute' ), $num ),
                    'before_widget' => '<div id="%1$s" class="vl-footer-widget single-footer-items vl-footer-3-col-'.$num.' mb-50 %2$s"> <div class="vl-footer-widget-content">',
                    'after_widget'  => '</div></div>',
                    'before_title'  => '<h3 class="vl-footer-widget-title">',
                    'after_title'   => '</h3>',
                ] );
            }
        }    

        // footer 7
        if ( $footer_style_7_switch ) {
            for ( $num = 1; $num <= $footer_widgets; $num++ ) {
    
                register_sidebar( [
                    'name'          => sprintf( esc_html__( 'Footer Style 7 : %1$s', 'recrute' ), $num ),
                    'id'            => 'footer-7-' . $num,
                    'description'   => sprintf( esc_html__( 'Footer Style 7 : %1$s', 'recrute' ), $num ),
                    'before_widget' => '<div id="%1$s" class="vl-footer-widget single-footer-items vl-footer-3-col-'.$num.' mb-50 %2$s"> <div class="vl-footer-widget-content">',
                    'after_widget'  => '</div></div>',
                    'before_title'  => '<h3 class="vl-footer-widget-title">',
                    'after_title'   => '</h3>',
                ] );
            }
        }    

        // footer 8
        if ( $footer_style_8_switch ) {
            for ( $num = 1; $num <= $footer_widgets; $num++ ) {
    
                register_sidebar( [
                    'name'          => sprintf( esc_html__( 'Footer Style 8 : %1$s', 'recrute' ), $num ),
                    'id'            => 'footer-8-' . $num,
                    'description'   => sprintf( esc_html__( 'Footer Style 8 : %1$s', 'recrute' ), $num ),
                    'before_widget' => '<div id="%1$s" class="vl-footer-widget single-footer-items vl-footer-3-col-'.$num.' mb-50 %2$s"> <div class="vl-footer-widget-content">',
                    'after_widget'  => '</div></div>',
                    'before_title'  => '<h3 class="vl-footer-widget-title">',
                    'after_title'   => '</h3>',
                ] );
            }
        }    

        // footer 9
        if ( $footer_style_9_switch ) {
            for ( $num = 1; $num <= $footer_widgets; $num++ ) {
    
                register_sidebar( [
                    'name'          => sprintf( esc_html__( 'Footer Style 9 : %1$s', 'recrute' ), $num ),
                    'id'            => 'footer-9-' . $num,
                    'description'   => sprintf( esc_html__( 'Footer Style 9 : %1$s', 'recrute' ), $num ),
                    'before_widget' => '<div id="%1$s" class="vl-footer-widget single-footer-items vl-footer-3-col-'.$num.' mb-50 %2$s"> <div class="vl-footer-widget-content">',
                    'after_widget'  => '</div></div>',
                    'before_title'  => '<h3 class="vl-footer-widget-title">',
                    'after_title'   => '</h3>',
                ] );
            }
        }    


        // footer 10
        if ( $footer_style_10_switch ) {
            for ( $num = 1; $num <= $footer_widgets; $num++ ) {
    
                register_sidebar( [
                    'name'          => sprintf( esc_html__( 'Footer Style 10 : %1$s', 'recrute' ), $num ),
                    'id'            => 'footer-10-' . $num,
                    'description'   => sprintf( esc_html__( 'Footer Style 10 : %1$s', 'recrute' ), $num ),
                    'before_widget' => '<div id="%1$s" class="vl-footer-widget single-footer-items vl-footer-3-col-'.$num.' mb-50 %2$s"> <div class="vl-footer-widget-content">',
                    'after_widget'  => '</div></div>',
                    'before_title'  => '<h3 class="vl-footer-widget-title">',
                    'after_title'   => '</h3>',
                ] );
            }
        }    


}
add_action( 'widgets_init', 'recrute_widgets_init' );