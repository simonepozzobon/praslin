<template lang="html">
    <div class="image-container" :style="'min-height:'+this.height+'px; width: 100%;'">
        <div
            class="load-img-overlay"
            :style="'width:'+this.percent+'; min-height:'+this.height+'px; top: '+this.top+'; right: '+this.right+'; '"
            ref="overlay">
            </div>
        <div
            class="img-src"
            :class="this.shadowClass"
            :style="'background-image: url('+this.src+'); min-height:'+this.height+'px; width: '+this.percent+'; top: '+this.top+'; right: '+this.right+'; '"
            ref="image">
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
            var t1 = new TimelineMax()
            t1.to(this.$refs.overlay, 2, {
                width: 0,
                delay: 1,
                ease: Power4.easeOut
            })

            var t2 = new TimelineMax()
            t2.from(this.$refs.image, 2, {
                opacity: 0,
                ease: Power4.easeOut,
            })

            var master = new TimelineMax()
            master.add(t2, 0.1)
            master.add(t1, 0.3)
            master.play()
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
    @include media-breakpoint-down('md') {
        margin-top: $spacer;
    }

    .load-img-overlay {
        position: absolute;
        content: '';
        background-color: $white;
        z-index: 1;

        @include media-breakpoint-down('md') {
            display: none;
        }
    }

    .img-src {
        // width: 100%;
        min-height: 60px;
        background-size: cover;
        background-position: center;
        position: absolute;
        z-index: 0;

        @include media-breakpoint-down('md') {
            width: 100% !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
        };

        @include media-breakpoint-up('md') {
            &.shadowed {
                @include box-shadow(0 2px 16px 0 rgba($black, 0.15));
            }
        };
    }
}
</style>
