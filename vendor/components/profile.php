<?php 
$title = 'Профиль';
include 'header.php';
?>
<div class="container">
    <div class="main-container">
        <aside class="aside-nav">
            <nav class="nav">
                <div class="nav_up">
                    <a href="/" class="nav-link">
                        <div class="nav-item">
                            <div class="nav-item--icon"><img src="/assets/img/icons/home.svg" draggable="false" alt="">
                            </div>
                            <div class="nav-item--text">
                                <p>Домашняя страница</p>
                            </div>
                        </div>
                    </a>
                    <a href="/vendor/components/questions.php" class="nav-link">
                        <div class="nav-item">
                            <div class="nav-item--icon"><img src="/assets/img/icons/quest.svg" draggable="false" alt="">
                            </div>
                            <div class="nav-item--text">
                                <p>Вопросы</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="nav_down">
                    <a href="/vendor/components/profile.php" class="nav-link">
                        <div class="nav-item">
                            <div class="nav-item--icon"><img src="/assets/img/icons/users-active.svg" draggable="false"
                                    alt="">
                            </div>
                            <div class="nav-item--text active-nav">
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
                    <a href="" class="nav-link">
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
            <section class="user-profile">
                <div class="user-profile__avatar">
                    <img src="/assets/img/avatar/user1.png" alt="user avatar" class="user-profile__avatar-img">
                </div>
                <div class="user-profile__information">
                    <div class="user-profile__information-container">
                        <div class="user-profile__information_name">
                            <p class="user-profile__information_name-text">Nikita Lobodin</p>
                        </div>
                        <div class="user-profile__information-wrapper">
                            <div class="user-profile__info">
                                <img class="user-profile__information_svg" src="/assets/img/icons/birth.svg"
                                    alt="pancake">
                                <p class="user-profile__information_text">Участник 11 дней</p>
                            </div>
                            <div class="user-profile__info">
                                <img class="user-profile__information_svg" src="/assets/img/icons/clock.svg"
                                    alt="pancake">
                                <p class="user-profile__information_text">Последний раз был вчера</p>
                            </div>
                            <div class="user-profile__info">
                                <img class="user-profile__information_svg" src="/assets/img/icons/geo.svg"
                                    alt="pancake">
                                <p class="user-profile__information_text">Омск</p>
                            </div>
                        </div>
                    </div>
                    <div class="user-profile__edit">
                        <button class="user-profile__edit_btn">
                            <img class="user-profile__edit_pencil" src="/assets/img/icons/edit.svg" alt="pencil">
                            <p class="user-profile__edit_text">Редактировать профиль</p>
                        </button>
                    </div>
                </div>
            </section>
            <section class="user-btns">
                <button class="user-btns__btn user-btns__btn-active">Профиль</button>
                <button class="user-btns__btn">Настройки</button>
                <button class="user-btns__btn">Награды</button>
            </section>
            <section class="user-info">
                <div class="user-info__upper">
                    <article class="user-info__statistic">
                        <p class="user-info__statistic_title">Статистика</p>
                        <div class="user-info__statistic_wrapper">
                            <div class="user-info__statistic_reputation-answers">
                                <div class="user-info__statistic_reputation">
                                    <p class="user-info__statistic_number">1</p>
                                    <p class="user-info__statistic_text">репутация</p>
                                </div>
                                <div class="user-info__statistic_answer">
                                    <p class="user-info__statistic_number">0</p>
                                    <p class="user-info__statistic_text">ответы</p>
                                </div>
                            </div>
                            <div class="user-info__statistic_questions">
                                <p class="user-info__statistic_number">0</p>
                                <p class="user-info__statistic_text">ответы</p>
                            </div>
                        </div>
                    </article>
                    <article class="user-info__about-me">
                        <p class="user-info__about-me_title">
                            Обо мне
                        </p>
                        <div class="user-info__about-me_wrapper">
                            <p class="user-info__about-me_void">
                                Ваш раздел "Обо мне" в настоящее время пуст
                                Хотите добавить его? <a href="#">Редактировать профиль</a>
                            </p>
                        </div>
                    </article>
                </div>
                <div class="user-info__bottom">
                    <article class="user-info__posts">
                        <div class="user-info__posts_title">
                            Посты
                        </div>
                        <div class="user-info__posts_wrapper">
                            <p class="user-info__posts_void">
                                Здесь будут отображаться ваши вопросы, ответы.
                                Начните с <a href="/vendor/components/questions.php">ответа на вопросы</a> или <a href="#">задайте свой</a>
                            </p>
                        </div>
                    </article>
                </div>
            </section>
        </main>
    </div>
</div>

<?php
        include 'footer.php';
        ?>