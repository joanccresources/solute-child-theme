<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package solute
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	if ( has_post_thumbnail() ) {
		$post_thumb = get_the_post_thumbnail_url(); ?>
		<div class="blog-thumb" style="background-image: url(<?php echo $post_thumb; ?>);">
			
		</div>
	<?php } ?>

	<div class="blog-content">
		<div class="entry-header">

			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>

		</div>

		<div class="post-info">
			<div class="author-img">
				<?php $author_bio_avatar_size = 55; ?>
				<a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>">
					<?php print get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size,'','',array('class'=>'media-object img-circle') ); ?>
				</a>
			</div>
			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="post-meta">
				<div class="author-name">
					<h5><?php the_author(); ?></h5>
				</div>
				<div class="entry-meta">
					<div class="meta-views">
						<i class="fa fa-eye"></i>
						<span><?= solute_get_post_view(); ?></span>
					</div>
					<div class="meta-comment">
						<i class="bi bi-chat-left-text"></i>
						<a class="meta_comments" href="<?php comments_link(); ?>">
							<?php comments_number( esc_html__('0 Comments','solute'), esc_html__('1 Comments','solute'), esc_html__('% Comments','solute') );?>
						</a>
					</div>
					<div class="meta-date">
						<i class="bi bi-calendar-date"></i>
						<span><?php echo get_the_time(get_option('date_format')); ?></span>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</div>

		<div class="entry-content">
			<?php

			echo "<p>".wp_trim_words(get_the_content(),24,' ')."</p>";
			?>
			<div class="read-more">
				<a href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Read More', 'solute' ); ?></a>
			</div>
			<?php

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'solute' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>
	</div>

</article>
