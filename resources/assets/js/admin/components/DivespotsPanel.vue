<template lang="html">
    <div class="row bg-light">
        <div class="col-12">
            <h1 class="text-uppercase pt-4">Dive Spots</h1>
        </div>
        <div class="col-12">
            <div id="map"></div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-12 form-group">
                    <label for="">Title</label>
                    <input type="text" v-model="title" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Latitude</label>
                    <input type="text" v-model="lat" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Longitude</label>
                    <input type="text" v-model="lon" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Level</label>
                    <select class="form-control" v-model="level_id">
                        <option v-for="level in this.levels" :key="level.id" :value="level.id" >{{ level.description }}</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Depth</label>
                    <input type="text" v-model="depth" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Rating</label>
                    <input type="text" class="form-control" v-model="rating">
                </div>
            </div>
            <div class="row pb-4">
                <div class="form-group col-md-6">
                    <label for="">Snorkeling</label>
                    <input type="checkbox" class="form-check" v-model="snorkeling">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Reef Type</label>
                    <select class="form-control" v-model="reef_type_id">
                        <option v-for="reef_type in this.reef_types" :key="reef_type.id" :value="reef_type.id">{{ reef_type.description }}</option>
                    </select>
                </div>
            </div>
            <div class="row pl-4">
                <div class="col-md-3" v-for="icon in this.iconsAvailable">
                    <div class="form-group">
                        <input type="checkbox" class="form-check-input" @change="checkedBox($event, icon)">
                        <label class="form-check-label text-capitalize">{{ icon.description }}</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-center p-5">
                        <button class="btn btn-primary" @click="saveSpot">
                            <i class="far fa-save"></i> Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Reef Type</th>
                        <!-- <th>Lat</th> -->
                        <!-- <th>Lng</th> -->
                        <th>Level</th>
                        <th>Depth</th>
                        <th>Snorkeling</th>
                        <th>Rating</th>
                        <th>What</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="divespot in this.divespots" :key="divespot.id">
                        <td>{{ divespot.id }}</td>
                        <td>{{ divespot.name }}</td>
                        <td>{{ divespot.reef_type.description }}</td>
                        <!-- <td>{{ divespot.lat }}</td> -->
                        <!-- <td>{{ divespot.lon }}</td> -->
                        <td>{{ divespot.dive_level.description }}</td>
                        <td>{{ divespot.depth }}</td>
                        <td>{{ divespot.snorkeling }}</td>
                        <td>
                            <stars-icons :stars="parseInt(divespot.rating)"/>
                        </td>
                        <td>
                            <fish-icons v-for="icon in divespot.icons" :key="icon.id" :icon_id="icon.id" size="32"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import apiKeys from '~js/apiKeys'
import axios from 'axios'
import FishIcons from '../../components/FishIcons.vue'
import GoogleMapsOpts from '~js/config/GoogleMapsOpts'
import StarsIcons from '../../components/StarsIcons.vue'

export default {
    name: 'GalleryPanel',
    components: {
        FishIcons,
        StarsIcons,
    },
    props: {
        spots: {
            type: String,
            default: '',
        }
    },
    data: function() {
        return {
            depth: '0mt',
            divespots: [],
            divespotsMarker: [],
            icons: [],
            iconsAvailable: [],
            lat: 0,
            level_id: 1,
            levels: [],
            lon: 0,
            map: null,
            rating: 0,
            reef_type_id: 1,
            reef_types: [],
            snorkeling: null,
            title: 'dive spot',
        }
    },
    computed: {
        spotsConverted: function() {
            if (this.spots) {
                return JSON.parse(this.spots)
            }
            return null
        },
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
        checkedBox: function($event, icon) {
            var value = $event.target.checked

            var data = {
                id: icon.id
            }

            if (value) {
                this.icons.push(data)
            } else {
                var index = this.icons.findIndex(icon => {
                    return icon.id == data.id
                })

                if (index > -1) {
                    this.icons.splice(index, 1)
                }
            }
        },
        getFormData: function() {
            axios.get('/api/dive-spots/formdata').then(response => {
                this.iconsAvailable = response.data.icons
                this.reef_types = response.data.reef_types
                this.levels = response.data.levels
            })
        },
        loadMap: function() {
            let marker
            const element = document.getElementById('map')
            GoogleMapsOpts.zoom = 12
            GoogleMapsOpts.center = new google.maps.LatLng(-4.31685,55.7543)
            this.map = new google.maps.Map(element, GoogleMapsOpts)

            this.previewSpots()

            this.map.addListener('click', event => {
                this.lat = event.latLng.lat()
                this.lon = event.latLng.lng()

                if (marker) marker.setMap(null)

                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(this.lat, this.lon),
                    map: this.map,
                    title: 'Position'
                })
            })
        },
        previewSpots: function() {
            for (var i = 0; i < this.divespots.length; i++) {
                var marker = this.divespotsMarker[i]
                var spot = this.divespots[i]
                if (marker) marker.setMap(null)
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(spot.lat, spot.lon),
                    map: this.map,
                    title: spot.name
                })
            }
        },
        saveSpot: function() {
            var data = new FormData()
            data.append('title', this.title)
            data.append('lat', this.lat)
            data.append('lon', this.lon)
            data.append('level', this.level_id)
            data.append('depth', this.depth)
            data.append('snorkeling', this.snorkeling)
            data.append('rating', this.rating)
            data.append('reef_type_id', this.reef_type_id)
            data.append('icons', JSON.stringify(this.icons))

            axios.post('/api/dive-spots/new', data).then(response => {
                console.log(response)
            })
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
        this.divespots = this.spotsConverted
        this.getFormData()
        window.onload = () => {
            this.loadMap()
        }
    }
}
</script>

<style lang="scss">

#map {
    width: 100%;
    min-height: 60vh;
    height: 100%;
    z-index: 0;
}
</style>
