<?php
$host = 'localhost:3306';
$db = 'clinica';
$user = 'root';
$pass = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo ("Erro na conexão: " . $e->getMessage());
}
?>
