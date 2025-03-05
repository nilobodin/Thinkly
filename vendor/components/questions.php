<?php 
$title = 'Вопросы';
include 'header.php'
?>
<div class="container">
    <div class="main-container">
        <aside class="aside-nav">
            <nav class="nav">
                <div class="nav_up">
                    <a href="/" class="nav-link">
                        <div class="nav-item">
                            <div class="nav-item--icon"><img src="/assets/img/icons/home.svg" draggable="false"
                                    alt=""></div>
                            <div class="nav-item--text">
                                <p>Домашняя страница</p>
                            </div>
                        </div>
                    </a>
                    <a href="/vendor/components/questions.php" class="nav-link">
                        <div class="nav-item">
                            <div class="nav-item--icon"><img src="/assets/img/icons/quest-active.svg" draggable="false" alt="">
                            </div>
                            <div class="nav-item--text active-nav">
                                <p>Вопросы</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="nav_down">
                    <a href="/vendor/components/profile.php" class="nav-link">
                        <div class="nav-item">
                            <div class="nav-item--icon"><img src="/assets/img/icons/user.svg" draggable="false" alt="">
                            </div>
                            <div class="nav-item--text">
                                <p>Профиль</p>
                            </div>
                        </div>
                    </a>
                    <a href="" class="nav-link">
                        <div class="nav-item">
                            <div class="nav-item--icon"><img src="/assets/img/icons/trofy.svg" draggable="false" alt="">
                            </div>
                            <div class="nav-item--text">
                                <p>Награды</p>
                            </div>
                        </div>
                    </a>
                    <a href="/vendor/components/users.php" class="nav-link">
                        <div class="nav-item">
                            <div class="nav-item--icon"><img src="/assets/img/icons/users.svg" draggable="false" alt="">
                            </div>
                            <div class="nav-item--text">
                                <p>Пользователи</p>
                            </div>
                        </div>
                    </a>
                </div>
            </nav>
        </aside>
        <main class="main">
            <section class="filter">
                <div class="filter-top">
                    <div class="filter-title">
                        <p>
                            Новейшие вопросы
                        </p>
                    </div>
                    <button class="btn btn-add-question">
                        Задать вопрос
                    </button>
                </div>
                <div class="filter-down">
                    <div class="filter-count">
                        <p>
                            24 вопроса
                        </p>
                    </div>
                    <div class="filter-bar">
                        <button class="filter-bar__btn active-btn">Новейшие</button>
                        <button class="filter-bar__btn">Без ответа</button>
                        <button class="filter-bar__btn">Счёт</button>
                        <button class="filter-bar__btn">Популярные</button>
                    </div>
                </div>
            </section>
            <section class="user-questions">
                <main class="user-questions__main">
                    <article class="question">
                        <header class="question-header">
                            <div class="question-vote">
                                <p>
                                    0 голоса
                                </p>
                            </div>
                            <a href="">
                                <div class="question-title">
                                    <p>
                                        Как получить детальный доступ к DynamoDB, работая с предполагаемыми
                                        разрешениями?
                                    </p>
                                </div>
                            </a>
                        </header>
                        <main class="question-main">
                            <div class="question-answer">
                                <p>
                                    0 ответы
                                </p>
                            </div>
                            <div class="question-description">
                                <p>
                                    Я пытаюсь получить доступ к DynamoDB с подробным описанием, приняв роль IAM,
                                    используя политику для указания строк, которые мой пользователь может запрашивать,
                                    согласно...
                                </p>
                            </div>
                        </main>
                        <footer class="question-footer">
                            <div class="question-views-tags">
                                <div class="question-views">
                                    <p>
                                        2757 просмотров
                                    </p>
                                </div>
                                <div class="question-tags">
                                    <a href="">
                                        <div class="question-tag">
                                            <p>JavaScript</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>PHP</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>MySQL</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="question-meta">
                                <div class="question-user">
                                    <div class="question-user__avatar">
                                        <img src="/assets/img/avatar.png" alt="">
                                    </div>
                                    <div class="question-user__name">
                                        Первый пользователь
                                    </div>
                                </div>
                                <div class="question-quest-count">
                                    <p>
                                        750 вопросов
                                    </p>
                                </div>
                                <div class="question-time">
                                    <time>12 минут назад</time>
                                </div>
                            </div>
                        </footer>
                    </article>
                    <article class="question">
                        <header class="question-header">
                            <div class="question-vote">
                                <p>
                                    0 голоса
                                </p>
                            </div>
                            <a href="">
                                <div class="question-title">
                                    <p>
                                        Как получить детальный доступ к DynamoDB, работая с предполагаемыми
                                        разрешениями?
                                    </p>
                                </div>
                            </a>
                        </header>
                        <main class="question-main">
                            <div class="question-answer">
                                <p>
                                    0 ответы
                                </p>
                            </div>
                            <div class="question-description">
                                <p>
                                    Я пытаюсь получить доступ к DynamoDB с подробным описанием, приняв роль IAM,
                                    используя политику для указания строк, которые мой пользователь может запрашивать,
                                    согласно...
                                </p>
                            </div>
                        </main>
                        <footer class="question-footer">
                            <div class="question-views-tags">
                                <div class="question-views">
                                    <p>
                                        2757 просмотров
                                    </p>
                                </div>
                                <div class="question-tags">
                                    <a href="">
                                        <div class="question-tag">
                                            <p>JavaScript</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>PHP</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>MySQL</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="question-meta">
                                <div class="question-user">
                                    <div class="question-user__avatar">
                                        <img src="/assets/img/avatar.png" alt="">
                                    </div>
                                    <div class="question-user__name">
                                        Первый пользователь
                                    </div>
                                </div>
                                <div class="question-quest-count">
                                    <p>
                                        750 вопросов
                                    </p>
                                </div>
                                <div class="question-time">
                                    <time>12 минут назад</time>
                                </div>
                            </div>
                        </footer>
                    </article>
                    <article class="question">
                        <header class="question-header">
                            <div class="question-vote">
                                <p>
                                    0 голоса
                                </p>
                            </div>
                            <a href="">
                                <div class="question-title">
                                    <p>
                                        Как получить детальный доступ к DynamoDB, работая с предполагаемыми
                                        разрешениями?
                                    </p>
                                </div>
                            </a>
                        </header>
                        <main class="question-main">
                            <div class="question-answer">
                                <p>
                                    0 ответы
                                </p>
                            </div>
                            <div class="question-description">
                                <p>
                                    Я пытаюсь получить доступ к DynamoDB с подробным описанием, приняв роль IAM,
                                    используя политику для указания строк, которые мой пользователь может запрашивать,
                                    согласно...
                                </p>
                            </div>
                        </main>
                        <footer class="question-footer">
                            <div class="question-views-tags">
                                <div class="question-views">
                                    <p>
                                        2757 просмотров
                                    </p>
                                </div>
                                <div class="question-tags">
                                    <a href="">
                                        <div class="question-tag">
                                            <p>JavaScript</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>PHP</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>MySQL</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="question-meta">
                                <div class="question-user">
                                    <div class="question-user__avatar">
                                        <img src="/assets/img/avatar.png" alt="">
                                    </div>
                                    <div class="question-user__name">
                                        Первый пользователь
                                    </div>
                                </div>
                                <div class="question-quest-count">
                                    <p>
                                        750 вопросов
                                    </p>
                                </div>
                                <div class="question-time">
                                    <time>12 минут назад</time>
                                </div>
                            </div>
                        </footer>
                    </article>
                    <article class="question">
                        <header class="question-header">
                            <div class="question-vote">
                                <p>
                                    0 голоса
                                </p>
                            </div>
                            <a href="">
                                <div class="question-title">
                                    <p>
                                        Как получить детальный доступ к DynamoDB, работая с предполагаемыми
                                        разрешениями?
                                    </p>
                                </div>
                            </a>
                        </header>
                        <main class="question-main">
                            <div class="question-answer">
                                <p>
                                    0 ответы
                                </p>
                            </div>
                            <div class="question-description">
                                <p>
                                    Я пытаюсь получить доступ к DynamoDB с подробным описанием, приняв роль IAM,
                                    используя политику для указания строк, которые мой пользователь может запрашивать,
                                    согласно...
                                </p>
                            </div>
                        </main>
                        <footer class="question-footer">
                            <div class="question-views-tags">
                                <div class="question-views">
                                    <p>
                                        2757 просмотров
                                    </p>
                                </div>
                                <div class="question-tags">
                                    <a href="">
                                        <div class="question-tag">
                                            <p>JavaScript</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>PHP</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>MySQL</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="question-meta">
                                <div class="question-user">
                                    <div class="question-user__avatar">
                                        <img src="/assets/img/avatar.png" alt="">
                                    </div>
                                    <div class="question-user__name">
                                        Первый пользователь
                                    </div>
                                </div>
                                <div class="question-quest-count">
                                    <p>
                                        750 вопросов
                                    </p>
                                </div>
                                <div class="question-time">
                                    <time>12 минут назад</time>
                                </div>
                            </div>
                        </footer>
                    </article>
                    <article class="question">
                        <header class="question-header">
                            <div class="question-vote">
                                <p>
                                    0 голоса
                                </p>
                            </div>
                            <a href="">
                                <div class="question-title">
                                    <p>
                                        Как получить детальный доступ к DynamoDB, работая с предполагаемыми
                                        разрешениями?
                                    </p>
                                </div>
                            </a>
                        </header>
                        <main class="question-main">
                            <div class="question-answer">
                                <p>
                                    0 ответы
                                </p>
                            </div>
                            <div class="question-description">
                                <p>
                                    Я пытаюсь получить доступ к DynamoDB с подробным описанием, приняв роль IAM,
                                    используя политику для указания строк, которые мой пользователь может запрашивать,
                                    согласно...
                                </p>
                            </div>
                        </main>
                        <footer class="question-footer">
                            <div class="question-views-tags">
                                <div class="question-views">
                                    <p>
                                        2757 просмотров
                                    </p>
                                </div>
                                <div class="question-tags">
                                    <a href="">
                                        <div class="question-tag">
                                            <p>JavaScript</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>PHP</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>MySQL</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="question-meta">
                                <div class="question-user">
                                    <div class="question-user__avatar">
                                        <img src="/assets/img/avatar.png" alt="">
                                    </div>
                                    <div class="question-user__name">
                                        Первый пользователь
                                    </div>
                                </div>
                                <div class="question-quest-count">
                                    <p>
                                        750 вопросов
                                    </p>
                                </div>
                                <div class="question-time">
                                    <time>12 минут назад</time>
                                </div>
                            </div>
                        </footer>
                    </article>
                    <article class="question">
                        <header class="question-header">
                            <div class="question-vote">
                                <p>
                                    0 голоса
                                </p>
                            </div>
                            <a href="">
                                <div class="question-title">
                                    <p>
                                        Как получить детальный доступ к DynamoDB, работая с предполагаемыми
                                        разрешениями?
                                    </p>
                                </div>
                            </a>
                        </header>
                        <main class="question-main">
                            <div class="question-answer">
                                <p>
                                    0 ответы
                                </p>
                            </div>
                            <div class="question-description">
                                <p>
                                    Я пытаюсь получить доступ к DynamoDB с подробным описанием, приняв роль IAM,
                                    используя политику для указания строк, которые мой пользователь может запрашивать,
                                    согласно...
                                </p>
                            </div>
                        </main>
                        <footer class="question-footer">
                            <div class="question-views-tags">
                                <div class="question-views">
                                    <p>
                                        2757 просмотров
                                    </p>
                                </div>
                                <div class="question-tags">
                                    <a href="">
                                        <div class="question-tag">
                                            <p>JavaScript</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>PHP</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>MySQL</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="question-meta">
                                <div class="question-user">
                                    <div class="question-user__avatar">
                                        <img src="/assets/img/avatar.png" alt="">
                                    </div>
                                    <div class="question-user__name">
                                        Первый пользователь
                                    </div>
                                </div>
                                <div class="question-quest-count">
                                    <p>
                                        750 вопросов
                                    </p>
                                </div>
                                <div class="question-time">
                                    <time>12 минут назад</time>
                                </div>
                            </div>
                        </footer>
                    </article>
                    <article class="question">
                        <header class="question-header">
                            <div class="question-vote">
                                <p>
                                    0 голоса
                                </p>
                            </div>
                            <a href="">
                                <div class="question-title">
                                    <p>
                                        Как получить детальный доступ к DynamoDB, работая с предполагаемыми
                                        разрешениями?
                                    </p>
                                </div>
                            </a>
                        </header>
                        <main class="question-main">
                            <div class="question-answer">
                                <p>
                                    0 ответы
                                </p>
                            </div>
                            <div class="question-description">
                                <p>
                                    Я пытаюсь получить доступ к DynamoDB с подробным описанием, приняв роль IAM,
                                    используя политику для указания строк, которые мой пользователь может запрашивать,
                                    согласно...
                                </p>
                            </div>
                        </main>
                        <footer class="question-footer">
                            <div class="question-views-tags">
                                <div class="question-views">
                                    <p>
                                        2757 просмотров
                                    </p>
                                </div>
                                <div class="question-tags">
                                    <a href="">
                                        <div class="question-tag">
                                            <p>JavaScript</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>PHP</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>MySQL</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="question-meta">
                                <div class="question-user">
                                    <div class="question-user__avatar">
                                        <img src="/assets/img/avatar.png" alt="">
                                    </div>
                                    <div class="question-user__name">
                                        Первый пользователь
                                    </div>
                                </div>
                                <div class="question-quest-count">
                                    <p>
                                        750 вопросов
                                    </p>
                                </div>
                                <div class="question-time">
                                    <time>12 минут назад</time>
                                </div>
                            </div>
                        </footer>
                    </article>
                    <article class="question">
                        <header class="question-header">
                            <div class="question-vote">
                                <p>
                                    0 голоса
                                </p>
                            </div>
                            <a href="">
                                <div class="question-title">
                                    <p>
                                        Как получить детальный доступ к DynamoDB, работая с предполагаемыми
                                        разрешениями?
                                    </p>
                                </div>
                            </a>
                        </header>
                        <main class="question-main">
                            <div class="question-answer">
                                <p>
                                    0 ответы
                                </p>
                            </div>
                            <div class="question-description">
                                <p>
                                    Я пытаюсь получить доступ к DynamoDB с подробным описанием, приняв роль IAM,
                                    используя политику для указания строк, которые мой пользователь может запрашивать,
                                    согласно...
                                </p>
                            </div>
                        </main>
                        <footer class="question-footer">
                            <div class="question-views-tags">
                                <div class="question-views">
                                    <p>
                                        2757 просмотров
                                    </p>
                                </div>
                                <div class="question-tags">
                                    <a href="">
                                        <div class="question-tag">
                                            <p>JavaScript</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>PHP</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>MySQL</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="question-meta">
                                <div class="question-user">
                                    <div class="question-user__avatar">
                                        <img src="/assets/img/avatar.png" alt="">
                                    </div>
                                    <div class="question-user__name">
                                        Первый пользователь
                                    </div>
                                </div>
                                <div class="question-quest-count">
                                    <p>
                                        750 вопросов
                                    </p>
                                </div>
                                <div class="question-time">
                                    <time>12 минут назад</time>
                                </div>
                            </div>
                        </footer>
                    </article>
                    <article class="question">
                        <header class="question-header">
                            <div class="question-vote">
                                <p>
                                    0 голоса
                                </p>
                            </div>
                            <a href="">
                                <div class="question-title">
                                    <p>
                                        Как получить детальный доступ к DynamoDB, работая с предполагаемыми
                                        разрешениями?
                                    </p>
                                </div>
                            </a>
                        </header>
                        <main class="question-main">
                            <div class="question-answer">
                                <p>
                                    0 ответы
                                </p>
                            </div>
                            <div class="question-description">
                                <p>
                                    Я пытаюсь получить доступ к DynamoDB с подробным описанием, приняв роль IAM,
                                    используя политику для указания строк, которые мой пользователь может запрашивать,
                                    согласно...
                                </p>
                            </div>
                        </main>
                        <footer class="question-footer">
                            <div class="question-views-tags">
                                <div class="question-views">
                                    <p>
                                        2757 просмотров
                                    </p>
                                </div>
                                <div class="question-tags">
                                    <a href="">
                                        <div class="question-tag">
                                            <p>JavaScript</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>PHP</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>MySQL</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="question-meta">
                                <div class="question-user">
                                    <div class="question-user__avatar">
                                        <img src="/assets/img/avatar.png" alt="">
                                    </div>
                                    <div class="question-user__name">
                                        Первый пользователь
                                    </div>
                                </div>
                                <div class="question-quest-count">
                                    <p>
                                        750 вопросов
                                    </p>
                                </div>
                                <div class="question-time">
                                    <time>12 минут назад</time>
                                </div>
                            </div>
                        </footer>
                    </article>
                    <article class="question">
                        <header class="question-header">
                            <div class="question-vote">
                                <p>
                                    0 голоса
                                </p>
                            </div>
                            <a href="">
                                <div class="question-title">
                                    <p>
                                        Как получить детальный доступ к DynamoDB, работая с предполагаемыми
                                        разрешениями?
                                    </p>
                                </div>
                            </a>
                        </header>
                        <main class="question-main">
                            <div class="question-answer">
                                <p>
                                    0 ответы
                                </p>
                            </div>
                            <div class="question-description">
                                <p>
                                    Я пытаюсь получить доступ к DynamoDB с подробным описанием, приняв роль IAM,
                                    используя политику для указания строк, которые мой пользователь может запрашивать,
                                    согласно...
                                </p>
                            </div>
                        </main>
                        <footer class="question-footer">
                            <div class="question-views-tags">
                                <div class="question-views">
                                    <p>
                                        2757 просмотров
                                    </p>
                                </div>
                                <div class="question-tags">
                                    <a href="">
                                        <div class="question-tag">
                                            <p>JavaScript</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>PHP</p>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="question-tag">
                                            <p>MySQL</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="question-meta">
                                <div class="question-user">
                                    <div class="question-user__avatar">
                                        <img src="/assets/img/avatar.png" alt="">
                                    </div>
                                    <div class="question-user__name">
                                        Первый пользователь
                                    </div>
                                </div>
                                <div class="question-quest-count">
                                    <p>
                                        750 вопросов
                                    </p>
                                </div>
                                <div class="question-time">
                                    <time>12 минут назад</time>
                                </div>
                            </div>
                        </footer>
                    </article>
                </main>
            </section>
            <section class="pagination">
                <button class="pagination-item pagination-item-active">1</button>
                <button class="pagination-item">2</button>
                <button class="pagination-item">3</button>
                <button class="pagination-item">4</button>
                <button class="pagination-item">5</button>
                <div class="pagination-points">
                    ...
                </div>
                <button class="pagination-next-btn">Следующая</button>
            </section>
        </main>
    </div>
</div>
<?php include 'footer.php'?>