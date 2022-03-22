import { createRouter, createWebHistory } from 'vue-router'


import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Book from './pages/Book.vue';

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
]


const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
