<?php global $solute_opt;?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="preload" as="image" href="<?=wp_get_upload_dir()['baseurl'];?>/2025/03/arguz-cabecera-2.webp" type="image/webp">
  <!-- <link rel='stylesheet' id='font-awesome-5-css' href='https://arguz.test/wp-content/plugins/solute-elementor-extension/assets/fonts/FontAwesome/css/font-awesome.min.css?ver=6.7.1' media='all' /> -->
  <?php wp_head(); ?>
  <style>
    :root {
      <?php if (!empty($solute_opt['main-color'])) { ?>
        --main-color:
          <?php echo $solute_opt['main-color']; ?>
        <?php } ?>
    }
  </style>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'solute'); ?></a>

    <!-- Topbar -->

    <?php get_template_part('template-parts/header-layout/topbar'); ?>

    <!-- Header -->

    <?php
    $solute_header = get_post_meta(get_the_ID(), 'metabox_header_style', true);
    if (class_exists('Redux_Framework_Plugin')) {
      $header_custom = Redux::get_option('solute_opt', 'redux_header_style');
    }
    ?>

    <?php
    if (!empty($solute_header)) {
      $header_style = $solute_header;
    } elseif (!empty($header_custom) && class_exists('Redux_Framework_Plugin')) {
      $header_style = $header_custom;
    } else {
      $header_style = 'header-default';
    }
    ?>

    <?php get_template_part('template-parts/header-layout/' . $header_style . ''); ?>

    <!-- Mobile Menu -->
    <?php get_template_part('template-parts/header-layout/mobile-menu'); ?>

    <!-- Search -->

    <div class="search-window">
      <button class="search-close"><i class="bi bi-x-lg"></i></button>
      <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="form-group">
          <input type="search" name="s" value="<?php the_search_query(); ?>"
            placeholder="<?php echo esc_attr('Search Here', 'solute'); ?>" required="">
          <button type="submit"><i class="bi bi-search"></i></button>
        </div>
      </form>
    </div>