<template lang="html">
    <div id="menu-wrapper">
        <div id="mobile">
            <div id="top-menu">
                <div class="wrapper-logo">
                    <logo />
                </div>
                <div class="menu">
                    <burger size="32px" @click="showMobile"/>
                </div>
            </div>
            <div id="mobile-menu">
                <div class="menu-item">
                    <div class="menu-number">01</div>
                    <div class="menu-text">About</div>
                </div>
                <div class="menu-item">
                    <div class="menu-number">02</div>
                    <div class="menu-text">Dive Center</div>
                </div>
                <div class="menu-item">
                    <div class="menu-number">03</div>
                    <div class="menu-text">Galleries</div>
                </div>
                <div class="menu-item">
                    <div class="menu-number">04</div>
                    <div class="menu-text">Contact</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Logo from './Logo.vue'
import burger from '../components/icons/burger.vue'

import {TimelineMax} from 'gsap'
import EventBus from '~js/EventBus'

export default {
    name: 'TopMenu',
    components: {
        burger,
        Logo,
    },
    data: function() {
        return {
            isMobile: false,
            isOpen: false,
        }
    },
    methods: {
        showMobile: function() {

        }
    },
    mounted: function() {
        EventBus.$on('window-resized', size => {
            console.log(size)
            if (size.width < 768) {
                this.isMobile = true
            }
        })
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';

#top-menu {
    display: flex;
    width: 100%;

    > .wrapper-logo {
        background-color: $dark-gray;
        padding: 8px 19px 7px 10px;
    }

    > .menu {
        background-color: $sand;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }
}

#mobile-menu {
    display: flex;
    flex-direction: column;
    background-color: $sand;

    > .menu-item {
        display: flex;
        align-items: center;

        > .menu-number {
            color: $menu-green;
            padding: $spacer;
        }

        > .menu-text {
            text-transform: uppercase;
            padding: $spacer;
        }
    }
}
</style>
