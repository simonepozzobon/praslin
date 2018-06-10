<template lang="html">
    <div id="island">
        <div class="container">
            <div class="row first-part">
                <div class="col-md-6">
                    <waves class="waves-icon"/>
                    <div class="island-images">
                        <div id="island-img-1">
                            <img src="/images/beach-2.jpg" class="img-fluid" />
                        </div>
                        <div id="island-img-2">
                            <img src="/images/praslin-1.jpg" class="img-fluid" />
                        </div>
                        <div id="island-img-3">
                            <img src="/images/beach.jpg" class="img-fluid" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <section-title title="About The Island" number="04" align="left"/>
                    <div class="island-info">
                        <island-description title="Praslin" icon="far fa-map">
                            The second largest island at 38sq km lies 49km (30.5 nautical miles)
                            north-east of Mahe.<br>
                            Famed for its COCO DE- MER forest, Praslin is home to one of
                            Seychelles two UNESCO world heritage site,the VALLE DE MAI.
                        </island-description>
                        <island-description title="Climate" icon="fas fa-thermometer-half">
                            Seychelles has the blissful advantage of a near constant
                            temperature that rarely drops below 24 degrees Celsius.<br>
                            Through the year temperature range between 24-32 degrees
                            Celsius. This warm, tropical climate is marked by two
                            distinct season:The NORTH-WEST MONSOON and the SOUTH-EAST MONSOON.<br>
                            The north-west monsoon runs from November to March and the
                            south-east from June to September both season are named
                            after the direction of the prevailing wind during these periods.
                            North-west monsoon brings generally light wind, speed varies
                            between (15 to 22kph) and highest rainfall is between
                            December and February.<br>
                            The South-east monsoon is cooler and drier but the wind is
                            much stronger, with speeds of up to(60 kph) leading to rough
                            seas for most of the period.<br>
                            Best weather usually comes at the change-over between the
                            monsoons, March/April and October/November, though not
                            guaranteed, the weather in these months is usually windless
                            which brings calm seas.<br>
                            Sea temperature varies from 23-30 degrees celcius.
                            The changes in monsoons also affect the underwater visibility.
                            The south-east monsoon brings cold upwellings of plankton,
                            which can reduce visibility to few metres.
                            North-West monsoon the visibility is usually better can be
                            up to 30 metres.
                        </island-description>
                        <island-description title="Languages" icon="far fa-flag">
                            The official languages of Seychelles are Creole, French
                            and English. All three are widely spoken on the Islands,
                            with Creole being the most commonly spoken and English
                            usually used for written communication.<br>
                            Creole is a french patois.Much of its vocabulary is
                            similar to french although somewhat simplified, so it
                            is not uncommon to hear conversations with a mix of creole,
                            french and English words.
                        </island-description>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <section-title title="About The Island" number="04" align="right"/>
                    <div class="island-info">
                        <island-description title="Getting There" icon="far fa-compass">
                            Seychelles is well served by several Airlines to the
                            international Airport(SEZ) on Mahe island.<br>
                            There is a reliable ferry service from Mahe to
                            Praslin/La Digue with traveling time of a little bit
                            over an hour.<br>
                            There are also domestic flights from Mahe to Praslin
                            flying time takes around 15 minutes so it is the quickest
                            way to travel between the two Islands.
                        </island-description>
                        <island-description title="Passport / Visa" icon="far fa-file-alt">
                            A short stay holiday (one month) visitors permit is
                            issued by immigration on arrival in the Seychelles.
                        </island-description>
                        <island-description title="Money" icon="far fa-money-bill-alt">
                            The currency of Seychelles is the Seychelles Rupee(scr)
                            100 cents make up one Rupee.There are a range of
                            currency denominations in coin and note form, all
                            of which depict beautifully the natural and cultural
                            heritage of seychelles.
                        </island-description>
                        <island-description title="Health" icon="fas fa-hand-holding-heart">
                            There are relatively few diseases that visitors to
                            Seychelles need to be vaccinated against.
                        </island-description>
                    </div>
                </div>
                <div class="col-md-6">
                    <waves class="waves-icon left"/>
                    <div class="island-images">
                        <div id="island-img-4">
                            <img src="/images/praslin-anse-lazio.jpg" class="img-fluid" />
                        </div>
                        <div id="island-img-5">
                            <img src="/images/praslin-3.jpg" class="img-fluid" />
                        </div>
                        <div id="island-img-6">
                            <img src="/images/praslin-4.jpg" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import IslandDescription from '../../components/IslandDescription.vue'
import SectionTitle from '../../components/SectionTitle.vue'
import Waves from '../../components/icons/Waves.vue'

export default {
    name: 'IslandIndex',
    components: {
        IslandDescription,
        SectionTitle,
        Waves,
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

#island {
    padding-top: 180px;

    .row {
        &.first-part {
            padding-bottom: 120px;
        }
    }

    .waves-icon {
        position: absolute;
        top: -40px;
        right: 15px;

        &.left {
            left: 15px;
            right: auto;
        }
    }

    .island-info {
        padding-top: 80px;
    }

    .island-images {
        position: relative;

        > #island-img-1 {
            position: absolute;
            width: 80%;
            top: -40px;
            right: 90px;
        }

        > #island-img-2 {
            position: absolute;
            width: 70%;
            top: 170px;
            right: 20px;
            @include box-shadow(0 2px 16px 0 rgba($black, 0.33));
        }

        > #island-img-3 {
            position: absolute;
            width: 60%;
            top: 690px;
            left: -15px;
            @include box-shadow(0 4px 16px 0 rgba($black, 0.33));
        }

        > #island-img-4 {
            position: absolute;
            width: 70%;
            top: -40px;
            left: 90px;
        }

        > #island-img-5 {
            position: absolute;
            width: 70%;
            top: 190px;
            right: 0;
            z-index: 1;
            @include box-shadow(0 4px 16px 0 rgba($black, 0.33));
        }

        > #island-img-6 {
            position: absolute;
            width: 60%;
            top: 390px;
            left: 40px;
            z-index: 0;
        }
    }

}
</style>
