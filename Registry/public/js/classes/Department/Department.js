class Department {
    static all() {

        return new Promise((res, rej) => {

            Fetch.get('http://localhost:8000/api/departments').then(
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