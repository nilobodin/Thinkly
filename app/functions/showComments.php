<?php
include 'core.php';

$stmt = $link->prepare("SELECT `users`.*, `questions`.*, `comments`.*
FROM `comments` 
LEFT JOIN `users` 
ON `comments`.`user_id` = `users`.`id` 
LEFT JOIN `questions` 
ON `comments`.`question_id` = `questions`.`id`
WHERE `comments`.`question_id` = ?");

$stmt->execute([$questionId]);
$comments = $stmt->fetchAll();


