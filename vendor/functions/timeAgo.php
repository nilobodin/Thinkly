<?php
include 'core.php';

// Функция, которая выводит время в вопросе в нужном формате
function timeAgo($timestamp) {
    $currentTime = new DateTime();
    $pastTime = new DateTime($timestamp);
    $interval = $currentTime->diff($pastTime);
    
    if ($interval->y > 0) {
        return $interval->y . ' год' . ($interval->y > 1 ? 'а' : '') . ' назад';
    } elseif ($interval->m > 0) {
        return $interval->m . ' месяц' . ($interval->m > 1 ? 'ев' : '') . ' назад';
    } elseif ($interval->d > 0) {
        return $interval->d . ' дн' . ($interval->d > 1 ? 'ей' : '') . ' назад';
    } elseif ($interval->h > 0) {
        return $interval->h . ' час' . ($interval->h > 1 ? 'а' : '') . ' назад';
    } elseif ($interval->i > 0) {
        return $interval->i . ' минут' . ($interval->i > 1 ? 'ы' : 'а') . ' назад';
    } else {
        return 'только что';
    }
}