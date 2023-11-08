import axios from 'axios';

class Api {
    constructor() {}

    async call(requestType, url, data = null, headers = null) {
        try {
            const response = await axios[requestType](url, data, headers);
            return response;
        } catch (error) {
            if (error.response && error.response.status === 401) {
                auth.logout();
            }
            throw error;
        }
    }
}

export default Api;
