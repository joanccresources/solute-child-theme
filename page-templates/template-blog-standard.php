<?php
/**
 * Template Name: Standard Blog
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package solute
 */

get_header();
?>

	<div class="breadcrumb-area">
		<div class="container">
		    <div class="text-wrapper">
                <div class="title">
                    <h1><?php echo get_the_title(); ?></h1>
                </div>
                <div class="breadcrumb-items">
                    <?php solute_breadcrumbs(); ?>
                </div>
			</div>
		</div>
	</div>
			
	<div class="standard-blog">
		<div class="container">
			<div class="row">
                <div class="col-lg-8">
                    <?php
                    $page = ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );
                    $paged = ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : $page );
                    $wp_query = new WP_Query( array(
                        'post_type' => 'post',
                        'paged'     => $paged,
                        'page'      => $paged,
                    ) );

				    while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="blog-thumb">
								<?php solute_post_thumbnail(); ?>
							</div>
							<div class="blog-content">
                                
                                <?php the_category(); ?>
                                
								<div class="entry-header">
                                    
                                    <?php
									if ( is_singular() ) :
										the_title( '<h1 class="entry-title">', '</h1>' );
									else :
										the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
									endif; ?>
									
									<?php if ( 'post' === get_post_type() ) : ?>
										<div class="entry-meta">
											<a class="author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
											<span class="date"><?php echo get_the_time(get_option('date_format')); ?></span>
										</div>
									<?php endif; ?>

								</div>
								<p class="post-excerpt"><?php echo wp_trim_words( get_the_content(), 60, '' ); ?></p>
								<a class="read-more" href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Read More', 'solute' ); ?><i class="bi bi-arrow-right-short"></i></a>
							</div>
						</article>
						
				    <?php endwhile; ?>
                </div>
                <div class="col-lg-4">
                    <?php get_sidebar(); ?>
                </div>
			</div>
		</div>
	</div>
			
<?php 
get_footer();