<?php

require_once 'dao/representanteDao.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['username'];
    $address = $_POST['endereco'];
    $fone = $_POST['telefone'];
    $email = $_POST['email'];
    $document = $_POST['campoDocumento'];
    $state = $_POST['uf'];
    $password = $_POST['password'];

    $representante = lista_representante();
    $showAlert = false;

    foreach ($representante as $value) {
        if (in_array($document, $value) || in_array($email, $value) || in_array($fone, $value)) {
            $showAlert = true;
            break;
        }
    }

    if ($showAlert) {
        echo "<script>alert('Já existe um representante salvo com estes dados.');</script>";
        echo "<script>window.location.href = 'views/cadastro_rep.php';</script>";
        exit();
    }

    $emailValido = validarEmail($email);

    if (!$emailValido) {
        echo "<script>alert('Email inválido!');</script>";
        echo "<script>window.location.href = 'views/cadastro_rep.php';</script>";
        exit();
    }

    insere_representante($name, $address, $fone, $email, $document, $state, $password);
    header("Location: views/cadastro_realizado.php");

    exit();
}

function validarEmail($email)
{
    $apiKey = '5ee9fb16cc8b2df4bbda2b9d210fc9de';

    $url = "http://apilayer.net/api/check?access_key={$apiKey}&email={$email}";

    $response = file_get_contents($url);

    $result = json_decode($response);

    if ($result->format_valid && $result->smtp_check) {
        echo true;
    } else {
        echo false;
    }
}
