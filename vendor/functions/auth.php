<?php
include 'core.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Сохраняем введеные данные в переменные, базовая защита от XSS-атаки в логине
  $login = trim(htmlspecialchars($_POST['login'] ?? ''));
  $password = $_POST['password'] ?? '';

  // Проверка обязательных полей
  if (empty($login) || empty($password)) {
    $_SESSION['error'] = 'Логин и пароль обязательны для заполнения';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
  }

  $stmt = $link->prepare("SELECT id FROM users WHERE login = :login AND password = :password");
  $stmt->execute([
    ':login' => $login,
    ':password' => $password
  ]);

  // Проверка на наличие нужного пользователя
  if ($stmt->rowCount() > 0) {
    foreach ($stmt as $user) {
      $_SERVER['user']['id'] = $user['id'];
      $_SERVER['user']['nickname'] = $user['nickname'];
      $_SERVER['user']['created_at'] = $user['created_at'];
      $_SERVER['user']['role'] = $user['role_id'];
    }
  } else {
    $_SESSION['error'] = 'Не верный логин или пароль';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
  }
  
  
}
