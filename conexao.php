<?php
// Arquivo: conexao.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

try {
    // Cria a conexão PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    
    // Define o modo de erro do PDO para exceção
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Em caso de erro na conexão, exibe a mensagem e encerra o script
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>