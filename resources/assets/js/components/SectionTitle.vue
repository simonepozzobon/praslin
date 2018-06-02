<template lang="html">
    <div class="section-title" :class="align">
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
        align: {
            type: String,
            default: 'left',
        }
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
        transform: translateY(-50%);
    }

    &.left {
        > .number {
            left: -8px;
        }

        > .text {
            left: 0;
        }
    }

    &.right {
        > .number {
            right: -8px;
        }

        > .text {
            right: 0;
        }
    }
}

</style>
