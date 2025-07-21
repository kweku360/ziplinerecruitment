 <?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package recrute
 */

$gallery_images = function_exists('tpmeta_gallery_field')? tpmeta_gallery_field('recrute_post_gallery') : '';
$recrute_singleblog_social = get_theme_mod( 'recrute_singleblog_social', false );
  
$social_shear_col= $recrute_singleblog_social ? "col-lg-7 col-md-7" : "col-xl-12 col-md-12 col-lg-12";
if ( is_single() ): ?>

<article id="post-<?php the_ID();?>" <?php post_class( 'postbox__item vl-postbox-item-wrapper mb-80 format-image' );?>>
<?php if ( !empty( $gallery_images ) ): ?>
    <div class="vl-postbox-thumb p-relative mb-25">
        <div class="vl-blog-post">
            <div class="blog_gallery_slider owl-carousel">
                <?php foreach ( $gallery_images as $key => $image ): ?>
                <div class="blog-gallary-slide">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                </div>
                <?php endforeach;?>
            </div>
        </div>
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


<?php else: 
    $categories = get_the_terms( $post->ID, 'category' );    
    $recrute_blog_cat = get_theme_mod( 'recrute_blog_cat', false );
?>
 <article id="post-<?php the_ID();?>" <?php post_class( 'vl-postbox-item mb-50 format-standard' );?>>
     <?php if ( has_post_thumbnail() ): ?>
     <div class="vl-postbox-thumb p-relative">
     <div class="blog_gallery_slider owl-carousel">
                <?php foreach ( $gallery_images as $key => $image ): ?>
                <div class="blog-gallary-slide">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                </div>
                <?php endforeach;?>
            </div>
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