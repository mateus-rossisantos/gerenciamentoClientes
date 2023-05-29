<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Página Home</title>
</head>

<body>
    <h1>Bem-vindo à Página Home</h1>

    <?php
    // Verifique se o representante está autenticado e se as informações estão disponíveis na sessão
    session_start();
    if (isset($_SESSION['representante_id']) && isset($_SESSION['representante_name']) && isset($_SESSION['representante_status']) && isset($_SESSION['representante_email'])) {
        $representanteId = $_SESSION['representante_id'];
        $representanteName = $_SESSION['representante_name'];
        $representanteStatus = $_SESSION['representante_status'];
        $representanteEmail = $_SESSION['representante_email'];

        echo "<p>ID do Representante: $representanteId</p>";
        echo "<p>Nome do Representante: $representanteName</p>";
        echo "<p>Status do Representante: $representanteStatus</p>";
        echo "<p>Email do Representante: $representanteEmail</p>";
    } else {
        // O representante não está autenticado, redirecione para a tela de login
        header('Location: views/login.php');
        exit;
    }
    ?>

    <!-- Aqui você pode adicionar o conteúdo da página home -->
    <!-- ... -->

    <a href="logout.php">Sair</a> <!-- Link para a página de logout -->

</body>

</html>