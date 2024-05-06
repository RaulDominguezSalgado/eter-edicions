const containers = document.querySelectorAll('.results-container');

function highlightValue(value) {
    containers.forEach(container => {
        const children = container.querySelectorAll('.book-title, .book-author, .book-description, .collaborator-name, .post-title, .post-description');

        children.forEach(child => {
            // Get the text content of the child element
            let text = child.textContent;

            // Construct a regex pattern that is case insensitive and insensitive to accents
            const regex = new RegExp(`(${value})`, 'giu');

            // Use regex to replace the value with a highlighted version
            text = text.replace(regex, '<span class="bg-secondary">$1</span>');

            // Update the child element's HTML with the highlighted version
            child.innerHTML = text;
        });
    });
}

let search_term = document.querySelector('#searchData #term').value;
highlightValue(search_term);
