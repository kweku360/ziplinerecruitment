<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package recrute
 */

function get_header_style($style){
    if ( $style == 'header_2'  ) {
        get_template_part( 'template-parts/header/header-2' );
    }
    elseif ( $style == 'header_3'  ) {
        get_template_part( 'template-parts/header/header-3' );
    }
    elseif ( $style == 'header_4'  ) {
        get_template_part( 'template-parts/header/header-4' );
    }
    elseif ( $style == 'header_5'  ) {
        get_template_part( 'template-parts/header/header-5' );
    }
    elseif ( $style == 'header_6'  ) {
        get_template_part( 'template-parts/header/header-6' );
    }
    elseif ( $style == 'header_7'  ) {
        get_template_part( 'template-parts/header/header-7' );
    }
    elseif ( $style == 'header_8'  ) {
        get_template_part( 'template-parts/header/header-8' );
    }
    elseif ( $style == 'header_9'  ) {
        get_template_part( 'template-parts/header/header-9' );
    }
    elseif ( $style == 'header_10'  ) {
        get_template_part( 'template-parts/header/header-10' );
    }
    else{
        get_template_part( 'template-parts/header/header-1');
    }
}

function recrute_check_header() {
    $tp_header_tabs = function_exists('tpmeta_field')? tpmeta_field('recrute_header_tabs') : false;
    $tp_header_style_meta = function_exists('tpmeta_field')? tpmeta_field('recrute_header_style') : '';
    $elementor_header_template_meta = function_exists('tpmeta_field')? tpmeta_field('recrute_header_templates') : false;

    $recrute_header_option_switch = get_theme_mod('recrute_header_elementor_switch', false);
    $header_default_style_kirki = get_theme_mod( 'header_layout_custom', 'header_1' );
    $elementor_header_templates_kirki = get_theme_mod( 'recrute_header_templates' );
    
    if($tp_header_tabs == 'default'){
        if($recrute_header_option_switch){
            if($elementor_header_templates_kirki){
                echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_templates_kirki);
            }
        }else{ 
            if($header_default_style_kirki){
                get_header_style($header_default_style_kirki);
            }else{
                get_template_part( 'template-parts/header/header-1' );
            }
        }
    }elseif($tp_header_tabs == 'custom'){
        if ($tp_header_style_meta) {
            get_header_style($tp_header_style_meta);
        }else{
            get_header_style($header_default_style_kirki);
        }  
    }elseif($tp_header_tabs == 'elementor'){
        if($elementor_header_template_meta){
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_template_meta);
        }else{
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_templates_kirki);
        }
    }else{
        if($recrute_header_option_switch){

            if($elementor_header_templates_kirki){
                echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_templates_kirki);
            }else{
                get_template_part( 'template-parts/header/header-1' );
            }
        }else{
            get_header_style($header_default_style_kirki);

        }
        
    }

}
add_action( 'recrute_header_style', 'recrute_check_header', 10 );



// header logo - FIXED VERSION
function recrute_header_logo() { ?>
    <?php 
        // Get logo settings
        $recrute_logo = get_template_directory_uri() . '/assets/img/logo/logo-black.png';
        $recrute_logo_white = get_template_directory_uri() . '/assets/img/logo/logo.png';
        
        // Get theme customizer settings
        $recrute_site_logo = get_theme_mod( 'header_logo', $recrute_logo );
        $recrute_secondary_logo = get_theme_mod( 'header_secondary_logo', $recrute_logo_white );
        
        // Get meta field settings
        $recrute_logo_on = function_exists('tpmeta_field') ? tpmeta_field('recrute_en_secondary_logo') : '';
        $recrute_en_custom_logo = function_exists('tpmeta_field') ? tpmeta_field('recrute_en_custom_logo') : '';
        $recrute_custom_logo = function_exists('tpmeta_image_field') ? tpmeta_image_field('recrute_custom_logo') : '';
        
        // Determine which logo to use
        $logo_url = $recrute_site_logo; // Default to primary logo
        $logo_class = 'standard-logo';
        
        if ( $recrute_logo_on == 'on' ) {
            $logo_url = $recrute_secondary_logo;
            $logo_class = 'main-logo';
        } elseif ( $recrute_en_custom_logo == 'on' && !empty($recrute_custom_logo['url']) ) {
            $logo_url = $recrute_custom_logo['url'];
            $logo_class = 'main-logo';
        }
        
        // Ensure we have a valid logo URL
        if ( empty($logo_url) ) {
            $logo_url = $recrute_logo;
        }
    ?>

    <a class="<?php echo esc_attr($logo_class); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
    </a>
<?php
}


