<?php
require_once 'dao/representanteDao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   session_start();
   $user_id = $_SESSION['user_id'];

   $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);
   $password = $form['password'];

   if (atualiza_senha($user_id, $password)) {

      echo "<script language='javascript' type='text/javascript'>
      alert('Senha Alterada!');window.location
      .href='views/login.php';</script>";
      session_unset();
      session_destroy();

   } else {
      echo "<script language='javascript' type='text/javascript'>
      alert('Erro ao alterar Senha!');window.location
      .href='views/login.php';</script>";
      session_unset();
      session_destroy();

   }
}
