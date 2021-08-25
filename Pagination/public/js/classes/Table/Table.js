class Table {
    constructor(tbodyId) {
        this.tbodyEl = document.querySelector(`#${tbodyId}`);
    }

    paginateData(csrf, page = 1) {

        return new Promise((res, rej) => {

            Client.all(csrf, page).then(response => {

                this.buildRows(response.data).then(() => {
                    this.buildPagination(
                        response.links,
                        response.current_page
                    ).then(() => {
                        res(true);
                    });
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

                td1.innerHTML = data[d].id;
                td2.innerHTML = data[d].name;
                td3.innerHTML = data[d].email;

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

    buildPagination(links, current) {

        return new Promise((res, rej) => {

            let ul = document.createElement('ul');
            ul.classList.add('pagination');

            Object.keys(links).forEach(key => {

                let li = document.createElement('li');

                if (links[key].url == null) {
                    li.classList.add('disabled');
                }

                let url = links[key].url || '=1';

                li.classList.add('page-item');

                let page = url.split('=')[1];

                if (eval(page) == current) {
                    li.classList.add('active');
                }

                li.innerHTML = `
                    <a class="page-link" onclick="buildTable(${page})">
                        ${links[key].label}
                    </a>
                `;

                ul.appendChild(li);

            });

            document.querySelector('#pagination').innerHTML = "";
            document.querySelector('#pagination').appendChild(ul);

            res(true);

        });

    }
}