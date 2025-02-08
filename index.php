<?php 
$title = "Home";
include 'vendor/components/header.php';
?>
<div class="container">
    <div class="main-container">
        <aside class="aside-nav">
            <nav class="nav">
                <div class="nav_up">
                    <a href="" class="nav-link">
                        <div class="nav-item">
                            <div class="nav-item--icon"><img src="/assets/img/icons/home-active.svg" draggable="false" alt=""></div>
                            <div class="nav-item--text active-nav">
                                <p>Домашняя страница</p>
                            </div>
                        </div>
                    </a>
                    <a href="" class="nav-link">
                        <div class="nav-item">
                            <div class="nav-item--icon"><img src="/assets/img/icons/quest.svg" draggable="false" alt=""></div>
                            <div class="nav-item--text">
                                <p>Вопросы</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="nav_down">
                    <a href="" class="nav-link">
                        <div class="nav-item">
                            <div class="nav-item--icon"><img src="/assets/img/icons/user.svg" draggable="false" alt=""></div>
                            <div class="nav-item--text">
                                <p>Профиль</p>
                            </div>
                        </div>
                    </a>
                    <a href="" class="nav-link">
                        <div class="nav-item">
                            <div class="nav-item--icon"><img src="/assets/img/icons/trofy.svg" draggable="false" alt=""></div>
                            <div class="nav-item--text">
                                <p>Награды</p>
                            </div>
                        </div>
                    </a>
                    <a href="" class="nav-link">
                        <div class="nav-item">
                            <div class="nav-item--icon"><img src="/assets/img/icons/users.svg" draggable="false" alt=""></div>
                            <div class="nav-item--text">
                                <p>Пользователи</p>
                            </div>
                        </div>
                    </a>
                </div>
            </nav>
        </aside>
        <main class="main">
            <section class="welcome">
                <div class="welcome-img">
                    <img src="/assets/img/icons/hello.svg" alt="hello!" draggable="false" class="welcome-img">
                </div>
                <div class="welcome-text">
                    <div class="welcome-text__title">
                        <p>
                            Добро пожаловать на Thinkly, Новый пользователь!
                        </p>
                    </div>
                    <div class="welcome-text__description">
                        <p>
                            Получайте ответы на свои вопросы, и помогите другим ответить на их вопросы.
                        </p>
                    </div>
                </div>
            </section>
            <section class="overview">
                <div class="overview-card reputation">
                    <div class="overview-card__title reputation__title">
                        <p>Репутация</p>
                    </div>
                    <div class="reputation__content">
                        <div class="reputation__count">
                            <p>1</p>
                        </div>
                        <div class="reputation__statistic">
                            <img src="/assets/img/overview/statistical-line.png" draggable="false" alt="statistic line">
                        </div>
                    </div>
                    <div class="overview__description reputation__description">
                        <p>
                            Зарабатывайте <span class="overview-span">репутацию</span> задавая
                            вопросы, отвечая на них
                        </p>
                    </div>
                </div>
                <div class="overview-card users">
                    <div class="overview-card__title users__title">
                        <p>Пользователи</p>
                    </div>
                    <div class="users__icons">
                        <div class="users-icon"><img src="/assets/img/overview/user1.png" draggable="false" alt="profile"></div>
                        <div class="users-icon"><img src="/assets/img/overview/user2.png" draggable="false" alt="profile"></div>
                        <div class="users-icon"><img src="/assets/img/overview/user3.png" draggable="false" alt="profile"></div>
                    </div>
                    <div class="overview__description users__description">
                        <p>
                            Просматривай достижения других <span class="overview-span">пользователей</span>, делитесь своими
                        </p>
                    </div>
                </div>
                <div class="overview-card questions">
                    <div class="overview-card__title questions__title">
                        <p>Вопросы</p>
                    </div>
                    <div class="questions__content">
                        <div class="questions__image">
                            <img src="/assets/img/overview/questions.png" draggable="false" alt="question">
                        </div>
                        <div class="overview__description questions__description">
                            <p>
                                Получайте ответы на свои <span class="overview-span">вопросы</span>, и помогите другим найти ответы на их <span class="overview-span">вопросы</span>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>
</body>

</html>