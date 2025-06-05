<dialog id="modal-prompt-question" aria-labelledby="entry-modal" class="modal">
    <div class="modal__wrapper modal-prompt__wrapper">
        <form action="/app/functions/deleteQuestion.php" class="modal-prompt__form" method="POST">
            <input type="hidden" id="question-id-input" name="question_id" value="<?= $questionId ?>">
            <p class="modal-prompt__form_title">
                Вы точно хотите удалить свой вопрос?
            </p>
            <div class="modal-prompt__form_btns">
                <button class="modal-prompt__form_btn btn-yes" name="btn-yes">Да</button>
                <button type="button" class="modal-prompt__form_btn btn-no" id="btn-no-question" name="btn-no">Нет</button>
            </div>
        </form>
    </div>
</dialog>