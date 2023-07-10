<?php

require_once 'dao/representanteDao.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['username'];
    $address = $_POST['endereco'];
    $fone = $_POST['telefone'];
    // $fone = preg_replace('/\D/', '', $_POST['telefone']);
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

    insere_representante($name, $address, $fone, $email, $document, $state, $password);
    header("Location: views/cadastro_realizado.php");

    exit();
}
