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
      <?php
        // Verifica se o parâmetro 'erro' foi enviado na url
        if(isset($_GET['erro'])) {
            $mensagemErro = urldecode($_GET['erro']);
            ?>
            <div class="alert alert-warning" role="alert">
              <?=$mensagemErro?>
            </div>
            <?php
        }
        ?>

      <form method="post" action="confirm_token.php">
        <span>Insira seu telefone para receber um código de verificação</span><br><br>
        <input type="text" id="telefone" name="telefone" required placeholder='Insira o número de telefone com DDD'>
        <input type="submit" value="Enviar">
    </form>
  </div>
</div>
<script src="../assets/js/cadastro_representante.js"></script>
</body>
</html>




       <!-- <form action="../testa_cpf.php" method="post">
        <label for="tipoDocumento">Digite seu CPF ou CNPJ:</label>
        <div class="cpf-or-cnpj-radios">
          <label for="cpf">CPF</label>
          <input type="radio" id="cpf" name="tipoDocumento" value="cpf" required onchange="showField()"> 
          <label for="cnpj" class="required-label-cpf">CNPJ</label>
          <input type="radio" id="cnpj" name="tipoDocumento" value="cnpj" onchange="showField()">
        </div>
        <input type="text" id="campoDocumento" class="campo-invisivel" value="" name="campoDocumento">
       <input type="submit" value="Recuperar Senha">
      </form> -->