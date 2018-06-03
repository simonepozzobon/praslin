<template lang="html">
    <div class="col-md-4 pb-4">
        <img :src="image" class="img-fluid"/>
    </div>
</template>

<script>
export default {
    name: 'GalleryItem',
    props: {
        image: {
            type: String,
            default: 'none',
        },
    }
}
</script>

<style lang="css">
</style>
