<template lang="html">
    <li class="nav-item dropdown" @mouseenter="animate">
        <span class="nav-number" ref="number">
            {{ number }}
        </span>
        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
            {{ text }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a href="" class="dropdown-item" @click="selected('dive-center', $event)" @tap="selected('dive-center', $event)">Dive Center</a>
            <a href="" class="dropdown-item" @click="selected('boats', $event)" @tap="selected('boats', $event)">Boats</a>
            <a href="" class="dropdown-item" @click="selected('diving-spots', $event)" @tap="selected('diving-spots', $event)">Dive Spots</a>
            <a href="" class="dropdown-item" @click="selected('meet-the-team', $event)" @tap="selected('meet-the-team', $event)">Meet The Team</a>
            <a href="" class="dropdown-item" @click="selected('price-list', $event)" @tap="selected('price-list', $event)">Price List</a>
        </div>
        <!-- <a class="nav-link dropdown-toggle" active-class="active" :to="link">

        </a> -->
    </li>
</template>

<script>
import {TweenMax, TimelineMax} from 'gsap'

export default {
    name: 'NavItem',
    props: {
        link: {
            type: String,
            default: '/',
        },
        number: {
            type: String,
            default: '00',
        },
        text: {
            type: String,
            default: 'Home'
        },
    },
    data: function() {
        return {
            isAnimating: false,
        }
    },
    methods: {
        animate: function() {
            if (!this.isAnimating) {
                this.isAnimating = true
                var text = new SplitText(this.$refs.number, {type: 'chars'})

                var t1 = new TimelineMax()
                t1.set(text.chars, {
                    perspective: 400,
                })
                    .staggerFrom(text.chars, 0.8, {
                        opacity: 0,
                        y: 16,
                        ease: Back.easeInOut,
                        onComplete: () => {
                            this.isAnimating = false
                            text.revert()
                        }
                    }, 0.1, '+=0')
            }
        },
        selected: function(item, event) {
            event.preventDefault()
            this.$emit('selected')
            this.$router.push({name: 'DiveCenter', params: {anchor: item}})
        }
    },
    mounted: function() {

    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

.dropdown-menu {
    background-color: $black;
    @include border-radius(0);

    > .dropdown-item {
        color: $white;
        text-transform: uppercase;
        font-weight: 500;
        font-size: 14px;
        padding-bottom: $spacer / 2;
        padding-top: $spacer / 2;
        transition: all .3s ease-in-out;

        &:active, &:visited, &:link {
            color: $white;
            transition: all .3s ease-in-out;
        }

        &:hover {
            background-color: transparent;
            color: $menu-green;
            transition: all .8s ease-in-out;
        }
    }
}
</style>
