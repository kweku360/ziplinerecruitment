<?php
/**
 * 
 * Demo Imports
 */

function vl_ocdi_import_files() {
    
    return array(

      array(
        'import_file_name'           => 'Demo 01',
        'local_import_file'             => trailingslashit( get_template_directory() ) .'sample-data/contents-demo.xml',
        'local_import_widget_file' => trailingslashit( get_template_directory() ) . 'sample-data/widget-settings.json',
        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'sample-data/customizer-data.dat',
        'import_preview_image_url' => plugins_url( 'assets/img/demo/demo-1.jpg', dirname(__FILE__) ),
        'preview_url'                => '#',
      ),

      array(
        'import_file_name'           => 'Demo 02',
        'local_import_file'             => trailingslashit( get_template_directory() ) .'sample-data/contents-demo.xml',
        'local_import_widget_file' => trailingslashit( get_template_directory() ) . 'sample-data/widget-settings.json',
        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'sample-data/customizer-data.dat',
        'import_preview_image_url' => plugins_url( 'assets/img/demo/demo-2.jpg', dirname(__FILE__) ),
        'preview_url'                => '#',
      ),

      array(
        'import_file_name'           => 'Demo 03',
        'local_import_file'             => trailingslashit( get_template_directory() ) .'sample-data/contents-demo.xml',
        'local_import_widget_file' => trailingslashit( get_template_directory() ) . 'sample-data/widget-settings.json',
        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'sample-data/customizer-data.dat',
        'import_preview_image_url' => plugins_url( 'assets/img/demo/demo-3.jpg', dirname(__FILE__) ),
        'preview_url'                => '#',
      ),

      array(
        'import_file_name'           => 'Demo 04',
        'local_import_file'             => trailingslashit( get_template_directory() ) .'sample-data/contents-demo.xml',
        'local_import_widget_file' => trailingslashit( get_template_directory() ) . 'sample-data/widget-settings.json',
        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'sample-data/customizer-data.dat',
        'import_preview_image_url' => plugins_url( 'assets/img/demo/demo-4.jpg', dirname(__FILE__) ),
        'preview_url'                => '#',
      ),
      array(
        'import_file_name'           => 'Demo 05',
        'local_import_file'             => trailingslashit( get_template_directory() ) .'sample-data/contents-demo.xml',
        'local_import_widget_file' => trailingslashit( get_template_directory() ) . 'sample-data/widget-settings.json',
        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'sample-data/customizer-data.dat',
        'import_preview_image_url' => plugins_url( 'assets/img/demo/demo-5.jpg', dirname(__FILE__) ),
        'preview_url'                => '#',
      ),
      array(
        'import_file_name'           => 'Demo 06',
        'local_import_file'             => trailingslashit( get_template_directory() ) .'sample-data/contents-demo.xml',
        'local_import_widget_file' => trailingslashit( get_template_directory() ) . 'sample-data/widget-settings.json',
        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'sample-data/customizer-data.dat',
        'import_preview_image_url' => plugins_url( 'assets/img/demo/demo-6.jpg', dirname(__FILE__) ),
        'preview_url'                => '#',
      ),
      array(
        'import_file_name'           => 'Demo 07',
        'local_import_file'             => trailingslashit( get_template_directory() ) .'sample-data/contents-demo.xml',
        'local_import_widget_file' => trailingslashit( get_template_directory() ) . 'sample-data/widget-settings.json',
        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'sample-data/customizer-data.dat',
        'import_preview_image_url' => plugins_url( 'assets/img/demo/demo-7.jpg', dirname(__FILE__) ),
        'preview_url'                => '#',
      ),
      array(
        'import_file_name'           => 'Demo 08',
        'local_import_file'             => trailingslashit( get_template_directory() ) .'sample-data/contents-demo.xml',
        'local_import_widget_file' => trailingslashit( get_template_directory() ) . 'sample-data/widget-settings.json',
        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'sample-data/customizer-data.dat',
        'import_preview_image_url' => plugins_url( 'assets/img/demo/demo-8.jpg', dirname(__FILE__) ),
        'preview_url'                => '#',
      ),
      array(
        'import_file_name'           => 'Demo 09',
        'local_import_file'             => trailingslashit( get_template_directory() ) .'sample-data/contents-demo.xml',
        'local_import_widget_file' => trailingslashit( get_template_directory() ) . 'sample-data/widget-settings.json',
        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'sample-data/customizer-data.dat',
        'import_preview_image_url' => plugins_url( 'assets/img/demo/demo-9.jpg', dirname(__FILE__) ),
        'preview_url'                => '#',
      ),
      array(
        'import_file_name'           => 'Demo 10',
        'local_import_file'             => trailingslashit( get_template_directory() ) .'sample-data/contents-demo.xml',
        'local_import_widget_file' => trailingslashit( get_template_directory() ) . 'sample-data/widget-settings.json',
        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'sample-data/customizer-data.dat',
        'import_preview_image_url' => plugins_url( 'assets/img/demo/demo-10.jpg', dirname(__FILE__) ),
        'preview_url'                => '#',
      ),

    );
}
add_filter( 'ocdi/import_files', 'vl_ocdi_import_files' );


