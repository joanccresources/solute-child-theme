<?php
// Garantiza que el archivo solo pueda ser utilizado dentro del entorno de WordPress
if (!defined('ABSPATH'))
  die();

/*** Editor clasico ***/
// add_filter('use_block_editor_for_post', '__return_false', 10);
/* INCLUDES */
require_once get_stylesheet_directory() . '/includes/index.php';
/* SHORTCODES */
require_once get_stylesheet_directory() . '/shortcodes/index.php';
function child_theme_assets(): void
{
  $puntos = do_shortcode('[gamipress_points type="punto"]');

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

  // En cada post evaluamos
  if (is_single()) {
    wp_enqueue_script(
      'single-achievement-script',
      get_stylesheet_directory_uri() . '/assets/js/singles/single-achievement.js',
      array(),
      filemtime(get_stylesheet_directory() . '/assets/js/singles/single-achievement.js'),
      true
    );
    // 
    // wp_localize_script(
    //   'single-achievement-script',
    //   'data',
    //   array(
    //     'puntos' => $puntos,
    //   )
    // );
  }
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

  if (is_page("ingresar")) {
    wp_enqueue_script(
      'ingresar-script',
      get_stylesheet_directory_uri() . '/assets/js/pages/ingresar.js',
      array(),
      filemtime(get_stylesheet_directory() . '/assets/js/pages/ingresar.js'),
      true
    );
  }

  if (is_page("registrar")) {
    wp_enqueue_script(
      'registrar-script',
      get_stylesheet_directory_uri() . '/assets/js/pages/registrar.js',
      array(),
      filemtime(get_stylesheet_directory() . '/assets/js/pages/registrar.js'),
      true
    );
  }

  if (is_page("perfil")) {
    wp_enqueue_script(
      'perfil-script',
      get_stylesheet_directory_uri() . '/assets/js/pages/perfil.js',
      array(),
      filemtime(get_stylesheet_directory() . '/assets/js/pages/perfil.js'),
      true
    );

    if (isset($puntos)) {
      $args = array(
        'puntos' => $puntos,
      );
    }

    // Obtenemos la url completa
    $current_url = $_SERVER['REQUEST_URI'];
    // Obtiene solo el camino base, sin parámetros
    $path = strtok($current_url, '?');
    if (preg_match('#^/perfil/?$#', $path)) {
      // Coincide si termina exactamente en "/perfil/" (con o sin barra final, sin parámetros)      
      if (is_user_logged_in()) {
        $user_id = get_current_user_id();
        // El shortcode ya sanatiza el HTML(convierte a texto plano)
        $achievements_html = do_shortcode('[gamipress_get_achievements user_id="' . $user_id . '"]');
        $args["achievements_html"] = $achievements_html;
      }
    } else if (preg_match('#^/perfil/[^/]+/?#', $path)) {
      // Coincide con "/perfil/{nombre_usuario}" y cualquier subruta como "/perfil/{nombre_usuario}/algo/..."

      // } else if (preg_match('#^/perfil/[^/]+/?$#', $path)) {
      // Coincide con "/perfil/{algo}" donde {algo} es un nombre de usuario, sin barra final adicional ni parámetros
      $achievements_html = do_shortcode('[gamipress_get_achievements_uri uri="' . $current_url . '"]');
      $args["achievements_html"] = $achievements_html;
    }


    wp_localize_script(
      'perfil-script',
      'data',
      $args
    );
  }

  if (is_checkout()) {
    wp_enqueue_script(
      'translate-checkout-script',
      get_stylesheet_directory_uri() . '/assets/js/translate/translate-checkout.js',
      array(),
      filemtime(get_stylesheet_directory() . '/assets/js/translate/translate-checkout.js'),
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

  // Woocommerce
  if (is_shop())
    $classes[] = 'woo-slug-shop';
  if (is_product())
    $classes[] = 'woo-slug-product';
  if (is_cart())
    $classes[] = 'woo-slug-cart';
  // if (is_product_category())
  //   $classes[] = 'woo-slug-product-category';  

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
  // LearnPress Review del curso
  if ($translated_text === 'Write a review') {
    $translated_text = 'Escribe una reseña';
  }
  if ($translated_text === 'Reviews') {
    $translated_text = 'Reseñas';
  }
  if ($translated_text === 'Title') {
    $translated_text = 'Título';
  }
  if ($translated_text === 'Content') {
    $translated_text = 'Contenido';
  }
  if ($translated_text === 'Add review') {
    $translated_text = 'Añadir reseña';
  }
  if ($translated_text === 'Cancel') {
    $translated_text = 'Cancelar';
  }

  if ($translated_text === 'Certificate') {
    $translated_text = 'Certificado';
  }
  if ($translated_text === 'Certificates') {
    $translated_text = 'Certificados';
  }
  if ($translated_text === "Your review has been submitted and is awaiting approve.") {
    $translated_text = "Tu reseña ha sido enviada y está esperando aprobación.";
  }

  // Woocommerce GamiPress
  if ($translated_text === 'Apply discount')
    $translated_text = 'Aplicar descuento';


  return $translated_text;
}


// LearnPress
// Si estamos logueados no podemos acceder a "registrar" asi que nos redirecciona
add_action('template_redirect', 'redirect_logged_in_users_from_register');
function redirect_logged_in_users_from_register()
{
  // Verifica si el usuario está en la página "registrar" y está logueado
  if (is_page('registrar') && is_user_logged_in()) {
    wp_safe_redirect(home_url('/perfil')); // Cambia '/perfil' si necesitas otra página
    exit;
  }

  // Verifica si el usuario está en la página "ingresar" y está logueado
  if (is_page('ingresar') && is_user_logged_in()) {
    wp_safe_redirect(home_url('/perfil')); // Cambia '/perfil' si necesitas otra página
    exit;
  }

  // Verifica si el usuario está en la página "perfil" y no está logueado
  if (is_page('perfil') && !is_user_logged_in()) {
    wp_safe_redirect(home_url('/ingresar')); // Cambia '/ingresar' si necesitas otra página
    exit;
  }
}

