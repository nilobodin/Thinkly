<?php
include 'core.php';

$stmt = $link->prepare("SELECT `badge_type` FROM `user_badges` WHERE `user_id` = :user_id");
$stmt->execute([':user_id' => $userId]);
$awards = $stmt->fetchAll(PDO::FETCH_COLUMN);

$awardImages = [
    'first_question' => 'новичек (вопросы).svg',
    'first_answer' => 'новичек (ответы).svg',
    '25_questions' => 'опытный (вопросы).svg',
    '25_answers' => 'опытный (ответы).svg',
    '100_questions' => 'продвинутый (вопросы).svg',
    '100_answers' => 'продвинутый (ответы).svg'
];