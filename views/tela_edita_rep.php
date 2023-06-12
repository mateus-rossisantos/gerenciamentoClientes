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
<?php
if (isset($_GET['userid'])) {
  $representante = $_GET['userid'];
}
      include '../dao/representanteDao.php';
      $rep= busca_representante_por_id($representante);
      $nome = $rep['name'];
      $endereco = $rep['address'];
      $telefone = $rep['phone'];
      $email = $rep['email'];
      $documento = $rep['document'];
      $regiao = $rep['state'];
      $senha = $rep['password'];
      $novasenha = $rep['password'];
    ?>
  <div class="principal">
    <div class="container">
    <h2>Edição de Representante:</h2>
      <form action="../edita_representante.php" method="post">
        <label for="username" class="required-label">Nome:</label>
        <input type="text" id="username" name="username"  value="<?php echo $nome; ?>" required placeholder=''>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" value="<?php echo $endereco; ?>" placeholder=''>

        <label for="telefone" class="required-label">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?php echo $telefone; ?>" required placeholder='Insira o número de telefone com DDD'>

        <label for="email" class="required-label">E-mail:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required placeholder=''>
        <div class="cpf-or-cnpj-radios">
          <label for="cpf">CPF</label>
          <input type="radio" id="cpf" name="tipoDocumento" value="cpf"  onchange="showField()"> 
          <label for="cnpj" class="required-label-cpf">CNPJ</label>
          <input type="radio" id="cnpj" name="tipoDocumento" value="cnpj" onchange="showField()">
        </div>
        <input type="text" id="campoDocumento" class="campo-invisivel"  value="<?php echo $documento; ?>" name="campoDocumento" required>

        <label for="regioes">Regiões:</label>
        <select id="uf" name="uf"  value="<?php echo $regiao; ?>" required>
          <option value="<?php echo $regiao; ?>"><?php echo $regiao;?></option>
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
        <input type="password" id="password" value="<?php echo $senha; ?>" placeholder="" name="password"  minlength="5">
        <input type="password" id="password-confirm"  value="<?php echo $senha; ?>" placeholder="" name="password"  minlength="5">
        <br>
       <input type="submit" value="Editar">
      </form>
    </div>
  </div>
  <script src="../assets/js/cadastro_representante.js"></script>
</body>
</html>