function tp_ocdi_page($vl_page_name = 'Home'){
    $posts = get_posts(
        array(
            'post_type'              => 'page',
            'title'                  => $vl_page_name,
            'post_status'            => 'all',
            'posts_per_page'         => 1,
            'no_found_rows'          => true,
            'ignore_sticky_posts'    => true,
            'update_post_term_cache' => false,
            'update_post_meta_cache' => false,
            'orderby'                => 'post_date ID',
            'order'                  => 'ASC',
        )
    );

    if ( ! empty( $posts ) ) {
        $page_got_by_title = $posts[0];
    } else {
        $page_got_by_title = null;
    }

    return $page_got_by_title;

}


// after demo imports
function tp_ocdi_after_import_setup( $demo ) {
    $front_page_id = "";
    $blog_page_id = "";
    if( "Home 1" == $demo['import_file_name'] ){
        // Assign front page and posts page (blog page).
        $front_page_id = tp_ocdi_page( 'Home 1' );
        $blog_page_id  = tp_ocdi_page( 'Blog' );
    }else if( "Home 2" == $demo['import_file_name'] ){
        // Assign front page and posts page (blog page).
        $front_page_id = tp_ocdi_page( 'Home 2' );
        $blog_page_id  = tp_ocdi_page( 'Blog' );
    }
    else if( "Home 3" == $demo['import_file_name'] ){
        // Assign front page and posts page (blog page).
        $front_page_id = tp_ocdi_page( 'Home 3' );
        $blog_page_id  = tp_ocdi_page( 'Blog' );
    }
    else if( "Home 4" == $demo['import_file_name'] ){
        // Assign front page and posts page (blog page).
        $front_page_id = tp_ocdi_page( 'Home 4' );
        $blog_page_id  = tp_ocdi_page( 'Blog' );
    }
    else if( "Home 5" == $demo['import_file_name'] ){
        // Assign front page and posts page (blog page).
        $front_page_id = tp_ocdi_page( 'Home 5' );
        $blog_page_id  = tp_ocdi_page( 'Blog' );
    }
    else if( "Home 6" == $demo['import_file_name'] ){
        // Assign front page and posts page (blog page).
        $front_page_id = tp_ocdi_page( 'Home 6' );
        $blog_page_id  = tp_ocdi_page( 'Blog' );
    }
    else if( "Home 7" == $demo['import_file_name'] ){
        // Assign front page and posts page (blog page).
        $front_page_id = tp_ocdi_page( 'Home 7' );
        $blog_page_id  = tp_ocdi_page( 'Blog' );
    }
    else if( "Home 8" == $demo['import_file_name'] ){
        // Assign front page and posts page (blog page).
        $front_page_id = tp_ocdi_page( 'Home 8' );
        $blog_page_id  = tp_ocdi_page( 'Blog' );
    }
    else if( "Home 9" == $demo['import_file_name'] ){
        // Assign front page and posts page (blog page).
        $front_page_id = tp_ocdi_page( 'Home 9' );
        $blog_page_id  = tp_ocdi_page( 'Blog' );
    }
    else if( "Home 10" == $demo['import_file_name'] ){
        // Assign front page and posts page (blog page).
        $front_page_id = tp_ocdi_page( 'Home 10' );
        $blog_page_id  = tp_ocdi_page( 'Blog' );
    }


    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );


    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
 
    set_theme_mod( 'nav_menu_locations', [
            'main-menu' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function in your theme.
        ]
    );
 
}
add_action( 'ocdi/after_import', 'tp_ocdi_after_import_setup' );



function tp_ocdi_plugin_page_setup( $default_settings ) {
    $default_settings['parent_slug'] = 'themes.php';
    $default_settings['page_title']  = esc_html__( 'One Click Demo Import' , 'one-click-demo-import' );
    $default_settings['menu_title']  = esc_html__( 'Import Theme Demos' , 'one-click-demo-import' );
    $default_settings['capability']  = 'import';
    $default_settings['menu_slug']   = 'one-click-demo-import';
 
    return $default_settings;
}
add_filter( 'ocdi/plugin_page_setup', 'tp_ocdi_plugin_page_setup' );