import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
//import dei componenti che fungono da pagine .
import IndexVue from './views/pages/IndexVue.vue'
import ShowVue from './views/pages/ShowVue.vue'

const router = new VueRouter({
    //scrivere tutti i path per le pagine
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'IndexVue',
            component: IndexVue
        },
        {
            path: '/apartments/:id',
            name: 'apartments',
            component: ShowVue

        }
    ]
});
export default router;
