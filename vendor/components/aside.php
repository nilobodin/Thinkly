<aside class="aside-nav">
    <nav class="nav">
        <div class="nav_up">
            <a href="/" class="nav-link">
                <div class="nav-item">
                    <div class="nav-item--icon">
                        <img src="<?= ($currentPage === "index") ? '/assets/img/icons/home-active.svg' : '/assets/img/icons/home.svg'?>" draggable="false" alt="Домашняя страница">
                    </div>
                    <div class="nav-item--text <?= ($currentPage === "index") ? 'active-nav' : ''?>">
                        <p>Домашняя страница</p>
                    </div>
                </div>
            </a>
            <a href="/vendor/components/questions.php" class="nav-link">
                <div class="nav-item">
                    <div class="nav-item--icon"><img src="<?= ($currentPage === "questions") ? '/assets/img/icons/quest-active.svg' : '/assets/img/icons/quest.svg'?>" draggable="false" alt="">
                    </div>
                    <div class="nav-item--text <?= ($currentPage === "questions") ? 'active-nav' : ''?>">
                        <p>Вопросы</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="nav_down">
        <?php if (isset($_SESSION['user'])) { ?>
            <a href="/vendor/components/profile.php" class="nav-link">
                <div class="nav-item">
                    <div class="nav-item--icon"><img src="<?= ($currentPage === "profile") ? '/assets/img/icons/user-active.svg' : '/assets/img/icons/user.svg'?>" draggable="false" alt="">
                    </div>
                    <div class="nav-item--text <?= ($currentPage === "profile") ? 'active-nav' : ''?>">
                        <p>Профиль</p>
                    </div>
                </div>
            </a>
        <?php } ?>
            <a href="/vendor/components/awards.php" class="nav-link">
                <div class="nav-item">
                    <div class="nav-item--icon"><img src="<?= ($currentPage === "awards") ? '/assets/img/icons/trofy-active.svg' : '/assets/img/icons/trofy.svg'?>" draggable="false" alt="">
                    </div>
                    <div class="nav-item--text <?= ($currentPage === "awards") ? 'active-nav' : ''?>">
                        <p>Награды</p>
                    </div>
                </div>
            </a>
            <a href="/vendor/components/users.php" class="nav-link">
                <div class="nav-item">
                    <div class="nav-item--icon"><img src="<?= ($currentPage === "users") ? '/assets/img/icons/users-active.svg' : '/assets/img/icons/users.svg'?>" draggable="false" alt="">
                    </div>
                    <div class="nav-item--text <?= ($currentPage === "users") ? 'active-nav' : ''?>">
                        <p>Пользователи</p>
                    </div>
                </div>
            </a>
        </div>
    </nav>
</aside>