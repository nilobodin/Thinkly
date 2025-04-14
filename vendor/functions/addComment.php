<?php
include 'core.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_comment'])) {
    // Если не авторизован
    if (!isset($_SESSION['user'])) {
        $_SESSION['error'] = 'Для добавления комментария необходимо авторизоваться';
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

    // Данные из формы
    $content = trim($_POST['add_comment']);
    $question_id = $_POST['comment-id'];
    
    if (!empty($content)) {
        $stmt = $link->prepare("INSERT INTO `comments` (question_id, user_id, content) VALUES (?, ?, ?)");
        $stmt->execute([$question_id, $_SESSION['user']['id'], $content]);
        $_SESSION['success'] = 'Комментарий успешно отправлен';
        header("Location: /vendor/components/question.php?id=" . $question_id);
        exit();
    } else {
        $_SESSION['error'] = 'Комментарий не может быть пустым';
        header("Location: /vendor/components/question.php?id=" . $question_id);
        exit;
    }
}