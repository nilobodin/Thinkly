<?php
include 'core.php';

$sql = "SELECT `users`.*, `questions`.*
        FROM `questions` 
        LEFT JOIN `users` ON `questions`.`user_id` = `users`.`id`";

if (isset($_GET['noAnswer'])) {
    $sql .= " WHERE `questions`.`answers` = 0";
} elseif (isset($_GET['Popular'])) {
    $sql .= " ORDER BY `questions`.`answers` DESC";
} else {
    // по умолчанию все вопросы
    $sql .= " ORDER BY `questions`.`created_at` DESC";
}

$stmt = $link->prepare($sql);
$stmt->execute();
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Получаем все теги (общий запрос)
$tagsQuery = $link->prepare("SELECT 
    `tags`.`id` AS tag_id,
    `tags`.`name` AS tag_name,
    `question_tags`.`question_id`
    FROM `question_tags` 
    LEFT JOIN `tags` ON `question_tags`.`tag_id` = `tags`.`id`");
$tagsQuery->execute();
$allTags = $tagsQuery->fetchAll(PDO::FETCH_ASSOC);