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

if ($questionId > 0 && !isset($_SESSION['viewed_question_' . $questionId])) {
    $stmt = $link->prepare("UPDATE `questions` SET `views` = `views` + 1 WHERE `id` = ?");
    $stmt->execute([$questionId]);
    $_SESSION['viewed_question_' . $questionId] = true;
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
                            <p class="question-area__info_title">Голосов</p>
                            <p class="question-area__info_text">
                                <?= $question['votes'] ?>
                            </p>
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
                    <div class="question-area__btns">
                        <form action="/app/functions/votesQuestions.php" class="question-area__rep" method="POST">
                            <input name="questionId" type="hidden" value="<?= $questionId ?>">
                            <p class="question-area__rep_text">Оцените вопрос:</p>
                            <button name="voteBtn" type="submit" value="1"
                                class="question-area__rep_btn <?= ($questionVote['vote_value'] == 1) ? 'rep-btn_active' : ''; ?>">
                                <img src="/assets/img/icons/like.svg" alt="Button like" title="Оценить положительно"
                                    class="questin-are__rep_img">
                            </button>
                            <button name="voteBtn" type="submit" value="-1"
                                class="question-area__rep_btn <?= ($questionVote['vote_value'] == -1) ? 'rep-btn_active' : ''; ?>">
                                <img src="/assets/img/icons/dislike.svg" alt="Button dislike"
                                    title="Оценить отрицательно" class="questin-are__rep_img">
                            </button>
                        </form>
                        <?php
                        echo (isset($_SESSION['user']['id']) && $question['user_id'] == $_SESSION['user']['id'])
                            ? '<div class="question-area__delete">
                               <button class="btn" id="btn-delete-question" data-question-id="' . $question['id'] . '">Удалить вопрос</button>
                               </div>'
                            : '';
                        ?>
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

                <?php foreach ($allCommentsData as $commentData):
                    $comment = $commentData['comment'];
                    $timeAgo = timeAgo($comment['created_at']);
                    ?>
                    <article class="comment">
                        <header class="comment__header">
                            <div class="comment__user">
                                <img src="<?= htmlspecialchars($comment['avatar']) ?>" class="comment__user_img">
                                <div class="comments__user_info">
                                    <a href="/app/components/user.php?id=<?= $comment['user_id'] ?>"
                                        class="comment__user_name">
                                        <?= htmlspecialchars($comment['nickname']) ?>
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
                                <?= $timeAgo ?>
                            </p>
                        </header>
                        <main class="comment__main">
                            <p class="comment__main_text">
                                <?= $comment['content'] ?>
                            </p>
                        </main>
                        <?php if (isset($_SESSION['user'])): ?>
                            <footer class="comment__footer">
                                <?php if ($_SESSION['user']['id'] !== $comment['user_id']): ?>
                                    <div class="comment__reply" data-comment-id="<?= $comment['id'] ?>">
                                        <img src="/assets/img/icons/reply.svg" alt="Кнопка ответа" class="comment__reply_svg">
                                        <p class="comment__reply_text">Ответить</p>
                                    </div>
                                <?php endif; ?>

                                <?php if ($_SESSION['user']['id'] == $comment['user_id']): ?>
                                    <button class="delete-comment btn" data-comment-id="<?= $comment['id'] ?>">Удалить</button>
                                <?php endif; ?>

                                <form method="POST" action="/app/functions/addReply.php" class="comment__reply-form hidden"
                                    data-comment-id="<?= $comment['id'] ?>">
                                    <input type="hidden" value="<?= $questionId ?>" name="questionId">
                                    <input type="hidden" value="<?= $comment['id'] ?>" name="commentId">
                                    <textarea class="comment__reply-form_field" name="form_reply" required></textarea>
                                    <button class="btn">Ответить</button>
                                </form>
                            </footer>
                        <?php endif; ?>
                    </article>

                    <?php foreach ($commentData['replies'] as $reply):
                        $timeAgoReply = timeAgo($reply['created_at']);
                        ?>
                        <article class="answer">
                            <header class="answer__header">
                                <div class="answer__user">
                                    <img src="<?= htmlspecialchars($reply['avatar']) ?>" class="comment__user_img">
                                    <div class="answer__user_info">
                                        <a href="/app/components/user.php?id=<?= $reply['user_id'] ?>"
                                            class="answer__user_name">
                                            <?= htmlspecialchars($reply['nickname']) ?>
                                        </a>
                                        <div class="answer__user_info-wrapper">
                                            <p class="answer__user_rep">репутация
                                                <?= $reply['reputation'] ?>
                                            </p>
                                            <p class="answer__user_answer">
                                                <?= $reply['answers_count'] ?> ответов
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="answer__at">
                                    <p class="answer__at_whom">Ответ пользователю
                                        <span class="answer__at_whom-span">
                                            <?= htmlspecialchars($comment['nickname']) ?>
                                        </span>
                                    </p>
                                    <p class="answer__at_time">
                                        <?= $timeAgoReply ?>
                                    </p>
                                </div>
                            </header>
                            <main class="answer__main">
                                <p class="answer__main_text">
                                    <?= htmlspecialchars($reply['content']) ?>
                                </p>
                            </main>
                            <?php if (isset($_SESSION['user'])): ?>
                                <footer class="answer__footer">
                                    <?php if ($_SESSION['user']['id'] !== $reply['user_id']): ?>
                                        <div class="answer__reply" data-comment-id="<?= $reply['id'] ?>">
                                            <img src="/assets/img/icons/reply.svg" alt="Кнопка ответа" class="answer__reply_svg">
                                            <p class="answer__reply_text">Ответить</p>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['user']['id'] == $reply['user_id']): ?>
                                        <button class="delete-comment btn" data-comment-id="<?= $reply['id'] ?>">Удалить</button>
                                    <?php endif; ?>
                                </footer>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                <?php endforeach; ?>
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
include 'modals/modal-prompt-question.php';
include 'modals/pop-up.php';
include 'footer.php'
    ?>