// import { currentUser } from '../../helpers/auth';
// import localStorage from '../../helpers/localStorage';
// import api from '../../helpers/api';
// const user = currentUser();

// export default {
//     state: {
//         currentUser: user,
//         // token: null,
//         isLoggedIn: !!user,
//         loading: false,
//         authError: null,
//     },
//     getters: {
//         IS_LOADING: state => {
//             return state.loading;
//         },
//         IS_LOGGEND_IN: state => {
//             return state.isLoggedIn;
//         },
//         CURRENT_USER: state => {
//             return state.currentUser;
//         },
//         AUTH_ERROR: state => {
//             return state.authError;
//         },
//     },
//     mutations: {
//         LOGIN: state => {
//             state.loading = true;
//             state.authError = null;
//         },
//         LOGIN_SUCCESS: (state, payload) => {
//             state.authError = null;
//             state.isLoggedIn = true;
//             // state.token = payload.token;
//             state.loading = false;
//             state.currentUser = Object.assign({}, payload.user, { token: payload.access_token });
//             localStorage.setItem('user', JSON.stringify(state.currentUser));
//         },
//         LOGIN_FAILED: (state, payload) => {
//             state.authError = payload.err;
//             state.loading = false;
//         },
//         LOGOUT: (state) => {
//             localStorage.removeItem('user');
//             state.isLoggedIn = false;
//             state.currentUser = null;
//         },
//         REFRESHTOKEN: (state, accessToken) => {
//             state.status.loggedIn = true;
//             state.user = { ...state.user, accessToken: accessToken };
//         },
//         REGISTER:(state) => {
//             state.isLoggedIn = false;
//         }
//     },
//     actions: {
//         LOGIN: (context) => {
//             context.commit('LOGIN');
//         },
//         LOGOUT: (context) => {
//             context.commit('LOGOUT');
//         },
//         REFRESHTOKEN({ commit }, accessToken) {
//             commit('REFRESHTOKEN', accessToken);
//         },
//         REGISTER: (context) => {
//             context.commit('REGISTER');
//         },
//         CHECK_AUTH:(context) =>{
//             if (localStorage.getToken()) {
//               api.setHeader();
//               currentUser()
//                 .then(({ data }) => {
//                   context.commit('SET_AUTH', data.user);
//                 })
//                 .catch(({ response }) => {
//                   context.commit('AUTH_ERROR', response.data.errors);
//                 });
//             } else {
//               context.commit('LOGOUT');
//             }
//         },
//     },
// };

import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
import Cookies from "js-cookie";

Vue.use(Vuex);

export default new Vuex.Store({
    namespaced: true,
    state: {
        user: null,
    },
    mutations: {
        SESSION_SET(state, response) {
            state.user = response.data.user;
            Cookies.set("accessToken", response.data.accessToken, {
                expires: response.data.user.expires_at
            });
            axios.defaults.headers.common[
                "Authorization"
            ] = `Bearer ${response.data.accessToken}`;
        },
        SESSION_CLEAR(state) {
            state.user = null;
            Cookies.remove("accessToken");
            axios.defaults.headers.common["Authorization"] = null;
            location.reload();
        }
    },
    actions: {
        register({ commit }, credentials) {
            return axios.post("api/register", credentials).then(response => {
                commit("SESSION_SET", response.data);
            });
        },
        login({ commit }, credentials) {
            return axios.post("api/login", credentials).then(response => {
                commit("SESSION_SET", response.data);
            });
        },
        refresh({ commit }) {
            return axios.get("api/auth/refresh").then(response => {
                commit("SESSION_SET", response.data);
            });
        },
        logout({ commit }) {
            axios.get(process.env.APP_API + "api/auth/logout");
            commit("SESSION_CLEAR");
        }
    },
    getters: {
        loggedIn(state) {
            return !!state.user;
        },
    }
});