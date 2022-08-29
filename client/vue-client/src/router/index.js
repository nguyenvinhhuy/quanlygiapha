// import Vue from 'vue'
// import Router from 'vue-router'
// import HelloWorld from '@/components/HelloWorld'
// import Test from '@/components/Test'
// import Dashboard from '@/components/Dashboard'
// import Register from '@/components/Register'

// Vue.use(Router)

// export default new Router({
//   routes: [
//     {
//       path: '/',
//       name: 'HelloWorld',
//       component: HelloWorld
//     },
//     {
//       path: '/test',
//       name: 'Test',
//       component: Test,
//       meta: {
//         auth: false
//     }
//     },
//     {
//       path: '/login',
//       name: 'login',
//       component: () => import('../views/Login.vue'),
//       meta: {
//         auth: false
//     }
//     },
//     {
//       path: '/register',
//       name: 'register',
//       component: Register,
//       meta: {
//         auth: false
//     }
//     },
//     {
//       path: '/dashboard',
//       name: 'dashboard',
//       component: Dashboard,
//       meta: {
//           auth: true
//       }
//   }
//   ]
// })

// import Vue from 'vue'
// import Login from "@/views/Login"
// import Dashboard from '@/components/Dashboard'
// import Router from 'vue-router'
// import store from '@/store/index'

// Vue.use(Router)

// const router = new Router({
//   routes: [
//     { path: "/", component: Login, meta: { requiredAuth: true } },
//     { path: "/login", component: Login, meta: { requiredAuth: false } },
//     { path: "/dashboard", component: Dashboard, meta: { requiredAuth: true } },
//   ]
// });

// router.beforeEach(async (to, from, next) => {
//   let userProfile = store.getters["auth/getUserProfile"];
//   let isAuthenticated = localStorage.getItem("isAuthenticated");
//   if (userProfile.id === 0 && isAuthenticated) {
//     await store.dispatch("auth/userProfile");
//     userProfile = store.getters["auth/getUserProfile"];
//   }

//   if (to.meta.requiredAuth) {
//     if (userProfile.id === 0) {
//       return next({ path: "/login" });
//     }
//   } else {
//     if (userProfile.id !== 0) {
//       return next({ path: "/dashboard" });
//     }
//   }
//   return next();
// });

// export default router

import Vue from "vue";
import Router from "vue-router";
import * as Cookies from "js-cookie";

import Home from '@/components/Home';
import Register from '@/components/Register';
import Login from '@/views/Login'
import Dashboard from '@/components/Dashboard'
import User from '@/components/User';

Vue.use(Router);

const isLoggedIn = (to, from, next) => {
    let accessToken =
        typeof Cookies.get("accessToken") != "undefined"
            ? Cookies.get("accessToken")
            : false;

    if (!accessToken) {
        next({ name: "home" });
    } else {
        next();
    }
};

const router = new Router({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/register",
            name: "register",
            component: Register
        },
        {
            path: "/login",
            name: "login",
            component: Login
        },
        {
            path: "/dashboard",
            name: "dashboard",
            component: Dashboard,
            beforeEnter: isLoggedIn
        },
        {
            path: "/user",
            name: "user",
            component: User,
            beforeEnter: isLoggedIn
        }
    ]
});
// options.beforeEach((to, from, next) => {
//     let accessTokenCookie = true;
//     Cookies.get("accessToken");
//     let noAccessTokenCookie = typeof accessTokenCookie == "undefined";

//     if (requiresAuth && noAccessTokenCookie) {
//         next({ name: "login" });
//     } else {
//         next();
//     }
// });


export default router;

router.beforeEach((to, from, next) => {
    let loggedIn = store.getters.loggedIn;
    if (to.matched.some(record => record.meta.requiresAuth) && !loggedIn) {
        next({ name: "login" });
    } else {
        next();
    }
});