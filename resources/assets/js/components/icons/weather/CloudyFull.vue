<template>
    <svg width="64px" height="64px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
            <g id="cloudy-full" stroke-width="2">
                <path d="M39.927,32.78 C39.121,32.78 38.344,32.893 37.598,33.085 C36.538,28.345 32.313,24.801 27.254,24.801 C22.02,24.801 17.683,28.595 16.815,33.58 C15.663,33.069 14.39,32.779 13.048,32.779 C7.906,32.779 3.738,36.947 3.738,42.089 C3.738,47.231 7.906,51.399 13.048,51.399 C17.313,51.399 35.898,51.399 39.927,51.399 C45.069,51.399 49.237,47.231 49.237,42.089 C49.237,36.947 45.069,32.78 39.927,32.78 Z" id="Shape"></path>
                <path d="M52.403,38.975 C57.545,38.975 61.713,34.807 61.713,29.665 C61.713,24.523 57.545,20.355 52.403,20.355 C51.597,20.355 50.82,20.468 50.074,20.66 C49.014,15.92 44.789,12.376 39.73,12.376 C34.496,12.376 30.159,16.17 29.291,21.155 C28.139,20.644 26.866,20.354 25.524,20.354 C21.987,20.354 18.911,22.326 17.335,25.231" id="Shape"></path>
            </g>
        </g>
    </svg>
</template>
<script>
export default {
    name: 'CloudyFull',
}
</script>
<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
#cloudy-full {
    stroke: $white;
}
</style>
