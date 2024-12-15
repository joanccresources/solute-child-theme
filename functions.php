<?php
// Garantiza que el archivo solo pueda ser utilizado dentro del entorno de WordPress
if (!defined('ABSPATH'))
  die();

/*** Editor clasico ***/
// add_filter('use_block_editor_for_post', '__return_false', 10);
function child_theme_assets(): void
{
  wp_enqueue_style(
    'font-awesome-5',
    'https://arguz.pe/wp-content/plugins/solute-elementor-extension/assets/fonts/FontAwesome/css/font-awesome.min.css',
    array(), // Dependencias (vacío si no tiene)
    '6.7.1'// Versión del archivo
  );

  if (is_page("ingresar")) {
    wp_enqueue_style(
      'learnpress-manual-style',
      'https://arguz.pe/wp-content/plugins/learnpress/assets/css/learnpress.min.css',
      array(), // Dependencias (vacío si no tiene)
      '4.2.7.3'// Versión del archivo
    );
  }

  wp_enqueue_style(
    'parent-theme',
    get_template_directory_uri() . '/style.css',
    array(),
    filemtime(get_template_directory() . '/style.css')
  );
  wp_enqueue_style(
    'child-theme',
    get_stylesheet_uri(),
    array(),
    filemtime(get_stylesheet_directory() . '/style.css')
  );
  wp_enqueue_style(
    'main-style',
    get_stylesheet_directory_uri() . '/assets/css/main.css',
    array('child-theme'), // Se carga después del tema hijo
    filemtime(get_stylesheet_directory() . '/assets/css/main.css')
  );

  // En cada curso
  if (is_single("lp_course")) {
    wp_enqueue_script(
      'lp_course-script',
      get_stylesheet_directory_uri() . '/assets/js/single-cursos.js?v=' . time(),
      array(),
      null,
      true
    );
  }

}
add_action('wp_enqueue_scripts', 'child_theme_assets', 999);



/***  Add clases ***/
function custom_body_class($classes)
{
  $page_classes = [
    'home' => 'page-id-home',
    'terminos-y-condiciones' => 'page-id-terminos-y-condiciones',
    'ingresar' => 'page-id-ingresar',
    'registrar' => 'page-id-registrar',
    'perfil' => 'page-id-perfil',
    'cursos' => 'page-id-cursos'
  ];
  foreach ($page_classes as $slug => $class) {
    if (is_page($slug))
      $classes[] = $class;
  }

  if (is_single())
    $classes[] = 'single-slug-all';
  if (is_category())
    $classes[] = 'category-slug-all';
  // if (is_shop())
  //   $classes[] = 'woo-slug-shop';
  // if (is_product_category())
  //   $classes[] = 'woo-slug-product-category';
  // if (is_product())
  //   $classes[] = 'woo-slug-product';
  return $classes;
}
add_filter('body_class', 'custom_body_class');


/*** Oculta la barra para todos excepto los administradores ***/
add_action('after_setup_theme', function (): void {
  if (!current_user_can('manage_options'))
    show_admin_bar(false);
});



add_filter('gettext', 'cambiar_textos_learnpress', 10, 3);
function cambiar_textos_learnpress($translated_text, $text, $domain)
{
  // if ($translated_text === 'Facturación Ubigeo Perú') {
  //   $translated_text = 'Tu nueva descripción aquí'; // Cambia el título aquí
  // }
  if ($translated_text === 'Leave Comment') {
    $translated_text = 'Dejar un comentario'; // Cambia este también si quieres
  }

  if ($translated_text === 'Your email address will not be published. Required fields are marked *') {
    $translated_text = 'Tu dirección de correo electrónico no será publicada. Los campos obligatorios están marcados con *'; // Cambia este también si quieres
  }

  if ($translated_text === 'Your comment...') {
    $translated_text = 'Tu comentario...';
  }

  return $translated_text;
}