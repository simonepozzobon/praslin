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
                        <gallery-item v-for="image in images" :key="image.id" :image="image.thumb" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import GalleryItem from '../../components/GalleryItem.vue'
import SectionTitle from '../../components/SectionTitle.vue'
import Waves from '../../components/icons/Waves.vue'

export default {
    name: 'Index',
    components: {
        GalleryItem,
        SectionTitle,
        Waves,
    },
    data: function() {
        return {
            images: [],
        }
    },
    methods: {
        getImages: function() {
            axios.get('/api/images').then(response => {
                this.images = response.data
            })
        }
    },
    mounted: function() {
        this.getImages()
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
