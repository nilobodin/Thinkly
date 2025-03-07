<?php
$title = 'Задать вопрос';
$currentPage = 'questions';
include 'header.php';
?>
<div class="container">
    <div class="main-container">
        <?php include 'aside.php' ?>
        <main class="main">
            <section class="question-hero">
                <p class="question-hero__title">Задать вопрос</p>
                <div class="question-hero__wrapper">
                    <p class="question-hero__wrapper_title">Составление хорошего вопроса:</p>
                    <p class="question-hero__wrapper_description">Если вы готовы составить свой вопрос, связанный с
                        программированием, это форма поможет вам в этом процессе.</p>
                    <div class="accordion">
                        <div class="accordion-item">
                            <input type="checkbox" id="accordion1" class="accordion-input">
                            <label for="accordion1" id="accordion-label" class="accordion-label">Шаги</label>
                            <div class="accordion-content">
                                <ul class="accordion-list">
                                    <li class="accordion-list__title">Кратко изложите свою проблему в заголовке,
                                        состоящем из одной строки.</li>
                                    <li class="accordion-list__title">Опишите вашу проблему более подробно.</li>
                                    <li class="accordion-list__title">Опишите, что вы пробовали и чего ожидали.</li>
                                    <li class="accordion-list__title">Добавьте «теги», которые помогут донести ваш
                                        вопрос до участников сообщества.</li>
                                    <li class="accordion-list__title">Проверьте свой вопрос и опубликуйте его на сайте.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <form class="question-form" action="" method="POST">
                <section class="question-field">
                    <p class="question-field__title">Заголовок<span class="question-title__star">*</span></p>
                    <p class="question-field__descsription">Придумайте краткий заголовок для вашего вопроса, тщательно
                        сформулируйте его.</p>
                    <input type="text" name="title" class="question-field__input-field">
                </section>
                <section class="question-field">
                    <p class="question-field__title">Описание<span class="question-title__star">*</span></p>
                    <p class="question-field__descsription">Придумайте краткий заголовок для вашего вопроса, тщательно
                        сформулируйте его.</p>
                    <textarea name="description" class="question-field__textarea-field"></textarea>
                </section>
                <section class="question-field">
                    <p class="question-field__title">Теги<span class="question-title__star">*</span></p>
                    <p class="question-field__descsription">Добавьте до 5 тегов, чтобы отразить направленность вопроса.
                    </p>
                    <input type="text" name="tags" class="question-field__input-field">
                </section>
                <button class="question-add">Задать вопрос</button>
            </form>
        </main>
    </div>
</div>

<?php
include 'footer.php';
?>