document.addEventListener('DOMContentLoaded', function () {
    const btnTheme = document.querySelector('.btn_theme');
    const currentTheme = localStorage.getItem('theme');

    // Проверяем какая тема на странице выбрана
    if (currentTheme === 'dark') {
        document.documentElement.setAttribute('data-theme', 'dark');
    } else {
        document.documentElement.setAttribute('data-theme', 'light');
    }

    // Переключение темы
    btnTheme.addEventListener('click', () => {
        const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
        
        if (isDark) {
            document.documentElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');
        } else {
            document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
        }
    });
});