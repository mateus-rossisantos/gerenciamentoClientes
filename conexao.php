<?php
function cria_conexao()
{
    $host = 'localhost';
    $port = '3306';
    $database = 'gerenciamentoClientes';
    $username = 'root';
    $password = 'root';

    try {
        $dsn = "mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4";
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    }
}
