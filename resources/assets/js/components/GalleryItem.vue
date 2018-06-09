<template lang="html">
    <div :id="'image-'+id" class="pb-4" :class="size + ' ' + itemClass" @click="selected">
        <img :src="src" class="img-fluid w-100"/>
    </div>
</template>

<script>
import EventBus from '~js/EventBus'

export default {
    name: 'GalleryItem',
    props: {
        id: {
            type: Number,
            default: 0,
        },
        image: {
            type: String,
            default: 'none',
        },
        itemClass: {
            type: String,
            default: 'gallery-item'
        },
        size: {
            type: String,
            default: 'col-md-4'
        }
    },
    data: function() {
        return {
            isAnimating: false,
            src: this.image,
        }
    },
    methods: {
        changeSrc: function(src) {
            this.src = src
        },
        selected: function() {
            EventBus.$emit('image-selected', this.id)
        },
    },
    mounted: function() {
        EventBus.$on('image-selected-src', data => {
            if (data.id == this.id) {
                this.changeSrc(data.src)
            }
        })
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

.gallery-item {
    cursor: pointer;
    transition: all 1s ease-in-out;
}
</style>
