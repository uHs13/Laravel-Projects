class Form {
    static clear() {
        document.querySelector('#name').value = '';
        document.querySelector('#description').value = '';
    }

    static setEditData(data) {
        let formEdit = document.querySelector('#form-edit')
        formEdit.querySelector('#id').value = data.id;
        formEdit.querySelector('#name').value = data.name;
        formEdit.querySelector('#description').value = data.description;
    }
}