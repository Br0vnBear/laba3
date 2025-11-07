<?php
require_once __DIR__ . '/../config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bg_color = $_POST['bg_color'];
    $text_color = $_POST['text_color'];

    $stmt = $pdo->prepare("UPDATE users SET bg_color = ?, text_color = ? WHERE id = ?");
    $stmt->execute([$bg_color, $text_color, $_SESSION['user_id']]);

    // Обновление cookies
    setcookie('bg_color', $bg_color, time() + 3600, '/');
    setcookie('text_color', $text_color, time() + 3600, '/');

    header('Location: dashboard.php');
    exit;
}

$bg_color = $_COOKIE['bg_color'] ?? '#ffffff';
$text_color = $_COOKIE['text_color'] ?? '#000000';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Настройки</title>
</head>
<body>
    <form method="POST">
        <input type="color" name="bg_color" value="<?= $bg_color ?>">
        <input type="color" name="text_color" value="<?= $text_color ?>">
        <button type="submit">Сохранить</button>
    </form>
    <a href="dashboard.php">Назад</a>
</body>
</html>