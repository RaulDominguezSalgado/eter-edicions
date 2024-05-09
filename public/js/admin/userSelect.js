function toggleSelect(button) {
    parentDiv = button.parentElement.parentElement;
    userSelectForm = parentDiv.querySelector('#userForm');

    const expanded = userSelectForm.classList.contains("expanded");
    if (expanded) {
        userSelectForm.classList.remove('expanded');
    } else {
        userSelectForm.classList.add('expanded');
    }
}

