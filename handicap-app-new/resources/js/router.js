import Vue from 'vue';
import VueRouter from 'vue-router';

import PostScore from './pages/PostScore.vue';
import Stats from './pages/Stats.vue';
//import About from './pages/About.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/home/post-score',
            name: 'post-score',
            component: PostScore
        },
        {
            path: '/home/stats',
            name: 'stats',
            component: Stats
        },
        /*{
            path: '/home',
            name: 'about',
            component: About
        },*/
    ]
});

export default router;