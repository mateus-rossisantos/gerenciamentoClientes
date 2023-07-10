<?php

require_once 'dao/representanteDao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $document = $_POST['campoDocumento'];

   session_start();
   $_SESSION['campoDocumento'] = $document;

   if (testa_cpf($document)) {

      echo "<script language='javascript' type='text/javascript'>
      window.location.href='views/tela_testa_telefone.html';</script>";
   } else {
      echo "<script language='javascript' type='text/javascript'>
      alert('CPF não encontrado!');window.location
      .href='views/tela_recupera_senha.php';</script>";
   }
}
