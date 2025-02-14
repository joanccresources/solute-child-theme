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

    <div class="post-info">
      <div class="author-img">
        <?php $author_bio_avatar_size = 55; ?>
        <span>
          <?php print get_avatar(get_the_author_meta('user_email'), $author_bio_avatar_size, '', '', array('class' => 'media-object img-circle')); ?>
        </span>
      </div>
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
              <?php comments_number(esc_html__('0 Comments', 'solute'), esc_html__('1 Comment', 'solute'), esc_html__('% Comments', 'solute')); ?>
            </a>
          </div>
          <div class="meta-date">
            <i class="bi bi-calendar-date"></i>
            <span><?php echo get_the_time(get_option('date_format')); ?></span>
          </div>
        </div>
      </div>
    </div>

    <div class="entry-content">
      <p><?php echo wp_trim_words(get_the_content(), 24, '...'); ?></p>
      <div class="read-more">
        <a href="<?php the_permalink(); ?>"><?php echo esc_html__('Leer más', 'solute'); ?></a>
      </div>
    </div>
  </div>
</article>