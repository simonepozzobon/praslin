<template>
    <li id="weather-wrapper">
        <div class="icon">
            <cloudy v-if="this.icon == '03d' || this.icon == '03n'"/>
            <cloudy-full v-else-if="this.icon == '04d' || this.icon == '04n'"/>
            <cloudy-rain v-else-if="this.icon == '09d' || this.icon == '09n'"/>
            <cloudy-sunny v-else-if="this.icon == '02d' || this.icon == '02n'"/>
            <mist v-else-if="this.icon == '50d' || this.icon == '50n'"/>
            <rain v-else-if="this.icon == '11d' || this.icon == '11n'"/>
            <snow v-else-if="this.icon == '13d' || this.icon == '13n'"/>
            <sunny v-else-if="this.icon == '01d' || this.icon == '01n'"/>
            <sunny-rain v-else-if="this.icon == '10d' || this.icon == '10n'"/>
        </div>
        <div class="temperature">
            <span>{{ this.temperature }} °C</span>
        </div>
    </li>
</template>
<script>
import apiKeys from '~js/apiKeys'
import axios from 'axios'
import Cloudy from '../components/icons/weather/Cloudy.vue'
import CloudyFull from '../components/icons/weather/CloudyFull.vue'
import CloudyRain from '../components/icons/weather/CloudyRain.vue'
import CloudySunny from '../components/icons/weather/CloudySunny.vue'
import Mist from '../components/icons/weather/Mist.vue'
import Rain from '../components/icons/weather/Rain.vue'
import Snow from '../components/icons/weather/Snow.vue'
import Sunny from '../components/icons/weather/Sunny.vue'
import SunnyRain from '../components/icons/weather/SunnyRain.vue'

export default {
    name: 'WeatherInfoLite',
    components: {
        Cloudy,
        CloudyFull,
        CloudyRain,
        CloudySunny,
        Mist,
        Rain,
        Snow,
        Sunny,
        SunnyRain,
    },
    data: function() {
        return {
            coords: {
                lat: '-4.31685',
                long: '55.7543',
            },
            units: 'metric',
            weather: null
        }
    },
    computed: {
        icon: function() {
            if (this.weather) {
                return this.weather.weather[0].icon
            }
            return null
        },
        temperature: function() {
            if (this.weather) {
                return parseInt(this.weather.main.temp)
            }
            return null
        },
    },
    methods: {
        getWeather: function() {
            const url = '//api.openweathermap.org/data/2.5/weather?lat=' + this.coords.lat + '&lon=' + this.coords.long + '&units=' + this.units + '&APPID=' + apiKeys.weather
            $.getJSON(url).then(response => {
                this.weather = response
            })
        },
    },
    mounted: function() {
        this.getWeather()
    }
}
</script>
<style lang="scss">
</style>
