<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" type="text/css" href="../assets/css/cadastro_rep.css">
    <title>Tela Login</title>
</head>
<body>
  <div class="principal">
    <div class="container">
    <h2>Cadastro de Representante:</h2>
      <form action="../cadastrar_representante.php" method="post">
        <label for="username" class="required-label">Nome:</label>
        <input type="text" id="username" name="username" required placeholder='Insira o nome completo'>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" placeholder='Digite seu endereço'>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" placeholder='Insira o número de telefone com DDD'>

        <label for="email" class="required-label">E-mail:</label>
        <input type="email" id="email" name="email" required placeholder='Insira seu melhor email'>
        <div class="cpf-or-cnpj-radios">
          <label for="cpf">CPF</label>
          <input type="radio" id="cpf" name="tipoDocumento" value="cpf" required onchange="showField()"> 
          <label for="cnpj" class="required-label-cpf">CNPJ</label>
          <input type="radio" id="cnpj" name="tipoDocumento" value="cnpj" onchange="showField()">
        </div>
        <!-- <label for="campoDocumento"></label> -->
        <input type="text" id="campoDocumento" class="campo-invisivel" required disabled>

        <label for="regioes">Regiões:</label>
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

        <label for="password" class="required-label">Senha:</label>
        <input type="password" id="password" placeholder="Digite a senha" name="password" required minlength="5">
        <input type="password" id="password-confirm" placeholder="Confirme a senha" name="password" required minlength="5">
        <br>
       <input type="submit" value="Cadastrar">
      </form>
    </div>
  </div>
  <script src="../assets/js/cadastro_representante.js"></script>
</body>
</html>