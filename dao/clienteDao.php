<?php

require_once 'conexao.php';


function lista_cliente()
{
    $conexao = cria_conexao();

    $sql = "SELECT * FROM cliente";

    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function busca_cliente_por_nome($name)
{
    $conexao = cria_conexao();

    $sql = "SELECT * FROM cliente WHERE name = :name";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':name', $name);

    $stmt->execute();

    $cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return array_shift($cliente);
}

function insere_cliente($name, $responsible, $cnpj, $email, $phone1, $phone2, $address, $city, $state, $zip_code, $repId)
{
    try {
        $conexao = cria_conexao();
        //CLIENTE INICIA COMO ATIVO
        $status = 1;

        $sql = "INSERT INTO cliente (name, status, responsible, cnpj, email, phone1, phone2, address, city, state, zip_code, repId) 
                    VALUES (:name, :status, :responsible, :cnpj, :email, :phone1, :phone2, :address, :city, :state, :zip_code, :repId)";

        $stmt = $conexao->prepare($sql);

        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':status', $status);
        $stmt->bindValue(':responsible', $responsible);
        $stmt->bindValue(':cnpj', $cnpj);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':phone1', $phone1);
        $stmt->bindValue(':phone2', $phone2);
        $stmt->bindValue(':address', $address);
        $stmt->bindValue(':city', $city);
        $stmt->bindValue(':state', $state);
        $stmt->bindValue(':zip_code', $zip_code);
        $stmt->bindValue(':repId', $repId);

        $stmt->execute();

        return $conexao->lastInsertId();
    } catch (PDOException $e) {
        print("Error: " . $e->getMessage());
    }
}

function atualiza_status($id, $status)
{

    try {
        $conexao = cria_conexao();

        $sql = "UPDATE cliente SET status=?  WHERE id =?";

        $stmt = $conexao->prepare($sql);

        $stmt->execute([$status, $id]);

        $conexao = null;

        return true;
    } catch (PDOException $e) {
        print($e->getMessage());
        die();
    }
}
