function fillModal(data) {
    document.querySelector('#Modal input#name').value = data.name;
    document.querySelector('#Modal input#deadline').value = data.deadline;
    document.querySelector('#Modal input#hiddenId').value = data.id;
    return true;
}
