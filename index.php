<?php
$title = "Домашняя страница";
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
$core_path = 'vendor/functions/core.php';
include 'vendor/components/header.php';

include 'vendor/functions/showAllQuestions.php';
include 'vendor/functions/timeAgo.php';

?>

<div class="container">
    <div class="main-container">
        <?php include 'vendor/components/aside.php' ?>
        <main class="main">
            <?php if (isset($_SESSION['user'])) { ?>
                <section class="welcome">
                    <div class="welcome-img">
                        <img src="/assets/img/icons/hello.svg" alt="hello!" draggable="false" class="welcome-img">
                    </div>
                    <div class="welcome-text">
                        <div class="welcome-text__title">
                            <p class='welcome-text__title_text'>
                                Добро пожаловать на Thinkly,
                                <?= "<span class='welcome-text__title_span'>" . $_SESSION['user']['nickname'] . "</span>" ?>!
                            </p>
                        </div>
                        <div class="welcome-text__description">
                            <p>
                                Получайте ответы на свои вопросы, и помогите другим ответить на их вопросы.
                            </p>
                        </div>
                    </div>
                </section>
            <?php } ?>
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
                            <img src="/assets/img/overview/statistical-line.svg" draggable="false" alt="statistic line">
                        </div>
                    </div>
                    <div class="overview__description reputation__description">
                        <p>
                            Зарабатывайте <span class="overview-span">репутацию</span> задавая
                            вопросы, отвечая на них
                        </p>
                    </div>
                </div>
                <a href="/vendor/components/users.php">
                    <div class="overview-card users">
                        <div class="overview-card__title users__title">
                            <p>Пользователи</p>
                        </div>
                        <div class="users__icons">
                            <div class="users-icon"><img src="/assets/img/overview/user1.svg" draggable="false"
                                    alt="profile"></div>
                            <div class="users-icon"><img src="/assets/img/overview/user2.svg" draggable="false"
                                    alt="profile"></div>
                            <div class="users-icon"><img src="/assets/img/overview/user3.svg" draggable="false"
                                    alt="profile"></div>
                        </div>
                        <div class="overview__description users__description">
                            <p>
                                Просматривай достижения других <span class="overview-span">пользователей</span>,
                                делитесь
                                своими
                            </p>
                        </div>
                    </div>
                </a>
                <a href="/vendor/components/questions.php">
                    <div class="overview-card questions">
                        <div class="overview-card__title questions__title">
                            <p>Вопросы</p>
                        </div>
                        <div class="questions__content">
                            <div class="questions__image">
                                <img src="/assets/img/overview/questions.svg" draggable="false" alt="question">
                            </div>
                            <div class="overview__description questions__description">
                                <p>
                                    Получайте ответы на свои <span class="overview-span">вопросы</span>, и помогите
                                    другим
                                    найти ответы на их <span class="overview-span">вопросы</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </section>
            <section class="user-questions">
                <header class="user-questions__title">
                    <p class="user-questions__title--sub">Новые вопросы</p>
                    <p class="user-questions__title--down">Здесь собраны вопросы на которые пользователи еще не успели
                        ответить, ответьте первым!</p>
                </header>
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
                                        <?= $question['votes'] ?> ответы
                                    </p>
                                </div>
                                <a href="vendor/components/question.php/?id=<?= $question['id'] ?>">
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
                                    <a href="vendor/components/user.php?id=<?= $question['user_id'] ?>" class="question-user-link">
                                        <div class="question-user">
                                            <div class="question-user__avatar">
                                                <img src="<?= $question['avatar'] ?>" alt="">
                                            </div>
                                            <div class="question-user__name">
                                                <?= $question['nickname'] ?>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="question-quest-count">
                                        <p>
                                            <?= $question['questions_count'] ?> ответы
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
        </main>
    </div>
</div>
<?php 
include 'vendor/components/modals/modal.php';
include 'vendor/components/modals/modal-prompt.php';
include 'vendor/components/modals/pop-up.php';
include 'vendor/components/footer.php';
?>