// header logo
function recrute_header_black_logo() { ?>
    <?php 
        $recrute_logo = get_template_directory_uri() . '/assets/img/logo/logo-black.png';

        $recrute_black_logo = get_theme_mod( 'header_logo', $recrute_logo );
    ?>

    <a href="<?php print esc_url( home_url( '/' ) );?>">
        <img src="<?php print esc_url( $recrute_black_logo );?>" alt="<?php print esc_attr__( 'logo', 'recrute' );?>" />
    </a>
<?php
}

/**
 * [recrute_header_social_profiles description]
 * @return [type] [description]
 */
function recrute_header_social_profiles() {
    $recrute_topbar_fb_url = get_theme_mod( 'header_facebook_link', __( '#', 'recrute' ) );
    $recrute_topbar_twitter_url = get_theme_mod( 'header_twitter_link', __( '#', 'recrute' ) );
    $recrute_topbar_instagram_url = get_theme_mod( 'header_instagram_link', __( '#', 'recrute' ) );
    $recrute_topbar_linkedin_url = get_theme_mod( 'header_linkedin_link', __( '#', 'recrute' ) );
    $recrute_topbar_youtube_url = get_theme_mod( 'header_youtube_link', __( '#', 'recrute' ) );
    ?>
<?php if ( !empty( $recrute_topbar_fb_url ) ): ?>
<a class="icon facebook" href="<?php print esc_url( $recrute_topbar_fb_url );?>"><i class="fa-brands fa-facebook-f"></i></a>
<?php endif;?>

<?php if ( !empty( $recrute_topbar_twitter_url ) ): ?>
<a class="icon twitter" href="<?php print esc_url( $recrute_topbar_twitter_url );?>"><i class="fa-brands fa-twitter"></i></a>
<?php endif;?>

<?php if ( !empty( $recrute_topbar_instagram_url ) ): ?>
<a class="icon youtube" href="<?php print esc_url( $recrute_topbar_instagram_url );?>"><i class="fa-brands fa-instagram"></i></a>
<?php endif;?>

<?php if ( !empty( $recrute_topbar_linkedin_url ) ): ?>
<a class="icon linkedin" href="<?php print esc_url( $recrute_topbar_linkedin_url );?>"><i class="fab fa-linkedin"></i></a>
<?php endif;?>

<?php if ( !empty( $recrute_topbar_youtube_url ) ): ?>
<a class="icon youtube" href="<?php print esc_url( $recrute_topbar_youtube_url );?>"><i class="fab fa-youtube"></i></a>
<?php endif;?>

<?php
}

/**
 * [recrute_header_side_info_social_profiles description]
 * @return [type] [description]
 */
function recrute_header_side_info_social_profiles() {
    $recrute_topbar_fb_url = get_theme_mod( 'header_facebook_link', __( '#', 'recrute' ) );
    $recrute_topbar_twitter_url = get_theme_mod( 'header_twitter_link', __( '#', 'recrute' ) );
    $recrute_topbar_instagram_url = get_theme_mod( 'header_instagram_link', __( '#', 'recrute' ) );
    $recrute_topbar_linkedin_url = get_theme_mod( 'header_linkedin_link', __( '#', 'recrute' ) );
    $recrute_topbar_youtube_url = get_theme_mod( 'header_youtube_link', __( '#', 'recrute' ) );
    ?>

<?php if ( !empty( $recrute_topbar_fb_url ) ): ?>
<a class="icon facebook" href="<?php print esc_url( $recrute_topbar_fb_url );?>"><i class="fab fa-facebook-f"></i></a>
<?php endif;?>

<?php if ( !empty( $recrute_topbar_twitter_url ) ): ?>
<a class="icon twitter" href="<?php print esc_url( $recrute_topbar_twitter_url );?>"><i class="fab fa-twitter"></i></a>
<?php endif;?>

<?php if ( !empty( $recrute_topbar_instagram_url ) ): ?>
<a class="icon linkedin" href="<?php echo esc_url( $recrute_topbar_instagram_url ) ?>"><i
        class="fa-brands fa-instagram"></i></a>
<?php endif;?>

<?php if ( !empty( $recrute_topbar_linkedin_url ) ): ?>
<a class="icon linkedin" href="<?php echo esc_url( $recrute_topbar_linkedin_url ) ?>"><i
        class="fab fa-linkedin"></i></a>
<?php endif;?>

<?php if ( !empty( $recrute_topbar_youtube_url ) ): ?>
<a class="icon youtube" href="<?php print esc_url( $recrute_topbar_youtube_url );?>"><i class="fab fa-youtube"></i></a>
<?php endif;?>

<?php
}


