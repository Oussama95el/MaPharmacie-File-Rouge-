import { createApp } from 'vue';
import App from './App.vue';
import router from "./router";
import './index.css';
import 'flowbite';
import AOS from 'aos';
import 'aos/dist/aos.css';
import store from "./store";
const app = createApp(App)


AOS.init();
app.provide("currentProd", null)
app.use(router);
app.mount('#app')
app.use(store)
