<?php
include 'core.php';

function checkAndAwardBadges($userId, $type, $link) {
    // Получаем текущие счетчики пользователя
    $stmt = $link->prepare("SELECT questions_count, answers_count FROM users WHERE id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$user) return;
    
    $questionsCount = $user['questions_count'];
    $answersCount = $user['answers_count'];
    
    // Проверяем и выдаем/удаляем награды в зависимости от типа действия
    if ($type === 'question') {
        // Первый вопрос (не удаляется, даже если счетчик = 0)
        if ($questionsCount == 1) {
            awardBadge($userId, 'first_question', $link);
        } elseif ($questionsCount < 1) {
            revokeBadge($userId, 'first_question', $link);
        }
        
        // 25 вопросов
        if ($questionsCount >= 25) {
            awardBadge($userId, '25_questions', $link);
        } else {
            revokeBadge($userId, '25_questions', $link);
        }
        
        // 100 вопросов
        if ($questionsCount >= 100) {
            awardBadge($userId, '100_questions', $link);
        } else {
            revokeBadge($userId, '100_questions', $link);
        }
    } elseif ($type === 'answer') {
        // Первый ответ (не удаляется)
        if ($answersCount == 1) {
            awardBadge($userId, 'first_answer', $link);
        } elseif ($answersCount < 1) {
            revokeBadge($userId, 'first_answer', $link);
        }
        
        // 25 ответов
        if ($answersCount >= 25) {
            awardBadge($userId, '25_answers', $link);
        } else {
            revokeBadge($userId, '25_answers', $link);
        }
        
        // 100 ответов
        if ($answersCount >= 100) {
            awardBadge($userId, '100_answers', $link);
        } else {
            revokeBadge($userId, '100_answers', $link);
        }
    }
}

// Функция для выдачи награды
function awardBadge($userId, $badgeType, $link) {
    try {
        // Используем INSERT IGNORE чтобы избежать дубликатов
        $stmt = $link->prepare("INSERT IGNORE INTO user_badges (user_id, badge_type) VALUES (?, ?)");
        $stmt->execute([$userId, $badgeType]);
    } catch (PDOException $e) {
        error_log("Ошибка получения награды: " . $e->getMessage());
    }
}

// Новая функция для отзыва награды
function revokeBadge($userId, $badgeType, $link) {
    try {
        $stmt = $link->prepare("DELETE FROM user_badges WHERE user_id = ? AND badge_type = ?");
        $stmt->execute([$userId, $badgeType]);
    } catch (PDOException $e) {
        error_log("Ошибка удаления награды: " . $e->getMessage());
    }
}