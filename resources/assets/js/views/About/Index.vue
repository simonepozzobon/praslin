<template lang="html">
    <div id="about">
        <about-us class="pt-5"/>
    </div>
</template>

<script>
import AboutUs from './AboutUs.vue'

export default {
    name: 'AboutIndex',
    components: {
        AboutUs,
    }
}
</script>

<style lang="css">

#about {
    padding-top: 180px;
}
</style>
