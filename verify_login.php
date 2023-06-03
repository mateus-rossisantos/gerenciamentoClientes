<?php

require_once 'dao/representanteDao.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $logged_user = busca_representante_por_email($email);

    if ($logged_user) {
        // O representante foi encontrado
        $passwordBanco = $logged_user['password'];

        // Verifique se a senha digitada corresponde à senha armazenada
        if (password_verify($password, $passwordBanco)) {
            if ($logged_user['status'] == 0) {
                exibirMensagemErro("inactive_user");
            }
            session_start();

            // Salve as informações do representante na sessão
            $_SESSION['representante_id'] = $logged_user['id'];
            $_SESSION['representante_name'] = $logged_user['name'];
            $_SESSION['representante_status'] = $logged_user['status'];
            $_SESSION['representante_email'] = $logged_user['email'];

            // Redirecione para a página "index.php"
            if($logged_user['status'] == 2) {
                header('Location: views/home.php');
            } else {
                header('Location: views/homeRepresentante.php');
            }
            exit;
        } else {
            // Senha incorreta
            exibirMensagemErro("password_or_user_incorrect");
        }
    } else {
        // O representante não foi encontrado
        exibirMensagemErro("password_or_user_incorrect");
    }
}

// Função para exibir uma mensagem de erro e continuar na tela de login
function exibirMensagemErro($mensagem)
{
    // Redirecione o usuário de volta para a tela de login
    header('Location: views/login.php?erro=' . urlencode($mensagem));
    exit; // Encerre o script para evitar execução adicional indesejada
}
