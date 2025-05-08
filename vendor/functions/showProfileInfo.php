<?php
include 'core.php';

$stmt = $link->prepare("SELECT * FROM `users` WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch();

$stmt = $link->prepare("SELECT * FROM `questions` WHERE `user_id` = :userId");
$stmt->execute(['userId' => $userId]);
$questions = $stmt->fetchAll();
