<template lang="html">
    <div id="galleries">
        <div class="container">
            <div class="row">
                <div class="col-12 py-5">
                    <section-title title="Galleries" number="03" align="center"/>
                    <waves class="waves-icon"/>
                </div>
                <div class="col-12 pt-5">
                    <div id="gallery-wrapper" class="row">
                        <gallery-item v-for="image in images"
                            :key="image.id"
                            :image="image.thumb"
                            :id="image.id"
                            itemClass="gallery-item"
                            size="col-md-4"/>
                    </div>
                    <div id="image-open-wrapper" class="row" ref="imageSelected">
                        <gallery-selected-img :src="this.selectedImg.src" />
                        <gallery-item v-for="image in images"
                            :key="image.id"
                            :image="image.thumb"
                            :id="image.id"
                            itemClass="gallery-small-item"
                            size="col-2 col-sm-2 col-xs-2 col-md-1 col-lg-1 col-xl-1 pb-4"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import EventBus from '~js/EventBus'
import GalleryItem from '../../components/GalleryItem.vue'
import GallerySelectedImg from '../../components/GallerySelectedImg.vue'
import SectionTitle from '../../components/SectionTitle.vue'
import {TweenMax, TimelineMax} from 'gsap'
import Waves from '../../components/icons/Waves.vue'

export default {
    name: 'Index',
    components: {
        GalleryItem,
        GallerySelectedImg,
        SectionTitle,
        Waves,
    },
    data: function() {
        return {
            images: [],
            isAnimating: false,
            isOpen: false,
            selectedImg: {},
        }
    },
    methods: {
        closeSeleted: function() {
            if(this.isAnimating) return
            this.isAnimating = true
            var t1 = new TimelineMax()
            t1.to('#image-open-wrapper', .4, {
                opacity: 0,
                display: 'none',
                ease: Power4.easeOut
            })
                .to('#gallery-wrapper', .4, {
                    opacity: 1,
                    display: 'flex',
                    ease: Power4.easeOut,
                    onComplete: () => {
                        this.isAnimating = false
                        this.isOpen = false
                    }
                })
        },
        getImages: function() {
            axios.get('/api/images').then(response => {
                this.images = response.data
            })
        },
        hideGallery: function(id) {
            if (this.isAnimating) return
            var elementsHTML = document.getElementsByClassName('gallery-item')
            var elements = Array.from(elementsHTML)

            var index = elements.findIndex(element => {
                return element.id == 'image-'+id
            })

            if (index > -1) {
                var selected = elements[index]

                this.selectedImg =  {
                    id: id,
                    src: this.images[index].landscape
                }
            }

            if (this.isOpen) return
            this.isAnimating = true
            var t1 = new TimelineMax()
            t1.set('#image-open-wrapper', {
                opacity: 0,
                display: 'flex',
                position: 'absolute',
            })
                .to('#gallery-wrapper', .4, {
                    opacity: 0,
                    display: 'none',
                    ease: Power4.easeOut
                })
                .set('#image-open-wrapper', {
                    position: 'inherit'
                })
                .to('#image-open-wrapper', .4, {
                    opacity: 1,
                    ease: Power4.easeOut,
                    onComplete: () => {
                        this.isAnimating = false
                        this.isOpen = true
                    }
                })

        },
    },
    mounted: function() {
        this.getImages()
        EventBus.$on('image-selected', id => {
            this.hideGallery(id)
        })

        EventBus.$on('close-gallery', () => {
            this.closeSeleted()
        })
    }
}
</script>

<style lang="scss">
#galleries {
    padding-top: 132px;

    .waves-icon {
        position: relative;
        top: 70px;
        left: 50%;
        transform: translateX(-50%);
    }

    #image-open-wrapper {
        display: none;
        opacity: 0;
    }
}
</style>
