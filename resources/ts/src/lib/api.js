import axios from 'axios'
import VueLoading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

export function get (url, params,loader) {
    console.log(loader)
    return axios({
        method: 'GET',
        url: url,
        params: params
    })
}

export function post (url, data) {
    return byMethod('POST', url, data)
}

export function byMethod (method, url, data) {
    return axios({
        method: method,
        url: url,
        data: data
    })
}

export function interceptors(cb) {
    axios.interceptors.response.use((res) => {
        return res;
    }, (err) => {
        cb(err)
        return Promise.reject(err)
    })
}
