class Fetch {
    static get(url) {

        return new Promise((res, rej) => {

            fetch(url).then(response => {
                res(response.json())
            }).catch(e => {
                rej(e);
            });

        });

    }
}