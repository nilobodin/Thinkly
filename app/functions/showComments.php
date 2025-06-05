<?php
include 'core.php';

function getParentComments($questionId, $link) {
    $stmt = $link->prepare("
        SELECT comments.*, users.nickname, users.avatar, users.reputation, users.answers_count
        FROM comments
        JOIN users ON comments.user_id = users.id
        WHERE comments.question_id = ? AND comments.parent_id IS NULL
        ORDER BY comments.created_at DESC
    ");
    $stmt->execute([$questionId]);
    return $stmt->fetchAll();
}

function getRepliesForComment($commentId, $link) {
    $stmt = $link->prepare("
        SELECT comments.*, users.nickname, users.avatar, users.reputation, users.answers_count
        FROM comments
        JOIN users ON comments.user_id = users.id
        WHERE comments.parent_id = ?
        ORDER BY comments.created_at ASC
    ");
    $stmt->execute([$commentId]);
    return $stmt->fetchAll();
}

// Получаем все данные для вывода
$parentComments = getParentComments($questionId, $link);
$allCommentsData = [];

foreach ($parentComments as $comment) {
    $commentData = [
        'comment' => $comment,
        'replies' => getRepliesForComment($comment['id'], $link)
    ];
    $allCommentsData[] = $commentData;
}


