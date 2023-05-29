<?php

require_once 'dao/representanteDao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $document = $_POST['CPFCNPJ'];

   session_start();
   $_SESSION['CPFCNPJ'] = $document;

   if (testa_cpf($document)) {

      echo "<script language='javascript' type='text/javascript'>
      window.location.href='views/tela_nova_senha.php';</script>";
   } else {
      echo "<script language='javascript' type='text/javascript'>
      alert('CPF não encontrado!');window.location
      .href='views/tela_recupera_senha.html';</script>";
   }
}
