<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$bg_color = $_COOKIE['bg_color'] ?? '#ffffff';
$text_color = $_COOKIE['text_color'] ?? '#000000';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Дашборд</title>
    <style>
        body {
            background-color: <?= $bg_color ?>;
            color: <?= $text_color ?>;
        }
    </style>
</head>
<body>
    <h1>Привет, <?= $_SESSION['username'] ?>!</h1>
    <a href="settings.php">Настройки</a>
    <a href="logout.php">Выход</a>
</body>
</html>