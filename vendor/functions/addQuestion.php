<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'core.php';

    $userId = $_SESSION['user']['id'];
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $tagsInput = trim($_POST['tags']);

    if (empty($title)) {
        $_SESSION['error'] = "Заголовок вопроса обязателен";
        header("location: /vendor/components/ask.php");
        exit;
    } elseif (strlen($title) > 255) {
        $_SESSION['error'] = "Заголовок слишком длинный (максимум 255 символов)";
        header("location: /vendor/components/ask.php");
        exit;
    }

    if (empty($description)) {
        $_SESSION['error'] = "Описание вопроса обязательно";
        header("location: /vendor/components/ask.php");
        exit;
    }

    // Разделяем теги и проверяем их
    $tags = array_filter(array_map('trim', explode(',', $tagsInput)));
    $tags = array_slice($tags, 0, 5); // Ограничиваем до 5 тегов

    if (count($tags) === 0) {
        $_SESSION['error'] = "Добавьте хотя бы один тег";
        header("location: /vendor/components/ask.php");
        exit;
    }

    // Начинаем транзакцию
    $link->beginTransaction();

    try {
        // 1. Сохраняем вопрос в БД
        $stmt = $link->prepare("INSERT INTO questions (title, description, user_id, created_at) 
                              VALUES (:title, :description, :user_id, NOW())");
        $stmt->execute([
            ':title' => $title,
            ':description' => $description,
            ':user_id' => $userId
        ]);

        $questionId = $link->lastInsertId();

        // 2. Обрабатываем теги
        foreach ($tags as $tagName) {
            // Проверяем, существует ли тег
            $tagStmt = $link->prepare("SELECT id FROM tags WHERE name = :name");
            $tagStmt->execute([':name' => $tagName]);
            $tag = $tagStmt->fetch();

            if (!$tag) {
                // Создаем новый тег
                $tagStmt = $link->prepare("INSERT INTO tags (name, created_at) VALUES (:name, NOW())");
                $tagStmt->execute([':name' => $tagName]);
                $tagId = $link->lastInsertId();
            } else {
                $tagId = $tag['id'];
            }

            // Связываем вопрос с тегом
            $linkStmt = $link->prepare("INSERT INTO question_tags (question_id, tag_id, created_at) 
                                       VALUES (:question_id, :tag_id, NOW())");
            $linkStmt->execute([
                ':question_id' => $questionId,
                ':tag_id' => $tagId
            ]);
        }

        // Фиксируем транзакцию
        $link->commit();

        // Перенаправляем на страницу вопроса
        header("Location: ../components/question.php?id=" . $questionId);
        $_SESSION['success'] = 'Вопрос успешно задан';
        exit;

    } catch (Exception $e) {
        // Откатываем транзакцию при ошибке
        $link->rollBack();
        $_SESSION['error'] = ["Произошла ошибка при сохранении вопроса. Пожалуйста, попробуйте позже."];
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
}