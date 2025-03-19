<!DOCTYPE html>
<html lang="en">

<?php
include $core_path;
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/fonts.css">
    <link rel="stylesheet" href="/assets/css/modals.css">
    <link rel="stylesheet" href="/assets/css/question.css">
    <link rel="stylesheet" href="/assets/css/user.css">
    <link rel="stylesheet" href="/assets/css/ask.css">
    <link rel="stylesheet" href="/assets/css/awards.css">
    <link rel="stylesheet" href="/assets/css/profile.css">
    <link rel="stylesheet" href="/assets/css/users.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>
        <?= $title ?>
    </title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header_row-container">
                <div class="logo">
                    <a href="/"><img src="/assets/img/Logo.svg" draggable="false" alt=""></a>
                </div>
                <search class="search">
                    <div class="search-icon">
                        <img src="/assets/img/icons/search-loupe.svg" alt="" class="search-icon-svg">
                    </div>
                    <input type="search" placeholder="Начните вводить свой вопрос...">
                </search>
                <div class="header-btns">
                    <input type="submit" value="Войти" class="btn btn_enter" id="btn_modal_open">
                    <button class="btn_theme">
                        <div class="theme-icon-container">
                            <img src="/assets/img/icons/sun.svg" alt="Светлая тема" label="Переключение темы"
                                class="theme-icon" id="theme-icon-sun" draggable="false">
                            <img src="/assets/img/icons/moon.svg" alt="Темная тема" label="Переключение темы"
                                class="theme-icon" id="theme-icon-moon" draggable="false">
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <?php
    include 'modals/modal.php';
    ?>