<?php
include 'core.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    unset($_SESSION['success'], $_SESSION['error']);
    exit;
}