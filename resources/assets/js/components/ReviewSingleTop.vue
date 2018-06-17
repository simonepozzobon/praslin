<template lang="html">
    <div class="review-single-info">
        <div class="info-detail">
            <div class="profile-bg">
                <div class="profile-icon">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </div>
        <div class="info-detail name">
            {{ this.name }}
        </div>
        <div class="info-detail rating">
            <stars-icon-adv :stars="this.rating"/>
        </div>
        <div class="info-detail right">
            <div class="date">
                {{ this.date }}
            </div>
            <div class="source">
                <i class="fab fa-facebook"></i>
            </div>
        </div>

    </div>
</template>

<script>
import StarsIconAdv from './StarsIconsAdv.vue'

export default {
    name: 'ReviewSingleTop',
    components: {
        StarsIconAdv,
    },
    props: {
        date: {
            type: String,
            default: '00/00/00 00:00'
        },
        name: {
            type: String,
            default: 'Name'
        },
        rating: {
            type: Number,
            default: 0,
        },
        social: {
            type: String,
            default: 'Facebook',
        }
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

.review-single-info {
    display: flex;
    flex-direction: row;
    align-items: center;
    padding-top: $spacer;

    > .info-detail {
        padding-right: $spacer;

        &.right {
            display: flex;
            margin-left: auto;
            padding-right: 0;

            > div {
                padding-left: $spacer;
            }
        }
    }

    .profile-bg {
        position: relative;
        background-color: $light-blue;
        width: $spacer * 3;
        height: $spacer * 3;
        @include border-radius(50%);

        > .profile-icon {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    }

    > .name {
        font-weight: 700;
        text-transform: capitalize;
    }
}
</style>
