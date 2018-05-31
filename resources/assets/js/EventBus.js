import Vue from 'vue'

const EventBus = new Vue({
    created: function() {
        console.log('EventBus loaded')
    }
})

export default EventBus
