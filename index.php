<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <title>Lista Alunos</title>
</head>
<?php

require_once  'representanteDao.php';

//TELA DE TESTE DE CONEXÃO COM O BANCO E INSERÇÃO DE ALUNO

insere_representante('Fulano de Tal', 'fulano@teste.com', "123456");

// atualiza_aluno(33, 'Fulano', 'fulano@teste.com');

// remove_aluno(34);

// $aluno_20 = busca_aluno_por_id(20);
// print_r($aluno_20);

$representantes = lista_representante();
?>

<body>
    <div class="container">
        <h1>Representante</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Senha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($representantes as $representante) : ?>
                    <tr>
                        <td><?= $representante['id'] ?></td>
                        <td><?= $representante['name'] ?></td>
                        <td><?= $representante['email'] ?></td>
                        <td><?= $representante['password'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>