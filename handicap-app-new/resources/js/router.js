import Vue from 'vue';
import VueRouter from 'vue-router';

import PostScore from './pages/PostScore.vue';
import ScoreLeaderboard from './pages/ScoreLeaderboard.vue';
import TopHandicaps from './pages/TopHandicaps.vue';
import About from './pages/About.vue';
import Groups from './pages/Groups.vue';
//import GroupInfo from './pages/GroupInfo.vue';
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
            path: '/home/score-leaderboard',
            name: 'top-scores',
            component: ScoreLeaderboard
        },
        {
            path: '/home/handicap-leaderboard',
            name: 'top-handicaps',
            component: TopHandicaps
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
        // {
        //     path: '/home/join-group/group-info',
        //     name: 'group-info',
        //     component: GroupInfo
        // },

        {
            path: '/home/my-groups',
            name: 'my-groups',
            component: MyGroups
        },
    ]
});

export default router;