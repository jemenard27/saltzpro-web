import baseService from "../base.service";

let tellerService = class TellerService extends baseService {

    constructor() {
        super();
    }

    allData() {
        let url = 'https://api.nuxtjs.dev/posts'
        return super.get(url);
    }
};

export default tellerService