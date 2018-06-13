<template lang="html">
    <div id="island">
        <div class="container">
            <div class="row first-part">
                <div class="col-md-6">
                    <section-title title="About The Island" number="04" align="left"/>
                    <div class="island-info">
                        <island-description title="Praslin" icon="far fa-map">
                            The second largest island at 38sq km lies 49km (30.5 nautical miles)
                            north-east of Mahe. Famed for its <b>Coco De-Mer</b> forest,
                            Praslin is home to one of Seychelles two UNESCO world
                            heritage site, the <b>Valle De Mai</b>.
                        </island-description>
                        <island-description title="Climate" icon="fas fa-thermometer-half">
                            Seychelles has the blissful advantage of a near constant
                            temperature that rarely drops below 24 degrees Celsius and
                            during the year <b>temperature range between 24-32 degrees
                            Celsius</b>.<br>

                            This warm, tropical climate is marked by two distinct season:
                            the north-west monsoon and the sout-east monsoon.<br>
                            <br>
                            <b>North-west monsoon runs from November to March</b> and
                            brings light wind with speed varying between 15 to 22kph. Highest
                            rainfall is between December and February.
                            <b>South-east monsoon runs from June to September</b>,
                            is cooler and drier but the wind is much stronger with
                            speeds of up to 60 kph leading to rough seas for most of the period.<br>

                            <b>Best weather</b> usually comes usually from March to April
                            and from October to November, though not guaranteed,
                            the weather in these months is usually windless which brings calm seas.<br>
                            <br>
                            <b>Sea temperature varies between 23-30 degrees celsius</b>.
                            The changes in monsoons also affect the underwater visibility.
                            The <b>south-east monsoon</b> brings cold upwellings of plankton,
                            which can reduce <b>visibility to few metres</b>.
                            <b>North-West monsoon</b> the visibility is usually better can be
                            <b>up to 30 metres</b>.
                        </island-description>
                        <island-description title="Languages" icon="far fa-flag">
                            The official languages of Seychelles are Creole, French
                            and English. All three are widely spoken on the Islands,
                            with Creole being the most commonly spoken and English
                            usually used for written communication.<br>
                            Creole is a french patois. Much of its vocabulary is
                            similar to french although somewhat simplified, so it
                            is not uncommon to hear conversations with mixed creole,
                            french and English words.
                        </island-description>
                    </div>
                </div>
                <div class="col-md-6 order-md-first order-lg-first order-xl-first">
                    <waves class="waves-icon"/>
                    <div class="images">
                        <image-container
                            src="/images/praslin-island-1.jpg"
                            :height="600"
                            percent="75%"
                            top="-40px"
                            right="90px" />
                        <image-container
                            src="/images/beach.jpg"
                            :height="340"
                            percent="65%"
                            top="-60px"
                            left="160px" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <section-title title="About The Island" number="04" align="right"/>
                    <div class="island-info">
                        <island-description title="Getting There" icon="far fa-compass">
                            Seychelles is well served by several airlines to the
                            <b>international airport (SEZ) on Mahe island.</b>
                            From Mahe a reliable ferry service will bring you
                            to Praslin / La Digue in around an hour.<br>
                            There are also <b>domestic flights</b> from Mahe to Praslin
                            flying time takes around 15 minutes so it is the quickest
                            way to travel between the two Islands.
                        </island-description>
                        <island-description title="Passport / Visa" icon="far fa-file-alt">
                            A short stay holiday (one month) visitors permit is
                            issued by immigration on arrival in the Seychelles.
                        </island-description>
                        <island-description title="Money" icon="far fa-money-bill-alt">
                            The currency of Seychelles is the Seychelles Rupee(scr)
                            100 cents make up one Rupee. There is a range of
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
                    <div class="images">
                        <image-container
                            src="/images/praslin-island-palm.JPG"
                            :height="450"
                            percent="50%"
                            top="-40px"
                            left="90px" />
                        <image-container
                            src="/images/praslin-island-2.JPG"
                            :height="350"
                            percent="50%"
                            top="-80px"
                            right="40px" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ImageContainer from '../../components/ImageContainer.vue'
import IslandDescription from '../../components/IslandDescription.vue'
import SectionTitle from '../../components/SectionTitle.vue'
import Waves from '../../components/icons/Waves.vue'

export default {
    name: 'IslandIndex',
    components: {
        ImageContainer,
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

        // > #island-img-1 {
        //     position: absolute;
        //     width: 80%;
        //     top: -40px;
        //     right: 90px;
        // }

        > #island-img-2 {
            position: absolute;
            width: 70%;
            top: -40px;
            right: 90px;
            // @include box-shadow(0 2px 16px 0 rgba($black, 0.33));
        }

        > #island-img-3 {
            position: absolute;
            width: 80%;
            top: 590px;
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
            top: 430px;
            right: 0;
            z-index: 1;
            @include box-shadow(0 4px 16px 0 rgba($black, 0.33));
        }

        // > #island-img-6 {
        //     position: absolute;
        //     width: 60%;
        //     top: 390px;
        //     left: 40px;
        //     z-index: 0;
        // }
    }

}
</style>
