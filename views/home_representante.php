<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/user_home.css">
    <title>Home</title>
</head>

<body>
    <?php
    // Verifique se o representante está autenticado e se as informações estão disponíveis na sessão
    session_start();
    if (isset($_SESSION['representante_id']) && isset($_SESSION['representante_name']) && isset($_SESSION['representante_status']) && isset($_SESSION['representante_email'])) {
        $representanteId = $_SESSION['representante_id'];
        $representanteName = $_SESSION['representante_name'];
        $representanteStatus = $_SESSION['representante_status'];
        $representanteEmail = $_SESSION['representante_email'];

        require_once '../dao/clienteDao.php';
        $clientes = lista_cliente_por_representante($representanteId);
    ?>
        <div class="user-links">
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
            <div id="hello">
                <h2>Olá <?= $representanteName ?>, seja bem vindo!</h2>
            </div>
        </div>
        <div class="session">
            <div class="message-title">
                <h4>Lista de clientes</h4>
            </div>
            <!-- campo de busca -->
            <form class="form-inline">
                <div class="input-group">
                    <input type="text" class="form-control custom-search-input" placeholder="Pesquisar">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

        </div>
        <span id="message-status" style="display: none;"></span>
        <!-- tabela -->
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
                        <td>
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
                        <td>
                            <button type="button" class="btn btn-info btn-sm" onclick="location.href='tela_edita_cli.php?userid=<?= $value['client_id'] ?>';">
                                <i class="fas fa-edit"></i> Editar
                            </button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <div class="floating-button">
            <button type="button" class="btn btn-primary btn-floating" onclick="location.href='cadastro_cliente.php';">
                <i class="fas fa-plus"></i>
            </button>
        </div>

    <?php
    } else {
        // O representante não está autenticado, redirecione para a tela de login
        header('Location: login.php');
        exit;
    }
    ?>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/js/update_status_client.js"></script>

</html>