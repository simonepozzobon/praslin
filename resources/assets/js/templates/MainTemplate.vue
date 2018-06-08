<template lang="html">
    <div id="main-template">
        <top-menu></top-menu>
        <phone-modal></phone-modal>
        <router-view></router-view>
        <footer-template></footer-template>
    </div>
</template>

<script>
import FooterTemplate from './FooterTemplate.vue'
import PhoneModal from './PhoneModal.vue'
import TopMenu from './TopMenu.vue'

import _ from 'lodash'
import EventBus from '~js/EventBus'

export default {
    name: 'MainTemplate',
    components: {
        FooterTemplate,
        PhoneModal,
        TopMenu,
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
}
</style>
