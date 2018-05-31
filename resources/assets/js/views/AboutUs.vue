<template lang="html">
    <div id="about-us" class="container">
        <div class="row">
            <div class="col-md-6">
                Immagini
            </div>
            <div class="col-md-6">
                <section-title title="About Us" number="01" />
            </div>
        </div>
    </div>
</template>

<script>
import SectionTitle from '../components/SectionTitle.vue'

export default {
    name: 'AboutUs',
    components: {
        SectionTitle,
    }
}
</script>

<style lang="scss">

#about-us {
    z-index: 2;
}
</style>
