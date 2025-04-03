<?php
include 'core.php';

$stmt = $link->prepare("SELECT * FROM `users`");
$stmt->execute();
$users = $stmt->fetchAll();