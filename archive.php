<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package solute
 */

get_header();
?>

	<div class="breadcrumb-area breadcrumb-area--archive">
		<div class="container">
			<div class="text-wrapper">
				<div class="title">
					<h1><?php wp_title(''); ?></h1>
				</div>
				<div class="breadcrumb-items">
					<?php solute_breadcrumbs(); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="archive-page">
		<div class="container">
			<div class="row">
				<div class="col-md-8">

					<main id="primary" class="site-main">

						<?php if ( have_posts() ) : ?>

							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'list' );

							endwhile;

							the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>

					</main>
				</div>
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>

<?php

get_footer();
