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
  <div class="principal">
    <div class="container">
      <a href="../index.php">Voltar</a>
      <h2>Recuperar Senha</h2>
      <form method="post" action="confirm_token.php">
        <span>Insira seu telefone para receber um código de verificação</span><br><br>
        <div id="warning-alert" class="alert alert-warning" role="alert" style="display: none;"></div>
        <input type="text" id="telefone" name="telefone" required placeholder='Insira o número de telefone com DDD'>
        <input type="submit" class="btn btn-success" value="Enviar">
    </form>
  </div>
</div>
<script src="../assets/js/cadastro_representante.js"></script>
<script src="../assets/js/validateError.js"></script>
</body>
</html>