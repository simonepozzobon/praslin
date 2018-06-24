<template lang="html">
    <div>
        <nav id="main-menu" class="navbar navbar-expand-lg">
            <div class="navbar-brand">
                <div class="navbar-brand-bg">
                    <router-link :to="'/'"><logo align="center" /></router-link>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <burger size="32px"/>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav">
                    <nav-item number="01" link='/about' text="About" />
                    <nav-item-dropdown number="02" link='/dive-center' text="Dive Center"/>
                    <nav-item number="03" link='/galleries' text="Galleries"/>
                    <nav-item number="04" link='/island' text="Info"/>
                    <nav-item number="05" link='/contacts' text="Contact"/>
                    <weather-info-lite />
                    <phone-call />
                    <book-now />
                    <audio-control v-if="this.isDesktop" size="small" :animated="true"/>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
import AudioControl from '../components/AudioControl.vue'
import BookNow from '../components/BookNow.vue'
import burger from '../components/icons/burger.vue'
import Logo from './Logo.vue'
import NavItem from '../components/NavItem.vue'
import NavItemDropdown from '../components/NavItemDropdown.vue'
import PhoneCall from '../components/PhoneCall.vue'
import {TweenMax, TimelineMax} from 'gsap'
import WeatherInfoLite from './WeatherInfoLite.vue'

const MobileDetect = require('mobile-detect')

export default {
    name: 'TopMenu',
    components: {
        AudioControl,
        BookNow,
        burger,
        Logo,
        NavItem,
        NavItemDropdown,
        PhoneCall,
        WeatherInfoLite,
    },
    data: function() {
        return {
            isAnimating: false,
            isDesktop: false,
        }
    },
    methods: {
        animate: function() {
            var t1 = new TimelineMax()
            var elements = document.getElementsByClassName('nav-item')

            t1.staggerFrom(elements, .8, {
                y: -16,
                opacity: 0,
                ease: Back.easeInOut,
            }, .1, '+=0')

            var t2 = new TimelineMax()
            t2.from('#weather-wrapper', .8, {
                y: -16,
                opacity: 0,
                ease: Back.easeInOut,
            })

            var t3 = new TimelineMax()
            t3.from('#phone-call-wrapper', .8, {
                y: -16,
                opacity: 0,
                ease: Back.easeInOut,
            })

            var t4 = new TimelineMax()
            t4.from('#book-now-wrapper', .8, {
                y: -16,
                opacity: 0,
                ease: Back.easeInOut,
            })

            var t5 = new TimelineMax()
            t5.from('#audio-control-wrapper', .8, {
                y: -16,
                opacity: 0,
                ease: Back.easeInOut,
            })

            var master = new TimelineMax()
            master.add(t1, 0.1)
            master.add(t2, 0.7)
            master.add(t3, 0.8)
            master.add(t4, 0.9)
            master.add(t5, 1.0)
            master.play()
        },
        mobileDetect: function() {
            var md = new MobileDetect(window.navigator.userAgent)
            if (!md.phone() && !md.tablet()) {
                this.isDesktop = true
            } else {
                this.isDesktop = false
            }
        }
    },
    mounted: function() {
        this.animate()
        this.mobileDetect()
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

$menu-bg: $black;
$menu-color: $white;

@media (max-width: 1263px) and (min-width: 991px) {

}

#main-menu {
    // display: flex;

    width: 100%;
    background-color: $menu-bg;
    position: fixed;
    z-index: 101;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    @include media-breakpoint-up('md') {
        min-height: 75px;
    };
    @include box-shadow(0 16px 32px 0 rgba(37, 37, 37, .15));

    > .navbar-brand {
        position: relative;
        min-width: 128px;
        max-width: 170px;

        > .navbar-brand-bg {
            position: relative;
            left: -$spacer;
            min-width: 128px;
            background-color: $menu-bg;
            @include box-shadow(0 8px 32px 0 rgba(37, 37, 37, .15));

            .logo {
                > svg {
                    width: 100%;
                }
            }
        }

    }

    > .navbar-toggler svg #burger-icon #burger {
        fill: $white;
    }

    #navbarContent {
        height: 100vh;

        @include media-breakpoint-up('lg') {
            height: auto;
        };

        > .navbar-nav {
            justify-content: flex-end;
            margin-left: 40px;
            // margin-right: 40px;
            width: 100%;

            @media (max-width: 1263px) and (min-width: 991px) {
                margin-left: 0;
                margin-right: 0;
            }

            @include media-breakpoint-down('md') {
                padding-bottom: $spacer * 3;
            };

            > .nav-item {
                display: flex;
                align-items: center;
                padding-right: $spacer;

                @include media-breakpoint-down('lg') {
                    > .nav-number {
                        padding-right: $spacer / 2;
                    }
                };

                > span {
                    display: inline-block;
                    color: $menu-green;
                }

                > .nav-link {
                    text-transform: uppercase;
                    font-weight: 500;
                    font-size: 14px;

                    &:active, &:link, &:visited {
                        color: $menu-color;
                        transition: all .3s ease-in-out;
                    }

                    &:hover {
                        color: $menu-green;
                        transition: all .8s ease-in-out;
                    }

                    @media (max-width: 1290px) and (min-width: 991px) {
                        font-size: 12px;
                    }

                    @media (max-width: 1040px) and (min-width: 991px) {
                        font-size: 10px;
                    }
                }



            }
        }
    }

    #weather-wrapper {
        display: flex;
        align-items: center;
        min-width: 100px;

        > .temperature {
            color: $menu-color;
            font-size: 20px;
            font-weight: 700;
        }

        > .icon {
            padding-right: $spacer;

            > svg {
                width: 36px;
            }
        }
    }
}


</style>
