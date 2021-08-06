class Department {
    static all(csrf) {

        return new Promise((res, rej) => {

            Fetch.url('http://localhost:8000/api/departments', csrf, 'GET').then(
                data => {
                    res(data);
                },
                error => {
                    rej(error);
                }
            );

        });

    }

    static store(csrf, data) {

        return new Promise((res, rej) => {

            Fetch.url('http://localhost:8000/api/departments', csrf, 'POST', data).then(
                data => {
                    res(data);
                },
                error => {
                    rej(error);
                }
            );

        });

    }

    static delete(csrf, data) {

        return new Promise((res, rej) => {

            Fetch.url(`http://localhost:8000/api/departments/${data}`, csrf, 'DELETE').then(
                data => {
                    res(data);
                },
                error => {
                    rej(error);
                }
            );

        });

    }

    static update(csrf, data) {

        return new Promise((res, rej) => {

            Fetch.url(`http://localhost:8000/api/departments/${data.id}`, csrf, 'POST', data).then(
                response => {
                    res(response);
                },
                error => {
                    rej(error);
                }
            );

        });

    }
}