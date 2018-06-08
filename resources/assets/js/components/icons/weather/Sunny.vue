<template>
    <svg width="64px" height="64px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="sunny" stroke-width="2">
                <circle id="Oval" cx="32" cy="32" r="11.501"></circle>
                <path d="M32,9.82 L32,16.228" id="Shape" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M32,47.772 L32,54.18" id="Shape" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M54.18,32 L47.772,32" id="Shape" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M16.228,32 L9.82,32" id="Shape" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M16.316,16.316 L20.847,20.847" id="Shape" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M43.153,43.153 L47.684,47.684" id="Shape" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M47.684,16.316 L43.153,20.847" id="Shape" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M20.847,43.153 L16.316,47.684" id="Shape" stroke-linecap="round" stroke-linejoin="round"></path>
            </g>
        </g>
    </svg>
</template>
<script>
export default {
    name: 'SunnyRain',
}
</script>
<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
#sunny {
    stroke: $white;
}
</style>
