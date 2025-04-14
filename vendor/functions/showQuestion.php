<?php
include 'core.php';

// Выводит вопросы только определенного пользователя по ID из базы данных
if ($_GET) {
    $questionQuery = $link->prepare("SELECT `users`.*, `questions`.*
        FROM `questions` 
        LEFT JOIN `users` ON `questions`.`user_id` = `users`.`id`
        WHERE `questions`.`id` = :questionId
    ");
    $questionQuery->execute([":questionId" => $questionId]);
    $questions = $questionQuery->fetchAll(PDO::FETCH_ASSOC);
    foreach ($questions as $question);

    // Получаем теги к этим вопросама
    $tagsQuery = $link->prepare("SELECT `tags`.*, `question_tags`.*
        FROM `question_tags` 
        LEFT JOIN `tags` ON `question_tags`.`tag_id` = `tags`.`id`
        WHERE `question_tags`.`question_id` = :questionId
    ");
    $tagsQuery->execute([":questionId" => $questionId]);
    $tags = $tagsQuery->fetchAll(PDO::FETCH_ASSOC);
    foreach ($tags as $tag);
}