// recrute_footer_social_profiles 
function recrute_footer_social_profiles() {
    $recrute_footer_fb_url = get_theme_mod( 'recrute_footer_fb_url', __( '#', 'recrute' ) );
    $recrute_footer_twitter_url = get_theme_mod( 'recrute_footer_twitter_url', __( '#', 'recrute' ) );
    $recrute_footer_instagram_url = get_theme_mod( 'recrute_footer_instagram_url', __( '#', 'recrute' ) );
    $recrute_footer_linkedin_url = get_theme_mod( 'recrute_footer_linkedin_url', __( '#', 'recrute' ) );
    $recrute_footer_youtube_url = get_theme_mod( 'recrute_footer_youtube_url', __( '#', 'recrute' ) );
    ?>


<?php if ( !empty( $recrute_footer_fb_url ) ): ?>
<a href="<?php print esc_url( $recrute_footer_fb_url );?>">
    <?php echo esc_html__('Fb.','recrute'); ?>
</a>
<?php endif;?>

<?php if ( !empty( $recrute_footer_twitter_url ) ): ?>
<a href="<?php print esc_url( $recrute_footer_twitter_url );?>">
    <?php echo esc_html__('Tw.','recrute'); ?>
</a>
<?php endif;?>

<?php if ( !empty( $recrute_footer_instagram_url ) ): ?>
<a href="<?php print esc_url( $recrute_footer_instagram_url );?>">
    <?php echo esc_html__('In.','recrute'); ?>
</a>
<?php endif;?>

<?php if ( !empty( $recrute_footer_linkedin_url ) ): ?>
<a href="<?php print esc_url( $recrute_footer_linkedin_url );?>">
    <?php echo esc_html__('Ln.','recrute'); ?>
</a>
<?php endif;?>

<?php if ( !empty( $recrute_footer_youtube_url ) ): ?>
<a href="<?php print esc_url( $recrute_footer_youtube_url );?>">
    <?php echo esc_html__('Yt.','recrute'); ?>
</a>
<?php endif;?>

<?php
    }

/**
 * [recrute_header_menu description]
 * @return [type] [description]
 */
function recrute_header_menu() {
    ?>
<?php
        wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'recrute_Navwalker_Class::fallback',
            'walker'         =>  new \VLCore\Widgets\recrute_Navwalker_Class,
        ] );
    ?>
<?php
}


/**
 * [recrute_footer_menu description]
 * @return [type] [description]
 */
function recrute_preview_menu() {
    wp_nav_menu( [
        'theme_location' => 'preview-menu',
        'menu_class'     => 'preview-menu',
        'container'      => '',
        'fallback_cb'    => 'recrute_Navwalker_Class::fallback',
        'walker'         =>  new \VLCore\Widgets\recrute_Navwalker_Class,
    ] );
}


 /*
 * recrute footer
 */
add_action( 'recrute_footer_style', 'recrute_check_footer', 10 );


function get_footer_style($style){
    if( $style == 'footer_2'  ) {
        get_template_part( 'template-parts/footer/footer-2' );
    }elseif ( $style == 'footer_3'  ) {
        get_template_part( 'template-parts/footer/footer-3' );
    }
    elseif ( $style == 'footer_4'  ) {
        get_template_part( 'template-parts/footer/footer-4' );
    }
    elseif ( $style == 'footer_5'  ) {
        get_template_part( 'template-parts/footer/footer-5' );
    }
    elseif ( $style == 'footer_6'  ) {
        get_template_part( 'template-parts/footer/footer-6' );
    }
    elseif ( $style == 'footer_7'  ) {
        get_template_part( 'template-parts/footer/footer-7' );
    }
    elseif ( $style == 'footer_8'  ) {
        get_template_part( 'template-parts/footer/footer-8' );
    }
    elseif ( $style == 'footer_9'  ) {
        get_template_part( 'template-parts/footer/footer-9' );
    }
    elseif ( $style == 'footer_10'  ) {
        get_template_part( 'template-parts/footer/footer-10' );
    }
    else{
        get_template_part( 'template-parts/footer/footer-1');
    }
}

