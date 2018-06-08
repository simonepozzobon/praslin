<template lang="html">
    <div id="dive-spots" v-observe-visibility="visibilityChanged">
        <div class="container pb-5">
            <div class="row">
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
                <div class="col-md-6">
                    <section-title title="Dive Spots" number="02" align="left"/>
                    <section-subtitle>
                        There is a lot to see, from beginners to experts
                    </section-subtitle>
                    <section-paragraph>
                        More than 15 of the Seychelles top scuba diving spots
                        include some as close as a 5 minutes boat ride and some
                        an hour or so away for deeper dives and greater chances of
                        different species. Dive sites are always assessed before
                        diving, and with plenty of alternative spots nearby, a
                        change in site is easy when needed.
                    </section-paragraph>
                </div>
            </div>
        </div>
        <div id="map-wrapper" class="container-fluid mt-5 px-0">
            <div id="dive-spots-map"></div>
        </div>
    </div>
</template>

<script>
import apiKeys from '~js/apiKeys'
import SectionParagraph from '../../components/SectionParagraph.vue'
import SectionSubtitle from '../../components/SectionSubtitle.vue'
import SectionTitle from '../../components/SectionTitle.vue'
import Waves from '../../components/icons/Waves.vue'

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
            spots: [
                {
                    name: 'St. Pierre',
                    lat: -4.302592,
                    lng: 55.749939,
                },
                {
                    name: 'Coral Garden',
                    lat: -4.287068,
                    lng: 55.740583,
                },
                {
                    name: 'Red Point',
                    lat: -4.277310,
                    lng: 55.746034,
                },
                {
                    name: 'Aride Island',
                    lat: -4.213270,
                    lng: 55.665350,
                },
                {
                    name: 'Bobby Rock',
                    lat: -4.251115,
                    lng: 55.678160,
                },
                {
                    name: 'Corail Francine',
                    lat: -4.292361,
                    lng: 55.761599,
                },
                {
                    name: 'Ave Maria',
                    lat: -4.310583,
                    lng: 55.829240,
                },
                {
                    name: 'White Bank',
                    lat: -4.317233,
                    lng: 55.817776,
                },
                {
                    name: 'Channel Rock',
                    lat: -4.346670,
                    lng: 55.807134,
                },


            ]
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
            const element = document.getElementById('dive-spots-map')
            const opts = {
                zoom: 12,
                center: new google.maps.LatLng(-4.31685,55.7543),
                mapTypeId: 'roadmap',
                mapTypeControl: false,
                streetViewControl: false,
                styles: [
                            {elementType: 'geometry', stylers: [{color: '#FEFAF5'}]},
                            {elementType: 'labels.text.stroke', stylers: [{color: '#FEFAF5'}]},
                            {elementType: 'labels.text.fill', stylers: [{color: '#B1A799'}]},
                            {
                                featureType: 'administrative.locality',
                                elementType: 'labels.text.fill',
                                stylers: [{color: '#d59563'}]
                            },
                            {
                                featureType: 'poi',
                                elementType: 'labels.text.fill',
                                stylers: [{color: '#d59563'}]
                            },
                            {
                                featureType: 'poi.park',
                                elementType: 'geometry',
                                stylers: [{color: '#DCFEE4'}]
                            },
                            {
                                featureType: 'poi.park',
                                elementType: 'labels.text.fill',
                                stylers: [{color: '#6b9a76'}]
                            },
                            {
                                featureType: 'road',
                                elementType: 'geometry',
                                stylers: [{color: '#E3DFDB'}]
                            },
                            {
                                featureType: 'road',
                                elementType: 'geometry.stroke',
                                stylers: [{color: '#E3DFDB'}]
                            },
                            {
                                featureType: 'road',
                                elementType: 'labels.text.fill',
                                stylers: [{color: '#E3DFDB'}]
                            },
                            {
                                featureType: 'road.highway',
                                elementType: 'geometry',
                                stylers: [{color: '#E3DFDB'}]
                            },
                            {
                                featureType: 'road.highway',
                                elementType: 'geometry.stroke',
                                stylers: [{color: '#E3DFDB'}]
                            },
                            {
                                featureType: 'road.highway',
                                elementType: 'labels.text.fill',
                                stylers: [{color: '#f3d19c'}]
                            },
                            {
                                featureType: 'transit',
                                elementType: 'geometry',
                                stylers: [{color: '#E3DFDB'}]
                            },
                            {
                                featureType: 'transit.station',
                                elementType: 'labels.text.fill',
                                stylers: [{color: '#d59563'}]
                            },
                            {
                                featureType: 'water',
                                elementType: 'geometry',
                                stylers: [{color: '#E5F7F7'}]
                            },
                            {
                                featureType: 'water',
                                elementType: 'labels.text.fill',
                                stylers: [{color: '#515c6d'}]
                            },
                            {
                                featureType: 'water',
                                elementType: 'labels.text.stroke',
                                stylers: [{color: '#17263c'}]
                            }
                        ],
            }
            const map = new google.maps.Map(element, opts)

            this.spots.forEach((coord) => {
                const position = new google.maps.LatLng(coord.lat, coord.lng)
                const marker = new google.maps.Marker({
                    position,
                    map
                })
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
            mapsScript.setAttribute('src', '//maps.googleapis.com/maps/api/js?key=AIzaSyD4CvJwKmbFXDJTissWXN7_CGeB7kCGlQw')
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

#dive-spots {
    padding-bottom: 180px;

    .waves-icon {
        position: absolute;
        right: 15px;
        top: -40px;
    }

    #dive-sposts-images {
        position: relative;

        #dive-spots-img-1 {
            position: absolute;
            width: 60%;
            top: -40px;
            right: 90px;
        }

        #dive-spots-img-2 {
            position: absolute;
            width: 60%;
            top: 170px;
            z-index: 1;
            @include box-shadow(0 2px 16px 0 rgba($black, 0.33));
        }

        #dive-spots-img-3 {
            position: absolute;
            width: 60%;
            top: 310px;
            right: 15px;
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
