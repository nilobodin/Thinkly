<?php
session_start();

$host = 'localhost';
$db = 'thinkly_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Формируем строку подключения (DSN)
$dsn = "mysql:host=$host; dbname=$db; charset=$charset";

// Настройки подключения
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Генерировать исключения при ошибках
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Получать данные в виде ассоциативного массива
    PDO::ATTR_EMULATE_PREPARES => false, // Использовать "настоящие" подготовленные запросы
];

try {
    $link = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}