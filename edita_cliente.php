<?php
include_once './dao/clienteDao.php';
session_start();
$doc = $_SESSION['userid'];
$nome = $_POST['company'];
$responsavel = $_POST['username'];
$endereco = $_POST['endereco'];
$cidade = $_POST['city'];
$telefone1 = $_POST['telefone1'];
$telefone2 = $_POST['telefone2'];
$email = $_POST['email'];
$documento = $_POST['cnpj'];
$regiao = $_POST['uf'];
$cep = $_POST['cep'];



if (alteraCliente($doc,$nome,$responsavel,$endereco,$cidade,$telefone1,$telefone2,$email,$documento,$regiao,$cep)) {
    echo"<script language='javascript' type='text/javascript'>
    alert('Cliente Alterado!!!');window.location
    .href='views/home_representante.php';</script>";
    
} else {
    echo"<script language='javascript' type='text/javascript'>
    alert('Erro ao Alterar Cliente!!!');window.location
    .href='views/home_representante.php';</script>";
}
