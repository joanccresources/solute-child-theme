<?php get_header(); ?>

<div class="breadcrumb-area academia-arguz">
	<div class="container">
		<div class="title">
			<h1><?= get_the_title(); ?></h1>
			<?php
			$terms = get_the_terms(get_the_ID(), 'tipo_de_academia');
			if ($terms && !is_wp_error($terms)) {
				echo '<p class="custom-taxonomy">Categoría: ';
				$term_links = array_map(function ($term) {
					return '<a href="' . get_term_link($term) . '">' . esc_html($term->name) . '</a>';
				}, $terms);
				echo implode(', ', $term_links) . '</p>';
			}
			?>
		</div>
		<div class="breadcrumb-items">
			<?php solute_breadcrumbs(); ?>
		</div>
	</div>
</div>

<div class="blog-details">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<main id="primary" class="site-main">
					<?php
					while (have_posts()):
						the_post();
						solute_set_post_view();
						get_template_part('template-parts/content', 'academia_arguz'); // Asegúrate de tener content-academia_arguz.php
						the_post_navigation(
							array(
								'prev_text' => '<i class="fa fa-angle-double-left"></i><span class="nav-subtitle">' . esc_html__('Previous Academy', 'solute') . '</span>',
								'next_text' => '<span class="nav-subtitle">' . esc_html__('Next Academy', 'solute') . '</span><i class="fa fa-angle-double-right"></i>',
							)
						);
						// Biografía del autor
						$author_data = get_the_author_meta('description', get_query_var('author'));
						$author_bio_avatar_size = 120;
						if ($author_data != ''):
							?>
							<div class="author-bio">
								<div class="author-img">
									<a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>">
										<?php print get_avatar(get_the_author_meta('user_email'), $author_bio_avatar_size, '', '', array('class' => 'media-object img-circle')); ?>
									</a>
								</div>
								<div class="author-text">
									<h3><span class="media-heading"><a
												href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>"><?php print get_the_author(); ?></a></span>
									</h3>
									<p><?php the_author_meta('description'); ?> </p>
								</div>
							</div>
						<?php endif;

						// Comentarios
						if (comments_open() || get_comments_number()):
							comments_template();
						endif;

					endwhile; // Fin del loop.
					?>

				</main>
			</div>
			<div class="col-lg-3">
				<?php get_template_part('template-parts/content', 'sidebar-academia'); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>