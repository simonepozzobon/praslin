<template lang="html">
    <div id="phone-call-wrapper">
        <div class="call-to-action">
            <button class="btn btn-sm btn-white text-uppercase" @click="openModal">
                <i class="fas fa-calendar-check"></i> Book Now
            </button>
        </div>
    </div>
</template>

<script>
import EventBus from '~js/EventBus'
export default {
    name: 'PhoneCall',
    methods: {
        openModal: function() {
            EventBus.$emit('toggle-book-modal')
        }
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

    #phone-call-wrapper {
        padding-left: $spacer * 2;

        .btn {
            background-color: transparent;
            border: 2px solid $white;
            color: $white;
            transition: all .4s ease-in-out;

            > i {
                padding-right: $spacer / 2;
            }

            &:hover {
                background-color: $white;
                color: $black;
                transition: all .4s ease-in-out;
            }
        }
    }
</style>
