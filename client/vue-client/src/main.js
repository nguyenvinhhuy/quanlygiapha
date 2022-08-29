// import Vue from 'vue';
// import App from './App';
// import router from './router';
// import store from './store';
// import axios from "axios";
// import Vuelidate from 'vuelidate';
// import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';

// import 'bootstrap/dist/css/bootstrap.css';
// import 'bootstrap-vue/dist/bootstrap-vue.css';

// Vue.use(BootstrapVue);
// Vue.use(IconsPlugin);
// Vue.config.productionTip = false;
// Vue.use(Vuelidate);
// axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
// axios.defaults.headers.common['Access-Control-Allow-Methods'] = 'GET, PUT, POST, DELETE, OPTIONS, post, get';
// axios.defaults.headers.common['Access-Control-Max-Age'] = '3600';
// axios.defaults.headers.common['Access-Control-Allow-Headers'] = 'Origin, Content-Type, X-Auth-Token';
// axios.defaults.headers.common['Access-Control-Allow-Credentials'] = 'true';

// /* eslint-disable no-new */

// new Vue({
//   router,
//   store,
//   render: h => h(App),
// }).$mount('#app');

import Vue from "vue";
import router from "./router";
import axios from "axios";
import * as Cookies from "js-cookie";
import "./validation/rules";
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import store from './store';
import App from "./App.vue";

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
axios.defaults.baseURL = process.env.APP_API;
axios.defaults.withCredentials = true;

new Vue({
    store,
    router,
    beforeCreate() {
        const accessToken = Cookies.get("accessToken");

        if (accessToken) {
            axios.defaults.headers.common.Authorization =
                "Bearer " + accessToken;
        }
    },
    created() {
        const accessToken = Cookies.get("accessToken");

        if (accessToken) {
            store.dispatch("refresh");
        }
    },
    render: h => h(App)
}).$mount("#app");