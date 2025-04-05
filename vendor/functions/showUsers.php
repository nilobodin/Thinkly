<?php
include 'core.php';

// Вывод всех пользователей
$stmt = $link->prepare("SELECT * FROM `users`");
$stmt->execute();
$users = $stmt->fetchAll();

// Вывод пользователя по id из GET-запроса
if ($_GET) {
    $userId = $_GET['id'];
    $stmt = $link->prepare("SELECT * FROM `users` WHERE `id` = :userId");
    $stmt->execute([':userId' => $userId]);
    $user = $stmt->fetch();
}