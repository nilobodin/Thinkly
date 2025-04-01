document.addEventListener('DOMContentLoaded', function () {
    // Уведомление для кнопки "Задать вопрос", questions.php
    const askQuestionBtn = document.getElementById('ask-question-btn');
    if (askQuestionBtn) {
        askQuestionBtn.addEventListener('click', function (e) {
            e.preventDefault();
            showNotification('Пожалуйста, авторизируйтесь, чтобы задать вопрос', false);
        })
    }

    // Уведомление для кнопки "Сохранить изменения" в профиле + (сделать Ajax)
    const saveChangeBtn = document.getElementById('save_change_btn');
    if (saveChangeBtn) {
        saveChangeBtn.addEventListener('click', function (e) {
            // e.preventDefault();
            // showNotification('Изменения успешно сохранены', true);
        })
    }
})