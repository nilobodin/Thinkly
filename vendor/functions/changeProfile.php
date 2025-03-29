<?php
include 'core.php';
$userId = $_SESSION['user']['id']; // ID пользователя из сессии

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Смена аватара (x_x)
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
        $stmt = $link->prepare("UPDATE users SET nickname = ? WHERE id = ?");
        $stmt->execute([$nickname, $userId]);
        $_SESSION['user']['nickname'] = $nickname;
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
    
    // Перенаправляем обратно
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
