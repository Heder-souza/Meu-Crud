<?php

function db(): PDO
{
    $host = '127.0.0.1';
    $dbname = 'crud_php';
    $user = 'root';
    $pass = '';
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    return new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
}

try {
    $pdo = db();
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco: ".$e->getMessage();//se houver erro no banco de dados ele mostrara o echo "erro ao conectar ao banco" e com o getmessage() ele exibe qual o erro especifico
}
