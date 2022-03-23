import { createRouter, createWebHistory } from 'vue-router'


import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Book from './pages/Book.vue';
import Cart from './pages/checkout.vue';

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
        path: '/checkout',
        name: 'cart',
        component: Cart
    },
]


const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
