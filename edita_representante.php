<?php
include_once './dao/representanteDao.php';
session_start();
$doc = $_SESSION['userid'];
$nome = $_POST['username'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$documento = $_POST['campoDocumento'];
$regiao = $_POST['uf'];
$senha = password_hash($_POST['password'], PASSWORD_DEFAULT);


if (alteraRepresentante($doc,$nome,$endereco,$telefone,$email,$documento,$regiao,$senha)) {
    echo"<script language='javascript' type='text/javascript'>
    alert('Representante Alterado!!!');window.location
    .href='views/home_admin.php';</script>";
    
} else {
    echo"<script language='javascript' type='text/javascript'>
    alert('Erro ao Alterar Representante!!!');window.location
    .href='views/home_admin.php';</script>";
}