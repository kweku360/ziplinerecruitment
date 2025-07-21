<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package recrute
 */

$recrute_blog_btn = get_theme_mod( 'recrute_blog_btn', 'Read More' );
$recrute_blog_btn_switch = get_theme_mod( 'recrute_blog_btn_switch', true );

?>
<?php if ( !empty( $recrute_blog_btn_switch ) ): ?>
<div class="vl-postbox-read-more">
    <a href="<?php the_permalink();?>" class="theme-btn1"> <?php print esc_html( $recrute_blog_btn );?><span><i class="fa-solid fa-arrow-right"></i></span></a>
</div>
<?php endif;?>