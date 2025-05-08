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

    // Сохраняем вопрос в БД
    $stmt = $link->prepare("INSERT INTO questions (title, description, user_id, created_at) 
                              VALUES (:title, :description, :user_id, NOW())");
    $stmt->execute([
        ':title' => $title,
        ':description' => $description,
        ':user_id' => $userId
    ]);

    $questionId = $link->lastInsertId();

    // Увеличиваем счетчик пользователя (кол-во вопросов)

    $stmt = $link->prepare("UPDATE users SET questions_count = IFNULL(questions_count, 0) + 1 WHERE id = ?");
    $result = $stmt->execute([$userId]);
    
    // Обрабатываем теги
    foreach ($tags as $tagName) {
        // Проверяем, существует ли тег
        $stmt = $link->prepare("SELECT id FROM tags WHERE name = :name");
        $stmt->execute([':name' => $tagName]);
        $tag = $stmt->fetch();

        if (!$tag) {
            // Создаем новый тег
            $stmt = $link->prepare("INSERT INTO tags (name, created_at) VALUES (:name, NOW())");
            $stmt->execute([':name' => $tagName]);
            $tagId = $link->lastInsertId();
        } else {
            $tagId = $tag['id'];
        }

        // Связываем вопрос с тегом
        $stmt = $link->prepare("INSERT INTO question_tags (question_id, tag_id, created_at) 
                                       VALUES (:question_id, :tag_id, NOW())");
        $stmt->execute([
            ':question_id' => $questionId,
            ':tag_id' => $tagId
        ]);
    }

    header("Location: ../components/question.php?id=" . $questionId);
    $_SESSION['success'] = 'Вопрос успешно задан';
    exit;
}