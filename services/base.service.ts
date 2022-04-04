import axios, { AxiosInstance, AxiosResponse } from 'axios';

let baseService = class BaseService {
    baseURL: any = ''
    headers: any
    $http: AxiosInstance
    conceptId: any
    $router: any;
    $store: any;

    constructor() {
        let self = this
        this.baseURL = process.env.API_URL

        this.headers = {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }

        this.$http = axios.create({
            timeout: 1600000
        });

        this.$http.interceptors.request.use((config: any) => {
            return config
        })

        this.$http.interceptors.response.use((response: any) => {
            return response
        }, error=>{
           if(error.response.status === 401){
                localStorage.removeItem('ethesia')
                location.replace('/')
            } else {
                return Promise.reject(error);
            }
        })
    }

    getQueryString(params: { [x: string]: string | number | boolean; }) {
        return (
            Object
                .keys(params)
                .map(k => encodeURIComponent(k) + '=' + encodeURIComponent(params[k]))
                .join('&')
        )
    }
    get(uri: string, data = {}, additionalHeaders = {}) {
        if (Object.keys(data).length > 0) {
            uri = `${uri}?${this.getQueryString(data)}`
        }

        return this.$http.get(uri)
    }
};

export default baseService
