<template lang="html">
    <div id="price-list" class="w-100 bg-sand">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <section-title title="Price List" number="02" align="right" class="price-list-title"/>
                    <waves class="waves-icon"/>
                </div>
            </div>
            <div class="row">
                <div class="col-12 price-content">
                    <b-table striped hover responsive outlined :items="this.data1" :fields="fields1"></b-table>
                </div>
            </div>
            <div class="row">
                <div class="col-12 pt-5">
                    <b-table striped hover responsive outlined :items="this.data2" :fields="fields2"></b-table>
                </div>
            </div>
            <div class="row">
                <div class="col-12 pt-5">
                    <b-table striped hover responsive outlined :items="this.data3" :fields="fields3"></b-table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SectionTitle from '../../components/SectionTitle.vue'
import Waves from '../../components/icons/Waves.vue'

export default {
    name: 'PriceList',
    components: {
        SectionTitle,
        Waves,
    },
    data: function() {
        return {
            fields1: [
                { key: 'details', label: 'Details' },
                { key: 'cyl', label: 'Cyl / Weights' },
                { key: 'equipment', label: 'All Equipment' }
            ],
            data1: [
                {
                    details: '1 short distance dive',
                    cyl: '50,00 €',
                    equipment: '60,00 €',
                },
                {
                    details: '2 short distance dive',
                    cyl: '95,00 €',
                    equipment: '115,00 €',
                },
                {
                    details: 'Long distance / night dive',
                    cyl: '+ 20,00 €',
                    equipment: '+ 20,00 €',
                },
                {
                    details: 'Snorkeling',
                    cyl: '',
                    equipment: '30,00 €',
                },
                {
                    details: 'Marine Park Fees',
                    cyl: '20,00 €',
                    equipment: '',
                },
            ],
            fields2: [
                { key: 'courses', label: 'Padi Courses' },
                { key: 'min', label: 'Min Days' },
                { key: 'retail', label: 'Retail Price' }
            ],
            data2: [
                {
                    courses: 'Discover Scuba Diving',
                    min: '1',
                    retail: '100,00 €'
                },
                {
                    courses: 'Scuba Diver',
                    min: '2',
                    retail: '350,00 €'
                },
                {
                    courses: 'Open Water',
                    min: '4',
                    retail: '450,00 €'
                },
                {
                    courses: 'Open Water E-learned',
                    min: '2',
                    retail: '330,00 €'
                },
                {
                    courses: 'Open Water Referral',
                    min: '2',
                    retail: '350,00 €'
                },
                {
                    courses: 'Avd open Water',
                    min: '2',
                    retail: '350,00 €'
                },
                {
                    courses: 'Avd Open E-learner',
                    min: '2',
                    retail: '280,00 €'
                },
                {
                    courses: 'Rescue Diver',
                    min: '2',
                    retail: '350,00 €'
                },
                {
                    courses: 'Rescue E-learner',
                    min: '2',
                    retail: '285,00 €'
                },
                {
                    courses: 'Emergency First Response',
                    min: '1',
                    retail: '110,00 €'
                },
                {
                    courses: 'Dive Master',
                    min: 'TC',
                    retail: '1000,00 €'
                },
            ],
            fields3: [
                { key: 'speciality', label: 'Speciality' },
                { key: 'min', label: 'Min Days' },
                { key: 'retail', label: 'Retail Price' }
            ],
            data3: [
                {
                    speciality: 'Drift or Naturalist',
                    min: '1',
                    retail: '150,00 €'
                },
                {
                    speciality: 'Deep',
                    min: '2',
                    retail: '250,00 €'
                },
                {
                    speciality: 'Night',
                    min: '2',
                    retail: '280,00 €'
                },
                {
                    speciality: 'Navigation',
                    min: '2',
                    retail: '250,00 €'
                },
                {
                    speciality: 'Digital UW',
                    min: '2',
                    retail: '200,00 €'
                },
                {
                    speciality: 'Boat',
                    min: '1',
                    retail: '150,00 €'
                },
                {
                    speciality: 'Peak Buoyancy',
                    min: '1',
                    retail: '160,00 €'
                },
            ]
        }
    },
    methods: {
        animate: function() {
            
        }
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';

#price-list {
    padding-top: 90px;
    padding-bottom: $spacer * 8;

    .price-list-title {
        top: 72px;
        right: 121px;
        z-index: 2;
    }

    .waves-icon {
        position: absolute;
        top: 32px;
        right: 15px;
        z-index: 2;
    }

    .price-content {
        padding-top: 154px;
    }

    .price-list-table {

        thead > td {
            text-transform: uppercase;
            font-size: 20px;
            font-weight: 700;
            padding: ($spacer * 2) $spacer;
            border: 2px solid $menu-green;
            width: 33.333%;
        }

        tbody td {
            padding: $spacer;
            border: 2px solid $menu-green;
            width: 33.333%;
        }
    }
}
</style>
