<?php
$title = 'Пользователи';
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
$core_path = '../functions/core.php';
include 'header.php';
include '../functions/showAllUsers.php';
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
                            <input type="search" id="userSearch" class="users-container__search" placeholder="Введите имя пользователя">
                        </div>
                    </div>
                    <div class="users-container__filters">
                        <div class="filter-bar">
                            <a class="filter-link" href="?reputation"><button
                                    class="filter-bar__btn <?= (!isset($_GET['reputation']) && !isset($_GET['newusers']) && !isset($_GET['questions']) && !isset($_GET['answers']) ? 'active-btn' : (isset($_GET['reputation']) ? 'active-btn' : '')) ?>">Репутация</button>
                            </a>
                            <a class="filter-link" href="?newusers">
                                <button
                                    class="filter-bar__btn <?= isset($_GET['newusers']) ? 'active-btn' : '' ?>">Новые
                                    пользователи</button>
                            </a>
                            <a class="filter-link" href="?questions">
                                <button
                                    class="filter-bar__btn <?= isset($_GET['questions']) ? 'active-btn' : '' ?>">Вопросы</button>
                            </a>
                            <a class="filter-link" href="?answers">
                                <button
                                    class="filter-bar__btn <?= isset($_GET['answers']) ? 'active-btn' : '' ?>">Ответы</button>
                            </a>
                        </div>
                    </div>
            </div>
            </header>
            <main class="users-container__main">
                <div class="users-container__users-grid" id="usersGrid">
                    <?php foreach ($users as $user) { ?>
                        <article class="users-container__user-profile" data-username="<?= mb_strtolower($user['nickname'], 'UTF-8') ?>">
                            <div class="users-container__user-profile_img-wrapper">
                                <img src="<?= $user['avatar'] ?>" class="users-container__user-profile_img">
                            </div>
                            <div class="users-container__user-profile_text-wrapper">
                                <a href="user.php?id=<?= $user['id'] ?>" class="users-container__user-profile_name">
                                    <?=$user['nickname'] ?>
                                </a>
                                <p class="users-container__user-profile_location">
                                    <?= $user['location'] ?? 'Город не указан' ?>
                                </p>
                                <p class="users-container__user-profile_reputation">
                                    <?= $user['reputation'] ?>
                                </p>
                                <p class="users-container__user-profile_registration-date">с
                                    <?= $user['created_at'] ?>
                                </p>
                            </div>
                        </article>
                    <?php } ?>
                </div>
            </main>
            <footer class="users-container__footer">
            <section class="pagination">
                    <?php if ($totalPages > 1): ?>
                        <?php if ($page > 1): ?>
                            <button class="pagination-prev-btn"
                                onclick="window.location.href='?<?= http_build_query(array_merge($_GET, ['page' => $page - 1])) ?>'">Предыдущая</button>
                        <?php endif; ?>

                        <?php
                        // Показываем ограниченное количество кнопок страниц
                        $start = max(1, $page - 2);
                        $end = min($totalPages, $page + 2);

                        if ($start > 1): ?>
                            <button class="pagination-item"
                                onclick="window.location.href='?<?= http_build_query(array_merge($_GET, ['page' => 1])) ?>'">1</button>
                            <?php if ($start > 2): ?>
                                <div class="pagination-points">...</div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php for ($i = $start; $i <= $end; $i++): ?>
                            <button class="pagination-item <?= $i == $page ? 'pagination-item-active' : '' ?>"
                                onclick="window.location.href='?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>'">
                                <?= $i ?>
                            </button>
                        <?php endfor; ?>

                        <?php if ($end < $totalPages): ?>
                            <?php if ($end < $totalPages - 1): ?>
                                <div class="pagination-points">...</div>
                            <?php endif; ?>
                            <button class="pagination-item"
                                onclick="window.location.href='?<?= http_build_query(array_merge($_GET, ['page' => $totalPages])) ?>'">
                                <?= $totalPages ?>
                            </button>
                        <?php endif; ?>

                        <?php if ($page < $totalPages): ?>
                            <button class="pagination-next-btn"
                                onclick="window.location.href='?<?= http_build_query(array_merge($_GET, ['page' => $page + 1])) ?>'">Следующая</button>
                        <?php endif; ?>
                    <?php endif; ?>
                </section>
            </footer>
    </div>
    </main>
</div>
</div>

<?php
include 'modals/modal.php';
include 'modals/modal-prompt.php';
include 'modals/pop-up.php';
include 'footer.php'
    ?>