document.addEventListener('DOMContentLoaded', function () {
    const btnTheme = document.querySelector('.btn_theme');
    const iconTheme = document.getElementById('theme-icon');
    const currentTheme = localStorage.getItem('theme');

    // Проверяем какая тема на странице выбрана
    if (currentTheme === 'dark') {
        document.documentElement.setAttribute('data-theme', 'dark');
        iconTheme.src = '/assets/img/icons/moon.svg'
    } else {
        document.documentElement.setAttribute('data-theme', 'light');
        iconTheme.src = '/assets/img/icons/sun.svg'
    }

    // Переключение темы
    btnTheme.addEventListener('click', () => {
        const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
        
        if (isDark) {
            document.documentElement.setAttribute('data-theme', 'light');
            iconTheme.src = '/assets/img/icons/sun.svg';
            localStorage.setItem('theme', 'light');
        } else {
            document.documentElement.setAttribute('data-theme', 'dark');
            iconTheme.src = '/assets/img/icons/moon.svg';
            localStorage.setItem('theme', 'dark');
        }
    });
});