<template lang="html">
    <b-modal id="phonemodalwrapper" title="Book Now" size="lg">
        <div slot="modal-header">
            <waves id="phone-waves-icon"/>
            <section-title title="Call Us" number="05" position="left" id="phone-section-title"/>
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
        <div slot="modal-footer">

        </div>
    </b-modal>


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

#phone-waves-icon {
    position: relative;
    left: -15px;
}

#phone-section-title {
    left: 100px;
    top: -50px;

    > .number {
        min-width: 300px;
    }

    > .text {
        min-width: 300px;
    }
}

    #phone-modal {

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
</style>
