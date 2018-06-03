<template lang="html">
    <div class="row bg-light">
        <div class="col-12">
            <h1 class="text-uppercase pt-4">Galleries</h1>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-md-9 form-group">
                    <input type="file" class="form-control" @change="fileChange">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary" @click="uploadImg">
                        <i class="fas fa-upload"></i> Upload
                    </button>
                </div>
            </div>
        </div>
        <div class="col-12">
            <gallery-grid :images="updatedImages" />
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import GalleryGrid from './GalleryGrid.vue'

export default {
    name: 'GalleryPanel',
    components: {
        GalleryGrid,
    },
    props: {
        images: {
            type: String,
            default: '',
        }
    },
    data: function() {
        return {
            media: null,
            updatedImages: [],
        }
    },
    computed: {
        parsedImages: function() {
            return JSON.parse(this.images)
        },
    },
    methods: {
        fileChange: function(event) {
            this.media = event.target.files[0]
        },
        uploadImg: function() {
            if (this.media) {
                var data = new FormData()
                data.append('file', this.media)

                axios.post('/api/image-upload', data).then(response => {
                    this.updatedImages.unshift(response.data)
                    this.media = null
                })
            }
        },
    },
    mounted: function() {
        this.updatedImages = this.parsedImages
    }
}
</script>

<style lang="scss">
</style>
