<template lang="html">
    <div class="stars-rating">
        <div class="d-inline-block" v-for="i in this.stars">
            <i class="fas fa-star"></i>
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
    }
}
</script>

<style lang="css">
</style>
