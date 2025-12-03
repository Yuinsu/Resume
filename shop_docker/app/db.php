<?php
$host = getenv('APP_DB_HOST') ?: 'db';
$db   = getenv('APP_DB_NAME') ?: 'shopdb';
$user = getenv('APP_DB_USER') ?: 'shopuser';
$pass = getenv('APP_DB_PASS') ?: 'ShopPassword!';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    exit("DB Error: " . $e->getMessage());
}
?>
