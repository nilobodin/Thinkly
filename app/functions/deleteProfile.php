<?php
include 'core.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['userId'];

    $stmt = $link->prepare("DELETE FROM `users` WHERE `id` = ?");
    $stmt->execute([$userId]);
    
    session_unset();
    session_destroy();
    header("Location: /");
}
