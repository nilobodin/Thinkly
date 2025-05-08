<?php
$title = 'Вопросы';
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
$core_path = '../functions/core.php';
include 'header.php';

include '../functions/showAllQuestions.php';
include '../functions/timeAgo.php';
?>
<div class="container">
    <div class="main-container">
        <?php include 'aside.php' ?>
        <main class="main">
            <section class="filter">
                <div class="filter-top">
                    <div class="filter-title">
                        <p>
                            <?php
                            if (isset($_GET['allQuestions'])) {
                                echo "<p>Все вопросы</p>";
                            } elseif (isset($_GET['noAnswer'])) {
                                echo "<p>Без ответов</p>";
                            } elseif (isset($_GET['Popular'])) {
                                echo "<p>Популярные</p>";
                            } elseif (empty($_GET)) {
                                echo "<p>Все вопросы</p>";
                            }
                            ?>
                        </p>
                    </div>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <a href="ask.php">
                            <button class="btn btn-add-question">
                                Задать вопрос
                            </button>
                        </a>
                    <?php } else { ?>
                        <button class="btn btn-add-question" id="ask-question-btn">
                            Задать вопрос
                        </button>
                    <?php } ?>
                </div>
                <div class="filter-down">
                    <div class="filter-count">
                        <p>
                            <?= $totalQuestions ?> вопроса
                        </p>
                    </div>
                    <div class="filter-bar">
                        <a class="filter-link" href="?allQuestions"><button type="submit" name="filter"
                                value="allQuestions"
                                class="filter-bar__btn <?= (!isset($_GET['allQuestions']) && !isset($_GET['noAnswer']) && !isset($_GET['Popular']) ? 'active-btn' : (isset($_GET['allQuestions']) ? 'active-btn' : '')) ?>">
                                Все вопросы
                            </button>
                        </a>
                        <a class="filter-link" href="?noAnswer"><button type="submit" name="filter" value="noAnswer"
                                class="filter-bar__btn <?= isset($_GET['noAnswer']) ? 'active-btn' : '' ?>">
                                Без ответа
                            </button>
                        </a>
                        <a class="filter-link" href="?Popular"><button type="submit" name="filter"
                                value="popularQuestions"
                                class="filter-bar__btn <?= isset($_GET['Popular']) ? 'active-btn' : '' ?>">
                                Популярные
                            </button>
                        </a>
                    </div>
                </div>
            </section>
            <section class="user-questions">
                <main class="user-questions__main">
                    <?php foreach ($questions as $question) {
                        $timeAgo = timeAgo($question['created_at']);
                        // Фильтруем теги только для текущего вопроса
                        $questionTags = array_filter($allTags, function ($tag) use ($question) {
                            return $tag['question_id'] == $question['id'];
                        });
                        ?>
                        <article class="question">
                            <header class="question-header">
                                <div class="question-vote">
                                    <p>
                                        <?= $question['votes'] ?> голоса
                                    </p>
                                </div>
                                <a href="question.php/?id=<?= $question['id'] ?>">
                                    <div class="questions-title">
                                        <p class="questions-title__link">
                                            <?= $question['title'] ?>
                                        </p>
                                    </div>
                                </a>
                            </header>
                            <main class="question-main">
                                <div class="question-answer">
                                    <p>
                                        <?= $question['answers'] ?> ответы
                                    </p>
                                </div>
                                <div class="question-description">
                                    <p>
                                        <?= $question['description'] ?>
                                    </p>
                                </div>
                            </main>
                            <footer class="question-footer">
                                <div class="question-views-tags">
                                    <div class="question-views">
                                        <p>
                                            <?= $question['views'] ?> просмотров
                                        </p>
                                    </div>
                                    <div class="question-tags">
                                        <?php foreach ($questionTags as $tag) { ?>
                                            <a href="">
                                                <div class="question-tag">
                                                    <p>
                                                        <?= $tag['tag_name'] ?>
                                                    </p>
                                                </div>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="question-meta">
                                    <a href="user.php?id=<?= $question['user_id'] ?>" class="question-user-link">
                                        <div class="question-user">
                                            <div class="question-user__avatar">
                                                <img src="<?= $question['avatar'] ?>" alt="аватар"
                                                    title="<?= $question['nickname'] ?>">
                                            </div>
                                            <div class="question-user__name">
                                                <?= $question['nickname'] ?>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="question-quest-count">
                                        <p>
                                            <?= $question['answers_count'] ?? '0' ?> ответы
                                        </p>
                                    </div>
                                    <div class="question-time">
                                        <time>
                                            <?= $timeAgo ?>
                                        </time>
                                    </div>
                                </div>
                            </footer>
                        </article>
                    <?php } ?>
                </main>
            </section>
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
        </main>
    </div>
</div>
<script src="/assets/js/filter_questions.js"></script>
<?php
include 'modals/modal.php';
include 'modals/modal-prompt.php';
include 'modals/pop-up.php';
include 'footer.php'
    ?>