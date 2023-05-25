<?php

require_once 'dao/representanteDao.php';

// Função para exibir uma mensagem de erro e continuar na tela de login
function exibirMensagemErro($mensagem)
{
    // Redirecione o usuário de volta para a tela de login
    header('Location: login.php?erro=' . urlencode($mensagem));
    exit; // Encerre o script para evitar execução adicional indesejada
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $representanteEncontrado = busca_representante_por_email($email);

    if ($representanteEncontrado) {
        // O representante foi encontrado
        $passwordBanco = $representanteEncontrado['password'];

        // Verifique se a senha digitada corresponde à senha armazenada
        if (password_verify($password, $passwordBanco)) {
            if ($representanteEncontrado['status'] == 0) {
                exibirMensagemErro("inactive_user");
            }
            session_start();

            // Salve as informações do representante na sessão
            $_SESSION['representante_id'] = $representanteEncontrado['id'];
            $_SESSION['representante_name'] = $representanteEncontrado['name'];
            $_SESSION['representante_status'] = $representanteEncontrado['status'];
            $_SESSION['representante_email'] = $representanteEncontrado['email'];

            // Redirecione para a página "index.php"
            header('Location: index.php');
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
