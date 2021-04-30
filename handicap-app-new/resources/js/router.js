import Vue from 'vue';
import VueRouter from 'vue-router';

import PostScore from './pages/PostScore.vue';
import Stats from './pages/Stats.vue';

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
    ]
});

export default router;