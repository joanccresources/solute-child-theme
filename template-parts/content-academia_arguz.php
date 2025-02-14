<?php
/**
 * Template part for displaying Academia Arguz posts
 *
 * @package solute
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class("post"); ?>>
  <div class="blog-content">
    <div class="entry-header">
      <?php the_title('<h2 class="entry-title">', '</h2>'); ?>

      <?php
      $terms = get_the_terms(get_the_ID(), 'tipo_de_academia');
      if ($terms && !is_wp_error($terms)) {
        echo '<p class="custom-taxonomy text-white">Categoría: ';
        $term_links = array_map(function ($term) {
          return '<a href="' . get_term_link($term) . '" class="text-white text-decoration-underline">' . esc_html($term->name) . '</a>';
        }, $terms);
        echo implode(', ', $term_links) . '</p>';
      }
      ?>
    </div>

    <div class="post-info">
      <div class="author-img">
        <?php $author_bio_avatar_size = 55; ?>
        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
          <?php echo get_avatar(get_the_author_meta('user_email'), $author_bio_avatar_size, '', '', array('class' => 'media-object img-circle')); ?>
        </a>
      </div>
      <div class="post-meta">
        <div class="author-name">
          <h5><?php the_author(); ?></h5>
        </div>
        <div class="entry-meta">
          <div class="meta-views">
            <i class="fa fa-eye"></i>
            <span><?php echo solute_get_post_view(); ?></span>
          </div>
          <div class="meta-comment d-none">
            <i class="bi bi-chat-left-text"></i>
            <a class="meta_comments" href="<?php comments_link(); ?>">
              <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?>
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
    </div>

    <div class="entry-content">
      <?php the_content(); ?>
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
                echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a> ';
              }
            }
            ?>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="social-share">
            <h5><?php echo esc_html__('Share Now:', 'solute'); ?></h5>
            <ul>
              <?php
              $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink();
              $twitter_url = 'https://twitter.com/share?url=' . esc_url(get_permalink()) . '&amp;text=' . get_the_title();
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