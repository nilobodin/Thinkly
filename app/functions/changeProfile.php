<?php
include 'core.php';
$userId = $_SESSION['user']['id']; // ID пользователя из сессии

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Смена аватара
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '/assets/img/avatar/'; // Папка для аватарок

        // Генерируем уникальное имя файла
        $fileName = uniqid() . '_' . $_FILES['avatar']['name'];
        $filePath = $uploadDir . $fileName;
        $fullPath = $_SERVER['DOCUMENT_ROOT'] . $filePath;

        // Пытаемся сохранить файл
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $fullPath)) {
            // Обновляем аватар в сессии
            $_SESSION['user']['avatar'] = $filePath;

            // Обновляем аватар в базе данных
            $stmt = $link->prepare("UPDATE users SET avatar = ? WHERE id = ?");
            $stmt->execute([$filePath, $userId]);
        }

        // Возвращаемся назад
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Обновление никнейма
    if (!empty($_POST['nickname'])) {
        $nickname = trim($_POST['nickname']);
        $stmt = $link->prepare("SELECT `nickname` FROM `users` WHERE `nickname` = ?");
        $stmt->execute([$nickname]);
        $nick = $stmt->fetch();
        if ($nick > 0) {
            $_SESSION['error'] = 'Пользователь с таким именем уже существует';
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            $stmt = $link->prepare("UPDATE users SET nickname = ? WHERE id = ?");
            $stmt->execute([$nickname, $userId]);
            $_SESSION['user']['nickname'] = $nickname;
        }
    }

    // Обновление поля "обо мне"
    if (isset($_POST['about_me'])) {
        $about = trim($_POST['about_me']);
        $stmt = $link->prepare("UPDATE users SET about_me = ? WHERE id = ?");
        $stmt->execute([$about, $userId]);
        $_SESSION['user']['about_me'] = $about;
    }

    // Обновление местоположения
    if (!empty($_POST['location'])) {
        $location = trim($_POST['location']);
        $stmt = $link->prepare("UPDATE users SET location = ? WHERE id = ?");
        $stmt->execute([$location, $userId]);
        $_SESSION['user']['location'] = $location;
    }

    // Обновление статуса
    if (!empty($_POST['status'])) {
        $status = trim($_POST['status']);
        $stmt = $link->prepare("UPDATE users SET status = ? WHERE id = ?");
        $stmt->execute([$status, $userId]);
        $_SESSION['user']['status'] = $status;
    }

    // Обновление полного имени
    if (!empty($_POST['fullname'])) {
        $fullname = trim($_POST['fullname']);
        $stmt = $link->prepare("UPDATE users SET fullname = ? WHERE id = ?");
        $stmt->execute([$fullname, $userId]);
        $_SESSION['user']['fullname'] = $fullname;
    }

    // Обновление ссылки на Telegram
    if (isset($_POST['tg_link'])) {
        $tg_link = trim($_POST['tg_link']);
        $stmt = $link->prepare("UPDATE users SET tg_link = ? WHERE id = ?");
        $stmt->execute([$tg_link, $userId]);
        $_SESSION['user']['tg_link'] = $tg_link;
    }

    // Обновление ссылки на GitHub
    if (isset($_POST['github_link'])) {
        $github_link = trim($_POST['github_link']);
        $stmt = $link->prepare("UPDATE users SET github_link = ? WHERE id = ?");
        $stmt->execute([$github_link, $userId]);
        $_SESSION['user']['github_link'] = $github_link;
    }

    // Обновление ссылки на личный сайт
    if (isset($_POST['site_link'])) {
        $site_link = trim($_POST['site_link']);
        $stmt = $link->prepare("UPDATE users SET site_link = ? WHERE id = ?");
        $stmt->execute([$site_link, $userId]);
        $_SESSION['user']['site_link'] = $site_link;
    }

    // Перенаправляем обратно
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
