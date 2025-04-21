document.addEventListener('DOMContentLoaded', function () {
    const reply_btns = document.querySelectorAll('.comment__reply');
    const reply_forms = document.querySelectorAll('.comment__reply-form');

    reply_forms.forEach(form => {
        form.classList.add('hidden');
    });

    reply_btns.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            const correspondingForm = reply_forms[index];

            if (correspondingForm.classList.contains('hidden')) {
                correspondingForm.classList.remove('hidden');
            } else {
                correspondingForm.classList.add('hidden');
            }

            reply_forms.forEach((form, formIndex) => {
                if (formIndex !== index) {
                    form.classList.add('hidden');
                }
            });
        });
    });
});