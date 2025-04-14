<dialog id="modal" aria-labelledby="entry-modal" class="modal">
    <div class="modal__wrapper">
        <div class="modal__btns">
            <button class="modal__btns_btn tap-btn" id="auth-btn" aria-label="Кнопка авторизации">Авторизация</button>
            <button class="modal__btns_btn" id="reg-btn" aria-label="Кнопка регистрации">Регистрация</button>
        </div>
        <form method="POST" action="/vendor/functions/auth.php" class="modal__fields" id="auth-form">
            <div class="modal__fields_wrapper">
                <label for="login" class="modal__fields_label">Логин</label>
                <input type="text" class="modal__fields_field" name="login" required>
            </div>
            <div class="modal__fields_wrapper">
                <label for="password" class="modal__fields_label">Пароль</label>
                <input type="text" class="modal__fields_field" name="password" required>
            </div>
            <div class="modal__checkbox-wrapper">
                <input type="checkbox" class="modal__checkbox-wrapper_checkbox">
                <p class="modal__checkbox-wrapper_text">Запомнить меня</p>
            </div>
            <button class="modal__btn">Войти</button>
        </form>
        <form action="/vendor/functions/reg.php" method="POST" class="modal__fields hidden" id="reg-form">
            <div class="modal__fields_wrapper">
                <label for="nickname" class="modal__fields_label">Имя (никнейм)</label>
                <input type="text" class="modal__fields_field" name="nickname">
            </div>
            <div class="modal__fields_wrapper">
                <label for="login" class="modal__fields_label">Логин<span class="modal__fields_span">*</span></label>
                <input type="text" class="modal__fields_field" name="login" required>
            </div>
            <div class="modal__fields_wrapper">
                <label for="password" class="modal__fields_label">Пароль<span class="modal__fields_span">*</span></label>
                <input type="text" class="modal__fields_field" name="password" required>
            </div>
            <button class="modal__btn">Зарегистрироваться</button>
        </form>
    </div>
</dialog>