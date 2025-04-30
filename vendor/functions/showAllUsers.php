<?php
include 'core.php';

if (isset($_GET['reputation'])) {
    $stmt = $link->prepare("SELECT * FROM `users` ORDER BY `reputation` DESC");
    $stmt->execute();
    $users = $stmt->fetchAll();
} elseif (isset($_GET['newusers'])) {
    $stmt = $link->prepare("SELECT * FROM `users` ORDER BY `created_at` DESC");
    $stmt->execute();
    $users = $stmt->fetchAll();
} elseif (isset($_GET['questions'])) {
    $stmt = $link->prepare("SELECT * FROM `users` ORDER BY `questions_count` DESC");
    $stmt->execute();
    $users = $stmt->fetchAll();
} elseif (isset($_GET['answers'])) {
    $stmt = $link->prepare("SELECT * FROM `users` ORDER BY `answers_count` DESC");
    $stmt->execute();
    $users = $stmt->fetchAll();
} else {
    $stmt = $link->prepare("SELECT * FROM `users` ORDER BY `reputation` DESC");
    $stmt->execute();
    $users = $stmt->fetchAll();
}