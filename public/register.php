<?php
require_once __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $bg_color = $_POST['bg_color'] ?? '#ffffff';
    $text_color = $_POST['text_color'] ?? '#000000';

    $stmt = $pdo->prepare("INSERT INTO users (username, password, bg_color, text_color) VALUES (?, ?, ?, ?)");
    $stmt->execute([$username, $password, $bg_color, $text_color]);

    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="username" placeholder="Имя пользователя" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <input type="color" name="bg_color" value="#ffffff">
        <input type="color" name="text_color" value="#000000">
        <button type="submit">Зарегистрироваться</button>
    </form>
</body>
</html>