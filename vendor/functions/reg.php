<?php
require 'core.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Валидация и очистка ввода
    $nickname = !empty($_POST['nickname']) ? trim(htmlspecialchars($_POST['nickname'])) : 'user' . rand(1000, 99999999);
    $login = trim(htmlspecialchars($_POST['login'] ?? ''));
    $password = $_POST['password'] ?? '';

    // Проверка обязательных полей
    if (empty($login) || empty($password)) {
        $_SESSION['error'] = 'Логин и пароль обязательны для заполнения';
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;
    }

    // Проверка существующего пользователя
    $stmt = $link->prepare("SELECT id FROM users WHERE login = :login");
    $stmt->execute([':login' => $login]);

    if ($stmt->rowCount() > 0) {
        $_SESSION['error'] = 'Пользователь с таким логином уже существует';
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;
    }

    // Хеширование пароля и подготовка данных
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $avatar = '/assets/img/avatar/user1.png';
    $date = date('Y-m-d H:i:s');

    // Выполнение запроса
    $stmt = $link->prepare("INSERT INTO users (nickname, login, password, avatar, created_at) 
    VALUES (:nickname, :login, :password, :avatar, :created_at)");

    try {
        $success = $stmt->execute([
            ':nickname' => $nickname,
            ':login' => $login,
            ':password' => $hashedPassword,
            ':avatar' => $avatar,
            ':created_at' => $date
        ]);

        if ($success && $stmt->rowCount() > 0) {
            $_SESSION['success'] = 'Регистрация прошла успешно!';
        } else {
            $_SESSION['error'] = 'Ошибка регистрации';
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Ошибка базы данных: ' . $e->getMessage();
    }

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}