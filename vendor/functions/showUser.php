<?php
include 'core.php';

// Вывод пользователя по id из GET-запроса
if ($_GET) {
    $stmt = $link->prepare("SELECT * FROM `users` WHERE `id` = :userId");
    $stmt->execute([':userId' => $userId]);
    $user = $stmt->fetch();
    
    $stmt = $link->prepare("SELECT * FROM `questions` WHERE `user_id` = :userId");
    $stmt->execute(['userId' => $userId]);
    $questions = $stmt->fetchAll();
}