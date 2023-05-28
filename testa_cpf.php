<?php

require_once 'dao/representanteDao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $document = $_POST['CPFCNPJ'];

    if(testa_cpf($document)){

       echo"<script language='javascript' type='text/javascript'>
       alert('CPF encontrado!');window.location
       .href='tela_nova_senha.php';</script>";

    }else{

       echo"<script language='javascript' type='text/javascript'>
       alert('CPF não encontrado!');window.location
       .href='login.php';</script>";

    }
}