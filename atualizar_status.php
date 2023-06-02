<?php

require_once 'dao/representanteDao.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $statusAtualizado = atualiza_status($id, $status);

    if ($statusAtualizado) {
        http_response_code(200);
        header('Location: views/home.php');
        exit;
    } else {
        http_response_code(500);
        echo "Erro ao atualizar o status.";
    }
}
