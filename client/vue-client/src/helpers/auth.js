// import axios from 'axios';

// export function login(credential) {
//     return new Promise((resolve, reject) => {
//         axios.post('http://localhost:9000/api/login', credential)
//             .then(result => {
//                 resolve(result.data);
//             })
//             .catch(_err => {
//                 reject(new Error('Wrong email or password'));
//             });
//     });
// };

// export function register(credential) {
//     return new Promise((resolve, reject) => {
//         axios.post('http://localhost:9000/api/register', credential)
//             .then(result => {
//                 resolve(result.data);
//             })
//             .catch(_err => {
//                 reject(new Error('Registration failed'));
//             })
//     })
// }

// export function logout() {
//     axios.post('http://localhost:9000/api/logout')
// };
// export function refreshToken() {
//     axios.post('http://localhost:9000/api/auth/refresh')
//     let refresh = false;
//     axios.interceptors.response.use(resp => resp, async error => {
//         if (error.response.status === 401 && !refresh) {
//             refresh = true;

//             const {status, data} = await axios.post('refresh', {}, {
//                 withCredentials: true
//             });

//             if (status === 200) {
//                 axios.defaults.headers.common['Authorization'] = `Bearer ${data.token}`;

//                 return axios(error.config);
//             }
//         }
//         refresh = false;
//         return error;
//     });
// };

// export function currentUser() {
//     const user = localStorage.getItem('user');

//     if (!user) {
//         return null;
//     }

//     return JSON.parse(user);
// }