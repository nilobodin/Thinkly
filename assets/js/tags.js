document.addEventListener('DOMContentLoaded', function () {
    const tagInput = document.getElementById('tag-input');
    const tagsList = document.getElementById('tags-list');
    const tagsHidden = document.getElementById('tags-hidden');
    const maxTags = 5;
    let tags = [];

    // Обработка ввода тегов
    if (tagInput) {
        tagInput.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ',') {
                e.preventDefault();
                const tag = tagInput.value.trim();
                if (tag) addTag(tag);
                tagInput.value = '';
            }
        });
    }

    // Добавление тега
    function addTag(tag) {
        if (tags.length >= maxTags) {
            showNotification('Можно добавить не более 5 тегов', false);
            return;
        }

        tag = tag.toLowerCase();

        if (tags.includes(tag)) {
            showNotification('Этот тег уже добавлен', false);
            return;
        }

        tags.push(tag);
        updateTagsDisplay();
        updateHiddenField();
    }

    // Удаление тега
    function removeTag(index) {
        tags.splice(index, 1);
        updateTagsDisplay();
        updateHiddenField();
    }

    // Обновление отображения тегов
    function updateTagsDisplay() {
        tagsList.innerHTML = tags.map((tag, index) => `
            <div class="tag">
                ${tag}
                <span class="tag-remove" data-index="${index}">&times;</span>
            </div>
        `).join('');

        // Обработка кликов на удаление
        document.querySelectorAll('.tag-remove').forEach(btn => {
            btn.addEventListener('click', () => removeTag(parseInt(btn.dataset.index)));
        });
    }

    // Обновление скрытого поля формы
    function updateHiddenField() {
        tagsHidden.value = tags.join(',');
    }
});