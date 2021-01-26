function fillModal(data) {
    document.querySelector('#Modal input#name').value = data.name;
    document.querySelector('#Modal input#deadline').value = data.deadline;
    document.querySelector('#Modal form#updateForm').action = 'tasks/'+ data.id;

    return true;
}
