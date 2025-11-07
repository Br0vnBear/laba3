<?php
session_start();
session_destroy();

// Удаляем cookies
setcookie('bg_color', '', time() - 3600, '/');
setcookie('text_color', '', time() - 3600, '/');

header('Location: login.php');
exit;
?>