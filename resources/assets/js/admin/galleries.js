import Vue from 'vue'

import DivespotsPanel from './components/DivespotsPanel.vue'
import GalleryPanel from './components/GalleryPanel.vue'

const gallery = new Vue({
    el: '#admin-gallery',
    components: {
        DivespotsPanel,
        GalleryPanel,
    },
})
