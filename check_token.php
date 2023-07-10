<?php

require_once 'dao/tokenDao.php';
$codigo = $_POST['codigo'];
$user_id = $_POST['usuario'];

session_start();
$_SESSION['user'] = true;
$_SESSION['user_id'] = $user_id;

$user = get_token_by_id($user_id);

if ($codigo === $user['token']) {
    $resposta = "Success";

} else {
    $resposta = "Error";
}
        
$response = json_encode($resposta);
echo $response;