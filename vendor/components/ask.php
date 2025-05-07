<?php
$title = "Задать вопрос";
$currentPage = 'questions';
$core_path = '../functions/core.php';
include 'header.php';
?>
<div class="container">
    <div class="main-container">
        <?php include 'aside.php' ?>
        <main class="main">
            <section class="ask-hero">
                <p class="ask-hero__title">Задать вопрос</p>
                <div class="ask-hero__wrapper">
                    <p class="ask-hero__wrapper_title">Составление хорошего вопроса:</p>
                    <p class="ask-hero__wrapper_description">Если вы готовы составить свой вопрос, связанный с
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
            <form class="ask-form" action="../functions/addQuestion.php" method="POST">
                <section class="ask-field">
                    <p class="ask-field__title">Заголовок<span class="ask-title__star">*</span></p>
                    <p class="ask-field__descsription">Придумайте краткий заголовок для вашего вопроса, тщательно
                        сформулируйте его.</p>
                    <input type="text" name="title" class="ask-field__input-field">
                </section>
                <section class="ask-field">
                    <p class="ask-field__title">Описание<span class="ask-title__star">*</span></p>
                    <p class="ask-field__descsription">Развернуто и максимально точно опишите вашу проблему (вопрос)</p>
                    <textarea id="description" name="description" class="ask-field__textarea-field"></textarea>
                </section>
                <section class="ask-field">
                    <p class="ask-field__title">Теги<span class="ask-title__star">*</span></p>
                    <p class="ask-field__descsription">Добавьте до 5 тегов, чтобы отразить направленность вопроса.</p>

                    <div class="tags-container">
                        <div class="tags-input">
                            <input type="text" placeholder="Введите тег и нажмите Enter..." class="tags-input-field"
                                id="tag-input">
                        </div>
                        <div class="tags-list" id="tags-list"></div>
                        <input type="hidden" name="tags" id="tags-hidden">
                    </div>

                    <div class="tags-suggestions" id="tags-suggestions"></div>
                </section>
                <button class="ask-add">Задать вопрос</button>
            </form>
        </main>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#description'), {
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