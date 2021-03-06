
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

import Vue from 'vue'
window.Vue = require('vue')

import VueResource from 'vue-resource'
import VueRouter from 'vue-router'
import VueVisibility from 'vue-observe-visibility'
import BootstrapVue from 'bootstrap-vue'

Vue.use(VueResource)
Vue.use(VueRouter)
Vue.use(VueVisibility)
Vue.use(BootstrapVue)

const router = new VueRouter({
    mode: 'history',
    base: __dirname,
    routes: [
        {
            path: '/',
            name: 'Home',
            component: require('./views/Home.vue')
        },
        {
            path: '/about',
            name: 'About',
            component: require('./views/About/Index.vue')
        },
        {
            path: '/dive-center/:anchor',
            name: 'DiveCenter',
            component: require('./views/DiveCenter/Index.vue')
        },
        {
            path: '/galleries',
            name: 'Galleries',
            component: require('./views/Galleries/Index.vue')
        },
        {
            path: '/island',
            name: 'Island',
            component: require('./views/Island/Index.vue')
        },
        {
            path: '/contacts',
            name: 'Contacts',
            component: require('./views/Contact/Index.vue')
        },
        {
            path: '/privacy',
            name: 'Privacy',
            component: require('./views/Privacy.vue')
        }
    ]
})

import MainTemplate from './templates/MainTemplate.vue'

const app = new Vue({
    el: '#app',
    router,
    components: {
        MainTemplate
    }
}).$mount('#app')

window.addEventListener('popstate', () => {
    app.currentRoute = window.location.pathname
})
