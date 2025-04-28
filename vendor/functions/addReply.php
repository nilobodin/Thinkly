<?php
include 'core.php';

// Добавление ответа к комментарию
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_reply'])) {

    $content = trim($_POST['form_reply']);
    $questionId = $_POST['questionId'];
    $commentId = $_POST['commentId'];

    if (empty($content)) {
        $_SESSION['error'] = 'Ответ не может быть пустым';
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    try {
        // Добавление ответа
        $stmt = $link->prepare("INSERT INTO `comments` (`question_id`, `user_id`, `content`, `parent_id`) VALUES (?, ?, ?, ?)");
        $stmt->execute([$questionId, $_SESSION['user']['id'], $content, $commentId]);
        
        // Обновление счетчика ответов у вопроса
        $stmt = $link->prepare("UPDATE `questions` SET answers = answers + 1 WHERE id = ?");
        $stmt->execute([$questionId]);

        // Обновление счетчика ответов у пользователя
        $stmt = $link->prepare("UPDATE `users` SET answers_count = answers_count + 1 WHERE id = ?");
        $stmt->execute([$_SESSION['user']['id']]);

        $_SESSION['success'] = 'Ответ успешно отправлен';
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Ошибка при отправке ответа';
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}