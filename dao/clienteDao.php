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

function lista_cliente_por_representante($representante_id)
{
    $conexao = cria_conexao();

    $sql = "SELECT * FROM cliente WHERE repId = :repId";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':repId', $representante_id);
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

        $sql = "UPDATE cliente SET status=?  WHERE client_id =?";

        $stmt = $conexao->prepare($sql);

        $stmt->execute([$status, $id]);

        $conexao = null;

        return true;
    } catch (PDOException $e) {
        print($e->getMessage());
        die();
    }
}

function busca_cliente_por_id($cliente)
{
    $conexao = cria_conexao();

    $sql = "SELECT * FROM cliente WHERE client_id = :client_id";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':client_id', $cliente);

    $stmt->execute();

    $cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return array_shift($cliente);
}

function alteraCliente($doc,$nome,$responsavel,$endereco,$cidade,$telefone1,$telefone2,$email,$documento,$regiao,$cep)
{
   
    try {
        $conn = cria_Conexao();

        $sql = "UPDATE cliente SET responsible=?, name=?, cnpj=?, email=?, phone1=?, phone2=?, address=?, city=?,  state=?, zip_code=?  WHERE client_id=?";

        $stmt = $conn->prepare($sql);

        $stmt->execute([$responsavel,$nome,$documento,$email,$telefone1,$telefone2,$endereco,$cidade,$regiao,$cep,$doc]);

        $conn = null;

        return true;

    } catch (PDOException $e) {
        print($e->getMessage());
    }
    
}

function busca_representante_por_id($id){
    $pdo = cria_Conexao();

    $array = array();

    $sql = "SELECT * FROM representante WHERE id = :id";

    $sql = $pdo->prepare($sql);
    $sql->bindValue("id", $id);
    $sql->execute();

    IF($sql->rowCount() > 0){
        $array = $sql->fetch();
    }

    return $array;
}

function lista_representante()
{
    $conexao = cria_conexao();

    $sql = "SELECT * FROM representante where status in (1,2)";

    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function alteraClienteRep($doc,$nome,$responsavel,$endereco,$cidade,$telefone1,$telefone2,$email,$documento,$regiao,$cep,$repid)
{
   
    try {
        $conn = cria_Conexao();

        $sql = "UPDATE cliente SET responsible=?, name=?, cnpj=?, email=?, phone1=?, phone2=?, address=?, city=?,  state=?, zip_code=?, repId=?  WHERE client_id=?";

        $stmt = $conn->prepare($sql);

        $stmt->execute([$responsavel,$nome,$documento,$email,$telefone1,$telefone2,$endereco,$cidade,$regiao,$cep,$repid,$doc]);

        $conn = null;

        return true;

    } catch (PDOException $e) {
        print($e->getMessage());
    }
    
}