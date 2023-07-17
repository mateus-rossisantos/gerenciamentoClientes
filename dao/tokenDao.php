<?php

require_once 'conexao.php';

function create_table_token() {
    $conexao = cria_conexao();

    $sql = "
    CREATE TABLE IF NOT EXISTS token (
        user_id INT PRIMARY KEY,
        phone VARCHAR(255) NOT NULL,
        token VARCHAR(255) NOT NULL,
        created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );";

    $stmt = $conexao->prepare($sql);

    $stmt->execute();
}


function insert_token($id, $phone, $token) {
    try {
        $conexao = cria_conexao();

        $dateTime = new DateTime();
        $timestamp = $dateTime->format('Y-m-d H:i:s');

        $sql = "INSERT INTO token (user_id, phone, token, created)
                VALUES (:user_id, :phone, :token, :created)";

        $stmt = $conexao->prepare($sql);

        $stmt->bindValue(':user_id', $id);
        $stmt->bindValue(':phone', $phone);
        $stmt->bindValue(':token', $token);
        $stmt->bindValue(':created', $timestamp);

        $stmt->execute();

        return $conexao->lastInsertId();

    } catch (PDOException $e) {
        print("Error: " . $e->getMessage());
    }
}


function get_token_by_phone($phone) {

    try {
        $conexao = cria_conexao();

        $sql = "SELECT * FROM token WHERE phone = :phone";

        $stmt = $conexao->prepare($sql);

        $stmt->bindValue(':phone', $phone);

        $stmt->execute();

        $user_token = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_shift($user_token);

    } catch (PDOException $e) {
        print("Error: " . $e->getMessage());
    }
}


function get_token_by_id($user_id) {

    try {
        $conexao = cria_conexao();

        $sql = "SELECT * FROM token WHERE user_id = :user";

        $stmt = $conexao->prepare($sql);

        $stmt->bindValue(':user', $user_id);

        $stmt->execute();

        $user_token = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_shift($user_token);

    } catch (PDOException $e) {
        print("Error: " . $e->getMessage());
    }
}


function check_if_table_exist() {
    
    try {
        $conexao = cria_conexao();

        $sql = "SHOW TABLES LIKE 'token'";
        $stmt = $conexao->query($sql);
        $tableExists = ($stmt->rowCount() > 0);
        $table_exist = false;

        if ($tableExists) {
            $table_exist = true;
        }

        $stmt->execute();

        return $table_exist;

    } catch (PDOException $e) {
        print("Error: " . $e->getMessage());
    }
    
}

function delete_token($user_id)
{
    try {
        $conexao = cria_Conexao();

        $sql = "DELETE from token WHERE user_id =?";

        $stmt = $conexao->prepare($sql);

        $stmt->execute([$user_id]);

        $conexao = null;

        return true;
    } catch (PDOException $e) {
        print($e->getMessage());
        die();
    }
}