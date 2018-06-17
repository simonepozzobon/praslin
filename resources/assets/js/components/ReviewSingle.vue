<template lang="html">
    <div class="row review-single">
        <div class="col">
            <review-single-top
                :name="this.review.name"
                :date="this.review.date"
                :rating="this.review.rating"/>
            <div class="message">
                <p>
                    {{ this.review.message }}
                </p>
            </div>
            <!-- <div class="actions">Icons</div> -->
        </div>
    </div>
</template>

<script>
import ReviewSingleTop from './ReviewSingleTop.vue'

export default {
    name: 'ReviewSingle',
    components: {
        ReviewSingleTop,
    },
    props: {
        review: {
            type: Object,
            default: function() {},
        },
    },
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

.review-single {
    padding-bottom: $spacer;
    padding-top: $spacer;

    > .col {
        display: flex;
        flex-direction: column;
        background-color: $sand;

        > .message {
            padding-top: $spacer;
            // padding-bottom: $spacer;
        }
    }
}

</style>
