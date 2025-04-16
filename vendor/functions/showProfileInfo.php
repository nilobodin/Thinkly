<?php
include 'core.php';

$stmt = $link->prepare("SELECT * FROM `users` WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch();
