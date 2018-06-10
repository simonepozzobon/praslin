<template lang="html">
    <div id="dive-center-panel">
        <dive-center />
        <boats />
        <dive-spots />
        <meet-the-team />
        <price-list />
    </div>
</template>

<script>
import Boats from './Boats.vue'
import DiveCenter from './DiveCenter.vue'
import DiveSpots from './DiveSpots.vue'
import MeetTheTeam from './MeetTheTeam.vue'
import PriceList from './PriceList.vue'

export default {
    name: 'DiveCenterIndex',
    components: {
        Boats,
        DiveCenter,
        DiveSpots,
        MeetTheTeam,
        PriceList,
    },
    watch: {
        '$route': 'scrollTo'
    },
    methods: {
        scrollTo: function() {
            var element = document.getElementById(this.$route.params.anchor)
            if (!element) return
            var top = element.offsetTop
            window.scrollTo(0, top)
        }
    }
}
</script>

<style lang="css">
</style>
