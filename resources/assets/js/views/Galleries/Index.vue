<template lang="html">
    <div id="galleries">
        <div class="container">
            <div class="row">
                <div class="col-12 py-5">
                    <section-title title="Galleries" number="03" align="center"/>
                    <waves class="waves-icon"/>
                </div>
                <div class="col-12 pt-5">
                    <div class="row">
                        <gallery-item v-for="image in images"
                            :key="image.id"
                            :image="image.thumb"
                            :id="image.id"
                            size="col-md-4"/>
                    </div>
                    <div id="image-open-wrapper" class="row">
                        <gallery-selected-img :src="this.selectedImg.src" />
                        <gallery-item v-for="image in images"
                            :key="image.id"
                            :image="image.thumb"
                            :id="image.id"
                            size="col-md-1"/>
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

const ANIMATION = true

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
            selectedImg: {},
        }
    },
    methods: {
        getImages: function() {
            axios.get('/api/images').then(response => {
                this.images = response.data
            })
        },
        hideGallery: function(id) {
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
                this.cloneImg()
                // elements.splice(index, 1)
            }

            // nasconde le altre
            var t1 = new TimelineMax()
            t1.staggerTo(elements, .8, {
                opacity: 0,
                ease: Power4.easeOut,
            }, .2, '+=0')
                .set(elements, {
                    display: 'none'
                })
        },
        cloneImg: function() {

        }
    },
    mounted: function() {
        this.getImages()
        EventBus.$on('image-selected', id => {
            this.hideGallery(id)
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

}
</style>
