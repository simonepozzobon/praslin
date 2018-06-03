<template lang="html">
    <div class="row">
        <gallery-single-media v-for="image in images" :key="image.id" :image="image.thumb"/>
    </div>
</template>

<script>
import GallerySingleMedia from './GallerySingleMedia.vue'

export default {
    name: 'GalleryGrid',
    components: {
        GallerySingleMedia,
    },
    props: {
        images: {
            type: Array,
            default: function() {},
        },
    },
}
</script>

<style lang="css">
</style>
