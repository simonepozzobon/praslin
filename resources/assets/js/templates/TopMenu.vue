<template lang="html">
    <div>
        <nav id="main-menu" class="navbar navbar-expand-lg bg-sand container stiky-top">
            <div class="navbar-brand">
                <div class="navbar-brand-bg bg-dark-gray">
                    <logo align="center" style="margin-top: 8px"/>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <burger size="32px"/>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <span class="nav-number">01</span>
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-number">02</span>
                        <a class="nav-link" href="#">Dive Center</a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-number">03</span>
                        <a class="nav-link" href="#">Galleries</a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-number">04</span>
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
import burger from '../components/icons/burger.vue'
import Logo from './Logo.vue'

export default {
    name: 'TopMenu',
    components: {
        burger,
        Logo,
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

#main-menu {
    background-color: $sand;
    @include media-breakpoint-up('md') {
        min-height: 75px;
    };

    > .navbar-brand {
        position: relative;
        min-width: 268px;

        > .navbar-brand-bg {
            margin-top: 6px;
            position: absolute;
            left: -$spacer;
            top: 50%;
            transform: translateY(-50%);
            min-width: 268px;

                min-height: 89px;
        }
    }

    #navbarContent {
        > .navbar-nav {
            justify-content: space-between;
            width: 100%;


            > .nav-item {
                display: flex;
                align-items: center;
                padding-right: $spacer;

                > span {
                    display: inline-block;
                    color: $menu-green;
                }

                > .nav-link {
                    text-transform: uppercase;
                    font-weight: 500;

                    &:active, &:link, &:visited {
                        color: $black;
                    }
                }
            }

            @include media-breakpoint-down('md') {
                margin-top: $spacer * 2;

                > .nav-item > span {
                    padding-right: $spacer;
                }
            };
        }
    }
}


</style>
