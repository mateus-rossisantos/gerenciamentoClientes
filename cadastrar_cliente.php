<?php

require_once 'dao/clienteDao.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['company'];
    $responsible = $_POST['username'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $phone1 = $_POST['telefone1'];
    $phone2 = $_POST['telefone2'];
    $address = $_POST['endereco'];
    $city = $_POST['city'];
    $state = $_POST['uf'];
    $cep = $_POST['cep'];

    session_start();
    $repId = $_SESSION['representante_id'];

    $id = insere_cliente($name, $responsible, $cnpj, $email, $phone1, $phone2, $address, $city, $state, $cep, $repId);

    echo "Cliente cadastrado com sucesso!";

    header("Location: index.php");
    exit;
}
