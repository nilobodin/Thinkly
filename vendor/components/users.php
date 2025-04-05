<?php
$title = 'Пользователи';
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
$core_path = '../functions/core.php';
include 'header.php';

include '../functions/showUsers.php';
?>
<div class="container">
    <div class="main-container">
        <?php include 'aside.php' ?>
        <main class="main">
            <div class="users-container">
                <header class="users-container__header">
                    <div class="users-container__title-search">
                        <p class="users-container__title">
                            Пользователи
                        </p>
                        <div class="users-container__search-wrapper">
                            <img src="/assets/img/icons/search-loupe.svg" class="users-container__search-icon">
                            <input type="search" class="users-container__search" placeholder="Введите имя пользователя">
                        </div>
                    </div>
                    <div class="users-container__filters">
                        <div class="filter-bar">
                            <button class="filter-bar__btn active-btn">Репутация</button>
                            <button class="filter-bar__btn">Новые пользователи</button>
                            <button class="filter-bar__btn">Вопросы</button>
                            <button class="filter-bar__btn">Ответы</button>
                        </div>
                    </div>
                </header>
                <main class="users-container__main">
                    <div class="users-container__users-grid">
                        <?php foreach ($users as $user) { ?>
                            <article class="users-container__user-profile">
                                <div class="users-container__user-profile_img-wrapper">
                                    <img src="<?= $user['avatar'] ?>" class="users-container__user-profile_img">
                                </div>
                                <div class="users-container__user-profile_text-wrapper">
                                    <a href="user.php?id=<?= $user['id'] ?>" class="users-container__user-profile_name"><?= $user['nickname'] ?></a>
                                    <p class="users-container__user-profile_location"><?= $user['location'] ?? 'Город не указан' ?></p>
                                    <p class="users-container__user-profile_reputation"><?= $user['reputation'] ?></p>
                                    <p class="users-container__user-profile_registration-date">с <?= $user['created_at'] ?></p>
                                </div>
                            </article>
                        <?php } ?>
                    </div>
                </main>
                <footer class="users-container__footer">
                    <section class="pagination users-pagination">
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
                </footer>
            </div>
        </main>
    </div>
</div>

<?php 
include 'modals/modal.php';
include 'modals/pop-up.php';
include 'footer.php' 
?>