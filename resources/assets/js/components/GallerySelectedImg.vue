<template lang="html">
    <div id="image-single" class="col-12 pb-4">
        <div class="close-btn" @click="closeGallery">
            <i class="fas fa-times"></i>
        </div>
        <img :src="src" class="img-fluid w-100"/>
    </div>
</template>

<script>
import EventBus from '~js/EventBus'

export default {
    name: 'GallerySelectedImg',
    props: {
        src: {
            type: String,
            default: '',
        }
    },
    methods: {
        closeGallery: function() {
            EventBus.$emit('close-gallery')
        }
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

    #image-single {
        .close-btn {
            position: absolute;
            top: 40px;
            right: 56px;

            &::before {
                content: '';
                position: absolute;
                width: 54px;
                height: 54px;
                @include border-radius(50%);
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                background-color: $sand;
                z-index: 1;
                cursor: pointer;
                @include box-shadow(0 8px 32px 0 rgba(37, 37, 37, .15));
            }

            > i {
                position: absolute;
                font-size: 36px;
                z-index: 2;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                cursor: pointer;
                color: $black;
            }
        }
    }
</style>