function recrute_check_footer() {
    $tp_footer_tabs = function_exists('tpmeta_field')? tpmeta_field('recrute_footer_tabs') : '';
    $recrute_footer_style = function_exists( 'tpmeta_field' ) ? tpmeta_field( 'recrute_footer_style' ) : NULL;
    $footer_template = function_exists('tpmeta_field')? tpmeta_field('recrute_footer_template') : false;

    $recrute_footer_option_switch = get_theme_mod( 'recrute_footer_elementor_switch', false );
    $elementor_footer_template = get_theme_mod( 'recrute_footer_templates');
    $recrute_default_footer_style = get_theme_mod( 'footer_layout', 'footer_1' );

    if($tp_footer_tabs == 'default'){
        if($recrute_footer_option_switch){
            if($elementor_footer_template){
                echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_footer_template);
            }
        }else{ 
            if($recrute_default_footer_style){
                get_footer_style($recrute_default_footer_style);
            }else{
                get_template_part( 'template-parts/footer/footer-1' );
            }
        }
    }elseif($tp_footer_tabs == 'custom'){
        if ($recrute_footer_style) {
            get_footer_style($recrute_footer_style);
        }else{
            get_footer_style($recrute_default_footer_style);
        }  
    }elseif($tp_footer_tabs == 'elementor'){
        if($footer_template){
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($footer_template);
        }else{
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_footer_template);
        }

    }else{
        if($recrute_footer_option_switch){

            if($elementor_footer_template){
                echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_footer_template);
            }else{
                get_template_part( 'template-parts/footer/footer-1' );
            }
        }else{
            get_footer_style($recrute_default_footer_style);

        }
    }
}

// recrute_copyright_text
function recrute_copyright_text() {
   print get_theme_mod( 'footer_copyright', esc_html__( '© 2024 recrute, All Rights Reserved. Design By VikingLab', 'recrute' ) );
}


/**
 *
 * pagination
 */
