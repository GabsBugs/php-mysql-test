<?php
// db.php - Arquivo de conexão com o banco de dados

$host = 'localhost';
$dbname = 'user_management';
$username = 'root'; // usuário padrão do MySQL no XAMPP/WAMP
$password = '0070'; // senha vazia por padrão no XAMPP/WAMP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Definir o modo de erro para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

