<template lang="html">
    <div class="col-md-3">
        <img :src="image" class="img-fluid"/>
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
