<template lang="html">
    <div class="section-subtitle">
        <span>
            <slot>

            </slot>
        </span>
    </div>
</template>

<script>
export default {
    name: 'SectionSubtitle'
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';

.section-subtitle {
    padding-top: $spacer * 3;

    > span {
        font-size: 72px;
        font-weight: 700;
        line-height: 85px;
    }
}
</style>
