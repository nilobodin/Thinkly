document.addEventListener('DOMContentLoaded', function() {
    const replyBtns = document.querySelectorAll('.comment__reply');
    
    replyBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const commentId = this.getAttribute('data-comment-id');
            const form = document.querySelector(`.comment__reply-form[data-comment-id="${commentId}"]`);
            
            // Скрываем все другие формы
            document.querySelectorAll('.comment__reply-form').forEach(otherForm => {
                if (otherForm !== form) {
                    otherForm.classList.add('hidden');
                }
            });
            
            // Переключаем (показываем/скрываем) текущую форму
            if (form) {
                form.classList.toggle('hidden');
            }
        });
    });
});