<template lang="html">
    <div class="section-title">
        <div class="number">
            {{ number }}
        </div>
        <div class="text">
            {{ title }}
        </div>
    </div>
</template>

<script>
export default {
    name: 'SectionTitle',
    props: {
        number: {
            type: String,
            default: '00',
        },
        title: {
            type: String,
            default: 'title',
        },
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';

.section-title {
    position: relative;

    > .number {
        position: absolute;
        color: $light-blue;
        font-size: 132px;
        line-height: 80px;
        top: 50%;
        left: -8px;
        transform: translateY(-60%);
    }

    > .text {
        position: absolute;
        color: $black;
        font-size: 36px;
        font-weight: 700;
        text-transform: uppercase;
        line-height: 36px;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
    }
}

</style>
