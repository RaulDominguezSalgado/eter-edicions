// const containers = document.querySelectorAll('.results-container');

function highlightValue(value) {
    document.querySelectorAll('.item-title, .item-description').forEach(function (e) {
        let text = e.textContent;
        const regex = new RegExp(`(${value})`, 'giu');
        text = text.replace(regex, '<span class="text-2xl bg-secondary">$1</span>');
        e.innerHTML = text;
    });
    // containers.forEach(container => {
    //     const children = container.querySelectorAll('.title, description');

    //     children.forEach(child => {
    //         // Get the text content of the child element
    //         let text = child.textContent;

    //         // Construct a regex pattern that is case insensitive and insensitive to accents
    //         const regex = new RegExp(`(${value})`, 'giu');

    //         // Use regex to replace the value with a highlighted version
    //         text = text.replace(regex, '<span class="bg-secondary">$1</span>');

    //         // Update the child element's HTML with the highlighted version
    //         child.innerHTML = text;
    //     });
    // });
}

let search_term = document.querySelector('#searchData #term').value;
highlightValue(search_term);
