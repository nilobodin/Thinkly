<?php
include 'core.php';

// Вывод всех пользователей
$stmt = $link->prepare("SELECT * FROM `users`");
$stmt->execute();
$users = $stmt->fetchAll();