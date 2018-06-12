<template lang="html">
    <div class="image-container" :style="'min-height:' + this.height + 'px; width: 100%;'">
        <div
            class="img-src"
            :class="this.shadowClass"
            :style="'background-image: url(' + this.src + '); min-height:' + this.height + 'px; width: ' + this.percent + '; top: ' + this.top + '; right: ' + this.right + '; '">
        </div>
    </div>
</template>

<script>
import {TweenMax, TimelineMax} from 'gsap'

export default {
    name: 'ImageContainer',
    props: {
        height: {
            type: Number,
            default: 60,
        },
        percent: {
            type: String,
            default: '100%',
        },
        right: {
            type: String,
            default: 'inherit'
        },
        shadow: {
            type: Boolean,
            default: false,
        },
        src: {
            type: String,
            default: '',
        },
        top: {
            type: String,
            default: 'inherit',
        },
    },
    computed: {
        shadowClass: function() {
            if (this.shadow) {
                return 'shadowed'
            }
        }
    },
    methods: {
        animate: function() {

        }
    },
    mounted: function() {
        this.animate()
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

.image-container {
    position: relative;

    .img-src {
        width: 100%;
        min-height: 60px;
        background-size: cover;
        background-position: center;
        position: absolute;

        &.shadowed {
            @include box-shadow(0 2px 16px 0 rgba($black, 0.15));
        }
    }
}
</style>
