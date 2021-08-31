export class Post {
    constructor(
        public name: string,
        public description: string,
        public file?: string,
        public id?: number,
        public likes?: number
    ) {

        

    }
}