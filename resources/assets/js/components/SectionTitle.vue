<template lang="html">
    <div class="section-title" :class="align" @mouseenter="animate">
        <div class="number" ref="number">
            {{ number }}
        </div>
        <div class="text">
            {{ title }}
        </div>
    </div>
</template>

<script>
import {TweenMax, TimelineMax} from 'gsap'
import SplitText from '~js/externals/SplitText'
import GSDevTools from '~js/externals/GSDevTools'

export default {
    name: 'SectionTitle',
    props: {
        number: {
            type: String,
            default: '00',
        },
        title: {
            type: String,
            default: 'title',
        },
        align: {
            type: String,
            default: 'left',
        }
    },
    data: function() {
        return {
            isAnimating: false,
        }
    },
    methods: {
        animate: function() {
            if (!this.isAnimating) {
                this.isAnimating = true
                var text = new SplitText(this.$refs.number, {type: 'chars'})

                var t1 = new TimelineMax()
                t1.set(text.chars, {
                    perspective: 400,
                })
                    .staggerFrom(text.chars, 0.8, {
                        opacity: 0,
                        y: 80,
                        ease: Back.easeInOut,
                        onComplete: () => {
                            this.isAnimating = false
                            text.revert()
                        }
                    }, 0.1, '+=0')
            }
        },
    },
    mounted: function() {
            this.animate()
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';

.section-title {
    position: relative;

    > .number {
        position: absolute;
        color: $light-blue;
        font-size: 132px;
        line-height: 80px;
        top: 50%;
        transform: translateY(-60%);
    }

    > .text {
        position: absolute;
        color: $black;
        font-size: 36px;
        font-weight: 700;
        text-transform: uppercase;
        line-height: 36px;
        top: 50%;
        transform: translateY(-50%);
    }

    &.left {
        > .number {
            left: -8px;
        }

        > .text {
            left: 0;
        }
    }

    &.right {
        > .number {
            right: -8px;
        }

        > .text {
            right: 0;
        }
    }

    &.center {
        > .number {
            left: 50%;
            transform: translate(-50%, -60%);
        }

        > .text {
            left: 50%;
            transform: translate(-50%, -60%);
        }
    }
}

</style>
