class Client {
    static all(csrf, page) {

        return new Promise((res, rej) => {

            Fetch.url(`http://localhost:8000/data?page=${page}`, csrf, 'GET').then(
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