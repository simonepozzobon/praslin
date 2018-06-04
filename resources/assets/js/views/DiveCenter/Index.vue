<template lang="html">
    <div id="dive-center-panel">
        <dive-center />
        <dive-spots />
        <meet-the-team />
        <price-list />
    </div>
</template>

<script>
import DiveCenter from './DiveCenter.vue'
import DiveSpots from './DiveSpots.vue'
import MeetTheTeam from './MeetTheTeam.vue'
import PriceList from './PriceList.vue'

export default {
    name: 'DiveCenterIndex',
    components: {
        DiveCenter,
        DiveSpots,
        MeetTheTeam,
        PriceList,
    }
}
</script>

<style lang="css">
</style>
