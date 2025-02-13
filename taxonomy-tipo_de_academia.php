<?php
/**
 * The template for displaying taxonomy archive pages for tipo_de_academia
 *
 * @package solute
 */

get_header();
?>

<div class="breadcrumb-area breadcrumb-area--tipo_de_academia">
  <div class="container">
    <div class="text-wrapper">
      <div class="title">
        <h1><?php single_term_title(); ?></h1>
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
      <div class="col-md-9">
        <main id="primary" class="site-main">
          <?php if (have_posts()): ?>
            <?php while (have_posts()): ?>
              <?php the_post(); ?>
              <?php get_template_part('template-parts/content', 'list-academia'); ?>
            <?php endwhile; ?>
            <?php the_posts_navigation(); ?>
          <?php else: ?>
            <?php get_template_part('template-parts/content', 'none-academia'); ?>
          <?php endif; ?>
        </main>
      </div>
      <div class="col-md-3">
        <?php get_template_part('template-parts/content', 'sidebar-academia'); ?>
      </div>
    </div>
  </div>
</div>

<?php
get_footer();
