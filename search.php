<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package solute
 */

get_header();
?>

	<div class="breadcrumb-area 1234">
		<div class="container">
			<div class="text-wrapper">
				<div class="title">
					<h1><?php printf( esc_html__( 'Search Results for: %s', 'solute' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</div>
				<div class="breadcrumb-items">
					<?php solute_breadcrumbs(); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="search-result">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<main id="primary" class="site-main">

						<?php if ( have_posts() ) : ?>

							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

							endwhile;

							the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>

					</main>
				</div>
				<div class="col-lg-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>

<?php

get_footer();
