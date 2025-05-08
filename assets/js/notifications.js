document.addEventListener('DOMContentLoaded', function () {
    // Уведомление для кнопки "Задать вопрос", questions.php
    const askQuestionBtn = document.getElementById('ask-question-btn');
    if (askQuestionBtn) {
        askQuestionBtn.addEventListener('click', function (e) {
            e.preventDefault();
            showNotification('Пожалуйста, авторизируйтесь, чтобы задать вопрос', false);
        })
    }
})