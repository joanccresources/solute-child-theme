<?php
if (!defined('ABSPATH')) {
  exit;
} ?>

<?php get_header('shop'); ?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <?php do_action('woocommerce_before_main_content'); ?>
      <?php while (have_posts()): ?>
        <?php the_post(); ?>
        <?php wc_get_template_part('content', 'single-product'); ?>
      <?php endwhile; // end of the loop. ?>
      <?php do_action('woocommerce_after_main_content'); ?>
    </div>
  </div>
</div>

<?php get_footer('shop'); ?>