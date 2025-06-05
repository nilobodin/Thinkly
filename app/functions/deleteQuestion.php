<?php
include 'core.php';
include 'checkAwards.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn-yes'])) {
        $questionId = $_POST['question_id'];
        $userId = $_SESSION['user']['id'];

        // Удаляем вопрос из БД
        $stmt = $link->prepare("DELETE FROM `questions` WHERE `id` = ?");
        $stmt->execute([$questionId]);

        // Обновляем счетчик вопросов пользователя
        $stmt = $link->prepare("UPDATE `users` SET `questions_count` = `questions_count` - 1 WHERE `id` = ?");
        $stmt->execute([$userId]);
    }

    checkAndAwardBadges($userId, 'question', $link);

    header("Location: ../components/questions.php");
    $_SESSION['success'] = 'Ваш вопрос удален';
    exit;
}