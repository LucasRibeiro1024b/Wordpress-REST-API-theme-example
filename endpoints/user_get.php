<?php

function api_user_get($request){
  // $email = sanitize_email($request['email']);
  // $username = sanitize_text_field($request['username']);
  // $password = $request['password'];

  // if (empty($email) || empty($username) || empty($password)) {
  //   $response = new WP_Error('error', 'Dados incompletos.', ['status' => 406]);
  //   return rest_ensure_response($response);
  // }

  // if (username_exists($username) || email_exists($email)) {
  //   $response = new WP_Error('error', 'Email/Usuário já cadastrado.', ['status' => 403]);
  //   return rest_ensure_response($response);
  // }

  // $response = wp_insert_user([
  //   'user_login' => $username,
  //   'user_email' => $email,
  //   'user_pass'  => $password,
  //   'role'       => 'subscriber'
  // ]);

  // // $response = [
  // //   'ID' => 2,
  // //   'user_login' => "meu_usuario"
  // // ];

  $response = 2;

  return rest_ensure_response($response);
}

function register_api_user_get() {
  register_rest_route('api', '/user', [
    'methods' => WP_REST_Server::READABLE,
    'callback' => 'api_user_get'
  ]);
}

add_action('rest_api_init', 'register_api_user_get');
?>