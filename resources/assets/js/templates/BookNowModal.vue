<template lang="html">
    <b-modal id="bookmodalwrapper" title="Book Now" size="lg">
        <div slot="modal-header">
            <waves id="book-now-waves" class="waves-icon"/>
            <section-title title="Book Now" number="05" position="left" id="book-section-title"/>
        </div>
        <div id="book-modal" class="container-fluid px-5">
            <div class="row">
                <div class="form-group col-md-6">
                    <input type="text" placeholder="Name" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" placeholder="Surname" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <input type="text" placeholder="Dive Level" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" placeholder="From / To" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <input type="text" placeholder="Email" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <textarea name="name" rows="8" cols="80" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div id="response" class="container-fluid p-5">
            <h3 class="text-center">{{ this.serviceMessage }}</h3>
        </div>
        <div slot="modal-footer">
            <div class="col d-flex justify-content-center">
                <button class="btn btn-dark text-uppercase" @click="submitRequest">Submit</button>
            </div>
        </div>
    </b-modal>

</template>

<script>
import axios from 'axios'
import EventBus from '~js/EventBus'
import MorphSVG from '~js/externals/MorphSVGPlugin'
import SectionTitle from '../components/SectionTitle.vue'
import {TweenMax, TimelineMax} from 'gsap'
import Waves from '../components/icons/Waves.vue'

export default {
    name: 'BookNowModal',
    components: {
        SectionTitle,
        Waves,
    },
    data: function() {
        return {
            dive_level: null,
            email: null,
            from_to: null,
            isOpen: false,
            message: null,
            name: null,
            serviceMessage: null,
            surname: null,
        }
    },
    methods: {
        missingField: function() {
            this.serviceMessage = 'Missing Informations!'
            var t1 = new TimelineMax()
            t1.to('#book-modal', .4, {
                opacity: 0,
                display: 'none'
            })
                .to('#response', .4, {
                    opacity: 1,
                    display: 'block',
                    onComplete: () => {
                        setTimeout(() => {
                            this.restoreForm()
                        }, 3000)
                    }
                })
        },
        restoreForm: function() {
            var t1 = new TimelineMax()
            t1.to('#response', .4, {
                opacity: 0,
                display: 'none',
            })
                .to('#book-modal', .4, {
                    opacity: 1,
                    display: 'block'
                })
        },
        submitRequest: function() {
            if (!this.name || !this.surname || !this.dive_level || !this.from_to || !this.email || !this.message) {
                this.missingField()
                return
            }

            var data = new FormData()
            data.append('name', this.name)
            data.append('surname', this.surname)
            data.append('dive_level', this.dive_level)
            data.append('from_to', this.from_to)
            data.append('email', this.email)

            // axios.post('')
        },
        toggleModal: function() {
            if (!this.isOpen) {
                var t1 = new TimelineMax()
                t1.fromTo('#book-modal-wrapper', .2, {
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
                t1.to('#book-modal-wrapper', .4, {
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
        EventBus.$on('toggle-book-modal', () => {
            this.toggleModal()
        })
    },
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

#book-now-waves {
    position: relative;
    left: -15px;
}

#book-section-title {
    left: 100px;
    top: -50px;

    > .number {
        min-width: 300px;
    }

    > .text {
        min-width: 300px;
    }
}

#book-modal {
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

    input, textarea {
        border: none;
        border-bottom: 2px solid $menu-green;
        @include border-radius(0);
        @include box-shadow(none);
        background-color: transparent;
    }
}

#response {
    display: none;
    opacity: 0;
}
</style>
