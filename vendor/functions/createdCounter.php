<?php
include 'core.php';

$stmt = $link->prepare("SELECT created_at FROM users WHERE id = ?");
$stmt->execute([$userId]);
$userData = $stmt->fetch();

$regDate = new DateTime($userData['created_at']);
$currentDate = new DateTime();
$interval = $regDate->diff($currentDate);
$days = $interval->days;