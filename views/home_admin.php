<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/user_home.css">
    <title>Home</title>
</head>

<body>
    <?php
    $cliente = false;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['botao_true'])) {
            $cliente = true;
        } elseif (isset($_POST['botao_false'])) {
            $cliente = false;
        }
    }
    // Verifique se o representante está autenticado e se as informações estão disponíveis na sessão
    session_start();
    if (isset($_SESSION['representante_id']) && isset($_SESSION['representante_name']) && isset($_SESSION['representante_status']) && isset($_SESSION['representante_email'])) {
        $representanteId = $_SESSION['representante_id'];
        $representanteName = $_SESSION['representante_name'];
        $representanteStatus = $_SESSION['representante_status'];
        $representanteEmail = $_SESSION['representante_email'];
        if (!$cliente) {
            require_once '../dao/representanteDao.php';
            $representantes = lista_representante();
        } else {
            require_once '../dao/clienteDao.php';
            $clientes = lista_cliente();
        }

    ?>
        <!-- conteúdo que está acima da tabela -->
        <div class="user-links">
            <div id="hello">
                <h2>Olá <?= $representanteName ?>, seja bem vindo a área administrativa!</h2>
            </div>
            <div id="links">
                <a href="#" class="mr-2">Meu perfil</a>
                <a class="mr-2">|</a>
                <a href="../logout.php">Sair</a>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <img src="../assets/img/vineicon.png" alt="vine image" class="mr-2">
            </div>

            <div>
                <form method="post" action="">
                    <button name="botao_false" <?php if ($cliente) { ?>class="btn btn-secondary mr-2" <?php } else { ?>class="btn btn-primary mr-2" <?php } ?>>
                        Representantes
                    </button>
                    <button name="botao_true" <?php if ($cliente) { ?>class="btn btn-primary" <?php } else { ?>class="btn btn-secondary" <?php } ?>>
                        Clientes
                    </button>
                </form>
            </div>

            <!-- campo de busca -->
            <form class="form-inline">
                <div class="input-group">
                    <input type="text" class="form-control custom-search-input" id="searchInput" onkeyup="searchElements()" placeholder="Pesquisar">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <span id="message-status" style="display: none;"></span>
        <?php if ($cliente) { ?>
            <!-- tabela cliente -->
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Responsável</th>
                        <th scope="col">Status</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Representante</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $value) : ?>
                        <tr>
                            <td><?= $value['name'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><?= $value['phone1'] ?></td>
                            <td><?= $value['city'] ?></td>
                            <td><?= $value['state'] ?></td>
                            <td><?= $value['responsible'] ?></td>
                            <td id="select-status">
                                <select id="statusSelect">
                                    <option value="0" <?php if ($value['status'] == 0) {
                                                            echo 'selected';
                                                        } ?>>Inativo</option>
                                    <option value="1" <?php if ($value['status'] == 1) {
                                                            echo 'selected';
                                                        } ?>>Ativo</option>
                                </select>
                                <span id="<?= $value['client_id'] ?>" style="display: none;"></span>
                            </td>
                            <td id="btn-editar">
                                <button type="button" class="btn btn-info btn-sm" onclick="location.href='#?userid=<?= $value['client_id'] ?>';">
                                    <i class="fas fa-edit"></i> Editar
                                </button>
                            </td>
                            <td><?= $value['repId'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php } else { ?>
            <!-- tabela representante -->
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Status</th>
                        <th scope="col">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($representantes as $value) : ?>
                        <tr>
                            <td><?= $value['name'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><?= $value['phone'] ?></td>
                            <td><?= $value['state'] ?></td>

                            <? $_SESSION['id'] = $value['id']; ?>

                            <td id="select-status">
                                <select onchange="atualizarStatus(this.value, <?= $value['id'] ?>)">
                                    <option value="0" <?php if ($value['status'] == 0) {
                                                            echo 'selected';
                                                        } ?>>Inativo</option>
                                    <option value="1" <?php if ($value['status'] == 1) {
                                                            echo 'selected';
                                                        } ?>>Ativo</option>
                                    <option value="2" <?php if ($value['status'] == 2) {
                                                            echo 'selected';
                                                        } ?>>Adm</option>
                                </select>
                            </td>
                            <td id="btn-editar">
                                <button type="button" class="btn btn-info btn-sm" onclick="location.href='tela_edita_rep.php?userid=<?= $value['id'] ?>';">
                                    <i class="fas fa-edit"></i> Editar
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php } ?>
        <div class="floating-button">
            <?php if ($cliente) { ?>
                <button type="button" class="btn btn-primary btn-floating" onclick="location.href='cadastro_cliente.php';">
                    <i class="fas fa-plus"></i>
                </button>
            <?php } else { ?>
                <button type="button" class="btn btn-primary btn-floating" onclick="location.href='cadastro_rep.php';">
                    <i class="fas fa-plus"></i>
                </button>
            <?php } ?>
        </div>

    <?php
    } else {
        // O representante não está autenticado, redirecione para a tela de login
        header('Location: login.php');
        exit;
    }
    ?>

    <script src="../assets/js/update_status.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/update_status_client.js"></script>
    <script src="../assets/js/search.js"></script>

</body>

</html>