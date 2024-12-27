<?php
if (!defined('ABSPATH'))
  exit; // Salir si se accede directamente

function shortcode_gamipress_get_achievements($atts)
{
  // Iniciar el output buffer
  ob_start();

  // Obtener el user_id del parámetro (por defecto 0)
  $atts = shortcode_atts(
    array(
      'user_id' => 0,
    ),
    $atts
  );

  $user_id = intval($atts['user_id']);
  if ($user_id === 0) {
    echo '<p>Error: Debes proporcionar un ID de usuario válido.</p>';
    return ob_get_clean();
  }

  // Obtener los resultados
  $achievements = get_data_achievements($user_id);

  // Preparar la salida
  if (empty($achievements)) {
    echo '<p class="m-0">Todavía no tienes trofeos. Explora nuestros cursos y actividades para ganar tu primer logro. ¡Empieza hoy mismo!</p>';
    return ob_get_clean();
  }

  // Iniciar el contenedor HTML
  echo '<div class="gamipress-achievements-container">';
  echo '<ul class="list-unstyled d-flex mb-0">'; // Lista
  foreach ($achievements as $index => $achievement) {
    echo '<li class="achievement-item' . ($index === 0 ? '' : ' ms-4') . '">';
    // Imagen destacada
    if (!empty($achievement['featured_image_url'])) {
      echo '<div class="achievement-image text-center">';
      echo '<img src="' . esc_url($achievement['featured_image_url']) . '" alt="' . esc_attr($achievement['title']) . '"/>';
      echo '</div>';
    }
    // Título
    echo '<h5 class="achievement-title">' . esc_html($achievement['title']) . '</h5>';
    echo '</li>'; // Fin del item
  }
  echo '</ul>'; // Fin de la Lista
  echo '</div>'; // Fin del contenedor

  // Capturar y devolver el contenido
  return ob_get_clean();
}
add_shortcode('gamipress_get_achievements', 'shortcode_gamipress_get_achievements');


// 
function shortcode_gamipress_get_achievements_uri($atts)
{
  // Iniciar el output buffer
  ob_start();

  // Obtener el user_id del parámetro (por defecto 0)
  $atts = shortcode_atts(
    array(
      'uri' => '',
    ),
    $atts
  );

  $uri = $atts['uri'];
  if (empty($uri)) {
    echo '<p>Error: Debes proporcionar una URL válida.</p>';
    return ob_get_clean();
  }

  // Obtener los resultados  
  $user_id = get_user_id_by_request_uri($uri);
  if (empty($user_id)) {
    echo '<p>Error: Usuario no válido.-</p>';
    return ob_get_clean();
  }
  $user_id = intval($user_id);
  // Obtener los premios
  $achievements = get_data_achievements($user_id);

  // Preparar la salida
  if (empty($achievements)) {
    echo '<p class="m-0">Todavía no tienes trofeos. Explora nuestros cursos y actividades para ganar tu primer logro. ¡Empieza hoy mismo!</p>';
    return ob_get_clean();
  }

  // Iniciar el contenedor HTML
  echo '<div class="gamipress-achievements-container">';
  echo '<ul class="list-unstyled d-flex mb-0">'; // Lista
  foreach ($achievements as $index => $achievement) {
    echo '<li class="achievement-item' . ($index === 0 ? '' : ' ms-3') . '">';
    // Imagen destacada
    if (!empty($achievement['featured_image_url'])) {
      echo '<div class="achievement-image text-center">';
      echo '<img src="' . esc_url($achievement['featured_image_url']) . '" alt="' . esc_attr($achievement['title']) . '">';
      echo '</div>';
    }
    // Título
    echo '<h5 class="achievement-title">' . esc_html($achievement['title']) . '</h5>';
    echo '</li>'; // Fin del item
  }
  echo '</ul>'; // Fin de la Lista
  echo '</div>'; // Fin del contenedor

  // Capturar y devolver el contenido
  return ob_get_clean();
}
add_shortcode('gamipress_get_achievements_uri', 'shortcode_gamipress_get_achievements_uri');