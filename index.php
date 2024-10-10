<?php
session_start();
require_once 'database.php'; // Подключение к базе данных

if (!isset($_SESSION['user'])) {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result) {
            session_regenerate_id();
            $_SESSION['user'] = $result['id'];
            header('Location: videos.php');
        } else {
            echo '<h1>Неправильное имя пользователя или пароль</h1>';
        }
    }
} else {
    require_once 'videos.php';
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Система Видео Уроков</title>
</head>
<body>
    <form method="post">
        <label for="username">Username: </label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password: </label><br>
        <input type="password" id="password" name="password"><br>
        <button type="submit" name="login">Войти</button>
    </form>
</body>
</html>
