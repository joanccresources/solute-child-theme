<?php
/**
 * The template for displaying search results for academia_arguz
 *
 * @package solute
 */

get_header();
?>

<div class="breadcrumb-area breadcrumb-area--search-academia_arguz">
  <div class="container">
    <div class="text-wrapper">
      <div class="title">
        <h1>
          <?php printf(esc_html__('Resultados de búsqueda en Academia: %s', 'solute'), '<span>' . get_search_query() . '</span>'); ?>
        </h1>
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
      <div class="col-lg-9">
        <main id="primary" class="site-main">

          <?php
          // Modificamos la consulta para filtrar solo academia_arguz
          if (have_posts()):
            while (have_posts()):
              the_post();

              // Solo mostrar resultados del custom post type academia_arguz
              if (get_post_type() === 'academia_arguz') {
                get_template_part('template-parts/content', 'search');
              }

            endwhile;

            the_posts_navigation();

          else:

            get_template_part('template-parts/content', 'none');

          endif;
          ?>

        </main>
      </div>
      <div class="col-lg-3">
        <?php /*get_sidebar();*/ ?>
        <?php get_template_part('template-parts/content', 'sidebar-academia'); ?>
      </div>
    </div>
  </div>
</div>

<?php

get_footer();
