<template lang="html">
    <div id="home" class="page">
        <main-slider />
    </div>
</template>

<script>
import {TweenMax, TimelineMax} from 'gsap'
import MainSlider from '../components/MainSlider.vue'

export default {
    name: 'Home',
    components: {
        MainSlider,
    },
    data: function() {
        return {
            isAnimating: false,
        }
    },
    methods: {
        animate: function() {
            var t1 = new TimelineMax()
            t1.from('#home', 1.5, {
                opacity: 0,
                ease: Back.easeInOut
            })
        }
    },
    mounted: function() {
        this.animate()
    }
}
</script>

<style lang="scss">
</style>
