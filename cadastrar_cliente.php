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
    $showAlert = false;

    foreach ($cliente as $value) {
        if (in_array($cnpj, $value) || in_array($email, $value) || in_array($phone1, $value)) {

            $showAlert = true;
            break;
        }
    }

    if ($showAlert || !validarCNPJ($cnpj)) {
        echo "<script>alert('O cliente já existe, ou os dados estão incorretos.');</script>";
        echo "<script>window.location.href = 'views/cadastro_cliente.php';</script>";
        exit();
    }

    $id = insere_cliente($name, $responsible, $cnpj, $email, $phone1, $phone2, $address, $city, $state, $cep, $repId);

    header("Location: index.php");
    exit;
}


function validarCNPJ($cnpj) {
    $cnpj = preg_replace('/\D/', '', $cnpj);

    // Verifica se todos os dígitos são iguais (situação inválida)
    if (preg_match('/^(\d)\1+$/', $cnpj)) {
        return false;
    }

    // Verifica o tamanho do CNPJ
    if (strlen($cnpj) !== 14) {
        return false;
    }

    // Verifica os dígitos verificadores
    $tamanho = strlen($cnpj) - 2;
    $numeros = substr($cnpj, 0, $tamanho);
    $digitos = substr($cnpj, $tamanho);
    $soma = 0;
    $pos = $tamanho - 7;
    $resultado = 0;

    for ($i = $tamanho; $i >= 1; $i--) {
        $soma += $numeros[$tamanho - $i] * $pos--;
        if ($pos < 2) {
            $pos = 9;
        }
    }

    $resultado = $soma % 11 < 2 ? 0 : 11 - ($soma % 11);

    if ($resultado != $digitos[0]) {
        return false;
    }

    $tamanho += 1;
    $numeros = substr($cnpj, 0, $tamanho);
    $soma = 0;
    $pos = $tamanho - 7;

    for ($i = $tamanho; $i >= 1; $i--) {
        $soma += $numeros[$tamanho - $i] * $pos--;
        if ($pos < 2) {
            $pos = 9;
        }
    }

    $resultado = $soma % 11 < 2 ? 0 : 11 - ($soma % 11);

    if ($resultado != $digitos[1]) {
        return false;
    }

    return true;
}