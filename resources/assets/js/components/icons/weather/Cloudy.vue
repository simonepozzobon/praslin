<template>
    <svg width="64px" height="64px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
            <g id="cloudy" stroke-width="2">
                <path d="M45.189,45.599 C50.331,45.599 54.499,41.431 54.499,36.289 C54.499,31.147 50.331,26.979 45.189,26.979 C44.383,26.979 43.606,27.092 42.86,27.284 C41.8,22.544 37.575,19 32.516,19 C27.282,19 22.945,22.794 22.077,27.779 C20.925,27.268 19.652,26.978 18.31,26.978 C13.168,26.978 9,31.146 9,36.288 C9,41.43 13.168,45.598 18.31,45.598 L45.189,45.599 Z" id="Shape"></path>
            </g>
        </g>
    </svg>
</template>
<script>
export default {
    name: 'Cloudy',
}
</script>
<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
#cloudy {
    stroke: $white;
}
</style>
