<template lang="html">
    <div id="footer">
        <div class="sub-footer">
            © 2018 All rights reserved by Praslin Pro Divers | <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a>
        </div>
    </div>
</template>

<script>
export default {
    name: 'FooterTemplate'
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
    justify-content: center;
    align-items: flex-end;

    > .sub-footer {
        padding-bottom: $spacer * 2;
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
