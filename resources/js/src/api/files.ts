import axios from "./instance.ts";


const getFiles = (params: {[key: string]: string}) => axios.get('/files', params)

export default {
    getFiles
}
