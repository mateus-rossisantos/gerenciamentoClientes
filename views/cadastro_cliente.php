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
  <div class="principal">
    <div class="container">
      <a href="../index.php">Voltar</a>
      <h2>Cadastro de Cliente:</h2>
      <form action="../cadastrar_cliente.php" method="post">
        <label for="company" class="required-label">Razão Social:</label>
        <input type="text" id="company" name="company" required placeholder='Insira a razão social da empresa'>

        <label for="username" class="required-label">Responsável:</label>
        <input type="text" id="username" name="username" required placeholder='Insira o nome do responsável pelo cliente'>

        <label for="cnpj" class="required-label">CNPJ:</label>
        <input type="text" id="cnpj" value="" required name="cnpj" placeholder='Insira o CNPJ do cliente'>

        <label for="email" class="required-label">E-mail:</label>
        <input type="email" id="email" name="email" required placeholder='Insira seu melhor email'>

        <label for="telefone1" class="required-label">Telefone 1:</label>
        <input type="text" id="telefone1" name="telefone1" required placeholder='Insira o número de telefone com DDD'>

        <label for="telefone2">Telefone 2:</label>
        <input type="text" id="telefone2" name="telefone2" placeholder='Insira o número de telefone com DDD'>

        <label for="cep" class="required-label">CEP:</label>
        <input type="text" id="cep" value="" required name="cep" placeholder='Insira o CEP do cliente'>

        <label for="endereco" class="required-label">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required placeholder='Digite o endereço do cliente'>

        <label for="city" class="required-label">Cidade:</label>
        <input type="text" id="city" name="city" required placeholder='Insira a cidade do cliente'>

        <label for="estado">Estado:</label>
        <select id="uf" name="uf" required>
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

        <input type="submit" value="Cadastrar">
      </form>
    </div>
  </div>
  <script src="../assets/js/cadastro_cliente.js"></script>
</body>

</html>