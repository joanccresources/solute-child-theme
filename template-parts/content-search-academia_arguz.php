<?php
/**
 * Template part for displaying results in search pages for academia_arguz
 *
 * @package solute
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="blog-thumb">
    <?php solute_post_thumbnail(); ?>
  </div>

  <div class="blog-content">
    <div class="entry-header">
      <?php
      // Mostrar título
      if (is_singular()):
        the_title('<h1 class="entry-title">', '</h1>');
      else:
        the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
      endif;
      ?>

      <?php
      // Mostrar taxonomía "tipo_de_academia"
      $terms = get_the_terms(get_the_ID(), 'tipo_de_academia');
      if ($terms && !is_wp_error($terms)):
        echo '<div class="entry-meta"><span class="academy-type">';
        foreach ($terms as $term) {
          echo '<a href="' . get_term_link($term) . '">' . esc_html($term->name) . '</a> ';
        }
        echo '</span></div>';
      endif;
      ?>
    </div>

    <div class="entry-content">
      <?php the_excerpt(); ?>
    </div>
  </div>

</article>