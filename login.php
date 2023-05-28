<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="assets/css/tela_login.css">
    <title>Tela Login</title>
</head>

<body>
    <div class="principal">
        <div class="container">
            <h2>Login</h2>
            <form action="verify_login.php" method="post">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" placeholder="Digite seu e-mail">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" placeholder="Digite sua senha">
                <input type="submit" value="Entrar">
                <a href="tela_recupera_senha.html">Recuperar senha</a>
                <br><br>
                <a href="views/cadastro_rep.php">Cadastrar representante</a>
            </form>
        </div>
    </div>
</body>

</html>

<?php if (isset($_GET['erro'])) : ?>
    <?php if ($_GET['erro'] === 'inactive_user') : ?>
        <script>
            alert('Usuário inativo, procure o administrador do sistema para efetuar a ativação.');
        </script>
    <?php elseif ($_GET['erro'] === 'password_or_user_incorrect') : ?>
        <script>
            var campoEmail = document.getElementById('email');

            // Altera o placeholder do campo de email
            campoEmail.placeholder = 'Usuário ou senha incorretos';
            campoEmail.style.color = 'red';
        </script>
        <style>
            #email,
            #password {
                border: 1px solid red;
            }
        </style>
    <?php endif; ?>
<?php endif; ?>