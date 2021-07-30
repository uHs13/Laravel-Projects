class Fetch {
    static all(url, csrf) {

        return new Promise((res, rej) => {

            fetch(url, {
                headers: {
                    'X-CSRF-Token':csrf
                }
            }).then(response => {
                res(response.json())
            }).catch(e => {
                rej(e);
            });

        });

    }

    static store(url, csrf, data) {

        return new Promise((res, rej) => {

            fetch(url, {
                headers: {
                    'X-CSRF-Token':csrf
                },
                method: 'POST',
                body: data
            }).then(response => {
                res(response.json())
            }).catch(e => {
                rej(e);
            });

        });

    }
}