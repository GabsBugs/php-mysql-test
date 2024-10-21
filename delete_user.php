<?php
// delete_user.php - Excluir um usuário
include 'db.php';

$id = $_GET['id'];

// Excluir usuário do banco de dados
$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$id]);

// Redirecionar para a página inicial
header('Location: index.php');

