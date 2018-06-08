<template lang="html">
    <div id="phone-call-wrapper">
        <div class="call-to-action">
            Call Us
        </div>
        <div id="phone-call">
            <div class="mobile">
                <i class="fas fa-phone"></i> (+248) 42 32 113
            </div>
            <div class="center">
                <i class="fas fa-mobile"></i>(+248) 26 33 000
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PhoneCall'
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

    #phone-call-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;

        .call-to-action {
            font-size: 20px;
            font-weight: 700;
            text-transform: uppercase;
            color: $white;
            padding-left: $spacer * 2;
        }

        #phone-call {
            display: flex;
            flex-direction: column;
            color: $white;
            padding-left: $spacer;

            > .mobile i, > .center > i {
                padding-right: $spacer / 2;
            }
        }
    }
</style>
