document.getElementById('userSearch').addEventListener('input', function() {
    const searchTerm = this.value.trim().toLowerCase();
    const allUsers = document.querySelectorAll('.users-container__user-profile');
    
    allUsers.forEach(user => {
        const username = user.getAttribute('data-username');
        if (username.includes(searchTerm)) {
            user.style.display = 'flex';
        } else {
            user.style.display = 'none';
        }
    });
});