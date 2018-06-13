<template lang="html">
    <div id="book-now-wrapper">
        <div class="call-to-action">
            <b-btn v-b-modal.bookmodalwrapper class="text-uppercase btn-sm"><i class="fas fa-calendar-check"></i> Book Now</b-btn>
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

    #book-now-wrapper {
        padding-left: $spacer * 2;
        @include media-breakpoint-down('xs') {
            padding-bottom: $spacer * 2;
        };

        .btn {
            background-color: transparent;
            border: 2px solid $white;
            color: $white;
            transition: all .4s ease-in-out;

            > i {
                padding-right: $spacer / 2;

                @media (max-width: 1075px) and (min-width: 991px) {
                    display: none;
                }
            }

            &:hover {
                background-color: $white;
                color: $black;
                transition: all .4s ease-in-out;
            }
        }
    }
</style>
