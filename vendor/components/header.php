<?php
include $core_path;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        // Проверка сохраненной темы в localStorage до загрузки страницы
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-theme', savedTheme);
    </script>
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
    <script src="/assets/js/preloader.js"></script>
    <title>
        <?= $title ?>
    </title>
</head>

<body>
    <div class="preloader">
        <div class="logo-animation">
            <span class="logo-part">t</span>
            <span class="logo-part">h</span>
            <span class="logo-part">/</span>
            <span class="logo-part">n</span>
            <span class="logo-part">k</span>
            <span class="logo-part">l</span>
            <span class="logo-part">y</span>
            <span class="logo-part">&lt;/&gt;</span>
        </div>
        <div class="subtitle">
            web-форум для программистов
        </div>
    </div>
    <div id="notification-data"
        data-success="<?= isset($_SESSION['success']) ? htmlspecialchars($_SESSION['success']) : '' ?>"
        data-error="<?= isset($_SESSION['error']) ? htmlspecialchars($_SESSION['error']) : '' ?>">
    </div>
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
                    <?php if (!isset($_SESSION['user'])) { ?>
                        <input type="submit" value="Войти" class="btn btn_enter" id="btn_modal_open">
                    <?php } else { ?>
                        <div class="header-btns__user-account_link-block" id="avatarContainer">
                            <img src="<?= $_SESSION['user']['avatar'] ?>" alt=""
                                class="user-account__link-block_img avatar-img">
                            <a href="/vendor/functions/logout.php" class="header-btns__user-account-link exit-link">
                                <img src="/assets/img/icons/exit.svg" alt="Выход" class="user-account__link-block_img exit-icon">
                            </a>
                        </div>
                    <?php } ?>
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