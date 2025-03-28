<?php
include 'core.php';
// Получаем время последнего визита
$stmt = $link->prepare("SELECT last_visit FROM users WHERE id = :id");
$stmt->execute([':id' => $_SESSION['user']['id']]);
$lastVisit = $stmt->fetchColumn();

// Рассчитываем разницу
$lastVisitDate = new DateTime($lastVisit);
$currentDate = new DateTime();
$interval = $lastVisitDate->diff($currentDate);

// Форматируем вывод
$lastSeen = '';
if ($interval->y > 0) {
    $lastSeen = $interval->y . ' ' . pluralForm($interval->y, ['год', 'года', 'лет']);
} elseif ($interval->m > 0) {
    $lastSeen = $interval->m . ' ' . pluralForm($interval->m, ['месяц', 'месяца', 'месяцев']);
} elseif ($interval->d > 0) {
    $lastSeen = $interval->d . ' ' . pluralForm($interval->d, ['день', 'дня', 'дней']);
} elseif ($interval->h > 0) {
    $lastSeen = $interval->h . ' ' . pluralForm($interval->h, ['час', 'часа', 'часов']);
} else {
    $lastSeen = 'менее часа назад';
}

// Функция для склонения
function pluralForm($n, $forms) {
    return $n % 10 == 1 && $n % 100 != 11 ? $forms[0] :
        ($n % 10 >= 2 && $n % 10 <= 4 && ($n % 100 < 10 || $n % 100 >= 20) ? $forms[1] : $forms[2]);
}