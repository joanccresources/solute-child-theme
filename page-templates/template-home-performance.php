<?php
/**
 * Template Name: Home Performance
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package solute
 */
get_header('performance'); // Esto cargará header-performance.php
?>

<?php
$show_breadcumb = get_post_meta(get_the_ID(), '_solute_breadcrumbs', true);
$breadcrumb_title = get_post_meta(get_the_ID(), '_solute_breadcrumb_title', true);
$bg_image = get_post_meta(get_the_ID(), '_solute_bg_image', true);
$page_text_transform = get_post_meta(get_the_ID(), '_solute_page_text_transform', true);
?>

<?php if ($show_breadcumb == 0) { ?>
  <div class="breadcrumb-area" <?php if ($bg_image) { ?> style="background-image:url(<?php echo esc_url($bg_image) ?>)"
    <?php } ?>>
    <div class="container">
      <div class="text-wrapper">
        <?php if ($breadcrumb_title == 'show_title') { ?>
          <div class="title">
            <h1><?= get_the_title(); ?></h1>
          </div>
        <?php } ?>
        <div class="breadcrumb-items">
          <?php solute_breadcrumbs(); ?>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<div class="default-page">
  <main id="primary" class="site-main">
    <?php
    while (have_posts()):
      the_post();
      the_content();
    endwhile;
    ?>
  </main>
</div>
<?php
get_footer();