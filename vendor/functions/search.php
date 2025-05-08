<?php
include 'core.php';
header('Content-Type: application/json');

if (isset($_GET['q']) && strlen($_GET['q']) >= 2) {

    $searchTerm = '%' . $_GET['q'] . '%';

    $stmt = $link->prepare("SELECT id, title FROM questions WHERE title LIKE :search ORDER BY title LIMIT 10");
    $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();

    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}