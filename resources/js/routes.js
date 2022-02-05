import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter)

import HomeDash from './components/home/HomeIndex.vue';
/* import UserIndex from './components/user/UserIndex.vue'; */
import ClienteIndex from './components/cliente/ClienteIndex.vue';

window.baseUrl = '/dash';

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: baseUrl,
            name: 'spa',
            component: HomeDash
            //component: require('./components/HomeDash').default
        },
        /* {
            path: `${baseUrl}/user`,
            name: 'spa.user',
            component: UserIndex
        }, */
        {
            path: `${baseUrl}/cliente`,
            name: 'spa.cliente',
            component: ClienteIndex
        }, 


    ]
}) 