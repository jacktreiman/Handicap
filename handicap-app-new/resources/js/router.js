import Vue from 'vue';
import VueRouter from 'vue-router';

import PostScore from './pages/PostScore.vue';
import Stats from './pages/Stats.vue';
import About from './pages/About.vue';
import Groups from './pages/Groups.vue';
import MyGroups from './pages/MyGroups.vue';

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
        {
            path: '/home',
            name: 'about',
            component: About
        },
        {
            path: '/home/join-group',
            name: 'join-group',
            component: Groups
        },
        {
            path: '/home/my-groups',
            name: 'my-groups',
            component: MyGroups
        },
    ]
});

export default router;