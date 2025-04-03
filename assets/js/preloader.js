document.addEventListener('DOMContentLoaded', () => {
    if (!sessionStorage.getItem('animationShown')) {
        const preloader = document.querySelector('.preloader');
        const logoParts = document.querySelectorAll('.logo-part');
        const subtitle = document.querySelector('.subtitle');
        
        // Анимация появления символов
        logoParts.forEach((part, index) => {
            setTimeout(() => {
                part.style.animation = `fadeIn 0.3s forwards ${index * 0.2}s`;
            }, 100);
        });

        // Анимация появления подписи с задержкой
        setTimeout(() => {
            subtitle.style.animation = 'subtitleFadeIn 1s forwards';
        }, 1500);

        // Задержка перед показом основного контента
        setTimeout(() => {
            preloader.style.opacity = '0';
            setTimeout(() => {
                preloader.style.display = 'none';
                sessionStorage.setItem('animationShown', 'true');
            }, 500);
        }, 2500);
    } else {
        document.querySelector('.preloader').style.display = 'none';
    }
});