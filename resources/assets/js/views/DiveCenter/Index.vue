<template lang="html">
    <div id="dive-center">
        <dive-center class="pt-5"/>
        <meet-the-team class="pb-5"/>
        <price-list />
    </div>
</template>

<script>
import DiveCenter from './DiveCenter.vue'
import MeetTheTeam from './MeetTheTeam.vue'
import PriceList from './PriceList.vue'

export default {
    name: 'DiveCenterIndex',
    components: {
        DiveCenter,
        MeetTheTeam,
        PriceList,
    }
}
</script>

<style lang="css">
</style>
