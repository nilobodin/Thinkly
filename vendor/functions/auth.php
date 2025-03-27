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

  // Получаем пользователя из БД по логину
  $stmt = $link->prepare("SELECT * FROM users WHERE login = :login");
  $stmt->execute([':login' => $login]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  // Проверяем существования пользователя и совпадение паролей
  if ($user && password_verify($password, $user['password'])) {
    // Создаем сессию пользователя
    $_SESSION['user'] = [
      'id' => $user['id'],
      'nickname' => $user['nickname'],
      'created_at' => $user['created_at'],
      'role' => $user['role']
    ];

    $_SESSION['success'] = 'Вы успешно авторизировались';
    header("Location: /");
    exit;
  } else {
    $_SESSION['error'] = 'Неверный логин или пароль';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
  }
}
