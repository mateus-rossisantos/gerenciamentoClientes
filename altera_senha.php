<?php
require_once 'dao/representanteDao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $document = $_POST['CPFCNPJ'];
    $password = $_POST['password'];
    echo($document);
    echo($password);
    die();
    
    if(atualiza_senha($document,$password)){

        echo"<script language='javascript' type='text/javascript'>
        alert('Senha Alterada!');window.location
        .href='login.php';</script>";
 
     }else{
 
        echo"<script language='javascript' type='text/javascript'>
        alert('Erro ao alterar Senha!');window.location
        .href='login.php';</script>";
 
     }


}