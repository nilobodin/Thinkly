<?php
include 'core.php';

// Настройки пагинации
$perPage = 10; // Количество вопросов на странице
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1; // Текущая страница
$offset = ($page - 1) * $perPage; // Сколько записей пропускаем в запросе

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

// Добавляем пагинацию в запрос
$sql .= " LIMIT :limit OFFSET :offset";

$stmt = $link->prepare($sql);
$stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Получаем общее количество вопросов для пагинации
$countSql = "SELECT COUNT(*) FROM `questions`";
if (isset($_GET['noAnswer'])) {
    $countSql .= " WHERE `answers` = 0";
}
$totalQuestions = $link->query($countSql)->fetchColumn();
$totalPages = ceil($totalQuestions / $perPage);

// Получаем все теги (общий запрос)
$tagsQuery = $link->prepare("SELECT 
    `tags`.`id` AS tag_id,
    `tags`.`name` AS tag_name,
    `question_tags`.`question_id`
    FROM `question_tags` 
    LEFT JOIN `tags` ON `question_tags`.`tag_id` = `tags`.`id`");
$tagsQuery->execute();
$allTags = $tagsQuery->fetchAll(PDO::FETCH_ASSOC);