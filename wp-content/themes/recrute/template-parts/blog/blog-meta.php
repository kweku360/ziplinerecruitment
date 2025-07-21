<?php 

/**
 * Template part for displaying post meta
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package recrute
 */

$categories = get_the_terms( $post->ID, 'category' );
$recrute_blog_date = get_theme_mod( 'recrute_blog_date', true );
$recrute_blog_comments = get_theme_mod( 'recrute_blog_comments', true );
$recrute_blog_author = get_theme_mod( 'recrute_blog_author', true );
$recrute_blog_cat = get_theme_mod( 'recrute_blog_cat', false );

?>
<div class="vl-postbox-meta">
    <?php if ( !empty($recrute_blog_author) ): ?>
    <span>
        <a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>">
            <i class="fa-regular fa-user"></i>
            <?php print get_the_author();?>
         </a>
    </span>
    <?php endif;?>

    <?php if ( !empty($recrute_blog_cat) ): ?>
    <?php if ( !empty( $categories[0]->name ) ): ?>
    <span> <a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>"> <i
                class="fa-regular fa-folder-open"></i>
            <?php echo esc_html($categories[0]->name); ?>
         </a> 
   </span>
    <?php endif;?>
    <?php endif;?>

    <?php if ( !empty($recrute_blog_date) ): ?>
    <span>
        <i class="fa-sharp fa-regular fa-calendar-days"></i>
        <?php the_time( get_option('date_format') ); ?>
    </span>
    <?php endif;?>

    <?php if ( !empty($recrute_blog_comments) ): ?>
    <span>
        <a href="<?php comments_link();?>">
            <i class="fa-regular fa-comments"></i>
            <?php comments_number();?>
        </a>
    </span>
    <?php endif;?>
</div>