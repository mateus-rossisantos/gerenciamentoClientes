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

    $cliente = lista_cliente();

    foreach ($cliente as $value) {
        if (in_array($cnpj, $value) || in_array($email, $value) || in_array($phone1, $value)) {

            header('Location: views/cadastro_cliente.php');
            exit();
        }
    }



    $id = insere_cliente($name, $responsible, $cnpj, $email, $phone1, $phone2, $address, $city, $state, $cep, $repId);

    header("Location: views/cadastro_realizado.php");
    exit;    
        
    
}