if ( !function_exists( 'recrute_pagination' ) ) {

    function _recrute_pagi_callback( $pagination ) {
        return $pagination;
    }

    //page navegation
    function recrute_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ( $pages == '' ) {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if ( !$pages ) {
                $pages = 1;
            }

        }

        $pagination = [
            'base'      => add_query_arg( 'paged', '%#%' ),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ( $wp_rewrite->using_permalinks() ) {
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
        }

        if ( !empty( $wp_query->query_vars['s'] ) ) {
            $pagination['add_args'] = ['s' => get_query_var( 's' )];
        }

        $pagi = '';
        if ( paginate_links( $pagination ) != '' ) {
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul>';
            foreach ( $paginations as $key => $pg ) {
                $pagi .= '<li>' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _recrute_pagi_callback( $pagi );
    }
}

// theme color
function recrute_custom_color() {
    $recrute_body_color = get_theme_mod( 'recrute_body', '#77787b' );
    $recrute_heading_color_1 = get_theme_mod( 'recrute_heading_color_1', '#081120' );
    $recrute_heading_color_2 = get_theme_mod( 'recrute_heading_color_2', '#19326A' );
    $recrute_heading_color_3 = get_theme_mod( 'recrute_heading_color_3', '#001431' );
    $recrute_common_color_1 = get_theme_mod( 'recrute_common_color_1', '#5957E5' );
    $recrute_pera_color_1 = get_theme_mod( 'recrute_pera_color_1', '#CCCCD5' );
    $recrute_pera_color_2 = get_theme_mod( 'recrute_pera_color_2', '#5A5F6A' );
    $recrute_white_color = get_theme_mod( 'recrute_white_color', '#ffffff' );
    $recrute_bg_color_1 = get_theme_mod( 'recrute_bg_color_1', '#FF7A01' );
    $recrute_bg_color_2 = get_theme_mod( 'recrute_bg_color_2', '#FC253F' );
    $recrute_bg_color_3 = get_theme_mod( 'recrute_bg_color_3', '#FD965B' );
    $recrute_bg_color_4 = get_theme_mod( 'recrute_bg_color_4', '#23342E' );
    $recrute_bg_color_5 = get_theme_mod( 'recrute_bg_color_5', '#19326A' );
    $recrute_bg_color_6 = get_theme_mod( 'recrute_bg_color_6', '#52B5E9' );
    $recrute_bg_color_7 = get_theme_mod( 'recrute_bg_color_7', '#FFF2E6' );
    $recrute_bg_color_8 = get_theme_mod( 'recrute_bg_color_8', '#F5F3F4' );
    $recrute_bg_color_9 = get_theme_mod( 'recrute_bg_color_9', '#28284D' );
    $recrute_bg_color_10 = get_theme_mod( 'recrute_bg_color_10', '#FFFAEC' );
    $recrute_bg_color_11 = get_theme_mod( 'recrute_bg_color_11', '#FFF4EF' );
    $recrute_bg_color_12 = get_theme_mod( 'recrute_bg_color_12', '#E9EBEA' );
    $recrute_bg_color_13 = get_theme_mod( 'recrute_bg_color_13', '#ECF3F6' );
    $recrute_bg_color_14 = get_theme_mod( 'recrute_bg_color_14', '#E5E7EA' );
    $recrute_bg_color_15 = get_theme_mod( 'recrute_bg_color_15', '#F2F4F7' );
    $recrute_bg_color_16 = get_theme_mod( 'recrute_bg_color_16', '#5957E5' );
    $recrute_bg_color_white = get_theme_mod( 'recrute_bg_color_white', '#ffffff' );
    $recrute_border_color_1 = get_theme_mod( 'recrute_border_color_1', '#f0f0f0' );
    $recrute_border_color_2 = get_theme_mod( 'recrute_border_color_2', '#dfdcdc' );

    wp_enqueue_style( 'recrute-custom', RECRUTE_THEME_CSS_DIR . 'recrute-custom.css', [] );
    
    if ( !empty($recrute_heading_color_1 || $recrute_heading_color_2 || $recrute_heading_color_3)) {
        $custom_css = '';
        $custom_css .= "html:root{
            --vtc-text-heading-text-1: " . $recrute_heading_color_1 . ";
            --vtc-text-heading-text-2: " . $recrute_heading_color_2 . ";
            --vtc-text-heading-text-3: " . $recrute_heading_color_3 . ";
            --vtc-text-common-color-1: " . $recrute_common_color_1 . ";
            --vtc-text-pera-text-2: " . $recrute_pera_color_1 . ";
            --vtc-text-pera-text-3: " . $recrute_pera_color_2 . ";
            --vtc-text-text-white-text-1: " . $recrute_white_color . ";
            --vtc-bg-main-bg-1: " . $recrute_bg_color_1 . ";
            --vtc-bg-main-bg-2: " . $recrute_bg_color_2 . ";
            --vtc-bg-main-bg-3: " . $recrute_bg_color_3 . ";
            --vtc-bg-main-bg-4: " . $recrute_bg_color_4 . ";
            --vtc-bg-main-bg-5: " . $recrute_bg_color_5 . ";
            --vtc-bg-main-bg-6: " . $recrute_bg_color_6 . ";
            --vtc-bg-common-bg1: " . $recrute_bg_color_7 . ";
            --vtc-bg-common-bg2: " . $recrute_bg_color_8 . ";
            --vtc-bg-common-bg3: " . $recrute_bg_color_9 . ";
            --vtc-bg-common-bg4: " . $recrute_bg_color_10 . ";
            --vtc-bg-common-bg5: " . $recrute_bg_color_11 . ";
            --vtc-bg-common-bg6: " . $recrute_bg_color_12 . ";
            --vtc-bg-common-bg7: " . $recrute_bg_color_13 . ";
            --vtc-bg-common-bg8: " . $recrute_bg_color_14 . ";
            --vtc-bg-common-bg9: " . $recrute_bg_color_15 . ";
            --vtc-bg-common-bg10: " . $recrute_bg_color_16 . ";
            --vtc-bg-bg-white: " . $recrute_bg_color_white . ";
            --vtc-border-border-1: " . $recrute_border_color_1 . ";
            --vtc-border-border-2: " . $recrute_border_color_2 . ";
            --vtc-text-pera-text-1: " . $recrute_body_color . ";
        }";

        wp_add_inline_style( 'recrute-custom', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'recrute_custom_color' );

// recrute_kses_intermediate
function recrute_kses_intermediate( $string = '' ) {
    return wp_kses( $string, recrute_get_allowed_html_tags( 'intermediate' ) );
}

function recrute_get_allowed_html_tags( $level = 'basic' ) {
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}

// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function recrute_kses($raw){

   $allowed_tags = array(
      'a'                         => array(
         'class'   => array(),
         'href'    => array(),
         'rel'  => array(),
         'title'   => array(),
         'target' => array(),
      ),
      'abbr'                      => array(
         'title' => array(),
      ),
      'b'                         => array(),
      'blockquote'                => array(
         'cite' => array(),
      ),
      'cite'                      => array(
         'title' => array(),
      ),
      'code'                      => array(),
      'del'                    => array(
         'datetime'   => array(),
         'title'      => array(),
      ),
      'dd'                     => array(),
      'div'                    => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'dl'                     => array(),
      'dt'                     => array(),
      'em'                     => array(),
      'h1'                     => array(),
      'h2'                     => array(),
      'h3'                     => array(),
      'h4'                     => array(),
      'h5'                     => array(),
      'h6'                     => array(),
      'i'                         => array(
         'class' => array(),
      ),
      'img'                    => array(
         'alt'  => array(),
         'class'   => array(),
         'height' => array(),
         'src'  => array(),
         'width'   => array(),
      ),
      'li'                     => array(
         'class' => array(),
      ),
      'ol'                     => array(
         'class' => array(),
      ),
      'p'                         => array(
         'class' => array(),
      ),
      'q'                         => array(
         'cite'    => array(),
         'title'   => array(),
      ),
      'span'                      => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'iframe'                 => array(
         'width'         => array(),
         'height'     => array(),
         'scrolling'     => array(),
         'frameborder'   => array(),
         'allow'         => array(),
         'src'        => array(),
      ),
      'strike'                 => array(),
      'br'                     => array(),
      'strong'                 => array(),
      'data-wow-duration'            => array(),
      'data-wow-delay'            => array(),
      'data-wallpaper-options'       => array(),
      'data-stellar-background-ratio'   => array(),
      'ul'                     => array(
         'class' => array(),
      ),
      'svg' => array(
           'class' => true,
           'aria-hidden' => true,
           'aria-labelledby' => true,
           'role' => true,
           'xmlns' => true,
           'width' => true,
           'height' => true,
           'viewbox' => true, // <= Must be lower case!
       ),
       'g'     => array( 'fill' => true ),
       'title' => array( 'title' => true ),
       'path'  => array( 'd' => true, 'fill' => true,  ),
      );

   if (function_exists('wp_kses')) { // WP is here
      $allowed = wp_kses($raw, $allowed_tags);
   } else {
      $allowed = $raw;
   }

   return $allowed;
}
// blog single social share
function recrute_blog_social_share(){

    $recrute_singleblog_social = get_theme_mod( 'recrute_singleblog_social', false );
    $post_url = get_the_permalink();
    $end_class = has_tag() ? 'text-lg-end' : 'text-lg-start';

    if(!empty($recrute_singleblog_social)) : ?>

<div class="col-lg-5 col-md-5">
    <div class="postbox__details-share vl-postbox-share-social text-md-end <?php echo esc_attr($end_class); ?>">
        <div class="vl-footer-widget-social">
            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url($post_url);?>"
                target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url($post_url);?>" target="_blank"><i
                    class="fa-brands fa-facebook"></i></a>
            <a href="https://twitter.com/share?url=<?php echo esc_url($post_url);?>" target="_blank"><i
                    class="fa-brands fa-twitter"></i></a>
            <a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url($post_url);?>" target="_blank"><i
                    class="fa-brands fa-pinterest-p"></i></a>
        </div>
    </div>
</div>
<?php endif ; 

}

// product single social share
function recrute_product_social_share(){
    $post_url = get_the_permalink();
    ?>
<div class="vl-shop-details__social">
    <span><?php echo esc_html__('Share:', 'recrute');?></span>
    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url($post_url);?>" target="_blank"><i
            class="fa-brands fa-linkedin-in"></i></a>
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url($post_url);?>" target="_blank"><i
            class="fa-brands fa-facebook"></i></a>
    <a href="https://twitter.com/share?url=<?php echo esc_url($post_url);?>" target="_blank"><i
            class="fa-brands fa-twitter"></i></a>
    <a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url($post_url);?>" target="_blank"><i
            class="fa-brands fa-pinterest-p"></i></a>
</div>
<?php
}

// / This code filters the Archive widget to include the post count inside the link /
add_filter( 'get_archives_link', 'recrute_archive_count_span' );
function recrute_archive_count_span( $links ) {
    $links = str_replace('</a>&nbsp;(', '<span > (', $links);
    $links = str_replace(')', ')</span></a> ', $links);
    return $links;
}


// / This code filters the Category widget to include the post count inside the link /
add_filter('wp_list_categories', 'recrute_cat_count_span');
function recrute_cat_count_span($links) {
  $links = str_replace('</a> (', '<span> (', $links);
  $links = str_replace(')', ')</span></a>', $links);
  return $links;
}