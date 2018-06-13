<template lang="html">
    <div id="diving-spots" v-observe-visibility="visibilityChanged">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-6">
                    <section-title title="Dive Spots" number="02" align="right"/>
                    <section-subtitle>
                        There is a lot to see, from beginners to advance divers
                    </section-subtitle>
                    <section-paragraph>
                        Seychelles top scuba diving spots
                        include some as close as a 5 minutes boat ride and some
                        an hour or so away for deeper dives and greater chances of
                        different species. Dive conditions are always assessed before
                        diving, and with plenty of alternative spots nearby, a
                        change in site is easy when needed.
                    </section-paragraph>
                </div>
                <div class="col-md-6">
                    <waves class="waves-icon"/>
                    <div id="dive-sposts-images">
                        <div id="dive-spots-img-1">
                            <img src="/images/dive-spots-img-2.jpg" class="img-fluid"/>
                        </div>​
                        <div id="dive-spots-img-2">
                            <img src="/images/dive-spots-img-1.jpg" class="img-fluid"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="map-wrapper" class="container-fluid mt-5 px-0">
            <div id="dive-spots-map"></div>
        </div>
        <div id="dive-list" class="container mt-5 px-0">
            <b-table striped hover responsive outlined :stacked="this.isMobile" :items="this.spotsConverted" :fields="fields">
                <template slot="rating" slot-scope="data">
                    <stars-icons :stars="parseInt(data.item.rating)" />
                </template>
                <template slot="icons" slot-scope="data">
                    <fish-icons v-for="icon in data.item.icons" :key="icon.id" :icon_id="icon.id" size="32"/>
                </template>
            </b-table>
        </div>
    </div>
</template>

<script>
import apiKeys from '~js/apiKeys'
import axios from 'axios'
import EventBus from '~js/EventBus'
import FishIcons from '../../components/FishIcons.vue'
import GoogleMapsOpts from '~js/config/GoogleMapsOpts'
import SectionParagraph from '../../components/SectionParagraph.vue'
import SectionSubtitle from '../../components/SectionSubtitle.vue'
import SectionTitle from '../../components/SectionTitle.vue'
import StarsIcons from '../../components/StarsIcons.vue'
import Waves from '../../components/icons/Waves.vue'

// const MobileDetect = require('mobile-detect')

export default {
    name: 'DiveSpots',
    components: {
        FishIcons,
        SectionParagraph,
        SectionSubtitle,
        SectionTitle,
        StarsIcons,
        Waves,
    },
    data: function() {
        return {
            fields: [
                {
                    key: 'id',
                    label: 'ID',
                    sortable: true,
                },
                {
                    key: 'title',
                    label: 'Title',
                    sortable: true,
                },
                {
                    key: 'reef_type',
                    label: 'Reef Type',
                    sortable: true,
                },
                {
                    key: 'level',
                    label: 'Level',
                    sortable: true,
                },
                {
                    key: 'depth',
                    label: 'Depth',
                    sortable: true,
                },
                {
                    key: 'snorkeling',
                    label: 'Snorkeling',
                    sortable: true,
                },
                {
                    key: 'rating',
                    label: 'Rating',
                    sortable: true,
                },
                {
                    key: 'icons',
                    label: 'What You Can See',
                    sortable: true,
                },
            ],
            isMobile: false,
            spots: [],
            spotsConverted: [],
            windowSize: null,
        }
    },
    watch: {
        windowSize: function(size) {
            if (size == 'md' || size == 'sm' || size == 'xs') {
                this.isMobile = true
            } else {
                this.isMobile = false
            }
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
        getSpots: function() {
            return new Promise((resolve, reject) => {
                axios.get('/api/dive-spots').then(response => {
                    this.spots = response.data.divespots
                    this.spotsConverted
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
            var converted = []

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

                var sortedIcons = _.sortBy(coord.icons, 'id')
                var object = {
                    id: coord.id,
                    title: coord.name,
                    reef_type: coord.reef_type.description,
                    level: coord.dive_level.description,
                    depth: coord.depth,
                    snorkeling: this.hasSnorkeling(coord.snorkeling),
                    rating: coord.rating,
                    icons: sortedIcons,
                }
                converted.push(object)

                const infowindow = new google.maps.InfoWindow({
                    content: contentString
                })

                marker.addListener('click', () => {
                    infowindow.open(map, marker)
                })
            })

            this.spotsConverted = converted
        },
        mobileDetect: function() {
            // var md = new MobileDetect(window.navigator.userAgent)
            // if (!md.phone() && !md.tablet()) {
            //     this.isDesktop = true
            // } else {
            //     this.isDesktop = false
            // }
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
        // this.mobileDetect()
        EventBus.$on('window-resized', size => {
            console.log(size)
            this.windowSize = size.value
        })
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
            width: 50%;
            top: -40px;
            left: 90px;
        }

        #dive-spots-img-2 {
            position: absolute;
            width: 50%;
            top: 300px;
            right: 0;
            z-index: 1;
            @include box-shadow(0 2px 16px 0 rgba($black, 0.33));
        }

        // #dive-spots-img-3 {
        //     position: absolute;
        //     width: 60%;
        //     top: 310px;
        //     left: 15px;
        //     z-index: 0;
        // }
    }

    #map-wrapper {
        padding-top: 100px;

        #dive-spots-map {
            width: 100%;
            min-height: 60vh;
            height: 100%;
            z-index: 0;
        }
    }

}
</style>
