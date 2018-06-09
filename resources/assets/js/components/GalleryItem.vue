<template lang="html">
    <div class="gallery-item col-md-4 pb-4" @mouseenter="animate" @mouseleave="fadeOut">
        <img :src="image" class="img-fluid w-100"/>
        <div class="overlay">
            <svg width="350px" height="350px" viewBox="0 0 350 350" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g class="water-gallery">
                        <g id="Group" transform="translate(141.000000, 113.000000)">
                            <circle id="end" cx="33" cy="62" r="32" ref="end" visibility="hidden"></circle>
                            <path d="M34,94 C51.673112,94 66,89.673112 66,72 C66,60.2179253 55.3333333,39.5512587 34,10 C12.6666667,39.5512587 2,60.2179253 2,72 C2,89.673112 16.326888,94 34,94 Z" id="step-2" ref="step2" visibility="hidden"></path>
                            <path d="M35,94.3984375 C52.673112,94.3984375 68,93.673112 68,76 C68,64.2179253 56.6666667,50.2179253 34,34 C11.3333333,50.2179253 0,64.2179253 0,76 C0,93.673112 17.326888,94.3984375 35,94.3984375 Z" id="step-1" ref="step1" visibility="hidden"></path>
                            <path d="M34,94 C51.673112,94 66,79.673112 66,62 C66,50.2179253 55.3333333,29.5512587 34,0 C12.6666667,29.5512587 2,50.2179253 2,62 C2,79.673112 16.326888,94 34,94 Z" id="start" ref="start" visibility="hidden"></path>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
    </div>
</template>

<script>
import {TweenMax, TimelineMax} from 'gsap'
import MorphSVG from '~js/externals/MorphSVGPlugin'
import GSDevTools from '~js/externals/GSDevTools'

export default {
    name: 'GalleryItem',
    props: {
        image: {
            type: String,
            default: 'none',
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
                var el = this.$refs.start
                this.isAnimating = true
                var t1 = new TimelineMax()
                el.style.visibility = 'visible'
                t1.to(el, .1, {
                    morphSVG: '#step-1',
                    ease: Power0.easeNone
                })
                    .to(el, .1, {
                        morphSVG: '#step-2',
                        ease: Power0.easeNone
                    })
                    .to(el, .2, {
                        morphSVG: '#end',
                        ease: Back.easeOut,
                        onComplete: () => {
                            this.isAnimating = false
                        }
                    })

                var t2 = new TimelineMax()
                t2.set(el, {
                    opacity: .8,
                })
                t2.from(el, .2, {
                    opacity: 0,
                    y: -150,
                    ease: Back.easeIn,
                })

                var master = new TimelineMax()
                master.add(t1, 0.1)
                master.add(t2, 0.1)
                master.play()
            }
        },
        fadeOut: function() {
            var t1 = new TimelineMax()
            t1.to(this.$refs.start, .4, {
                opacity: 0,
                ease: Power1.easeInOut,
            })
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

.gallery-item {
    position: relative;

    &:hover {

    }

    > .overlay {
        position: absolute;
        top: 0;

        .water-gallery {
            fill: $light-blue;
        }
    }
}
</style>
