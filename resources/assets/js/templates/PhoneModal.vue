<template lang="html">
    <div id="phone-modal-wrapper">
        <div class="title">
            <waves class="waves-icon"/>
            <section-title title="Call Us" number="05" position="left" class="phone-section-title"/>
        </div>
        <div id="phone-modal">
            <p class="custom-p p-4">
                <span class="contact-label">E-mail</span><br>
                <span class="contact-description">
                <a href="mailto:praslinprodivers@gmail.com">praslinprodivers@gmail.com</a>
                </span><br><br>
                <span class="contact-label">Mobile</span><br>
                <span class="contact-description">
                    (+248) 26 33 000
                </span><br><br>
                <span class="contact-label">Phone</span><br>
                <span class="contact-description">
                    (+248) 42 32 113
                </span>
            </p>
        </div>
    </div>
</template>

<script>
import EventBus from '~js/EventBus'
import MorphSVG from '~js/externals/MorphSVGPlugin'
import SectionTitle from '../components/SectionTitle.vue'
import {TweenMax, TimelineMax} from 'gsap'
import Waves from '../components/icons/Waves.vue'

export default {
    name: 'PhoneModal',
    components: {
        SectionTitle,
        Waves,
    },
    data: function() {
        return {
            isOpen: false,
        }
    },
    methods: {
        toggleModal: function() {
            if (!this.isOpen) {
                var t1 = new TimelineMax()
                t1.fromTo('#phone-modal-wrapper', .2, {
                    y: '-=500',
                }, {
                    y: '-50%',
                    opacity: 1,
                    display: 'flex',
                    onComplete: () => {
                        this.isOpen = true
                    }
                })
            } else {
                var t1 = new TimelineMax()
                t1.to('#phone-modal-wrapper', .4, {
                    opacity: 0,
                    display: 'none',
                    y: '-=500',
                    onComplete: () => {
                        this.isOpen = false
                    }
                })
            }
        },
    },
    mounted: function() {
        EventBus.$on('toggle-phone-modal', () => {
            this.toggleModal()
        })
    },
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

#phone-modal-wrapper {
    position: absolute;
    width: 60%;
    height: 60%;
    min-width: 340px;
    min-height: 420px;
    display: flex;
    flex-direction: column;
    z-index: 100;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    background-color: $sand;
    @include box-shadow(0 8px 32px 0 rgba(37, 37, 37, .15));

    display: none;
    opacity: 0;

    > .title {
        padding-top: 50px;
        width: 100%;

        > .phone-section-title {
            left: 122px;
            top: -40px;
        }
    }

    #phone-modal {
        padding-top: 60px;

        > .info {
            padding: $spacer ($spacer * 2);

            > i {
                padding-right: $spacer;
            }
        }

        > .custom-p {
            .contact-label {
                text-transform: uppercase;
                font-size: 20px;
                font-weight: 700;

                &.last {
                    padding-left: 1.5rem;
                }
            }
        }
    }
}


//
// #phone-modal-start {
//     fill: $sand;
// }
</style>
