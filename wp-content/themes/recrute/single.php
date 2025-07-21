<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package recrute
 */

get_header();

if (get_post_type() === 'gallery') : ?>
    <section class="vl-postbox-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <main id="main" class="site-main gallery-post-title-only">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </main>
                </div>
            </div>
        </div>
    </section>
<?php
else:
    $blog_column = is_active_sidebar( 'blog-sidebar' ) ? 8 : 12;
?>

<section class="vl-postbox-area pt-100 pb-100">
	<div class="container">
		<div class="row">
			<div
				class="col-xxl-<?php print esc_attr( $blog_column );?> col-xl-<?php print esc_attr( $blog_column );?> col-lg-<?php print esc_attr( $blog_column );?>">
				<div class="vl-postbox-wrapper">
					<div class="postbox__wrapper blog__wrapper postbox__details mb-50 ">
						<?php
							while ( have_posts() ):
							the_post();

							get_template_part( 'template-parts/content', get_post_format() );

    						?>

						<?php
    							if ( get_previous_post_link() AND get_next_post_link() ): ?>

						<div class="blog-details-border d-none">
							<div class="row align-items-center">
								<?php
    									if ( get_previous_post_link() ): ?>
								<div class="col-lg-6 col-md-6">
									<div class="theme-navigation b-next-post text-left mb-30">
										<span><?php print esc_html__( 'Prev Post', 'recrute' );?></span>
										<h4><?php print get_previous_post_link( '%link ', '%title' );?></h4>
									</div>
								</div>
								<?php
    								endif;?>

								<?php
    							if ( get_next_post_link() ): ?>
								<div class="col-lg-6 col-md-6">
									<div class="theme-navigation b-next-post text-left text-md-right  mb-30">
										<span><?php print esc_html__( 'Next Post', 'recrute' );?></span>
										<h4><?php print get_next_post_link( '%link ', '%title' );?></h4>
									</div>
								</div>
								<?php
    							endif;?>

							</div>
						</div>

						<?php
							endif;?>
						<?php

								get_template_part( 'template-parts/biography' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ):
									comments_template();
								endif;

								endwhile; // End of the loop.
							?>
					</div>
				</div>
			</div>
			<!-- Sidebar removed for all single posts -->
		</div>
	</div>
</section>

<?php
endif;
get_footer();