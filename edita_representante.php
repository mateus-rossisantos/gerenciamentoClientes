<?php
include_once './dao/representanteDao.php';
$doc = 1;
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
    .href='./views/home.php';</script>";
    //header("location: login.html");
} else {
    echo"<script language='javascript' type='text/javascript'>
    alert('Erro ao Alterar Representante!!!');window.location
    .href='./views/home.php';</script>";
    //header("location: cadastrodoador.html?msg=Erro ao inserir Doador");
}