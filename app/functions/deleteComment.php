<?php
include 'core.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btn-yes'])) {
        $commentId = $_POST['comment_id'];
        $questionId = $_POST['question_id'];

        // Удаляем комментарий
        $stmt = $link->prepare("DELETE FROM comments WHERE id = ?");
        $stmt->execute([$commentId]);

        // Обновляем счетчики
        $stmt = $link->prepare("UPDATE questions SET answers = answers - 1 WHERE id = ?");
        $stmt->execute([$questionId]);

        $stmt = $link->prepare("UPDATE users SET answers_count = answers_count - 1 WHERE id = ?");
        $stmt->execute([$_SESSION['user']['id']]);

        $_SESSION['success'] = 'Комментарий успешно удален';
        header("Location: /app/components/question.php?id=" . $questionId);
        exit();
    } else {
        $_SESSION['error'] = 'Комментарий не удален';
        header("Location: /");
        exit();
    }
}