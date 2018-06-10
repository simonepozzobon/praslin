<template lang="html">
    <div id="diving-spots" v-observe-visibility="visibilityChanged">
        <div class="container pb-5">
            <div class="row">

                <div class="col-md-6">
                    <section-title title="Dive Spots" number="02" align="right"/>
                    <section-subtitle>
                        There is a lot to see, from beginners to experts
                    </section-subtitle>
                    <section-paragraph>
                        More than 26 of the Seychelles top scuba diving spots
                        include some as close as a 5 minutes boat ride and some
                        an hour or so away for deeper dives and greater chances of
                        different species. Dive sites are always assessed before
                        diving, and with plenty of alternative spots nearby, a
                        change in site is easy when needed.
                    </section-paragraph>
                </div>
                <div class="col-md-6">
                    <waves class="waves-icon"/>
                    <div id="dive-sposts-images">
                        <div id="dive-spots-img-1">
                            <img src="/images/praslin-north.jpg" class="img-fluid"/>
                        </div>​
                        <div id="dive-spots-img-2">
                            <img src="/images/praslin-st-pierre.jpg" class="img-fluid"/>
                        </div>
                        <div id="dive-spots-img-3">
                            <img src="/images/national-park.jpg" class="img-fluid"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="map-wrapper" class="container-fluid mt-5 px-0">
            <div id="dive-spots-map"></div>
        </div>
        <!-- <div id="dive-list" class="container mt-5 px-0">
            <b-table stiped hover :items="this.spotsConverted"></b-table>
        </div> -->
    </div>
</template>

<script>
import apiKeys from '~js/apiKeys'
import axios from 'axios'
import GoogleMapsOpts from '~js/config/GoogleMapsOpts'
import SectionParagraph from '../../components/SectionParagraph.vue'
import SectionSubtitle from '../../components/SectionSubtitle.vue'
import SectionTitle from '../../components/SectionTitle.vue'
import Waves from '../../components/icons/Waves.vue'

import Coral from '../../components/icons/sea-creatures/Coral.vue'

export default {
    name: 'DiveSpots',
    components: {
        SectionParagraph,
        SectionSubtitle,
        SectionTitle,
        Waves,
    },
    data: function() {
        return {
            spots: []
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
        spotsConverted: function() {
            var converted = []
            for (var i = 0; i < this.spots.length; i++) {
                var spot = this.spots[i]
                var newspot
                newspot.reef_type = spot.reef_type.description
                converted.push(newspot)
            }

            return converted
        }
    },
    methods: {
        getSpots: function() {
            return new Promise((resolve, reject) => {
                axios.get('/api/dive-spots').then(response => {
                    this.spots = response.data
                    resolve()
                })
            })

        },
        hasSnorkeling: function(value) {
            if (value == 0) {
                return 'No'
            }
            return 'Yes'
        },
        loadMap: function() {
            const element = document.getElementById('dive-spots-map')
            GoogleMapsOpts.zoom = 12
            GoogleMapsOpts.center = new google.maps.LatLng(-4.31685,55.7543)
            const map = new google.maps.Map(element, GoogleMapsOpts)

            this.spots.forEach((coord) => {
                const position = new google.maps.LatLng(coord.lat, coord.lon)
                const marker = new google.maps.Marker({
                    position,
                    map,
                    title: coord.name
                })

                var contentString = '<h2>'+coord.name+'</h2>' +
                '<hr>' +
                'Reef Type: ' + coord.reef_type.description + '<br>' +
                'Level: ' + coord.dive_level.description + '<br>' +
                'Depth: ' + coord.depth + '<br>' +
                'Snorkeling: ' + this.hasSnorkeling(coord.snorkeling) + '<br>' +
                'Rating: ' + this.renderStars(coord.rating) + '<br>' +
                'What you can see: ' + this.renderActivities(coord.icons)


                const infowindow = new google.maps.InfoWindow({
                    content: contentString
                })

                marker.addListener('click', () => {
                    infowindow.open(map, marker)
                })
            })
        },
        renderActivities: function(act) {
            var string = ''
            for (var i = 0; i < act.length; i++) {
                if (i < (act.length - 1)) {
                    var string = string + act[i].description + ', '
                } else {
                    var string = string + act[i].description + '.'
                }
            }
            return string
        },
        renderStars: function(value) {
            var string = ''
            for (var i = 0; i < (parseInt(value) - 1); i++) {
                string = string + '<i class="fas fa-star"></i> '
            }
            return string
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
            mapsScript.setAttribute('src', '//maps.googleapis.com/maps/api/js?key=AIzaSyD4CvJwKmbFXDJTissWXN7_CGeB7kCGlQw')
            document.head.appendChild(mapsScript)
        }
    },
    mounted: function() {
        this.getSpots().then(() => {
            this.loadMap()
        })
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

#diving-spots {
    padding-bottom: 180px;

    .waves-icon {
        position: absolute;
        left: 15px;
        top: -40px;
    }

    #dive-sposts-images {
        position: relative;

        #dive-spots-img-1 {
            position: absolute;
            width: 60%;
            top: -40px;
            left: 90px;
        }

        #dive-spots-img-2 {
            position: absolute;
            width: 60%;
            top: 170px;
            right: 0;
            z-index: 1;
            @include box-shadow(0 2px 16px 0 rgba($black, 0.33));
        }

        #dive-spots-img-3 {
            position: absolute;
            width: 60%;
            top: 310px;
            left: 15px;
            z-index: 0;
        }
    }

    #map-wrapper {

        #dive-spots-map {
            width: 100%;
            min-height: 60vh;
            height: 100%;
            z-index: 0;
        }
    }

}
</style>
