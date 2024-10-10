<?php
session_start();
require_once 'database.php';

$userID = $_SESSION['user'];

$stmt = $db->prepare("SELECT is_student FROM users WHERE id = ?");
$stmt->bind_param('i', $userID);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();

if ($result['is_student']) {
    echo "<h1>Вы являетесь студентом.</h1>";
    // Здесь добавляете вывод списка видеоуроков
} else {
    echo "<h1>У Вас нет статуса ученика.</h1>";
    echo "<a href='t.me/vansiltt'>Контактный телеграмм аккаунт @vansiktt</a>";
}
?>
