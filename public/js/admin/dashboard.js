function showMessage(div) {
    message = div.querySelector('.message');

    const hidden = message.classList.contains("hidden");
    if (hidden) {
        message.classList.remove('hidden');
    }
}

function hideMessage(div){
    message = div.querySelector('.message');

    const hidden = message.classList.contains("hidden");
    if (!hidden) {
        message.classList.add('hidden');
    }
}
