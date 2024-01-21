window.addEventListener('DOMContentLoaded', () => {
    const searchBtn = document.querySelector('.search-button');
    const modalSearch = document.querySelector('.modal_nav');
    const searchInput = document.querySelector('.search_input')


    // Otwieranie modala
    searchBtn.addEventListener('click', () => {
        modalSearch.classList.toggle('hidden_modal');
    });

    // Zamykanie modala przez kliknięcie poza nim
    window.addEventListener('click', (event) => {
        if (event.target === modalSearch) {
            modalSearch.classList.add('hidden_modal');
        }
    });

    searchInput.addEventListener('keydown', (event) => {
        if(event.keyCode == 13) {
            window.location.href = '/?s='+searchInput.value;
        }
    })
})