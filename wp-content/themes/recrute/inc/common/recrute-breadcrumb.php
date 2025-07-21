<?php
/**
 * Breadcrumbs for recrute theme.
 *
 * @package     recrute
 * @author      Vikinglab
 * @copyright   Copyright (c) 2022, Vikinglab
 * @link        https://www.weblearnbd.net
 * @since       recrute 1.0.0
 */


function recrute_breadcrumb_func() {
    global $post;
    // Remove breadcrumb for single post pages
    if ( is_single() && get_post_type() === 'post' ) {
        return;
    }
    $breadcrumb_class = '';
    $breadcrumb_show = 1;


    if ( is_front_page() && is_home() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog','recrute'));
        $breadcrumb_class = 'home_front_page';
    }
    elseif ( is_front_page() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog','recrute'));
        $breadcrumb_show = 0;
    }
    elseif ( is_home() ) {
        if ( get_option( 'page_for_posts' ) ) {
            $title = get_the_title( get_option( 'page_for_posts') );
        }
    }

    elseif ( is_single() && 'post' == get_post_type() ) {
      $title = get_the_title();
    } 
    elseif ( is_single() && 'product' == get_post_type() ) {
        $title = get_theme_mod( 'breadcrumb_product_details', __( 'Shop', 'recrute' ) );
    } 
    elseif ( is_single() && 'courses' == get_post_type() ) {
      $title = esc_html__( 'Course Details', 'recrute' );
    } 
    elseif ( 'courses' == get_post_type() ) {
      $title = esc_html__( 'Courses', 'recrute' );
    } 
    elseif ( is_search() ) {
        $title = esc_html__( 'Search Results for : ', 'recrute' ) . get_search_query();
    } 
    elseif ( is_404() ) {
        $title = esc_html__( 'Page not Found', 'recrute' );
    } 
    elseif ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
        $title = get_theme_mod( 'breadcrumb_shop', __( 'Shop', 'recrute' ) );
    } 
    elseif ( is_archive() ) {
        $title = get_the_archive_title();
    } 
    else {
        $title = get_the_title();
    }


    $_id = get_the_ID();

    if ( is_single() && 'product' == get_post_type() ) { 
        $_id = $post->ID;
    } 
    elseif ( function_exists("is_shop") AND is_shop()  ) { 
        $_id = wc_get_page_id('shop');
    } 
    elseif ( is_home() && get_option( 'page_for_posts' ) ) {
        $_id = get_option( 'page_for_posts' );
    }

    $is_breadcrumb = function_exists('tpmeta_field')? tpmeta_field('recrute_check_bredcrumb') : 'on';

    $con1 = $is_breadcrumb && ($is_breadcrumb== 'on') && $breadcrumb_show == 1;

    $con_main = is_404() ? is_404() : $con1;
    
      if (  $con_main ) {
        $bg_img_from_page = function_exists('tpmeta_image_field')? tpmeta_image_field('recrute_breadcrumb_bg') : '';

        $hide_bg_img = function_exists('tpmeta_field')? tpmeta_field('recrute_check_bredcrumb_img') : 'on';
        // get_theme_mod
        $bg_img = get_theme_mod( 'breadcrumb_image' );
        $breadcrumb_padding = get_theme_mod( 'breadcrumb_padding' );
        $breadcrumb_bg_color = get_theme_mod( 'breadcrumb_bg_color', '#16243E' );
        $breadcrumb_shape_switch = get_theme_mod( 'breadcrumb_shape_switch', 'on' );
        if ( $hide_bg_img == 'off' ) {
            $bg_main_img = '';
        }else{  
            $bg_main_img = !empty( $bg_img_from_page ) ? $bg_img_from_page['url'] : $bg_img;
        }
        
        ?>

<!-- about breadcrumb area start -->

    <div class="common-hero" data-bg-color="<?php echo esc_attr( $breadcrumb_bg_color ); ?>" <?php if(!empty($bg_main_img)) : ?>style="background-image: url('<?php echo esc_url($bg_main_img); ?>');"<?php endif; ?>>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto text-center">
                    <div class="main-heading">
                        <h1><?php 
                            if(!empty($title)){
                                echo esc_html($title);
                            }else{
                                echo esc_html('Recrute', 'recrute');
                            };
                        ?></h1>
                        <?php if(function_exists('bcn_display')) : ?>
                        <div class="pages-intro">
                                <?php #bcn_display(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- about breadcrumb area end -->

<?php
      }
}

add_action( 'recrute_before_main_content', 'recrute_breadcrumb_func' );
