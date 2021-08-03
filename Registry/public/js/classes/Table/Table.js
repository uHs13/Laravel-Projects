class Table {
    constructor(tbodyId) {
        this.tbodyEl = document.querySelector(`#${tbodyId}`);
    }

    listData(csrf) {

        return new Promise((res, rej) => {

            Department.all(csrf).then(data => {

                this.buildRows(data).then(() => {
                    res(true);
                });

            });

        });

    }

    buildRows(data) {

        return new Promise((res, rej) => {

            Object.keys(data).forEach(d => {

                let tr = document.createElement('tr');
                let td1 = document.createElement('td');
                let td2 = document.createElement('td');
                let td3 = document.createElement('td');

                tr.dataset.department = JSON.stringify(data[d]);
                td1.innerHTML = data[d].id;
                td2.innerHTML = data[d].name;
                td3.innerHTML = `
                    <button class="btn btn-sm btn-primary mr-2 editBtn">
                        <i class="fas fa-edit text-light"></i> Edit
                    </button>
                    <button class="btn btn-sm btn-danger deleteBtn">
                        <i class="fas fa-trash-alt text-light"></i> Delete
                    </button>
                `;

                tr.appendChild(td1);
                tr.appendChild(td2);
                tr.appendChild(td3);
                this.tbodyEl.appendChild(tr);

            });

            res(true);

        });

    }

    refresh() {
        this.tbodyEl.innerHTML = "";
    }
}