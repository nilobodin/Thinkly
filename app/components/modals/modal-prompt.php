<dialog id="modal-prompt" aria-labelledby="entry-modal" class="modal">
    <div class="modal__wrapper modal-prompt__wrapper">
        <form action="/app/functions/deleteComment.php" class="modal-prompt__form" method="POST">
            <input type="hidden" name="comment_id" id="comment-id-input">
            <input type="hidden" name="question_id" value="<?= $questionId ?>">
            <p class="modal-prompt__form_title">
                Вы точно хотите удалить свой комментарий?
            </p>
            <div class="modal-prompt__form_btns">
                <button class="modal-prompt__form_btn btn-yes" name="btn-yes">Да</button>
                <button type="button" class="modal-prompt__form_btn btn-no" name="btn-no">Нет</button>
            </div>
        </form>
    </div>
</dialog>