<template lang="html">
    <div id="dive-center" class="container">
        <div class="row">
            <div class="col-md-6">
                <section-title title="Dive Center" number="02" align="right"/>
                <section-subtitle>
                    We are a “S.E.A.“ dive centre.
                </section-subtitle>
                <section-paragraph>
                    The dive centre is located in the north-east corner of the
                    long stretch of Anse Gouvernement Beach at l’Archipel Hotel,
                    Praslin Pro Divers has real world class diving.<br>
                    We are a “S.E.A.“ dive centre equipped high quality
                    scuba pro branded diving equipment design and manufactured
                    by scuba pro specialist team.
                </section-paragraph>
            </div>
            <div class="col-md-6">
                <waves class="waves-icon"/>
                <div class="images">
                    <image-container
                        src="/images/dive-center.jpg"
                        :height="300"
                        percent="75%"
                        top="-40px"
                        left="90px" />
                    <image-container
                        src="/images/equipment-3.jpg"
                        :height="300"
                        percent="70%"
                        top="-80px"
                        right="0" />
                    <image-container
                        src="/images/SEA-logo.png"
                        size="contain"
                        :height="162"
                        percent="30%"
                        top="-150px"
                        left="-40px" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ImageContainer from '../../components/ImageContainer.vue'
import SectionParagraph from '../../components/SectionParagraph.vue'
import SectionSubtitle from '../../components/SectionSubtitle.vue'
import SectionTitle from '../../components/SectionTitle.vue'
import Waves from '../../components/icons/Waves.vue'

export default {
    name: 'DiveCenter',
    components: {
        ImageContainer,
        SectionParagraph,
        SectionSubtitle,
        SectionTitle,
        Waves,
    }
}
</script>

<style lang="scss">
// @import '../css/scale-img.scss';
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

#dive-center {
    padding-top: 180px;

    @include media-breakpoint-down('md') {
        padding-bottom: 90px;
    };

    .waves-icon {
        position: absolute;
        left: 15px;
        top: -40px;
    }
}

</style>
