<template lang="html">
    <div id="phone-modal-wrapper">
        <div id="phone-modal">
            <div class="info mobile">
                <i class="fas fa-mobile"></i>
                <span>+248 26 33 000</span>
            </div>
            <div class="info center">
                <i class="fas fa-phone"></i>
                <span>+248 42 32 113</span>
            </div>
        </div>
        <div id="phone-modal-shape">
            <svg width="32px" height="32px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="animation-utilities" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="phone-modal-start">
                        <rect id="Rectangle" x="12" y="12" width="8" height="8"></rect>
                    </g>
                </g>
            </svg>
        </div>
    </div>
</template>

<script>
import EventBus from '~js/EventBus'
import {TimelineMax} from 'gsap'

export default {
    name: 'PhoneModal',
    data: function() {
        return {
            isOpen: false,
        }
    },
    methods: {
        toggleModal: function() {
            if (this.isOpen) {
                var t1 = new TimelineMax()
                t1.to('#phone-modal', .4, {
                    opacity: 0,
                    display: 'none',
                    onComplete: () => {
                        this.isOpen = false
                    }
                })
            } else {
                var t1 = new TimelineMax()
                t1.to('#phone-modal', .4, {
                    opacity: 1,
                    display: 'flex',
                    onComplete: () => {
                        this.isOpen = true
                    }
                })
            }
        },
    },
    mounted: function() {
        EventBus.$on('toggle-phone-modal', () => {
            this.toggleModal()
        })
    },
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

#phone-modal {
    position: absolute;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    background-color: $sand;
    z-index: 100;
    @include box-shadow(0 8px 32px 0 rgba(37, 37, 37, .15));

    display: none;
    opacity: 0;

    > .info {
        padding: $spacer * 2;

        > i {
            padding-right: $spacer;
        }
    }
}

#phone-modal-start {
    fill: $sand;
}
</style>
