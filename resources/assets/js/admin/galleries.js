import Vue from 'vue'

import FBSignInButton from 'vue-facebook-signin-button'
Vue.use(FBSignInButton)

import DivespotsPanel from './components/DivespotsPanel.vue'
import GalleryPanel from './components/GalleryPanel.vue'
import InstagramPanel from './components/InstragramPanel.vue'

const gallery = new Vue({
    el: '#admin-gallery',
    components: {
        DivespotsPanel,
        GalleryPanel,
        InstagramPanel,
    },
})
