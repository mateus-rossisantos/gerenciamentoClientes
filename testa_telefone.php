<?php

require_once 'dao/representanteDao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $telefone = $_POST['telefone'];
   session_start();
   $document = $_SESSION['campoDocumento'];


   if (testa_telefone($telefone,$document)) {

      echo "<script language='javascript' type='text/javascript'>
      window.location.href='views/tela_nova_senha.php';</script>";
   } else {
      echo "<script language='javascript' type='text/javascript'>
      alert('Telefone não encontrado!');window.location
      .href='views/login.php';</script>";
   }
}