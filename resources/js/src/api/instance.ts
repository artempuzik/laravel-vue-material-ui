import axios from "axios";
import {SERVER_HOST, SERVER_PORT} from "../config";

const instance = axios.create({
    baseURL: `//${SERVER_HOST}:${SERVER_PORT}/api`,
    timeout: 1000,
    headers: {'Content-Type': 'Application/json'}
});

export default instance;
