<template lang="html">
    <div class="stars-rating">
        <div class="d-inline-block" >
            <i class="fas fa-star" v-for="i in this.stars"></i><i class="far fa-star" v-for="i in this.emptyStars"></i>
        </div>
    </div>
</template>

<script>
export default {
    name: 'StarsIcons',
    props: {
        stars: {
            type: Number,
            default: 0,
        }
    },
    computed: {
        emptyStars: function() {
            return 5 - this.stars
        }
    }

}
</script>

<style lang="css">
</style>
