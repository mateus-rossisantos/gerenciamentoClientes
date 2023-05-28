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

    insere_representante($name, $address, $fone, $email, $document, $state, $password);

    echo "Representante cadastrado com sucesso!";

    header("Location: views/cadastro_realizado.php");
    exit;
}
