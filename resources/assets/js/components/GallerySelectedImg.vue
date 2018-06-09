<template lang="html">
    <div class="col-12">
        <img :src="src" class="img-fluid w-100"/>
    </div>
</template>

<script>
export default {
    name: 'GallerySelectedImg',
    props: {
        src: {
            type: String,
            default: '',
        }
    }
}
</script>

<style lang="css">
</style>
