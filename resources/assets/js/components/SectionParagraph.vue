<template lang="html">
    <p class="section-paragraph">
        <slot></slot>
    </p>
</template>

<script>
export default {
    name: 'SectionParagraph'
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';

.section-paragraph {
    padding-top: 29px;
    line-height: 1.618;
    // line-height: 25.89px;
}
</style>
