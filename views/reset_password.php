<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/css/tela_recupera_senha.css">
    <title>Tela Recupera Senha</title>
</head>
<body>
    <?php
    session_start();
    if ($_SESSION['user'] == true) {
    ?>
        <div class="principal">
            <div class="container">
            <a href="../index.php">Cancelar</a>
            <h2>Redefina sua senha</h2>
            <form action="../altera_senha.php" method="post">
                <label for="password" class="required-label">Senha:</label>
                <input type="password" id="password" placeholder="Digite a senha" name="password" required minlength="5">
                <input type="password" id="password-confirm" placeholder="Confirme a senha" name="password" required minlength="5">
                <br>
                <input type="submit" value="Cadastrar">
            </form>
        </div>
        </div>
        <script src="../assets/js/cadastro_representante.js"></script>

    <?php   
    } else {
        header('Location: login.php?');
    }
    ?>
  
</body>
</html>
