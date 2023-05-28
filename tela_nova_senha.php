<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" type="text/css" href="assets/css/tela_nova_senha.css">
    <title>Tela Nova Senha</title>
</head>
<body>
  <div class="principal">
    <div class="container">
     <h2>Nova Senha</h2>
       <form action="altera_senha.php" method="post">
        <label for="password">Nova Senha:</label>
        <input type="password" placeholder="Senha" id="password" name="password" required>
        <br>
        <label for="password">Confirmar Nova Senha:</label>
        <input type="password" placeholder="Confirme Senha" id="confirm_password" required>
      
       <input type="submit" value="Alterar">

      </form>
  </div>
</div>
<script src="./js/master.js"></script>
</body>
</html>