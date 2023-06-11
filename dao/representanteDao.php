<?php

require_once 'conexao.php';


function lista_representante()
{
    $conexao = cria_conexao();

    $sql = "SELECT * FROM representante";

    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function busca_representante_por_nome($name)
{
    $conexao = cria_conexao();

    $sql = "SELECT * FROM representante WHERE name = :name";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':name', $name);

    $stmt->execute();

    $representante = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return array_shift($representante);
}

function busca_representante_por_email($email)
{
    $conexao = cria_conexao();

    $sql = "SELECT * FROM representante WHERE email = :email";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':email', $email);

    $stmt->execute();

    $representante = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return array_shift($representante);
}


function insere_representante($name, $address, $phone, $email, $document, $state, $password)
{
    try {
        $conexao = cria_conexao();

        $passwordEncriptado = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO representante (name, address, phone, email, document, state, password) 
                    VALUES (:name, :address, :phone, :email, :document, :state, :password)";

        $stmt = $conexao->prepare($sql);

        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':address', $address);
        $stmt->bindValue(':phone', $phone);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':document', $document);
        $stmt->bindValue(':state', $state);
        $stmt->bindValue(':password', $passwordEncriptado);

        $stmt->execute();

        return $conexao->lastInsertId();
    } catch (PDOException $e) {
        print("Error: " . $e->getMessage());
    }
}

function testa_cpf($document)
{

    $conexao = cria_Conexao();

    $array = array();

    $sql = "SELECT document FROM representante WHERE document = :document";

    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":document", $document);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $array = $stmt->fetch();
    }

    return $array;
}

function testa_telefone($telefone,$document)
{

    $conexao = cria_Conexao();

    $array = array();

    $sql = "SELECT phone,document FROM representante WHERE phone = :phone AND document = :document";

    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":phone", $telefone);
    $stmt->bindValue(":document", $document);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $array = $stmt->fetch();
    }

    return $array;
}

function atualiza_senha($document, $password)
{

    try {
        $conexao = cria_Conexao();

        $passwordEncriptado = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE representante SET password=?  WHERE document =?";

        $stmt = $conexao->prepare($sql);

        $stmt->execute([$passwordEncriptado, $document]);

        $conexao = null;

        return true;
    } catch (PDOException $e) {
        print($e->getMessage());
        die();
    }
}

function atualiza_status($id, $status)
{

    try {
        $conexao = cria_Conexao();

        $sql = "UPDATE representante SET status=?  WHERE id =?";

        $stmt = $conexao->prepare($sql);

        $stmt->execute([$status, $id]);

        $conexao = null;

        return true;
    } catch (PDOException $e) {
        print($e->getMessage());
        die();
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

function alteraRepresentante($doc,$nome,$endereco,$telefone,$email,$documento,$regiao,$senha)
{
   
    try {
        $conn = cria_Conexao();

        $sql = "UPDATE representante SET name=?, address=?, phone=?, email=?, document=?, state=?, password=?  WHERE id=?";

        $stmt = $conn->prepare($sql);

        $stmt->execute([$nome,$endereco,$telefone,$email,$documento,$regiao,$senha,$doc]);

        $conn = null;

        return true;

    } catch (PDOException $e) {
        print($e->getMessage());
    }
    
}

// function atualiza_aluno($id, $nome, $matricula)
// {
//     try {
//         $conexao = cria_conexao();

//         $sql = "UPDATE alunos SET nome = :nome, matricula = :matricula WHERE idalunos = :id";

//         $stmt = $conexao->prepare($sql);

//         $stmt->bindValue(':idalunos', $id);
//         $stmt->bindValue(':nome', $nome);
//         $stmt->bindValue(':matricula', $matricula);

//         $stmt->execute();

//         return $stmt->rowCount();
//     } catch (PDOException $e) {
//         throw $e;
//     }
// }

// function remove_aluno($id)
// {
//     try {
//         $conexao = cria_conexao();

//         $sql = "DELETE FROM alunos WHERE idalunos = :id";

//         $stmt = $conexao->prepare($sql);

//         $stmt->bindValue(':id', $id);

//         $stmt->execute();

//         return $stmt->rowCount();
//     } catch (PDOException $e) {
//         throw $e;
//     }
// }
