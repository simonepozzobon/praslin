<template lang="html">
    <div id="price-list" class="container-fluid bg-sand">
        <div class="row">
            <div class="col-12">
                <section-title title="Price List" number="02" align="right" class="price-list-title"/>
                <waves class="waves-icon"/>
            </div>
            <div class="col-12 price-content">
                <div class="container">
                    <table class="w-100 price-list-table">
                        <thead class="bg-light-blue">
                            <td>Details</td>
                            <td>Cyl / Weights</td>
                            <td>All Equipment</td>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1 short distance dive</td>
                                <td>50,00 €</td>
                                <td>60,00 €</td>
                            </tr>
                            <tr>
                                <td>2 short distance dive</td>
                                <td>95,00 €</td>
                                <td>115,00 €</td>
                            </tr>
                            <tr>
                                <td>Long distance / night dive</td>
                                <td>+ 20,00 €</td>
                                <td>+ 20,00 €</td>
                            </tr>
                            <tr>
                                <td>Snorkeling</td>
                                <td></td>
                                <td>30,00 €</td>
                            </tr>
                            <tr>
                                <td>Marine Park Fees</td>
                                <td>20,00 €</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 pt-5">
                <div class="container">
                    <table class="w-100 price-list-table">
                        <thead class="bg-light-blue">
                            <td>Padi Courses</td>
                            <td>Min Days</td>
                            <td>Retail Price</td>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Discover Scuba Diving</td>
                                <td>1</td>
                                <td>100,00 €</td>
                            </tr>
                            <tr>
                                <td>Scuba Diver</td>
                                <td>2</td>
                                <td>350,00 €</td>
                            </tr>
                            <tr>
                                <td>Open Water</td>
                                <td>4</td>
                                <td>450,00 €</td>
                            </tr>
                            <tr>
                                <td>Open Water E-learned</td>
                                <td>2</td>
                                <td>330,00 €</td>
                            </tr>
                            <tr>
                                <td>Open Water Referral</td>
                                <td>2</td>
                                <td>350,00 €</td>
                            </tr>
                            <tr>
                                <td>Avd Open Water</td>
                                <td>2</td>
                                <td>350,00 €</td>
                            </tr>
                            <tr>
                                <td>Avd Open E-learner</td>
                                <td>2</td>
                                <td>280,00 €</td>
                            </tr>
                            <tr>
                                <td>Rescue Diver</td>
                                <td>2</td>
                                <td>350,00 €</td>
                            </tr>
                            <tr>
                                <td>Rescue E-learner</td>
                                <td>2</td>
                                <td>285,00 €</td>
                            </tr>
                            <tr>
                                <td>Emergency First Response</td>
                                <td>1</td>
                                <td>110,00 €</td>
                            </tr>
                            <tr>
                                <td>Dive Master</td>
                                <td>TC</td>
                                <td>800,00 €</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 pt-5">
                <div class="container">
                    <table class="w-100 price-list-table">
                        <thead class="bg-light-blue">
                            <td>Speciality</td>
                            <td>Min Days</td>
                            <td>Retail Price</td>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Drift or Naturalist</td>
                                <td>1</td>
                                <td>150,00 €</td>
                            </tr>
                            <tr>
                                <td>Deep</td>
                                <td>2</td>
                                <td>250,00 €</td>
                            </tr>
                            <tr>
                                <td>Night</td>
                                <td>2</td>
                                <td>280,00 €</td>
                            </tr>
                            <tr>
                                <td>Navigation</td>
                                <td>2</td>
                                <td>250,00 €</td>
                            </tr>
                            <tr>
                                <td>Digital UW</td>
                                <td>2</td>
                                <td>200,00 €</td>
                            </tr>
                            <tr>
                                <td>Boat</td>
                                <td>1</td>
                                <td>150,00 €</td>
                            </tr>
                            <tr>
                                <td>Peak Buoyancy</td>
                                <td>1</td>
                                <td>160,00 €</td>
                            </tr>
                        </tbody>
                    </table>
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
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';

#price-list {
    padding-bottom: $spacer * 8;

    .price-list-title {
        top: 72px;
        right: 106px;
    }

    .waves-icon {
        position: absolute;
        top: 32px;
        left: calc(100% - 90px);
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
            border: 2px solid $light-blue;
            width: 33.333%;
        }

        tbody td {
            padding: $spacer;
            border: 2px solid $light-blue;
            width: 33.333%;
        }
    }
}
</style>
