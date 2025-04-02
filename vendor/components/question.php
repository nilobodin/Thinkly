<?php
$title = 'Вопрос';
$currentPage = 'questions';
$core_path = '../functions/core.php';
include 'header.php';

include '../functions/showQuestion.php';
include '../functions/timeAgo.php';

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
                            <p class="question-area__info_text"><?= $timeAgo ?></p>
                        </div>
                        <div class="question-area__info">
                            <p class="question-area__info_title">Изменено</p>
                            <p class="question-area__info_text">сегодня</p>
                        </div>
                        <div class="question-area__info">
                            <p class="question-area__info_title">Просмотров</p>
                            <p class="question-area__info_text"><?= $question['views'] ?? '' ?></p>
                        </div>
                        <div class="question-area__info">
                            <p class="question-area__info_title">Ответов</p>
                            <p class="question-area__info_text"><?= $question['answers'] ?? '' ?></p>
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
                    <article class="question-area__tags_tag"><?= $tag['name'] ?></article>
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
                            <a href="user.php" class="question-area__user-name"><?= $question['nickname'] ?></a>
                        </div>
                        <p class="question-area__user_asked-at">
                            Спросил <?= $timeAgo ?>
                        </p>
                    </div>
                </footer>
            </section>
            <section class="comments-area">
                <article class="comment">
                    <header class="comment__header">
                        <div class="comment__user">
                            <img src="/assets/img/avatar/user1.png" class="comment__user_img"></img>
                            <div class="comments__user_info">
                                <p class="comment__user_name">Saul Goodman</p>
                                <div class="comment__user_info-wrapper">
                                    <p class="comment__user_rep">репутация 120</p>
                                    <p class="comments__user_answer">15 ответов</p>
                                </div>
                            </div>
                        </div>
                        <p class="comment__answer_at">
                            Ответил 15 минут назад
                        </p>
                    </header>
                    <main class="comment__main">
                        <p class="comment__main_text">
                            Ну смотри, я думаю что твой код будет работать. Одно но, исправь в этом месте кое что (я
                            выделил его красным)
                            4.28773954083886,-23.3166298876944,2079,Hedgehog,#BFB2B0,Reference,2
                            -4.56413366610378,-4.47975813907212,5667,Panda,#04A777,Q,1
                            18.8893915853008,-11.0146567520996,237,Koala,#FB8B24,H,1
                            -17.1774910942374,-12.6076416632838,3289,Fox,#BFB2B0,Reference,2
                            19.7055270823247,-10.2966406982056,288,Toucan,#FB8B24,H,1
                            -5.60179332195936,-8.14901724184661,5679,Orca,#04A777,Q,1
                            3.66449334853917,-10.841715127887,5750,Platypus,#F3D053,U,1
                            -4.71008202168981,7.80254488326493,137,Platypus,#D90368,E,1
                            -6.08198788807958,-3.53993778027834,5722,Hippo,#04A777,Q,1
                            -3.93629844321969,-22.7681051424,744,Cobra,#BFB2B0,Reference,2", stringsAsFactors = FALSE)

                            # Simulate an edges dataframe (normally from igraph)
                            edges_df <- data.frame( from=sample(node_positions$id, 10, replace=TRUE),
                                to=sample(node_positions$id, 10, replace=TRUE) ) # Join node positions edges_df <-
                                edges_df %>%
                                left_join(node_positions, by = c("from" = "id")) %>%
                                rename(x_start = x, y_start = y) %>%
                                left_join(node_positions, by = c("to" = "id")) %>%
                                rename(x_end = x, y_end = y)
                        </p>
                    </main>
                    <footer class="comment__footer">
                        <div class="comment__reply">
                            <img src="/assets/img/icons/reply.svg" alt="Кнопка ответа" class="comment__reply_svg">
                            <p class="comment__reply_text">Ответить</p>
                        </div>
                    </footer>
                </article>
                <article class="answer">
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
                </article>
                <article class="answer">
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
                        Ааа, ну ты бы так и сказал! :) Теперь понял. Вот если что, оставляю код который я продебажил:   node_positions <- read.csv(text = "x,y,id,GenomeName,color,GenomeType,sortit
4.28773954083886,-23.3166298876944,2079,Hedgehog,#BFB2B0,Reference,2
-4.56413366610378,-4.47975813907212,5667,Panda,#04A777,Q,1
18.8893915853008,-11.0146567520996,237,Koala,#FB8B24,H,1
-17.1774910942374,-12.6076416632838,3289,Fox,#BFB2B0,Reference,2
19.7055270823247,-10.2966406982056,288,Toucan,#FB8B24,H,1
-5.60179332195936,-8.14901724184661,5679,Orca,#04A777,Q,1
3.66449334853917,-10.841715127887,5750,Platypus,#F3D053,U,1
-4.71008202168981,7.80254488326493,137,Platypus,#D90368,E,1
-6.08198788807958,-3.53993778027834,5722,Hippo,#04A777,Q,1
-3.93629844321969,-22.7681051424,744,Cobra,#BFB2B0,Reference,2", stringsAsFactors = FALSE)

                        </p>
                    </main>
                    <footer class="answer__footer">
                        <div class="answer__reply">
                            <img src="/assets/img/icons/reply.svg" alt="Кнопка ответа" class="answer__reply_svg">
                            <p class="answer__reply_text">Ответить</p>
                        </div>
                    </footer>
                </article>
                <article class="comment">
                    <header class="comment__header">
                        <div class="comment__user">
                            <img src="/assets/img/avatar/user2.png" class="comment__user_img"></img>
                            <div class="comments__user_info">
                                <p class="comment__user_name">Saul Goodman</p>
                                <div class="comment__user_info-wrapper">
                                    <p class="comment__user_rep">репутация 120</p>
                                    <p class="comments__user_answer">15 ответов</p>
                                </div>
                            </div>
                        </div>
                        <p class="comment__answer_at">
                            Ответил 15 минут назад
                        </p>
                    </header>
                    <main class="comment__main">
                        <p class="comment__main_text">
                        Привет ребят! Ну что, как вы?? Разобрались с вопросом? Если что, я готов помочь!
                        </p>
                    </main>
                    <footer class="comment__footer">
                        <div class="comment__reply">
                            <img src="/assets/img/icons/reply.svg" alt="Кнопка ответа" class="comment__reply_svg">
                            <p class="comment__reply_text">Ответить</p>
                        </div>
                    </footer>
                </article>
            </section>
            <section class="comment-add">
                <p class="comment-add__title">Ваш ответ</p>
                <textarea name="" class="comment-add__field">
                </textarea>
                <div class="comment-add__switches">
                        <button class="comment-add__switches_btn" title="Заголовок"><img src="/assets/img/icons/title.svg" alt="Добавить заголовок" class="comment-add__swtiches_img"></button>
                        <button class="comment-add__switches_btn" title="Курсив"><img src="/assets/img/icons/italic.svg" alt="Курсивный текст" class="comment-add__swtiches_img"></button>
                        <button class="comment-add__switches_btn" title="Жирный"><img src="/assets/img/icons/bold.svg" alt="Жирный текст" class="comment-add__swtiches_img"></button>
                </div>
                <button class="comment-add__btn">Опубликовать ответ</button>
            </section>
        </main>
    </div>
</div>

<?php
include 'footer.php';
?>