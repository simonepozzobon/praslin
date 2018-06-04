<template lang="html">
    <div class="island-description">
        <!-- <div class="icon">
            <i :class="icon"></i>
        </div> -->
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
    width: 100%;
    padding-bottom: $spacer;
    // position: relative;

    // > .icon {
    //     position: absolute;
    //     padding-right: $spacer;
    //     font-size: 32px;
    //     line-height: 32px;
    //     color: $light-blue;
    //     z-index: 0;
    //     top: 0px;
    // }

    > .content {
        position: relative;
        z-index: 1;

        > .title {
            text-transform: uppercase;
            font-size: 20px;
            font-weight: 700;
            padding-bottom: $spacer / 2;
        }

        > .body {
        }
    }
}
</style>
