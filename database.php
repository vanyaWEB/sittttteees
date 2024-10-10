<?php
$servername = "localhost";
$username = "dimid";
$password = "mypassword";
$dbname = "database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Связь с базой данных установлена.";
} catch(PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
}
?>
