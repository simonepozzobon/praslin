<template lang="html">
    <div id="main-slider">
        <swiper id="swiper" :options="swiperOptions" ref="mainSlider">
            <swiper-slide class="slide slide-1">
                <!-- <main-slider-slogan class="main-slider-slogan"/> -->
            </swiper-slide>
            <swiper-slide class="slide slide-2">
                <!-- <main-slider-slogan class="main-slider-slogan"/> -->
            </swiper-slide>
            <swiper-slide class="slide slide-3">
                <!-- <main-slider-slogan class="main-slider-slogan"/> -->
            </swiper-slide>
            <swiper-slide class="slide slide-4">
                <!-- <main-slider-slogan class="main-slider-slogan"/> -->
            </swiper-slide>
            <swiper-slide class="slide slide-5">
                <!-- <main-slider-slogan class="main-slider-slogan"/> -->
            </swiper-slide>
            <swiper-slide class="slide slide-6">
                <!-- <main-slider-slogan class="main-slider-slogan"/> -->
            </swiper-slide>
            <swiper-slide class="slide slide-7">
                <!-- <main-slider-slogan class="main-slider-slogan"/> -->
            </swiper-slide>
            <div class="swiper-pagination swiper-pagination-white" slot="pagination"></div>
            <div class="swiper-button-prev swiper-button-white" slot="button-prev"></div>
            <div class="swiper-button-next swiper-button-white" slot="button-next"></div>
        </swiper>
    </div>
</template>

<script>
import 'swiper/dist/css/swiper.css'
import {swiper, swiperSlide} from 'vue-awesome-swiper'
import MainSliderSlogan from './MainSliderSlogan.vue'

export default {
    name: 'MainSlider',
    components: {
        MainSliderSlogan,
        swiper,
        swiperSlide,
    },
    data: function() {
        return {
            swiperOptions: {
                autoplay: {
                    delay: 7000,
                    disableOnInteraction: false,
                },
                speed: 300,
                keyboard: {
                    enabled: true,
                },
                lazy: true,
                // loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                pagination: {
                    el: '.swiper-pagination',
                    dynamicBullets: true,
                    clickable: true,
                },
                preloadImages: false,
            },
        }
    },
    computed: {
        swiper: function() {
            return this.$refs.mainSlider.swiper
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

#main-slider {
    position: relative;
    top: 0;
}

.swiper-container {
    width: 100%;
    height: 100%;
}

.slide {
    height: 100%;
    min-height: calc(100vh - 90px);
    max-height: 100vh;
    background-position: center;
    background-size: cover;
    overflow: hidden;
}

.main-slider-slogan {
    position: absolute;
    top: 35%;
    left: 50%;
    width: 60%;
    height: 100%;
    transform: translate(-50%, -50%);

    @include media-breakpoint-down('md') {
        width: 90%;
    };
}

.slide-1 {
    background-image: url('/images/home-5.jpg');
}

.slide-2 {
    background-image: url('/images/home-4.jpg');
}

.slide-3 {
    background-image: url('/images/home-6.jpg');
}

.slide-4 {
    background-image: url('/images/home-7.jpg');
}

.slide-5 {
    background-image: url('/images/home-8.jpg');
}

.slide-6 {
    background-image: url('/images/home-2.JPG');
}

.slide-7 {
    background-image: url('/images/home-3.JPG');
}
</style>
