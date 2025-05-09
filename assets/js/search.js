document.getElementById('questionSearch').addEventListener('input', searchQuestions);
document.getElementById('questionSearch').addEventListener('click', function(e) {
    e.stopPropagation();
    
    if (this.value.trim().length >= 1) {
        searchQuestions.call(this);
    }
});

function searchQuestions() {
    const query = this.value.trim();
    const resultsContainer = document.getElementById('searchResults');
    
    if (query.length < 1) {
        resultsContainer.style.display = 'none';
        return;
    }

    fetch('/app/functions/search.php?q=' + encodeURIComponent(query))
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                resultsContainer.innerHTML = '';
                data.forEach(question => {
                    const link = document.createElement('a');
                    link.href = `/app/components/question.php/?id=${question.id}`;
                    link.textContent = question.title;
                    resultsContainer.appendChild(link);
                });
                resultsContainer.style.display = 'block';
            } else {
                resultsContainer.style.display = 'none';
            }
        });
}

document.addEventListener('click', function() {
    document.getElementById('searchResults').style.display = 'none';
});