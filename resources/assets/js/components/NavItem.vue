<template lang="html">
    <li class="nav-item" @mouseenter="animate">
        <span class="nav-number" ref="number">
            {{ number }}
        </span>
        <a class="nav-link" href="" @click="selected" @touchstart="selected">
            {{ text }}
        </a>
    </li>
</template>

<script>
import {TweenMax, TimelineMax} from 'gsap'

export default {
    name: 'NavItem',
    props: {
        link: {
            type: String,
            default: '/',
        },
        number: {
            type: String,
            default: '00',
        },
        text: {
            type: String,
            default: 'Home'
        },
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
                        y: 16,
                        ease: Back.easeInOut,
                        onComplete: () => {
                            this.isAnimating = false
                            text.revert()
                        }
                    }, 0.1, '+=0')
            }
        },
        selected: function(event) {
            event.preventDefault()
            this.$emit('selected')
            this.$router.push(this.link)
        }
    },
    mounted: function() {

    }
}
</script>

<style lang="scss">
</style>
