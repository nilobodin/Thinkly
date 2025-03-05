<?php $title = 'Пользователи';
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
                            <div class="nav-item--icon"><img src="/assets/img/icons/user.svg" draggable="false"
                                    alt="">
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
                            <div class="nav-item--icon"><img src="/assets/img/icons/users-active.svg" draggable="false" alt="">
                            </div>
                            <div class="nav-item--text active-nav">
                                <p>Пользователи</p>
                            </div>
                        </div>
                    </a>
                </div>
            </nav>
        </aside>
        <main class="main">
            
        </main>
    </div>
</div>

<?php
include 'footer.php';
?>