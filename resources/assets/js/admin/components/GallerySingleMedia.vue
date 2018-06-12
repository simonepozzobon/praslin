<template lang="html">
    <div class="col-md-4">
        <img :src="image" class="img-fluid w-100"/>
    </div>
</template>

<script>
export default {
    name: 'GallerySingleMedia',
    props: {
        image: {
            type: String,
            default: 'none'
        }
    }
}
</script>

<style lang="css">
</style>
