<?php
$title = 'Вопрос';
$currentPage = 'questions';
$core_path = '../functions/core.php';
include 'header.php';

$questionId = $_GET['id'] ?? null;
if (!$questionId) {
    $_SESSION['error'] = 'Вопрос не найден';
    header("Location: /app/components/questions.php");
    exit;
}

include '../functions/showQuestion.php';
include '../functions/timeAgo.php';
include '../functions/showComments.php';
$timeAgo = timeAgo($question['created_at']);
?>
<div class="container">
    <div class="main-container">
        <?php include 'aside.php' ?>
        <main class="main">
            <section class="question-area">
                <header class="question-area__header-wrapper">
                    <p class="question-area__title">
                        <?= $question['title'] ?? '' ?>
                    </p>
                    <article class="question-area__info-wrapper">
                        <div class="question-area__info">
                            <p class="question-area__info_title">Спросил</p>
                            <p class="question-area__info_text">
                                <?= $timeAgo ?>
                            </p>
                        </div>
                        <div class="question-area__info">
                            <p class="question-area__info_title">Изменено</p>
                            <p class="question-area__info_text">сегодня</p>
                        </div>
                        <div class="question-area__info">
                            <p class="question-area__info_title">Просмотров</p>
                            <p class="question-area__info_text">
                                <?= $question['views'] ?? '' ?>
                            </p>
                        </div>
                        <div class="question-area__info">
                            <p class="question-area__info_title">Ответов</p>
                            <p class="question-area__info_text">
                                <?= $question['answers'] ?? '' ?>
                            </p>
                        </div>
                    </article>
                    <div class="question-area__line"></div>
                </header>
                <main class="question-area__question-wrapper">
                    <p class="question-area__question-wrapper_text">
                        <?= $question['description'] ?? '' ?>
                    </p>
                </main>
                <div class="question-area__tags">
                    <p class="question-area__tags_title">Теги:</p>
                    <? foreach ($tags as $tag) { ?>
                        <article class="question-area__tags_tag">
                            <?= $tag['name'] ?>
                        </article>
                    <? } ?>
                </div>
                <footer class="question-area__footer-wrapper">
                    <div class="question-area__rep">
                        <p class="question-area__rep_text">Оцените вопрос:</p>
                        <button class="question-area__rep_btn"><img src="/assets/img/icons/like.svg" alt="Button like"
                                title="Оценить положительно" class="questin-are__rep_img"></button>
                        <button class="question-area__rep_btn"><img src="/assets/img/icons/dislike.svg"
                                alt="Button dislike" title="Оценить отрицательно" class="questin-are__rep_img"></button>
                    </div>
                    <div class="question-area__user">
                        <div class="question-area__user_name-avatar">
                            <img src="<?= $question['avatar'] ?>" alt="Аватар пользователя"
                                class="question-area__user-avatar">
                            <a href="/app/components/user.php/?id=<?= $question['user_id'] ?>"
                                class="question-area__user-name">
                                <?= $question['nickname'] ?>
                            </a>
                        </div>
                        <p class="question-area__user_asked-at">
                            Спросил
                            <?= $timeAgo ?>
                        </p>
                    </div>
                </footer>
            </section>
            <section class="comments-area">
                <!-- <article class="answer">
                    <header class="answer__header">
                        <div class="answer__user">
                            <img src="/assets/img/avatar/user1.png" class="comment__user_img"></img>
                            <div class="answer__user_info">
                                <p class="answer__user_name">Saul Goodman</p>
                                <div class="answer__user_info-wrapper">
                                    <p class="answer__user_rep">репутация 120</p>
                                    <p class="answer__user_answer">15 ответов</p>
                                </div>
                            </div>
                        </div>
                        <div class="answer__at">
                            <p class="answer__at_whom">Ответ пользователю <span class="answer__at_whom-span">Saul
                                    Goodman</span></p>
                            <p class="answer__at_time">5 минут назад</p>
                        </div>
                    </header>
                    <main class="answer__main">
                        <p class="answer__main_text">
                            А я думаю ты не прав. Приглядись повнимательнее к моему вопросу. Я спросил немного другое.
                            Если бы я спросил то, что нужно, то возможно бы я ответил то что не нужно, а так я отвечаю
                            просто чтобы ответить.
                        </p>
                    </main>
                    <footer class="answer__footer">
                        <div class="answer__reply">
                            <img src="/assets/img/icons/reply.svg" alt="Кнопка ответа" class="answer__reply_svg">
                            <p class="answer__reply_text">Ответить</p>
                        </div>
                    </footer>
                </article> -->
                <?php foreach ($comments as $comment) {
                    $timeAgoComments = timeAgo($comment['created_at']);
                    ?>
                    <article class="comment">
                        <header class="comment__header">
                            <div class="comment__user">
                                <img src="<?= $comment['avatar'] ?>" class="comment__user_img"></img>
                                <div class="comments__user_info">
                                    <a href="/app/components/user.php?id=<?= $comment['user_id'] ?>"
                                        class="comment__user_name">
                                        <?= $comment['nickname'] ?>
                                    </a>
                                    <div class="comment__user_info-wrapper">
                                        <p class="comment__user_rep">репутация
                                            <?= $comment['reputation'] ?>
                                        </p>
                                        <p class="comments__user_answer">
                                            <?= $comment['answers_count'] ?> ответов
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <p class="comment__answer_at">
                                <?= $timeAgoComments ?>
                            </p>
                        </header>
                        <main class="comment__main">
                            <p class="comment__main_text">
                                <?= $comment['content'] ?>
                            </p>
                        </main>
                        <?php if (isset($_SESSION['user'])) { ?>
                            <footer class="comment__footer">
                                <?php if ($_SESSION['user']['id'] !== $comment['user_id']) { ?>
                                    <div class="comment__reply" data-comment-id="<?= $comment['id'] ?>">
                                        <img src="/assets/img/icons/reply.svg" alt="Кнопка ответа" class="comment__reply_svg">
                                        <p class="comment__reply_text">Ответить</p>
                                    </div>
                                <?php } ?>

                                <?php if ($_SESSION['user']['id'] == $comment['user_id']) { ?>
                                    <button class="delete-comment btn" data-comment-id="<?= $comment['id'] ?>">Удалить</button>
                                <?php } ?>

                                <form method="POST" action="/app/functions/addReply.php" class="comment__reply-form hidden"
                                    data-comment-id="<?= $comment['id'] ?>">
                                    <input type="hidden" value="<?= $questionId ?>" name="questionId">
                                    <input type="hidden" value="<?= $comment['id'] ?>" name="commentId">
                                    <textarea class="comment__reply-form_field" name="form_reply"></textarea>
                                    <button class="btn">Ответить</button>
                                </form>
                            </footer>
                        <?php } ?>
                    </article>
                <?php } ?>
            </section>
            <form method="POST" action="/app/functions/addComment.php" class="comment-add">
                <p class="comment-add__title">Ваш ответ</p>
                <input type="hidden" name="comment-id" value="<?= $question['id'] ?>">
                <textarea name="add_comment" id="comment-content" class="comment-add__field"></textarea>
                <button class="comment-add__btn">Опубликовать ответ</button>
            </form>
        </main>
    </div>
</div>

<script src="/assets/js/reply_form.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#comment-content'), {
            toolbar: ['heading', '|',
                'bold', 'italic', 'link',
                'bulletedList', 'numberedList',
                'blockQuote', 'codeBlock', 'undo', 'redo'],
        })
        .catch(error => {
            console.error(error);
        });
</script>
<?php
include 'modals/modal.php';
include 'modals/modal-prompt.php';
include 'modals/pop-up.php';
include 'footer.php'
    ?>