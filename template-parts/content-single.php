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
  $banner_id = get_post_meta(get_the_ID(), 'banner', true);
  if ($banner_id) {
    $background_image = wp_get_attachment_url($banner_id);
  } elseif (has_post_thumbnail()) {
    $background_image = get_the_post_thumbnail_url();
  } else {
    $background_image = '';
  } ?>
  <!-- if (has_post_thumbnail()) {
    $post_thumb = get_the_post_thumbnail_url(); ?> -->
  <div class="blog-thumb 1234" style="background-image: url(<?php echo esc_url($background_image); ?>);">
  </div>
  <!-- } -->
  <div class="blog-content">
    <div class="entry-header">
      <?php
      if (is_singular()):
        the_title('<h2 class="entry-title">', '</h2>');
      else:
        the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
      endif; ?>

    </div>

    <div class="post-info">
      <div class="author-img">
        <?php $author_bio_avatar_size = 55; ?>
        <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>">
          <?php print get_avatar(get_the_author_meta('user_email'), $author_bio_avatar_size, '', '', array('class' => 'media-object img-circle')); ?>
        </a>
      </div>
      <?php if ('post' === get_post_type()): ?>
        <div class="post-meta">
          <div class="author-name">
            <h5><?php the_author(); ?></h5>
          </div>
          <div class="entry-meta">
            <div class="meta-views">
              <i class="fa fa-eye"></i>
              <span><?= solute_get_post_view(); ?></span>
            </div>
            <div class="meta-comment d-none">
              <i class="bi bi-chat-left-text"></i>
              <a class="meta_comments" href="<?php comments_link(); ?>">
                <?php comments_number(esc_html__('0 Comments', 'solute'), esc_html__('1 Comments', 'solute'), esc_html__('% Comments', 'solute')); ?>
              </a>
            </div>
            <div class="meta-date d-none">
              <i class="bi bi-calendar-date"></i>
              <span><?php echo get_the_time(get_option('date_format')); ?></span>
            </div>
            <div class="meta-date">
              <i class="bi bi-calendar-date"></i>
              <span>Última actualización: <?php echo get_the_modified_time(get_option('date_format')); ?></span>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <div class="entry-content">
      <?php

      the_content();

      wp_link_pages(
        array(
          'before' => '<div class="page-links">' . esc_html__('Pages:', 'solute'),
          'after' => '</div>',
        )
      );
      ?>
    </div>

    <div class="entry-footer">
      <div class="row">
        <div class="col-lg-7">
          <div class="post-tags">
            <h5><?php echo esc_html__('Related Tags:', 'solute'); ?></h5>
            <?php

            $tags = wp_get_post_tags(get_the_ID());
            if ($tags) {
              foreach ($tags as $tag) {
                echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
              }
            }

            ?>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="social-share">
            <h5><?php echo esc_html__('Share Now:', 'solute'); ?> </h5>
            <ul>
              <?php
              $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink();
              $twitter_url = 'https://twitter.com/share?' . esc_url(get_permalink()) . '&amp;text=' . get_the_title();
              $linkedin_url = 'http://www.linkedin.com/shareArticle?url=' . esc_url(get_permalink()) . '&amp;title=' . get_the_title();
              $pinterest_url = 'https://pinterest.com/pin/create/bookmarklet/?url=' . esc_url(get_permalink()) . '&amp;description=' . get_the_title() . '&amp;media=' . esc_url(wp_get_attachment_url(get_post_thumbnail_id($post->ID)));
              ?>
              <li><a href="<?php echo esc_url($facebook_url); ?>"><i class="bi bi-facebook"></i></a></li>
              <li><a href="<?php echo esc_url($twitter_url); ?>"><i class="bi bi-twitter"></i></a></li>
              <li><a href="<?php echo esc_url($pinterest_url); ?>"><i class="bi bi-pinterest"></i></a></li>
              <li><a href="<?php echo esc_url($linkedin_url); ?>"><i class="bi bi-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

</article>