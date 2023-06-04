<?php
function cria_conexao()
{
    $host = 'projetos.farroupilha.ifrs.edu.br';
    $port = '35003';
    $database = 'gerenciamentoclientes';
    $username = 'gerenciamentoclientes';
    $password = '123456';

    try {
        $dsn = "mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4";
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    }
}
