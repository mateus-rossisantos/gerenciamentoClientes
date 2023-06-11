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
    // Verifique se o representante está autenticado e se as informações estão disponíveis na sessão
    session_start();
    if (isset($_SESSION['representante_id']) && isset($_SESSION['representante_name']) && isset($_SESSION['representante_status']) && isset($_SESSION['representante_email'])) {
        $representanteId = $_SESSION['representante_id'];
        $representanteName = $_SESSION['representante_name'];
        $representanteStatus = $_SESSION['representante_status'];
        $representanteEmail = $_SESSION['representante_email'];

        require_once '../dao/representanteDao.php';
        $representantes = lista_representante();
    ?>
        <!-- conteúdo que está acima da tabela -->
        <div class="user-links">
            <a href="#" class="mr-2">Meu perfil</a>
            <a class="mr-2">|</a>
            <a href="../logout.php">Sair</a>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <img src="../assets/img/vineicon.jpeg" alt="vine image" class="mr-2">
            </div>
            <div>
                <button class="btn btn-primary mr-2">Representantes</button>
                <button class="btn btn-primary">Clientes</button>
            </div>

            <!-- campo de busca -->
            <form class="form-inline">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Pesquisar">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- tabela -->
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Status</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($representantes as $value) : ?>
                    <tr>
                        <td><?= $value['name'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><?= $value['phone'] ?></td>
                        <td><?= $value['state'] ?></td>

                        <?$_SESSION['id'] = $value['id'];?>

                        <td>
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
                        <td>
                            <button type="button" class="btn btn-info btn-sm"  onclick = tela_edita_rep();>
                                <i class="fas fa-edit"></i> Editar
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Excluir
                            </button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <div class="floating-button">
            <button type="button" class="btn btn-primary btn-floating">
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
    
    <script src="../assets/js/update_status.js"></script>
    <script src="../assets/js/cadastro_representante.js"></script>
</body>

</html>