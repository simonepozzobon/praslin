<template lang="html">
    <div class="island-description">
        <div class="icon">
            <i :class="icon"></i>
        </div>
        <div class="content">
            <div class="title">
                {{ title }}
            </div>
            <div class="body">
                <p>
                    <slot></slot>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'IslandDescription',
    props: {
        icon: {
            type: String,
            default: 'fas fa-map-marker',
        },
        title: {
            type: String,
            default: 'titolo',
        },
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';

.island-description {
    display: flex;
    width: 100%;

    > .icon {
        padding-right: $spacer;
        font-size: 20px;
    }

    > .content {
        > .title {
            text-transform: uppercase;
            font-size: 20px;
            font-weight: 700;
        }

        > .body {
        }
    }
}
</style>
