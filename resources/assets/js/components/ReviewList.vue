<template lang="html">
    <div class="container">
        <review-single v-for="review in reviews" :key="review.id" :review="review"/>
    </div>
</template>

<script>
import ReviewSingle from './ReviewSingle.vue'

export default {
    name: 'ReviewList',
    components: {
        ReviewSingle,
    },
    props: {
        reviews: {
            type: Array,
            default: function() {},
        }
    }
}
</script>

<style lang="scss">
</style>
