<div class="vl-page-post">
<?php
    the_content();
    wp_link_pages( [
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'recrute' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'recrute' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text"> </span>',
    ] );

    if ( comments_open() || get_comments_number() ):
        comments_template();
    endif;
?>
</div>