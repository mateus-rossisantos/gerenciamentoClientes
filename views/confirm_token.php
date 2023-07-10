<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/tela_recupera_senha.css">
    <title>Recupera Senha</title>
</head>
<body>
<?php

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

require_once '../dao/representanteDao.php';
require_once '../dao/tokenDao.php';
require_once '../generate_token.php';
require_once '../vendor/autoload.php';

session_start();

$form = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$user_phone = $form['telefone'];
$representante = busca_representante_por_telefone($user_phone);

if (isset($representante)) {
    
    $token = generate_token();
    $number = preg_replace('/\D/', '', $user_phone);
 
    //-------------------------------- envio de sms com a API Infobip
    // $client = new Client([
    //     'base_uri' => "https://ej6vm3.api.infobip.com/",
    //     'headers' => [
    //         'Authorization' => "App 30b38a167c05c2ea5a8864c0cb140b05-d31a9f11-1e25-4d9c-80cf-e43be6a8a46e",
    //         'Content-Type' => 'application/json',
    //         'Accept' => 'application/json',
    //     ]
    // ]);

    // $response = $client->request(
    //     'POST',
    //     'sms/2/text/advanced',
    //     [
    //         RequestOptions::JSON => [
    //             'messages' => [
    //                 [
    //                     'from' => 'InfoSMS',
    //                     'destinations' => [
    //                         ['to' => "55$number"]
    //                     ],
    //                     'text' => "Este é o seu código de verificação: $token",
    //                 ]
    //             ]
    //         ],
    //     ]
    // );
    // // var_dump($response->getBody()->getContents());exit();

    // if ($response->getStatusCode() == 200) {

    //     if (!check_if_table_exist()) {
    //         create_table_token();
    //     }

    //     $has_tokent = get_token_by_id($_SESSION['user_id']);
    //     if ($has_tokent) {
    //         delete_token($_SESSION['user_id']);
    //     }

    //     insert_token($representante['id'], $user_phone, $token);

        ?>
            <div class="principal">
            <div class="container">
                <a href="../index.php">início</a>
                <h2>Insira o código</h2>
                <div id="temporizador">3:00</div>
                <input type="text" name="token" id="token" class="campo-invisivel" data-id="<?=$representante['id']?>" required>
                <input type="submit" value="Enviar" id="enviar-btn">
                <div id="resultado" class="alert alert-success" role="alert">
            </div>
            </div>
            <script src="../assets/js/cadastro_representante.js"></script>
            <script src="../assets/js/temporizador.js"></script>
            
        <?php
    // } else {
    //     session_unset();
    //     session_destroy();
    //     $erro = urlencode('Ocorreu um erro no seu processamento. Entre em contato com o administrador do site');
    //     header('Location: tela_recupera_senha.php?erro=' . $erro);
    // }
    //--------------------------------

} else {
    session_unset();
    session_destroy();
    $erro = urlencode('Telefone inválido');
    header('Location: tela_recupera_senha.php?erro=' . $erro);
}

?>

</body>
</html>