<template lang="html">
    <div id="footer">
        <div class="contact-information">

        </div>
        <!-- <div class="footer-logos">
            <div class="scuba-logo">
                <img src="/images/SEA-logo-white.png" class="img-fluid" />
            </div>
            <div class="padi-instructor">
                <img src="/images/padi-instructor.jpg" class="img-fluid">
            </div>
        </div> -->
        <div class="contact-informations pb-3">
            <div class="logo">
                <logo-inverse align="center" />
            </div>
            <div class="address text-center">
                C/o L’Archipel Hotel, Anse Gouvernement - Praslin, Seychelles
            </div>
            <div class="phones text-center">
                Mobile: (+248) 26 33 000 - Phone: (+248) 42 32 113
            </div>
            <div class="hours text-center">
                Open from 9 a.m. to 5 p.m.
            </div>
        </div>
        <div class="sub-footer">
            © 2018 All rights reserved by Praslin Pro Divers | <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a>
        </div>
    </div>
</template>

<script>
import LogoInverse from './LogoInverse.vue'

export default {
    name: 'FooterTemplate',
    components: {
        LogoInverse,
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';

#footer {
    min-height: 460px;
    background-image: url('/images/footer-bg.png');
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: center;

    > .footer-logos {
        display: flex;
        justify-content: center;
        align-items: center;
        padding-bottom: $spacer;

        > .scuba-logo {
            width: 64px;
        }

        > .padi-instructor {
            padding-left: $spacer;
            width: 150px;
        }
    }

    > .sub-footer {
        text-align: center;
        padding-bottom: $spacer * 3;
        color: $dark-gray;

        > a {
            color: $dark-gray;

            &:active, &:link, &:visited {
                color: $dark-gray;
            }
        }
    }
}

</style>
