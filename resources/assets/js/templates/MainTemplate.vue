<template lang="html">
    <div>
        <top-menu></top-menu>
    </div>
</template>

<script>
import TopMenu from './TopMenu.vue'

import _ from 'lodash'
import EventBus from '~js/EventBus'

export default {
    name: 'MainTemplate',
    components: {
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

<style lang="css">
</style>
