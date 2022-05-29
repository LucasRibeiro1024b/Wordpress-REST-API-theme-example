<?php

function api_photo_post($request){
  $user = wp_get_current_user();
  $user_id = $user->ID;

  if ($user_id === 0) {
    $response = new WP_Error('error', 'Usuário não tem permissão.', ['status' => 401]);
    return rest_ensure_response($response);
  }

  $nome  = sanitize_text_field($request['nome']);
  $peso  = sanitize_text_field($request['peso']);
  $idade = sanitize_text_field($request['idade']);

  if (empty($nome) || empty($peso) || empty($idade)){
    $response = new WP_Error('error', 'Campos inválidos.', ['status' => 422]);
    return rest_ensure_response($response);
  }

  $response = [
    'post_author' => $user_id,
    'post_type'   => 'post',
    'post_status' => 'publish',
    'post_title'  => $nome,
    'post_content'=> $nome,
    'meta_input'  => [
      'peso'    => $peso,
      'idade'   => $idade,
      'acessos' => 0
    ]
  ];

  wp_insert_post($response);

  return rest_ensure_response($response);
}

function register_api_photo_post() {
  register_rest_route('api', '/photo', [
    'methods' => WP_REST_Server::CREATABLE,
    'callback' => 'api_photo_post'
  ]);
}

add_action('rest_api_init', 'register_api_photo_post');
?>