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
                            Новейшие вопросы
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
                            24 вопроса
                        </p>
                    </div>
                    <div class="filter-bar">
                        <button class="filter-bar__btn active-btn">Все вопросы</button>
                        <button class="filter-bar__btn">Без ответа</button>
                        <button class="filter-bar__btn">Счёт</button>
                        <button class="filter-bar__btn">Популярные</button>
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
                                                <img src="<?= $question['avatar'] ?>" alt="аватар" title="<?= $question['nickname'] ?>">
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
<?php
include 'modals/modal.php';
include 'modals/modal-prompt.php';
include 'modals/pop-up.php';
include 'footer.php'
    ?>