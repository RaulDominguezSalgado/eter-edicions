function toggleLangSelect(button) {
    parentDiv = button.parentElement.parentElement;
    langSelectForm = parentDiv.querySelector('#langForm');

    const expanded = langSelectForm.classList.contains("expanded");
    if (expanded) {
        langSelectForm.classList.remove('expanded');
    } else {
        langSelectForm.classList.add('expanded');
    }
}

