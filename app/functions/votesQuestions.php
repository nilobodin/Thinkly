<?php
include 'core.php';

if (!isset($_SESSION['user'])) {
    $_SESSION['error'] = 'Для голосования за вопрос, нужно авторизоваться';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

$questionId = (int) $_POST['questionId'];
$userId = $_SESSION['user']['id'];
$newVoteValue = (int) $_POST['voteBtn']; // Приводим к целому числу

$stmt = $link->prepare("SELECT `votes` FROM `questions` WHERE `id` = ?");
$stmt->execute([$questionId]);
$question = $stmt->fetch();

// Проверка на минимальное значение при дизлайке
if ($newVoteValue == -1 && $question['votes'] <= 0) {
    $_SESSION['error'] = 'Количество голосов не может быть меньше нуля';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

$stmt = $link->prepare("SELECT `vote_value` FROM `question_votes` WHERE `question_id` = ? AND `user_id` = ?");
$stmt->execute([$questionId, $userId]);
$existingVote = $stmt->fetch();

$voteChange = 0;
if ($existingVote) {
    if ($existingVote['vote_value'] == $newVoteValue) {
        // Отмена голоса, удаляем запись
        $voteChange = -$newVoteValue;
        $link->prepare("DELETE FROM `question_votes` WHERE `question_id` = ? AND `user_id` = ?")->execute([$questionId, $userId]);
    } else {
        // Смена голосов (лайк - дизлайк)
        if ($newVoteValue == -1) {
            $voteChange = -1;
        } else {
            $voteChange = 1;
        }
        $link->prepare("UPDATE `question_votes` SET `vote_value` = ? WHERE `question_id` = ? AND `user_id` = ?")->execute([$newVoteValue, $questionId, $userId]);
    }
} else {
    // Новый голос
    $voteChange = $newVoteValue;
    $link->prepare("INSERT INTO `question_votes` (`question_id`, `user_id`, `vote_value`) VALUES (?, ?, ?)")->execute([$questionId, $userId, $newVoteValue]);
}

// Обновляем суммарный рейтинг в таблице вопросы (questions)
$link->prepare("UPDATE `questions` SET `votes` = `votes` + ? WHERE `id` = ?")->execute([$voteChange, $questionId]);
header("Location: {$_SERVER['HTTP_REFERER']}");