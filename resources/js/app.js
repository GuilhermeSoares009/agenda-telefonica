import './bootstrap';
import router from './router';
import { createApp } from "vue";

import App from "./App.vue";
import store from './store/store';

createApp(App).use(store).use(router).mount("#app");