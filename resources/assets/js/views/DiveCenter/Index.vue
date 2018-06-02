<template lang="html">
    <div id="dive-center">
        <dive-center class="pt-5"/>
        <meet-the-team />
    </div>
</template>

<script>
import DiveCenter from './DiveCenter.vue'
import MeetTheTeam from './MeetTheTeam.vue'

export default {
    name: 'DiveCenterIndex',
    components: {
        DiveCenter,
        MeetTheTeam,
    }
}
</script>

<style lang="css">
</style>
