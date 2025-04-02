<?php
include 'core.php';

// Получаем все вопросы
$stmt = $link->prepare("SELECT `users`.*, `questions`.*
    FROM `questions` 
    LEFT JOIN `users` ON `questions`.`user_id` = `users`.`id`
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

if ($_GET) {
    $userId = $_SESSION['user']['id'];
    $questionId = $_GET['id'];

    $questionQuery = $link->prepare("SELECT `users`.*, `questions`.*
        FROM `questions` 
        LEFT JOIN `users` ON `questions`.`user_id` = `users`.`id`
        WHERE `questions`.`id` = :questionId
    ");
    $questionQuery->execute([":questionId" => $questionId]);
    $questions = $questionQuery->fetchAll(PDO::FETCH_ASSOC);
    foreach ($questions as $question);

    $tagsQuery = $link->prepare("SELECT `tags`.*, `question_tags`.*
        FROM `question_tags` 
        LEFT JOIN `tags` ON `question_tags`.`tag_id` = `tags`.`id`
        WHERE `question_tags`.`question_id` = :questionId
    ");
    $tagsQuery->execute([":questionId" => $questionId]);
    $tags = $tagsQuery->fetchAll(PDO::FETCH_ASSOC);
    foreach ($tags as $tag);
}