import 'bootstrap';
import 'element-plus/dist/index.css'

import { createApp } from 'vue';
import ElementPlus from 'element-plus'

import App from './App.vue';

//@ts-ignore
window.createApp = function (_, props = {}) {
    //@ts-ignore
    const app = createApp(App, {files: props.files.data})
    app.use(ElementPlus);
    app.mount("#app")
}
