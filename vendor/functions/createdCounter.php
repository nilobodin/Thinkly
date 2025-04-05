<?php
include 'core.php';

$userId = $_GET['id'] ?? $_SESSION['user']['id'] ?? null;

if ($userId === null) {
    $_SESSION['error'] = 'Пользователь не найден';
    header("Location: /vendor/components/users.php");
    exit;
}

$stmt = $link->prepare("SELECT created_at FROM users WHERE id = ?");
$stmt->execute([$userId]);
$userData = $stmt->fetch();

if (!$userData) {
    $_SESSION['error'] = 'Данные пользователя не найдены';
    header("Location: /vendor/components/users.php");
    exit;
}

$regDate = new DateTime($userData['created_at']);
$currentDate = new DateTime();
$interval = $regDate->diff($currentDate);
$days = $interval->days;