<?php
/**
 * Template part for displaying a message when no posts found in academia_arguz
 *
 * @package solute
 */
?>

<section class="no-results not-found">
  <header class="page-header">
    <h1 class="page-title"><?php esc_html_e('No se encontraron resultados', 'solute'); ?></h1>
  </header>

  <div class="page-content">
    <p><?php esc_html_e('No hay academias disponibles en esta categoría.', 'solute'); ?></p>
    <?php get_search_form(); ?>
  </div>
</section>