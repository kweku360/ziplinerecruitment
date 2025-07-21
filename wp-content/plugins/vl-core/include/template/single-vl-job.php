<?php
/**
 * The main template file
 *
 * @package  WordPress
 * @subpackage  vlcore
 */

get_header();

$blog_column = is_active_sidebar( 'vl-job-sidebar' ) ? 8 : 12;

?>

<section class="vl-postbox-area pt-100 pb-100">
	<div class="container">
		<div class="row">
			<div
				class="col-xxl-<?php print esc_attr( $blog_column );?> col-xl-<?php print esc_attr( $blog_column );?> col-lg-<?php print esc_attr( $blog_column );?>">
				<div class="vl-postbox-wrapper">
					<div class="postbox__wrapper blog__wrapper postbox__details mb-50">
					<?php
                  
						if( have_posts() ):
						while( have_posts() ): the_post(); ?>

						<?php the_content(); ?>
						
						<?php
						endwhile; wp_reset_query();
						endif;
						?>
					</div>
				</div>
			</div>
			<?php if ( is_active_sidebar( 'vl-job-sidebar' ) ): ?>
			<div class="col-lg-4">
				<div class="vl-sidebar-wrapper ">
					<?php dynamic_sidebar( 'vl-job-sidebar' ); ?>
				</div>
			</div>
			<?php endif;?>
		</div>
	</div>
</section>

<?php

get_footer();