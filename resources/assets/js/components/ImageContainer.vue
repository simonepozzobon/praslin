<template lang="html">
    <div class="image-container">
        <div class="img-src">
            <img :src="src">
        </div>
    </div>
</template>

<script>
import {TweenMax, TimelineMax} from 'gsap'

export default {
    name: 'ImageContainer',
    props: {
        src: {
            type: String,
            default: '',
        }
    },
    methods: {
        animate: function() {

        }
    },
    mounted: function() {
        this.animate()
    }
}
</script>

<style lang="css">
</style>
