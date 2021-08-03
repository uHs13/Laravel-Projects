class Fetch {
    static url(url, csrf, method, body = null) {

        return new Promise((res, rej) => {

            fetch(url, {
                headers: {
                    'X-CSRF-Token':csrf
                },
                method,
                body
            }).then(response => {
                res(response.json())
            }).catch(e => {
                rej(e);
            });

        });

    }
}