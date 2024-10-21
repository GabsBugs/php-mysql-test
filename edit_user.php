<?php
// edit_user.php - Editar um usuário existente
include 'db.php';

$id = $_GET['id'];

// Buscar usuário no banco de dados
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Atualizar no banco de dados
    $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
    $stmt->execute([$name, $email, $id]);

    // Redirecionar para a página inicial
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <form method="POST">
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="<?= $user['name']; ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= $user['email']; ?>" required><br>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
