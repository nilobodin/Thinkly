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
            </section>
            <section class="user-btns">
                <button class="user-btns__btn active-profile-btn btn">Профиль</button>
                <button class="user-btns__btn btn">Активность</button>
                <button class="user-btns__btn btn">Настройки</button>
            </section>
        </main>