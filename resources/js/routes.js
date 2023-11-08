import Home from '@/Pages/Home.vue'
import Login from '@/Pages/Auth/Login.vue'
import Register from '@/Pages/Auth/Register.vue'

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    },
    // {
    //     path: '/404',
    //     name: '404',
    //     component: NotFound
    // },
    // {
    //     path: '*',
    //     redirect: '404',
    // }
];

export default routes;
