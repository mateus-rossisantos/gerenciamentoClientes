<?php
require_once 'dao/representanteDao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   session_start();
   $document = $_SESSION['CPFCNPJ'];
   $password = $_POST['password'];

   if (atualiza_senha($document, $password)) {

      echo "<script language='javascript' type='text/javascript'>
      alert('Senha Alterada!');window.location
      .href='login.php';</script>";
   } else {

      echo "<script language='javascript' type='text/javascript'>
      alert('Erro ao alterar Senha!');window.location
      .href='login.php';</script>";
   }
}
