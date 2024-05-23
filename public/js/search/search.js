// const containers = document.querySelectorAll('.results-container');

function highlightValue(value) {
    document.querySelectorAll('.item-title, .item-description').forEach(function (e) {
        let text = e.textContent;
        const regex = new RegExp(`(${value})`, 'giu');
        text = text.replace(regex, '<span style="font-size: 100% !important;" class="bg-secondary">$1</span>');
        e.innerHTML = text;
    });
}

let search_term = document.querySelector('#searchData #term').value;
highlightValue(search_term);
