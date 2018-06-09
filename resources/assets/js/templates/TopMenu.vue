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
                    <nav-item number="02" link='/dive-center' text="Dive Center"/>
                    <nav-item number="03" link='/galleries' text="Galleries"/>
                    <nav-item number="04" link='/island' text="Info"/>
                    <nav-item number="05" link='/contacts' text="Contact"/>
                </ul>
            </div>

            <weather-info-lite />
            <phone-call />
            <book-now />
        </nav>
    </div>
</template>

<script>
import BookNow from '../components/BookNow.vue'
import burger from '../components/icons/burger.vue'
import Logo from './Logo.vue'
import NavItem from '../components/NavItem.vue'
import PhoneCall from '../components/PhoneCall.vue'
import {TweenMax, TimelineMax} from 'gsap'
import WeatherInfoLite from './WeatherInfoLite.vue'

export default {
    name: 'TopMenu',
    components: {
        BookNow,
        burger,
        Logo,
        NavItem,
        PhoneCall,
        WeatherInfoLite,
    },
    data: function() {
        return {
            isAnimating: false,
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

            var master = new TimelineMax()
            master.add(t1, 0.1)
            master.add(t2, 0.7)
            master.add(t3, 0.8)
            master.play()
        }
    },
    mounted: function() {
        this.animate()
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

$menu-bg: $black;
$menu-color: $white;

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
            // padding-top: 6px;
            // padding-bottom: 12px;
            position: relative;
            // position: absolute;
            left: -$spacer;
            // top: 50%;
            // transform: translateY(-50%);
            min-width: 128px;
            // min-height: 89px;
            background-color: $menu-bg;
            @include box-shadow(0 8px 32px 0 rgba(37, 37, 37, .15));

            .logo {
                > svg {
                    width: 100%;
                }
            }
        }
    }

    #navbarContent {

        > .navbar-nav {
            justify-content: space-between;
            margin-left: 40px;
            margin-right: 40px;
            width: 100%;

            > .nav-item {
                display: flex;
                align-items: center;
                padding-right: $spacer;

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
                }
            }

            @include media-breakpoint-down('md') {
                margin-top: $spacer * 2;

                > .nav-item > span {
                    padding-right: $spacer;
                }
            };

        }
    }

    #weather-wrapper {
        display: flex;
        align-items: center;

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
