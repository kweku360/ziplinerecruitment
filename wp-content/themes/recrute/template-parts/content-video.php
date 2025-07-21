<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package recrute
 */

 $recrute_video_url = function_exists('tpmeta_field')? tpmeta_field('recrute_post_video') : '';

 $categories = get_the_terms( $post->ID, 'category' );
$recrute_blog_cat = get_theme_mod( 'recrute_blog_cat', false );
$recrute_singleblog_social = get_theme_mod( 'recrute_singleblog_social', false );
$social_shear_col= $recrute_singleblog_social ? "col-lg-7 col-md-7" : "col-xl-12 col-md-12 col-lg-12";

if ( is_single() ): 
?> 

<article id="post-<?php the_ID();?>" <?php post_class( 'postbox__item vl-postbox-item-wrapper mb-80 format-image' );?>>
    <?php if ( has_post_thumbnail() ): ?>
    <div class="vl-postbox-thumb p-relative mb-25">
        <a href="<?php the_permalink();?>">
            <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>
        </a>
        <?php if ( !empty($recrute_video_url) ): ?>
        <div class="vl-postbox-thumb-btn">
            <a class="play-btn popup-video" href="<?php echo esc_url($recrute_video_url); ?>"><i class="fa-solid fa-play"></i>
            </a>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <!-- blog meta -->
    <?php get_template_part( 'template-parts/blog/blog-meta' ); ?>

    <h3 class="vl-postbox-title2"><?php the_title();?></h3>
    <?php the_content();?>
        <?php
            wp_link_pages( [
                'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'recrute' ),
                'after'       => '</div>',
                'link_before' => '<span class="page-number">',
                'link_after'  => '</span>',
            ] );
        ?>
    <div class="vl-postbox-share-wrapper">
        <div class="row">
            <div class=" <?php echo esc_attr($social_shear_col); ?>">
                <?php echo recrute_get_tag(); ?>
            </div>
            <?php recrute_blog_social_share() ?>
        </div>
    </div>
</article>

<?php else: ?>
<article id="post-<?php the_ID();?>" <?php post_class( 'vl-postbox-item mb-50 format-video' );?>>
    <?php if ( has_post_thumbnail() ): ?>
    <div class="vl-postbox-thumb p-relative">
        <a href="<?php the_permalink();?>">
            <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>
        </a>
        <?php if ( !empty($recrute_video_url) ): ?>
        <div class="vl-postbox-thumb-btn">
            <a class="play-btn popup-video" href="<?php echo esc_url($recrute_video_url); ?>"><i class="fa-solid fa-play"></i> </a>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <div class="vl-postbox-content">
        <?php get_template_part( 'template-parts/blog/blog-meta' ); ?>
        <h3 class="vl-postbox-title">
            <a href="<?php the_permalink();?>"><?php the_title();?></a>
        </h3>
        <div class="vl-postbox-text">
            <?php the_excerpt();?>
        </div>
        <!-- blog btn -->
        <?php get_template_part( 'template-parts/blog/blog-btn' ); ?>
    </div>
</article>
<?php
endif;?>