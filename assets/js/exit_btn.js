document.addEventListener('DOMContentLoaded', function() {
    const avatarContainer = document.getElementById('avatarContainer');
    const avatarImg = document.querySelector('.avatar-img');
    const exitLink = document.querySelector('.exit-icon');

    avatarContainer.addEventListener('click', function() {
        console.log(1);
        avatarImg.style.transform = 'translateY(-100%)';
        exitLink.style.transform = 'translateY(-110%)';
    });
});