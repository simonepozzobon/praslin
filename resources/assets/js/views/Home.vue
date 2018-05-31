<template lang="html">
    <div id="home" class="page">
        <main-slider />
        <about-us class="pt-5"/>
    </div>
</template>

<script>
import AboutUs from './AboutUs.vue'
import MainSlider from '../components/MainSlider.vue'

export default {
    name: 'Home',
    components: {
        AboutUs,
        MainSlider,
    },
}
</script>

<style lang="scss">
</style>
