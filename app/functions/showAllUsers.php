<?php
include 'core.php';

$perPage = 12;
$page = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
$offset = ($page - 1) * $perPage;

if (isset($_GET['reputation'])) {
    $stmt = $link->prepare("SELECT * FROM `users` ORDER BY `reputation` DESC LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $users = $stmt->fetchAll();
} elseif (isset($_GET['newusers'])) {
    $stmt = $link->prepare("SELECT * FROM `users` ORDER BY `created_at` DESC LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $users = $stmt->fetchAll();
} elseif (isset($_GET['questions'])) {
    $stmt = $link->prepare("SELECT * FROM `users` ORDER BY `questions_count` DESC LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $users = $stmt->fetchAll();
} elseif (isset($_GET['answers'])) {
    $stmt = $link->prepare("SELECT * FROM `users` ORDER BY `answers_count` DESC LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $users = $stmt->fetchAll();
} else {
    $stmt = $link->prepare("SELECT * FROM `users` ORDER BY `reputation` DESC LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $users = $stmt->fetchAll();
}

$countSql = "SELECT COUNT(*) FROM `users`";
$totalUsers = $link->query($countSql)->fetchColumn();
$totalPages = ceil($totalUsers / $perPage);