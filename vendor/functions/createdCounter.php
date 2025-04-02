<?php
include 'core.php';
$regDate = new DateTime($_SESSION['user']['created_at']);
$currentDate = new DateTime();
$interval = $regDate->diff($currentDate);
$days = $interval->days;