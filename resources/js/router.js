import { createRouter, createWebHistory } from 'vue-router'


import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Book from './pages/Book.vue';
import Genre from './pages/Genre.vue';
import Cart from './pages/Checkout.vue';
import Login from './pages/Login.vue';
import Register from './pages/Register.vue';
import Dashboard from './pages/Dashboard.vue';
import cms from './pages/CMS.vue';

export const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/about',
        name: 'about',
        component: About
    },
    {
        path: '/book/:id',
        name: 'book',
        component: Book
    },
    {
        path: '/genre/:id',
        name: 'genre',
        component: Genre
    },
    {
        path: '/checkout',
        name: 'cart',
        component: Cart
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
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard
    },
    {
        path: '/cms',
        name: 'cms',
        component: cms
    },
]


const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
