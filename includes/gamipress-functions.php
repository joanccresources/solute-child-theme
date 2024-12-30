<?php
if (!defined('ABSPATH'))
  exit;
function get_data_achievements($user_id)
{
  global $wpdb;

  // Tabla con el prefijo dinámico
  $table_name = $wpdb->prefix . 'gamipress_user_earnings';

  // Consulta segura con placeholders
  // $query = $wpdb->prepare(
  //   "SELECT post_id 
  //   FROM `$table_name` 
  //   WHERE post_type <> %s
  //   AND user_id = %d
  //   ORDER BY `date` DESC",
  //   'step', // Placeholder para post_type
  //   $user_id // Placeholder para user_id
  // );

  // Consulta segura con placeholders
  $query = $wpdb->prepare(
    "SELECT post_id 
    FROM `$table_name`
    WHERE post_type NOT IN (%s, %s)
    AND user_id = %d
    ORDER BY `date` DESC",
    'step', // Primer valor excluido
    'points-award', // Segundo valor excluido
    $user_id // Placeholder para user_id
  );

  // Ejecutar la consulta  
  $post_ids = $wpdb->get_results($query, ARRAY_A);


  if (empty($post_ids))
    return null;

  $results = array();

  foreach ($post_ids as $post_id) {
    $post = get_post($post_id['post_id']);
    if ($post) {
      $results[] = array(
        'title' => $post->post_title,
        'featured_image_url' => get_the_post_thumbnail_url($post->ID, 'full'),
        // 'content' => apply_filters('the_content', $post->post_content),
        // 'author' => get_the_author_meta('display_name', $post->post_author),
        // 'date' => $post->post_date,
      );
    }
  }

  return $results;
}


function get_user_id_by_request_uri($request_uri)
{
  global $wpdb;

  // Eliminar parámetros de la URL (como ?text=message).
  $uri_path = parse_url($request_uri, PHP_URL_PATH);

  // Extraer la última parte de la ruta.
  // $path_parts = explode('/', trim($uri_path, '/'));

  // Dividir la ruta en segmentos
  $path_parts = explode('/', trim($uri_path, '/'));

  // Verificar si "perfil" está en la URL y extraer el segmento siguiente
  $perfil_index = array_search('perfil', $path_parts);

  // Si no se encontró "perfil" o no hay segmento después, devolver null
  if ($perfil_index === false || !isset($path_parts[$perfil_index + 1])) {
    return null; // No se encontró "perfil" o no hay segmento después
  }

  // $user_login_url_encoded = end($path_parts);
  $user_login_url_encoded = $path_parts[$perfil_index + 1];

  // Decodificar la parte URL-encoded (%20 a espacios, etc.).
  $user_login = urldecode($user_login_url_encoded);

  // Realizar la consulta SQL para buscar al usuario.
  $user_id = $wpdb->get_var(
    $wpdb->prepare(
      "SELECT ID FROM {$wpdb->users} WHERE LOWER(user_login) = LOWER(%s)",
      $user_login
    )
  );

  return $user_id; // return id|null
}
