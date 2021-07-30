class Table {

    constructor(tbodyId) {
        this.tbodyEl = document.querySelector(`#${tbodyId}`);
        this.listData();
    }

    listData() {

        Department.all().then(res => {

            this.buildRows(res);

        });

    }

    buildRows(data) {

        Object.keys(data).forEach(d => {

            let tr = document.createElement('tr');
            let td1 = document.createElement('td');
            let td2 = document.createElement('td');
            let td3 = document.createElement('td');

            td1.innerHTML = data[d].id;
            td2.innerHTML = data[d].name;
            td3.innerHTML = `
                <button class="btn btn-sm btn-primary mr-2">
                    <i class="fas fa-edit text-light"></i> Edit
                </button>
                <button class="btn btn-sm btn-danger">
                    <i class="fas fa-trash-alt text-light"></i> Delete
                </button>
            `;

            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            this.tbodyEl.appendChild(tr);

        });

    }

}