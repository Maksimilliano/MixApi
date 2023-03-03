import axios from "axios";

export default class {
    baseUri;

    constructor(baseUri) {
        this.baseUri = baseUri
    }

    get(uri, config = {}) {
        return axios.get(this.baseUri + uri, config);
    }

    post(uri, data = {}, config = {}) {
        return axios.post(this.baseUri + uri, data, config);
    }
}
