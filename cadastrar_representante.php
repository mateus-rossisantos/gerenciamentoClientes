<?php

require_once 'representanteDao.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['username'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $documento = $_POST['CPFCNPJ'];
    $estado = $_POST['uf'];
    $password = $_POST['password'];

    insere_representante($name, $endereco, $telefone, $email, $documento, $estado, $password);

    echo "Representante cadastrado com sucesso!";

    header("Location: tela_login.html");
    exit;
}
