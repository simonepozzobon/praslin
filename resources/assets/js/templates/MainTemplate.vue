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
        var size = {
            width: window.innerWidth,
            height: window.innerHeight,
        }
        EventBus.$emit('window-resized', size)

        window.addEventListener('resize', _.debounce(() => {
            var size = {
                width: window.innerWidth,
                height: window.innerHeight
            }
            EventBus.$emit('window-resized', size)
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
