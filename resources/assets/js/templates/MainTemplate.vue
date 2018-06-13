<template lang="html">
    <div id="main-template">
        <top-menu></top-menu>
        <phone-modal></phone-modal>
        <book-now-modal></book-now-modal>
        <transition :css="false" @enter="enter" @leave="leave">
            <router-view></router-view>
        </transition>
        <footer-template></footer-template>
    </div>
</template>

<script>
import _ from 'lodash'
import BookNowModal from './BookNowModal.vue'
import EventBus from '~js/EventBus'
import FooterTemplate from './FooterTemplate.vue'
import PhoneModal from './PhoneModal.vue'
import TopMenu from './TopMenu.vue'
import {TweenMax, TimelineMax} from 'gsap'

export default {
    name: 'MainTemplate',
    components: {
        BookNowModal,
        FooterTemplate,
        PhoneModal,
        TopMenu,
    },
    methods: {
        calculateSize: function() {
            var size = {
                width: window.innerWidth,
                height: window.innerHeight
            }

            if (size.width <= 576) {
                size.value = 'xs'
            } else if (size.width > 576 && size.width <= 768) {
                size.value = 'sm'
            } else if (size.width > 768 && size.width <= 992) {
                size.value = 'md'
            } else if (size.width > 992 && size.width <= 1200) {
                size.value = 'lg'
            } else if (size.width > 1200) {
                size.value = 'xl'
            }

            EventBus.$emit('window-resized', size)
        },
        enter: function(el, done) {
            TweenMax.fromTo(el, .4, {
                opacity: 0,
            }, {
                opacity: 1,
                onComplete: done
            })
        },
        leave: function(el, done) {
            TweenMax.fromTo(el, .4, {
                opacity: 1,
            }, {
                opacity: 0,
                onComplete: done
            })
        },
    },
    mounted: function() {
        this.calculateSize()

        window.addEventListener('resize', _.debounce(() => {
            this.calculateSize()
        }, 100))
    }
}
</script>

<style lang="scss">
#main-template {
    padding-top: 75px;
    height: 100%;
    min-height: 100vh;
}
</style>
