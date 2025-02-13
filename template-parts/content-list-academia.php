<?php
/**
 * Template part for displaying posts of academia_arguz
 *
 * @package solute
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class("post"); ?>>
  <?php if (has_post_thumbnail()): ?>
    <div class="blog-thumb" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>
  <?php endif; ?>

  <div class="blog-content">
    <div class="entry-header">
      <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
    </div>

    <div class="entry-meta">
      <div class="meta-date"><i class="bi bi-calendar-date"></i> <?php echo get_the_date(); ?></div>
    </div>

    <div class="entry-content">
      <p><?php echo wp_trim_words(get_the_content(), 24, '...'); ?></p>
      <div class="read-more">
        <a href="<?php the_permalink(); ?>"><?php echo esc_html__('Leer más', 'solute'); ?></a>
      </div>
    </div>
  </div>
</article>