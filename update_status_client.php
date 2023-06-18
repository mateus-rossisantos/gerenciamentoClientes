<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    require_once 'dao/clienteDao.php';

    $representante = $_SESSION['representante_id'];
    $status_client = $_POST['status'];
    $id_client = $_POST['spanId'];

    $statusAtualizado = atualiza_status($id_client, $status_client);

    if ($statusAtualizado) {
        echo 'Status alterado com sucesso!';
        exit;
    } else {
        echo "Erro ao atualizar o status.";
    }
}