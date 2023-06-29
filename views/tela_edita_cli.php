<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../assets/css/cadastro_cliente.css">
  <title>Cadastro Cliente</title>
</head>

<body>
  <?php
  if (isset($_GET['userid'])) {
    $cliente = $_GET['userid'];
    session_start();
    $_SESSION['userid'] = $cliente;
  }
  include '../dao/clienteDao.php';
  $cli = busca_cliente_por_id($cliente);
  $nome = $cli['name'];
  $responsavel = $cli['responsible'];
  $endereco = $cli['address'];
  $cidade = $cli['city'];
  $telefone1 = $cli['phone1'];
  $telefone2 = $cli['phone2'];
  $email = $cli['email'];
  $documento = $cli['cnpj'];
  $regiao = $cli['state'];
  $cep = $cli['zip_code'];
  $repId = $cli['repId'];
  ?>
  <div class="principal">
    <div class="container">
      <a href="home_representante.php">Voltar</a>
      <h2>Edição de Cliente:</h2>
      <form action="../edita_cliente.php" method="post">
        <label for="company" class="required-label">Razão Social:</label>
        <input type="text" id="company" name="company" value="<?php echo $nome; ?>" required placeholder=''>

        <label for="username" class="required-label">Responsável:</label>
        <input type="text" id="username" name="username" value="<?php echo $responsavel; ?>" required placeholder=''>

        <label for="cnpj" class="required-label">CNPJ:</label>
        <input type="text" id="cnpj" name="cnpj" value="<?php echo $documento; ?>" required placeholder=''>

        <label for="email" class="required-label">E-mail:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required placeholder=''>

        <label for="telefone1" class="required-label">Telefone 1:</label>
        <input type="text" id="telefone1" name="telefone1" value="<?php echo $telefone1; ?>" required placeholder=''>

        <label for="telefone2">Telefone 2:</label>
        <input type="text" id="telefone2" name="telefone2" value="<?php echo $telefone2; ?>" required placeholder=''>

        <label for="cep" class="required-label">CEP:</label>
        <input type="text" id="cep" name="cep" value="<?php echo $cep; ?>" required placeholder=''>

        <label for="endereco" class="required-label">Endereço:</label>
        <input type="text" id="endereco" name="endereco" value="<?php echo $endereco; ?>" required placeholder=''>

        <label for="city" class="required-label">Cidade:</label>
        <input type="text" id="city" name="city" value="<?php echo $cidade; ?>" required placeholder=''>

        <label for="estado">Estado:</label>
        <select id="uf" name="uf" value="<?php echo $regiao; ?>" required>
          <option value="<?php echo $regiao; ?>"><?php echo $regiao; ?></option>
          <option value="AC">Acre</option>
          <option value="AL">Alagoas</option>
          <option value="AP">Amapá</option>
          <option value="AM">Amazonas</option>
          <option value="BA">Bahia</option>
          <option value="CE">Ceará</option>
          <option value="DF">Distrito Federal</option>
          <option value="ES">Espírito Santo</option>
          <option value="GO">Goiás</option>
          <option value="MA">Maranhão</option>
          <option value="MT">Mato Grosso</option>
          <option value="MS">Mato Grosso do Sul</option>
          <option value="MG">Minas Gerais</option>
          <option value="PA">Pará</option>
          <option value="PB">Paraíba</option>
          <option value="PR">Paraná</option>
          <option value="PE">Pernambuco</option>
          <option value="PI">Piauí</option>
          <option value="RJ">Rio de Janeiro</option>
          <option value="RN">Rio Grande do Norte</option>
          <option value="RS">Rio Grande do Sul</option>
          <option value="RO">Rondônia</option>
          <option value="RR">Roraima</option>
          <option value="SC">Santa Catarina</option>
          <option value="SP">São Paulo</option>
          <option value="SE">Sergipe</option>
          <option value="TO">Tocantins</option>
          <option value="EX">Estrangeiro</option>
        </select>
        <br><br>

        <input type="submit" value="Salvar">
      </form>
    </div>
  </div>
  <script src="../assets/js/cadastro_cliente.js"></script>
</body>

</html>