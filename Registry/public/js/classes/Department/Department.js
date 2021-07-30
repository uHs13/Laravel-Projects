class Department {
    static all(csrf) {

        return new Promise((res, rej) => {

            Fetch.all('http://localhost:8000/api/departments', csrf).then(
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

            Fetch.store('http://localhost:8000/api/departments', csrf, data).then(
                data => {
                    res(data);
                },
                error => {
                    rej(error);
                }
            );

        });

    }
}