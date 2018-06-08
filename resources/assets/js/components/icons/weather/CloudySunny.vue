<template>
    <svg width="64px" height="64px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
            <g id="cloudy-sunny" stroke-width="2">
                <path d="M33.231,23.015 C34.939,20.98 37.502,19.687 40.366,19.687 C45.509,19.687 49.678,23.856 49.678,28.999 C49.678,30.285 49.417,31.51 48.946,32.624" id="Shape"></path>
                <path d="M32.803,18.767 L29.803,15.441" id="Shape"></path>
                <path d="M42.774,15.869 L42.774,12.021" id="Shape"></path>
                <path d="M50.977,20.818 L54.224,17.572" id="Shape"></path>
                <path d="M52.933,28.222 L58.064,28.222" id="Shape"></path>
                <path d="M41.953,51.999 C47.095,51.999 51.263,47.831 51.263,42.689 C51.263,37.547 47.095,33.379 41.953,33.379 C41.147,33.379 40.37,33.492 39.624,33.684 C38.564,28.944 34.339,25.4 29.28,25.4 C24.046,25.4 19.709,29.194 18.841,34.179 C17.689,33.668 16.416,33.378 15.074,33.378 C9.932,33.378 5.764,37.546 5.764,42.688 C5.764,47.83 9.932,51.998 15.074,51.998 L41.953,51.999 Z" id="Shape"></path>
            </g>
        </g>
    </svg>
</template>
<script>
export default {
    name: 'CloudySunny',
}
</script>
<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
#cloudy-sunny {
    stroke: $white;
}
</style>
