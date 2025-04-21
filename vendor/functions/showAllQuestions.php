<?php
include 'core.php';

// Получаем все вопросы
$stmt = $link->prepare("SELECT `users`.*, `questions`.*
    FROM `questions` 
    LEFT JOIN `users` 
    ON `questions`.`user_id` = `users`.`id`
    ORDER BY `questions`.`created_at` DESC
");
$stmt->execute();
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Получаем все теги с привязкой к вопросам
$tagsQuery = $link->prepare("SELECT 
        `tags`.`id` AS tag_id,
        `tags`.`name` AS tag_name,
        `question_tags`.`question_id`
    FROM `question_tags` 
    LEFT JOIN `tags` ON `question_tags`.`tag_id` = `tags`.`id`
");
$tagsQuery->execute();
$allTags = $tagsQuery->fetchAll(PDO::FETCH_ASSOC);