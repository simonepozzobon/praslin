<template lang="html">
    <div id="contact" v-observe-visibility="visibilityChanged">
        <!-- <div id="contact-panel" class="bg-sand row">
                <div class="col-12 py-5">
                    <section-title title="Contact" number="05" align="left" class="section-title"/>
                    <waves class="waves-icon"/>
                </div>
                <div class="col-12">
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
        </div> -->
        <div id="contact-map">

        </div>
        <div class="container">
            <div id="bottom-contact" class="row">
                <div class="col-12">
                    <p class="custom-p p-4">
                        <span class="contact-label">Address</span><br>
                        <span class="contact-description">
                            C/o L’Archipel Hotel, Anse Gouvernement<br>
                            Praslin, Seychelles
                        </span><br><br>
                    </p>
                    <span class="contact-label last text-center">Social</span>
                    <div class="social">
                        <div class="social-icon p-4">
                            <i class="fab fa-tripadvisor fa-2x"></i>
                        </div>
                        <div class="social-icon p-4 fa-2x">
                            <a href="https://www.facebook.com/Praslin-Pro-Divers-1745688432182615" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        </div>
                        <div class="social-icon p-4 fa-2x">
                            <a href="https://www.instagram.com/praslinprodivers/" target="_blank"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import apiKeys from '~js/apiKeys'
import GoogleMapsOpts from '~js/config/GoogleMapsOpts'
import SectionTitle from '../../components/SectionTitle.vue'
import Waves from '../../components/icons/Waves.vue'

export default {
    name: 'ContactIndex',
    components: {
        SectionTitle,
        Waves,
    },
    data: function() {
        return {

        }
    },
    computed: {
        googleMapsLoaded: function() {
            let url = '//maps.googleapis.com/maps/api/js?key=' + apiKeys.googleMaps
            let len = $('script').filter(function () {
                return ($(this).attr('src') == url)
            }).length
            if (len === 0) {
                return false
            }
            return true
        },
    },
    methods: {
        loadMap: function() {
            const element = document.getElementById('contact-map')
            GoogleMapsOpts.zoom = 15
            GoogleMapsOpts.center = new google.maps.LatLng(-4.31685,55.7543)
            const map = new google.maps.Map(element, GoogleMapsOpts)
            const position = new google.maps.LatLng(-4.31914,55.7636)
            const marker = new google.maps.Marker({
                position,
                map
            })
        },
        visibilityChanged: function(isVisible, entry) {
            if (isVisible && this.googleMapsLoaded) {
                this.loadMap()
            }
        }
    },
    created: function() {
        if (!this.googleMapsLoaded) {
            let url = '//maps.googleapis.com/maps/api/js?key=' + apiKeys.googleMaps
            let mapsScript = document.createElement('script')
            mapsScript.setAttribute('src', url)
            document.head.appendChild(mapsScript)
        }
    },
    mounted: function() {
        window.onload = () => {
            this.loadMap()
        }
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

#contact {
    // padding-top: 132px;
    overflow: hidden;

    #contact-panel, #bottom-contact {
        .custom-p {
            margin-bottom: 0;
        }

        .section-title {
            left: 122px;
            top: 40px;
        }

        .contact-label {
            text-transform: uppercase;
            font-size: 20px;
            font-weight: 700;

            &.last {
                padding-left: 1.5rem;
            }
        }

        .contact-description {
        }

        .social {
            display: flex;
            justify-content: space-between;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
            padding-bottom: 40px;

            > .social-icon {
                font-size: 32px;
            }
        }
    }

    #contact-map {
        // position:absolute;
        // top: 0
        width: 100%;
        min-height: 60vh;
        height: 100%;
    }

    @include media-breakpoint-up('md') {
        // position: relative;

        #contact-panel {
            position: absolute;
            width: 40%;
            min-width: 420px;
            z-index: 2;
        }

        #contact-map {
            // margin-top: 80px;
            // position: absolute;
        }
    };
}
</style>
