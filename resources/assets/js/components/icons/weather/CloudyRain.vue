<template>
    <svg width="64px" height="64px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
            <g id="cloudy-rain" stroke-width="2">
                <path d="M45.873,20.636 C45.067,20.636 44.29,20.749 43.544,20.941 C42.484,16.201 38.259,12.657 33.2,12.657 C27.966,12.657 23.629,16.451 22.761,21.436 C21.609,20.925 20.336,20.635 18.994,20.635 C13.852,20.635 9.684,24.803 9.684,29.945 C9.684,35.087 13.852,39.255 18.994,39.255 C23.259,39.255 41.844,39.255 45.873,39.255 C51.015,39.255 55.183,35.087 55.183,29.945 C55.183,24.803 51.015,20.636 45.873,20.636 Z" id="Shape"></path>
                <path d="M23,40 L23,45.443" id="Shape"></path>
                <path d="M23,50.193 L23,54.068" id="Shape"></path>
                <path d="M31.456,44.943 L31.456,50.818" id="Shape"></path>
                <path d="M31.456,55.443 L31.456,59.068" id="Shape"></path>
                <path d="M39.75,56.443 L39.75,52.131" id="Shape"></path>
                <path d="M39.75,43.693 L39.75,40" id="Shape"></path>
            </g>
        </g>
    </svg>
</template>
<script>
export default {
    name: 'CloudyRain',
}
</script>
<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
#cloudy-rain {
    stroke: $white;
}
</style>
